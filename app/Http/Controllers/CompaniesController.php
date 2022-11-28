<?php

namespace App\Http\Controllers;

use App\Models\Companies;
use Illuminate\Http\Request;

class CompaniesController extends Controller
{
    public function index(Request $request){
        $companies = Companies::paginate(20);
        return view('home', compact('companies'));
    }
}
