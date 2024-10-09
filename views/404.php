
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>404</title>
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" type="text/css" href="<?php echo BASE_URL; ?>assets/css/bootstrap.min.css">
		<link rel="stylesheet" type="text/css" href="<?php echo BASE_URL; ?>assets/css/style.css" >
		
	</head>
	<body>

		<nav class="navbar navbar-expand-lg navbar-dark bg-primary">
			<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo01" aria-controls="navbarTogglerDemo01" aria-expanded="false" aria-label="Alterna navegação">
				<span class="navbar-toggler-icon"></span>
			</button>
			<div class="collapse navbar-collapse" id="navbarTogglerDemo01">
				
		</nav>

		<div class="body container mt-5 ">
            <div class="row justify-content-md-center">
                <h1>404</h1>
                
            </div>  
            <div class="row justify-content-md-center">
                
                <h2>Pagina Não encontrada...</h2>
                
            </div> 
            <div class="row justify-content-md-center">
                
                
                <a class="btn btn-light btn btn-lg" href="javascript:history.back()">Voltar</a>
            </div>  
		</div>	
		
        
        <div class="footer">
        	<strong>VERSÃO: </strong><?php echo VERSION ;?>
        </div>
		<script type="text/javascript">var BASE_URL = '<?php echo BASE_URL; ?>';</script>
		<script type="text/javascript" src="<?php echo BASE_URL; ?>assets/js/jquery.min.js"></script>
		<script type="text/javascript" src="<?php echo BASE_URL; ?>assets/js/bootstrap.bundle.min.js"></script>		
		<script type="text/javascript" src="<?php echo BASE_URL; ?>assets/js/script.js"></script>
	</body>
</html>