<?php


namespace App\Http\Model;


use Illuminate\Database\Eloquent\Model;


class User extends Model
{
    public $table = 'users';
    public $primaryKey = 'uid';
    public $guarded = [];
    public $timestamps = false;

    //    通过用户模型查找关联的角色模型
    public function role()
    {
        return $this->belongsToMany('App\Http\Model\role','role_user','uid','rid');
    }
}