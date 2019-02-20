<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Produk extends Model
{
    protected $table='produks';
    protected $primaryKey='id';

    use SoftDeletes;    
    protected $dates = ['deleted_at'];
}
