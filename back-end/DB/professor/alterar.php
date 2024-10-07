<?php
	//Conexão com um arquivo distante e inicio da sessão
	include "../conexao/conexao.php";
	session_start();
	//Evitar entradas no arquivos com intenções perigosas
	//Evitar entradas no arquivos com intenções perigosas
	if (isset($_POST['nome']) and isset($_POST['CPF']) and isset($_POST['RG'])){
		$id = $_POST['hidden'];
		$nome = $_POST['nome'];
		$CPF = $_POST['CPF'];
		$RG = $_POST['RG'];
	}else{
		header("location: ../../../front-end/index.php");
	};
	//Comparacao com banco
	$sql = "UPDATE tb_professor SET prof_nome = '$nome' , prof_cpf = '$CPF', prof_rg = '$RG' WHERE prof_id = '$id'";
	$insert = mysqli_query($conexao,$sql);
	mysqli_close($conexao);
	echo "<script type='text/javascript'>
	 	alert('Alteração realizada com sucesso!'); 
	 	location.href='../../../front-end/index.php';
	 	</script>";
?>