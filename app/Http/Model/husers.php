<?php

namespace App\Http\Model;

use Illuminate\Database\Eloquent\Model;

class husers extends Model
{
    //
    // 修改默认设置的表名

    public $table = 'husers';

    // 修改默认验证的时间
    public $timestamps = false;
    // 修改时间戳
    // 模型的日期字段保存格式。
    // protected $dateFormat = 'U';
    // 修改主键
    public $primaryKey = 'id';
      public $guarded = [];
}
