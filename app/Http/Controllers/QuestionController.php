<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Question;
use App\Models\Test;

class QuestionController extends Controller
{
    public function index($id)
    {
        // $questions = Question::all();
        $questions = Question::where('test_id',$id)->get();
        // $questions = Question::with('options')->get();
        return view('admin.test.question.index',['questions'=>$questions, 'test_id' => $id]);
    }
    public function create($id)
    {
        // $test = Test::all();

        return view('admin.test.question.create',['test_id' => $id]);
    }
    public function store(Request $request, $id)
    {
        Test::findOrFail($id);

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
        return redirect()->route('admin.test.question.index',['id'=>$id])->with('success','question created successfully.');
    }
    public function edit($id){
        $question = Question::findOrFail($id);
        $test_id = $question->test_id;
        return view('test-module.questions.edit-question',compact('question','test_id'));
    }
    public function update(Request $request, $id){
        $question = Question::findOrFail($id);
        $test_id = $question->test_id;
        $question->update($request->all());
        return redirect()->route('admin.test.question.index',['id'=>$test_id])->with('success','question update successfully');
    }
    public function destroy($id){
        $question = Question::findOrFail($id);
        $test_id = $question->test_id;
        $question->delete();
        return redirect()->route('admin.test.question.index',['id'=>$test_id])->with('success','question deleted successfully');
    }
}
