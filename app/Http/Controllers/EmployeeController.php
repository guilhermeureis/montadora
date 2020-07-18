<?php

namespace App\Http\Controllers;

use App\Employee;
use App\Branch;
use App\Gender;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;

class EmployeeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    protected function validator(array $data)
    {
        return Validator::make($data, [
            'branch_id' => 'required',
            'name' => 'required|max:100',
            'birthday' => 'required|date',
            'gender_id' => 'required',
            'cpf' => 'required|formato_cpf|unique:employees',
            'full_address' => 'required|max:300',
            'role' => 'required',
            'amount' => 'required',
            'status' => 'required',
            'password' => 'required'
        ]);
    }

    protected function validator2(array $data)
    {
        Log::info($data);
        return Validator::make($data, [
            'branch_id' => 'required',
            'name' => 'required|max:100',
            'birthday' => 'required|date',
            'gender_id' => 'required',
            'cpf' => 'required|formato_cpf|unique:employees,cpf,'.$data['id'],
            'full_address' => 'required|max:300',
            'role' => 'required',
            'amount' => 'required',
            'status' => 'required',
        ]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $employees = Employee::all();
        return view('employees.index',compact('employees'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $branches = Branch::all();
        $genders = Gender::all();
        return view('employees.create', compact('genders','branches'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function store(Request $request)
    {
        $this->validator($request->all())->validate();
        $employee = new Employee();
        $employee->name = $request->name;
        $employee->branch_id = $request->branch_id;
        $employee->birthday = $request->birthday;
        $employee->gender_id = $request->gender_id;
        $employee->cpf = $request->cpf;
        $employee->full_address = $request->full_address;
        $employee->role = $request->role;
        $employee->amount = $request->amount;
        $employee->status = $request->status;
        $employee->password = bcrypt($request->password);

        $employee->save();

        return response()->json();
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
    public function edit($id)
    {
        $employee = Employee::findOrFail($id);
        $branches = Branch::all();
        $genders = Gender::all();
        return view('employees.edit', compact('genders','branches','employee'));
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
        $this->validator2($request->all())->validate();
        $employee = Employee::findOrFail($id);
        $employee->name = $request->name;
        $employee->branch_id = $request->branch_id;
        $employee->birthday = $request->birthday;
        $employee->gender_id = $request->gender_id;
        $employee->cpf = $request->cpf;
        $employee->full_address = $request->full_address;
        $employee->role = $request->role;
        $employee->amount = $request->amount;
        $employee->status = $request->status;

        $employee->save();

        return response()->json();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $employee = Employee::findOrFail($id);
        $employee->delete();
        return response()->json();
    }
}
