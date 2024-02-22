<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Test;

class TestController extends Controller
{
    public function index()
    {
        $tests = Test::all();
        return view('test.permissions', ['tests'=>$tests]);
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
        return redirect()->route('role.permission.list')->with('success','Test created successfully');
    }
    public function edit($id){
        $test = Test::findOrFail($id);

        return view('role-permission.edit-test',compact('test'));
    }
    public function update(Request $request,$id){
        $test = Test::findOrFail($id);
        $test->update($request->all());

        return redirect()->route('role.permission.list')->with('success','Test Updated successfully');

    }
    public function destroy($id)
    {
        $test = Test::findOrFail($id);
        $test->delete();

        return redirect()->route('role.permission.list')->with('success','Test Deleted Successfully');
    }
    public function show($id)
    {
        $test = Test::findOrFail($id);
        return view('role-permission.test-details',compact('test'));
    }


}
