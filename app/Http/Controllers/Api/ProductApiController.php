<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductApiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //membuat data api
        $product = Product::all();
        if ($product != null) {
            return response()->json([
                "status" => true,
                "msg" => "Data Product",
                "Data" => $product
            ]);
        } else {
            return response()->json([
                "status" => true,
                "msg" => "Data Tidak Ada",
                "data" => null
            ]);
        }
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
        //Save data ke db
        $product = new Product();
        $product->name_produk = $request->name_produk;
        $product->harga = $request->harga;
        $product->stok = $request->stok;
        $product->save();
        return response()->json([
            "status" => true,
            "msg" => "Data Berhasil Disimpan",
            "data" => $product
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    { 
        //
        $product = Product::find($id);
        return response()->json(
            [
                "status" => true,
                "msg" => "Show Data",
                "Data" => $product
            ]
        );
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $product=Product::find($id);
        $product->name_produk = $request->name_produk;
        $product->harga = $request->harga;
        $product->stok = $request->stok;
        $product->save();
        return response()->json(
            [
                "status" => true,
                "msg" => "Berhasil di Update",
                "data" => $product
            ]
        );
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $product = Product::find($id);
        $product->delete();
        return response()->json(
            [
                "status" => true,
                "msg" => "Berhasil di Delete",
                "Data" => $product
            ]
        );
    }
}
