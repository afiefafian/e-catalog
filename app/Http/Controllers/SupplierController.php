<?php

namespace App\Http\Controllers;

use App\Supplier;
use Illuminate\Http\Request;
use App\Model\Regency;
use Validator;
use DataTables;
use Auth;

class SupplierController extends Controller
{
    private function _validator()
    {
        return array(
            'nama'=> 'required',
            'email' => 'required',
            'kota_asal'=> 'required',
            'thn_lahir'=> 'required'
        );
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.supplier');
    }

    public function listData()
    {
        $supplier = Supplier::select('suppliers.*', 'indoregion_regencies.name AS nama_kota')
            ->join('indoregion_regencies', 'suppliers.kota_asal' , '=', 'indoregion_regencies.id')
            ->orderBy('suppliers.id', 'desc')
            ->get();
            // return response()->json($supplier);
        $data = array();
        $thn = date('Y');
        foreach($supplier as $list){
            
            $umur = $thn - $list->thn_lahir . ' Tahun';

            $row = array();
            $row[] = $list->id;
            $row[] = $list->nama;
            $row[] = $list->email;
            $row[] = $list->nama_kota;
            $row[] = $umur;
            $row[] = "<div align='right'>
            <button id='btn-ubah' type='button' onclick='edit(" .$list->id. ")' class='btn btn-warning btn-xs'><i class='fa fa-edit'></i></button>
            <button id='btn-ubah' type='button' onclick='delete_supplier(" .$list->id. ")' class='btn btn-danger btn-xs'><i class='fa fa-trash-o'></i></button>
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
            $supplier = new Supplier();
            $supplier->nama = $request->nama;
            $supplier->email= $request->email;
            $supplier->kota_asal= $request->kota_asal;
            $supplier->thn_lahir = $request->thn_lahir;
            $supplier->posted_by_id = Auth::user()->id;
            $supplier->posted_by_name = Auth::user()->name;
            $supplier->save();

            return response()->json(['message'=>'success']);  
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Supplier  $supplier
     * @return \Illuminate\Http\Response
     */
    public function show(Supplier $supplier)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Supplier  $supplier
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $supplier = Supplier::select('suppliers.*', 'indoregion_regencies.name AS nama_kota')
            ->join('indoregion_regencies', 'suppliers.kota_asal' , '=', 'indoregion_regencies.id')
            ->where('suppliers.id', $id)
            ->first();
        return response()->json($supplier);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Supplier  $supplier
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $supplier = Supplier::find($request->id);
        
        $validator = Validator::make($request->all(), $this->_validator() );

        if($validator->fails()){
            return response()->json($validator->errors());
        } else {
            $supplier->nama = $request->nama;
            $supplier->email= $request->email;
            $supplier->kota_asal= $request->kota_asal;
            $supplier->thn_lahir = $request->thn_lahir;
            $supplier->update();
            return response()->json(['message'=>'success']);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Supplier  $supplier
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $supplier = Supplier::find($id);
        
        $supplier->delete();
        return response()->json(['message' => 'success']);
    }

    public function kab_kota_list_by_keyword(Supplier $supplier, Request $request)
    {
        $keyword = $request->input('keyword');
        $id = $request->input('id');
        $get_data = Regency::
            where('name', 'like', "%{$keyword}%")
            ->where('id', 'like', "%{$id}%")
            ->limit('30')
            ->get();

        $formatted_data = array();
        foreach ($get_data as $row) {
            $formatted_data[] = array('id' => $row->id, 'text' => $row->name);
        }

        return response()->json($formatted_data);
    }
}
