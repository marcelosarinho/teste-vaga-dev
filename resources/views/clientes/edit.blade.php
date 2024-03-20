<x-layout>
    <div class="container mt-3">
        <form method="POST" action="/clientes/{{ $cliente->id }}">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label for="nomeCliente" class="form-label">Nome do cliente</label>
                <input required value="{{ $cliente->nome }}" name="nomeCliente" placeholder="Ex: Fulano da Silva"
                    type="text" class="form-control" id="nomeCliente">
            </div>
            <div class="mb-3">
                <label for="cpfCliente" class="form-label">CPF do cliente</label>
                <input required maxlength="11" value="{{ $cliente->cpf }}" name="cpfCliente"
                    placeholder="Ex: 12345678900" type="text" class="form-control" id="cpfCliente">
            </div>
            <button type="submit" class="btn btn-primary text-center">Salvar</button>
        </form>
    </div>
</x-layout>
