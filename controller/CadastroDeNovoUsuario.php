<?php 



	if(isset($_POST["nome"])){
		echo"cadastrando";
		$nome = $_POST["nome"];
		$endereco = $_POST["endereco"];
		$senha = $_POST["senha"];
		$telefone = $_POST["telefone"];
		$email = $_POST["email"];
		$cpf = $_POST["cpf"];

		$deuErro = False;
		$erros = [];
		
		$dao = new UsuarioDAO();

		if($dao->emailExiste($email)){
			$erros["email"] = "Email Já Cadastrado";
			$deuErro = True;
		}

		if($deuErro){
			echo"deu erro";
			include("lojinha5/view/cadastro.php");
		}else{

			$usuario = new Usuario($nome, $email, $endereco, $senha, $telefone, $cpf, "false");
			

			$usuario = $dao->inserirUsuario($usuario);
			include("lojinha5/view/cadastro.php");
		}
	}else{	
		echo"inicio";
		include("view/cadastro.php");


	}

	
?>

