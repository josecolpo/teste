<!DOCTYPE html>
<html>
<head>
	<title>Cadastro</title>
	<meta charset="UTF-8">
	<link rel="stylesheet" type="text/css" href="view/estilo.css">
</head>
<body>

Insira seus dados
<form id="formCadastro" action="http://localhost/lojinha2/index.html" method="post">
	<table>
		<tr>

			<?php
	
				echo "<td>Nome:</td>";
		
	
				
				echo'
			<td><input name="nome" type="text"><br></td>';

			?>

		</tr>
		<tr>
			<?php
				if(isset($erros["email"])){
					echo "<td class='erroCampo'>E-mail:</td>";

				}else{
					echo "<td>E-mail:</td>";
				}
		
					echo'
			<td><input name="email" type="text"><br></td>';


				if(isset($erros["email"])){
					echo "<td class='erroCampo'>".$erros["email"]."</td>";
				}
			?>
		</tr>
		<tr>
			<td>Endereço:</td>
			<td><input name="endereco" type="text"><br></td>
		</tr>
		<tr>
			<td>Senha:</td>
			<td><input name="senha" type="password"><br></td>
		</tr>
		<tr>
			<td>Telefone:</td>
			<td><input name="telefone" type="text"><br></td>
		</tr>
		<tr>
			<td>CPF:</td>
			<td><input name="cpf" type="text"><br></td>
		</tr>
	</table>
	<input type="submit" value="Cadastrar">
</form>

</body>
</html>