<x-layout>
    <div class="container mt-3 mb-5">
        <input id="id-venda-session" value="{{ Session::get('id') ?? '' }}" type="number" hidden>

        @if (Session::has('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ Session::get('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        <div class="modal fade" id="staticBackdrop1" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
            aria-labelledby="staticBackdrop1Label" aria-hidden="true">
            <div class="modal-dialog">
                <form method="POST" action="/clientes/novo">
                    @csrf

                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="staticBackdrop1Label">Cadastro de cliente</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <div class="mb-3">
                                <label for="nomeCliente" class="form-label">Nome do cliente</label>
                                <input value="{{ old('nomeCliente') }}" name="nomeCliente"
                                    placeholder="Ex: Fulano da Silva" type="text" class="form-control"
                                    id="nomeCliente">

                                @error('nomeCliente')
                                    <p class="text-danger mt-2">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="cpfCliente" class="form-label">CPF do cliente</label>
                                <input maxlength="11" value="{{ old('cpfCliente') }}" name="cpfCliente"
                                    placeholder="Ex: 12345678900" type="text" class="form-control" id="cpfCliente">

                                @error('cpfCliente')
                                    <p class="text-danger mt-2">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
                            <button type="submit" class="btn btn-primary">Cadastrar</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>

        <div class="modal fade" id="staticBackdrop2" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
            aria-labelledby="staticBackdrop2Label" aria-hidden="true">
            <div class="modal-dialog">
                <form method="POST" action="/produtos/novo">
                    @csrf

                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="staticBackdrop2Label">Cadastro de produto</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <div class="mb-3">
                                <label for="nomeProduto" class="form-label">Nome do produto</label>
                                <input value="{{ old('nomeProduto') }}" name="nomeProduto" placeholder="Ex: Boné"
                                    type="text" class="form-control" id="nomeProduto">

                                @error('nomeProduto')
                                    <p class="text-danger mt-2">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="descricaoProduto" class="form-label">Descrição do produto</label>
                                <textarea value="{{ old('descricaoProduto') }}" name="descricaoProduto" placeholder="Ex: Tamanho M, de cor azul"
                                    class="form-control" id="descricaoProduto" rows="3"></textarea>

                                @error('descricaoProduto')
                                    <p class="text-danger mt-2">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="precoProduto" class="form-label">Preço do produto</label>
                                <input step=".01" value="{{ old('precoProduto') }}" name="precoProduto"
                                    placeholder="Ex: 45.50" type="number" class="form-control" id="precoProduto">

                                @error('precoProduto')
                                    <p class="text-danger mt-2">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
                            <button type="submit" class="btn btn-primary">Cadastrar</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>

        <div class="modal fade" id="staticBackdrop3" data-bs-backdrop="static" data-bs-keyboard="false"
            tabindex="-1" aria-labelledby="staticBackdrop3Label" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="staticBackdrop3Label">Editar produto da lista</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                            aria-label="Close"></button>
                    </div>

                    <div class="modal-body">
                        <div class="mb-3">
                            <label for="nome-produto" class="form-label">Nome do produto</label>
                            <input value="" name="nome-produto" type="text" class="form-control"
                                id="nome-produto">
                        </div>
                        <div class="mb-3">
                            <label for="quantidade-produto" class="form-label">Quantidade</label>
                            <input min="1" onchange="calculaSubtotal(true)" step=".01" value=""
                                name="quantidade-produto" type="number" class="form-control"
                                id="quantidade-produto">
                        </div>
                        <div class="mb-3">
                            <label for="preco-produto" class="form-label">Valor unitário</label>
                            <input onchange="calculaSubtotal(true)" step=".01" value=""
                                name="preco-produto" type="number" class="form-control" id="preco-produto">
                        </div>
                        <div class="mb-3">
                            <label for="subtotal-produto" class="form-label">Subtotal</label>
                            <input step=".01" value="" name="subtotal-produto" type="number"
                                class="form-control" id="subtotal-produto">
                        </div>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
                        <button onclick="salvaProdutoEditado()" type="button"
                            class="btn btn-primary">Salvar</button>
                    </div>
                </div>
            </div>
        </div>

        <div class="modal fade" id="staticBackdrop4" data-bs-backdrop="static" data-bs-keyboard="false"
            tabindex="-1" aria-labelledby="staticBackdrop4Label" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="staticBackdrop4Label">Cadastro de produto</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                            aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="mb-3">
                            <label for="data-vencimento-editado" class="form-label" style="display: block">Data
                                vencimento</label>
                            <input value="" type="date" name="data-vencimento-editado"
                                id="data-vencimento-editado"
                                style="padding: 8px 10px; border: 1px solid #ced4da; border-radius: 0.25rem">
                        </div>
                        <div class="mb-3">
                            <label for="valor-parcela-editado" class="form-label">Valor parcela</label>
                            <input value="" step="0.000001" type="number" name="valor-parcela-editado"
                                class="form-control" id="valor-parcela-editado">
                        </div>
                        <div class="mb-3">
                            <label for="tipo-pagamento-editado" class="mb-2">Tipo de pagamento</label>
                            <select name="tipo-pagamento-editado" id="tipo-pagamento-editado" class="form-select"
                                aria-label="Default select example">
                                <option selected>Selecione um tipo de pagamento</option>
                                <option value="dinheiro">Dinheiro</option>
                                <option value="cheque">Cheque</option>
                                <option value="credito">Cartão de crédito</option>
                                <option value="debito">Cartão de débito</option>
                            </select>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
                        <button onclick="salvaParcelaEditada()" type="button"
                            class="btn btn-primary">Salvar</button>
                    </div>
                </div>
                </form>
            </div>
        </div>

        <form id="vendas-form" onsubmit="salvarVenda(event)" method="POST" action="/vendas/nova">
            @csrf

            <div>
                <h3 class="mb-3">Cliente</h3>
                <div class="mb-3">
                    <label for="nomeCliente" class="form-label">Nome do cliente (opcional)</label>
                    <select class="form-select js-example-basic-single" name="nomeCliente" id="nomeCliente"
                        data-live-search="true">
                        <option value="Nenhum">Nenhum cliente</option>
                        @foreach ($clientes as $cliente)
                            <option value="{{ $cliente->nome }}">{{ $cliente->nome }}</option>
                        @endforeach
                    </select>
                    <button type="button" class="btn btn-primary mt-3" data-bs-toggle="modal"
                        data-bs-target="#staticBackdrop1">
                        Novo cliente
                    </button>
                </div>
            </div>

            <hr class="my-4">

            <div id="itens-div">
                <h3 class="mb-3">Itens</h3>
                <div class="container">
                    <div class="row">
                        <div class="col">
                            <label for="nomeProduto">Produto</label>
                            <select required onchange="autoCompletarDados()" id="select-produto"
                                class="form-select js-example-basic-single" name="nomeProduto" id="nomeProduto"
                                data-live-search="true">
                                <option value="">Selecione o produto</option>
                                @foreach ($produtos as $produto)
                                    <option value="{{ $produto->id }}">{{ $produto->nome }}
                                        | R$
                                        {{ $produto->preco_unitario }}</option>
                                @endforeach
                            </select>
                            <button type="button" class="btn btn-primary mt-3" data-bs-toggle="modal"
                                data-bs-target="#staticBackdrop2">
                                Novo
                            </button>
                        </div>
                        <div class="col">
                            <label for="quantidade">Quantidade</label>
                            <input required min="1" onchange="calculaSubtotal()" step=".01"
                                value="" name="quantidade" type="number" class="form-control"
                                id="quantidade">
                        </div>
                        <div class="col">
                            <label for="valor_unitario">Valor unitário</label>
                            <input required onchange="calculaSubtotal()" step=".01" value=""
                                name="valor_unitario" type="number" class="form-control" id="valor_unitario">
                        </div>
                        <div class="col">
                            <label for="subtotal">Subtotal</label>
                            <input required step=".01" value="" name="subtotal" type="number"
                                class="form-control" id="subtotal">
                        </div>
                        <div class="col">
                            <br>
                            <button onclick="adicionaProduto()" id="adicionar-item" type="button"
                                class="btn btn-info">Adicionar</button>
                        </div>
                    </div>
                </div>
                <table class="table table-striped mt-4">
                    <thead>
                        <tr>
                            <th scope="col">Código</th>
                            <th scope="col">Produto</th>
                            <th scope="col">Quantidade</th>
                            <th scope="col">Valor unitário</th>
                            <th scope="col">Subtotal</th>
                            <th scope="col">Ações</th>
                        </tr>
                    </thead>
                    <tbody id="table-body">
                    </tbody>
                </table>
            </div>

            <hr class="my-4">

            <div id="pagamento-div">
                <h3 class="mb-3">Pagamento</h3>

                <div class="container">
                    <div class="row">
                        <div class="col">
                            <label for="select-tipo" class="mb-2">Tipo de pagamento</label>
                            <select name="tipo-pagamento" id="select-tipo" class="form-select"
                                aria-label="Default select example">
                                <option selected>Selecione um tipo de pagamento</option>
                                <option value="dinheiro">Dinheiro</option>
                                <option value="cheque">Cheque</option>
                                <option value="credito">Cartão de crédito</option>
                                <option value="debito">Cartão de débito</option>
                            </select>

                            <label for="select-forma" class="mt-5 mb-2">Forma de pagamento</label>
                            <select onchange="verificaForma()" id="select-forma" class="form-select"
                                aria-label="Default select example">
                                <option selected>Selecione uma forma de pagamento</option>
                                <option value="vista">À vista</option>
                                <option value="personalizado">Personalizado</option>
                            </select>

                            <label for="quantidade-parcelas" class="mt-5 form-label">Qtd. de parcelas</label>
                            <div style="display: flex; gap: 1rem">
                                <input value="1" disabled oninput="calculaValorParcela()" min="1"
                                    type="number" name="quantidade-parcelas" class="form-control"
                                    id="quantidade-parcelas" style="width: 50%;">
                                <button type="button" class="btn btn-primary">
                                    <i class="bi bi-list-ul"></i>
                                </button>
                            </div>

                            <div class="col mt-5" style="display: flex">
                                <div>
                                    <label for="data-vencimento" class="form-label">Data vencimento</label>
                                    <input type="date" name="data-vencimento" id="data-vencimento"
                                        style="padding: 8px 10px; border: 1px solid #ced4da; border-radius: 0.25rem">
                                </div>

                                <div>
                                    <label for="valor-parcela" class="form-label">Valor parcela</label>
                                    <input step="0.000001" type="number" name="valor-parcela" class="form-control"
                                        id="valor-parcela">
                                </div>
                            </div>

                            <button id="adicionar-pagamento" onclick="adicionaParcela()" type="button"
                                class="btn btn-success mt-4">Adicionar
                                pagamento</button>
                        </div>
                        <div class="col-8">
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th scope="col">Parcela</th>
                                        <th scope="col">Data</th>
                                        <th scope="col">Valor</th>
                                        <th scope="col">Tipo</th>
                                        <th scope="col">Ações</th>
                                    </tr>
                                </thead>
                                <tbody id="table-parcela-body">
                                </tbody>
                            </table>
                            <button onclick="excluirTodasParcelas()" type="button" class="btn btn-danger">Excluir
                                parcelas</button>
                        </div>
                    </div>
                </div>
            </div>
            <input name="valor-integral" type="number" hidden>
            <input name="id-venda" type="number" hidden>

            <button id="salvar-venda" type="submit" class="btn btn-primary text-center mt-4 me-3">Salvar
                venda</button>
            <button onclick="limparDados()" id="limpar-dados" type="button"
                class="btn btn-outline-primary text-center mt-4">Limpar dados</button>
        </form>
    </div>
</x-layout>

<script>
    $(document).ready(function() {
        $('.js-example-basic-single').select2();
    });

    const valorUnitarioInput = document.querySelector("input[name='valor_unitario']");
    const quantidadeInput = document.querySelector("input[name='quantidade']");
    const subtotalInput = document.querySelector("input[name='subtotal']");
    const tableBody = document.getElementById("table-body");
    const selectProduto = document.getElementById("select-produto");
    const selectTipo = document.getElementById("select-tipo");
    const selectForma = document.getElementById("select-forma");
    const qtdParcelasInput = document.querySelector("input[name='quantidade-parcelas']");
    const valorParcelaInput = document.querySelector("input[name='valor-parcela']");
    const dataVencimentoInput = document.querySelector("input[name='data-vencimento']");
    const adicionarPagamentoButton = document.getElementById("adicionar-pagamento");
    const tableParcelaBody = document.getElementById("table-parcela-body");
    const salvarVendaButton = document.getElementById("salvar-venda");
    const valorIntegral = document.querySelector("input[name='valor-integral']");
    const parcelasInput = document.querySelector("input[name='parcelas[]']");
    const vendasForm = document.getElementById("vendas-form");
    const idVendaSessionInput = document.getElementById("id-venda-session");
    const idVendaInput = document.querySelector("input[name='id-venda']");

    const nomeProdutoEditar = document.querySelector("input[name='nome-produto']");
    const quantidadeProdutoEditar = document.querySelector("input[name='quantidade-produto']");
    const precoProdutoEditar = document.querySelector("input[name='preco-produto']");
    const subtotalProdutoEditar = document.querySelector("input[name='subtotal-produto']");

    const dataVencimentoEditar = document.querySelector("input[name='data-vencimento-editado']");
    const valorParcelaEditar = document.querySelector("input[name='valor-parcela-editado']");
    const tipoPagamentoEditar = document.getElementById("tipo-pagamento-editado");

    let dadosProduto;
    let precoTotal = 0;
    let precoTotalParcelas;
    let produtosSelecionados = [];
    let parcelas = [];
    let produtoEditar;
    let idVenda;

    function limparDados() {
        localStorage.removeItem("parcelas");
        localStorage.removeItem("itens");
        localStorage.removeItem("id_venda");
        parcelas = [];
        produtosSelecionados = [];
        qtdParcelasInput.value = 1;
        precoTotal = 0;
        valorIntegral.value = precoTotal;
        valorParcelaInput.value = 0;
        alteraTabela();
        alteraTabelaParcelas();
    }

    function salvarVenda(e) {
        valorIntegral.value = precoTotal;

        parcelas.forEach(parcela => {
            const inputParcela = document.createElement("input");
            inputParcela.setAttribute("name", "parcelas[]");
            inputParcela.setAttribute("hidden", "");
            vendasForm.append(inputParcela);
            inputParcela.value = JSON.stringify(parcela);
        })

        if (validaValores()) {
            e.preventDefault();
        }

        localStorage.setItem("parcelas", JSON.stringify(parcelas));
        localStorage.setItem("itens", JSON.stringify(produtosSelecionados));
    }

    function validaValores() {
        const pagamentoDiv = document.getElementById("pagamento-div");

        if (precoTotalParcelas > precoTotal) {
            criarAlert("O valor total das parcelas é maior do que o preço da venda!", pagamentoDiv);

            return true;
        }

        if (precoTotalParcelas < precoTotal) {
            criarAlert("O valor total das parcelas é menor do que o preço da venda!", pagamentoDiv);

            return true;
        }
    }

    function formataData(data) {
        return data.split("-").reverse().join("/");
    }

    function calculaValorParcela() {
        valorParcelaInput.value = precoTotal / qtdParcelasInput.value;
    }

    function calculaPrecoTotal() {
        precoTotal = produtosSelecionados.reduce((accumulator, produto) => {
            return accumulator += Number(produto.subtotal);
        }, 0)
        valorParcelaInput.value = precoTotal;
    }

    function calculaPrecoTotalParcelas() {
        precoTotalParcelas = parcelas.reduce((accumulator, parcela) => {
            return accumulator += Number(parcela.valor);
        }, 0)
    }

    function verificaForma() {
        if (selectForma.value === "personalizado") {
            qtdParcelasInput.value = '';
            qtdParcelasInput.removeAttribute("disabled");
        }
    }

    function alteraTabela() {
        tableBody.innerHTML = '';

        produtosSelecionados.forEach(produto => {
            var newRow = tableBody.insertRow();
            newRow.innerHTML = `<th scope="row">${produto.id}</th>
                            <td>${produto.nome}</td>
                            <td>${produto.quantidade}</td>
                            <td>R$ ${produto.valor_unitario}</td>
                            <td>R$ ${produto.subtotal}</td>
                            <td>
                                <button onclick="excluirProduto(${produto.id})" type="button" class="btn btn-danger">
                                    <i class="bi bi-trash-fill"></i>
                                </button>
                                <button onclick="editarProduto(${produto.id})" type="button" class="btn btn-warning" data-bs-toggle="modal"
                                    data-bs-target="#staticBackdrop3">
                                    <i class="bi bi-pencil-fill"></i>
                                </button>
                            </td>`;

            tableBody.append(newRow);
        })
    }

    function alteraTabelaParcelas() {
        tableParcelaBody.innerHTML = '';

        parcelas.forEach(parcela => {
            var newRow = tableParcelaBody.insertRow();
            newRow.innerHTML = `<th scope="row">${parcela.numero + 1}</th>
                                <td>${formataData(parcela.data)}</td>
                                <td>${parcela.valor}</td>
                                <td>${parcela.tipo.toUpperCase()}</td>
                                <td>
                                    <button onclick="excluirParcela(${parcela.numero})" type="button" class="btn btn-danger">
                                        <i class="bi bi-trash-fill"></i>
                                    </button>
                                    <button onclick="editarParcela(${parcela.numero})" type="button" class="btn btn-warning" data-bs-toggle="modal"
                                    data-bs-target="#staticBackdrop4">
                                    <i class="bi bi-pencil-fill"></i>
                                </button>
                                </td>`

            tableParcelaBody.append(newRow);
        })
    }

    function criarAlert(mensagem, divEspecifica) {
        const alertDiv = document.createElement("div");
        alertDiv.classList.add("alert", "alert-danger", "alert-dismissible", "fade", "show");
        alertDiv.setAttribute("role", "alert");
        alertDiv.innerHTML =
            `${mensagem}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>`
        divEspecifica.prepend(alertDiv);
    }

    function calculaSubtotal(edit = false) {
        subtotalInput.value = quantidadeInput.value * valorUnitarioInput.value;

        if (edit) {
            subtotalProdutoEditar.value = quantidadeProdutoEditar.value * precoProdutoEditar.value;
        }
    }

    function excluirProduto(id) {
        const index = produtosSelecionados.findIndex(produto => produto.id === id);
        produtosSelecionados.splice(index, 1);

        alteraTabela();
        calculaPrecoTotal();
    }

    function excluirParcela(id) {
        const index = parcelas.findIndex(parcela => parcela.numero === id);
        parcelas.splice(index, 1);

        alteraTabelaParcelas();
        calculaPrecoTotalParcelas();

        adicionarPagamentoButton.removeAttribute("disabled");
    }

    function adicionaProduto() {
        if (quantidadeInput.value <= 0 || subtotalInput.value <= 0) {
            const itensDiv = document.getElementById("itens-div");
            criarAlert("A quantidade e o subtotal devem ser maiores que 0!", itensDiv);

            return
        }

        produtosSelecionados.push({
            "id": dadosProduto.id,
            "nome": dadosProduto.nome,
            "quantidade": quantidadeInput.value,
            "valor_unitario": valorUnitarioInput.value,
            "subtotal": subtotalInput.value,
        })

        alteraTabela();
        calculaPrecoTotal();
    }

    function adicionaParcela() {
        if (qtdParcelasInput.value <= 0 || valorParcelaInput.value <= 0) {
            const pagamentoDiv = document.getElementById("pagamento-div");
            criarAlert("A quantidade de parcelas e o valor devem ser maiores que 0!", pagamentoDiv);

            return;
        }

        if (dataVencimentoInput.value === '') {
            const pagamentoDiv = document.getElementById("pagamento-div");
            criarAlert("A parcela deve ter a data de validade!", pagamentoDiv);

            return;
        }

        parcelas.push({
            "numero": parcelas.length,
            "data": dataVencimentoInput.value,
            "valor": valorParcelaInput.value,
            "tipo": selectTipo.value,
        })

        if (parcelas.length === Number(qtdParcelasInput.value)) {
            adicionarPagamentoButton.setAttribute("disabled", "");
        }

        alteraTabelaParcelas()
        calculaPrecoTotalParcelas()
    }

    function excluirTodasParcelas() {
        tableParcelaBody.innerHTML = '';
        parcelas = [];
        adicionarPagamentoButton.removeAttribute("disabled");
    }

    function editarProduto(id) {
        produtoEditar = produtosSelecionados.find(produto => produto.id === id);

        nomeProdutoEditar.setAttribute("value", produtoEditar.nome);
        quantidadeProdutoEditar.setAttribute("value", produtoEditar.quantidade);
        precoProdutoEditar.setAttribute("value", produtoEditar.valor_unitario);
        subtotalProdutoEditar.setAttribute("value", produtoEditar.subtotal);
        nomeProdutoEditar.value = produtoEditar.nome
        quantidadeProdutoEditar.value = produtoEditar.quantidade
        precoProdutoEditar.value = produtoEditar.valor_unitario
        subtotalProdutoEditar.value = produtoEditar.subtotal
    }

    function salvaProdutoEditado() {
        produtoEditar.nome = nomeProdutoEditar.value;
        produtoEditar.quantidade = quantidadeProdutoEditar.value;
        produtoEditar.valor_unitario = precoProdutoEditar.value;
        produtoEditar.subtotal = subtotalProdutoEditar.value;

        alteraTabela();
    }

    function editarParcela(id) {
        parcelaEditar = parcelas.find(parcela => parcela.numero === id)

        dataVencimentoEditar.setAttribute("value", parcelaEditar.data);
        valorParcelaEditar.setAttribute("value", parcelaEditar.valor);
        tipoPagamentoEditar.setAttribute("value", parcelaEditar.tipo);

        dataVencimentoEditar.value = parcelaEditar.data;
        valorParcelaEditar.value = parcelaEditar.valor;
        tipoPagamentoEditar.value = parcelaEditar.tipo;
    }

    function salvaParcelaEditada() {
        parcelaEditar.data = dataVencimentoEditar.value;
        parcelaEditar.valor = valorParcelaEditar.value;
        parcelaEditar.tipo = tipoPagamentoEditar.value;

        alteraTabelaParcelas();
        calculaPrecoTotalParcelas();
    }

    async function autoCompletarDados() {
        const result = await fetch(`/produtos/${selectProduto.value}`);
        dadosProduto = await result.json();
        valorUnitarioInput.value = dadosProduto.preco_unitario;

        calculaSubtotal();
    }

    document.addEventListener("DOMContentLoaded", () => {
        if (localStorage.getItem("parcelas") && localStorage.getItem("itens")) {
            parcelas = JSON.parse(localStorage.getItem("parcelas"));
            produtosSelecionados = JSON.parse(localStorage.getItem("itens"));

            alteraTabela();
            alteraTabelaParcelas();
            calculaPrecoTotal();
            calculaPrecoTotalParcelas();

            localStorage.setItem("id_venda", idVendaSessionInput.value);
        }

        if (localStorage.getItem("id_venda")) {
            idVendaInput.value = localStorage.getItem("id_venda");
            selectProduto.removeAttribute("required");
            const requiredElements = document.querySelectorAll("input[required]");
            requiredElements.forEach(element => {
                element.removeAttribute("required")
            });

            vendasForm.setAttribute("action", `/vendas/${localStorage.getItem("id_venda")}`);
            let diretivaMetodo = document.createElement("input");
            diretivaMetodo.setAttribute("hidden", "");
            diretivaMetodo.setAttribute("name", "_method");
            diretivaMetodo.setAttribute("value", "PUT");
            vendasForm.children[0].insertAdjacentElement("afterend", diretivaMetodo);
        }
    })
</script>
