<?php

namespace App\Http\Controllers;
use App\Categorie;
use App\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use View;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id=null)
    {
       if($id == null){
            return Product::orderBy('id','asc')->get();
        }else{
            return $this->show($id); 
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
        $product = new Product;
        $product->description = $request->input('description');
        $product->price = $request->input('price');
        $product->quantity = $request->input('quantity');
        $product->idprovider = $request->input('idprovider');
        $product->idcategory = $request->input('idcategory');
        $product->idstatus = '6';
        $product->save();
        return 'Product record created' .$product->id;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Donation  $donation
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return Product::find($id);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Donation  $donation
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        //
    }

    public function listProductByCategory($id){

        $list = DB::table('products')
        ->join('categories', 'categories.id', '=', 'products.idcategory')
        ->where('categories.id', '=', $id)
        ->select('products.description','products.id', 'categories.description as name')
        ->get();

        return $list; 

    }

    public function newList($id)
    {
        $list = DB::table('products')
        ->where('products.id', '=', $id)
        ->select('products.description','products.id','products.price','products.quantity','products.idprovider','products.idcategory')
        ->get();

        return $list; 
 
    }

    public function listProductByProvider($id){

    $list = DB::table('products')
    ->join('providers', 'providers.id', '=', 'products.idprovider')
    ->where('providers.id', '=', $id)
    ->select('products.description','products.id','products.price','providers.name')
    ->get();

    return $list; 

    }


    public function listProductstatus($id){

    $list = DB::table('products')
    ->join('providers', 'providers.id', '=', 'products.idprovider')
    ->join('statusdonations', 'statusdonations.id', '=', 'products.idstatus')
    ->where('providers.id', '=', $id)
    ->select('products.description','products.id','products.price','providers.name', 'statusdonations.status as status')
    ->get();

    return $list; 

    }

    public function productList($id){

        $list = DB::table('products')
        ->join('providers', 'providers.id', '=', 'products.idprovider')
        ->join('categories', 'categories.id', '=', 'products.idcategory')
        //->where('providers.id', '=', $id)
        ->select('products.description','products.id','products.price','products.quantity','providers.name', 'categories.description as cat')
        ->get();

        return $list; 

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Donation  $donation
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $product = Product::find($id);
        $product->description = $request->input('description');
        $product->price = $request->input('price');
        $product->quantity = $request->input('quantity');
        $product->idprovider = $request->input('idprovider');
        $product->idcategory = $request->input('idcategory');
        $product->idstatus = $request->input('idstatus');
        $product->save();
        return 'Product record updated' .$product->id;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Donation  $donation
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product = Product::find($id)->delete();
        //return 'Product record deleted' .$product->id;
    }





}
