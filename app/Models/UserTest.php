<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserTest extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'description','level'];

    public function questions()
    {
        return $this->hasMany(Question::class);
    }
}
