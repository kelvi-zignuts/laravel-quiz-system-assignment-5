<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Question;
use App\Models\Test;

class QuestionController extends Controller
{
    public function index($id)
    {
        $questions = Question::all();
        // $questions = Question::where('test_id',$testId)->get();

        return view('role-permission.questions.index',['questions'=>$questions, 'test_id' => $id]);
    }
    public function create($id)
    {
        // $test = Test::all();

        return view('role-permission.questions.create',['test_id' => $id]);
    }
    public function store(Request $request)
    {
       
        $request->validate([
            'test_id'=>'required',
            'question'=>'required',
            'option_a'=>'required',
            'option_b'=>'required',
            'option_c'=>'required',
            'option_d'=>'required',
            'correct_option'=>'required|in:a,b,c,d',
        ]);
       
        Question::create($request->all());
        
            // return redirect()->bak()->with('success','question created successfully');
        return redirect()->route('questions.index',['id'=>$request->test_id])->with('success','question created successfully.');
    }
}
