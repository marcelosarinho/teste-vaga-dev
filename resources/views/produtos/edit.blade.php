<x-layout>
    <div class="container mt-3">
        <form method="POST" action="/produtos/{{ $produto->id }}">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label for="nomeProduto" class="form-label">Nome do produto</label>
                <input required value="{{ $produto->nome }}" name="nomeProduto" placeholder="Ex: Boné" type="text"
                    class="form-control" id="nomeProduto">
            </div>
            <div class="mb-3">
                <label for="descricaoProduto" class="form-label">Descrição do produto</label>
                <textarea required value="{{ $produto->descricao }}" name="descricaoProduto" placeholder="Ex: Tamanho M, de cor azul"
                    class="form-control" id="descricaoProduto" rows="3">{{ $produto->descricao }}</textarea>
            </div>
            <div class="mb-3">
                <label for="precoProduto" class="form-label">Preço do produto</label>
                <input required step=".01" value="{{ $produto->preco_unitario }}" name="precoProduto"
                    placeholder="Ex: 45.50" type="number" class="form-control" id="precoProduto">
            </div>
            <button type="submit" class="btn btn-primary text-center">Salvar</button>
        </form>
    </div>
</x-layout>
