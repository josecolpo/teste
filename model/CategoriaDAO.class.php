
<?php
	
	require_once("Categoria.class.php");

	class CategoriaDAO{

		private $localBanco = 'localhost';
		private $usuarioBanco = 'root';
		private $senhaBanco = 'aluno';
		private $nomeBanco = 'E-COMMERCE';
		private $tabela = 'categoria';
		

		public function __construct(){
	
			$conexao = mysql_connect($this->localBanco, $this->usuarioBanco, $this->senhaBanco)
			or die('não deu para conectar'.mysql_errno().mysql_error());

			$nomebanco = mysql_select_db($this->nomeBanco, $conexao)
			or die('não deu para conectar'.mysql_errno().mysql_error());

		}



		
		public function inserirCategoria($categoria){

			$query = 'INSERT INTO '.$this->tabela.'(nome) values ("'.$categoria->getNome().'")';

			echo $query;
			mysql_query($query)
			or die('não deu para conectar'.mysql_errno().mysql_error());

			$categoria->setId(mysql_insert_id());
			return $categoria;
		}


		public function atualizarCategoria($categoria){

			$query = "UPDATE ".$this->tabela." ";
			$query .= "SET  nome='".$categoria->getNome();
			$query .= "' WHERE id=".$categoria->getId();

			echo "<br>".$query;
			mysql_query($query)
			or die('não deu para conectar'.mysql_errno().mysql_error());

		}

		public function excluirCategoria($categoria){


			$query = "DELETE FROM ".$this->tabela;
			$query .= " WHERE id=".$categoria->getId();
			
			echo "<br>".$query;
			mysql_query($query)
			or die('não deu para conectar'.mysql_errno().mysql_error());

		}

		public function buscarTodos(){
			$query = "SELECT * FROM ".$this->tabela;
			$resultado = mysql_query($query)
			or die('não deu para conectar'.mysql_errno().mysql_error());


			$categorias = [];

			while($linha = mysql_fetch_array($resultado, MYSQL_ASSOC)){

				$categoria = new Categoria( $linha["nome"]);

				$categoria->setId($linha["id"]);
				
				array_push($categorias, $categoria);
			
			}

			return $categorias;

		}


	}


 ?>