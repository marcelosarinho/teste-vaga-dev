<x-layout>
    <div class="container mt-3">
        @if (Session::has('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ Session::get('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        <form method="POST" action="/produtos/novo">
            @csrf

            <div class="mb-3">
                <label for="nomeProduto" class="form-label">Nome do produto</label>
                <input required value="{{ old('nomeProduto') }}" name="nomeProduto" placeholder="Ex: Boné" type="text"
                    class="form-control" id="nomeProduto">

                @error('nomeProduto')
                    <p class="text-danger mt-2">{{ $message }}</p>
                @enderror
            </div>
            <div class="mb-3">
                <label for="descricaoProduto" class="form-label">Descrição do produto</label>
                <textarea required value="{{ old('descricaoProduto') }}" name="descricaoProduto" placeholder="Ex: Tamanho M, de cor azul"
                    class="form-control" id="descricaoProduto" rows="3"></textarea>

                @error('descricaoProduto')
                    <p class="text-danger mt-2">{{ $message }}</p>
                @enderror
            </div>
            <div class="mb-3">
                <label for="precoProduto" class="form-label">Preço do produto</label>
                <input required step=".01" value="{{ old('precoProduto') }}" name="precoProduto" placeholder="Ex: 45.50" type="number"
                    class="form-control" id="precoProduto">

                @error('precoProduto')
                    <p class="text-danger mt-2">{{ $message }}</p>
                @enderror
            </div>
            <button type="submit" class="btn btn-primary text-center">Cadastrar</button>
        </form>
    </div>
</x-layout>
