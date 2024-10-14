<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Quiz extends Model
{
    use HasFactory;
    
    public function category() {
        return $this->belongsTo('App\Models\Category');
    }
    public function quizzes() {
        return $this->hasMany(Quiz::class);
    }
    
}
