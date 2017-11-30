<?php

namespace App\Http\Model;

use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    public $table = 'users';
    public $primaryKey = 'uid';
    public $guarded = [];
    public $timestamps = false;
}
