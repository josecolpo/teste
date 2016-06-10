
<?php
	
	require_once("Usuario.class.php");

	class UsuarioDAO{

		private $localBanco = 'localhost';
		private $usuarioBanco = 'root';
		private $senhaBanco = 'aluno';
		private $nomeBanco = 'E-COMMERCE';
		private $tabela = 'usuario';

		public function __construct(){
	
			$conexao = mysql_connect($this->localBanco, $this->usuarioBanco, $this->senhaBanco)
			or die('não deu para conectar'.mysql_errno().mysql_error());

			$nomebanco = mysql_select_db($this->nomeBanco, $conexao)
			or die('não deu para conectar'.mysql_errno().mysql_error());

		}



		public function inserirUsuario($usuario){

			$query = 'INSERT INTO '.$this->tabela.'(nome, email, endereco, senha, telefone, cpf, adm) values ("'.$usuario->getNome(). '", "'.$usuario->getEmail().'", "'.$usuario->getEndereco().'", "'.$usuario->getSenha().'", '.$usuario->getTelefone().', '.$usuario->getCpf().', "'.$usuario->getAdm().'")';

			//echo $query;
			mysql_query($query)
			or die('não deu para conectar'.mysql_errno().mysql_error());

			$usuario->setId(mysql_insert_id());
			return $usuario;
		}

		public function atualizarUsuario($usuario){

			$query = "UPDATE ".$this->tabela." ";
			$query .= "SET  nome='".$usuario->getNome();
			$query .= "', email='".$usuario->getEmail();
			$query .= "', endereco='".$usuario->getEndereco();
			$query .= "', senha='".$usuario->getSenha();
			$query .= "', telefone=".$usuario->getTelefone();
			$query .= ", cpf=".$usuario->getCpf();
			$query .= ", adm='".$usuario->getAdm();
			$query .= "' WHERE id=".$usuario->getId();

			//echo "<br>".$query;
			mysql_query($query)
			or die('não deu para conectar'.mysql_errno().mysql_error());

		}

		public function excluirUsuario($usuario){


			$query = "DELETE FROM ".$this->tabela;
			$query .= " WHERE id=".$usuario->getId();
			
			//echo "<br>".$query;
			mysql_query($query)
			or die('não deu para conectar'.mysql_errno().mysql_error());

		}

		public function buscarTodos(){
			$query = "SELECT * FROM ".$this->tabela;
			$resultado = mysql_query($query)
			or die('não deu para conectar'.mysql_errno().mysql_error());


			$usuarios = [];

			while($linha = mysql_fetch_array($resultado, MYSQL_ASSOC)){

				$usuario = new Usuario( $linha["nome"],$linha["email"], $linha["endereco"], $linha["senha"], $linha["telefone"],$linha["cpf"], $linha["adm"]);

				$usuario->setId($linha["id"]);
				
				array_push($usuarios, $usuario);
			
			}

			return $usuarios;

		}


		public function emailExiste($email){
			$query = "SELECT * FROM ".$this->tabela." WHERE email='".$email."'";
			$resultado = mysql_query($query)
			or die('não deu para conectar'.mysql_errno().mysql_error());


			$usuarios = [];

			$linha = mysql_fetch_array($resultado, MYSQL_ASSOC);
			
			return is_array($linha);
		}

		public function login($email, $senha){
			$query = "SELECT * FROM ".$this->tabela." WHERE email='".$email."' AND senha='".$senha."'";

			//echo $query;

			$resultado = mysql_query($query)
			or die('não deu para conectar'.mysql_errno().mysql_error());


			$linha = mysql_fetch_array($resultado, MYSQL_ASSOC);
			
			return is_array($linha);
		}

		public function buscaUsrByEmail($email){
			$query = "SELECT * FROM ".$this->tabela." WHERE email='".$email."'";

			//echo $query;

			$resultado = mysql_query($query)
			or die('não deu para conectar'.mysql_errno().mysql_error());


			if($linha = mysql_fetch_array($resultado, MYSQL_ASSOC)){
				$usuario = new Usuario( $linha["nome"],$linha["email"], $linha["endereco"], $linha["senha"], $linha["telefone"],$linha["cpf"], $linha["adm"]);
				$usuario->setId($linha["id"]);
				return $usuario;
			}
			
			return null;
			
		}


	}


  ?>