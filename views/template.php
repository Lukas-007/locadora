<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>Sistema de Avaliação</title>
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" type="text/css" href="<?php echo BASE_URL; ?>assets/css/bootstrap.min.css">
		<link rel="stylesheet" type="text/css" href="<?php echo BASE_URL; ?>assets/css/style.css" >
	</head>
	<body class="<?php echo $viewName; ?>">
	
		<nav class="navbar navbar-expand-lg navbar-dark bg-primary">
			<a class="navbar-brand" href="#">Locação de Veículos</a>
			<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
				<span class="navbar-toggler-icon"></span>
			</button>
			<div class="collapse navbar-collapse" id="navbarText">
				<ul class="navbar-nav mr-auto">
				<li class="nav-item active">
					<a class="nav-link" href="<?php echo BASE_URL?>">Home <span class="sr-only">(current)</span></a>
				</li>
				
				</ul>
			</div>
		</nav>

		<div class="body">
			<div class="container">
				<div class="conteudo">
							
				<?php $this->loadViewInTemplate($viewName, $viewData); ?>
				</div>
			</div>	
		</div>	
		<div class="modal_bg">
			<div class="modal_bg close_modal">
        		
        	</div>
        	<div class="modal_">
        		
        	</div>
        </div>
        
        <div class="footer bg-primary mb-5 mt-5">
        	<span>
        		<strong>SISTEMA DE LOCAÇÃO - 2023</strong> | VERSÃO: <?php echo VERSION ;?> 
        	</span>
        </div>
		<script type="text/javascript">var BASE_URL = '<?php echo BASE_URL; ?>';</script>
		<script type="text/javascript" src="<?php echo BASE_URL; ?>assets/js/jquery-2.1.3.min.js"></script>			
		<script type="text/javascript" src="<?php echo BASE_URL; ?>assets/js/script.js"></script>
	</body>
</html>