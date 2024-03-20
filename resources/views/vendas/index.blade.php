<x-layout>
    <div class="container mt-3">
        @if (Session::has('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ Session::get('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        <div>
            <h4>Filtros</h4>
            <div class="container mb-5">
                <form action="/vendas/filtro" method="GET">
                    @csrf

                    <div class="row">
                        <div class="col">
                            <label for="filtro-nome-cliente" class="form-label">Cliente</label>
                            <input name="filtro-nome-cliente" type="text" class="form-control" id="filtro-nome-cliente"
                                placeholder="Ex: Fulano da Silva">
                        </div>
                        <div class="col">
                            <label for="filtro-tipo-pagamento" class="form-label">Tipo de pagamento</label>
                            <select name="filtro-tipo-pagamento" class="form-select"
                                aria-label="Default select example">
                                <option value="" selected>Selecione uma opção</option>
                                <option value="dinheiro">Dinheiro</option>
                                <option value="cheque">Cheque</option>
                                <option value="credito">Cartão de crédito</option>
                                <option value="debito">Cartão de débito</option>
                            </select>
                        </div>
                    </div>

                    <button type="submit" class="btn btn-primary mt-3">Filtrar</button>
                </form>
            </div>
        </div>

        <a href="{{ route('vendas.create') }}" class="btn btn-primary">+ Nova venda</a>

        <table class="table mt-2">
            <thead>
                <tr>
                    <th scope="col">Código</th>
                    <th scope="col">Cliente</th>
                    <th scope="col">Data de registro</th>
                    <th scope="col">Tipo de pagamento</th>
                    <th scope="col">Valor integral</th>
                    <th scope="col">Ações</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($vendas as $venda)
                    <tr>
                        <th scope="row">{{ $venda->id }}</th>
                        <td>{{ $venda->nome_cliente }}</td>
                        <td>{{ date('d/m/Y', strtotime($venda->data_de_registro)) }}</td>
                        <td>{{ Str::upper($venda->tipo_pagamento) }}</td>
                        <td>R$ {{ $venda->valor_integral }}</td>
                        <td style="display: flex; gap: 0.5rem">
                            <form onsubmit="submit()" method="POST" action="/vendas/delete/{{ $venda->id }}">
                                @csrf
                                @method('DELETE')

                                <button type="submit" class="btn btn-danger">
                                    <i class="bi bi-trash-fill"></i>
                                </button>
                            </form>
                            <a href="/vendas/edit/{{ $venda->id }}" class="btn btn-warning">
                                <i class="bi bi-pencil-fill"></i>
                            </a>
                            <form method="GET" action="/vendas/pdf/{{ $venda->id }}">
                                @csrf

                                <button type="submit" class="btn btn-secondary">
                                    <i class="bi bi-printer-fill"></i>
                                </button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</x-layout>

<script>
    let idVenda;

    function submit() {

    }

    function pegaIdVenda(id) {
        idVenda = id;
    }
</script>
