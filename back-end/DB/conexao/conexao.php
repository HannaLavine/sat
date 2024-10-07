<?php
	//Aqui ficam os Parametros
	$local = "localhost";
	$usuario = "root";
	$senha = 'cr701211';
	$banco = "sistema";

	//Onde a conexão em sí é feita
	$conexao = mysqli_connect($local, $usuario, $senha, $banco) or die
 	("Sem conexão com o servidor da plataforma");

 	//Evita erros de caracteres especiais no DB
	$utf = mysqli_set_charset($conexao, "utf8");