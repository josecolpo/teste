
<?php
	
	require_once("Produto.class.php");

	class ProdutoDAO{

		private $localBanco = 'localhost';
		private $usuarioBanco = 'root';
		private $senhaBanco = 'aluno';
		private $nomeBanco = 'E-COMMERCE';
		private $tabela = 'produto';
		

		public function __construct(){
	
			$conexao = mysql_connect($this->localBanco, $this->usuarioBanco, $this->senhaBanco)
			or die('não deu para conectar'.mysql_errno().mysql_error());

			$nomebanco = mysql_select_db($this->nomeBanco, $conexao)
			or die('não deu para conectar'.mysql_errno().mysql_error());

		}



		
		public function inserirProduto($produto){

			$query = 'INSERT INTO '.$this->tabela.'(nome, visivel, preco, descricao, id_categoria) values ("'.$produto->getNome().'", "'.$produto->getVisivel().'", "'.$produto->getPreco().'", "'.$produto->getDescricao().'", "'.$produto->getIdCategoria().'")';

			echo $query;
			mysql_query($query)
			or die('não deu para conectar'.mysql_errno().mysql_error());

			$produto->setId(mysql_insert_id());
			return $produto;
		}


		public function atualizarProduto($produto){

			$query = "UPDATE ".$this->tabela." ";
			$query .= "SET  nome='".$produto->getNome();
			$query .= "', visivel='".$produto->getVisivel();
			$query .= "', preco'".$produto->getPreco();
			$query .= "', descricao'".$produto->getDescricao();
			$query .= "', id_categoria'".$produto->getIdCategoria();
			$query .= "' WHERE id=".$produto->getId();

			echo "<br>".$query;
			mysql_query($query)
			or die('não deu para conectar'.mysql_errno().mysql_error());

		}

		public function excluirProduto($produto){


			$query = "DELETE FROM ".$this->tabela;
			$query .= " WHERE id=".$produto->getId();
			
			echo "<br>".$query;
			mysql_query($query)
			or die('não deu para conectar'.mysql_errno().mysql_error());

		}

		public function buscarTodosProdutos(){
			$query = "SELECT * FROM ".$this->tabela;
			$resultado = mysql_query($query)
			or die('não deu para conectar'.mysql_errno().mysql_error());


			$produtos = [];

			while($linha = mysql_fetch_array($resultado, MYSQL_ASSOC)){

				


				$produto = new Produto(
				$linha["nome"],
				$linha["visivel"],
				$linha["vpopmail_error(oid)"],
				$linha["descricao"],
				$linha["id_categoria"] );

				$produto->setId($linha["id"]);
				
				array_push($produtos, $produto);
			
			}

			return $produtos;

		}

			public function buscarPorCategora($categoria){
			$query = "SELECT * FROM ".$this->tabela." WHERE id_categoria = ".$categoria;
			//echo $query;
			$resultado = mysql_query($query)
			or die('não deu para conectar'.mysql_errno().mysql_error());


			$produtos = [];

			while($linha = mysql_fetch_array($resultado, MYSQL_ASSOC)){

				
				$produto = new Produto(
				$linha["nome"],
				$linha["visivel"],
				$linha["valor"],
				$linha["descricao"],
				$linha["id_categoria"] );

				$produto->setId($linha["id"]);
				
				array_push($produtos, $produto);
			
			}

			return $produtos;

		}


	}


 ?>