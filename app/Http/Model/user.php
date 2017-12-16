<?php

namespace App\Http\Model;

use Illuminate\Database\Eloquent\Model;

class user extends Model
{
    //
    public $table = 'users';
    public $primaryKey = 'uid';
    public $guarded = [];
    public $timestamps = false;

    public function role()
    {
        return $this->belongsToMany('App\Http\Model\role','role_user','uid','rid');
    }
}
