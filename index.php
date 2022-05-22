<!DOCTYPE html>
<html lang="pt-br">
	<head>
		<meta charset="UTF-8">
		<title>Aparecida Nutrição</title>
		<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
	</head>
	<body>
		<main>
			<section class="w-50 m-auto">
				<h3>Meus pacientes</h2>
				<table class="table table-striped">
					<thead>
						<tr>
							<th scope="col">Id</th>
							<th scope="col">Nome</th>
							<th scope="col">Peso(kg)</th>
							<th scope="col">Altura(m)</th>
							<th scope="col">Gordura Corporal(%)</th>
							<th scope="col">IMC</th>
						</tr>
					</thead>
					<tbody id="tabela-pacientes">
						<?php
							include("connect.php");

							$query = "SELECT * FROM clients";
						
							$result = mysqli_query($conn, $query);

							mysqli_close($conn); 

							while (list ($id, $name, $weight, $heigth, $fat) = mysqli_fetch_row($result)) {

								$imc = $weight / (($heigth / 100) * ($heigth / 100));

								

								if($imc < 18.5){
									$imc_class = "table-primary";
								}else if($imc >= 18.5 && $imc <= 24.9){
									$imc_class = "table-success";
								}else if($imc >= 25 && $imc <= 29.9){
									$imc_class = "table-warning";
								}else{
									$imc_class = "table-danger";
								}
						?>
							<tr class=<?= $imc_class ?>>
								<td><?= $id ?></td>
								<td><?= $name ?></td>
								<td><?= $weight ?></td>
								<td><?= $heigth ?></td>
								<td><?= $fat ?></td>
								<td><?= number_format($imc, 2) ?></td>
							</tr>
						<?php
							}
						?>
					</tbody>
				</table>
			</section>
			<section class="w-50 m-auto">
				<h2 id="titulo-form">Adicionar paciente</h2>
				<form action="add_product.php" method="POST">
					<div class="form-group">
						<label for="client_name">Nome:</label>
						<input
							required
							type="text"
							name="client_name"
							id="client_name"
							placeholder="Digite o nome do seu paciente"
							class="form-control"
						>
					</div>
					<div class="form-group">
						<label for="client_weight">Peso:</label>
						<input
							required
							type="text"
							name="client_weight"
							id="client_weight"
							placeholder="Digite o peso do seu paciente"
							class="form-control"
						>
					</div>
					<div class="form-group">
						<label for="client_height">Altura:</label>
						<input
							required
							type="decimal"
							name="client_height"
							id="client_height"
							placeholder="Digite a altura do seu paciente"
							class="form-control"
						>
					</div>
					<div class="form-group">
						<label for="client_fat">Percentual de gordura:</label>
						<input
							required
							type="decimal"
							name="client_fat"
							id="client_fat"
							placeholder="Digite o percentural de gordura do seu paciente"
							class="form-control"
						>
					</div>
					<button class="btn btn-primary w-100 mt-2">Adicionar</button>
				</form>
			</section>
		</main>
		<script src="js/principal.js"></script>
	</body>
</html>
