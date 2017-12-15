<?php

namespace App\Http\Model;

use Illuminate\Database\Eloquent\Model;

class address extends Model
{
    //
    public $table = 'address';
    public $primaryKey = 'aid';
    public $guarded = [];
    public $timestamps = false;

}
