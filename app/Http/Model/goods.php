<?php

namespace App\Http\Model;

use Illuminate\Database\Eloquent\Model;

class goods extends Model
{
    //
    public $table = 'goods';
    public $primaryKey = 'gid';
    public $guarded = [];
    public $timestamps = false;
}
