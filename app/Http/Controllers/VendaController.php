<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreVendaRequest;
use App\Http\Requests\UpdateVendaRequest;
use App\Models\Cliente;
use App\Models\Parcela;
use App\Models\Produto;
use App\Models\Venda;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use \Mpdf\Mpdf as PDF;
use Illuminate\Support\Facades\Storage;

class VendaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $vendas = Venda::all();

        return view("vendas.index", [
            "vendas" => $vendas,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $clientes = Cliente::all();
        $produtos = Produto::all();

        return view("vendas.create", [
            'clientes' => $clientes,
            'produtos' => $produtos,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreVendaRequest $request)
    {
        $parcelas = array();

        foreach ($request->parcelas as $parcelaSerializada) {
            array_push($parcelas, json_decode($parcelaSerializada));
        }

        $currentDate = date('Y-m-d');

        $venda = Venda::create([
            "data_de_registro" => $currentDate,
            "nome_cliente" => $request->nomeCliente,
            "tipo_pagamento" => $request["tipo-pagamento"],
            "valor_integral" => $request["valor-integral"],
        ]);

        foreach ($parcelas as $parcela) {
            Parcela::create([
                "valor" => $parcela->valor,
                "tipo_pagamento" => strtoupper($parcela->tipo),
                "venda_id" => $venda->id,
                "data_vencimento" => $parcela->data,
            ]);
        }

        return redirect("/vendas/nova")->with("success", "Venda cadastrada com sucesso!")->with("id", $venda->id);
    }

    /**
     * Display the specified resource.
     */
    public function show(Venda $venda)
    {
        $nomeDocumento = "venda.pdf";

        $documento = new PDF([
            'mode' => 'utf-8',
            'format' => 'A4',
            'margin_header' => '3',
            'margin_top' => '20',
            'margin_bottom' => '20',
            'margin_footer' => '2',
        ]);

        $header = [
            'Content-Type' => 'application/pdf',
            'Content-Disposition' => 'inline; filename="' . $nomeDocumento . '"'
        ];

        $documento->WriteHTML('
        <h1 style="text-align: center;">Relatório da venda</h1>
        <hr/>
        <h3>Informações da venda</h3>
        <br/>
        <strong>Tipo de pagamento: </strong>' . strtoupper($venda->tipo_pagamento) .
            '
        <br/>
        <strong>Valor integral: </strong> R$' . $venda->valor_integral .
            '
        <br/>
        <strong>Cliente: </strong>' . $venda->nome_cliente .
            '<br/>
        <strong>Data de registro: </strong>' . $venda->data_de_registro
        );

        Storage::disk('public')->put($nomeDocumento, $documento->Output($nomeDocumento, "S"));
        return Storage::disk('public')->download($nomeDocumento, 'Request', $header);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Venda $venda)
    {
        $clientes = Cliente::all();

        return view("vendas.edit", [
            "venda" => $venda,
            "clientes" => $clientes
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateVendaRequest $request, Venda $venda)
    {
        if ($request["id-venda"]) {
            $currentDate = date('Y-m-d');
            $parcelas = array();

            foreach ($request->parcelas as $parcelaSerializada) {
                array_push($parcelas, json_decode($parcelaSerializada));
            }

            $venda->update([
                "nome_cliente" => $request->nomeCliente,
                "tipo_pagamento" => $request["tipo-pagamento"],
                "valor_integral" => $request["valor-integral"],
                "data_de_registro" => $currentDate
            ]);

            $parcelasExistentes = Parcela::all()->where("venda_id", "=", $request["id-venda"]);

            $count = 0;
            foreach ($parcelasExistentes as $parcelaExistente) {
                $parcelaExistente->update([
                    "valor" => $parcelas[$count]->valor,
                    "tipo_pagamento" => strtoupper($parcelas[$count]->tipo),
                    "data_vencimento" => $parcelas[$count]->data,
                ]);
                array_splice($parcelas, 0, 1);
                $count++;
            }

            if(count($parcelas) > 0) {
                foreach ($parcelas as $parcela) {
                    Parcela::create([
                        "valor" => $parcela->valor,
                        "tipo_pagamento" => strtoupper($parcela->tipo),
                        "venda_id" => $venda->id,
                        "data_vencimento" => $parcela->data,
                    ]);
                }
            }

            return redirect("/vendas/nova")->with("success", "Venda atualizada com sucesso!");
        }

        $venda->update([
            "data_de_registro" => $request["data-de-registro"],
            "nome_cliente" => $request->nomeCliente,
            "tipo_pagamento" => $request["tipo-pagamento"],
            "valor_integral" => $request["valor-integral"],
        ]);

        return redirect("/vendas")->with("success", "Venda atualizada com sucesso!");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Venda $venda)
    {
        $venda->delete();

        return redirect("/vendas")->with("success", "Venda deletada com sucesso!");
    }

    public function search(Request $request)
    {
        $nomeCliente = $request->input('filtro-nome-cliente');
        $tipoPagamento = $request->input('filtro-tipo-pagamento');
        $tabela = DB::table("vendas");

        if ($nomeCliente && $tipoPagamento) {
            $result = $tabela->select("*")
                ->where("nome_cliente", "like", "%" . $nomeCliente . "%")
                ->where("tipo_pagamento", "=", $tipoPagamento)
                ->get();
        }

        if ($nomeCliente) {
            $result = $tabela->select("*")
                ->where("nome_cliente", "like", "%" . $nomeCliente . "%")
                ->get();
        }

        if ($tipoPagamento) {
            $result = $tabela->select("*")
                ->where("tipo_pagamento", "=", $tipoPagamento)
                ->get();
        }

        return view("vendas.index", [
            "vendas" => $result
        ]);
    }
}
