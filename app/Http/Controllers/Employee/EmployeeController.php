<?php

namespace App\Http\Controllers\Employee;

use App\Employee;
use App\Company;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\EmployeesRequest;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $employees = Employee::latest()->paginate(5);
        return view('employees.index', compact('employees'))->with('i', (request()->input('page',1) -1)*5);
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
	    $companies = Company::all();
        return view('employees.create', compact('companies'));
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
		    'company_id' => 'required',
		    'email' => 'required'
	    ]);
	    employees::create($request ->all());
	    return redirect()->route('employees.index')
		    ->with('success','new employee added successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $employees = Employee::findOrFail($id);
        $companies = Company::all();
        // return to the edit views
        return view('employees.edit',compact('employees','companies'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'name'=>'required', 
            'company_id'=>'required', 
            'email'=>'required' 
            ]);
$employees = Employee::find($id); 
$employees->name = $request->get('name'); 
$employees->company_id = $request->get('company_id');
$employees->email = $request->get('email'); 

$employees->save();
return redirect()->route('employees.index')->with('success','employee edited');  
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $employees = employee::find($id); $employees->delete(); 

	    return redirect()->route('employees.index')->with('success','employee deleted'); 
    }
}
