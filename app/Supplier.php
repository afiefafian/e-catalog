<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Supplier extends Model
{
    protected $table='suppliers';
    protected $primaryKey='id';
    protected $fillable = ['nama', 'kota_asal', 'email', 'thn_lahir', 'posted_by_id', 'posted_by_name'];

    use SoftDeletes;    
    protected $dates = ['deleted_at'];
}
