<!DOCTYPE html>
<html>
<head>
	<title>Lojinha de Tudo</title>
	<link rel="stylesheet" type="text/css" href="view/estilo.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
</head>
<body>
	<div id="cabecalhoHome">
			
		<form action="" method="POST">
			<input type="submit" name="abreCadastrarAi" value="Cadastrar">
		</form>
		
		<?php 

			if(isset($_SESSION["usr"])){
				$logado = true;
				echo $_SESSION["usr"]->getNome();
			}else{
				$logado = false;
			}
			
			if($logado){
				echo '<form action="" method="POST">';
				echo '<input type="submit" name="logoff" value="Sair">';
				echo '</form>'; 
			}else{
				echo '<form action="" method="POST">';
				echo '<input type="submit" name="login" value="Login">';
				echo '</form>'; 

			}

		?>
		

	</div>

	<div id="menuHome">
	
		<ul>
		<?php 
			if(isset($categorias)){
				foreach ($categorias as $catego) {
					$nome = $catego->getNome();
					$id = $catego->getId();

					echo "<li class='itemMenu' id='cat_".$id."'> ".$nome."</li>";
				}
			}
		?>
		</ul>

	</div>


	

	<div id="conteudoHome">

	<?php 

		include('ListaProdutosView.php');
	?>
		
	
	</div>

	<script type="text/javascript">
		

	var funcaoDoClicao = function (){
	

		var categoria = this.id;

		$.ajax({ 
				url:"http://localhost/lojinha5/index.php",
				type:"POST",
				data: {categoria_produto:categoria},
				datatype:"html",
				success: function(resultado){
					alert(resultado);
					$("#conteudoHome").html(resultado);
				},

				error: function(xhr,ajaxOptions, seila){
					alert(xhr.status);
				}
		});


		
	}

	$(".itemMenu").click(funcaoDoClicao);

	</script>

</body>
</html>


