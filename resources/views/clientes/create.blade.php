<x-layout>
    <div class="container mt-3">
        @if (Session::has('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ Session::get('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        <form method="POST" action="/clientes/novo">
            @csrf

            <div class="mb-3">
                <label for="nomeCliente" class="form-label">Nome do cliente</label>
                <input required value="{{ old('nomeCliente') }}" name="nomeCliente" placeholder="Ex: Fulano da Silva"
                    type="text" class="form-control" id="nomeCliente">

                @error('nomeCliente')
                    <p class="text-danger mt-2">{{ $message }}</p>
                @enderror
            </div>
            <div class="mb-3">
                <label for="cpfCliente" class="form-label">CPF do cliente</label>
                <input required maxlength="11" value="{{ old('cpfCliente') }}" name="cpfCliente" placeholder="Ex: 12345678900"
                    type="text" class="form-control" id="cpfCliente">

                @error('cpfCliente')
                    <p class="text-danger mt-2">{{ $message }}</p>
                @enderror
            </div>
            <button type="submit" class="btn btn-primary text-center">Cadastrar</button>
        </form>
    </div>
</x-layout>
