<?php

namespace App\Http\Controllers\Student;

use App\Models\Result;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class StudentController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:student');
    }

    public function index()
    {
        return view('Student.dashboard');
    }

    public function result(Request $request)
    {
        $result =  Result::where('id', '=', $request->id)->first();
        return response()->json($result);
    }
}
