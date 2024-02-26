<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Test;

class QuizController extends Controller
{
    public function index()
    {
        $tests = Test::where('is_active', true)->get();
        return view('users.quiz.index', ['tests' => $tests]);
    }

    public function quizStart()
    {
        // quiz start
        // show questions with options
        // user can fill/select options from questions
        // submit
        // redirect to new routes
        // function > calculate scores/ store inthe database
        // redirect back to user with their scoring

    }
}
