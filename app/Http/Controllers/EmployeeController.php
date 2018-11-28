<?php

namespace App\Http\Controllers;

use App\Employee;
use App\Department;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        $department = Department::findOrFail($id);
        return view('employees')->with(compact('department'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $employee = new Employee();
        $employee->name = $request->get('name');
        $employee->dob = $request->get('dob');
        $employee->address = $request->get('address');
        $employee->email = $request->get('email');
        $employee->contact = $request->get('contact');
        $employee->company_id = $request->get('company_id');
        $employee->save();

        $department = Department::findOrFail($request->get('department_id'));
        $employee->departments()->attach($department);

        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function show(Employee $employee)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function edit(Employee $employee)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $employee_id)
    {
        $employee = Employee::findOrFail($employee_id);
        $employee->name = $request->get('name');
        $employee->dob = $request->get('dob');
        $employee->address = $request->get('address');
        $employee->email = $request->get('email');
        $employee->contact = $request->get('contact');

        $employee->save();
        return redirect()->back()->with('success', 'Employee Data has been Successfully updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function destroy($employee_id)
    {
        $employee = Employee::findOrFail($employee_id);
        $employee->departments()->sync([]);
        $employee->delete();

        return redirect()->back()->with('success', 'Employee has been Successfully deleted!');
    }
}
