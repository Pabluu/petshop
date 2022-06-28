<!DOCTYPE html>
<html lang="pt-br">

<head>

    <!-- BOOTSTRAP.CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <!-- BOOTSTRAP ICONS.CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">

    <!-- BOOTSTRAP.JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>


    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('titulo')</title>
</head>

<body>
	<div class="container">

		<nav class="navbar navbar-expand-lg" style="background-color: #e3f2fd;">
			<div class="navbar-nav">
				<a class="nav-link" href="/especie">Especie</a>
				<a class="nav-link" href="/animal">Animal</a>
			</div>
		</nav>

		@if (Session::get("status") == "salvo")
		<div class="alert alert-success">
			Salvo com sucesso!
		</div>
		@endif

		@if (Session::get("status") == "excluido")
		<div class="alert alert-danger">
			Excluído com sucesso!
		</div>
		@endif

		@yield("formulario")
		@yield("tabela")

	</div>
</body>

</html>