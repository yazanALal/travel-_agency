<?php

namespace App\Http\Controllers;

use App\Models\ticket;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use App\Models\city;
use App\Models\company;



class TicketController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //
        $query = $request->all();

        $ticket = Ticket::when($request->start_date, function ($queryBuilder) use ($request) {
            $queryBuilder->where('date_s', '>=', $request->start_date);
        })
            ->when($request->end_date, function ($queryBuilder) use ($request) {
                $queryBuilder->where('date_e', '<=', $request->end_date);
            })
            ->get();

        return view('auth.ticket.index', ['tickets' => $ticket, 'query' => $query]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        // return view('auth.ticket.create');
        $companies = company::all();
        $cities = city::all();

        return view('auth.ticket.create', ['companies' => $companies, 'cities' => $cities]);
    
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
                return redirect()->route('ticket.create')->withErrors($validate)->withInput();
            }
            $ticket = ticket::create([
                'company_id' => $request->company_id,
                'city_id' => $request->city_id,
                'date_s' =>  $request->date_s,
                'date_e' => $request->date_e,
            ]);
            return redirect()->route('ticket.show', ['id' => $ticket->id]);
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
        $ticket = Ticket::with('company')->find($id);
        $ticket = Ticket::with('company', 'city')->find($id);
        return view('auth.ticket.show', ['ticket' => $ticket]);
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
        // $ticket = ticket::find($id);
        // return view('auth.ticket.edit', ['ticket' => $ticket]);
        $ticket = Ticket::find($id);
        $companies = Company::all();
        $cities = City::all();
        return view('auth.ticket.edit', ['ticket' => $ticket, 'companies' => $companies, 'cities' => $cities]);
    
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
            return redirect()->route('ticket.edit', ['id' => $id])->withErrors($validate)->withInput();
        }
        if ($request->isMethod('POST')) {
            $ticket->company_id = $request->company_id;
            $ticket->city_id = $request->city_id;
            $ticket->date_s = $request->date_s;
            $ticket->date_e = $request->date_e;
            $ticket->save();
            return redirect()->route('ticket.show', ['id' => $ticket->id]);
        } else {
            return redirect()->route('ticket.index');
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
