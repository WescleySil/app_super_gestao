<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Unidade;
use App\Models\ProdutoDetalhe;

class ProdutoDetalheController extends Controller
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
        $unidades = Unidade::all();
        return view('app.produto_detalhe.create', ['unidades' => $unidades]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        ProdutoDetalhe::create($request->all());
        return redirect()->route('produtos.index');
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
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param   App\Models\ProdutoDetalhe $produtoDetalhe
     * @return \Illuminate\Http\Response
     */
    public function edit(ProdutoDetalhe $produtoDetalhe)
    {
        //
        $unidades = Unidade::all();
        return view('app.produto_detalhe.edit', ['produtoDetalhe' => $produtoDetalhe, 'unidades' => $unidades]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  App\Models\ProdutoDetalhe $produtoDetalhe
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ProdutoDetalhe  $produtoDetalhe)
    {
        //
        $produtoDetalhe->update($request->all());
        return redirect()->route('produtos.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  App\Models\ProdutoDetalhe $produtoDetalhes
     * @return \Illuminate\Http\Response
     */
    public function destroy(ProdutoDetalhe $produtoDetalhe)
    {
        //
        $produtoDetalhe->delete();
        return redirect()->route('produtos.index');
    }
}
