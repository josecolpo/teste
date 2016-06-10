<?php
	require_once("model/UsuarioDAO.class.php");
	require_once("model/CategoriaDAO.class.php");
	require_once("model/ProdutoDAO.class.php");

	session_start();
	//var_dump($_POST);	

	if(isset($_POST["abreCadastrarAi"])){
		include("controller/CadastroDeNovoUsuario.php");
	}else if(isset($_POST["login"])){
		include("controller/TelaLoginController.php");
	}else if(isset($_POST["logoff"])){
		unset($_SESSION['usr']);
		include("controller/HomeController.php");
	}else{	
		include("controller/HomeController.php");
	}
?>