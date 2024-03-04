<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Test;
use App\Models\TestResult;
use App\Models\Question;
use App\Models\UserResponse;
// use Carbon\Carbon;

class QuizController extends Controller
{
    public function index(Request $request)
    {
        // $tests = Test::where('is_active', true)->get();
        // return view('users.quiz.dashboard', ['tests' => $tests]);
        $startDate = $request->input('start_date');
        $endDate = $request->input('end_date');
        $userTestResults = TestResult::where('user_id',auth()->id())->whereBetween('created_at',[$startDate,$endDate ])->get();
        // $userTestResults = TestResult::where('user_id',auth()->id())->get();
        $averageScore = $userTestResults->avg('score');
        $testCount = Test::count();
        try {
            $tests = Test::where('is_active', true)->get();
            return view('users.quiz.index', ['tests' => $tests,'testCount'=>$testCount,'userTestResults'=>$userTestResults,'averageScore'=>$averageScore]);
        } catch (\Exception $e) {
            \Log::error('Error fetching tests: ' . $e->getMessage());
            return back()->with('error', 'Error fetching tests. Please try again later.');
        }
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
            $test = Test::findOrFail($testId);
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
    public function submit(Request $request)
{
    $answers = $request->input('answer');
    $testId = $request->input('test_id');

    // Fetch all questions for the test
    $questions = Question::where('test_id', $testId)->get();

    // Initialize variables for score calculation
    $totalQuestions = count($questions);
    $correctAnswers = 0;
     
    // $startTime = now()->timestamp; // Get the current timestamp as start time
    // $endTime = now()->timestamp;
    // $timeTaken = $endTime - $startTime;

    // Iterate through each question and store user responses
    foreach ($questions as $question) {
        $selectedOption = isset($answers[$question->id]) ? $answers[$question->id] : null;
        $isCorrect = $selectedOption === $question->correct_option;

        // Store user response in the UserResponse table
        UserResponse::create([
            'user_id' => auth()->user()->id,
            'test_id' => $testId,
            'question_id' => $question->id,
            'selected_option' => $selectedOption,
            'is_correct' => $isCorrect,
            // 'time_taken' => $timeTaken ?? 0
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
    // $testResult->time_taken = $timeTaken;
    $testResult->save();

    // $request->session()->forget('quiz_start_time');
    // Redirect to the result page
    return redirect()->route('user.quiz.result', ['testResultId' => $testResult->id]);
}

//     public function submit(Request $request)
//     {
//         // dd('here');
//         $answers          = $request->input('answer');
//         $totalQuestions   = count($answers);
//         $correctAnswers   = 0;
// // dd($answers);
//         foreach($answers as $questionId=>$selectedOption){
//             $question = Question::findOrFail($questionId);
//             // dd($selectedOption);
//             if($selectedOption===$question->correct_option){
//                 $correctAnswers++;
//             }
//             UserResponse::create([
//             'test_id' => $request->input('test_id'),
//             'user_id' => auth()->user()->id, // Assuming user is authenticated
//             'question_id' => $questionId,
//             'selected_option' => $selectedOption,
//             'is_correct' => $selectedOption === $question->correct_option,
//         ]);
//         }
        
//         // dd('here');
//         $score = ($correctAnswers/$totalQuestions)*100;

//         $testId = $request->input('test_id');
//         if(!$testId){
            
//             return back()->with('error','Test Id is requestred!');
//         }

       
//         $testResult = new TestResult();
//         $testResult->test_id = $testId;
//         $testResult->user_id = auth()->user()->id;
//         // $testResult->test_id = $request->input('test');
//         $testResult->total_questions = $totalQuestions;
//         $testResult->correct_answers = $correctAnswers;
//         $testResult->wrong_answers = $totalQuestions-$correctAnswers;
//         $testResult->score=$score;
//         $testResult->save();
//         // dd($testResult);?
//         return redirect()->route('user.quiz.result',[
//             // 'score'         =>  $score,
//             'testResultId'  =>  $testResult->id
//         ]);
//     }

    public function result(Request $request)
    {
        try{
            $testResultId = $request->route('testResultId');
            $testResult = TestResult::findOrFail($testResultId);
            $testName = $testResult->test->name;
            $totalQuestions = $testResult->total_questions;
            $correctAnswers = $testResult->correct_answers;
            $score = $testResult->score;
            return view('users.quiz.result',compact('testName','totalQuestions','correctAnswers','score','testResult'));
        }catch(\Exception $e){
            \Log::error('Error fetching test result: ' .$e->getMessage());
            return back()->with('error','Error fetching test result.please try again later');
        }
    }

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
    // try {
    //     $test = Test::findOrFail($test_id);
    //     $questions = Question::where('test_id', $test_id)->get();
    //     return view('users.quiz.answers', compact('test', 'questions'));
    // } catch (\Exception $e) {
    //     \Log::error('Error fetching test questions: ' . $e->getMessage());
    //     return back()->with('error', 'Error fetching test questions. Please try again later.');
    // }
}
    // public function result(Request $request){
    //     $score = $request->input('score');
    //     $totalQuestions = $request->input('totalQuestions');
    //     $correctAnswers = $request->input('correctAnswers');
    //     return view('users.quiz.result')
    //         ->with(compact('score'))
    //         ->with(compact('totalQuestions'))
    //         ->with(compact('correctAnswers'));
    // }

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
