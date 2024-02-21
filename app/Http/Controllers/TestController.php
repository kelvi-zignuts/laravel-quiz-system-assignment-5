<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Test;

class TestController extends Controller
{
    public function index()
    {
        $tests = Test::all();
        return view('role-permission.permissions', ['tests'=>$tests]);
    }
    public function create(){
        return view('role-permission.form-role');
    }
    public function store(Request $request)
    {
        // $request->validate([
        //     'name'=> 'required',
        //     'description' => 'required',
        //     'level' => 'required',
        // ]);
        $ValidateData=$request->validate([
            'name'=> 'required',
            'description' => 'required',
            'level' => 'required',
        ]);
    
        $test  = Test::create($ValidateData);
        // $test = Test::create($ValidateData);

        // $test = new Test;
        // $test->name= $request->name;
        // $test->description = $request->description;
        // $test->level = $request->level;
        // $test->save();

        // return redirect()->back()->with('success','Test created successfully');
        return redirect()->route('dashboard')->with('success','Test created successfully');
    }
    // public function show()
    // {
    //     $test = 
    // }

}
