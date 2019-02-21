<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Produk;

class ListProdukController extends Controller
{
    public function produk()
    {
        $produk = Produk::select('produks.*', 'suppliers.nama AS nama_supplier')
            ->join('suppliers', 'produks.supplier_id' , '=', 'suppliers.id')
            ->where('produks.active', 1)
            ->orderBy('produks.id', 'desc')
            ->paginate(12);

        return response()->json($produk);
    }

    public function supplier_product()
    {
        $produk = Produk::select('produks.*', 'suppliers.nama AS nama_supplier')
            ->join('suppliers', 'produks.supplier_id' , '=', 'suppliers.id')
            ->where('produks.active', 1)
            ->orderBy('produks.id', 'desc')
            ->paginate(5);

        return response()->json($produk);
    }
}
