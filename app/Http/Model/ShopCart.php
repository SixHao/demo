<?php

namespace App\Http\Model;

use Illuminate\Database\Eloquent\Model;

class ShopCart extends Model
{
    //
    public $table = 'cart';
    public $primaryKey = 'cid';
    public $guarded = [];
    public $timestamps = false;

}
