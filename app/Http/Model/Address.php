<?php

namespace App\Http\Model;

use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
    public $table = 'address';
    public $primaryKey = 'cid';
    public $guarded = [];
    public $timestamps = false;



   
}
