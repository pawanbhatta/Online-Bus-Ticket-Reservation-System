<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Bus;
use App\Operator;
use DB;

class BusController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $operators = Operator::get();
        // $buses = Bus::get();
        $buses = Bus::orderBy('created_at', 'asc')->paginate(5);
        // Mostly use 'compact' method to pass the variables, otherwise it doesnt work with 'with' method
        return view('admin.buses.bus-list', compact('operators', 'buses'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // $operators = Operator::get();
        return view('admin.buses.add-bus');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, 
        [
            'bus_name'=>'required',
            'total_seats'=>'required',
            'bus_code'=>'required',
            'bus_image' => 'image|nullable|max:2048',
            'operator_id'=>'required'
        ]);
        

        // Handle file upload 
        if($request->hasFile('bus_image')){
            // Get filename with extension
            $fileNameWithExt = $request->file('bus_image')->getClientOriginalName();
            // Get just filename
            $filename = pathinfo($fileNameWithExt, PATHINFO_FILENAME);
            // Get just Ext
            $extension = $request->file('bus_image')->getClientOriginalExtension();
            // Filename to store
            $fileNameToStore = $filename.'_'.time().'.'.$extension;
            // Upload Image
            $path = $request->file('bus_image')->storeAs('public/bus_images', $fileNameToStore);
        }else{
            $fileNameToStore = 'noimage.jpg';
        }

        $bus = new Bus;

        $bus->operator_id = $request->operator_id;

        $bus->bus_name = $request->bus_name;
        $bus->total_seats = $request->total_seats;
        $bus->bus_code = $request->bus_code;
        $bus->bus_image = $fileNameToStore;
        // $bus->status = $request->status;

        if(isset($request->status)){
            $bus->status = 1;
        }else{
            $bus->status = 0;
        }

        // dd($bus);
        
        $bus->save();
        return redirect('/bus')->with('success', 'Bus Created Successfully');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $bus = Bus::find($id);
        return view('admin.buses.bus-view')->with('bus', $bus);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $bus = Bus::find($id);
        return view('admin.buses.edit-bus')->with('bus', $bus);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, 
        [
            'bus_name'=>'required',
            'total_seats'=>'required',
            'bus_code'=>'required',
        ]);
        

        // Handle file upload 
        if($request->hasFile('bus_image')){
            // Get filename with extension
            $fileNameWithExt = $request->file('bus_image')->getClientOriginalName();
            // Get just filename
            $filename = pathinfo($fileNameWithExt, PATHINFO_FILENAME);
            // Get just Ext
            $extension = $request->file('bus_image')->getClientOriginalExtension();
            // Filename to store
            $fileNameToStore = $filename.'_'.time().'.'.$extension;
            // Upload Image
            $path = $request->file('bus_image')->storeAs('public/bus_images', $fileNameToStore);
        }
        
        $bus->bus_name = $request->bus_name;
        $bus->total_seats = $request->total_seats;
        $bus->bus_code = $request->bus_code;
        $bus->status = $request->status;

        if(isset($request->status)){
            $bus->status = 1;
        }else{
            $bus->status = 0;
        }
        
        if($request->hashFile('bus_image')){
            $bus->bus_image = $fileNameToStore;
        }
        
        $bus->save();
        return redirect('/bus')->with('success', 'Bus Info Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $bus = Bus::find($id);
        if($bus->bus_image!='noimage.jpg'){
            // Delete Image
            Storage::delete('public/bus_images/'.$bus->bus_image);
        }
        $bus->delete();
        return redirect('/bus')->with('success', 'Bus Deleted Successfully');
    }
}