<?php

namespace App\Http\Controllers;

use App\Models\Account;
use Illuminate\Http\Request;

class AdminApplicationController extends Controller
{
    
    public function __construct(){
        return $this->middleware('auth:admin');
    }

    public function index()
    {
        
        return view('applications.index');
    }

}
