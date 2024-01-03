<?php

namespace App\Http\Controllers;

use App\Models\company;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
class CompanyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //
        // $companies  = company::all();
        // return view('auth.company.index', ['company' => $companies]);
        $query = $request->get('query');
        $companies = Company::when($query, function ($queryBuilder) use ($query) {
            $queryBuilder->where('name', 'like', '%' . $query . '%')
                ->orWhere('phone', 'like', '%' . $query . '%');
        })->get();

        return view('auth.company.index', ['company' => $companies]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('auth.company.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request , company $company)
    {
        //
        if ($request->isMethod('POST')) {
            $validate = Validator::make($request->all(), [
                'name' => 'required|string|max:30',
                'phone' => ['required', 'regex:/^(?:\+963|09)[0-9]+$/', 'digits_between:10,14', 'numeric'],
            ]);
            if ($validate->fails()) {
                return redirect()->route('company.create')->withErrors($validate)->withInput();
            }
            $existingCompany = Company::where('phone', $request->phone)->first();

            if ($existingCompany) {
                return redirect()->route('company.create')->withErrors(['phone' => 'Phone number already exists']);
            }
            $existingCompany = Company::where('name', $request->name)->first();

            if ($existingCompany) {
                return redirect()->route('company.create')->withErrors(['name' => 'Company name already exists']);
            }
            $company = company::create([
                'name' => $request->name,
                'phone' => $request->phone
            ]);
            return redirect()->route('company.show', ['id' => $company->id]);
            // dd($company);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $company = Company::find($id);
        return view('auth.company.show', ['company' => $company]);        
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $company = company::find($id);
        return view('auth.company.edit', ['company' => $company]);
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
        //
        $validate = Validator::make($request->all(), [
            'name' => 'required|string|max:30',
            'phone' => ['required', 'regex:/^(?:\+963|09)[0-9]+$/', 'digits_between:10,14', 'numeric'],
        ]);
        if ($validate->fails()) {
            return redirect()->route('company.edit', ['id' => $id])->withErrors($validate)->withInput();
            // dd($validate->errors()->all());
        }
        if ($validate->fails()) {
            return redirect()->route('company.edit')->withErrors($validate)->withInput();
        }
        if ($request->isMethod('POST')) {
            $company = company::find($id);
            $company->name = $request->name;
            $company->phone = $request->phone;
            $company->save();

            // return $this->show($company, $id);
            return redirect()->route('company.show', ['id' => $company->id]);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $company = company::find($id);
        $company->delete();
        return redirect()->route('company.index');
    }
}
