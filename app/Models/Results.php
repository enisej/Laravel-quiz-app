<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Results extends Model
{
    use HasFactory;

    protected $table = 'results';

    public function quiz(){
        return $this->belongsTo('App\Models\Quiz');
    }

    public function user() {
        return $this->hasOne('App\Models\User', 'id', 'user_id');
    }

    public function options() {
        return $this->hasMany('App\Models\UserOption', 'result_id', 'id');
    }
}
