<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\Hotel;
use App\Models\Review;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;

class ReviewController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // dd()
        // $r = Review::all();
        // dd($r);
        $rates = Review::orderBy('id', 'desc')->paginate(4);
        // dd($rates);
        return view('admins.rates.index', ['rates' => $rates]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $hotels = Hotel::all();

        if (!$hotels->isEmpty()) {
            $rates = Review::all();
            $customers = Customer::all();
            return view('admins.rates.create', compact('hotels', 'rates', 'customers'));
        } else {
            return redirect()->route('admins.rates.index');
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request);
        $validator = Validator::make($request->all(), [
            'star' => 'required|integer',
            'comment' => 'required|string',
            'hotel_id' => 'required|integer|exists:hotels,id',
            'customer_id' => 'required|integer|exists:customers,id',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        Review::create($validator->validated());

        return redirect()->route('admins.rates.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Rate  $rate
     * @return \Illuminate\Http\Response
     */
    public function show(Review $rate)
    {
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Rate  $rate
     * @return \Illuminate\Http\Response
     */
    public function edit(Review $rate, $id, $hotel_id, $customer_id)
    {
        $message  = ['id.exists' => 'id not exists'];
        $validator = Validator::make(
            ['id' => $id],
            ['id' => 'required|integer'],
            $message
        );
        if ($validator->fails()) {
            return $validator->errors();
        }
        $rates =  Review::find($id);
        $customers = Customer::all();
        $hotels = Hotel::all();
        return view('admins.rates.update', ['hotels' => $hotels, 'customers' => $customers, 'rates' => $rates]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Rate  $rate
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // dd($request->all());

        $message  = ['id.exists' => 'id not exists'];
        $validator = Validator::make(
            $request->all(),
            [
                'star' => "required|numeric",
                'comment' => "required|string",
                'customer_id' => "required|integer|exists:customers,id",
                'hotel_id' => "required|integer|exists:hotels,id",
            ],
            $message
        );
        if ($validator->fails()) {
            return $validator->errors();
        }
        $rates = Review::find($id);
        $rates->update($request->all());
        //PRG
        return Redirect::route('admins.rates.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Rate  $rate
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Review::find($id);
        Review::destroy($id);
        return Redirect::route('admins.rates.index');
    }
}
