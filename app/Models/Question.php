<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    use HasFactory;

    protected $table = 'questions';

    public function options() {
        return $this->hasMany('App\Models\Options', 'question_id', 'id');
    }

    public function correctOptionsCount() {
        return $this->options()->where('correct', 1 )->count();
    }

    public function correctOptions() {
        return  $this->options()->where('correct', 1)->get();
    }

    public function topic() {
        return $this->hasOne('App\Models\Quiz', 'id', 'quiz_id');
    }
}
