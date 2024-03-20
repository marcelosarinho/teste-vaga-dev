<x-layout>
    <div class="container mt-3">
        <form method="POST" action="/vendas/{{ $venda->id }}">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label for="nomeCliente" class="form-label">Nome do cliente (opcional)</label>
                <select class="form-select js-example-basic-single" name="nomeCliente" id="nomeCliente"
                    data-live-search="true">
                    <option value="Nenhum">Nenhum cliente</option>
                    @foreach ($clientes as $cliente)
                        <option value="{{ $cliente->nome }}"
                            {{ $cliente->nome === $venda->nome_cliente ? 'selected' : '' }}>{{ $cliente->nome }}
                        </option>
                    @endforeach
                </select>
            </div>
            <div class="mb-3">
                <label for="data-de-registro" class="form-label" style="display: block;">Data de registro</label>
                <input value="{{ $venda->data_de_registro }}" type="date" name="data-de-registro"
                    id="data-de-registro" style="padding: 8px 10px; border: 1px solid #ced4da; border-radius: 0.25rem">
            </div>
            <div class="mb-3">
                <label for="select-tipo" class="mb-2">Tipo de pagamento</label>
                <select name="tipo-pagamento" id="select-tipo" class="form-select" aria-label="Default select example">
                    <option {{ $venda->tipo_pagamento === '' ? 'selected' : '' }}>Selecione um tipo de pagamento
                    </option>
                    <option value="dinheiro" {{ $venda->tipo_pagamento === 'dinheiro' ? 'selected' : '' }}>Dinheiro
                    </option>
                    <option value="cheque" {{ $venda->tipo_pagamento === 'cheque' ? 'selected' : '' }}>Cheque</option>
                    <option value="credito" {{ $venda->tipo_pagamento === 'credito' ? 'selected' : '' }}>Cartão de
                        crédito
                    </option>
                    <option value="debito" {{ $venda->tipo_pagamento === 'debito' ? 'selected' : '' }}>Cartão de débito
                    </option>
                </select>
            </div>

            <div class="mb-3">
                <label for="valor-integral" class="form-label">Preço do produto</label>
                <input required step=".01" value="{{ $venda->valor_integral }}" name="valor-integral"
                    placeholder="Ex: 45.50" type="number" class="form-control" id="valor-integral">
            </div>
            <button type="submit" class="btn btn-primary text-center">Salvar</button>
        </form>
    </div>
</x-layout>

<script>
    $(document).ready(function() {
        $('.js-example-basic-single').select2();
    });
</script>
