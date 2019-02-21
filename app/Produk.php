<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Produk extends Model
{
    protected $table='produks';
    protected $primaryKey='id';
    protected $fillable = ['nama', 'supplier_id', 'harga', 'active', 'url_gambar', 'posted_by_id', 'posted_by_name'];

    use SoftDeletes;    
    protected $dates = ['deleted_at'];
}
