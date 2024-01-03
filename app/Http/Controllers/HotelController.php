<?php

namespace App\Http\Controllers;

use App\Http\Requests\Hotelrequest;
use App\Models\City;
use App\Models\Hotel;
use App\Models\Hotelimage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class HotelController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->filled('search')) {
            $search = $request->input('search');

            $hotels = Hotel::where(function ($query) use ($search) {
                $query->where('name', 'like', "%$search%");
            })
                ->orWhereHas('city', function ($cityQuery) use ($search) {
                    $cityQuery->where('name', 'like', "%$search%");
                })
                ->paginate(2);
        } else {
            $hotels = Hotel::orderBy('id', 'desc')->with('hotel_images')->paginate(4);
        }
        return view('admins.hotels.index', ['hotels' => $hotels]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $hotels = Hotel::all();
        // dd($hotels);
        $cities = City::all();
        // return view('admins.hotels.create', compact('hotels', 'cities'));
        return view('admins.hotels.create', compact('hotels', 'cities'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Hotelrequest $request)
    {
        // dd($request);
        // dd($request->file('images'));
        $data = $request->validated();
        // dd($request->file('images'));
        $hotel =  Hotel::create([
            'name' => $data['name'],
            'phone' => $data['phone'],
            'city_id' => $data['city_id'],
        ]);
        $images = $data['images'];
        foreach ($images as $image) {
            $fileName = pathinfo($image->getClientOriginalName(), PATHINFO_FILENAME);
            $imageOnServerName = time() . '_' . $fileName;
            $imageExtention = $image->guessExtension();
            $filePath = Storage::disk('public')->putFileAs("uploads", $image, $imageOnServerName . '.' . $imageExtention);
            Hotelimage::create([
                'buf' =>  $filePath,
                'hotel_id' => $hotel->id,
            ]);
        }
        return Redirect::route('admins.hotels.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Hotel  $hotel
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $hotels = Hotel::with(['hotel_images'])->find($id);
        return view('admins.hotels.show', ['hotels' => $hotels]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Hotel  $hotel
     * @return \Illuminate\Http\Response
     */
    public function edit(Hotel $hotel, $id, $city_id,)
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
        $cities = City::all();
        $hotels =  Hotel::with('hotel_images')->find($id);
        return view('admins.hotels.update', ['hotels' => $hotels, 'cities' => $cities]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Hotel  $hotel
     * @return \Illuminate\Http\Response
     */
    public function update(Hotelrequest $request, $id)
    {
        $data  = $request->validated();
        // dd($data);
        $hotels = Hotel::with('hotel_images')->findOrFail($id);
        if ($request->hasFile('images')) {
            foreach ($hotels->hotel_images as $file) {
                Storage::delete('public/' . $file->buf);
                $file->delete();
            }
            $images = $data['images'];
            foreach ($images as $image) {
                $fileName = pathinfo($image->getClientOriginalName(), PATHINFO_FILENAME);
                $imageOnServerName = time() . '_' . $fileName;
                $imageExtention = $image->guessExtension();
                $filePath = Storage::disk('public')->putFileAs("uploads", $image, $imageOnServerName . '.' . $imageExtention);
                Hotelimage::create([
                    'buf' =>  $filePath,
                    'hotel_id' => $hotels->id,
                ]);
            }
        }
        $hotels->update($data);
        //PRG
        return Redirect::route('admins.hotels.index');
    }
    // show all rates for specific Hotel

    public function showRate($id)
    {
        $hotel = Hotel::find($id);
        $rates = $hotel->rates;
        return view('admins.hotels.review', ['rates' => $rates, 'hotel' => $hotel]);
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Hotel  $hotel
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $hotel =  Hotel::with('hotel_images')->find($id);
        if (!$hotel) {
            return redirect()->route('admins.hotels.index')->with('error', 'Hotel not found');
        }
        $hotelImages = $hotel->hotel_Images;
        foreach ($hotelImages as $image) {
            $path = $image->buf;
            if (Storage::disk('public')->exists($path)) {
                Storage::disk('public')->delete($path);
            }
        }
        $hotel->delete();
        return Redirect::route('admins.hotels.index');
    }
}
