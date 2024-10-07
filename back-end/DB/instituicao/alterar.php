<?php
	//Conexão com um arquivo distante e inicio da sessão
	include "../conexao/conexao.php";
	session_start();
	//Evitar entradas no arquivos com intenções perigosas
	if (isset($_POST['nome']) and isset($_POST['municipio']) and isset($_POST['departamento']) and isset($_POST['modalidade'])){
		$id = $_POST['hidden'];
		$nome = $_POST['nome'];
		$municipio = $_POST['municipio'];
		$departamento = $_POST['departamento'];
		$modalidade = $_POST['modalidade'];
		if ($municipio == 0 or $departamento == 0 or $modalidade == 0){
			echo "<script type='text/javascript'>
		 	alert('Houve um erro no cadastro, um dos campos não foram escolhidos, por favor tente novamente.'); 
		 	location.href='../../../front-end/instituicoes.php';
		 	</script>";
		}
		
	}else{
		header("location: ../../../front-end/instituicoes.php");
	};
	//Comparacao com banco
	$sql = "UPDATE tb_escola SET esc_nome = '$nome' , mun_id = '$municipio', dep_id = '$departamento', mod_id = '$modalidade' WHERE esc_id = '$id'";
	$insert = mysqli_query($conexao,$sql);
	mysqli_close($conexao);
	echo "<script type='text/javascript'>
	 	alert('Alteração realizada com sucesso!'); 
	 	location.href='../../../front-end/instituicoes.php';
	 	</script>";
?>