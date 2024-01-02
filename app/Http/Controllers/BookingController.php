<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\City;
use App\Models\Customer;
use App\Models\Hotel;
use App\Models\Ticket;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;


class BookingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $bookings=Booking::all();
        return view('booking.booking', compact('bookings'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $hotels = Hotel::orderBy('name', 'asc')->get();
        $cities=City::orderBy('name', 'asc')->get();
        $customers=Customer::orderBy('name', 'asc')->get();
        $tickets=Ticket::all();
        return view('booking.create',compact('hotels', 'cities', 'customers', 'tickets'));
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try {
            $validator = Validator::make($request->all(), [
                'customer_id' => 'required|integer|exists:customers,id',
                "hotel_id" => 'required|integer|exists:hotels,id',
                'ticket_id' => 'required|integer|exists:tickets,id',
            ]);

            if ($validator->fails()) {
                return back()
                    ->withErrors($validator);
            }
            Booking::create([
                'customer_id' =>$request->customer_id,
                "hotel_id"=>$request->hotel_id,
                "ticket_id"=>$request->ticket_id,
            ]);
            return redirect("bookings")->with('success','booking created successfully');
        } catch (Exception $e) {
            return redirect()->back()->withErrors('An error occurred');
        } 
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Booking  $booking
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $validateId=Validator::make(
            ['id' => $id],
            [
                "id"=>'integer|exists:bookings,id'
            ]
            
        );
        if($validateId->fails()){
            return redirect("bookings");
        }
        $booking = Booking::find($id);
        return view('booking.show', compact('booking'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Booking  $booking
     * @return \Illuminate\Http\Response
     */
    public function edit($id,Booking $booking)
    {
        $validateId = Validator::make(
            ['id' => $id],
            [
                "id" => 'integer|exists:bookings,id',
            ]

        );
        if ($validateId->fails()) {
            return redirect()->back();
        }
        $booking = Booking::find($id);
        $hotels = Hotel::orderBy('name', 'asc')->get();
        $cities = City::orderBy('name', 'asc')->get();
        $customers = Customer::orderBy('name', 'asc')->get();
        $tickets = Ticket::all();
        return view('booking.edit', compact('hotels', 'cities', 'customers', 'tickets','booking'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Booking  $booking
     * @return \Illuminate\Http\Response
     */
    public function update($id,Request $request, Booking $booking)
    {
        try {
            $validateId = Validator::make(
                ['id' => $id],
                [
                    "id" => 'integer|exists:bookings,id',
                ]

            );
            if ($validateId->fails()) {
                return redirect()->back();
            }

            $validator = Validator::make($request->all(), [
                'customer_id' => 'required|integer|exists:customers,id',
                "hotel_id" => 'required|integer|exists:hotels,id',
                'ticket_id' => 'required|integer|exists:tickets,id',
            ]);

            if ($validator->fails()) {
                return back()
                    ->withErrors($validator);
            }
            Booking::whereId($id)->update([
                'customer_id' => $request->customer_id,
                "hotel_id" => $request->hotel_id,
                "ticket_id" => $request->ticket_id,
            ]);
            return redirect('show-booking/'.$id)->with('success', 'booking updated successfully');
        } catch (Exception $e) {
            return redirect()->back()->withErrors('An error occurred');
        } 
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Booking  $booking
     * @return \Illuminate\Http\Response
     */
    public function destroy($id,Booking $booking)
    {
        $validateId = Validator::make(
            ['id' => $id],
            [
                "id" => 'integer|exists:bookings,id',
            ]

        );
        if ($validateId->fails()) {
            return redirect("bookings");
        }
        $delete=Booking::whereId($id)->delete();
        if($delete>0){
            return redirect("bookings")->with('success','booking deleted successfully');
        }
        else{
            return redirect()->back()->withErrors( 'Oops some thing went wrong try again');
        }
    }
}
