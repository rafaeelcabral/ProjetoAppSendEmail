<html>
	
	<head>
		<meta charset="utf-8" />
    	<title>App Send Email</title>
    	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
	</head>

	<body>

		<div class="container">  

			<div class="py-3 text-center">
				<img class="d-block mx-auto mb-2" src="img/logo.png" alt="" width="72" height="72">
				<h2>Send Email</h2>
				<p class="lead">Seu app de envio de e-mails particular!</p>
			</div>

      		<div class="row">

      			<div class="col-md-12">  

					<div class="card-body font-weight-bold">

						<form method="post" action="processar_envio.php">

							<div class="form-group">
								<label for="para">Para</label>
								<input type="text" class="form-control" id="para" placeholder="joao@dominio.com.br" name="para">
							</div>

							<div class="form-group">
								<label for="assunto">Assunto</label>
								<input type="text" class="form-control" id="assunto" placeholder="Assundo do e-mail" name="assunto">
							</div>

							<div class="form-group">
								<label for="mensagem">Mensagem</label>
								<textarea class="form-control" id="mensagem" name="mensagem"></textarea>
							</div>

							<?php
								if(isset($_GET['success']) == true && $_GET['success'] == 'false') {
							?>
									<div style="text-align: center; color: red">Preencha todos os Campos</div>
							<?php
								}
							?>

							<?php
								if(isset($_GET['success']) == true && $_GET['success'] == 'true') {
							?>
									<div style="text-align: center; color: green">Mensagem Enviada com Sucesso!</div>
							<?php
									unset($_GET['success']);
								}
							?>

							<button type="submit" class="btn btn-primary btn-lg">Enviar Mensagem</button>
							
						</form>	
											
					</div>

				</div>

      		</div>

      	</div>

	</body>

</html>