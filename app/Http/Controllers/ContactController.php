<?php

namespace App\Http\Controllers;

use App\Models\Report;
use App\Mail\SendReport;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    //
    public function create (){ 
        return view('report');
    }
    
    public function store(Request $request){
    $data = $request->all();
    Report::create($data);
    \Mail::send(new SendReport($data));
    return back()->with('success', 'شكرا لتواصلك');
    }
}
