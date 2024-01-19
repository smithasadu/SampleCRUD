<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Employee;

class ApiController extends Controller
{
    public function index(Request $request)
    {
        $pageno = $request->pageno??1;
        $totalitems = $request->totalitems??10; 
        $offset = ($pageno-1)*$totalitems;
        $query = Employee::with('company')->offset($offset)->limit($totalitems);
        $employees = $query->get();

        return response()->json(['employees' => $employees]);
    }
}
