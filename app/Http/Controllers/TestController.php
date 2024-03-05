<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Test;
use App\Models\User;

class TestController extends Controller
{
    //show list of active test in index page
    public function index()
    {
        $tests = Test::where('is_active', true)->get();
        $totalUsers = User::where('user_type','user')->count();
        $testCount = Test::count();
        return view('admin.test.index', ['tests' => $tests,'testCount'=>$testCount,'totalUsers'=>$totalUsers]);
    }

    //create test
    public function create()
    {
        $view = view('admin.test.create')->render();
        return response()->json(['data' =>  $view, 'status' => true]);
    }

    //store in database
    public function store(Request $request)
    {
        $request->validate([
            'name'          => 'required',
            'description'   => 'required',
            'level'         => 'required',
            'is_active'     => 'nullable',
        ]);

        Test::create($request->only('name', 'description', 'level') + ['is_active' => true]);
        return redirect()->route('admin.test.index')->with('success', 'Test created successfully');
    }

    //edit test
    public function edit($id)
    {
        $test = Test::findOrFail($id);

        return view('admin.test.edit', compact('test'));
    }
    
    //update test
    public function update(Request $request, $id)
    {
        $test = Test::findOrFail($id);
        $test->update($request->only('name', 'description', 'level') + ['is_active' => true]);

        return redirect()->route('admin.test.index')->with('success', 'Test Updated successfully');
    }
    
    //delete test
    public function destroy($id)
    {
        $test = Test::findOrFail($id);
        $test->delete();

        return redirect()->route('admin.test.index')->with('success', 'Test Deleted Successfully');
    }

    //display a specific test identified by its ID
    public function show($id)
    {
        $test = Test::findOrFail($id);
        return view('admin.test.index', compact('test'));
    }

    //total test count
    public function getTestCount()
    {
        $testCount = Test::count();
        return $testCount;
    }
}
