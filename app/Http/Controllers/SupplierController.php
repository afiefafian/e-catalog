<?php

namespace App\Http\Controllers;

use App\Supplier;
use Illuminate\Http\Request;
use App\Model\Regency;
use Validator;
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
    public function edit(Supplier $supplier)
    {
        $supplier = Supplier::find($id);
        return response()->json($supplier);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Supplier  $supplier
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Supplier $supplier, $id)
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
    public function destroy(Supplier $supplier)
    {
        $supplier = Supplier::find($id);
        
        $supplier->delete();
        return response()->json(['message' => 'success']);
    }

    public function kab_kota_list_by_keyword(Supplier $supplier, Request $request)
    {
        $keyword = $request->input('keyword');
        $get_data = Regency::where('name', 'like', "%{$keyword}%")->get();

        $formatted_data = array();
        foreach ($get_data as $row) {
            $formatted_data[] = array('id' => $row->id, 'text' => $row->name);
        }

        return response()->json($formatted_data);
    }
}
