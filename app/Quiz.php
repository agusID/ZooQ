<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Quiz extends Model
{
    protected $table = 'ms_quiz';
    protected $primaryKey = 'quiz_id';
}
