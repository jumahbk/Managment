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
        //dd(Employee::find(1));
        return view('employees.index', compact('data'));
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function lic()
    {

        $data = Employee::all();
        //dd(Employee::find(1));
        return view('employees.exp', compact('data'));
    }


    public function createData(Employee $employee)
    {

        return view('employees.createData', $employee);

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

        $nats = Nationality::all();
        $ts = Title::all();
        foreach ($lines as $d)
        {

            $tokens = explode(",", $d);
         //   dd($tokens);
            //dd($tokens);
            $employee = new Employee();
            $employee->englishName = $tokens[0];
            $employee->arabicName = $tokens[1];


            $employee->company_id = 1;



            $natInput = preg_replace('/\s+/', ' ', trim($tokens[3]));
            foreach ($nats as $n)
            {
                if(preg_replace('/\s+/', ' ', trim($n->arabicName)) == $natInput || preg_replace('/\s+/', ' ', trim($n->englishName))== $natInput )
                {
                    $employee->nationality_id = $n->id;
              
                    break;
                }

            }

            $natInput = preg_replace('/\s+/', ' ', trim($tokens[4]));
            //dd($natInput);
            foreach ($ts as $n)
            {
                if(preg_replace('/\s+/', ' ', trim($n->arabicName)) == $natInput || preg_replace('/\s+/', ' ', trim($n->englishName))== $natInput )
                {
                    $employee->title_id = $n->id;
                    break;
                }

            }

            $employee->idNo = $tokens[5];
            $employee->idExp = $tokens[6];
            $employee->email = $tokens[7];
            $employee->mobile =$tokens[8];

            $employee->moh = $tokens[9];
            $employee->mohExp = $tokens[10];

            $employee->lic = $tokens[11];
            $employee->licExp = $tokens[12];

            $employee->gosi = $tokens[13];
            $employee->bankcode = $tokens[14];
            $employee->birthdate = $tokens[15];

            $employee->passNo = $tokens[16];
            $employee->passExp = $tokens[17];

            $employee->iban = $tokens[18];





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
