<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Test;
use App\Models\TestResult;
use App\Models\Question;
use App\Models\UserResponse;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
// use Carbon\Carbon;

class QuizController extends Controller
{
    //show all dashboard files data 
    public function index(Request $request)
    {
        try {
            $userTestResults = TestResult::where('user_id', auth()->id())->get();
            $tests = Test::where('is_active', true)->get();
            $testCount = Test::count();
            $averageScore = $userTestResults->avg('score');
    
            return view('users.quiz.index', [
                'tests'             => $tests,
                'testCount'         => $testCount,
                'userTestResults'   => $userTestResults,
                'averageScore'      => $averageScore,
            ]);
        } catch (\Exception $e) {
            \Log::error('Error fetching tests: ' . $e->getMessage());
            return back()->with('error', 'Error fetching tests. Please check the logs for details.');
        }
    }

   //select test and start the quiz
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
            $test = Test::findOrFail($testId);
            
            $userTestResults = TestResult::where('user_id', auth()->id())->where('test_id',$testId);
            if ($userTestResults->exists()) {
                return redirect()->back()->with('error', 'You have already attempted this test.');
            }
            $questions = Question::where('test_id',$testId)->get();
            if($questions->isEmpty()){
                return redirect()->back()->with('error','Questions are not present in this test');
            }
            $timeLimit = $test->time_limit;
        return view ('users.quiz.start',['questions'=>$questions,'test'=>$test,'timeLimit' => $timeLimit]);
        }
        catch(\Exception $e){
            \Log::error('Error fetching question: '.$e->getMessage());
            return back()->with('error','error fetching questions.please try again later.');
        }
        

    }

    //when complete the quiz then  calculate scores, correct answers, incorrect answers, testname
    public function submit(Request $request)
    {
        $answers = $request->input('answer');
        $testId = $request->input('test_id');

        // Fetch all questions
        $questions = Question::where('test_id', $testId)->get();

        //score calculation
        $totalQuestions = count($questions);
        $correctAnswers = 0;

        // Iterate through each question and store user responses
        foreach ($questions as $question) {
            $selectedOption = isset($answers[$question->id]) ? $answers[$question->id] : null;
            $isCorrect = $selectedOption === $question->correct_option;

            // Store user response in the UserResponse table
            UserResponse::create([
                'user_id'             => auth()->user()->id,
                'test_id'             => $testId,
                'question_id'         => $question->id,
                'selected_option'     => $selectedOption,
                'is_correct'          => $isCorrect,
            ]);

            // Update correctAnswers count
            if ($isCorrect) {
                $correctAnswers++;
            }
        }

        // Calculate the score
        $score = ($correctAnswers / $totalQuestions) * 100;

        // Save the test result

        $testResult = new TestResult();
        $testResult->test_id = $testId;
        $testResult->user_id = auth()->user()->id;
        $testResult->total_questions = $totalQuestions;
        $testResult->correct_answers = $correctAnswers;
        $testResult->wrong_answers = $totalQuestions - $correctAnswers;
        $testResult->score = $score;
        $testResult->save();

        // Redirect to the result page
        return redirect()->route('user.quiz.result', ['testResultId' => $testResult->id]);
    }

    //show result page (testname, totalquestions,correctanswers,score)
    public function result(Request $request)
    {
        try{
            $testResultId       = $request->route('testResultId');
            $testResult         = TestResult::findOrFail($testResultId);
            $testName           = $testResult->test->name;
            $totalQuestions     = $testResult->total_questions;
            $correctAnswers     = $testResult->correct_answers;
            $score              = $testResult->score;
            return view('users.quiz.result',compact('testName','totalQuestions','correctAnswers','score','testResult'));
        }catch(\Exception $e){
            \Log::error('Error fetching test result: ' .$e->getMessage());
            return back()->with('error','Error fetching test result.please try again later');
        }
    }

    //already given test then show correct answers with user selected answer
    public function viewTestQuestions($test_id)
    {
        try {
            $test = Test::findOrFail($test_id);
            $questions = Question::where('test_id', $test_id)->get();
            $userResponses = UserResponse::where('test_id', $test_id)
                ->where('user_id', auth()->user()->id)
                ->get();
            return view('users.quiz.answers', compact('test', 'questions', 'userResponses'));
        } catch (\Exception $e) {
            \Log::error('Error fetching test questions: ' . $e->getMessage());
            return back()->with('error', 'Error fetching test questions. Please try again later.');
        }
    }
        
}