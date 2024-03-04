<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserResponse extends Model
{
    use HasFactory;
    protected  $fillable = [
        'test_id',
        'user_id',
        'question_id',
        'selected_option',
        'is_correct',
    ];
    public function test()
    {
        return $this->belongsTo(Test::class);
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function question()
    {
        return $this->belongsTo(Question::class);
    }
}
