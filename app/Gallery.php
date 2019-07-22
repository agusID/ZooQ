<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Gallery extends Model
{
    protected $table = 'ms_gallery';
    protected $primaryKey = 'gallery_id';
    protected $dates = ['created_at'];
}
