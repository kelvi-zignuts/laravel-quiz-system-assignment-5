<?php

namespace App\Http\Controllers;

use App\Models\Test;
use App\Models\Question;
use Illuminate\Http\Request;

class userTestController extends Controller
{
    public function index()
    {
        $tests = Test::all();
        return view('user-module.index' ,['tests'=>$tests]);
    }
    // public function startExam(Test $test)
    // {
    //     $questions = $test->questions;
    //     return view('user.tests.startExam');
    // }
    public function startExam($id)
    {
        $questions = Question::where('test_id',$id)->get();
        // $questions = Question::all();
        // dd($questions);
        return view('user-module.select-exam',['questions'=>$questions]);
    }
    // public function selectTest(Request $request)
    // {
    //     $testId = $request->input('test_id');
    //     return redirect("/select-exam/$testId");
    // }
    // public function showSelectedTest($id)
    // {
    //     $test = TestModel::findOrFail($id);
    //     return view('select-exam',['test'=>$test]);
    // }
}
