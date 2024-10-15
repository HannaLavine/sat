<?php
    session_start();
    include_once "../conexao/conexao.php";

    if(isset($_POST['update'])){
       $id = $_POST['id'];
       $nome = $_POST['nome'];

	} else{
        echo "<script type='text/javascript'>
	 	alert('Falha na alteração!'); 
	 	location.href='../../../front-end/materias-editar.php';
	 	</script>";
    }
	$sql = "UPDATE tb_disciplina SET dis_nome = '$nome' WHERE dis_id = '$id'";

    $result = $conexao ->query($sql);
    echo "<script type='text/javascript'>
	 	alert('Alteração realizada com sucesso!'); 
	 	location.href='../../../front-end/materias.php';
	 	</script>";
?>