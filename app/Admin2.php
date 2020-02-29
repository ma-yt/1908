<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Admin2 extends Model
{
    protected $table='admin2';
    protected $primaryKey='admin_id';
    public $timestamps = false;

    //黑名单
    protected $guarded = [];
}
