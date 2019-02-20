<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Supplier extends Model
{
    protected $table='suppliers';
    protected $primaryKey='id';

    use SoftDeletes;    
    protected $dates = ['deleted_at'];
}
