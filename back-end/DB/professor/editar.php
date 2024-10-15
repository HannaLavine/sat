<?php
    session_start();
    include_once "../conexao/conexao.php";

    if(isset($_POST['update'])){
       $id = $_POST['id'];
       $nome = $_POST['nome'];
       $rg = $_POST['rg'];
       $cpf = $_POST['cpf'];

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
	} else{
        echo "<script type='text/javascript'>
	 	alert('Falha na alteração!'); 
	 	location.href='../../../front-end/index.php';
	 	</script>";
    }
    $sql = "UPDATE tb_professor SET prof_nome = '$nome', prof_rg = '$rg', prof_cpf = '$cpf', path = '$path', nome = '$nomeAntigo', date_time = NOW() WHERE prof_id = '$id'";

    $result = $conexao ->query($sql);
    echo "<script type='text/javascript'>
	 	alert('Alteração realizada com sucesso!'); 
	 	location.href='../../../front-end/index.php';
	 	</script>";
?>