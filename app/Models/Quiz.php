<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Quiz extends Model
{
    use HasFactory;

    protected $table = 'quizes';

    public function questions() {
        return $this->hasMany('App\Models\Question', 'quiz_id', 'id');
    }

}
