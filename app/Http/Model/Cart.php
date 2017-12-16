<?php

namespace App\Http\Model;

use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    //
    public $table = 'cart';
    public $primaryKey = 'cid';
    public $guarded = [];
    public $timestamps = false;
}
