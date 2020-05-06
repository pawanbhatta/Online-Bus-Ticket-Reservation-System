<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Bus;
use App\BusSchedule;
use DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('customer.index', ['layout' => 'index']);
    }

    public function enquiry(Request $request)
    {
        $source = $request->source;
        $dest = $request->destination;
        $date = $request->travel_date;

        // $buses = DB::table('buses')
        //    ->where('pickup_address', '=', $source)
        //    ->where(function ($query) {
        //        $query->where('dropoff_address', '=', $dest)
        //              ->orWhere('depart_date', '=', $date);
        //    })
        //    ->get();
        // $buses = DB::table('buses')->where('pickup_address', '=', $source)->get();
        
        // $bus = DB::table('buses')->where('bus_id', '=', '');
        $schedules = BusSchedule::all();

        return view('customer.index', ['schedules' => $schedules, 'layout' => 'schedules', 'source' => $source, 'dest' => $dest, 'date' => $date]);
    }
}