<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Wenzhang extends Model
{
    protected $table='wenzhang';
    protected $primaryKey='w_id';
    public $timestamps=false;
    //黑名单
    protected $guarded = [];
}
