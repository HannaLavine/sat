<?php
	//Conexão com um arquivo distante e inicio da sessão
	include "../conexao/conexao.php";
	session_start();

	//Evitar entradas no arquivos com intenções perigosas
	if (isset($_POST['nome']) and isset($_POST['CPF']) and isset($_POST['RG'])){
		$nome = $_POST['nome'];
		$CPF = $_POST['CPF'];
		$RG = $_POST['RG'];
	}else{
		header("location: ../../../front-end/index.php");
	};

	//Comparacao com banco
	$sql = "INSERT INTO tb_professor(prof_nome, prof_cpf, prof_rg) VALUES('$nome', '$CPF', '$RG')";
	$insert = mysqli_query($conexao,$sql);
	mysqli_close($conexao);
	echo "<script type='text/javascript'>
	 	alert('Cadastro realizado com sucesso!'); 
	 	location.href='../../../front-end/index.php';
	 	</script>";
?>