<?php
	//Conexão com um arquivo distante e inicio da sessão
	include "../conexao/conexao.php";
	session_start();
	//Evitar entradas no arquivos com intenções perigosas
	if (isset($_GET['id'])){
		$id = $_GET['id'];
	}else{
		header("location: ../../../front-end/materias.php");
	};
	//Comparacao com banco
	$sql = "DELETE FROM  tb_disciplina WHERE dis_id = '$id'";
	$selecione = mysqli_query($conexao,$sql);
	mysqli_close($conexao);
	echo "<script type='text/javascript'>
	 	alert('Ação realizada com sucesso!'); 
	 	location.href='../../../front-end/materias.php';
	 	</script>";
?>