<?php

namespace App\Http\Model;

use Illuminate\Database\Eloquent\Model;

class permission extends Model
{
    public $table = 'permissions';
    public $primaryKey = 'pid';
    public $guarded = [];
    public $timestamps = false;

}
