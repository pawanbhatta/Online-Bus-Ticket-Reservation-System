<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Region;
use Session;

class RegionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $regions = Region::orderBy('created_at', 'asc')->paginate(5);
        return view('admin.regions.region-list', compact('regions'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.regions.add-region');
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
            'region_name'=>'required',
            'region_code'=>'required',
        ]);

        $region = new Region;

        $region->region_name = $request->region_name;
        $region->region_code = $request->region_code;

        if(isset($request->status)){
            $region->status = 1;
        }else{
            $region->status = 0;
        }

        // dd($region);
        
        $region->save();
        Session::flash('msg', 'New Region Created Successfully!');
        return redirect('/region');//->with('success', 'Region Created Successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $region = Region::find($id);
        return view('admin.regions.region-view')->with('region', $region);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $region = Region::find($id);
        return view('admin.regions.edit-region')->with('region', $region);
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
            'region_name'=>'required',
            'region_code'=>'required',
        ]);

        $region = Region::find($id);

        $region->region_name = $request->region_name;
        $region->region_code = $request->region_code;

        if(isset($request->status)){
            $region->status = 1;
        }else{
            $region->status = 0;
        }

        // dd($sub_region);
        
        $region->save();
        Session::flash('msg', 'Region Info Updated Successfully!');
        return redirect('/region');//->with('success', 'Region Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $region = Region::find($id);
        $region->delete();
        Session::flash('msg', 'Region Deleted Successfully!');
        return redirect('/region');//->with('success', 'Region Deleted Successfully');
    }
}