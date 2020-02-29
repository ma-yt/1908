<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Huowu extends Model
{
    protected $table='huowu';
   	protected $primaryKey='u_id';
    public $timestamps = false;
    //黑名单
    protected $guarded = [];
}
