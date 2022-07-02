@extends("templates.main")

@section("title", "Gerenciamento do Animal")

@section("formulario")
<h1>Gerenciamento do Animal</h1>
<form action="/animal" method="POST" class="row" onsubmit="">
    <div class="form-group col-6">
        <label for="nome">Nome do animal</label>
        <input type="text" maxlength='100' name="nome" class="form-control" value="{{$animal->nome}}" />
    </div>

    <div class="form-group col-6">
    <label for="nome_dono">Espécie</label>

        <select name='especie_id' id="" class="form-control selectpicker" data-live-search='true'>
            <option value=""></option>
            @foreach($animais as $animal)
            <option value=" {{$animal->id}}" @selected($especie->especie_id == $animal->id)>
                {{$animal->nome}}
            </option>
            @endforeach
        </select>
    </div>

    <div class="form-group col-6">
        <label for="nome_dono">Responsável</label>
        <input type="text" maxlength='100' name="nome_dono" class="form-control" value="{{$animal->nome_dono}}" />
    </div>

    <div class="form-group col-6">
        <label for="raca">Raça</label>
        <input type="text" maxlength='100' name="raca" class="form-control" value="{{$animal->raca}}" />
    </div>

    <div class="form-group col-6">
        <label for="data_nascimento">Data de Nascimento</label>
        <input type="date" max="2022-06-23" name="data_nascimento" class="form-control" value="{{$animal->data_nascimento}}" />
    </div>

    <div class="form-group col-3">
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
        <col width="200">
        <col width="100">
        <col width="100">
        <col colspan='2' width="100">
        <col width="100">
    </colgroup>
    <thead>
        <tr>
            <th>Nome</th>
            <th>Responsável</th>
            <th>Raça</th>
            <th>Idade</th>
            <th colspan='2'>Ações</th>
        </tr>
    </thead>
    <tbody>
        @foreach($animais as $animal)
        <tr>
            <td class="td_nome">{{$animal->nome}}</td>
            <td class="td_nome">{{$animal->nome_dono}}</td>
            <td class="td_nome">{{$animal->raca}}</td>
            <td class="td_nome">{{$animal->idade}}</td>
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
        @endforeach
    </tbody>
</table>
@endsection