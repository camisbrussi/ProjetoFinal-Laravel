<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(Auth::check() !== true){
            return redirect()->route("login");
        }

        $produtos = Product::all();
        return view("product.listAll",["produtos" => $produtos]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if(Auth::check() !== true){
            return redirect()->route("login");
        }

        return view("product.create");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $erros = [];
        $valor = floatVal(str_replace(",",".",str_replace(".","",$request->valor)));

        if(empty($request->nome)){
            $erros['nome'] = "Informe o nome do produto";
        }

        if($valor <= 0){
            $erros['valor'] = "Informe o valor do produto";
        }

        if($erros){
            return redirect()->back()->withInput()->withErrors($erros);
        }

        $product = new Product();
        $product->nome = $request->nome;
        $product->valor = $valor;
        $product->save();

        return redirect()->route("product.show",$product->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        if(Auth::check() !== true){
            return redirect()->route("login");
        }

        return view("product.list",["produto" => $product]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        if(Auth::check() !== true){
            return redirect()->route("login");
        }
        
        return view("product.edit",["produto" => $product]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        $erros = [];
        $valor = floatVal(str_replace(",",".",str_replace(".","",$request->valor)));

        if(empty($request->nome)){
            $erros['nome'] = "Informe o nome do produto";
        }

        if($valor <= 0){
            $erros['valor'] = "Informe o valor do produto";
        }

        if($erros){
            return redirect()->back()->withInput()->withErrors($erros);
        }

        $product->nome = $request->nome;
        $product->valor = $valor;
        $product->save();

        return redirect()->route("product.show",$product->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        $product->delete();

        return redirect()->route("product.index");
    }
}
