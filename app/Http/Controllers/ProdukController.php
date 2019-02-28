<?php

namespace App\Http\Controllers;

use App\Produk;
use App\Supplier;
use Illuminate\Http\Request;
use Validator;
use DataTables;
use Auth;

class ProdukController extends Controller
{

    private function _validator()
    {
        return array(
            'nama'=> 'required',
            'supplier_id' => 'required',
            'harga' => 'required'
        );
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['suppliers'] = Supplier::all();

        return view('admin.produk', $data);
    }

    public function listData()
    {
        $produk = Produk::select('produks.*', 'suppliers.nama AS nama_supplier')
            ->join('suppliers', 'produks.supplier_id' , '=', 'suppliers.id')
            ->orderBy('produks.id', 'desc')
            ->get();

        $data = array();
        foreach($produk as $list){
            if ($list->active == 1) {
                $status = '<span class="label label-success"><i class="fa fa-check"></i> Aktif</span>';
            } else {
                $status = '<span class="label label-danger"><i class="fa fa-times"></i> Tidak Aktif</span>';
            }

            $row = array();
            $row[] = $list->id;
            $row[] = $list->nama;
            $row[] = $list->nama_supplier;
            $row[] = 'Rp ' . number_format($list->harga);
            $row[] = $status;
            $row[] = "<div align='right'>
            <button id='btn-ubah' type='button' onclick='edit(" .$list->id. ")' class='btn btn-warning btn-xs no-margin'><i class='fa fa-edit'></i></button>
            <button id='btn-ubah' type='button' onclick='delete_produk(" .$list->id. ")' class='btn btn-danger btn-xs no-margin'><i class='fa fa-trash-o'></i></button>
            </div>";
            
            $data[] = $row;
        }
        
        return DataTables::of($data)->escapeColumns([])->make(true);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), $this->_validator());
         
           
        if ($validator->fails()) {
            return response()->json($validator->errors());
        } else {

            $file = $request->file('gambar'); 
            if ($file != '') {
                $Ext = $file->getClientOriginalExtension();
                $gambar = "brg_".date('YmdHis').".$Ext";
                $request->file('gambar')->move(public_path() . '/public/images/produk', $gambar);
            } 

            $produk = new Produk();
            $produk->nama = $request->nama;
            $produk->supplier_id= $request->supplier_id;
            $produk->harga = $request->harga;
            $produk->posted_by_id = Auth::user()->id;
            $produk->posted_by_name = Auth::user()->name;

            if ($request->active == 'on') {
                $produk->active = true;
            }

            if ($file != '' && $gambar) {
                $produk->url_gambar = $gambar;
            }

            $produk->save();

            return response()->json(['message'=>'success']);  
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Produk  $produk
     * @return \Illuminate\Http\Response
     */
    public function show(Produk $produk)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Produk  $produk
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $produk = Produk::find($id);
        return response()->json($produk);
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Produk  $produk
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $produk = Produk::find($request->id);
        
        $validator = Validator::make($request->all(), $this->_validator() );

        if($validator->fails()){
            return response()->json($validator->errors());
        } else {

            $file = $request->file('gambar'); 
            if ($file != '') {
                $Ext = $file->getClientOriginalExtension();
                $gambar = "prd_".date('YmdHis').".$Ext";
                $request->file('gambar')->move(public_path() . '/public/images/produk', $gambar);

                if ($produk->url_gambar != null) {
                    unlink('./public/images/produk/' . $produk->url_gambar);
                }
            } 

            $produk->nama = $request->nama;
            $produk->supplier_id= $request->supplier_id;
            $produk->harga = $request->harga;

            if ($request->active == 'on') {
                $produk->active = true;
            } else {
                $produk->active = false;
            }

            if ($file != '' && $gambar) {
                $produk->url_gambar = $gambar;
            }
            
            $produk->update();
            return response()->json(['message'=>'success']);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Produk  $produk
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $produk = Produk::find($id);

        $produk->delete();
        return response()->json(['message' => 'success']);
    }
}
