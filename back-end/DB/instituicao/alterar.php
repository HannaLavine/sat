<?php
    session_start();
    include_once "../conexao/conexao.php";

    if(isset($_POST['update'])){
       $id = $_POST['id'];
       $nome = $_POST['nome'];
       $municipio = $_POST['municipio'];
       $departamento = $_POST['departamento'];
	   $modalidade = $_POST['modalidade'];

	} else{
        echo "<script type='text/javascript'>
	 	alert('Falha na alteração!'); 
	 	location.href='../../../front-end/instituicoes-editar.php';
	 	</script>";
    }
	$sql = "UPDATE tb_escola SET esc_nome = '$nome' , mun_id = '$municipio', dep_id = '$departamento', mod_id = '$modalidade' WHERE esc_id = '$id'";

    $result = $conexao ->query($sql);
    echo "<script type='text/javascript'>
	 	alert('Alteração realizada com sucesso!'); 
	 	location.href='../../../front-end/instituicoes.php';
	 	</script>";
?>