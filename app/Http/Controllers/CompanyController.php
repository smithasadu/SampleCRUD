<?php
namespace App\Http\Controllers;
use App\Models\Company;
use App\Http\Requests\StorecompanyRequest;
use App\Http\Requests\UpdatecompanyRequest;
use Yajra\DataTables\Facades\Datatables;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Session;

class CompanyController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            return DataTables::of(Company::query())
            ->addColumn('logo', function ($company) {
                return '<img src="' . asset('storage/' . $company->logo) . '" alt="Company Logo" style="max-width: 100px;">';
            })
            ->addColumn('action', function ($company) {
                return '<nobr>
                            <a href="' . route('companies.show', $company->id) . '" class="btn btn-primary">View</a>
                            <a href="' . route('companies.edit', $company->id) . '" class="btn btn-warning">Edit</a>
                            <button data-id="' . $company->id . '" class="btn btn-danger delete-btn">Delete</button>
                        </nobr>';
            })
            ->rawColumns(['logo', 'action'])
            ->make(true);
        }
        return view('companies.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('companies.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorecompanyRequest $request)
    {
        if ($request->hasFile('logo')) {
            $disk = 'public';
            $directory = 'storage';
            $path = $request->file('logo')->store($directory, $disk);
        } else {
            $path = '';
        }
        Company::create([
            'companyname'=>$request->companyname,
            'logo'=>$path,
            'email'=>$request->email,
            'website'=>$request->website
        ]);
        Session::flash('alert-class', 'bg-success');
        Session::flash('message', 'Created Successfully');
        return redirect()->route('companies.index');     
    }

    /**
     * Display the specified resource.
     */
    public function show(company $company)
    {
        return view('companies.show')->with('company',$company);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(company $company)
    {
        return view('companies.edit')->with('company',$company);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatecompanyRequest $request, company $company)
    {
        $company->companyname = $request->companyname;
        $company->email = $request->input('email');
        $company->website = $request->input('website');
        if ($request->hasFile('logo')) {
            // Delete existing file if it exists
            if ($company->logo) {
                Storage::delete($company->logo);
            }
            // Upload the new file
            $disk = 'public';
            $directory = 'storage';
            $path = $request->file('logo')->store($directory, $disk);
            $company->logo = $path;
        }
        // Save the changes to the database
        $company->save();
        Session::flash('alert-class', 'bg-success');
        Session::flash('message', 'Updated Successfully');
        return redirect()->route('companies.index');     
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(company $company)
    {
        // Delete existing file if it exists
        if ($company->logo) {
            Storage::delete($company->logo);
        }
        $company->delete();
    }
}
