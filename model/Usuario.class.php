<?php
	class Usuario{

		private $id;
		private $nome;
		private $email;
		private $endereco;
		private $senha;
		private $telefone;
		private $cpf;
		private $adm;


		public function __construct($nome, $email, $endereco, $senha, $telefone, $cpf, $adm){
			$this->nome = $nome;
			$this->email = $email;
			$this->endereco = $endereco;
			$this->senha = $senha;
			$this->telefone = $telefone;
			$this->cpf = $cpf;
			$this->adm = $adm;
		}


		public function getNome(){
			return $this->nome;
		}

		public function setNome($nome){
			$this->nome = $nome;
		}

		public function getId(){
			return $this->id;
		}

		public function setId($id){
			$this->id = $id;
		}

		public function getEmail(){
			return $this->email;
		}

		public function setEmail($email){
			$this->email = $email;
		}

		public function getEndereco(){
			return $this->endereco;
		}

		public function setEndereco($endereco){
			$this->endereco = $endereco;
		}

		public function getSenha(){
			return $this->senha;
		}

		public function setSenha($senha){
			$this->senha = $senha;
		}

		public function getTelefone(){
			return $this->telefone;
		}

		public function setTelefone($telefone){
			$this->telefone = $telefone;
		}

		public function getCpf(){
			return $this->cpf;
		}

		public function setCpf($cpf){
			$this->cpf = $cpf;
		}

		public function getAdm(){
			return $this->adm;
		}

		public function setAdm($adm){
			$this->adm = $adm;
		}
	}
?>
