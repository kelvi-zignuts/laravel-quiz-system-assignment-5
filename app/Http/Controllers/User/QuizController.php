<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Test;
use App\Models\TestResult;
use App\Models\Question;

class QuizController extends Controller
{
    public function index()
    {
        $tests = Test::where('is_active', true)->get();
        return view('users.quiz.index', ['tests' => $tests]);
    }

    public function quizStart(Request $request)
    {
        // quiz start
        // show questions with options
        // user can fill/select options from questions
        // submit
        // redirect to new routes
        // function > calculate scores/ store inthe database
        // redirect back to user with their scoring
        try{
            $testId = $request->input('test');
        $questions = Question::where('test_id',$testId)->get();
        return view ('users.quiz.start',['questions'=>$questions,'testId'=>$testId]);
        }
        catch(\Exception $e){
            \Log::error('Error fetching question: '.$e->getMessage());
            return back()->with('error','error fetching questions.please try again later.');
        }
        

    }
    public function submit(Request $request)
    {
        $answers          = $request->input('answer');
        $totalQuestions   = count($answers);
        $correctAnswers   = 0;

        foreach($answers as $questionId=>$selectedOption){
            $question = Question::findOrFail($questionId);
            if($selectedOption===$question->correct_option){
                $correctAnswers++;
            }
        }
        $score = ($correctAnswers/$totalQuestions)*100;

        $testId = $request->input('test_id');
        if(!$testId){
            return back()->with('error','Test Id is requestred!');
        }

        $testResult = new TestResult();
        $testResult->test_id = $testId;
        // $testResult->test_id = $request->input('test');
        $testResult->total_questions = $totalQuestions;
        $testResult->correct_answers = $correctAnswers;
        $testResult->wrong_answers = $totalQuestions-$correctAnswers;
        $testResult->score=$score;
        $testResult->save();
        return redirect()->route('user.quiz.result',[
            'score'         =>  $score,
            'testResultId'  =>  $testResult->id
        ]);
    }
    public function result(Request $request){
        $score = $request->input('score');
        $totalQuestions = $request->input('totalQuestions');
        $correctAnswers = $request->input('correctAnswers');
        return view('users.quiz.result')
            ->with(compact('score'))
            ->with(compact('totalQuestions'))
            ->with(compact('correctAnswers'));
    }

    // public function result($testResultId){
    //     try{
    //         $testResult = TestResult::findOrFail($testResultId);
    //         $totalQuestions = $testResult->total_questions;
    //         return view('users.quiz.result',['testResult'=>$testResult,'totalQuestions'=>$totalQuestions]);
    //     }catch(\Exception $e){
    //         \Log::error('Error fetching test result: ' .$e->getMessage());
    //         return back()->with('error','Error fetching test result.please try again later.');
    //     }
    //     $score = $request->input('score');
    //     return view('users.quiz.result',compact('score'));
    // }
    
}
