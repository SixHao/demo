<?php

namespace App\Http\Model;

use Illuminate\Database\Eloquent\Model;

class friend extends Model
{
    public $table = 'friend';
    public $primaryKey = 'fid';
    public $guarded = [];
    public $timestamps = false;
}
