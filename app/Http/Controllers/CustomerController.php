<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        $customers =  Customer::paginate(4);
        return view('admins.customers.index', ['customers' => $customers]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $customers = Customer::all();
        return view('admins.customers.create', compact('customers'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validateCustomer = Validator::make(
            $request->all(),
            [
                'name' => "required|string",
                'email' => "required|email|unique:customers,email|max:255",
                'gender' => "required|string",
                'phone' => [
                    'required',
                    'regex:/^\+(?:[0-9] ?){6,14}[0-9]$/',
                ],
            ]
        );
        if ($validateCustomer->fails()) {
            return dd($validateCustomer->errors());
        } else {
            Customer::create($request->all());
            return Redirect::route('admins.customers.index');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $customer = Customer::find($id);
        return view('admins.customer.show', ['customer' => $customer]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function edit(Customer $customer, $id)
    {
        
        $customers = Customer::all();
        return view('admins.customers.update', ['customers' => $customers]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $customer = Customer::find($id);
        $validateCustomer = Validator::make(
            $request->all(),
            [
                'name' => "required|string",
                'email' => "required|email|unique:customers,email|max:255",
                'gender' => "required|string",
                'phone' => [
                    'required',
                    'regex:/^\+(?:[0-9] ?){6,14}[0-9]$/',
                ],
            ]
        );
        if ($validateCustomer->fails()) {
            return dd($validateCustomer->errors());
        } else {
            $customer->update($request->all());
            return Redirect::route('admins.cistomers.index');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Customer::find($id);
        Customer::destroy($id);
        return Redirect::route('admins.customers.index');
    }
}
