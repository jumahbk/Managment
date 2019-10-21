<?php

namespace App\Http\Controllers;

use App\Company;
use App\Employee;
use App\Nationality;
use App\Title;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $data = Employee::all();

        return view('employees.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $titles = Title::all();
        $nats = Nationality::all();
        $comps = Company::all();
        return view('employees.create', compact('nats','titles', 'comps') );

    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function batch()
    {
        return view('employees.batch');

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
        return redirect('/employees');



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
    public function edit(Employee $t)
    {

        return view('employees.edit', compact('t','t'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Employee $employee)
    {
        $this->save($request, $employee->id);
        return redirect('/employees');
    }
    public function saveBatch(Request $request)
    {
        $data = $request['data'];

        $lines = explode("\n", $data);

        foreach ($lines as $d)
        {

            $tokens = explode(",", $d);
            $employee = new Employee();
            $employee->englishName = $tokens[0];
            $employee->arabicName = $tokens[1];
            $employee->push();

        }

        redirect('/employees');

    }
    public function save(Request $request, $id)
    {
        if($request['batch'] == 1)
        {
            return $this->saveBatch($request);
        }
        $employee = new Employee();
        if($id !== -1)
        {
            $employee = Employee::find($id);
        }
        $employee->englishName = $request['englishName'];
        $employee->arabicName = $request['arabicName'];
        $employee->company_id = $request['company_id'];
        $employee->title_id = $request['title_id'];
        $employee->nationality_id = $request['nationality_id'];
        $employee->idNo = $request['idNo'];
        $employee->idExp = $request['idExp'];
        $employee->email = $request['email'];
        $employee->mobile = $request['mobile'];

        $employee->moh = $request['mohNo'];
        $employee->mohExp = $request['mohExp'];

        $employee->lic = $request['licNo'];
        $employee->licExp = $request['licExp'];

        $employee->gosi = $request['gosi'];
        $employee->bankcode = $request['bankcode'];
        $employee->birthdate = $request['brithdate'];

        $employee->passNo = $request['passNo'];
        $employee->passExp = $request['passExp'];

        $employee->iban = $request['iban'];

        $employee->push();



    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function destroy(Employee $employee)
    {
        $employee->delete = true;
        $employee->push();
        redirect('/employees');

        //
    }
}
