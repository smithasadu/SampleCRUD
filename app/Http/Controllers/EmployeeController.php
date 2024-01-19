<?php
namespace App\Http\Controllers;
use App\Models\Employee;
use App\Models\Company;
use App\Http\Requests\StoreemployeeRequest;
use App\Http\Requests\UpdateemployeeRequest;
use Yajra\DataTables\Facades\Datatables;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Session;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        
        if ($request->ajax()) {
            return DataTables::of(Employee::query())
            ->addColumn('companyname', function ($employee) {
                return $employee->company->companyname;
            })
            ->addColumn('action', function ($employee) {
                return '<nobr>
                            <a href="' . route('employees.show', $employee->id) . '" class="btn btn-primary">View</a>
                            <a href="' . route('employees.edit', $employee->id) . '" class="btn btn-warning">Edit</a>
                            <button data-id="' . $employee->id . '" class="btn btn-danger delete-btn">Delete</button>
                        </nobr>';
            })
            ->rawColumns(['action'])
            // ->orderBy('companyname', 'asc')
            ->make(true);
        }
        return view('employees.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $companies = Company::orderby('companyname')->get();
        return view('employees.create', ['companies' => $companies]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreemployeeRequest $request)
    {
        Employee::create([
            'company_id'=>$request->company_id,
            'firstname'=>$request->firstname,
            'lastname'=>$request->lastname,
            'email'=>$request->email,
            'phone'=>$request->phone
        ]);
        Session::flash('alert-class', 'bg-success');
        Session::flash('message', 'Created Successfully');
        return redirect()->route('employees.index');     
    }

    /**
     * Display the specified resource.
     */
    public function show(employee $employee)
    {
        return view('employees.show')->with('employee',$employee);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(employee $employee)
    {
        $companies = Company::orderby('companyname')->get();
        return view('employees.edit', ['employee'=>$employee,'companies'=>$companies]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateemployeeRequest $request, employee $employee)
    {
        $employee->company_id = $request->company_id;
        $employee->firstname = $request->input('firstname');
        $employee->lastname = $request->input('lastname');
        $employee->email = $request->input('email');
        $employee->phone = $request->input('phone');
        $employee->save();
        Session::flash('alert-class', 'bg-success');
        Session::flash('message', 'Updated Successfully');
        return redirect()->route('employees.index');     
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(employee $employee)
    {
        $employee->delete();
    }
}
