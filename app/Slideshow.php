<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Slideshow extends Model
{
    protected $table = 'ms_slideshow';
    protected $primaryKey = 'slideshow_id';
    protected $dates = ['created_at'];
}
