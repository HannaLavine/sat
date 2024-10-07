<?php
include "../../back-end/DB/conexao/conexao.php";
session_start();

  if (isset($_POST['professor'])){
    $professor = $_POST['professor'];
    $selecione = "SELECT * FROM tb_professor WHERE prof_id = '$professor'";
    $executar = mysqli_query($conexao, $selecione);
    while ($valor = mysqli_fetch_assoc($executar)) {
      $nome = $valor['prof_nome'];
    };
  };

  if (isset($_POST['escola1'])){
    $escola1 = $_POST['escola1'];
  };
  if (isset($_POST['escola2'])){
    $escola2 = $_POST['escola2'];
  };
  if (isset($_POST['escola3'])){
    $escola3 = $_POST['escola3'];
  };
  if (isset($_POST['escola4'])){
    $escola4 = $_POST['escola4'];
  };
  if (isset($_POST['escola5'])){
    $escola5 = $_POST['escola5'];
  };
  if (isset($_POST['escola6'])){
    $escola6 = $_POST['escola6'];
  };
  if (isset($_POST['escola7'])){
    $escola7 = $_POST['escola7'];
  };
  if (isset($_POST['escola8'])){
    $escola8 = $_POST['escola8'];
  };
  if (isset($_POST['escola9'])){
    $escola9 = $_POST['escola9'];
  };
  if (isset($_POST['escola10'])){
    $escola10 = $_POST['escola10'];
  };
  if (isset($_POST['escola11'])){
    $escola11 = $_POST['escola11'];
  };
  if (isset($_POST['escola12'])){
    $escola12 = $_POST['escola12'];
  };
  if (isset($_POST['escola13'])){
    $escola13 = $_POST['escola13'];
  };
  if (isset($_POST['escola14'])){
    $escola14 = $_POST['escola14'];
  };
  if (isset($_POST['escola15'])){
    $escola15 = $_POST['escola15'];
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
  };
	//referenciar o DomPDF com namespace
	use Dompdf\Dompdf;
	use Dompdf\Options;

	
	// include autoloader
	require_once("dompdf/autoload.inc.php");

	//Criando a Instancia
	$dompdf = new Dompdf(array('enable_remote' => true));
	$dompdf->set_base_path('../../extensions/script/bootstrap.min.js');
	$dompdf->set_base_path('../../extensions/styles/bootstrap.min.css');
	// Carrega seu HTML
	$dompdf->load_html('
			<!DOCTYPE html>
			<html lang="pt-br">
				<head>
					<meta charset="utf-8">
					<meta name="viewport" content="width=device-width, initial-scale=1">
					<title>Celke</title>
					<script src="../extensions/scripts/bootstrap.min.js"></script>
    				<link rel="stylesheet" type="text/css" href="../../extensions/styles/bootstrap.min.css">
				</head>
				<body>
				<div class="container-fluid">
					<div class="mx-auto col-md-12 row w-100 p-3" style="min-height: 30vh;max-height: 120vh;">
                <div class="col-md-12" style="padding-top: 20px;">
                  <div class="col-md-2">
                    <img src="../logo.jpg" align="left" style="max-width: 100%;max-height: 100%;margin-right: 4px;">
                  </div>
                  <div class="col-md-10">
                    <p align="left" style="font-weight: bold;">GOVERNO DO<br> ESTADO DO CEARÁ<br>Secretaria da Educação<br>Coordenadoria Regional de Desenvolvimento da Educação - CREDE 7<br>Célula de Cooperação com os Municipios - CECOM - 7</p>
                  </div>
                </div>
                <div class="col-md-12" style="padding-top: 15px;">
                  <div class="col-md-6">
                    <p align="left" style="font-weight: bold;">AUTORIZAÇÃO TEMPORÁRIA N° 80/2021</p>
                  </div>
                </div>
                <div class="col-md-12" style="padding-top: 15px;">
                  <div class="col-md-6">
                    <p align="left" style="font-weight: bold;">VÁLIDA ATÉ 21 DE MARÇO DE 2022</p>
                  </div>
                  <div class="col-md-6">
                  </div>
                  <div class="col-md-12">
                    <p align="left" style="margin-top: -10px;">A Coordenadoria Regional de Desenvolvimento da Educação - CREDE 7, tendo em vista o Disposto no Art. 275, da Resolução 333/94 do Conselho de Educação do Ceará e o que consta no Processo N° 002/2009, concede <strong>AUTORIZAÇÃO TEMPORÁRIA</strong> para o Ano de 2021 ao professor(a) 
                    <strong>
                    eduardo
                    </strong> para lecionar no(s) estabelecimentos(s) de Ensino a(s) Disciplinas(s):</p>
                  </div>    
                </div>
                <div class="col-md-12" align="center" style="padding-top: 15px;">
                  <div class="col-md-12">
                    <table border="1px;" style="margin:auto;">
                      <tr>
                        <th><label style="margin: 12px;">Estabelecimento de Ensino</label></th>
                        <th><label style="margin: 12px;">Município</label></th>
                        <th><label style="margin: 12px;">Dep. Adm.</label></th>
                        <th><label style="margin: 12px;">Modalidade</label></th>
                        <th><label style="margin: 12px;">Ano</label></th>
                        <th><label style="margin: 12px;">Disciplina</label></th>
                      </tr>
                      <tr>
                        <td><label style="margin: 12px;">Estabelecimento de Ensino</label></td>
                        <td><label style="margin: 12px;">Município</label></td>
                        <td><label style="margin: 12px;">Dep. Adm.</label></td>
                        <td><label style="margin: 12px;">Modalidade</label></td>
                        <td><label style="margin: 12px;">Ano</label></td>
                        <td><label style="margin: 12px;">Disciplina</label></td>
                      </tr>
                    </table>
                  </div>    
                </div>
                <div class="col-md-12" align="left" style="padding-top: 20px;">
                  <div class="col-md-12">
                    <p align="left" style="">O requerente apresentou os seguintes documentos comprobatórios:<br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Declaração da Escola;<br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Requerimento;<br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Comprovante de Residência;<br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;RG<br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;CPF<br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Copia dos diplomas</p>
                  </div>
                </div>
                <div class="col-md-12" align="left" style="padding-top: 60px;">
                  <div class="col-md-12">
                    <p align="left" style="">Canindé, 11 de fevereiro de 2021</p>
                  </div>
                </div>
                <div class="col-md-12" align="right" style="padding-top: 12px;">
                  <div class="col-md-12">
                    <p align="right" style="">Paulo Alexandre Sousa Queiroz<br>Coordenador da CREDE 7</p>
                  </div>
                </div>
                <div class="col-md-12" align="center" style="padding-top: 40px;">
                  <div class="col-md-12">
                    <p align="center" style="font-size: 11px;">Coordenadoria Regional de Desenvolvimento da Educação - CREDE 7 - Rua Tabelião Facundo, 236<br><strong>Centro - Canindé - Ceará - CEP: 62.700-000 Fone: (85) 3343:6815 Fax(85) 33436812</strong></p>
                    
                  </div>
                </div>
              </div>
              </div>
				</body>
			</html>
		');

	
	//Renderizar o html
	$dompdf->render();
	$dompdf->setPaper('A4', 'landscape');
	//Exibibir a página
	$dompdf->stream(
		"relatorio_celke.pdf", 
		array(
			"Attachment" => false //Para realizar o download somente alterar para true
		)
	);
?>