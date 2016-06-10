<?php 
	
	//var_dump($_POST);


	$daoCategoria = new CategoriaDAO();
	$daoProduto = new ProdutoDAO();


	if(isset($_POST["categoria_produto"])){
		$categoria = $_POST["categoria_produto"];
		$categoria = str_replace("cat_", "", $categoria);
		$produtos = $daoProduto->buscarPorCategora($categoria);
		include("view/ListaProdutosView.php");

	}else{
		$categorias = $daoCategoria->buscarTodos();
		$produtos = $daoProduto->buscarPorCategora(25);
		include("view/HomeView.php");
	}


	
	

	//var_dump($produtos);

	



 ?>