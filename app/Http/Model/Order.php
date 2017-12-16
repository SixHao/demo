<?php

namespace App\Http\Model;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    public $table = 'orders';
    public $primaryKey = 'oid';
    public $guarded = [];
    public $timestamps = false;

    public function goods()
    {                //     参数一:模型绝对路径 也可以用 user::class   参数二:   当前模型的关联表   参数三:   当前模型在关联表中的外键     参数四:  被关联模型在关联表中的外键
        return $this->belongsToMany('App\Http\Model\goods','detail','oid','gid');
    }
}
