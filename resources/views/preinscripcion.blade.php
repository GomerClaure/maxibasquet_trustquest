<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
	<link href="../css/preinscripcion.css" rel="stylesheet">
	<title>Preinscripcion</title>
</head>

<body>

	<div style="background: #e9e9e9;">
		<div class="container justify-content-center"">
		<section class=" main-title pt-5 text-center">
			<h1 class="display-6 mb-0" style="color:#37474f">Formulario de preinscripción de equipos</h1>
			<p>3er Torneo Internacional de Maxi Basquet</p>
			</section>
			<div class="row">
				<div class="col-sm-12">
					<div class="card mb-3 " style="box-shadow: 0 2px 1px rgb(0 0 0 / 5%);border-top: 3px  solid #8CDDCD;">
						<!-- <div class="card-header">
						<h5>Datos del equipo</h5>
					</div> -->
						<div class="card-body">
							<form>
								<h5>Datos del equipo</h5>
								<hr>
								<div class="row">
									<div class="col-md-6">
										<form class="d-flex">
											<div>

											</div>
											<div class="form-group">
												<label for="nombreEquipo">Nombre de Equipo:</label>
												<input type="text" id="nombreEquipo" class="form-control" placeholder="Nombre de Equipo">
											</div>
											<div class="form-group">
												<div>
													<label for="categorias">Categorías:</label>
												</div>

												<div class="form-check form-check-inline">
													<input class="form-check-input" type="checkbox" id="inlineCheckbox1" value="option1">
													<label class="form-check-label" for="inlineCheckbox1">+30</label>
												</div>
												<div class="form-check form-check-inline">
													<input class="form-check-input" type="checkbox" id="inlineCheckbox2" value="option2">
													<label class="form-check-label" for="inlineCheckbox2">+35</label>
												</div>
												<div class="form-check form-check-inline">
													<input class="form-check-input" type="checkbox" id="inlineCheckbox1" value="option1">
													<label class="form-check-label" for="inlineCheckbox1">+40</label>
												</div>
												<div class="form-check form-check-inline">
													<input class="form-check-input" type="checkbox" id="inlineCheckbox2" value="option2">
													<label class="form-check-label" for="inlineCheckbox2">+45</label>
												</div>
												<div class="form-check form-check-inline">
													<input class="form-check-input" type="checkbox" id="inlineCheckbox1" value="option1">
													<label class="form-check-label" for="inlineCheckbox1">+50</label>
												</div>
												<div class="form-check form-check-inline">
													<input class="form-check-input" type="checkbox" id="inlineCheckbox2" value="option2">
													<label class="form-check-label" for="inlineCheckbox2">+55</label>
												</div>
												<div class="form-check form-check-inline">
													<input class="form-check-input" type="checkbox" id="inlineCheckbox1" value="option1">
													<label class="form-check-label" for="inlineCheckbox1">+60</label>
												</div>
												<!-- <input type="text" id="nombreEquipo" class="form-control" placeholder="Nombre de Equipo"> -->
											</div>
											<div class="form-group">
												<label for="exampleFormControlSelect1">País</label>
												<select class="form-select" id="exampleFormControlSelect1">
													<option>Argentina</option>
													<option>Bolivia</option>
													<option>Brasil</option>
													<option>Chile</option>
													<option>Colombia</option>
													<option>Ecuador</option>
													<option>Guyana</option>
													<option>Paraguay</option>
													<option>Peru</option>
													<option>Uruguay</option>
													<option>Venezuela</option>
												</select>
											</div>


										</form>
									</div>
									<div class="col-md-6">
										<form>
											<div class="form-group">
												<label>Text</label>
												<input type="text" class="form-control" placeholder="Text">
											</div>
											<div class="form-group">
												<label for="exampleFormControlSelect1">Example select</label>
												<select class="form-control" id="exampleFormControlSelect1">
													<option>1</option>
													<option>2</option>
													<option>3</option>
													<option>4</option>
													<option>5</option>
												</select>
											</div>
											<div class="form-group">
												<label for="exampleFormControlTextarea1">Example textarea</label>
												<textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
											</div>
										</form>
									</div>
								</div>
							</form>
						</div>
					</div>
				</div>
				<!-- [ form-element ] start -->
				<div class="col-sm-12">
					<div class="card border-primary mb-3">
						<!-- <div class="card-header">
                        <h5>Datos de pago</h5>
                    </div> -->
						<div class="card-body">
							<h5>Datos de pago</h5>
							<hr>
							<div class="row">
								<div class="col-md-6">
									<form>
										<div class="form-group">
											<label for="exampleInputEmail1">Email address</label>
											<input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
											<small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
										</div>
										<div class="form-group">
											<label for="exampleInputPassword1">Password</label>
											<input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
										</div>
										<div class="form-group form-check">
											<input type="checkbox" class="form-check-input" id="exampleCheck1">
											<label class="form-check-label" for="exampleCheck1">Check me out</label>
										</div>
										<button type="submit" class="btn  btn-primary">Submit</button>
									</form>
								</div>
								<div class="col-md-6">
									<form>
										<div class="form-group">
											<label>Text</label>
											<input type="text" class="form-control" placeholder="Text">
										</div>
										<div class="form-group">
											<label for="exampleFormControlSelect1">Example select</label>
											<select class="form-control" id="exampleFormControlSelect1">
												<option>1</option>
												<option>2</option>
												<option>3</option>
												<option>4</option>
												<option>5</option>
											</select>
										</div>
										<div class="form-group">
											<label for="exampleFormControlTextarea1">Example textarea</label>
											<textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
										</div>
									</form>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	</div>
</body>

</html>