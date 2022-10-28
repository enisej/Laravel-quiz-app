<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Results extends Model
{
    use HasFactory;

    protected $table = 'results';

    public function topic(){
        return $this->belongsTo('Models\Quiz');
    }

    public function user() {
        return $this->hasOne('Models\User', 'id', 'user_id');
    }

    public function options() {
        return $this->hasMany('Models\UserOption', 'result_id', 'id');
    }
}
