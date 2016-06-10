<?php
	class Produto{

		private $id;
		private $nome;
		private $visivel;
		private $preco;
		private $descricao;
		private $id_categoria;
		
		public function __construct($nome, $visivel, $preco, $descricao, $id_categoria){

			$this->nome = $nome;
			$this->visivel = $visivel;
			$this->preco = $preco;
			$this->descricao = $descricao;
			$this->id_categoria = $id_categoria;

		}

		public function getId(){
			return $this->id;
		}

		public function setId($id){
			$this->id = $id;
		}

		public function getNome(){
			return $this->nome;
		}

		public function setNome($nome){
			$this->nome = $nome;
		}

		public function getVisivel(){
			return $this->visivel;
		}

		public function setVisivel($visivel){
			$this->visivel = $visivel;
		}
		
		public function getPreco(){
			return $this->preco;
		}

		public function setPreco($preco){
			$this->preco = $preco;
		}

		public function getDescricao(){
			return $this->descricao;
		}

		public function setDescricao($descricao){
			$this->descricao = $descricao;
		}

		public function getIdCategoria(){
			return $this->id_categoria;
		}

		public function setIdCategoria($id_categoria){
			$this->id_categoria = $id_categoria;
		}

	}




?>