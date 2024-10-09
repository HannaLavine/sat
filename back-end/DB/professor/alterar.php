<?php
	//Conexão com um arquivo distante e inicio da sessão
	include "../conexao/conexao.php";
	session_start();
	//Evitar entradas no arquivos com intenções perigosas
	if (isset($_POST['nome']) and isset($_POST['CPF']) and isset($_POST['RG'])){
		$id = $_POST['hidden'];
		$nome = $_POST['nome'];
		$CPF = $_POST['CPF'];
		$RG = $_POST['RG'];
	}else{
		header("location: ../../../front-end/index.php");
	};

	if(isset($_FILES['RGScan'])){
		//recebe o arquivo do rg scaneado
		$arquivo = $_FILES['RGScan'];
		//listagem dos tipos que serão permitidos (questões de segurança)
		$tipos_permitidos = ['jpg', 'png', 'jpeg', 'pdf', ''];
		
		$pasta = "arquivos/";
		//pegado o nome do arquivo
		$nomeAntigo = $arquivo['name'];
		//criando um nome aleatório pro arquivo através do uniqid para que não haja sobrescrição de arquivos
		$nomeDoArquivo = uniqid();
		$extensao = strtolower(pathinfo($nomeAntigo, PATHINFO_EXTENSION));
		
		//caso a extensão do arquivo não esteja entre as permitidas, o usuário receberá um alerta e será redirecionado para a página index
		if(in_array($extensao, $tipos_permitidos) != true){
			echo "<script type='text/javascript'>
			alert('Tipo de arquivo não aceito!'); 
			location.href='../../../front-end/index.php';
			</script>";

			die;
		}
		
		//criando o caminho do arquivo
		$path = $pasta . $nomeDoArquivo . "." . $extensao;
		
		$arquivar = move_uploaded_file($arquivo["tmp_name"], $path);
		
	}
	//Comparacao com banco
	$sql = "UPDATE tb_professor SET prof_nome = '$nome' , prof_cpf = '$cpf', prof_rg = '$rg', nome = '$nomeDoArquivo', path = '$nomeAntigo', date_time = NOW() WHERE prof_id = '$id'";
	$insert = mysqli_query($conexao,$sql);
	mysqli_close($conexao);
	echo "<script type='text/javascript'>
	 	alert('Alteração realizada com sucesso!'); 
	 	location.href='../../../front-end/index.php';
	 	</script>";
?>