<?php
		if(isset($produtos)){
			foreach ($produtos as $prod) {

	echo "<div class='produto'>";

	echo("<div class='produtoNome'>".$prod->getNome()."</div>");


	echo("<div class='produtoDescricao'>".$prod->getDescricao()."</div>");

	echo("<div class='produtoPreco'>".$prod->getPreco()."</div>");

	echo("<form action='' method='post'>"."<input type='button' id='01' value=".$prod->getId()." name=".$prod->getId().">"."</form>");

	echo "</div>";

			}

		}
	?>