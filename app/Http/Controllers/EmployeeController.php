<?php

namespace App\Http\Controllers;

use App\Http\Requests\EmployeeRequest;
use App\Http\Resources\EmployeeResource;
use App\Models\Employee;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        return view('employees.index', [
            'employees' => (new Employee)->all()
        ]);
    }

    public function create()
    {
        return view('employees.create');
    }

    public function store(EmployeeRequest $request)
    {
        $employee = (new Employee)->fill($request->all());
        $employee->save();

        return redirect()->route('employees.index');
    }

    public function show(Employee $employee): EmployeeResource
    {
        return new EmployeeResource($employee);
    }

    public function edit(Employee $employee)
    {
        return view('employees.edit', [
            'employee' => $employee
        ]);
    }

    public function update(EmployeeRequest $request, Employee $employee)
    {
        $employee->update($request->all());

        return redirect()->route('employees.index');
    }

    public function destroy(Employee $employee)
    {
        $employee->delete();

        return redirect()->route('employees.index');
    }
}
