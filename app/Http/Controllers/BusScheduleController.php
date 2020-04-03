<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\BusSchedule;
use App\Operator;
use App\Bus;
use App\Region;
use App\Sub_Region;
use Session;

class BusScheduleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $schedules = BusSchedule::orderBy('created_at', 'asc')->paginate(5);
        // $schedules = BusSchedule::all();
        $operators = Operator::all();
        $buses = Bus::all();
        $regions = Region::all();
        $subregions = Sub_Region::all();
        return view('admin.schedules.schedule-list', compact('schedules', 'operators', 'buses', 'regions', 'subregions'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $schedules = BusSchedule::orderBy('created_at', 'asc')->paginate(5);
        $operators = Operator::all();
        $buses = Bus::all();
        $regions = Region::all();
        $subregions = Sub_Region::all();
        return view('admin.schedules.edit-schedule', compact('schedules', 'operators', 'buses', 'regions', 'subregions'));
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
            'bus_id'=>'required',
            'operator_id'=>'required',
            'region_id'=>'required',
            'sub_region_id'=>'required',
            'depart_date'=>'required',
            'return_date'=>'required',
            'depart_time'=>'required',
            'return_time'=>'required',
            'pickup_address'=>'required',
            'dropoff_address'=>'required',
            'status'=>'required'
        ]);

        $schedule = new BusSchedule;

        $schedule->bus_id = $request->bus_id;
        $schedule->operator_id = $request->operator_id;
        $schedule->region_id = $request->region_id;
        $schedule->sub_region_id = $request->sub_region_id;
        $schedule->depart_date = $request->depart_date;
        $schedule->return_date = $request->return_date;
        $schedule->depart_time = $request->depart_time;
        $schedule->return_time = $request->return_time;
        $schedule->pickup_address = $request->pickup_address;
        $schedule->dropoff_address = $request->dropoff_address;
        
        if(isset($request->status)){
            $schedule->status = 1;
        }else{
            $schedule->status = 0;
        }

        $schedule->save();
        Session::flash('msg', 'New Schedule Created Successfully');

        return redirect('/bus-schedule');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $schedule = BusSchedule::find($id);
        return view('admin.schedules.show-schedule', compact('schedule'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $schedule = BusSchedule::find($id);
        $schedules = BusSchedule::all();
        return view('admin.schedules.edit-schedule', compact('schedule', 'schedules'));
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
            'bus_id'=>'required',
            'operator_id'=>'required',
            'region_id'=>'required',
            'sub_region_id'=>'required',
            'depart_date'=>'required',
            'return_date'=>'required',
            'depart_time'=>'required',
            'return_time'=>'required',
            'pickup_address'=>'required',
            'dropoff_address'=>'required',
            'status'=>'required'
        ]);

        $schedule = BusSchedule::find($id);

        $schedule->bus_id = $request->bus_id;
        $schedule->operator_id = $request->operator_id;
        $schedule->region_id = $request->region_id;
        $schedule->sub_region_id = $request->sub_region_id;
        $schedule->depart_date = $request->depart_date;
        $schedule->return_date = $request->return_date;
        $schedule->depart_time = $request->depart_time;
        $schedule->return_time = $request->return_time;
        $schedule->pickup_address = $request->pickup_address;
        $schedule->dropoff_address = $request->dropoff_address;
        
        if(isset($request->status)){
            $schedule->status = 1;
        }else{
            $schedule->status = 0;
        }

        $schedule->save();
        Session::flash('msg', 'Schedule Updated Successfully');

        return redirect('/bus-schedule');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $schedule = BusSchedule::find($id);
        $schedule->delete();
        Session::flash('msg', 'Schedule Deleted Successfully');
        return redirect('/bus-schedule');
    }
}