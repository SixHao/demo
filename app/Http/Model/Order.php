<?php

namespace App\Http\Model;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    public $table = 'orders';
    public $guarded = [];
    public $timestamps = false;

}
