<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Question;
use App\Models\Test;

class QuestionController extends Controller
{
    //show all questions in index page
    public function index($id)
    {
        $questions = Question::where('test_id',$id)->get();
        return view('admin.test.question.index',['questions'=>$questions, 'test_id' => $id]);
    }

    //create question
    public function create($id)
    {
        return view('admin.test.question.create',['test_id' => $id]);
    }
    
    //store in database
    public function store(Request $request, $id)
    {
        $request->validate([
            'test_id'           =>'required|exists:tests,id',
            'question'          =>'required',
            'option_a'          =>'required',
            'option_b'          =>'required',
            'option_c'          =>'required',
            'option_d'          =>'required',
            'correct_option'    =>'required|in:a,b,c,d',
        ]);
        Question::create($request->all());
        return redirect()->route('admin.test.question.index',['id'=>$id])->with('success','question created successfully.');
    }

    //edit question
    public function edit($id){
        $question = Question::findOrFail($id);
        $test_id = $question->test_id;
        $questions = Question::where('test_id', $test_id)->get();
        return view('admin.test.question.edit',compact('question','test_id'));
    }
    
    //update question
    public function update(Request $request, $id){
        $question = Question::findOrFail($id);
        $test_id = $question->test_id;
        $question->update($request->all());
        return redirect()->route('admin.test.question.index',['id'=>$test_id])->with('success','question update successfully');
    }

    //delete question
    public function destroy($id){
        $question = Question::findOrFail($id);
        $test_id = $question->test_id;
        $question->delete();
        return redirect()->route('admin.test.question.index',['id'=>$test_id])->with('success','question deleted successfully');
    }
}
