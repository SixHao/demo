<?php

namespace App\Http\Model;

use Illuminate\Database\Eloquent\Model;

class Config extends Model
{
    public $table = 'web_config';
    public $primaryKey = 'wid';
    public $guarded = [];
    public $timestamps = false;
}
