<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Operator;

class OperatorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $operators = Operator::all();
        $operators = Operator::orderBy('created_at', 'asc')->paginate(5);
        return view('admin.operators.operator-list', compact('operators'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.operators.add-operator');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'operator_name' => 'required',
            'operator_email' => 'required',
            'operator_address' => 'required',
            'operator_phone' => 'required',
            'operator_logo' => 'image|nullable|max:2048',
        ]);

        // Handle file upload 
        if($request->hasFile('operator_logo')){
            // Get filename with extension
            $fileNameWithExt = $request->file('operator_logo')->getClientOriginalName();
            // Get just filename
            $filename = pathinfo($fileNameWithExt, PATHINFO_FILENAME);
            // Get just Ext
            $extension = $request->file('operator_logo')->getClientOriginalExtension();
            // Filename to store
            $fileNameToStore = $filename.'_'.time().'.'.$extension;
            // Upload Image
            $path = $request->file('operator_logo')->storeAs('public/operator_images', $fileNameToStore);
        }else{
            $fileNameToStore = 'noimage.jpg';
        }

        $operator = new Operator;
        $operator->operator_name = $request->operator_name;
        $operator->operator_email = $request->operator_email;
        $operator->operator_address = $request->operator_address;
        $operator->operator_phone = $request->operator_phone;
        $operator->operator_logo = $fileNameToStore;
        // $operator->status = $request->status;

        if(isset($request->status)){
            $operator->status = 1;
        }else{
            $operator->status = 0;
        }
       
        // dd($operator);

        $operator->save();
        return redirect('/operator')->with('success', 'Operator Created Successfully');

         // generating a custom flash message before inserting data.
        //  $id = $request::get('operator_id');
        //  $operators = Operator::where('operator_id', $id);
 
        // return view('admin.operators.operator-list', compact('operators'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $operator = Operator::find($id);
        $operators = Operator::all();
        return view('admin.operators.operator-view')->with('operator', $operator, 'operators', $operators);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $operator = Operator::find($id);
        // $operators = Operator::get();
        // return view('admin.operators.edit-operator')->with('operator', $operator);
        return view('admin.operators.edit-operator', compact('operator'));
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
        $this->validate($request,[
            'operator_name' => 'required',
            'operator_email' => 'required',
            'operator_address' => 'required',
            'operator_phone' => 'required',
        ]);

        // Handle file upload 
        if($request->hasFile('operator_logo')){
            // Get filename with extension
            $fileNameWithExt = $request->file('operator_logo')->getClientOriginalName();
            // Get just filename
            $filename = pathinfo($fileNameWithExt, PATHINFO_FILENAME);
            // Get just Ext
            $extension = $request->file('operator_logo')->getClientOriginalExtension();
            // Filename to store
            $fileNameToStore = $filename.'_'.time().'.'.$extension;
            // Upload Image
            $path = $request->file('operator_logo')->storeAs('public/operator_images', $fileNameToStore);
        }

        $operator = Operator::find($id);
        
        $operator->operator_name = $request->operator_name;
        $operator->operator_email = $request->operator_email;
        $operator->operator_address = $request->operator_address;
        $operator->operator_phone = $request->operator_phone;
        // $operator->status = $request->status;
        
        if(isset($request->status)){
            $operator->status = 1;
        }else{
            $operator->status = 0;
        }


        if($request->hasFile('operator_logo')){
            $operator->operator_logo = $fileNameToStore;
        }

        $operator->save();
        return redirect('/operator')->with('flash_message_success', 'Operator Updated Successfully');   
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $operator = Operator::find($id);
        if($operator->operator_logo!='noimage.jpg'){
            // Delete Image
            Storage::delete('public/operator_images/'.$operator->operator_logo);
        }
        $operator->delete();
        return redirect('/operator')->with('success', 'Record Removed Successfully');
    }
}