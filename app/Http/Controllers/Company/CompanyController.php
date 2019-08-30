<?php

namespace App\Http\Controllers\Company;

use App\Company;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use Storage;

class CompanyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        $companies = Company::latest()->paginate(5);
        // $companies = Company::orderBy('created_at','desc')->paginate(8);
        return view('companies.index', compact('companies'))->with('i', (request()->input('page',1) -1)*5);
        //$companies = Company::all();
        //return view( view: 'admin.companies.index', compact( varname: 'companies'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        return view('companies.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'location' => 'required'
        ]);
        Company::create($request->all());
        return redirect()->route('companies.index')->with('success', 'Company added');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $companies = Company::find($id);
        return view('companies.show', compact('companies'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $companies = Company::find($id);
        return view('companies.edit', compact('companies'));
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'location' => 'required',
            'logo'    => 'nullable|image|max:1999'
        ]);
        $companies = Company::find($id);
        $companies->name = $request->name;
        $companies->email = $request->email;
        $companies->location = $request->location;
        if($request->hasFile('logo')){
            $logo = $request->logo;
            $ext = $logo->getClientOriginalExtension();
            $filename = uniqid().'.'.$ext;
            $logo->storeAs('public/pics',$filename);
            Storage::delete("public/pics/{$companies->logo}");
            $companies->logo = $filename;
        }
    
        $companies->save();
        
        
        return redirect()->route('companies.index')->with('success', 'Company added');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $companies = Company::find($id);
        $companies->delete(); 

	    return redirect()->route('companies.index')->with('success','company deleted');
    }
}
