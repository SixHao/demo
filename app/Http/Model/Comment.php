<?php

namespace App\Http\Model;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    public $table = 'comment';
    public $primaryKey = 'id';
    public $guarded = [];
    public $timestamps = false;
}
