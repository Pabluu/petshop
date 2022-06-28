@extends("templates.main")

@section("title", "Gerenciamento do Animal")

@section("formulario")
<h1>Gerenciamento do Animal</h1>
<form action="/especie" method="POST" class="row" onsubmit="">
    <div class="form-group col-6">
        <label for="descricao">Nome do animal</label>
        <input type="text" maxlength='100' name="descricao" class="form-control" value="" />
    </div>

    <div class="form-group col-6">
        <label for="descricao">Responsável</label>
        <input type="text" maxlength='100' name="descricao" class="form-control" value="" />
    </div>

    <div class="form-group col-6">
        <label for="descricao">Espécie do Animal</label>
        <input type="text" maxlength='100' name="descricao" class="form-control" value="" />
    </div>

    <div class="form-group col-6">
        <label for="descricao">Data de Nascimento</label>
        <input type="date" max="2022-06-23" name="descricao" class="form-control" value="" />
    </div>    

    <div class="form-group col-2">
        @csrf
        <input type="hidden" name="id" value="" />

        <a href="/produto" class="btn btn-primary" style="margin-top: 23px;">
            <i class="bi bi-plus-square"></i>
            Novo
        </a>
        <button type="submit" class="btn btn-success" style="margin-top: 23px;">
            <i class="bi bi-save"></i>
            Salvar
        </button>
    </div>
</form>
@endsection

@section("tabela")
<div class="row" style="margin-top: 50px;">
    <div class="col-12 form-group">
        <input type="text" id="q" placeholder="Pesquisar por descricao..." class="form-control" onkeyup="buscar($(this).val());" />
    </div>
</div>
<table id="tabProdutos" class="table table-striped text-center" style="margin-top: 10px;">
    <colgroup>
        <col width="200">
        <col colspan='2' width="100">
        <col width="100">
    </colgroup>
    <thead>
        <tr>
            <th>Descrição</th>
            <th colspan='2'>Ações</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td class="td_descricao"></td>
            <td>
                <a href="" class="btn btn-warning">
                    <i class="bi bi-pencil-square"></i>
                    Edit
                </a>
            </td>
            <td>
                <form action="" method="POST">
                    @csrf
                    <input type="hidden" name="_method" value="DELETE" />
                    <button type="submit" class="btn btn-danger" onclick="return confirm('Tem certeza?');">
                        <i class="bi bi-trash"></i>
                        Del
                    </button>
                </form>
            </td>
        </tr>
    </tbody>
</table>
@endsection