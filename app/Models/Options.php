<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Options extends Model
{
    use HasFactory;

    protected $table = 'questions_options';

    public function question()
    {
        return $this->hasOne('Models\Question', 'id', 'question_id');
    }
}
