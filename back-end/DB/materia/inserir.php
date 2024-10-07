<?php
	//Conexão com um arquivo distante e inicio da sessão
	include "../conexao/conexao.php";
	session_start();

	//Evitar entradas no arquivos com intenções perigosas
	if (isset($_POST['nome'])){
		$nome = $_POST['nome'];
	}else{
		header("location: ../../../front-end/materias.php");
	};

	//Comparacao com banco
	$sql = "INSERT INTO tb_disciplina(dis_nome) VALUES('$nome')";
	$insert = mysqli_query($conexao,$sql);
	mysqli_close($conexao);
	echo "<script type='text/javascript'>
	 	alert('Cadastro realizado com sucesso!'); 
	 	location.href='../../../front-end/materias.php';
	 	</script>";
?>


