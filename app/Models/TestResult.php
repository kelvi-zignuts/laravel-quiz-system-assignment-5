<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TestResult extends Model
{
    use HasFactory;
    protected $fillable = [
        'test_id',
        'total_questions',
        'correct_answer',
        'wrong_answers',
        'score',
    ];

    public function test()
    {
        return $this->belongsTo(Test::class);
    }
}
