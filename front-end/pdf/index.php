<?php
include "../../back-end/DB/conexao/conexao.php";
session_start();
  if (isset($_POST['professor'])){
    $professor = $_POST['professor'];
    if ($professor == 0){
      echo "<script type='text/javascript'>
      alert('Cadastro falho!Não foi selecionado o professor.'); 
      location.href='../index.php';
      </script>";
    }
    $selecione = "SELECT * FROM tb_professor WHERE prof_id = '$professor'";
    $executar = mysqli_query($conexao, $selecione);
    while ($valor = mysqli_fetch_assoc($executar)) {
      $nome = $valor['prof_nome'];
      $rg = $valor['prof_rg'];
      $cpf = $valor['prof_cpf'];
    };
  };
  $hoje = date('d/m/Y');
  $datas = explode("/", $hoje);
  $proximoano = $datas[2] + 1;
  $contador = "SELECT * FROM tb_contador where con_ano = '$datas[2]' order by con_numero DESC limit 1";
  $godemais = mysqli_query($conexao, $contador);
  $numerodelinhas = mysqli_num_rows($godemais);
  if ($numerodelinhas == 0) {
    $numeracao = 1;
    $salvar = mysqli_query($conexao, "INSERT INTO tb_contador(con_numero, con_ano) VALUES('$numeracao', '$datas[2]')");
  }else{
    while ($valores = mysqli_fetch_assoc($godemais)){
      $numerar = $valores['con_numero'];
      $numeracao = $numerar + 1;
      $salvar = mysqli_query($conexao, "INSERT INTO tb_contador(con_numero, con_ano) VALUES('$numeracao', '$datas[2]')");
    }
  }

    if (isset($_POST['hidden'])){
    $quantidade = $_POST['hidden'];
  };


  if (isset($_POST['disciplina1'])){
    $disciplina1 = $_POST['disciplina1'];
  };
  if (isset($_POST['disciplina2'])){
    $disciplina2 = $_POST['disciplina2'];
  };
  if (isset($_POST['disciplina3'])){
    $disciplina3 = $_POST['disciplina3'];
  };
  if (isset($_POST['disciplina4'])){
    $disciplina4 = $_POST['disciplina4'];
  };
  if (isset($_POST['disciplina5'])){
    $disciplina5 = $_POST['disciplina5'];
  };
  if (isset($_POST['disciplina6'])){
    $disciplina6 = $_POST['disciplina6'];
  };
  if (isset($_POST['disciplina7'])){
    $disciplina7 = $_POST['disciplina7'];
  };
  if (isset($_POST['disciplina8'])){
    $disciplina8 = $_POST['disciplina8'];
  };
  if (isset($_POST['disciplina9'])){
    $disciplina9 = $_POST['disciplina9'];
  };
  if (isset($_POST['disciplina10'])){
    $disciplina10 = $_POST['disciplina10'];
  };
  if (isset($_POST['disciplina11'])){
    $disciplina11 = $_POST['disciplina11'];
  };
  if (isset($_POST['disciplina12'])){
    $disciplina12 = $_POST['disciplina12'];
  };
  if (isset($_POST['disciplina13'])){
    $disciplina13 = $_POST['disciplina13'];
  };
  if (isset($_POST['disciplina14'])){
    $disciplina14 = $_POST['disciplina14'];
  };
  if (isset($_POST['disciplina15'])){
    $disciplina15 = $_POST['disciplina15'];
  };


  if (isset($_POST['escola1'])){
    $escola1 = $_POST['escola1'];
    $colegio = "SELECT * FROM tb_escola, tb_departamento, tb_modalidade, tb_municipio, tb_disciplina WHERE tb_escola.mun_id = tb_municipio.mun_id and tb_departamento.dep_id = tb_escola.dep_id and tb_modalidade.mod_id = tb_escola.mod_id and dis_id = '$disciplina1' and esc_id = '$escola1'";
    $executar1 = mysqli_query($conexao, $colegio);
  };
  if (isset($_POST['escola2'])){
    $escola2 = $_POST['escola2'];
    $colegio2 = "SELECT * FROM tb_escola, tb_departamento, tb_modalidade, tb_municipio, tb_disciplina WHERE tb_escola.mun_id = tb_municipio.mun_id and tb_departamento.dep_id = tb_escola.dep_id and tb_modalidade.mod_id = tb_escola.mod_id and dis_id = '$disciplina2' and esc_id = '$escola2'";
    $executar2 = mysqli_query($conexao, $colegio2);
  };
  if (isset($_POST['escola3'])){
    $escola3 = $_POST['escola3'];
    $colegio3 = "SELECT * FROM tb_escola, tb_departamento, tb_modalidade, tb_municipio, tb_disciplina WHERE tb_escola.mun_id = tb_municipio.mun_id and tb_departamento.dep_id = tb_escola.dep_id and tb_modalidade.mod_id = tb_escola.mod_id and dis_id = '$disciplina3' and esc_id = '$escola3'";
    $executar3 = mysqli_query($conexao, $colegio3);
  };
  if (isset($_POST['escola4'])){
    $escola4 = $_POST['escola4'];
    $colegio4 = "SELECT * FROM tb_escola, tb_departamento, tb_modalidade, tb_municipio, tb_disciplina WHERE tb_escola.mun_id = tb_municipio.mun_id and tb_departamento.dep_id = tb_escola.dep_id and tb_modalidade.mod_id = tb_escola.mod_id and dis_id = '$disciplina4' and esc_id = '$escola4'";
    $executar4 = mysqli_query($conexao, $colegio4);
  };
  if (isset($_POST['escola5'])){
    $escola5 = $_POST['escola5'];
    $colegio5 = "SELECT * FROM tb_escola, tb_departamento, tb_modalidade, tb_municipio, tb_disciplina WHERE tb_escola.mun_id = tb_municipio.mun_id and tb_departamento.dep_id = tb_escola.dep_id and tb_modalidade.mod_id = tb_escola.mod_id and dis_id = '$disciplina5' and esc_id = '$escola5'";
    $executar5 = mysqli_query($conexao, $colegio5);
  };
  if (isset($_POST['escola6'])){
    $escola6 = $_POST['escola6'];
    $colegio6 = "SELECT * FROM tb_escola, tb_departamento, tb_modalidade, tb_municipio, tb_disciplina WHERE tb_escola.mun_id = tb_municipio.mun_id and tb_departamento.dep_id = tb_escola.dep_id and tb_modalidade.mod_id = tb_escola.mod_id and dis_id = '$disciplina6' and esc_id = '$escola6'";
    $executar6 = mysqli_query($conexao, $colegio6);
  };
  if (isset($_POST['escola7'])){
    $escola7 = $_POST['escola7'];
    $colegio7 = "SELECT * FROM tb_escola, tb_departamento, tb_modalidade, tb_municipio, tb_disciplina WHERE tb_escola.mun_id = tb_municipio.mun_id and tb_departamento.dep_id = tb_escola.dep_id and tb_modalidade.mod_id = tb_escola.mod_id and dis_id = '$disciplina7' and esc_id = '$escola7'";
    $executar7 = mysqli_query($conexao, $colegio7);
  };
  if (isset($_POST['escola8'])){
    $escola8 = $_POST['escola8'];
    $colegio8 = "SELECT * FROM tb_escola, tb_departamento, tb_modalidade, tb_municipio, tb_disciplina WHERE tb_escola.mun_id = tb_municipio.mun_id and tb_departamento.dep_id = tb_escola.dep_id and tb_modalidade.mod_id = tb_escola.mod_id and dis_id = '$disciplina8' and esc_id = '$escola8'";
    $executar8 = mysqli_query($conexao, $colegio8);
  };
  if (isset($_POST['escola9'])){
    $escola9 = $_POST['escola9'];
    $colegio9 = "SELECT * FROM tb_escola, tb_departamento, tb_modalidade, tb_municipio, tb_disciplina WHERE tb_escola.mun_id = tb_municipio.mun_id and tb_departamento.dep_id = tb_escola.dep_id and tb_modalidade.mod_id = tb_escola.mod_id and dis_id = '$disciplina9' and esc_id = '$escola9'";
    $executar9 = mysqli_query($conexao, $colegio9);
  };
  if (isset($_POST['escola10'])){
    $escola10 = $_POST['escola10'];
    $colegio10 = "SELECT * FROM tb_escola, tb_departamento, tb_modalidade, tb_municipio, tb_disciplina WHERE tb_escola.mun_id = tb_municipio.mun_id and tb_departamento.dep_id = tb_escola.dep_id and tb_modalidade.mod_id = tb_escola.mod_id and dis_id = '$disciplina10' and esc_id = '$escola10'";
    $executar10 = mysqli_query($conexao, $colegio10);
  };
  if (isset($_POST['escola11'])){
    $escola11 = $_POST['escola11'];
    $colegio11 = "SELECT * FROM tb_escola, tb_departamento, tb_modalidade, tb_municipio, tb_disciplina WHERE tb_escola.mun_id = tb_municipio.mun_id and tb_departamento.dep_id = tb_escola.dep_id and tb_modalidade.mod_id = tb_escola.mod_id and dis_id = '$disciplina11' and esc_id = '$escola11'";
    $executar11 = mysqli_query($conexao, $colegio11);
  };
  if (isset($_POST['escola12'])){
    $escola12 = $_POST['escola12'];
    $colegio12 = "SELECT * FROM tb_escola, tb_departamento, tb_modalidade, tb_municipio, tb_disciplina WHERE tb_escola.mun_id = tb_municipio.mun_id and tb_departamento.dep_id = tb_escola.dep_id and tb_modalidade.mod_id = tb_escola.mod_id and dis_id = '$disciplina12' and esc_id = '$escola12'";
    $executar12 = mysqli_query($conexao, $colegio12);
  };
  if (isset($_POST['escola13'])){
    $escola13 = $_POST['escola13'];
    $colegio13 = "SELECT * FROM tb_escola, tb_departamento, tb_modalidade, tb_municipio, tb_disciplina WHERE tb_escola.mun_id = tb_municipio.mun_id and tb_departamento.dep_id = tb_escola.dep_id and tb_modalidade.mod_id = tb_escola.mod_id and dis_id = '$disciplina13' and esc_id = '$escola13'";
    $executar13 = mysqli_query($conexao, $colegio13);
  };
  if (isset($_POST['escola14'])){
    $escola14 = $_POST['escola14'];
    $colegio14 = "SELECT * FROM tb_escola, tb_departamento, tb_modalidade, tb_municipio, tb_disciplina WHERE tb_escola.mun_id = tb_municipio.mun_id and tb_departamento.dep_id = tb_escola.dep_id and tb_modalidade.mod_id = tb_escola.mod_id and dis_id = '$disciplina14' and esc_id = '$escola14'";
    $executar14 = mysqli_query($conexao, $colegio14);
  };
  if (isset($_POST['escola15'])){
    $escola15 = $_POST['escola15'];
    $colegio15 = "SELECT * FROM tb_escola, tb_departamento, tb_modalidade, tb_municipio, tb_disciplina WHERE tb_escola.mun_id = tb_municipio.mun_id and tb_departamento.dep_id = tb_escola.dep_id and tb_modalidade.mod_id = tb_escola.mod_id and dis_id = '$disciplina15' and esc_id = '$escola15'";
    $executar15 = mysqli_query($conexao, $colegio15);
  };



  if (isset($_POST['linha1'])){
    $linha1 = $_POST['linha1'];
  };
  if (isset($_POST['linha2'])){
    $linha2 = $_POST['linha2'];
  };
  if (isset($_POST['linha3'])){
    $linha3 = $_POST['linha3'];
  };
  if (isset($_POST['linha4'])){
    $linha4 = $_POST['linha4'];
  };
  if (isset($_POST['linha5'])){
    $linha5 = $_POST['linha5'];
  };
  if (isset($_POST['linha6'])){
    $linha6 = $_POST['linha6'];
  };
  if (isset($_POST['linha7'])){
    $linha7 = $_POST['linha7'];
  };
  if (isset($_POST['linha8'])){
    $linha8 = $_POST['linha8'];
  };
  if (isset($_POST['linha9'])){
    $linha9 = $_POST['linha9'];
  };
  if (isset($_POST['linha10'])){
    $linha10 = $_POST['linha10'];
  };
  if (isset($_POST['linha11'])){
    $linha11 = $_POST['linha11'];
  };
  if (isset($_POST['linha12'])){
    $linha12 = $_POST['linha12'];
  };
  if (isset($_POST['linha13'])){
    $linha13 = $_POST['linha13'];
  };
  if (isset($_POST['linha14'])){
    $linha14 = $_POST['linha14'];
  };
  if (isset($_POST['linha15'])){
    $linha15 = $_POST['linha15'];
  };?>
