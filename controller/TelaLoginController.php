<?php  

	if(isset($_POST["email"]) && 
	   isset($_POST["senha"])){
		
		require("model/UsuarioDAO.class.php");
		$dao = new UsuarioDAO();

		$deuLogin = $dao->login($_POST["email"],$_POST["senha"]);
		if($deuLogin){
			$usuario = $dao->buscaUsrByEmail($_POST["email"]);
			$_SESSION["usr"] = $usuario;
			include("controller/HomeController.php");
		}else{
			echo "Opa, algum dado esta errado...  EROOOOUUWWW";
			include("view/TelaLogin.php");
		}



	}else{
		include("view/TelaLogin.php");
	}

	

?>