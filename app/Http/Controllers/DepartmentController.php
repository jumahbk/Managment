<?php

namespace App\Http\Controllers;

use App\Branch;
use App\Company;
use App\Department;
use App\Employee;
use Illuminate\Http\Request;
use Illuminate\View\View;

class DepartmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Department::all();
        return view('departments.index', compact('data'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $companies = Company::all();
        $branches = Branch::all();
        $employees = Employee::all();
        return view('departments.create' ,  compact( 'companies','branches', 'employees'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->save($request, -1);
        return redirect('/departments');
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
    }


    public function save(Request $request, $id)
    {

        $department = new Department();
        if($id !== -1)
        {
            $department = Department::find($id);
        }
        $department->englishName = $request['englishName'];
        $department->arabicName = $request['arabicName'];
        $department->employee_id = $request['employee_id'];
        $department->employee_id = $request['branch_id'];
        $department->push();



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
    }
}
