<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreProdutoRequest;
use App\Http\Requests\UpdateProdutoRequest;
use App\Models\Produto;

class ProdutoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $produtos = Produto::all();

        return view("produtos.index", [
            'produtos' => $produtos
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("produtos.create");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreProdutoRequest $request)
    {
        Produto::create([
            'nome' => $request->nomeProduto,
            'descricao' => $request->descricaoProduto,
            'preco_unitario' => $request->precoProduto
        ]);

        return redirect("/produtos/novo")->with("success", "Produto cadastrado com sucesso!");
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        return Produto::find($id);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Produto $produto)
    {
        return view("produtos.edit", [
            "produto" => $produto
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateProdutoRequest $request, Produto $produto)
    {
        $produto->update([
            'nome' => $request->nomeProduto,
            'descricao' => $request->descricaoProduto,
            'preco_unitario' => $request->precoProduto,
        ]);

        return redirect("/produtos")->with("success", "Produto atualizado com sucesso!");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Produto $produto)
    {
        $produto->delete();

        return redirect("/produtos")->with("success", "Produto deletado com sucesso!");
    }
}
