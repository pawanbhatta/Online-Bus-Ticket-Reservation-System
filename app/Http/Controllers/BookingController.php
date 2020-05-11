<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Booking;
use App\Bus;
use App\BusSchedule;
use App\Station;
use Auth;
use DB;
use Session;

class BookingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $bookings = Booking::all();
        $buses = Bus::all();
        return view('customer.index', ['layout' => 'checklist', 'bookings' => $bookings, 'buses' => $buses]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($schedule_id)
    {
        $schedule = DB::table('bus_schedules')->where('schedule_id', '=', $schedule_id)->first();
        $bus = DB::table('buses')->where('bus_id', '=', $schedule->bus_id)->first();

        $seats = json_decode($bus->seats);
        
        return view('customer.index', ['schedule' => $schedule, 'layout' => 'addBooking', 'seats' => $seats, 'bus' => $bus]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $schedule_id)
    {
        $booking = new Booking;

        $this->validate($request, [
            'seats_booked'  =>  'required',
            'source'        =>  'required',
            'destination'   =>  'required',
            // 'status'        =>  'required',
        ]);

        $schedule = DB::table('bus_schedules')->where('schedule_id', '=', $schedule_id)->first();
        $bus = DB::table('buses')->where('bus_id', '=', $schedule->bus_id)->first();

        // if(in_array(($request->source), (array)$schedule->stations)){

        //     if(in_array(($request->destination), (array)$schedule->stations)){
            // if(count(array_intersect(array(ucfirst($request->source), ucfirst($request->destination)), (array)$schedule->stations)) == 2){
                $booking->customer_id = Auth::id();
                $booking->bus_id    =   $schedule->bus_id;
                $booking->schedule_id    =   $schedule->schedule_id;
                $booking->total_price = (int)$request->price * count($request->seats_booked);
                $booking->seats_booked = $request->seats_booked;
                $booking->source = ucfirst($request->source);
                $booking->destination = ucfirst($request->destination);
        
                if(isset($request->status)){
                    $booking->status = 1;
                }else{
                    $booking->status = 0;
                }

                (array)$bus->seats = array_merge((array)$bus->seats, $request->seats_booked);
                // $bus->save();
        
                $booking->save();

                $bookings = Booking::all();
                $buses = Bus::all();

                Session::flash('success', 'Your Seat Booked Successsfully');

                return view('customer.index', ['layout' => 'checklist', 'buses' => $buses, 'bookings' => $bookings]);
            // }else{
            //     Session::flash('success', 'Please Check Your Destination Address');
            // return redirect()->back();
            // }
        // else{
        //     Session::flash('error', 'Please Check Your Source Address');
        //     return redirect()->back();
        // }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $booking = Booking::find($id);
        return view('customer.index', ['layout' => 'editBooking', 'booking' => $booking]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $booking = Booking::find($id);
        $schedule = DB::table('bus_schedules')->where('schedule_id', '=', $booking->schedule_id)->first();
        return view('customer.index', ['layout' => 'editBooking', 'booking' => $booking, 'schedule' => $schedule]);
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
        $bookings = Booking::all();
        $buses = Bus::all();
        $booking = Booking::find($id);
        
        $this->validate($request, [
            'seats_booked'  =>  'required',
            'source'        =>  'required',
            'destination'   =>  'required',
            // 'status'        =>  'required',
        ]);

        $schedule = DB::table('bus_schedules')->where('schedule_id', '=', $booking->schedule_id)->first();
        $bus = DB::table('buses')->where('bus_id', '=', $booking->bus_id)->first();
        
        // if(in_array(ucfirst($request->source), ucfirst($request->destination), array($bus->stations))){
            $booking->customer_id = Auth::id();
            $booking->bus_id    =   $schedule->bus_id;
            $booking->schedule_id    =   $schedule->schedule_id;
            $booking->total_price = (int)$request->price * count($request->seats_booked);
            $booking->seats_booked = $request->seats_booked;
            $booking->source = $request->source;
            $booking->destination = $request->destination;
    
            if(isset($request->status)){
                $booking->status = 1;
            }else{
                $booking->status = 0;
            }
    
            $booking->save();

            Session::flash('success', 'Your Ticket Updated Successsfully');

            return view('customer.index', ['layout' => 'checklist', 'buses' => $buses, 'bookings' => $bookings]);

        // }else{
            // Session::flash('error', 'Please Check Your Source or Destination Address');
            // return redirect()->back();
        // }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $booking = Booking::find($id);
        // $bus = DB::table('buses')->where('bus_id', '=', $booking->bus_id);
        // foreach ($booking->seats_booked as $key => $seat) {
        //     if(in_array($seat, $bus->seats)){
        //         $seats_removed = array_pop($bus->seats);
        //     }
        // }
        $booking->delete();
        Session::flash('success', 'Your Reservation Removed Successfully');
        return redirect(route('booking.index'));
    }
}