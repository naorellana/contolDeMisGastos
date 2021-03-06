<?php

namespace App\Http\Controllers;
use App\Product;
use App\Products_record;

use Illuminate\Http\Request;

class Prduct_recordController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
        $productRecord= new Products_record;
        $productRecord->quantity=$request->quant[2];
        $productRecord->product_id=$request->product_id;
        $productRecord->expense_id=$request->expense_id;
        if ($productRecord->save()) {
          return redirect ('/cat/')->with(['message'=>'Se agregagó el registro correctamente', 'alert'=>'success']);
        }
        else {
          return redirect ('/sub/'.$request->subcategory_id)->with(['message'=>'Ocurrió un error al guardar el registro', 'alert'=>'danger']);
        }
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
        $products = Product::where('subcategory_id', '=', $id)->get();
        
        if ($products) {
          return view('categories.productsInfo',['products'=>$products]);
        }else {
          return redirect('/');
        }

        //dd( $products);

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
    }
}
