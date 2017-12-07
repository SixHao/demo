<?php

namespace App\Http\Model;

use Illuminate\Database\Eloquent\Model;

class banner extends Model
{
    public $table = 'banner';
    public $primaryKey = 'bid';
    public $guarded = [];
    public $timestamps = false;
}
