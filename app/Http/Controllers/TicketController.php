<?php

namespace App\Http\Controllers;

use App\Models\ticket;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;


class TicketController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $ticket = ticket::all();
        return view('thicket.index', ['ticket' => $ticket]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return route('auth.ticket.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        if ($request->isMethod('POST')) {
            $validate = Validator::make($request->all(), [
                'company_id' => 'required|exists:companies,id|integer',
                'city_id' => 'required|exists:cities,id',
                'date_s' => 'required|date',
                'date_e' => 'required|date|after_or_equal:date_s',
            ]);
            if ($validate->fails()) {
                return redirect()->route('tiket.create')->withErrors($validate)->withInput();
            }
            $ticket = ticket::create([
                'company_id' => $request->company_id,
                'city_id' => $request->city_id,
                'date_s' =>  $request->date_s,
                'date_e' => $request->date_e,
            ]);           
            return redirect()->route('ticket.show',['id' => $ticket->id]);
            //dd($ticket);
        } 
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ticket  $ticket
     * @return \Illuminate\Http\Response
     */
    public function show(ticket $ticket, $id)
    {
        //
        $ticket = ticket::find($id);
        return view('auth.ticket.show', ['ticket' => $ticket]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ticket  $ticket
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $ticket = ticket::find($id);
        return view('auth.tickets.edit', ['ticket' => $ticket]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ticket  $ticket
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ticket $ticket, $id)
    {
        //
        $validate = Validator::make($request->all(), [
            'company_id' => 'required|exists:companies,id|integer',
            'city_id' => 'required|exists:cities,id',
            'date_s' => 'required|date',
            'date_e' => 'required|date|after_or_equal:date_s',
        ]);
        if ($validate->fails()) {
            return $this->edit($id);
        }
        if ($request->isMethod('POST')) {
            $ticket->company_id = $request->company_id;
            $ticket->city_id = $request->city_id;
            $ticket->date_s = $request->date_s;
            $ticket->date_e = $request->date_e;
            $ticket->save();
        } else {
            return $this->edit($id);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ticket  $ticket
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $ticket = ticket::find($id);
        $ticket->delete();
        return redirect()->route('ticket.index');
    }
}