<!DOCTYPE html>
<html>
<head>
    <script src="https://kit.fontawesome.com/311f460b64.js" crossorigin="anonymous"></script>

	 <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
	<link rel="stylesheet" type="text/css" href="css.css">
</head>
<body>


        <div class="text-center tamanho" id="tabelapdf">
		<?php
		?>  
      <div class="container-fluid">
          <div class="mx-auto col-md-12 row w-100 p-3" style="min-height: 30vh;max-height: 120vh;" contenteditable="">
                <div class="col-md-12" style="padding-top: 20px;">
                  <div class="col-md-2">
                    <img id='img'src="../logo.jpg" align="left" style="max-width: 120px;max-height: 120px;margin-right: 4px;">
                  </div>
                  <div class="col-md-10">
                    <p align="left" style="font-weight: bold;">GOVERNO DO<br> ESTADO DO CEARÁ<br>Secretaria da Educação<br>Coordenadoria Regional de Desenvolvimento da Educação - CREDE 7<br>Célula de Cooperação com os Municípios - CECOM - 7</p>
                  </div>
                </div>
                <div class="col-md-12" style="padding-top: 15px;">
                  <div class="col-md-6">
                    <p align="left" style="font-weight: bold;">AUTORIZAÇÃO TEMPORÁRIA N° <?php echo $numeracao; ?>/<?php echo $datas[2]; ?></p>
                  </div>
                </div>
                <div class="col-md-12" style="padding-top: 15px;">
                  <div class="col-md-6">
                    <p align="left" style="font-weight: bold;">VÁLIDA ATÉ 21 DE MARÇO DE <?php echo $proximoano; ?></p>
                  </div>
                  <div class="col-md-6">
                  </div>
                  <div class="col-md-12">
                    <p align="left" style="margin-top: -10px;">A Coordenadoria Regional de Desenvolvimento da Educação - CREDE 7, tendo em vista o Disposto no Art. 275, da Resolução 333/94 do Conselho de Educação do Ceará e o que consta no Processo N° 002/2009, concede <strong>AUTORIZAÇÃO TEMPORÁRIA</strong> para o Ano de <?php echo $datas[2]; ?> ao professor(a) 
                    <strong>
                    <?php
                      echo $nome;
                    ?>
                    </strong> para lecionar no(s) estabelecimentos(s) de Ensino a(s) Disciplinas(s):</p>
                  </div>    
                </div>
                <div class="col-md-12" align="center" style="padding-top: 15px;">
                  <div class="col-md-12">
                    <table border="1px;" style="margin:auto;text-align: center;font-size: 16px;">
                      <tr>
                        <th><label style="margin: 12px;">Estabelecimento de Ensino</label></th>
                        <th><label style="margin: 12px;">Município</label></th>
                        <th><label style="margin: 12px;">Dep. Adm.</label></th>
                        <th><label style="margin: 12px;">Modalidade</label></th>
                        <th><label style="margin: 12px;">Ano</label></th>
                        <th><label style="margin: 12px;">Disciplina</label></th>
                      </tr>
                      <tr>
                        <?php
                          switch ($quantidade) {
                            case 1:
                              echo "<tr>";
                              echo "<td>";
                              while ($valores = mysqli_fetch_assoc($executar1)){
                                echo $valores['esc_nome'];
                                echo "</td><td>";
                                echo $valores['mun_nome'];
                                echo "</td><td>";
                                echo $valores['dep_nome'];
                                echo "</td><td>";
                                echo $valores['mod_nome'];
                                echo "</td><td>";
                                echo $linha1;
                                echo "</td><td>";
                                echo $valores['dis_nome'];
                              };
                              echo "</td>";
                              echo "</tr>";
                              break;
                            case 2:
                              echo "<tr>";
                              echo "<td>";
                              while ($valores = mysqli_fetch_assoc($executar1)){
                                echo $valores['esc_nome'];
                                echo "</td><td>";
                                echo $valores['mun_nome'];
                                echo "</td><td>";
                                echo $valores['dep_nome'];
                                echo "</td><td>";
                                echo $valores['mod_nome'];
                                echo "</td><td>";
                                echo $linha1;
                                echo "</td><td>";
                                echo $valores['dis_nome'];
                              };
                              echo "</td>";
                              echo "</tr>";
                              echo "<tr>";
                              echo "<td>";
                              while ($valores = mysqli_fetch_assoc($executar2)){
                                echo $valores['esc_nome'];
                                echo "</td><td>";
                                echo $valores['mun_nome'];
                                echo "</td><td>";
                                echo $valores['dep_nome'];
                                echo "</td><td>";
                                echo $valores['mod_nome'];
                                echo "</td><td>";
                                echo $linha2;
                                echo "</td><td>";
                                echo $valores['dis_nome'];
                              };
                              echo "</td>";
                              echo "</tr>";
                              break;
                            case 3:
                              echo "<tr>";
                              echo "<td>";
                              while ($valores = mysqli_fetch_assoc($executar1)){
                                echo $valores['esc_nome'];
                                echo "</td><td>";
                                echo $valores['mun_nome'];
                                echo "</td><td>";
                                echo $valores['dep_nome'];
                                echo "</td><td>";
                                echo $valores['mod_nome'];
                                echo "</td><td>";
                                echo $linha1;
                                echo "</td><td>";
                                echo $valores['dis_nome'];
                              };
                              echo "</td>";
                              echo "</tr>";
                              echo "<tr>";
                              echo "<td>";
                              while ($valores = mysqli_fetch_assoc($executar2)){
                                echo $valores['esc_nome'];
                                echo "</td><td>";
                                echo $valores['mun_nome'];
                                echo "</td><td>";
                                echo $valores['dep_nome'];
                                echo "</td><td>";
                                echo $valores['mod_nome'];
                                echo "</td><td>";
                                echo $linha2;
                                echo "</td><td>";
                                echo $valores['dis_nome'];
                              };
                              echo "</td>";
                              echo "</tr>";
                              echo "<tr>";
                              echo "<td>";
                              while ($valores = mysqli_fetch_assoc($executar3)){
                                echo $valores['esc_nome'];
                                echo "</td><td>";
                                echo $valores['mun_nome'];
                                echo "</td><td>";
                                echo $valores['dep_nome'];
                                echo "</td><td>";
                                echo $valores['mod_nome'];
                                echo "</td><td>";
                                echo $linha3;
                                echo "</td><td>";
                                echo $valores['dis_nome'];
                              };
                              echo "</td>";
                              echo "</tr>";
                              break;
                            case 4:
                              echo "<tr>";
                              echo "<td>";
                              while ($valores = mysqli_fetch_assoc($executar1)){
                                echo $valores['esc_nome'];
                                echo "</td><td>";
                                echo $valores['mun_nome'];
                                echo "</td><td>";
                                echo $valores['dep_nome'];
                                echo "</td><td>";
                                echo $valores['mod_nome'];
                                echo "</td><td>";
                                echo $linha1;
                                echo "</td><td>";
                                echo $valores['dis_nome'];
                              };
                              echo "</td>";
                              echo "</tr>";
                              echo "<tr>";
                              echo "<td>";
                              while ($valores = mysqli_fetch_assoc($executar2)){
                                echo $valores['esc_nome'];
                                echo "</td><td>";
                                echo $valores['mun_nome'];
                                echo "</td><td>";
                                echo $valores['dep_nome'];
                                echo "</td><td>";
                                echo $valores['mod_nome'];
                                echo "</td><td>";
                                echo $linha2;
                                echo "</td><td>";
                                echo $valores['dis_nome'];
                              };
                              echo "</td>";
                              echo "</tr>";
                              echo "<tr>";
                              echo "<td>";
                              while ($valores = mysqli_fetch_assoc($executar3)){
                                echo $valores['esc_nome'];
                                echo "</td><td>";
                                echo $valores['mun_nome'];
                                echo "</td><td>";
                                echo $valores['dep_nome'];
                                echo "</td><td>";
                                echo $valores['mod_nome'];
                                echo "</td><td>";
                                echo $linha3;
                                echo "</td><td>";
                                echo $valores['dis_nome'];
                              };
                              echo "</td>";
                              echo "</tr>";
                              echo "<tr>";
                              echo "<td>";
                              while ($valores = mysqli_fetch_assoc($executar4)){
                                echo $valores['esc_nome'];
                                echo "</td><td>";
                                echo $valores['mun_nome'];
                                echo "</td><td>";
                                echo $valores['dep_nome'];
                                echo "</td><td>";
                                echo $valores['mod_nome'];
                                echo "</td><td>";
                                echo $linha4;
                                echo "</td><td>";
                                echo $valores['dis_nome'];
                              };
                              echo "</td>";
                              echo "</tr>";
                              break;
                            case 5:
                              echo "<tr>";
                              echo "<td>";
                              while ($valores = mysqli_fetch_assoc($executar1)){
                                echo $valores['esc_nome'];
                                echo "</td><td>";
                                echo $valores['mun_nome'];
                                echo "</td><td>";
                                echo $valores['dep_nome'];
                                echo "</td><td>";
                                echo $valores['mod_nome'];
                                echo "</td><td>";
                                echo $linha1;
                                echo "</td><td>";
                                echo $valores['dis_nome'];
                              };
                              echo "</td>";
                              echo "</tr>";
                              echo "<tr>";
                              echo "<td>";
                              while ($valores = mysqli_fetch_assoc($executar2)){
                                echo $valores['esc_nome'];
                                echo "</td><td>";
                                echo $valores['mun_nome'];
                                echo "</td><td>";
                                echo $valores['dep_nome'];
                                echo "</td><td>";
                                echo $valores['mod_nome'];
                                echo "</td><td>";
                                echo $linha2;
                                echo "</td><td>";
                                echo $valores['dis_nome'];
                              };
                              echo "</td>";
                              echo "</tr>";
                              echo "<tr>";
                              echo "<td>";
                              while ($valores = mysqli_fetch_assoc($executar3)){
                                echo $valores['esc_nome'];
                                echo "</td><td>";
                                echo $valores['mun_nome'];
                                echo "</td><td>";
                                echo $valores['dep_nome'];
                                echo "</td><td>";
                                echo $valores['mod_nome'];
                                echo "</td><td>";
                                echo $linha3;
                                echo "</td><td>";
                                echo $valores['dis_nome'];
                              };
                              echo "</td>";
                              echo "</tr>";
                              echo "<tr>";
                              echo "<td>";
                              while ($valores = mysqli_fetch_assoc($executar4)){
                                echo $valores['esc_nome'];
                                echo "</td><td>";
                                echo $valores['mun_nome'];
                                echo "</td><td>";
                                echo $valores['dep_nome'];
                                echo "</td><td>";
                                echo $valores['mod_nome'];
                                echo "</td><td>";
                                echo $linha4;
                                echo "</td><td>";
                                echo $valores['dis_nome'];
                              };
                              echo "</td>";
                              echo "</tr>";
                              echo "<tr>";
                              echo "<td>";
                              while ($valores = mysqli_fetch_assoc($executar5)){
                                echo $valores['esc_nome'];
                                echo "</td><td>";
                                echo $valores['mun_nome'];
                                echo "</td><td>";
                                echo $valores['dep_nome'];
                                echo "</td><td>";
                                echo $valores['mod_nome'];
                                echo "</td><td>";
                                echo $linha5;
                                echo "</td><td>";
                                echo $valores['dis_nome'];
                              };
                              echo "</td>";
                              echo "</tr>";
                              break;
                            case 6:
                              echo "<tr>";
                              echo "<td>";
                              while ($valores = mysqli_fetch_assoc($executar1)){
                                echo $valores['esc_nome'];
                                echo "</td><td>";
                                echo $valores['mun_nome'];
                                echo "</td><td>";
                                echo $valores['dep_nome'];
                                echo "</td><td>";
                                echo $valores['mod_nome'];
                                echo "</td><td>";
                                echo $linha1;
                                echo "</td><td>";
                                echo $valores['dis_nome'];
                              };
                              echo "</td>";
                              echo "</tr>";
                              echo "<tr>";
                              echo "<td>";
                              while ($valores = mysqli_fetch_assoc($executar2)){
                                echo $valores['esc_nome'];
                                echo "</td><td>";
                                echo $valores['mun_nome'];
                                echo "</td><td>";
                                echo $valores['dep_nome'];
                                echo "</td><td>";
                                echo $valores['mod_nome'];
                                echo "</td><td>";
                                echo $linha2;
                                echo "</td><td>";
                                echo $valores['dis_nome'];
                              };
                              echo "</td>";
                              echo "</tr>";
                              echo "<tr>";
                              echo "<td>";
                              while ($valores = mysqli_fetch_assoc($executar3)){
                                echo $valores['esc_nome'];
                                echo "</td><td>";
                                echo $valores['mun_nome'];
                                echo "</td><td>";
                                echo $valores['dep_nome'];
                                echo "</td><td>";
                                echo $valores['mod_nome'];
                                echo "</td><td>";
                                echo $linha3;
                                echo "</td><td>";
                                echo $valores['dis_nome'];
                              };
                              echo "</td>";
                              echo "</tr>";
                              echo "<tr>";
                              echo "<td>";
                              while ($valores = mysqli_fetch_assoc($executar4)){
                                echo $valores['esc_nome'];
                                echo "</td><td>";
                                echo $valores['mun_nome'];
                                echo "</td><td>";
                                echo $valores['dep_nome'];
                                echo "</td><td>";
                                echo $valores['mod_nome'];
                                echo "</td><td>";
                                echo $linha4;
                                echo "</td><td>";
                                echo $valores['dis_nome'];
                              };
                              echo "</td>";
                              echo "</tr>";
                              echo "<tr>";
                              echo "<td>";
                              while ($valores = mysqli_fetch_assoc($executar5)){
                                echo $valores['esc_nome'];
                                echo "</td><td>";
                                echo $valores['mun_nome'];
                                echo "</td><td>";
                                echo $valores['dep_nome'];
                                echo "</td><td>";
                                echo $valores['mod_nome'];
                                echo "</td><td>";
                                echo $linha5;
                                echo "</td><td>";
                                echo $valores['dis_nome'];
                              };
                              echo "</td>";
                              echo "</tr>";
                              echo "<tr>";
                              echo "<td>";
                              while ($valores = mysqli_fetch_assoc($executar6)){
                                echo $valores['esc_nome'];
                                echo "</td><td>";
                                echo $valores['mun_nome'];
                                echo "</td><td>";
                                echo $valores['dep_nome'];
                                echo "</td><td>";
                                echo $valores['mod_nome'];
                                echo "</td><td>";
                                echo $linha6;
                                echo "</td><td>";
                                echo $valores['dis_nome'];
                              };
                              echo "</td>";
                              echo "</tr>";
                              break;
                            case 7:
                              echo "<tr>";
                              echo "<td>";
                              while ($valores = mysqli_fetch_assoc($executar1)){
                                echo $valores['esc_nome'];
                                echo "</td><td>";
                                echo $valores['mun_nome'];
                                echo "</td><td>";
                                echo $valores['dep_nome'];
                                echo "</td><td>";
                                echo $valores['mod_nome'];
                                echo "</td><td>";
                                echo $linha1;
                                echo "</td><td>";
                                echo $valores['dis_nome'];
                              };
                              echo "</td>";
                              echo "</tr>";
                              echo "<tr>";
                              echo "<td>";
                              while ($valores = mysqli_fetch_assoc($executar2)){
                                echo $valores['esc_nome'];
                                echo "</td><td>";
                                echo $valores['mun_nome'];
                                echo "</td><td>";
                                echo $valores['dep_nome'];
                                echo "</td><td>";
                                echo $valores['mod_nome'];
                                echo "</td><td>";
                                echo $linha2;
                                echo "</td><td>";
                                echo $valores['dis_nome'];
                              };
                              echo "</td>";
                              echo "</tr>";
                              echo "<tr>";
                              echo "<td>";
                              while ($valores = mysqli_fetch_assoc($executar3)){
                                echo $valores['esc_nome'];
                                echo "</td><td>";
                                echo $valores['mun_nome'];
                                echo "</td><td>";
                                echo $valores['dep_nome'];
                                echo "</td><td>";
                                echo $valores['mod_nome'];
                                echo "</td><td>";
                                echo $linha3;
                                echo "</td><td>";
                                echo $valores['dis_nome'];
                              };
                              echo "</td>";
                              echo "</tr>";
                              echo "<tr>";
                              echo "<td>";
                              while ($valores = mysqli_fetch_assoc($executar4)){
                                echo $valores['esc_nome'];
                                echo "</td><td>";
                                echo $valores['mun_nome'];
                                echo "</td><td>";
                                echo $valores['dep_nome'];
                                echo "</td><td>";
                                echo $valores['mod_nome'];
                                echo "</td><td>";
                                echo $linha4;
                                echo "</td><td>";
                                echo $valores['dis_nome'];
                              };
                              echo "</td>";
                              echo "</tr>";
                              echo "<tr>";
                              echo "<td>";
                              while ($valores = mysqli_fetch_assoc($executar5)){
                                echo $valores['esc_nome'];
                                echo "</td><td>";
                                echo $valores['mun_nome'];
                                echo "</td><td>";
                                echo $valores['dep_nome'];
                                echo "</td><td>";
                                echo $valores['mod_nome'];
                                echo "</td><td>";
                                echo $linha5;
                                echo "</td><td>";
                                echo $valores['dis_nome'];
                              };
                              echo "</td>";
                              echo "</tr>";
                              echo "<tr>";
                              echo "<td>";
                              while ($valores = mysqli_fetch_assoc($executar6)){
                                echo $valores['esc_nome'];
                                echo "</td><td>";
                                echo $valores['mun_nome'];
                                echo "</td><td>";
                                echo $valores['dep_nome'];
                                echo "</td><td>";
                                echo $valores['mod_nome'];
                                echo "</td><td>";
                                echo $linha6;
                                echo "</td><td>";
                                echo $valores['dis_nome'];
                              };
                              echo "</td>";
                              echo "</tr>";
                              echo "<tr>";
                              echo "<td>";
                              while ($valores = mysqli_fetch_assoc($executar7)){
                                echo $valores['esc_nome'];
                                echo "</td><td>";
                                echo $valores['mun_nome'];
                                echo "</td><td>";
                                echo $valores['dep_nome'];
                                echo "</td><td>";
                                echo $valores['mod_nome'];
                                echo "</td><td>";
                                echo $linha7;
                                echo "</td><td>";
                                echo $valores['dis_nome'];
                              };
                              echo "</td>";
                              echo "</tr>";
                              break;
                            case 8:
                              echo "<tr>";
                              echo "<td>";
                              while ($valores = mysqli_fetch_assoc($executar1)){
                                echo $valores['esc_nome'];
                                echo "</td><td>";
                                echo $valores['mun_nome'];
                                echo "</td><td>";
                                echo $valores['dep_nome'];
                                echo "</td><td>";
                                echo $valores['mod_nome'];
                                echo "</td><td>";
                                echo $linha1;
                                echo "</td><td>";
                                echo $valores['dis_nome'];
                              };
                              echo "</td>";
                              echo "</tr>";
                              echo "<tr>";
                              echo "<td>";
                              while ($valores = mysqli_fetch_assoc($executar2)){
                                echo $valores['esc_nome'];
                                echo "</td><td>";
                                echo $valores['mun_nome'];
                                echo "</td><td>";
                                echo $valores['dep_nome'];
                                echo "</td><td>";
                                echo $valores['mod_nome'];
                                echo "</td><td>";
                                echo $linha2;
                                echo "</td><td>";
                                echo $valores['dis_nome'];
                              };
                              echo "</td>";
                              echo "</tr>";
                              echo "<tr>";
                              echo "<td>";
                              while ($valores = mysqli_fetch_assoc($executar3)){
                                echo $valores['esc_nome'];
                                echo "</td><td>";
                                echo $valores['mun_nome'];
                                echo "</td><td>";
                                echo $valores['dep_nome'];
                                echo "</td><td>";
                                echo $valores['mod_nome'];
                                echo "</td><td>";
                                echo $linha3;
                                echo "</td><td>";
                                echo $valores['dis_nome'];
                              };
                              echo "</td>";
                              echo "</tr>";
                              echo "<tr>";
                              echo "<td>";
                              while ($valores = mysqli_fetch_assoc($executar4)){
                                echo $valores['esc_nome'];
                                echo "</td><td>";
                                echo $valores['mun_nome'];
                                echo "</td><td>";
                                echo $valores['dep_nome'];
                                echo "</td><td>";
                                echo $valores['mod_nome'];
                                echo "</td><td>";
                                echo $linha4;
                                echo "</td><td>";
                                echo $valores['dis_nome'];
                              };
                              echo "</td>";
                              echo "</tr>";
                              echo "<tr>";
                              echo "<td>";
                              while ($valores = mysqli_fetch_assoc($executar5)){
                                echo $valores['esc_nome'];
                                echo "</td><td>";
                                echo $valores['mun_nome'];
                                echo "</td><td>";
                                echo $valores['dep_nome'];
                                echo "</td><td>";
                                echo $valores['mod_nome'];
                                echo "</td><td>";
                                echo $linha5;
                                echo "</td><td>";
                                echo $valores['dis_nome'];
                              };
                              echo "</td>";
                              echo "</tr>";
                              echo "<tr>";
                              echo "<td>";
                              while ($valores = mysqli_fetch_assoc($executar6)){
                                echo $valores['esc_nome'];
                                echo "</td><td>";
                                echo $valores['mun_nome'];
                                echo "</td><td>";
                                echo $valores['dep_nome'];
                                echo "</td><td>";
                                echo $valores['mod_nome'];
                                echo "</td><td>";
                                echo $linha6;
                                echo "</td><td>";
                                echo $valores['dis_nome'];
                              };
                              echo "</td>";
                              echo "</tr>";
                              echo "<tr>";
                              echo "<td>";
                              while ($valores = mysqli_fetch_assoc($executar7)){
                                echo $valores['esc_nome'];
                                echo "</td><td>";
                                echo $valores['mun_nome'];
                                echo "</td><td>";
                                echo $valores['dep_nome'];
                                echo "</td><td>";
                                echo $valores['mod_nome'];
                                echo "</td><td>";
                                echo $linha7;
                                echo "</td><td>";
                                echo $valores['dis_nome'];
                              };
                              echo "</td>";
                              echo "</tr>";
                              echo "<tr>";
                              echo "<td>";
                              while ($valores = mysqli_fetch_assoc($executar8)){
                                echo $valores['esc_nome'];
                                echo "</td><td>";
                                echo $valores['mun_nome'];
                                echo "</td><td>";
                                echo $valores['dep_nome'];
                                echo "</td><td>";
                                echo $valores['mod_nome'];
                                echo "</td><td>";
                                echo $linha8;
                                echo "</td><td>";
                                echo $valores['dis_nome'];
                              };
                              echo "</td>";
                              echo "</tr>";
                              break;
                            case 9:
                              echo "<tr>";
                              echo "<td>";
                              while ($valores = mysqli_fetch_assoc($executar1)){
                                echo $valores['esc_nome'];
                                echo "</td><td>";
                                echo $valores['mun_nome'];
                                echo "</td><td>";
                                echo $valores['dep_nome'];
                                echo "</td><td>";
                                echo $valores['mod_nome'];
                                echo "</td><td>";
                                echo $linha1;
                                echo "</td><td>";
                                echo $valores['dis_nome'];
                              };
                              echo "</td>";
                              echo "</tr>";
                              echo "<tr>";
                              echo "<td>";
                              while ($valores = mysqli_fetch_assoc($executar2)){
                                echo $valores['esc_nome'];
                                echo "</td><td>";
                                echo $valores['mun_nome'];
                                echo "</td><td>";
                                echo $valores['dep_nome'];
                                echo "</td><td>";
                                echo $valores['mod_nome'];
                                echo "</td><td>";
                                echo $linha2;
                                echo "</td><td>";
                                echo $valores['dis_nome'];
                              };
                              echo "</td>";
                              echo "</tr>";
                              echo "<tr>";
                              echo "<td>";
                              while ($valores = mysqli_fetch_assoc($executar3)){
                                echo $valores['esc_nome'];
                                echo "</td><td>";
                                echo $valores['mun_nome'];
                                echo "</td><td>";
                                echo $valores['dep_nome'];
                                echo "</td><td>";
                                echo $valores['mod_nome'];
                                echo "</td><td>";
                                echo $linha3;
                                echo "</td><td>";
                                echo $valores['dis_nome'];
                              };
                              echo "</td>";
                              echo "</tr>";
                              echo "<tr>";
                              echo "<td>";
                              while ($valores = mysqli_fetch_assoc($executar4)){
                                echo $valores['esc_nome'];
                                echo "</td><td>";
                                echo $valores['mun_nome'];
                                echo "</td><td>";
                                echo $valores['dep_nome'];
                                echo "</td><td>";
                                echo $valores['mod_nome'];
                                echo "</td><td>";
                                echo $linha4;
                                echo "</td><td>";
                                echo $valores['dis_nome'];
                              };
                              echo "</td>";
                              echo "</tr>";
                              echo "<tr>";
                              echo "<td>";
                              while ($valores = mysqli_fetch_assoc($executar5)){
                                echo $valores['esc_nome'];
                                echo "</td><td>";
                                echo $valores['mun_nome'];
                                echo "</td><td>";
                                echo $valores['dep_nome'];
                                echo "</td><td>";
                                echo $valores['mod_nome'];
                                echo "</td><td>";
                                echo $linha5;
                                echo "</td><td>";
                                echo $valores['dis_nome'];
                              };
                              echo "</td>";
                              echo "</tr>";
                              echo "<tr>";
                              echo "<td>";
                              while ($valores = mysqli_fetch_assoc($executar6)){
                                echo $valores['esc_nome'];
                                echo "</td><td>";
                                echo $valores['mun_nome'];
                                echo "</td><td>";
                                echo $valores['dep_nome'];
                                echo "</td><td>";
                                echo $valores['mod_nome'];
                                echo "</td><td>";
                                echo $linha6;
                                echo "</td><td>";
                                echo $valores['dis_nome'];
                              };
                              echo "</td>";
                              echo "</tr>";
                              echo "<tr>";
                              echo "<td>";
                              while ($valores = mysqli_fetch_assoc($executar7)){
                                echo $valores['esc_nome'];
                                echo "</td><td>";
                                echo $valores['mun_nome'];
                                echo "</td><td>";
                                echo $valores['dep_nome'];
                                echo "</td><td>";
                                echo $valores['mod_nome'];
                                echo "</td><td>";
                                echo $linha7;
                                echo "</td><td>";
                                echo $valores['dis_nome'];
                              };
                              echo "</td>";
                              echo "</tr>";
                              echo "<tr>";
                              echo "<td>";
                              while ($valores = mysqli_fetch_assoc($executar8)){
                                echo $valores['esc_nome'];
                                echo "</td><td>";
                                echo $valores['mun_nome'];
                                echo "</td><td>";
                                echo $valores['dep_nome'];
                                echo "</td><td>";
                                echo $valores['mod_nome'];
                                echo "</td><td>";
                                echo $linha8;
                                echo "</td><td>";
                                echo $valores['dis_nome'];
                              };
                              echo "</td>";
                              echo "</tr>";
                              echo "<tr>";
                              echo "<td>";
                              while ($valores = mysqli_fetch_assoc($executar9)){
                                echo $valores['esc_nome'];
                                echo "</td><td>";
                                echo $valores['mun_nome'];
                                echo "</td><td>";
                                echo $valores['dep_nome'];
                                echo "</td><td>";
                                echo $valores['mod_nome'];
                                echo "</td><td>";
                                echo $linha9;
                                echo "</td><td>";
                                echo $valores['dis_nome'];
                              };
                              echo "</td>";
                              echo "</tr>";
                              break;  
                            case 10:
                              echo "<tr>";
                              echo "<td>";
                              while ($valores = mysqli_fetch_assoc($executar1)){
                                echo $valores['esc_nome'];
                                echo "</td><td>";
                                echo $valores['mun_nome'];
                                echo "</td><td>";
                                echo $valores['dep_nome'];
                                echo "</td><td>";
                                echo $valores['mod_nome'];
                                echo "</td><td>";
                                echo $linha1;
                                echo "</td><td>";
                                echo $valores['dis_nome'];
                              };
                              echo "</td>";
                              echo "</tr>";
                              echo "<tr>";
                              echo "<td>";
                              while ($valores = mysqli_fetch_assoc($executar2)){
                                echo $valores['esc_nome'];
                                echo "</td><td>";
                                echo $valores['mun_nome'];
                                echo "</td><td>";
                                echo $valores['dep_nome'];
                                echo "</td><td>";
                                echo $valores['mod_nome'];
                                echo "</td><td>";
                                echo $linha2;
                                echo "</td><td>";
                                echo $valores['dis_nome'];
                              };
                              echo "</td>";
                              echo "</tr>";
                              echo "<tr>";
                              echo "<td>";
                              while ($valores = mysqli_fetch_assoc($executar3)){
                                echo $valores['esc_nome'];
                                echo "</td><td>";
                                echo $valores['mun_nome'];
                                echo "</td><td>";
                                echo $valores['dep_nome'];
                                echo "</td><td>";
                                echo $valores['mod_nome'];
                                echo "</td><td>";
                                echo $linha3;
                                echo "</td><td>";
                                echo $valores['dis_nome'];
                              };
                              echo "</td>";
                              echo "</tr>";
                              echo "<tr>";
                              echo "<td>";
                              while ($valores = mysqli_fetch_assoc($executar4)){
                                echo $valores['esc_nome'];
                                echo "</td><td>";
                                echo $valores['mun_nome'];
                                echo "</td><td>";
                                echo $valores['dep_nome'];
                                echo "</td><td>";
                                echo $valores['mod_nome'];
                                echo "</td><td>";
                                echo $linha4;
                                echo "</td><td>";
                                echo $valores['dis_nome'];
                              };
                              echo "</td>";
                              echo "</tr>";
                              echo "<tr>";
                              echo "<td>";
                              while ($valores = mysqli_fetch_assoc($executar5)){
                                echo $valores['esc_nome'];
                                echo "</td><td>";
                                echo $valores['mun_nome'];
                                echo "</td><td>";
                                echo $valores['dep_nome'];
                                echo "</td><td>";
                                echo $valores['mod_nome'];
                                echo "</td><td>";
                                echo $linha5;
                                echo "</td><td>";
                                echo $valores['dis_nome'];
                              };
                              echo "</td>";
                              echo "</tr>";
                              echo "<tr>";
                              echo "<td>";
                              while ($valores = mysqli_fetch_assoc($executar6)){
                                echo $valores['esc_nome'];
                                echo "</td><td>";
                                echo $valores['mun_nome'];
                                echo "</td><td>";
                                echo $valores['dep_nome'];
                                echo "</td><td>";
                                echo $valores['mod_nome'];
                                echo "</td><td>";
                                echo $linha6;
                                echo "</td><td>";
                                echo $valores['dis_nome'];
                              };
                              echo "</td>";
                              echo "</tr>";
                              echo "<tr>";
                              echo "<td>";
                              while ($valores = mysqli_fetch_assoc($executar7)){
                                echo $valores['esc_nome'];
                                echo "</td><td>";
                                echo $valores['mun_nome'];
                                echo "</td><td>";
                                echo $valores['dep_nome'];
                                echo "</td><td>";
                                echo $valores['mod_nome'];
                                echo "</td><td>";
                                echo $linha7;
                                echo "</td><td>";
                                echo $valores['dis_nome'];
                              };
                              echo "</td>";
                              echo "</tr>";
                              echo "<tr>";
                              echo "<td>";
                              while ($valores = mysqli_fetch_assoc($executar8)){
                                echo $valores['esc_nome'];
                                echo "</td><td>";
                                echo $valores['mun_nome'];
                                echo "</td><td>";
                                echo $valores['dep_nome'];
                                echo "</td><td>";
                                echo $valores['mod_nome'];
                                echo "</td><td>";
                                echo $linha8;
                                echo "</td><td>";
                                echo $valores['dis_nome'];
                              };
                              echo "</td>";
                              echo "</tr>";
                              echo "<tr>";
                              echo "<td>";
                              while ($valores = mysqli_fetch_assoc($executar9)){
                                echo $valores['esc_nome'];
                                echo "</td><td>";
                                echo $valores['mun_nome'];
                                echo "</td><td>";
                                echo $valores['dep_nome'];
                                echo "</td><td>";
                                echo $valores['mod_nome'];
                                echo "</td><td>";
                                echo $linha9;
                                echo "</td><td>";
                                echo $valores['dis_nome'];
                              };
                              echo "</td>";
                              echo "</tr>";
                              echo "<tr>";
                              echo "<td>";
                              while ($valores = mysqli_fetch_assoc($executar10)){
                                echo $valores['esc_nome'];
                                echo "</td><td>";
                                echo $valores['mun_nome'];
                                echo "</td><td>";
                                echo $valores['dep_nome'];
                                echo "</td><td>";
                                echo $valores['mod_nome'];
                                echo "</td><td>";
                                echo $linha10;
                                echo "</td><td>";
                                echo $valores['dis_nome'];
                              };
                              echo "</td>";
                              echo "</tr>";
                              break;
                            case 11:
                              echo "<tr>";
                              echo "<td>";
                              while ($valores = mysqli_fetch_assoc($executar1)){
                                echo $valores['esc_nome'];
                                echo "</td><td>";
                                echo $valores['mun_nome'];
                                echo "</td><td>";
                                echo $valores['dep_nome'];
                                echo "</td><td>";
                                echo $valores['mod_nome'];
                                echo "</td><td>";
                                echo $linha1;
                                echo "</td><td>";
                                echo $valores['dis_nome'];
                              };
                              echo "</td>";
                              echo "</tr>";
                              echo "<tr>";
                              echo "<td>";
                              while ($valores = mysqli_fetch_assoc($executar2)){
                                echo $valores['esc_nome'];
                                echo "</td><td>";
                                echo $valores['mun_nome'];
                                echo "</td><td>";
                                echo $valores['dep_nome'];
                                echo "</td><td>";
                                echo $valores['mod_nome'];
                                echo "</td><td>";
                                echo $linha2;
                                echo "</td><td>";
                                echo $valores['dis_nome'];
                              };
                              echo "</td>";
                              echo "</tr>";
                              echo "<tr>";
                              echo "<td>";
                              while ($valores = mysqli_fetch_assoc($executar3)){
                                echo $valores['esc_nome'];
                                echo "</td><td>";
                                echo $valores['mun_nome'];
                                echo "</td><td>";
                                echo $valores['dep_nome'];
                                echo "</td><td>";
                                echo $valores['mod_nome'];
                                echo "</td><td>";
                                echo $linha3;
                                echo "</td><td>";
                                echo $valores['dis_nome'];
                              };
                              echo "</td>";
                              echo "</tr>";
                              echo "<tr>";
                              echo "<td>";
                              while ($valores = mysqli_fetch_assoc($executar4)){
                                echo $valores['esc_nome'];
                                echo "</td><td>";
                                echo $valores['mun_nome'];
                                echo "</td><td>";
                                echo $valores['dep_nome'];
                                echo "</td><td>";
                                echo $valores['mod_nome'];
                                echo "</td><td>";
                                echo $linha4;
                                echo "</td><td>";
                                echo $valores['dis_nome'];
                              };
                              echo "</td>";
                              echo "</tr>";
                              echo "<tr>";
                              echo "<td>";
                              while ($valores = mysqli_fetch_assoc($executar5)){
                                echo $valores['esc_nome'];
                                echo "</td><td>";
                                echo $valores['mun_nome'];
                                echo "</td><td>";
                                echo $valores['dep_nome'];
                                echo "</td><td>";
                                echo $valores['mod_nome'];
                                echo "</td><td>";
                                echo $linha5;
                                echo "</td><td>";
                                echo $valores['dis_nome'];
                              };
                              echo "</td>";
                              echo "</tr>";
                              echo "<tr>";
                              echo "<td>";
                              while ($valores = mysqli_fetch_assoc($executar6)){
                                echo $valores['esc_nome'];
                                echo "</td><td>";
                                echo $valores['mun_nome'];
                                echo "</td><td>";
                                echo $valores['dep_nome'];
                                echo "</td><td>";
                                echo $valores['mod_nome'];
                                echo "</td><td>";
                                echo $linha6;
                                echo "</td><td>";
                                echo $valores['dis_nome'];
                              };
                              echo "</td>";
                              echo "</tr>";
                              echo "<tr>";
                              echo "<td>";
                              while ($valores = mysqli_fetch_assoc($executar7)){
                                echo $valores['esc_nome'];
                                echo "</td><td>";
                                echo $valores['mun_nome'];
                                echo "</td><td>";
                                echo $valores['dep_nome'];
                                echo "</td><td>";
                                echo $valores['mod_nome'];
                                echo "</td><td>";
                                echo $linha7;
                                echo "</td><td>";
                                echo $valores['dis_nome'];
                              };
                              echo "</td>";
                              echo "</tr>";
                              echo "<tr>";
                              echo "<td>";
                              while ($valores = mysqli_fetch_assoc($executar8)){
                                echo $valores['esc_nome'];
                                echo "</td><td>";
                                echo $valores['mun_nome'];
                                echo "</td><td>";
                                echo $valores['dep_nome'];
                                echo "</td><td>";
                                echo $valores['mod_nome'];
                                echo "</td><td>";
                                echo $linha8;
                                echo "</td><td>";
                                echo $valores['dis_nome'];
                              };
                              echo "</td>";
                              echo "</tr>";
                              echo "<tr>";
                              echo "<td>";
                              while ($valores = mysqli_fetch_assoc($executar9)){
                                echo $valores['esc_nome'];
                                echo "</td><td>";
                                echo $valores['mun_nome'];
                                echo "</td><td>";
                                echo $valores['dep_nome'];
                                echo "</td><td>";
                                echo $valores['mod_nome'];
                                echo "</td><td>";
                                echo $linha9;
                                echo "</td><td>";
                                echo $valores['dis_nome'];
                              };
                              echo "</td>";
                              echo "</tr>";
                              echo "<tr>";
                              echo "<td>";
                              while ($valores = mysqli_fetch_assoc($executar10)){
                                echo $valores['esc_nome'];
                                echo "</td><td>";
                                echo $valores['mun_nome'];
                                echo "</td><td>";
                                echo $valores['dep_nome'];
                                echo "</td><td>";
                                echo $valores['mod_nome'];
                                echo "</td><td>";
                                echo $linha10;
                                echo "</td><td>";
                                echo $valores['dis_nome'];
                              };
                              echo "</td>";
                              echo "</tr>";
                              echo "<tr>";
                              echo "<td>";
                              while ($valores = mysqli_fetch_assoc($executar11)){
                                echo $valores['esc_nome'];
                                echo "</td><td>";
                                echo $valores['mun_nome'];
                                echo "</td><td>";
                                echo $valores['dep_nome'];
                                echo "</td><td>";
                                echo $valores['mod_nome'];
                                echo "</td><td>";
                                echo $linha11;
                                echo "</td><td>";
                                echo $valores['dis_nome'];
                              };
                              echo "</td>";
                              echo "</tr>";
                              break;
                            case 12:
                              echo "<tr>";
                              echo "<td>";
                              while ($valores = mysqli_fetch_assoc($executar1)){
                                echo $valores['esc_nome'];
                                echo "</td><td>";
                                echo $valores['mun_nome'];
                                echo "</td><td>";
                                echo $valores['dep_nome'];
                                echo "</td><td>";
                                echo $valores['mod_nome'];
                                echo "</td><td>";
                                echo $linha1;
                                echo "</td><td>";
                                echo $valores['dis_nome'];
                              };
                              echo "</td>";
                              echo "</tr>";
                              echo "<tr>";
                              echo "<td>";
                              while ($valores = mysqli_fetch_assoc($executar2)){
                                echo $valores['esc_nome'];
                                echo "</td><td>";
                                echo $valores['mun_nome'];
                                echo "</td><td>";
                                echo $valores['dep_nome'];
                                echo "</td><td>";
                                echo $valores['mod_nome'];
                                echo "</td><td>";
                                echo $linha2;
                                echo "</td><td>";
                                echo $valores['dis_nome'];
                              };
                              echo "</td>";
                              echo "</tr>";
                              echo "<tr>";
                              echo "<td>";
                              while ($valores = mysqli_fetch_assoc($executar3)){
                                echo $valores['esc_nome'];
                                echo "</td><td>";
                                echo $valores['mun_nome'];
                                echo "</td><td>";
                                echo $valores['dep_nome'];
                                echo "</td><td>";
                                echo $valores['mod_nome'];
                                echo "</td><td>";
                                echo $linha3;
                                echo "</td><td>";
                                echo $valores['dis_nome'];
                              };
                              echo "</td>";
                              echo "</tr>";
                              echo "<tr>";
                              echo "<td>";
                              while ($valores = mysqli_fetch_assoc($executar4)){
                                echo $valores['esc_nome'];
                                echo "</td><td>";
                                echo $valores['mun_nome'];
                                echo "</td><td>";
                                echo $valores['dep_nome'];
                                echo "</td><td>";
                                echo $valores['mod_nome'];
                                echo "</td><td>";
                                echo $linha4;
                                echo "</td><td>";
                                echo $valores['dis_nome'];
                              };
                              echo "</td>";
                              echo "</tr>";
                              echo "<tr>";
                              echo "<td>";
                              while ($valores = mysqli_fetch_assoc($executar5)){
                                echo $valores['esc_nome'];
                                echo "</td><td>";
                                echo $valores['mun_nome'];
                                echo "</td><td>";
                                echo $valores['dep_nome'];
                                echo "</td><td>";
                                echo $valores['mod_nome'];
                                echo "</td><td>";
                                echo $linha5;
                                echo "</td><td>";
                                echo $valores['dis_nome'];
                              };
                              echo "</td>";
                              echo "</tr>";
                              echo "<tr>";
                              echo "<td>";
                              while ($valores = mysqli_fetch_assoc($executar6)){
                                echo $valores['esc_nome'];
                                echo "</td><td>";
                                echo $valores['mun_nome'];
                                echo "</td><td>";
                                echo $valores['dep_nome'];
                                echo "</td><td>";
                                echo $valores['mod_nome'];
                                echo "</td><td>";
                                echo $linha6;
                                echo "</td><td>";
                                echo $valores['dis_nome'];
                              };
                              echo "</td>";
                              echo "</tr>";
                              echo "<tr>";
                              echo "<td>";
                              while ($valores = mysqli_fetch_assoc($executar7)){
                                echo $valores['esc_nome'];
                                echo "</td><td>";
                                echo $valores['mun_nome'];
                                echo "</td><td>";
                                echo $valores['dep_nome'];
                                echo "</td><td>";
                                echo $valores['mod_nome'];
                                echo "</td><td>";
                                echo $linha7;
                                echo "</td><td>";
                                echo $valores['dis_nome'];
                              };
                              echo "</td>";
                              echo "</tr>";
                              echo "<tr>";
                              echo "<td>";
                              while ($valores = mysqli_fetch_assoc($executar8)){
                                echo $valores['esc_nome'];
                                echo "</td><td>";
                                echo $valores['mun_nome'];
                                echo "</td><td>";
                                echo $valores['dep_nome'];
                                echo "</td><td>";
                                echo $valores['mod_nome'];
                                echo "</td><td>";
                                echo $linha8;
                                echo "</td><td>";
                                echo $valores['dis_nome'];
                              };
                              echo "</td>";
                              echo "</tr>";
                              echo "<tr>";
                              echo "<td>";
                              while ($valores = mysqli_fetch_assoc($executar9)){
                                echo $valores['esc_nome'];
                                echo "</td><td>";
                                echo $valores['mun_nome'];
                                echo "</td><td>";
                                echo $valores['dep_nome'];
                                echo "</td><td>";
                                echo $valores['mod_nome'];
                                echo "</td><td>";
                                echo $linha9;
                                echo "</td><td>";
                                echo $valores['dis_nome'];
                              };
                              echo "</td>";
                              echo "</tr>";
                              echo "<tr>";
                              echo "<td>";
                              while ($valores = mysqli_fetch_assoc($executar10)){
                                echo $valores['esc_nome'];
                                echo "</td><td>";
                                echo $valores['mun_nome'];
                                echo "</td><td>";
                                echo $valores['dep_nome'];
                                echo "</td><td>";
                                echo $valores['mod_nome'];
                                echo "</td><td>";
                                echo $linha10;
                                echo "</td><td>";
                                echo $valores['dis_nome'];
                              };
                              echo "</td>";
                              echo "</tr>";
                              echo "<tr>";
                              echo "<td>";
                              while ($valores = mysqli_fetch_assoc($executar11)){
                                echo $valores['esc_nome'];
                                echo "</td><td>";
                                echo $valores['mun_nome'];
                                echo "</td><td>";
                                echo $valores['dep_nome'];
                                echo "</td><td>";
                                echo $valores['mod_nome'];
                                echo "</td><td>";
                                echo $linha11;
                                echo "</td><td>";
                                echo $valores['dis_nome'];
                              };
                              echo "</td>";
                              echo "</tr>";
                              echo "<tr>";
                              echo "<td>";
                              while ($valores = mysqli_fetch_assoc($executar12)){
                                echo $valores['esc_nome'];
                                echo "</td><td>";
                                echo $valores['mun_nome'];
                                echo "</td><td>";
                                echo $valores['dep_nome'];
                                echo "</td><td>";
                                echo $valores['mod_nome'];
                                echo "</td><td>";
                                echo $linha12;
                                echo "</td><td>";
                                echo $valores['dis_nome'];
                              };
                              echo "</td>";
                              echo "</tr>";
                              break;
                            case 13:
                              echo "<tr>";
                              echo "<td>";
                              while ($valores = mysqli_fetch_assoc($executar1)){
                                echo $valores['esc_nome'];
                                echo "</td><td>";
                                echo $valores['mun_nome'];
                                echo "</td><td>";
                                echo $valores['dep_nome'];
                                echo "</td><td>";
                                echo $valores['mod_nome'];
                                echo "</td><td>";
                                echo $linha1;
                                echo "</td><td>";
                                echo $valores['dis_nome'];
                              };
                              echo "</td>";
                              echo "</tr>";
                              echo "<tr>";
                              echo "<td>";
                              while ($valores = mysqli_fetch_assoc($executar2)){
                                echo $valores['esc_nome'];
                                echo "</td><td>";
                                echo $valores['mun_nome'];
                                echo "</td><td>";
                                echo $valores['dep_nome'];
                                echo "</td><td>";
                                echo $valores['mod_nome'];
                                echo "</td><td>";
                                echo $linha2;
                                echo "</td><td>";
                                echo $valores['dis_nome'];
                              };
                              echo "</td>";
                              echo "</tr>";
                              echo "<tr>";
                              echo "<td>";
                              while ($valores = mysqli_fetch_assoc($executar3)){
                                echo $valores['esc_nome'];
                                echo "</td><td>";
                                echo $valores['mun_nome'];
                                echo "</td><td>";
                                echo $valores['dep_nome'];
                                echo "</td><td>";
                                echo $valores['mod_nome'];
                                echo "</td><td>";
                                echo $linha3;
                                echo "</td><td>";
                                echo $valores['dis_nome'];
                              };
                              echo "</td>";
                              echo "</tr>";
                              echo "<tr>";
                              echo "<td>";
                              while ($valores = mysqli_fetch_assoc($executar4)){
                                echo $valores['esc_nome'];
                                echo "</td><td>";
                                echo $valores['mun_nome'];
                                echo "</td><td>";
                                echo $valores['dep_nome'];
                                echo "</td><td>";
                                echo $valores['mod_nome'];
                                echo "</td><td>";
                                echo $linha4;
                                echo "</td><td>";
                                echo $valores['dis_nome'];
                              };
                              echo "</td>";
                              echo "</tr>";
                              echo "<tr>";
                              echo "<td>";
                              while ($valores = mysqli_fetch_assoc($executar5)){
                                echo $valores['esc_nome'];
                                echo "</td><td>";
                                echo $valores['mun_nome'];
                                echo "</td><td>";
                                echo $valores['dep_nome'];
                                echo "</td><td>";
                                echo $valores['mod_nome'];
                                echo "</td><td>";
                                echo $linha5;
                                echo "</td><td>";
                                echo $valores['dis_nome'];
                              };
                              echo "</td>";
                              echo "</tr>";
                              echo "<tr>";
                              echo "<td>";
                              while ($valores = mysqli_fetch_assoc($executar6)){
                                echo $valores['esc_nome'];
                                echo "</td><td>";
                                echo $valores['mun_nome'];
                                echo "</td><td>";
                                echo $valores['dep_nome'];
                                echo "</td><td>";
                                echo $valores['mod_nome'];
                                echo "</td><td>";
                                echo $linha6;
                                echo "</td><td>";
                                echo $valores['dis_nome'];
                              };
                              echo "</td>";
                              echo "</tr>";
                              echo "<tr>";
                              echo "<td>";
                              while ($valores = mysqli_fetch_assoc($executar7)){
                                echo $valores['esc_nome'];
                                echo "</td><td>";
                                echo $valores['mun_nome'];
                                echo "</td><td>";
                                echo $valores['dep_nome'];
                                echo "</td><td>";
                                echo $valores['mod_nome'];
                                echo "</td><td>";
                                echo $linha7;
                                echo "</td><td>";
                                echo $valores['dis_nome'];
                              };
                              echo "</td>";
                              echo "</tr>";
                              echo "<tr>";
                              echo "<td>";
                              while ($valores = mysqli_fetch_assoc($executar8)){
                                echo $valores['esc_nome'];
                                echo "</td><td>";
                                echo $valores['mun_nome'];
                                echo "</td><td>";
                                echo $valores['dep_nome'];
                                echo "</td><td>";
                                echo $valores['mod_nome'];
                                echo "</td><td>";
                                echo $linha8;
                                echo "</td><td>";
                                echo $valores['dis_nome'];
                              };
                              echo "</td>";
                              echo "</tr>";
                              echo "<tr>";
                              echo "<td>";
                              while ($valores = mysqli_fetch_assoc($executar9)){
                                echo $valores['esc_nome'];
                                echo "</td><td>";
                                echo $valores['mun_nome'];
                                echo "</td><td>";
                                echo $valores['dep_nome'];
                                echo "</td><td>";
                                echo $valores['mod_nome'];
                                echo "</td><td>";
                                echo $linha9;
                                echo "</td><td>";
                                echo $valores['dis_nome'];
                              };
                              echo "</td>";
                              echo "</tr>";
                              echo "<tr>";
                              echo "<td>";
                              while ($valores = mysqli_fetch_assoc($executar10)){
                                echo $valores['esc_nome'];
                                echo "</td><td>";
                                echo $valores['mun_nome'];
                                echo "</td><td>";
                                echo $valores['dep_nome'];
                                echo "</td><td>";
                                echo $valores['mod_nome'];
                                echo "</td><td>";
                                echo $linha10;
                                echo "</td><td>";
                                echo $valores['dis_nome'];
                              };
                              echo "</td>";
                              echo "</tr>";
                              echo "<tr>";
                              echo "<td>";
                              while ($valores = mysqli_fetch_assoc($executar11)){
                                echo $valores['esc_nome'];
                                echo "</td><td>";
                                echo $valores['mun_nome'];
                                echo "</td><td>";
                                echo $valores['dep_nome'];
                                echo "</td><td>";
                                echo $valores['mod_nome'];
                                echo "</td><td>";
                                echo $linha11;
                                echo "</td><td>";
                                echo $valores['dis_nome'];
                              };
                              echo "</td>";
                              echo "</tr>";
                              echo "<tr>";
                              echo "<td>";
                              while ($valores = mysqli_fetch_assoc($executar12)){
                                echo $valores['esc_nome'];
                                echo "</td><td>";
                                echo $valores['mun_nome'];
                                echo "</td><td>";
                                echo $valores['dep_nome'];
                                echo "</td><td>";
                                echo $valores['mod_nome'];
                                echo "</td><td>";
                                echo $linha12;
                                echo "</td><td>";
                                echo $valores['dis_nome'];
                              };
                              echo "</td>";
                              echo "</tr>";
                              echo "<tr>";
                              echo "<td>";
                              while ($valores = mysqli_fetch_assoc($executar13)){
                                echo $valores['esc_nome'];
                                echo "</td><td>";
                                echo $valores['mun_nome'];
                                echo "</td><td>";
                                echo $valores['dep_nome'];
                                echo "</td><td>";
                                echo $valores['mod_nome'];
                                echo "</td><td>";
                                echo $linha13;
                                echo "</td><td>";
                                echo $valores['dis_nome'];
                              };
                              echo "</td>";
                              echo "</tr>";
                              break;
                            case 14:
                              echo "<tr>";
                              echo "<td>";
                              while ($valores = mysqli_fetch_assoc($executar1)){
                                echo $valores['esc_nome'];
                                echo "</td><td>";
                                echo $valores['mun_nome'];
                                echo "</td><td>";
                                echo $valores['dep_nome'];
                                echo "</td><td>";
                                echo $valores['mod_nome'];
                                echo "</td><td>";
                                echo $linha1;
                                echo "</td><td>";
                                echo $valores['dis_nome'];
                              };
                              echo "</td>";
                              echo "</tr>";
                              echo "<tr>";
                              echo "<td>";
                              while ($valores = mysqli_fetch_assoc($executar2)){
                                echo $valores['esc_nome'];
                                echo "</td><td>";
                                echo $valores['mun_nome'];
                                echo "</td><td>";
                                echo $valores['dep_nome'];
                                echo "</td><td>";
                                echo $valores['mod_nome'];
                                echo "</td><td>";
                                echo $linha2;
                                echo "</td><td>";
                                echo $valores['dis_nome'];
                              };
                              echo "</td>";
                              echo "</tr>";
                              echo "<tr>";
                              echo "<td>";
                              while ($valores = mysqli_fetch_assoc($executar3)){
                                echo $valores['esc_nome'];
                                echo "</td><td>";
                                echo $valores['mun_nome'];
                                echo "</td><td>";
                                echo $valores['dep_nome'];
                                echo "</td><td>";
                                echo $valores['mod_nome'];
                                echo "</td><td>";
                                echo $linha3;
                                echo "</td><td>";
                                echo $valores['dis_nome'];
                              };
                              echo "</td>";
                              echo "</tr>";
                              echo "<tr>";
                              echo "<td>";
                              while ($valores = mysqli_fetch_assoc($executar4)){
                                echo $valores['esc_nome'];
                                echo "</td><td>";
                                echo $valores['mun_nome'];
                                echo "</td><td>";
                                echo $valores['dep_nome'];
                                echo "</td><td>";
                                echo $valores['mod_nome'];
                                echo "</td><td>";
                                echo $linha4;
                                echo "</td><td>";
                                echo $valores['dis_nome'];
                              };
                              echo "</td>";
                              echo "</tr>";
                              echo "<tr>";
                              echo "<td>";
                              while ($valores = mysqli_fetch_assoc($executar5)){
                                echo $valores['esc_nome'];
                                echo "</td><td>";
                                echo $valores['mun_nome'];
                                echo "</td><td>";
                                echo $valores['dep_nome'];
                                echo "</td><td>";
                                echo $valores['mod_nome'];
                                echo "</td><td>";
                                echo $linha5;
                                echo "</td><td>";
                                echo $valores['dis_nome'];
                              };
                              echo "</td>";
                              echo "</tr>";
                              echo "<tr>";
                              echo "<td>";
                              while ($valores = mysqli_fetch_assoc($executar6)){
                                echo $valores['esc_nome'];
                                echo "</td><td>";
                                echo $valores['mun_nome'];
                                echo "</td><td>";
                                echo $valores['dep_nome'];
                                echo "</td><td>";
                                echo $valores['mod_nome'];
                                echo "</td><td>";
                                echo $linha6;
                                echo "</td><td>";
                                echo $valores['dis_nome'];
                              };
                              echo "</td>";
                              echo "</tr>";
                              echo "<tr>";
                              echo "<td>";
                              while ($valores = mysqli_fetch_assoc($executar7)){
                                echo $valores['esc_nome'];
                                echo "</td><td>";
                                echo $valores['mun_nome'];
                                echo "</td><td>";
                                echo $valores['dep_nome'];
                                echo "</td><td>";
                                echo $valores['mod_nome'];
                                echo "</td><td>";
                                echo $linha7;
                                echo "</td><td>";
                                echo $valores['dis_nome'];
                              };
                              echo "</td>";
                              echo "</tr>";
                              echo "<tr>";
                              echo "<td>";
                              while ($valores = mysqli_fetch_assoc($executar8)){
                                echo $valores['esc_nome'];
                                echo "</td><td>";
                                echo $valores['mun_nome'];
                                echo "</td><td>";
                                echo $valores['dep_nome'];
                                echo "</td><td>";
                                echo $valores['mod_nome'];
                                echo "</td><td>";
                                echo $linha8;
                                echo "</td><td>";
                                echo $valores['dis_nome'];
                              };
                              echo "</td>";
                              echo "</tr>";
                              echo "<tr>";
                              echo "<td>";
                              while ($valores = mysqli_fetch_assoc($executar9)){
                                echo $valores['esc_nome'];
                                echo "</td><td>";
                                echo $valores['mun_nome'];
                                echo "</td><td>";
                                echo $valores['dep_nome'];
                                echo "</td><td>";
                                echo $valores['mod_nome'];
                                echo "</td><td>";
                                echo $linha9;
                                echo "</td><td>";
                                echo $valores['dis_nome'];
                              };
                              echo "</td>";
                              echo "</tr>";
                              echo "<tr>";
                              echo "<td>";
                              while ($valores = mysqli_fetch_assoc($executar10)){
                                echo $valores['esc_nome'];
                                echo "</td><td>";
                                echo $valores['mun_nome'];
                                echo "</td><td>";
                                echo $valores['dep_nome'];
                                echo "</td><td>";
                                echo $valores['mod_nome'];
                                echo "</td><td>";
                                echo $linha10;
                                echo "</td><td>";
                                echo $valores['dis_nome'];
                              };
                              echo "</td>";
                              echo "</tr>";
                              echo "<tr>";
                              echo "<td>";
                              while ($valores = mysqli_fetch_assoc($executar11)){
                                echo $valores['esc_nome'];
                                echo "</td><td>";
                                echo $valores['mun_nome'];
                                echo "</td><td>";
                                echo $valores['dep_nome'];
                                echo "</td><td>";
                                echo $valores['mod_nome'];
                                echo "</td><td>";
                                echo $linha11;
                                echo "</td><td>";
                                echo $valores['dis_nome'];
                              };
                              echo "</td>";
                              echo "</tr>";
                              echo "<tr>";
                              echo "<td>";
                              while ($valores = mysqli_fetch_assoc($executar12)){
                                echo $valores['esc_nome'];
                                echo "</td><td>";
                                echo $valores['mun_nome'];
                                echo "</td><td>";
                                echo $valores['dep_nome'];
                                echo "</td><td>";
                                echo $valores['mod_nome'];
                                echo "</td><td>";
                                echo $linha12;
                                echo "</td><td>";
                                echo $valores['dis_nome'];
                              };
                              echo "</td>";
                              echo "</tr>";
                              echo "<tr>";
                              echo "<td>";
                              while ($valores = mysqli_fetch_assoc($executar13)){
                                echo $valores['esc_nome'];
                                echo "</td><td>";
                                echo $valores['mun_nome'];
                                echo "</td><td>";
                                echo $valores['dep_nome'];
                                echo "</td><td>";
                                echo $valores['mod_nome'];
                                echo "</td><td>";
                                echo $linha13;
                                echo "</td><td>";
                                echo $valores['dis_nome'];
                              };
                              echo "</td>";
                              echo "</tr>";
                              echo "<tr>";
                              echo "<td>";
                              while ($valores = mysqli_fetch_assoc($executar14)){
                                echo $valores['esc_nome'];
                                echo "</td><td>";
                                echo $valores['mun_nome'];
                                echo "</td><td>";
                                echo $valores['dep_nome'];
                                echo "</td><td>";
                                echo $valores['mod_nome'];
                                echo "</td><td>";
                                echo $linha14;
                                echo "</td><td>";
                                echo $valores['dis_nome'];
                              };
                              echo "</td>";
                              echo "</tr>";
                              break;
                            case 15:
                              echo "<tr>";
                              echo "<td>";
                              while ($valores = mysqli_fetch_assoc($executar1)){
                                echo $valores['esc_nome'];
                                echo "</td><td>";
                                echo $valores['mun_nome'];
                                echo "</td><td>";
                                echo $valores['dep_nome'];
                                echo "</td><td>";
                                echo $valores['mod_nome'];
                                echo "</td><td>";
                                echo $linha1;
                                echo "</td><td>";
                                echo $valores['dis_nome'];
                              };
                              echo "</td>";
                              echo "</tr>";
                              echo "<tr>";
                              echo "<td>";
                              while ($valores = mysqli_fetch_assoc($executar2)){
                                echo $valores['esc_nome'];
                                echo "</td><td>";
                                echo $valores['mun_nome'];
                                echo "</td><td>";
                                echo $valores['dep_nome'];
                                echo "</td><td>";
                                echo $valores['mod_nome'];
                                echo "</td><td>";
                                echo $linha2;
                                echo "</td><td>";
                                echo $valores['dis_nome'];
                              };
                              echo "</td>";
                              echo "</tr>";
                              echo "<tr>";
                              echo "<td>";
                              while ($valores = mysqli_fetch_assoc($executar3)){
                                echo $valores['esc_nome'];
                                echo "</td><td>";
                                echo $valores['mun_nome'];
                                echo "</td><td>";
                                echo $valores['dep_nome'];
                                echo "</td><td>";
                                echo $valores['mod_nome'];
                                echo "</td><td>";
                                echo $linha3;
                                echo "</td><td>";
                                echo $valores['dis_nome'];
                              };
                              echo "</td>";
                              echo "</tr>";
                              echo "<tr>";
                              echo "<td>";
                              while ($valores = mysqli_fetch_assoc($executar4)){
                                echo $valores['esc_nome'];
                                echo "</td><td>";
                                echo $valores['mun_nome'];
                                echo "</td><td>";
                                echo $valores['dep_nome'];
                                echo "</td><td>";
                                echo $valores['mod_nome'];
                                echo "</td><td>";
                                echo $linha4;
                                echo "</td><td>";
                                echo $valores['dis_nome'];
                              };
                              echo "</td>";
                              echo "</tr>";
                              echo "<tr>";
                              echo "<td>";
                              while ($valores = mysqli_fetch_assoc($executar5)){
                                echo $valores['esc_nome'];
                                echo "</td><td>";
                                echo $valores['mun_nome'];
                                echo "</td><td>";
                                echo $valores['dep_nome'];
                                echo "</td><td>";
                                echo $valores['mod_nome'];
                                echo "</td><td>";
                                echo $linha5;
                                echo "</td><td>";
                                echo $valores['dis_nome'];
                              };
                              echo "</td>";
                              echo "</tr>";
                              echo "<tr>";
                              echo "<td>";
                              while ($valores = mysqli_fetch_assoc($executar6)){
                                echo $valores['esc_nome'];
                                echo "</td><td>";
                                echo $valores['mun_nome'];
                                echo "</td><td>";
                                echo $valores['dep_nome'];
                                echo "</td><td>";
                                echo $valores['mod_nome'];
                                echo "</td><td>";
                                echo $linha6;
                                echo "</td><td>";
                                echo $valores['dis_nome'];
                              };
                              echo "</td>";
                              echo "</tr>";
                              echo "<tr>";
                              echo "<td>";
                              while ($valores = mysqli_fetch_assoc($executar7)){
                                echo $valores['esc_nome'];
                                echo "</td><td>";
                                echo $valores['mun_nome'];
                                echo "</td><td>";
                                echo $valores['dep_nome'];
                                echo "</td><td>";
                                echo $valores['mod_nome'];
                                echo "</td><td>";
                                echo $linha7;
                                echo "</td><td>";
                                echo $valores['dis_nome'];
                              };
                              echo "</td>";
                              echo "</tr>";
                              echo "<tr>";
                              echo "<td>";
                              while ($valores = mysqli_fetch_assoc($executar8)){
                                echo $valores['esc_nome'];
                                echo "</td><td>";
                                echo $valores['mun_nome'];
                                echo "</td><td>";
                                echo $valores['dep_nome'];
                                echo "</td><td>";
                                echo $valores['mod_nome'];
                                echo "</td><td>";
                                echo $linha8;
                                echo "</td><td>";
                                echo $valores['dis_nome'];
                              };
                              echo "</td>";
                              echo "</tr>";
                              echo "<tr>";
                              echo "<td>";
                              while ($valores = mysqli_fetch_assoc($executar9)){
                                echo $valores['esc_nome'];
                                echo "</td><td>";
                                echo $valores['mun_nome'];
                                echo "</td><td>";
                                echo $valores['dep_nome'];
                                echo "</td><td>";
                                echo $valores['mod_nome'];
                                echo "</td><td>";
                                echo $linha9;
                                echo "</td><td>";
                                echo $valores['dis_nome'];
                              };
                              echo "</td>";
                              echo "</tr>";
                              echo "<tr>";
                              echo "<td>";
                              while ($valores = mysqli_fetch_assoc($executar10)){
                                echo $valores['esc_nome'];
                                echo "</td><td>";
                                echo $valores['mun_nome'];
                                echo "</td><td>";
                                echo $valores['dep_nome'];
                                echo "</td><td>";
                                echo $valores['mod_nome'];
                                echo "</td><td>";
                                echo $linha10;
                                echo "</td><td>";
                                echo $valores['dis_nome'];
                              };
                              echo "</td>";
                              echo "</tr>";
                              echo "<tr>";
                              echo "<td>";
                              while ($valores = mysqli_fetch_assoc($executar11)){
                                echo $valores['esc_nome'];
                                echo "</td><td>";
                                echo $valores['mun_nome'];
                                echo "</td><td>";
                                echo $valores['dep_nome'];
                                echo "</td><td>";
                                echo $valores['mod_nome'];
                                echo "</td><td>";
                                echo $linha11;
                                echo "</td><td>";
                                echo $valores['dis_nome'];
                              };
                              echo "</td>";
                              echo "</tr>";
                              echo "<tr>";
                              echo "<td>";
                              while ($valores = mysqli_fetch_assoc($executar12)){
                                echo $valores['esc_nome'];
                                echo "</td><td>";
                                echo $valores['mun_nome'];
                                echo "</td><td>";
                                echo $valores['dep_nome'];
                                echo "</td><td>";
                                echo $valores['mod_nome'];
                                echo "</td><td>";
                                echo $linha12;
                                echo "</td><td>";
                                echo $valores['dis_nome'];
                              };
                              echo "</td>";
                              echo "</tr>";
                              echo "<tr>";
                              echo "<td>";
                              while ($valores = mysqli_fetch_assoc($executar13)){
                                echo $valores['esc_nome'];
                                echo "</td><td>";
                                echo $valores['mun_nome'];
                                echo "</td><td>";
                                echo $valores['dep_nome'];
                                echo "</td><td>";
                                echo $valores['mod_nome'];
                                echo "</td><td>";
                                echo $linha13;
                                echo "</td><td>";
                                echo $valores['dis_nome'];
                              };
                              echo "</td>";
                              echo "</tr>";
                              echo "<tr>";
                              echo "<td>";
                              while ($valores = mysqli_fetch_assoc($executar14)){
                                echo $valores['esc_nome'];
                                echo "</td><td>";
                                echo $valores['mun_nome'];
                                echo "</td><td>";
                                echo $valores['dep_nome'];
                                echo "</td><td>";
                                echo $valores['mod_nome'];
                                echo "</td><td>";
                                echo $linha14;
                                echo "</td><td>";
                                echo $valores['dis_nome'];
                              };
                              echo "</td>";
                              echo "</tr>";
                              echo "<tr>";
                              echo "<td>";
                              while ($valores = mysqli_fetch_assoc($executar15)){
                                echo $valores['esc_nome'];
                                echo "</td><td>";
                                echo $valores['mun_nome'];
                                echo "</td><td>";
                                echo $valores['dep_nome'];
                                echo "</td><td>";
                                echo $valores['mod_nome'];
                                echo "</td><td>";
                                echo $linha15;
                                echo "</td><td>";
                                echo $valores['dis_nome'];
                              };
                              echo "</td>";
                              echo "</tr>";
                              break;                                                            
                          };

                        ?>
                      </tr>
                    </table>
                  </div>    
                </div>
                <div class="col-md-12" align="left" style="padding-top: 20px;">
                  <div class="col-md-12">
                    <p align="left" style="">O requerente apresentou os seguintes documentos comprobatórios:<br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&bull; Declaração da Escola;<br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&bull; Requerimento;<br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&bull; Comprovante de Residência;<br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&bull; RG: <?php echo $rg; ?><br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&bull; CPF: <?php echo $cpf; ?><br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&bull; "Diplomas"<br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&bull; "Cursos/Certificados"</p>
                  </div>
                </div>
                <div class="col-md-12" align="left" style="padding-top: 60px;">
                  <div class="col-md-12">
                    <?php $hoje = date('d/m/Y');
                      $datas = explode("/", $hoje);
                      switch($datas[1]){
                          case 1:
                              $mes = "Janeiro";
                              break;
                         case 2:
                              $mes = "Fevereiro";
                              break;
                         case 3:
                              $mes = "Março";
                              break;
                         case 4:
                              $mes = "Abril";
                              break;
                         case 5:
                              $mes = "Maio";
                              break;
                         case 6:
                              $mes = "Junho";
                              break;
                         case 7:
                              $mes = "Julho";
                              break;
                         case 8:
                              $mes = "Agosto";
                              break;
                         case 9:
                              $mes = "Setembro";
                              break;
                         case 10:
                              $mes = "Outubro";
                              break;
                         case 11:
                              $mes = "Novembro";
                              break;
                         case 12:
                              $mes = "Dezembro";
                              break;
                         
                      };
                      echo "<p align='left' style=''>Canindé, ".$datas[0]." de ".$mes." de ".$datas[2]."</p>";
                    ?>
                  </div>
                </div>
                <div class="col-md-12" align="right" style="padding-top: 12px;">
                  <div class="col-md-12">
                    <p align="right" style="">Teste<br>Coordenador(a) da CREDE 7</p>
                  </div>
                </div>
                <div class="col-md-12" align="center" style="padding-top: 40px;">
                  <div class="col-md-12">
                    <p align="center" style="font-size: 11px;">Coordenadoria Regional de Desenvolvimento da Educação - CREDE 7 - Rua Tabelião Facundo, 236<br><strong>Centro - Canindé - Ceará - CEP: 62.700-000 Fone: (85) 3343:6815 Fax(85) 33436812</strong></p>
                    
                  </div>
                </div>
              </div>
              </div>
        </div>
		<input type="button" value="Criar PDF" id="btnImprimir" onclick="CriaPDF()" style="margin-top: 70vh;margin-left: 37%;" class="btn btn-success w-25 form-control"/>
    <a href="../index.php">
      <input type="button" value="Voltar" style="margin-left: 37%;" class="btn btn-danger w-25 form-control"/>
    </a>




  <script>
    function CriaPDF() {
        var minhaTabela = document.getElementById('tabelapdf').innerHTML;
        var style = "<style>";
        style = style + "body {color: 'green';}";
        style = style + "#img{ max-width: 50%;max-height: 50%;margin-right: 4px;}";
        style = style + "table {width: 100%;font: 20px Arial;}";
        style = style + "table, th, td {border: solid 1px #DDD; border-collapse: collapse;";
        style = style + "padding: 2px 3px;text-align: center;}";
        style = style + "color:'blue';";
        style = style + "</style>";
        // CRIA UM OBJETO WINDOW
        var win = window.open('', '', 'height=700,width=700');
        win.document.write('<html><head>');
        win.document.write(style);                                     
        win.document.write('</head>');
        win.document.write('<body>');

        win.document.write(minhaTabela);                          
        win.document.write('</body></html>');
        win.document.close();                                            
        win.print();
    }
</script>
</body>
</html>