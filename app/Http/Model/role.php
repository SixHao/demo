<?php


namespace App\Http\Model;


use Illuminate\Database\Eloquent\Model;


class role extends Model
{
    public $table = 'roles';
    public $primaryKey = 'rid';
    public $guarded = [];
    public $timestamps = false;
}