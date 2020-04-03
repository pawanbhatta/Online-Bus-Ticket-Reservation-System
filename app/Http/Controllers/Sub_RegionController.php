<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Region;
use App\Sub_Region;
use Session;

class Sub_RegionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $regions = Region::all();
        $sub_regions = Sub_Region::orderBy('created_at', 'asc')->paginate(5);
        return view('admin.sub_regions.sub_region-list', compact('sub_regions', 'regions'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $sub_regions = Sub_Region::all();
        return view('admin.sub_regions.add-sub_region', compact('sub_regions'));
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
            'sub_region_name'=>'required',
            'sub_region_code'=>'required',
            // 'region_id'=>'required'
        ]);

        $sub_region = new Sub_Region;

        $sub_region->region_id = $request->region_id;
        $sub_region->sub_region_name = $request->sub_region_name;
        $sub_region->sub_region_code = $request->sub_region_code;

        if(isset($request->status)){
            $sub_region->status = 1;
        }else{
            $sub_region->status = 0;
        }

        // dd($sub_region);
        
        $sub_region->save();
        Session::flash('msg', 'Sub Region Created Successfully!');
        return redirect('/subregion');//->with('success', 'Sub_Region Created Successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $sub_region = Sub_Region::find($id);
        return view('admin.sub_regions.sub_region-view', compact('sub_region'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $sub_region = Sub_Region::find($id);
        $regions = Region::all();
        return view('admin.sub_regions.edit-sub_region', compact('sub_region', 'regions'));   
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
            'sub_region_name'=>'required',
            'sub_region_code'=>'required',
            'region_id'=>'required'
        ]);

        $sub_region = Sub_Region::find($id);

        $sub_region->region_id = $request->region_id;
        $sub_region->sub_region_name = $request->sub_region_name;
        $sub_region->sub_region_code = $request->sub_region_code;

        if(isset($request->status)){
            $sub_region->status = 1;
        }else{
            $sub_region->status = 0;
        }

        // dd($sub_region);
        
        $sub_region->save();


        Session::flash('msg', 'Sub Region Updated Successfully!');
        return redirect('/subregion');//->with('success', 'Sub_Region Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $sub_region = Sub_Region::find($id);
        $sub_region->delete();
        Session::flash('msg', 'Sub Region Deleted Successfully!');
        return redirect('/subregion');//->with('success', 'Sub_Region Deleted Successfully');
    }
}