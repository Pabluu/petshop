@extends("templates.main")

@section("title", "Gerenciamento de Espécie")

@section("formulario")
<h1>Gerenciamento de Espécie</h1>
<form action="/especie" method="POST" class="row" onsubmit="">
	<div class="form-group col-9">
		<label for="descricao">Espécie do Animal</label>
		<input type="text" maxlength='100' name="descricao" class="form-control" value="{{$especie->descricao}}" />
	</div>

	<div class="form-group col-3">
		@csrf
		<input type="hidden" name="id" value="{{$especie->id}}" />

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
<table id="tabEspecie" class="table table-striped text-center" style="margin-top: 10px;">
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
		@foreach($especies as $especie)
		<tr>
			<td class="td_descricao">{{$especie->descricao}}</td>
			<td>
				<a href="/especie/{{$especie->id}}/edit" class="btn btn-warning">
					<i class="bi bi-pencil-square"></i>
					Edit
				</a>
			</td>
			<td>
				<form action="/especie/{{$especie->id}}" method="POST">
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

<script>
	function buscar(q) {

		q = q.toLowerCase();

		$("#tabEspecie tbody tr").each(function() {

			var mostrar = true;

			var descricao = $("td.td_descricao", this).html();
			descricao = descricao.toLowerCase();

			mostrar = descricao.includes(q)

			if (mostrar) {
				$(this).show();
			} else {
				$(this).hide();
			}
		});
	}
</script>