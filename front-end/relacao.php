<?php
  //Conexão com um arquivo distante e inicio da sessão
  include "../back-end/DB/conexao/conexao.php";
  session_start();
  if (isset($_POST['linhas'])){
    $quantidade = $_POST['linhas'];
  };
?>
<!DOCTYPE html>
<html>
  <head>
    <!--Informações do Sistema-->
    <title>SAT</title>
    <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <!--Extenções: jquery-3.6.0, Bootstrap 3.3.7 e FontAwesome 5.15.3-->
      <link rel="stylesheet" type="text/css" href="../extensions/styles/estilo.css">
      <link rel="stylesheet" href="../extensions/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
      <script type="text/javascript" src="../extensions/scripts/jquery.min.js"></script>
      <script src="//netdna.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <link rel="stylesheet" type="text/css" href="//netdna.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    
      <style type="text/css">
        .dropdown-menu{
          background-color: #15C465;
          border: none;
        }
        .dropdown-item{
          color: white;
        }
        .dropdown-item:hover{
          color: #15C465;
          background-color: white;
          border: 1px solid #15C465;
        }
        .caixa{
          color: black;
          background-color: white;
        }
        .dropdown-item:hover{
          color: black;
          background-color: white;
        }
        .ajuda1{
          color: white ;
          background-color: #15C465;
          border: 1px solid #15C465;
          font-weight: bold;
        }
        .ajuda1:hover{
          color: white;
          background-color: #15C465;
          border: 1px solid #15C465;
          font-weight: bold;
        }
        body::selection{
          background-color: #15C465;;
          color: white;
        }
        h1::selection{
          background-color: #15C465;;
          color: white;
        }
        label::selection{
          background-color: #15C465;;
          color: white;
        }
        input[type=number]::-webkit-inner-spin-button,
        input[type=number]::-webkit-outer-spin-button {
        -webkit-appearance: none;
        margin: 0;
        }
      </style>
  </head>
  <body>
    <nav class="navbar navbar-expand-sm navbar-light" style="background-color: #15C465">
      <!-- Titulo -->
      <a class="navbar-brand" href="index.php" id="titulo" title="Sistema de Autorizações Temporárias">SAT</a>
      <ul class="navbar-nav">
        <!-- Links -->
        <li class="nav-item">
          <a class="nav-link navegacao" href="index.php" id="navbardrop1">
            <i class="fa fa-user" aria-hidden="true"></i>
            Professores
          </a>
        </li>

        <li class="nav-item dropdown">
          <a class="nav-link navegacao" href="instituicoes.php" id="navbardrop2">
            <i class="fa fa-building" aria-hidden="true"></i>
            Instituições
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link navegacao" href="materias.php" id="navbardrop1">
            <i class="fa fa-book" aria-hidden="true"></i>
            Materias
          </a>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown navegacao" href="#" id="navbardrop3" data-toggle="dropdown">
            <i class="fa fa-file-text" aria-hidden="true"></i>
            Criar autorizações
          </a>
          <div class="dropdown-menu">
            <form method="POST" action="relacao.php">
              <div class="dropdown-item" title="O máximo suportado no momento é 15">
                <label class="">Quantas linhas terá a tabela?</label>
                <input type="number" name="linhas" class="" style="width: 30px;" min="1" max="15"><br>
                <input type="submit" values="Criar" class="btn btn-danger">
              </div>
            </form>
          </div>
        </li>
      </ul>
    </nav>
    <div class="py-4 text-center mx-auto text-dark bg-light" id="perfil">
      <div class="container"><br><br>
        <div class="row">
          <div class="mx-auto col-md-12">
            <h1 class="wow animate__animated animate__bounceInLeft">Autorização</h1>
            <hr class="mx-auto w-25 bg-success">
          </div>
        </div>
        <div class="col-md-10 m-5 mx-auto bg-white" style="box-shadow: 0px 0px 20px 0px #000000b8;border-radius: 15px;"> <br>
          <ul class="nav nav-tabs" id="myTab" role="tablist">
            <li class="nav-item">
              <a  class="nav-link text-dark active" id="cadastrar-tab" data-toggle="tab" href="#cadastrar" role="tab" aria-controls="cadastrar" aria-selected="true">Cadastrar</a>
            </li>
          </ul>
          <div class="tab-content" id="myTabContent" style="overflow-y: scroll;overflow-x: scroll;">
            <div class="tab-pane fade show active" id="cadastrar" role="tabpanel" aria-labelledby="cadastrar-tab">
              <div class="mx-auto col-md-12 row w-100 p-3" style="min-height: 30vh;max-height: 100vh;">
                <div class="col-md-12" style="padding-top: 20px;">
                  <form method="POST" action="pdf/index.php">
                    <input type="hidden" name="hidden" <?php echo "value='".$quantidade."'"; ?>>
                    <div class="form-row">
                      <div  class="form-group tg col-md-12 input-group-lg">
                        <select class="form-control" name="professor" style="background-color: transparent;border: 1px solid black;cursor: pointer;">
                          <option value="0">Professor...</option>
                          <?php
                            $selecione = "SELECT * FROM tb_professor";
                            $executar = mysqli_query($conexao, $selecione);
                            while ($valores = mysqli_fetch_assoc($executar)){
                              echo "<option value='".$valores['prof_id']."'>".$valores['prof_nome']."</option>";
                            };
                          ?>
                        </select>
                      </div>
                      <div class="col-md-12" style="padding-top: 20px;">
                        <table border="1px" align="center">
                          <tr>
                            <th><label style="margin: 12px;">Estabelecimento de Ensino</label></th>
                            <th><label style="margin: 12px;">Ano</label></th>
                            <th><label style="margin: 12px;">Disciplina</label></th>
                          </tr>
                          <?php
                            $escola = "SELECT * FROM tb_escola";
                            $escola2 = "SELECT * FROM tb_escola";
                            $escola3 = "SELECT * FROM tb_escola";
                            $escola4 = "SELECT * FROM tb_escola";
                            $escola5 = "SELECT * FROM tb_escola";
                            $escola6 = "SELECT * FROM tb_escola";
                            $escola7 = "SELECT * FROM tb_escola";
                            $escola8 = "SELECT * FROM tb_escola";
                            $escola9 = "SELECT * FROM tb_escola";
                            $escola10 = "SELECT * FROM tb_escola";
                            $escola11 = "SELECT * FROM tb_escola";
                            $escola12 = "SELECT * FROM tb_escola";
                            $escola13 = "SELECT * FROM tb_escola";
                            $escola14 = "SELECT * FROM tb_escola";
                            $escola15 = "SELECT * FROM tb_escola";
                            $executar = mysqli_query($conexao, $escola);
                            $executar2 = mysqli_query($conexao, $escola2);
                            $executar3 = mysqli_query($conexao, $escola3);
                            $executar4 = mysqli_query($conexao, $escola4);
                            $executar5 = mysqli_query($conexao, $escola5);
                            $executar6 = mysqli_query($conexao, $escola6);
                            $executar7 = mysqli_query($conexao, $escola7);
                            $executar8 = mysqli_query($conexao, $escola8);
                            $executar9 = mysqli_query($conexao, $escola9);
                            $executar10 = mysqli_query($conexao, $escola10);
                            $executar11 = mysqli_query($conexao, $escola11);
                            $executar12 = mysqli_query($conexao, $escola12);
                            $executar13 = mysqli_query($conexao, $escola13);
                            $executar14 = mysqli_query($conexao, $escola14);
                            $executar15 = mysqli_query($conexao, $escola15);


                            $disciplina = "SELECT * FROM tb_disciplina";
                            $disciplina2 = "SELECT * FROM tb_disciplina";
                            $disciplina3 = "SELECT * FROM tb_disciplina";
                            $disciplina4 = "SELECT * FROM tb_disciplina";
                            $disciplina5 = "SELECT * FROM tb_disciplina";
                            $disciplina6 = "SELECT * FROM tb_disciplina";
                            $disciplina7 = "SELECT * FROM tb_disciplina";
                            $disciplina8 = "SELECT * FROM tb_disciplina";
                            $disciplina9 = "SELECT * FROM tb_disciplina";
                            $disciplina10 = "SELECT * FROM tb_disciplina";
                            $disciplina11 = "SELECT * FROM tb_disciplina";
                            $disciplina12 = "SELECT * FROM tb_disciplina";
                            $disciplina13 = "SELECT * FROM tb_disciplina";
                            $disciplina14 = "SELECT * FROM tb_disciplina";
                            $disciplina15 = "SELECT * FROM tb_disciplina";
                            $executar16 = mysqli_query($conexao, $disciplina);
                            $executar17 = mysqli_query($conexao, $disciplina2);
                            $executar18 = mysqli_query($conexao, $disciplina3);
                            $executar19 = mysqli_query($conexao, $disciplina4);
                            $executar20 = mysqli_query($conexao, $disciplina5);
                            $executar21 = mysqli_query($conexao, $disciplina6);
                            $executar22 = mysqli_query($conexao, $disciplina7);
                            $executar23 = mysqli_query($conexao, $disciplina8);
                            $executar24 = mysqli_query($conexao, $disciplina9);
                            $executar25 = mysqli_query($conexao, $disciplina10);
                            $executar26 = mysqli_query($conexao, $disciplina11);
                            $executar27 = mysqli_query($conexao, $disciplina12);
                            $executar28 = mysqli_query($conexao, $disciplina13);
                            $executar29 = mysqli_query($conexao, $disciplina14);
                            $executar30 = mysqli_query($conexao, $disciplina15);
                            switch ($quantidade) {
                              case 1:
                                echo "<tr>
                                      <td>
                                        <select name='escola1' style='width: 100%;text-align-last: center;border: 1px solid white;'>
                                          <option value='0'>Selecione...</option>";
                                while ($valores = mysqli_fetch_assoc($executar)){
                                  echo "<option value='".$valores['esc_id']."'>".$valores['esc_nome']."</option>";
                                };
                                echo "</select></td><td><input type='text' name='linha1' style='border: 1px solid white;'/></td>
                                      <td>
                                        <select name='disciplina1' style='width: 100%;text-align-last: center;border: 1px solid white;'>
                                          <option value='0'>Selecione...</option>";
                                while ($valores = mysqli_fetch_assoc($executar16)){
                                  echo "<option value='".$valores['dis_id']."'>".$valores['dis_nome']."</option>";
                                };
                                echo "</select></td></tr>";
                                break;
                              case 2:
                                echo "<tr>
                                      <td>
                                        <select name='escola1' style='width: 100%;text-align-last: center;border: 1px solid white;'>
                                          <option value='0'>Selecione...</option>";
                                while ($valores = mysqli_fetch_assoc($executar)){
                                  echo "<option value='".$valores['esc_id']."'>".$valores['esc_nome']."</option>";
                                };
                                echo "</select></td><td><input type='text' name='linha1' style='border: 1px solid white;'/></td>
                                      <td>
                                        <select name='disciplina1' style='width: 100%;text-align-last: center;border: 1px solid white;'>
                                          <option value='0'>Selecione...</option>";
                                while ($valores = mysqli_fetch_assoc($executar16)){
                                  echo "<option value='".$valores['dis_id']."'>".$valores['dis_nome']."</option>";
                                };
                                echo "</select></td></tr>";
                                echo "<tr>
                                      <td>
                                        <select name='escola2' style='width: 100%;text-align-last: center;border: 1px solid white;'>
                                          <option value='0'>Selecione...</option>";
                                while ($valore = mysqli_fetch_assoc($executar2)){
                                  echo "<option value='".$valore['esc_id']."'>".$valore['esc_nome']."</option>";
                                };
                                echo "</select></td><td><input type='text' name='linha2' style='border: 1px solid white;'/></td>
                                      <td>
                                        <select name='disciplina2' style='width: 100%;text-align-last: center;border: 1px solid white;'>
                                          <option value='0'>Selecione...</option>";
                                while ($valores = mysqli_fetch_assoc($executar17)){
                                  echo "<option value='".$valores['dis_id']."'>".$valores['dis_nome']."</option>";
                                };
                                echo "</select></td>";
                                break;
                            case 3:
                                echo "<tr>
                                      <td>
                                        <select name='escola1' style='width: 100%;text-align-last: center;border: 1px solid white;'>
                                          <option value='0'>Selecione...</option>";
                                while ($valores = mysqli_fetch_assoc($executar)){
                                  echo "<option value='".$valores['esc_id']."'>".$valores['esc_nome']."</option>";
                                };
                                echo "</select></td><td><input type='text' name='linha1' style='border: 1px solid white;'/></td>
                                      <td>
                                        <select name='disciplina1' style='width: 100%;text-align-last: center;border: 1px solid white;'>
                                          <option value='0'>Selecione...</option>";
                                while ($valores = mysqli_fetch_assoc($executar16)){
                                  echo "<option value='".$valores['dis_id']."'>".$valores['dis_nome']."</option>";
                                };
                                echo "</select></td></tr>";
                                echo "<tr>
                                      <td>
                                        <select name='escola2' style='width: 100%;text-align-last: center;border: 1px solid white;'>
                                          <option value='0'>Selecione...</option>";
                                while ($valore = mysqli_fetch_assoc($executar2)){
                                  echo "<option value='".$valore['esc_id']."'>".$valore['esc_nome']."</option>";
                                };
                                echo "</select></td><td><input type='text' name='linha2' style='border: 1px solid white;'/></td>
                                      <td>
                                        <select name='disciplina2'style='width: 100%;text-align-last: center;border: 1px solid white;'>
                                          <option value='0'>Selecione...</option>";
                                while ($valores = mysqli_fetch_assoc($executar17)){
                                  echo "<option value='".$valores['dis_id']."'>".$valores['dis_nome']."</option>";
                                };
                                echo "</select></td>";
                                echo "<tr>
                                      <td>
                                        <select name='escola3'style='width: 100%;text-align-last: center;border: 1px solid white;'>
                                          <option value='0'>Selecione...</option>";
                                while ($valore = mysqli_fetch_assoc($executar3)){
                                  echo "<option value='".$valore['esc_id']."'>".$valore['esc_nome']."</option>";
                                };
                                echo "</select></td><td><input type='text' name='linha3' style='border: 1px solid white;'/></td>
                                      <td>
                                        <select name='disciplina3'style='width: 100%;text-align-last: center;border: 1px solid white;'>
                                          <option value='0'>Selecione...</option>";
                                while ($valores = mysqli_fetch_assoc($executar18)){
                                  echo "<option value='".$valores['dis_id']."'>".$valores['dis_nome']."</option>";
                                };
                                echo "</select></td>";
                                break;
                            case 4:
                                echo "<tr>
                                      <td>
                                        <select name='escola1'style='width: 100%;text-align-last: center;border: 1px solid white;'>
                                          <option value='0'>Selecione...</option>";
                                while ($valores = mysqli_fetch_assoc($executar)){
                                  echo "<option value='".$valores['esc_id']."'>".$valores['esc_nome']."</option>";
                                };
                                echo "</select></td><td><input type='text' name='linha1' style='border: 1px solid white;'/></td>
                                      <td>
                                        <select name='disciplina1'style='width: 100%;text-align-last: center;border: 1px solid white;'>
                                          <option value='0'>Selecione...</option>";
                                while ($valores = mysqli_fetch_assoc($executar16)){
                                  echo "<option value='".$valores['dis_id']."'>".$valores['dis_nome']."</option>";
                                };
                                echo "</select></td></tr>";
                                echo "<tr>
                                      <td>
                                        <select name='escola2'style='width: 100%;text-align-last: center;border: 1px solid white;'>
                                          <option value='0'>Selecione...</option>";
                                while ($valore = mysqli_fetch_assoc($executar2)){
                                  echo "<option value='".$valore['esc_id']."'>".$valore['esc_nome']."</option>";
                                };
                                echo "</select></td><td><input type='text' name='linha2' style='border: 1px solid white;'/></td>
                                      <td>
                                        <select name='disciplina2'style='width: 100%;text-align-last: center;border: 1px solid white;'>
                                          <option value='0'>Selecione...</option>";
                                while ($valores = mysqli_fetch_assoc($executar17)){
                                  echo "<option value='".$valores['dis_id']."'>".$valores['dis_nome']."</option>";
                                };
                                echo "</select></td>";
                                echo "<tr>
                                      <td>
                                        <select name='escola3'style='width: 100%;text-align-last: center;border: 1px solid white;'>
                                          <option value='0'>Selecione...</option>";
                                while ($valore = mysqli_fetch_assoc($executar3)){
                                  echo "<option value='".$valore['esc_id']."'>".$valore['esc_nome']."</option>";
                                };
                                echo "</select></td><td><input type='text' name='linha3' style='border: 1px solid white;'/></td>
                                      <td>
                                        <select name='disciplina3'style='width: 100%;text-align-last: center;border: 1px solid white;'>
                                          <option value='0'>Selecione...</option>";
                                while ($valores = mysqli_fetch_assoc($executar18)){
                                  echo "<option value='".$valores['dis_id']."'>".$valores['dis_nome']."</option>";
                                };
                                echo "</select></td></tr>";
                                echo "<tr>
                                      <td>
                                        <select name='escola4'style='width: 100%;text-align-last: center;border: 1px solid white;'>
                                          <option value='0'>Selecione...</option>";
                                while ($valores = mysqli_fetch_assoc($executar4)){
                                  echo "<option value='".$valores['esc_id']."'>".$valores['esc_nome']."</option>";
                                };
                                echo "</select></td><td><input type='text' name='linha4' style='border: 1px solid white;'/></td>
                                      <td>
                                        <select name='disciplina4'style='width: 100%;text-align-last: center;border: 1px solid white;'>
                                          <option value='0'>Selecione...</option>";
                                while ($valores = mysqli_fetch_assoc($executar19)){
                                  echo "<option value='".$valores['dis_id']."'>".$valores['dis_nome']."</option>";
                                };
                                echo "</select></td></tr>";
                                break;
                            case 5:
                                echo "<tr>
                                      <td>
                                        <select name='escola1' style='width: 100%;text-align-last: center;border: 1px solid white;'>
                                          <option value='0'>Selecione...</option>";
                                while ($valores = mysqli_fetch_assoc($executar)){
                                  echo "<option value='".$valores['esc_id']."'>".$valores['esc_nome']."</option>";
                                };
                                echo "</select></td><td><input type='text' name='linha1' style='border: 1px solid white;'/></td>
                                      <td>
                                        <select name='disciplina1'style='width: 100%;text-align-last: center;border: 1px solid white;'>
                                          <option value='0'>Selecione...</option>";
                                while ($valores = mysqli_fetch_assoc($executar16)){
                                  echo "<option value='".$valores['dis_id']."'>".$valores['dis_nome']."</option>";
                                };
                                echo "</select></td></tr>";
                                echo "<tr>
                                      <td>
                                        <select name='escola2'style='width: 100%;text-align-last: center;border: 1px solid white;'>
                                          <option value='0'>Selecione...</option>";
                                while ($valore = mysqli_fetch_assoc($executar2)){
                                  echo "<option value='".$valore['esc_id']."'>".$valore['esc_nome']."</option>";
                                };
                                echo "</select></td><td><input type='text' name='linha2' style='border: 1px solid white;'/></td>
                                      <td>
                                        <select name='disciplina2'style='width: 100%;text-align-last: center;border: 1px solid white;'>
                                          <option value='0'>Selecione...</option>";
                                while ($valores = mysqli_fetch_assoc($executar17)){
                                  echo "<option value='".$valores['dis_id']."'>".$valores['dis_nome']."</option>";
                                };
                                echo "</select></td>";
                                echo "<tr>
                                      <td>
                                        <select name='escola3' style='width: 100%;text-align-last: center;border: 1px solid white;'>
                                          <option value='0'>Selecione...</option>";
                                while ($valore = mysqli_fetch_assoc($executar3)){
                                  echo "<option value='".$valore['esc_id']."'>".$valore['esc_nome']."</option>";
                                };
                                echo "</select></td><td><input type='text' name='linha3' style='border: 1px solid white;'/></td>
                                      <td>
                                        <select name='disciplina3'style='width: 100%;text-align-last: center;border: 1px solid white;'>
                                          <option value='0'>Selecione...</option>";
                                while ($valores = mysqli_fetch_assoc($executar18)){
                                  echo "<option value='".$valores['dis_id']."'>".$valores['dis_nome']."</option>";
                                };
                                echo "</select></td></tr>";
                                echo "<tr>
                                      <td>
                                        <select name='escola4'style='width: 100%;text-align-last: center;border: 1px solid white;'>
                                          <option value='0'>Selecione...</option>";
                                while ($valores = mysqli_fetch_assoc($executar4)){
                                  echo "<option value='".$valores['esc_id']."'>".$valores['esc_nome']."</option>";
                                };
                                echo "</select></td><td><input type='text' name='linha4' style='border: 1px solid white;'/></td>
                                      <td>
                                        <select name='disciplina4'style='width: 100%;text-align-last: center;border: 1px solid white;'>
                                          <option value='0'>Selecione...</option>";
                                while ($valores = mysqli_fetch_assoc($executar19)){
                                  echo "<option value='".$valores['dis_id']."'>".$valores['dis_nome']."</option>";
                                };
                                echo "</select></td></tr>";
                                echo "<tr>
                                      <td>
                                        <select name='escola5'style='width: 100%;text-align-last: center;border: 1px solid white;'>
                                          <option value='0'>Selecione...</option>";
                                while ($valores = mysqli_fetch_assoc($executar5)){
                                  echo "<option value='".$valores['esc_id']."'>".$valores['esc_nome']."</option>";
                                };
                                echo "</select></td><td><input type='text' name='linha5' style='border: 1px solid white;'/></td>
                                      <td>
                                        <select name='disciplina5'style='width: 100%;text-align-last: center;border: 1px solid white;'>
                                          <option value='0'>Selecione...</option>";
                                while ($valores = mysqli_fetch_assoc($executar20)){
                                  echo "<option value='".$valores['dis_id']."'>".$valores['dis_nome']."</option>";
                                };
                                echo "</select></td></tr>";
                                break;
                            case 6:
                                echo "<tr>
                                      <td>
                                        <select name='escola1'style='width: 100%;text-align-last: center;border: 1px solid white;'>
                                          <option value='0'>Selecione...</option>";
                                while ($valores = mysqli_fetch_assoc($executar)){
                                  echo "<option value='".$valores['esc_id']."'>".$valores['esc_nome']."</option>";
                                };
                                echo "</select></td><td><input type='text' name='linha1' style='border: 1px solid white;'/></td>
                                      <td>
                                        <select name='disciplina1' style='width: 100%;text-align-last: center;border: 1px solid white;'>
                                          <option value='0'>Selecione...</option>";
                                while ($valores = mysqli_fetch_assoc($executar16)){
                                  echo "<option value='".$valores['dis_id']."'>".$valores['dis_nome']."</option>";
                                };
                                echo "</select></td></tr>";
                                echo "<tr>
                                      <td>
                                        <select name='escola2'style='width: 100%;text-align-last: center;border: 1px solid white;'>
                                          <option value='0'>Selecione...</option>";
                                while ($valore = mysqli_fetch_assoc($executar2)){
                                  echo "<option value='".$valore['esc_id']."'>".$valore['esc_nome']."</option>";
                                };
                                echo "</select></td><td><input type='text' name='linha2' style='border: 1px solid white;'/></td>
                                      <td>
                                        <select name='disciplina2'style='width: 100%;text-align-last: center;border: 1px solid white;'>
                                          <option value='0'>Selecione...</option>";
                                while ($valores = mysqli_fetch_assoc($executar17)){
                                  echo "<option value='".$valores['dis_id']."'>".$valores['dis_nome']."</option>";
                                };
                                echo "</select></td>";
                                echo "<tr>
                                      <td>
                                        <select name='escola3'style='width: 100%;text-align-last: center;border: 1px solid white;'>
                                          <option value='0'>Selecione...</option>";
                                while ($valore = mysqli_fetch_assoc($executar3)){
                                  echo "<option value='".$valore['esc_id']."'>".$valore['esc_nome']."</option>";
                                };
                                echo "</select></td><td><input type='text' name='linha3' style='border: 1px solid white;'/></td>
                                      <td>
                                        <select name='disciplina3'style='width: 100%;text-align-last: center;border: 1px solid white;'>
                                          <option value='0'>Selecione...</option>";
                                while ($valores = mysqli_fetch_assoc($executar18)){
                                  echo "<option value='".$valores['dis_id']."'>".$valores['dis_nome']."</option>";
                                };
                                echo "</select></td></tr>";
                                echo "<tr>
                                      <td>
                                        <select name='escola4'style='width: 100%;text-align-last: center;border: 1px solid white;'>
                                          <option value='0'>Selecione...</option>";
                                while ($valores = mysqli_fetch_assoc($executar4)){
                                  echo "<option value='".$valores['esc_id']."'>".$valores['esc_nome']."</option>";
                                };
                                echo "</select></td><td><input type='text' name='linha4' style='border: 1px solid white;'/></td>
                                      <td>
                                        <select name='disciplina4'style='width: 100%;text-align-last: center;border: 1px solid white;'>
                                          <option value='0'>Selecione...</option>";
                                while ($valores = mysqli_fetch_assoc($executar19)){
                                  echo "<option value='".$valores['dis_id']."'>".$valores['dis_nome']."</option>";
                                };
                                echo "</select></td></tr>";
                                echo "<tr>
                                      <td>
                                        <select name='escola5'style='width: 100%;text-align-last: center;border: 1px solid white;'>
                                          <option value='0'>Selecione...</option>";
                                while ($valores = mysqli_fetch_assoc($executar5)){
                                  echo "<option value='".$valores['esc_id']."'>".$valores['esc_nome']."</option>";
                                };
                                echo "</select></td><td><input type='text' name='linha5' style='border: 1px solid white;'/></td>
                                      <td>
                                        <select name='disciplina5'style='width: 100%;text-align-last: center;border: 1px solid white;'>
                                          <option value='0'>Selecione...</option>";
                                while ($valores = mysqli_fetch_assoc($executar20)){
                                  echo "<option value='".$valores['dis_id']."'>".$valores['dis_nome']."</option>";
                                };
                                echo "</select></td></tr>";
                                echo "<tr>
                                      <td>
                                        <select name='escola6'style='width: 100%;text-align-last: center;border: 1px solid white;'>
                                          <option value='0'>Selecione...</option>";
                                while ($valores = mysqli_fetch_assoc($executar6)){
                                  echo "<option value='".$valores['esc_id']."'>".$valores['esc_nome']."</option>";
                                };
                                echo "</select></td><td><input type='text' name='linha6' style='border: 1px solid white;'/></td>
                                      <td>
                                        <select name='disciplina6'style='width: 100%;text-align-last: center;border: 1px solid white;'>
                                          <option value='0'>Selecione...</option>";
                                while ($valores = mysqli_fetch_assoc($executar21)){
                                  echo "<option value='".$valores['dis_id']."'>".$valores['dis_nome']."</option>";
                                };
                                echo "</select></td></tr>";
                                break;
                            case 7:
                                echo "<tr>
                                      <td>
                                        <select name='escola1'style='width: 100%;text-align-last: center;border: 1px solid white;'>
                                          <option value='0'>Selecione...</option>";
                                while ($valores = mysqli_fetch_assoc($executar)){
                                  echo "<option value='".$valores['esc_id']."'>".$valores['esc_nome']."</option>";
                                };
                                echo "</select></td><td><input type='text' name='linha1' style='border: 1px solid white;'/></td>
                                      <td>
                                        <select name='disciplina1'style='width: 100%;text-align-last: center;border: 1px solid white;'>
                                          <option value='0'>Selecione...</option>";
                                while ($valores = mysqli_fetch_assoc($executar16)){
                                  echo "<option value='".$valores['dis_id']."'>".$valores['dis_nome']."</option>";
                                };
                                echo "</select></td></tr>";
                                echo "<tr>
                                      <td>
                                        <select name='escola2'style='width: 100%;text-align-last: center;border: 1px solid white;'>
                                          <option value='0'>Selecione...</option>";
                                while ($valore = mysqli_fetch_assoc($executar2)){
                                  echo "<option value='".$valore['esc_id']."'>".$valore['esc_nome']."</option>";
                                };
                                echo "</select></td><td><input type='text' name='linha' style='border: 1px solid white;'/></td>
                                      <td>
                                        <select name='disciplina2'style='width: 100%;text-align-last: center;border: 1px solid white;'>
                                          <option value='0'>Selecione...</option>";
                                while ($valores = mysqli_fetch_assoc($executar17)){
                                  echo "<option value='".$valores['dis_id']."'>".$valores['dis_nome']."</option>";
                                };
                                echo "</select></td>";
                                echo "<tr>
                                      <td>
                                        <select name='escola3'style='width: 100%;text-align-last: center;border: 1px solid white;'>
                                          <option value='0'>Selecione...</option>";
                                while ($valore = mysqli_fetch_assoc($executar3)){
                                  echo "<option value='".$valore['esc_id']."'>".$valore['esc_nome']."</option>";
                                };
                                echo "</select></td><td><input type='text' name='linha3' style='border: 1px solid white;'/></td>
                                      <td>
                                        <select name='disciplina3'style='width: 100%;text-align-last: center;border: 1px solid white;'>
                                          <option value='0'>Selecione...</option>";
                                while ($valores = mysqli_fetch_assoc($executar18)){
                                  echo "<option value='".$valores['dis_id']."'>".$valores['dis_nome']."</option>";
                                };
                                echo "</select></td></tr>";
                                echo "<tr>
                                      <td>
                                        <select name='escola4'style='width: 100%;text-align-last: center;border: 1px solid white;'>
                                          <option value='0'>Selecione...</option>";
                                while ($valores = mysqli_fetch_assoc($executar4)){
                                  echo "<option value='".$valores['esc_id']."'>".$valores['esc_nome']."</option>";
                                };
                                echo "</select></td><td><input type='text' name='linha4' style='border: 1px solid white;'/></td>
                                      <td>
                                        <select name='disciplina4'style='width: 100%;text-align-last: center;border: 1px solid white;'>
                                          <option value='0'>Selecione...</option>";
                                while ($valores = mysqli_fetch_assoc($executar19)){
                                  echo "<option value='".$valores['dis_id']."'>".$valores['dis_nome']."</option>";
                                };
                                echo "</select></td></tr>";
                                echo "<tr>
                                      <td>
                                        <select name='escola5'style='width: 100%;text-align-last: center;border: 1px solid white;'>
                                          <option value='0'>Selecione...</option>";
                                while ($valores = mysqli_fetch_assoc($executar5)){
                                  echo "<option value='".$valores['esc_id']."'>".$valores['esc_nome']."</option>";
                                };
                                echo "</select></td><td><input type='text' name='linha5' style='border: 1px solid white;'/></td>
                                      <td>
                                        <select name='disciplina5'style='width: 100%;text-align-last: center;border: 1px solid white;'>
                                          <option value='0'>Selecione...</option>";
                                while ($valores = mysqli_fetch_assoc($executar20)){
                                  echo "<option value='".$valores['dis_id']."'>".$valores['dis_nome']."</option>";
                                };
                                echo "</select></td></tr>";
                                echo "<tr>
                                      <td>
                                        <select name='escola6'style='width: 100%;text-align-last: center;border: 1px solid white;'>
                                          <option value='0'>Selecione...</option>";
                                while ($valores = mysqli_fetch_assoc($executar6)){
                                  echo "<option value='".$valores['esc_id']."'>".$valores['esc_nome']."</option>";
                                };
                                echo "</select></td><td><input type='text' name='linha6' style='border: 1px solid white;'/></td>
                                      <td>
                                        <select name='disciplina6'style='width: 100%;text-align-last: center;border: 1px solid white;'>
                                          <option value='0'>Selecione...</option>";
                                while ($valores = mysqli_fetch_assoc($executar21)){
                                  echo "<option value='".$valores['dis_id']."'>".$valores['dis_nome']."</option>";
                                };
                                echo "</select></td></tr>";
                                echo "<tr>
                                      <td>
                                        <select name='escola7'style='width: 100%;text-align-last: center;border: 1px solid white;'>
                                          <option value='0'>Selecione...</option>";
                                while ($valores = mysqli_fetch_assoc($executar7)){
                                  echo "<option value='".$valores['esc_id']."'>".$valores['esc_nome']."</option>";
                                };
                                echo "</select></td><td><input type='text' name='linha7' style='border: 1px solid white;'/></td>
                                      <td>
                                        <select name='disciplina7'style='width: 100%;text-align-last: center;border: 1px solid white;'>
                                          <option value='0'>Selecione...</option>";
                                while ($valores = mysqli_fetch_assoc($executar22)){
                                  echo "<option value='".$valores['dis_id']."'>".$valores['dis_nome']."</option>";
                                };
                                echo "</select></td></tr>";
                                break;
                            case 8:
                                echo "<tr>
                                      <td>
                                        <select name='escola1'style='width: 100%;text-align-last: center;border: 1px solid white;'>
                                          <option value='0'>Selecione...</option>";
                                while ($valores = mysqli_fetch_assoc($executar)){
                                  echo "<option value='".$valores['esc_id']."'>".$valores['esc_nome']."</option>";
                                };
                                echo "</select></td><td><input type='text' name='linha1' style='border: 1px solid white;'/></td>
                                      <td>
                                        <select name='disciplina1'style='width: 100%;text-align-last: center;border: 1px solid white;'>
                                          <option value='0'>Selecione...</option>";
                                while ($valores = mysqli_fetch_assoc($executar16)){
                                  echo "<option value='".$valores['dis_id']."'>".$valores['dis_nome']."</option>";
                                };
                                echo "</select></td></tr>";
                                echo "<tr>
                                      <td>
                                        <select name='escola2'style='width: 100%;text-align-last: center;border: 1px solid white;'>
                                          <option value='0'>Selecione...</option>";
                                while ($valore = mysqli_fetch_assoc($executar2)){
                                  echo "<option value='".$valore['esc_id']."'>".$valore['esc_nome']."</option>";
                                };
                                echo "</select></td><td><input type='text' name='linha2' style='border: 1px solid white;'/></td>
                                      <td>
                                        <select name='disciplina2'style='width: 100%;text-align-last: center;border: 1px solid white;'>
                                          <option value='0'>Selecione...</option>";
                                while ($valores = mysqli_fetch_assoc($executar17)){
                                  echo "<option value='".$valores['dis_id']."'>".$valores['dis_nome']."</option>";
                                };
                                echo "</select></td>";
                                echo "<tr>
                                      <td>
                                        <select name='escola3'style='width: 100%;text-align-last: center;border: 1px solid white;'>
                                          <option value='0'>Selecione...</option>";
                                while ($valore = mysqli_fetch_assoc($executar3)){
                                  echo "<option value='".$valore['esc_id']."'>".$valore['esc_nome']."</option>";
                                };
                                echo "</select></td><td><input type='text' name='linha3' style='border: 1px solid white;'/></td>
                                      <td>
                                        <select name='disciplina3'style='width: 100%;text-align-last: center;border: 1px solid white;'>
                                          <option value='0'>Selecione...</option>";
                                while ($valores = mysqli_fetch_assoc($executar18)){
                                  echo "<option value='".$valores['dis_id']."'>".$valores['dis_nome']."</option>";
                                };
                                echo "</select></td></tr>";
                                echo "<tr>
                                      <td>
                                        <select name='escola4'style='width: 100%;text-align-last: center;border: 1px solid white;'>
                                          <option value='0'>Selecione...</option>";
                                while ($valores = mysqli_fetch_assoc($executar4)){
                                  echo "<option value='".$valores['esc_id']."'>".$valores['esc_nome']."</option>";
                                };
                                echo "</select></td><td><input type='text' name='linha4' style='border: 1px solid white;'/></td>
                                      <td>
                                        <select name='disciplina4'style='width: 100%;text-align-last: center;border: 1px solid white;'>
                                          <option value='0'>Selecione...</option>";
                                while ($valores = mysqli_fetch_assoc($executar19)){
                                  echo "<option value='".$valores['dis_id']."'>".$valores['dis_nome']."</option>";
                                };
                                echo "</select></td></tr>";
                                echo "<tr>
                                      <td>
                                        <select name='escola5'style='width: 100%;text-align-last: center;border: 1px solid white;'>
                                          <option value='0'>Selecione...</option>";
                                while ($valores = mysqli_fetch_assoc($executar5)){
                                  echo "<option value='".$valores['esc_id']."'>".$valores['esc_nome']."</option>";
                                };
                                echo "</select></td><td><input type='text' name='linha5' style='border: 1px solid white;'/></td>
                                      <td>
                                        <select name='disciplina5'style='width: 100%;text-align-last: center;border: 1px solid white;'>
                                          <option value='0'>Selecione...</option>";
                                while ($valores = mysqli_fetch_assoc($executar20)){
                                  echo "<option value='".$valores['dis_id']."'>".$valores['dis_nome']."</option>";
                                };
                                echo "</select></td></tr>";
                                echo "<tr>
                                      <td>
                                        <select name='escola6'style='width: 100%;text-align-last: center;border: 1px solid white;'>
                                          <option value='0'>Selecione...</option>";
                                while ($valores = mysqli_fetch_assoc($executar6)){
                                  echo "<option value='".$valores['esc_id']."'>".$valores['esc_nome']."</option>";
                                };
                                echo "</select></td><td><input type='text' name='linha6' style='border: 1px solid white;'/></td>
                                      <td>
                                        <select name='disciplina6'style='width: 100%;text-align-last: center;border: 1px solid white;'>
                                          <option value='0'>Selecione...</option>";
                                while ($valores = mysqli_fetch_assoc($executar21)){
                                  echo "<option value='".$valores['dis_id']."'>".$valores['dis_nome']."</option>";
                                };
                                echo "</select></td></tr>";
                                echo "<tr>
                                      <td>
                                        <select name='escola7'style='width: 100%;text-align-last: center;border: 1px solid white;'>
                                          <option value='0'>Selecione...</option>";
                                while ($valores = mysqli_fetch_assoc($executar7)){
                                  echo "<option value='".$valores['esc_id']."'>".$valores['esc_nome']."</option>";
                                };
                                echo "</select></td><td><input type='text' name='linha7' style='border: 1px solid white;'/></td>
                                      <td>
                                        <select name='disciplina7'style='width: 100%;text-align-last: center;border: 1px solid white;'>
                                          <option value='0'>Selecione...</option>";
                                while ($valores = mysqli_fetch_assoc($executar22)){
                                  echo "<option value='".$valores['dis_id']."'>".$valores['dis_nome']."</option>";
                                };
                                echo "</select></td></tr>";
                                echo "<tr>
                                      <td>
                                        <select name='escola8'style='width: 100%;text-align-last: center;border: 1px solid white;'>
                                          <option value='0'>Selecione...</option>";
                                while ($valores = mysqli_fetch_assoc($executar8)){
                                  echo "<option value='".$valores['esc_id']."'>".$valores['esc_nome']."</option>";
                                };
                                echo "</select></td><td><input type='text' name='linha8' style='border: 1px solid white;'/></td>
                                      <td>
                                        <select name='disciplina8'style='width: 100%;text-align-last: center;border: 1px solid white;'>
                                          <option value='0'>Selecione...</option>";
                                while ($valores = mysqli_fetch_assoc($executar23)){
                                  echo "<option value='".$valores['dis_id']."'>".$valores['dis_nome']."</option>";
                                };
                                echo "</select></td></tr>";
                                break;
                            case 9:
                                echo "<tr>
                                      <td>
                                        <select name='escola1'style='width: 100%;text-align-last: center;border: 1px solid white;'>
                                          <option value='0'>Selecione...</option>";
                                while ($valores = mysqli_fetch_assoc($executar)){
                                  echo "<option value='".$valores['esc_id']."'>".$valores['esc_nome']."</option>";
                                };
                                echo "</select></td><td><input type='text' name='linha1' style='border: 1px solid white;'/></td>
                                      <td>
                                        <select name='disciplina1'style='width: 100%;text-align-last: center;border: 1px solid white;'>
                                          <option value='0'>Selecione...</option>";
                                while ($valores = mysqli_fetch_assoc($executar16)){
                                  echo "<option value='".$valores['dis_id']."'>".$valores['dis_nome']."</option>";
                                };
                                echo "</select></td></tr>";
                                echo "<tr>
                                      <td>
                                        <select name='escola2'style='width: 100%;text-align-last: center;border: 1px solid white;'>
                                          <option value='0'>Selecione...</option>";
                                while ($valore = mysqli_fetch_assoc($executar2)){
                                  echo "<option value='".$valore['esc_id']."'>".$valore['esc_nome']."</option>";
                                };
                                echo "</select></td><td><input type='text' name='linha2' style='border: 1px solid white;'/></td>
                                      <td>
                                        <select name='disciplina2'style='width: 100%;text-align-last: center;border: 1px solid white;'>
                                          <option value='0'>Selecione...</option>";
                                while ($valores = mysqli_fetch_assoc($executar17)){
                                  echo "<option value='".$valores['dis_id']."'>".$valores['dis_nome']."</option>";
                                };
                                echo "</select></td>";
                                echo "<tr>
                                      <td>
                                        <select name='escola3'style='width: 100%;text-align-last: center;border: 1px solid white;'>
                                          <option value='0'>Selecione...</option>";
                                while ($valore = mysqli_fetch_assoc($executar3)){
                                  echo "<option value='".$valore['esc_id']."'>".$valore['esc_nome']."</option>";
                                };
                                echo "</select></td><td><input type='text' name='linha3' style='border: 1px solid white;'/></td>
                                      <td>
                                        <select name='disciplina3'style='width: 100%;text-align-last: center;border: 1px solid white;'>
                                          <option value='0'>Selecione...</option>";
                                while ($valores = mysqli_fetch_assoc($executar18)){
                                  echo "<option value='".$valores['dis_id']."'>".$valores['dis_nome']."</option>";
                                };
                                echo "</select></td></tr>";
                                echo "<tr>
                                      <td>
                                        <select name='escola4'style='width: 100%;text-align-last: center;border: 1px solid white;'>
                                          <option value='0'>Selecione...</option>";
                                while ($valores = mysqli_fetch_assoc($executar4)){
                                  echo "<option value='".$valores['esc_id']."'>".$valores['esc_nome']."</option>";
                                };
                                echo "</select></td><td><input type='text' name='linha4' style='border: 1px solid white;'/></td>
                                      <td>
                                        <select name='disciplina4'style='width: 100%;text-align-last: center;border: 1px solid white;'>
                                          <option value='0'>Selecione...</option>";
                                while ($valores = mysqli_fetch_assoc($executar19)){
                                  echo "<option value='".$valores['dis_id']."'>".$valores['dis_nome']."</option>";
                                };
                                echo "</select></td></tr>";
                                echo "<tr>
                                      <td>
                                        <select name='escola5'style='width: 100%;text-align-last: center;border: 1px solid white;'>
                                          <option value='0'>Selecione...</option>";
                                while ($valores = mysqli_fetch_assoc($executar5)){
                                  echo "<option value='".$valores['esc_id']."'>".$valores['esc_nome']."</option>";
                                };
                                echo "</select></td><td><input type='text' name='linha5' style='border: 1px solid white;'/></td>
                                      <td>
                                        <select name='disciplina5'style='width: 100%;text-align-last: center;border: 1px solid white;'>
                                          <option value='0'>Selecione...</option>";
                                while ($valores = mysqli_fetch_assoc($executar20)){
                                  echo "<option value='".$valores['dis_id']."'>".$valores['dis_nome']."</option>";
                                };
                                echo "</select></td></tr>";
                                echo "<tr>
                                      <td>
                                        <select name='escola6'style='width: 100%;text-align-last: center;border: 1px solid white;'>
                                          <option value='0'>Selecione...</option>";
                                while ($valores = mysqli_fetch_assoc($executar6)){
                                  echo "<option value='".$valores['esc_id']."'>".$valores['esc_nome']."</option>";
                                };
                                echo "</select></td><td><input type='text' name='linha6' style='border: 1px solid white;'/></td>
                                      <td>
                                        <select name='disciplina6'style='width: 100%;text-align-last: center;border: 1px solid white;'>
                                          <option value='0'>Selecione...</option>";
                                while ($valores = mysqli_fetch_assoc($executar21)){
                                  echo "<option value='".$valores['dis_id']."'>".$valores['dis_nome']."</option>";
                                };
                                echo "</select></td></tr>";
                                echo "<tr>
                                      <td>
                                        <select name='escola7'style='width: 100%;text-align-last: center;border: 1px solid white;'>
                                          <option value='0'>Selecione...</option>";
                                while ($valores = mysqli_fetch_assoc($executar7)){
                                  echo "<option value='".$valores['esc_id']."'>".$valores['esc_nome']."</option>";
                                };
                                echo "</select></td><td><input type='text' name='linha7' style='border: 1px solid white;'/></td>
                                      <td>
                                        <select name='disciplina7'style='width: 100%;text-align-last: center;border: 1px solid white;'>
                                          <option value='0'>Selecione...</option>";
                                while ($valores = mysqli_fetch_assoc($executar22)){
                                  echo "<option value='".$valores['dis_id']."'>".$valores['dis_nome']."</option>";
                                };
                                echo "</select></td></tr>";
                                echo "<tr>
                                      <td>
                                        <select name='escola8'style='width: 100%;text-align-last: center;border: 1px solid white;'>
                                          <option value='0'>Selecione...</option>";
                                while ($valores = mysqli_fetch_assoc($executar8)){
                                  echo "<option value='".$valores['esc_id']."'>".$valores['esc_nome']."</option>";
                                };
                                echo "</select></td><td><input type='text' name='linha8' style='border: 1px solid white;'/></td>
                                      <td>
                                        <select name='disciplina8'style='width: 100%;text-align-last: center;border: 1px solid white;'>
                                          <option value='0'>Selecione...</option>";
                                while ($valores = mysqli_fetch_assoc($executar23)){
                                  echo "<option value='".$valores['dis_id']."'>".$valores['dis_nome']."</option>";
                                };
                                echo "</select></td></tr>";
                                echo "<tr>
                                      <td>
                                        <select name='escola9'style='width: 100%;text-align-last: center;border: 1px solid white;'>
                                          <option value='0'>Selecione...</option>";
                                while ($valores = mysqli_fetch_assoc($executar9)){
                                  echo "<option value='".$valores['esc_id']."'>".$valores['esc_nome']."</option>";
                                };
                                echo "</select></td><td><input type='text' name='linha9' style='border: 1px solid white;'/></td>
                                      <td>
                                        <select name='disciplina9'style='width: 100%;text-align-last: center;border: 1px solid white;'>
                                          <option value='0'>Selecione...</option>";
                                while ($valores = mysqli_fetch_assoc($executar24)){
                                  echo "<option value='".$valores['dis_id']."'>".$valores['dis_nome']."</option>";
                                };
                                echo "</select></td></tr>";
                                break;
                            case 10:
                                echo "<tr>
                                      <td>
                                        <select name='escola1'style='width: 100%;text-align-last: center;border: 1px solid white;'>
                                          <option value='0'>Selecione...</option>";
                                while ($valores = mysqli_fetch_assoc($executar)){
                                  echo "<option value='".$valores['esc_id']."'>".$valores['esc_nome']."</option>";
                                };
                                echo "</select></td><td><input type='text' name='linha1' style='border: 1px solid white;'/></td>
                                      <td>
                                        <select name='disciplina1'style='width: 100%;text-align-last: center;border: 1px solid white;'>
                                          <option value='0'>Selecione...</option>";
                                while ($valores = mysqli_fetch_assoc($executar16)){
                                  echo "<option value='".$valores['dis_id']."'>".$valores['dis_nome']."</option>";
                                };
                                echo "</select></td></tr>";
                                echo "<tr>
                                      <td>
                                        <select name='escola2'style='width: 100%;text-align-last: center;border: 1px solid white;'>
                                          <option value='0'>Selecione...</option>";
                                while ($valore = mysqli_fetch_assoc($executar2)){
                                  echo "<option value='".$valore['esc_id']."'>".$valore['esc_nome']."</option>";
                                };
                                echo "</select></td><td><input type='text' name='linha2' style='border: 1px solid white;'/></td>
                                      <td>
                                        <select name='disciplina2'style='width: 100%;text-align-last: center;border: 1px solid white;'>
                                          <option value='0'>Selecione...</option>";
                                while ($valores = mysqli_fetch_assoc($executar17)){
                                  echo "<option value='".$valores['dis_id']."'>".$valores['dis_nome']."</option>";
                                };
                                echo "</select></td>";
                                echo "<tr>
                                      <td>
                                        <select name='escola3'style='width: 100%;text-align-last: center;border: 1px solid white;'>
                                          <option value='0'>Selecione...</option>";
                                while ($valore = mysqli_fetch_assoc($executar3)){
                                  echo "<option value='".$valore['esc_id']."'>".$valore['esc_nome']."</option>";
                                };
                                echo "</select></td><td><input type='text' name='linha3' style='border: 1px solid white;'/></td>
                                      <td>
                                        <select name='disciplina3'style='width: 100%;text-align-last: center;border: 1px solid white;'>
                                          <option value='0'>Selecione...</option>";
                                while ($valores = mysqli_fetch_assoc($executar18)){
                                  echo "<option value='".$valores['dis_id']."'>".$valores['dis_nome']."</option>";
                                };
                                echo "</select></td></tr>";
                                echo "<tr>
                                      <td>
                                        <select name='escola4'style='width: 100%;text-align-last: center;border: 1px solid white;'>
                                          <option value='0'>Selecione...</option>";
                                while ($valores = mysqli_fetch_assoc($executar4)){
                                  echo "<option value='".$valores['esc_id']."'>".$valores['esc_nome']."</option>";
                                };
                                echo "</select></td><td><input type='text' name='linha4' style='border: 1px solid white;'/></td>
                                      <td>
                                        <select name='disciplina4'style='width: 100%;text-align-last: center;border: 1px solid white;'>
                                          <option value='0'>Selecione...</option>";
                                while ($valores = mysqli_fetch_assoc($executar19)){
                                  echo "<option value='".$valores['dis_id']."'>".$valores['dis_nome']."</option>";
                                };
                                echo "</select></td></tr>";
                                echo "<tr>
                                      <td>
                                        <select name='escola5'style='width: 100%;text-align-last: center;border: 1px solid white;'>
                                          <option value='0'>Selecione...</option>";
                                while ($valores = mysqli_fetch_assoc($executar5)){
                                  echo "<option value='".$valores['esc_id']."'>".$valores['esc_nome']."</option>";
                                };
                                echo "</select></td><td><input type='text' name='linha5' style='border: 1px solid white;'/></td>
                                      <td>
                                        <select name='disciplina5'style='width: 100%;text-align-last: center;border: 1px solid white;'>
                                          <option value='0'>Selecione...</option>";
                                while ($valores = mysqli_fetch_assoc($executar20)){
                                  echo "<option value='".$valores['dis_id']."'>".$valores['dis_nome']."</option>";
                                };
                                echo "</select></td></tr>";
                                echo "<tr>
                                      <td>
                                        <select name='escola6'style='width: 100%;text-align-last: center;border: 1px solid white;'>
                                          <option value='0'>Selecione...</option>";
                                while ($valores = mysqli_fetch_assoc($executar6)){
                                  echo "<option value='".$valores['esc_id']."'>".$valores['esc_nome']."</option>";
                                };
                                echo "</select></td><td><input type='text' name='linha6' style='border: 1px solid white;'/></td>
                                      <td>
                                        <select name='disciplina6'style='width: 100%;text-align-last: center;border: 1px solid white;'>
                                          <option value='0'>Selecione...</option>";
                                while ($valores = mysqli_fetch_assoc($executar21)){
                                  echo "<option value='".$valores['dis_id']."'>".$valores['dis_nome']."</option>";
                                };
                                echo "</select></td></tr>";
                                echo "<tr>
                                      <td>
                                        <select name='escola7'style='width: 100%;text-align-last: center;border: 1px solid white;'>
                                          <option value='0'>Selecione...</option>";
                                while ($valores = mysqli_fetch_assoc($executar7)){
                                  echo "<option value='".$valores['esc_id']."'>".$valores['esc_nome']."</option>";
                                };
                                echo "</select></td><td><input type='text' name='linha7' style='border: 1px solid white;'/></td>
                                      <td>
                                        <select name='disciplina7'style='width: 100%;text-align-last: center;border: 1px solid white;'>
                                          <option value='0'>Selecione...</option>";
                                while ($valores = mysqli_fetch_assoc($executar22)){
                                  echo "<option value='".$valores['dis_id']."'>".$valores['dis_nome']."</option>";
                                };
                                echo "</select></td></tr>";
                                echo "<tr>
                                      <td>
                                        <select name='escola8'style='width: 100%;text-align-last: center;border: 1px solid white;'>
                                          <option value='0'>Selecione...</option>";
                                while ($valores = mysqli_fetch_assoc($executar8)){
                                  echo "<option value='".$valores['esc_id']."'>".$valores['esc_nome']."</option>";
                                };
                                echo "</select></td><td><input type='text' name='linha8' style='border: 1px solid white;'/></td>
                                      <td>
                                        <select name='disciplina8'style='width: 100%;text-align-last: center;border: 1px solid white;'>
                                          <option value='0'>Selecione...</option>";
                                while ($valores = mysqli_fetch_assoc($executar23)){
                                  echo "<option value='".$valores['dis_id']."'>".$valores['dis_nome']."</option>";
                                };
                                echo "</select></td></tr>";
                                echo "<tr>
                                      <td>
                                        <select name='escola9'style='width: 100%;text-align-last: center;border: 1px solid white;'>
                                          <option value='0'>Selecione...</option>";
                                while ($valores = mysqli_fetch_assoc($executar9)){
                                  echo "<option value='".$valores['esc_id']."'>".$valores['esc_nome']."</option>";
                                };
                                echo "</select></td><td><input type='text' name='linha9' style='border: 1px solid white;'/></td>
                                      <td>
                                        <select name='disciplina9'style='width: 100%;text-align-last: center;border: 1px solid white;'>
                                          <option value='0'>Selecione...</option>";
                                while ($valores = mysqli_fetch_assoc($executar24)){
                                  echo "<option value='".$valores['dis_id']."'>".$valores['dis_nome']."</option>";
                                };
                                echo "</select></td></tr>";
                                echo "<tr>
                                      <td>
                                        <select name='escola10'style='width: 100%;text-align-last: center;border: 1px solid white;'>
                                          <option value='0'>Selecione...</option>";
                                while ($valores = mysqli_fetch_assoc($executar10)){
                                  echo "<option value='".$valores['esc_id']."'>".$valores['esc_nome']."</option>";
                                };
                                echo "</select></td><td><input type='text' name='linha10' style='border: 1px solid white;'/></td>
                                      <td>
                                        <select name='disciplina10'style='width: 100%;text-align-last: center;border: 1px solid white;'>
                                          <option value='0'>Selecione...</option>";
                                while ($valores = mysqli_fetch_assoc($executar25)){
                                  echo "<option value='".$valores['dis_id']."'>".$valores['dis_nome']."</option>";
                                };
                                echo "</select></td></tr>";
                                break;
                            case 11:
                                echo "<tr>
                                      <td>
                                        <select name='escola1'style='width: 100%;text-align-last: center;border: 1px solid white;'>
                                          <option value='0'>Selecione...</option>";
                                while ($valores = mysqli_fetch_assoc($executar)){
                                  echo "<option value='".$valores['esc_id']."'>".$valores['esc_nome']."</option>";
                                };
                                echo "</select></td><td><input type='text' name='linha1' style='border: 1px solid white;'/></td>
                                      <td>
                                        <select name='disciplina1'style='width: 100%;text-align-last: center;border: 1px solid white;'>
                                          <option value='0'>Selecione...</option>";
                                while ($valores = mysqli_fetch_assoc($executar16)){
                                  echo "<option value='".$valores['dis_id']."'>".$valores['dis_nome']."</option>";
                                };
                                echo "</select></td></tr>";
                                echo "<tr>
                                      <td>
                                        <select name='escola2'style='width: 100%;text-align-last: center;border: 1px solid white;'>
                                          <option value='0'>Selecione...</option>";
                                while ($valore = mysqli_fetch_assoc($executar2)){
                                  echo "<option value='".$valore['esc_id']."'>".$valore['esc_nome']."</option>";
                                };
                                echo "</select></td><td><input type='text' name='linha2' style='border: 1px solid white;'/></td>
                                      <td>
                                        <select name='disciplina2'style='width: 100%;text-align-last: center;border: 1px solid white;'>
                                          <option value='0'>Selecione...</option>";
                                while ($valores = mysqli_fetch_assoc($executar17)){
                                  echo "<option value='".$valores['dis_id']."'>".$valores['dis_nome']."</option>";
                                };
                                echo "</select></td>";
                                echo "<tr>
                                      <td>
                                        <select name='escola3'style='width: 100%;text-align-last: center;border: 1px solid white;'>
                                          <option value='0'>Selecione...</option>";
                                while ($valore = mysqli_fetch_assoc($executar3)){
                                  echo "<option value='".$valore['esc_id']."'>".$valore['esc_nome']."</option>";
                                };
                                echo "</select></td><td><input type='text' name='linha3' style='border: 1px solid white;'/></td>
                                      <td>
                                        <select name='disciplina3'style='width: 100%;text-align-last: center;border: 1px solid white;'>
                                          <option value='0'>Selecione...</option>";
                                while ($valores = mysqli_fetch_assoc($executar18)){
                                  echo "<option value='".$valores['dis_id']."'>".$valores['dis_nome']."</option>";
                                };
                                echo "</select></td></tr>";
                                echo "<tr>
                                      <td>
                                        <select name='escola4'style='width: 100%;text-align-last: center;border: 1px solid white;'>
                                          <option value='0'>Selecione...</option>";
                                while ($valores = mysqli_fetch_assoc($executar4)){
                                  echo "<option value='".$valores['esc_id']."'>".$valores['esc_nome']."</option>";
                                };
                                echo "</select></td><td><input type='text' name='linha4' style='border: 1px solid white;'/></td>
                                      <td>
                                        <select name='disciplina4'style='width: 100%;text-align-last: center;border: 1px solid white;'>
                                          <option value='0'>Selecione...</option>";
                                while ($valores = mysqli_fetch_assoc($executar19)){
                                  echo "<option value='".$valores['dis_id']."'>".$valores['dis_nome']."</option>";
                                };
                                echo "</select></td></tr>";
                                echo "<tr>
                                      <td>
                                        <select name='escola5'style='width: 100%;text-align-last: center;border: 1px solid white;'>
                                          <option value='0'>Selecione...</option>";
                                while ($valores = mysqli_fetch_assoc($executar5)){
                                  echo "<option value='".$valores['esc_id']."'>".$valores['esc_nome']."</option>";
                                };
                                echo "</select></td><td><input type='text' name='linha5' style='border: 1px solid white;'/></td>
                                      <td>
                                        <select name='disciplina5'style='width: 100%;text-align-last: center;border: 1px solid white;'>
                                          <option value='0'>Selecione...</option>";
                                while ($valores = mysqli_fetch_assoc($executar20)){
                                  echo "<option value='".$valores['dis_id']."'>".$valores['dis_nome']."</option>";
                                };
                                echo "</select></td></tr>";
                                echo "<tr>
                                      <td>
                                        <select name='escola6'style='width: 100%;text-align-last: center;border: 1px solid white;'>
                                          <option value='0'>Selecione...</option>";
                                while ($valores = mysqli_fetch_assoc($executar6)){
                                  echo "<option value='".$valores['esc_id']."'>".$valores['esc_nome']."</option>";
                                };
                                echo "</select></td><td><input type='text' name='linha6' style='border: 1px solid white;'/></td>
                                      <td>
                                        <select name='disciplina6'style='width: 100%;text-align-last: center;border: 1px solid white;'>
                                          <option value='0'>Selecione...</option>";
                                while ($valores = mysqli_fetch_assoc($executar21)){
                                  echo "<option value='".$valores['dis_id']."'>".$valores['dis_nome']."</option>";
                                };
                                echo "</select></td></tr>";
                                echo "<tr>
                                      <td>
                                        <select name='escola7'style='width: 100%;text-align-last: center;border: 1px solid white;'>
                                          <option value='0'>Selecione...</option>";
                                while ($valores = mysqli_fetch_assoc($executar7)){
                                  echo "<option value='".$valores['esc_id']."'>".$valores['esc_nome']."</option>";
                                };
                                echo "</select></td><td><input type='text' name='linha7' style='border: 1px solid white;'/></td>
                                      <td>
                                        <select name='disciplina7'style='width: 100%;text-align-last: center;border: 1px solid white;'>
                                          <option value='0'>Selecione...</option>";
                                while ($valores = mysqli_fetch_assoc($executar22)){
                                  echo "<option value='".$valores['dis_id']."'>".$valores['dis_nome']."</option>";
                                };
                                echo "</select></td></tr>";
                                echo "<tr>
                                      <td>
                                        <select name='escola8'style='width: 100%;text-align-last: center;border: 1px solid white;'>
                                          <option value='0'>Selecione...</option>";
                                while ($valores = mysqli_fetch_assoc($executar8)){
                                  echo "<option value='".$valores['esc_id']."'>".$valores['esc_nome']."</option>";
                                };
                                echo "</select></td><td><input type='text' name='linha8' style='border: 1px solid white;'/></td>
                                      <td>
                                        <select name='disciplina8'style='width: 100%;text-align-last: center;border: 1px solid white;'>
                                          <option value='0'>Selecione...</option>";
                                while ($valores = mysqli_fetch_assoc($executar23)){
                                  echo "<option value='".$valores['dis_id']."'>".$valores['dis_nome']."</option>";
                                };
                                echo "</select></td></tr>";
                                echo "<tr>
                                      <td>
                                        <select name='escola9'style='width: 100%;text-align-last: center;border: 1px solid white;'>
                                          <option value='0'>Selecione...</option>";
                                while ($valores = mysqli_fetch_assoc($executar9)){
                                  echo "<option value='".$valores['esc_id']."'>".$valores['esc_nome']."</option>";
                                };
                                echo "</select></td><td><input type='text' name='linha9' style='border: 1px solid white;'/></td>
                                      <td>
                                        <select name='disciplina9'style='width: 100%;text-align-last: center;border: 1px solid white;'>
                                          <option value='0'>Selecione...</option>";
                                while ($valores = mysqli_fetch_assoc($executar24)){
                                  echo "<option value='".$valores['dis_id']."'>".$valores['dis_nome']."</option>";
                                };
                                echo "</select></td></tr>";
                                echo "<tr>
                                      <td>
                                        <select name='escola10'style='width: 100%;text-align-last: center;border: 1px solid white;'>
                                          <option value='0'>Selecione...</option>";
                                while ($valores = mysqli_fetch_assoc($executar10)){
                                  echo "<option value='".$valores['esc_id']."'>".$valores['esc_nome']."</option>";
                                };
                                echo "</select></td><td><input type='text' name='linha10' style='border: 1px solid white;'/></td>
                                      <td>
                                        <select name='disciplina10'style='width: 100%;text-align-last: center;border: 1px solid white;'>
                                          <option value='0'>Selecione...</option>";
                                while ($valores = mysqli_fetch_assoc($executar25)){
                                  echo "<option value='".$valores['dis_id']."'>".$valores['dis_nome']."</option>";
                                };
                                echo "</select></td></tr>";
                                echo "<tr>
                                      <td>
                                        <select name='escola11'style='width: 100%;text-align-last: center;border: 1px solid white;'>
                                          <option value='0'>Selecione...</option>";
                                while ($valores = mysqli_fetch_assoc($executar11)){
                                  echo "<option value='".$valores['esc_id']."'>".$valores['esc_nome']."</option>";
                                };
                                echo "</select></td><td><input type='text' name='linha11' style='border: 1px solid white;'/></td>
                                      <td>
                                        <select name='disciplina11'style='width: 100%;text-align-last: center;border: 1px solid white;'>
                                          <option value='0'>Selecione...</option>";
                                while ($valores = mysqli_fetch_assoc($executar26)){
                                  echo "<option value='".$valores['dis_id']."'>".$valores['dis_nome']."</option>";
                                };
                                echo "</select></td></tr>";
                                break;
                            case 12:
                                echo "<tr>
                                      <td>
                                        <select name='escola1'style='width: 100%;text-align-last: center;border: 1px solid white;'>
                                          <option value='0'>Selecione...</option>";
                                while ($valores = mysqli_fetch_assoc($executar)){
                                  echo "<option value='".$valores['esc_id']."'>".$valores['esc_nome']."</option>";
                                };
                                echo "</select></td><td><input type='text' name='linha1' style='border: 1px solid white;'/></td>
                                      <td>
                                        <select name='disciplina1'style='width: 100%;text-align-last: center;border: 1px solid white;'>
                                          <option value='0'>Selecione...</option>";
                                while ($valores = mysqli_fetch_assoc($executar16)){
                                  echo "<option value='".$valores['dis_id']."'>".$valores['dis_nome']."</option>";
                                };
                                echo "</select></td></tr>";
                                echo "<tr>
                                      <td>
                                        <select name='escola2'style='width: 100%;text-align-last: center;border: 1px solid white;'>
                                          <option value='0'>Selecione...</option>";
                                while ($valore = mysqli_fetch_assoc($executar2)){
                                  echo "<option value='".$valore['esc_id']."'>".$valore['esc_nome']."</option>";
                                };
                                echo "</select></td><td><input type='text' name='linha2' style='border: 1px solid white;'/></td>
                                      <td>
                                        <select name='disciplina2'style='width: 100%;text-align-last: center;border: 1px solid white;'>
                                          <option value='0'>Selecione...</option>";
                                while ($valores = mysqli_fetch_assoc($executar17)){
                                  echo "<option value='".$valores['dis_id']."'>".$valores['dis_nome']."</option>";
                                };
                                echo "</select></td>";
                                echo "<tr>
                                      <td>
                                        <select name='escola3'style='width: 100%;text-align-last: center;border: 1px solid white;'>
                                          <option value='0'>Selecione...</option>";
                                while ($valore = mysqli_fetch_assoc($executar3)){
                                  echo "<option value='".$valore['esc_id']."'>".$valore['esc_nome']."</option>";
                                };
                                echo "</select></td><td><input type='text' name='linha3' style='border: 1px solid white;'/></td>
                                      <td>
                                        <select name='disciplina3'style='width: 100%;text-align-last: center;border: 1px solid white;'>
                                          <option value='0'>Selecione...</option>";
                                while ($valores = mysqli_fetch_assoc($executar18)){
                                  echo "<option value='".$valores['dis_id']."'>".$valores['dis_nome']."</option>";
                                };
                                echo "</select></td></tr>";
                                echo "<tr>
                                      <td>
                                        <select name='escola4'style='width: 100%;text-align-last: center;border: 1px solid white;'>
                                          <option value='0'>Selecione...</option>";
                                while ($valores = mysqli_fetch_assoc($executar4)){
                                  echo "<option value='".$valores['esc_id']."'>".$valores['esc_nome']."</option>";
                                };
                                echo "</select></td><td><input type='text' name='linha4' style='border: 1px solid white;'/></td>
                                      <td>
                                        <select name='disciplina4'style='width: 100%;text-align-last: center;border: 1px solid white;'>
                                          <option value='0'>Selecione...</option>";
                                while ($valores = mysqli_fetch_assoc($executar19)){
                                  echo "<option value='".$valores['dis_id']."'>".$valores['dis_nome']."</option>";
                                };
                                echo "</select></td></tr>";
                                echo "<tr>
                                      <td>
                                        <select name='escola5'style='width: 100%;text-align-last: center;border: 1px solid white;'>
                                          <option value='0'>Selecione...</option>";
                                while ($valores = mysqli_fetch_assoc($executar5)){
                                  echo "<option value='".$valores['esc_id']."'>".$valores['esc_nome']."</option>";
                                };
                                echo "</select></td><td><input type='text' name='linha5' style='border: 1px solid white;'/></td>
                                      <td>
                                        <select name='disciplina5'style='width: 100%;text-align-last: center;border: 1px solid white;'>
                                          <option value='0'>Selecione...</option>";
                                while ($valores = mysqli_fetch_assoc($executar20)){
                                  echo "<option value='".$valores['dis_id']."'>".$valores['dis_nome']."</option>";
                                };
                                echo "</select></td></tr>";
                                echo "<tr>
                                      <td>
                                        <select name='escola6'style='width: 100%;text-align-last: center;border: 1px solid white;'>
                                          <option value='0'>Selecione...</option>";
                                while ($valores = mysqli_fetch_assoc($executar6)){
                                  echo "<option value='".$valores['esc_id']."'>".$valores['esc_nome']."</option>";
                                };
                                echo "</select></td><td><input type='text' name='linha6' style='border: 1px solid white;'/></td>
                                      <td>
                                        <select name='disciplina6'style='width: 100%;text-align-last: center;border: 1px solid white;'>
                                          <option value='0'>Selecione...</option>";
                                while ($valores = mysqli_fetch_assoc($executar21)){
                                  echo "<option value='".$valores['dis_id']."'>".$valores['dis_nome']."</option>";
                                };
                                echo "</select></td></tr>";
                                echo "<tr>
                                      <td>
                                        <select name='escola7'style='width: 100%;text-align-last: center;border: 1px solid white;'>
                                          <option value='0'>Selecione...</option>";
                                while ($valores = mysqli_fetch_assoc($executar7)){
                                  echo "<option value='".$valores['esc_id']."'>".$valores['esc_nome']."</option>";
                                };
                                echo "</select></td><td><input type='text' name='linha7' style='border: 1px solid white;'/></td>
                                      <td>
                                        <select name='disciplina7'style='width: 100%;text-align-last: center;border: 1px solid white;'>
                                          <option value='0'>Selecione...</option>";
                                while ($valores = mysqli_fetch_assoc($executar22)){
                                  echo "<option value='".$valores['dis_id']."'>".$valores['dis_nome']."</option>";
                                };
                                echo "</select></td></tr>";
                                echo "<tr>
                                      <td>
                                        <select name='escola8'style='width: 100%;text-align-last: center;border: 1px solid white;'>
                                          <option value='0'>Selecione...</option>";
                                while ($valores = mysqli_fetch_assoc($executar8)){
                                  echo "<option value='".$valores['esc_id']."'>".$valores['esc_nome']."</option>";
                                };
                                echo "</select></td><td><input type='text' name='linha8' style='border: 1px solid white;'/></td>
                                      <td>
                                        <select name='disciplina8'style='width: 100%;text-align-last: center;border: 1px solid white;'>
                                          <option value='0'>Selecione...</option>";
                                while ($valores = mysqli_fetch_assoc($executar23)){
                                  echo "<option value='".$valores['dis_id']."'>".$valores['dis_nome']."</option>";
                                };
                                echo "</select></td></tr>";
                                echo "<tr>
                                      <td>
                                        <select name='escola9'style='width: 100%;text-align-last: center;border: 1px solid white;'>
                                          <option value='0'>Selecione...</option>";
                                while ($valores = mysqli_fetch_assoc($executar9)){
                                  echo "<option value='".$valores['esc_id']."'>".$valores['esc_nome']."</option>";
                                };
                                echo "</select></td><td><input type='text' name='linha9' style='border: 1px solid white;'/></td>
                                      <td>
                                        <select name='disciplina9'style='width: 100%;text-align-last: center;border: 1px solid white;'>
                                          <option value='0'>Selecione...</option>";
                                while ($valores = mysqli_fetch_assoc($executar24)){
                                  echo "<option value='".$valores['dis_id']."'>".$valores['dis_nome']."</option>";
                                };
                                echo "</select></td></tr>";
                                echo "<tr>
                                      <td>
                                        <select name='escola10'style='width: 100%;text-align-last: center;border: 1px solid white;'>
                                          <option value='0'>Selecione...</option>";
                                while ($valores = mysqli_fetch_assoc($executar10)){
                                  echo "<option value='".$valores['esc_id']."'>".$valores['esc_nome']."</option>";
                                };
                                echo "</select></td><td><input type='text' name='linha10' style='border: 1px solid white;'/></td>
                                      <td>
                                        <select name='disciplina10'style='width: 100%;text-align-last: center;border: 1px solid white;'>
                                          <option value='0'>Selecione...</option>";
                                while ($valores = mysqli_fetch_assoc($executar25)){
                                  echo "<option value='".$valores['dis_id']."'>".$valores['dis_nome']."</option>";
                                };
                                echo "</select></td></tr>";
                                echo "<tr>
                                      <td>
                                        <select name='escola11'style='width: 100%;text-align-last: center;border: 1px solid white;'>
                                          <option value='0'>Selecione...</option>";
                                while ($valores = mysqli_fetch_assoc($executar11)){
                                  echo "<option value='".$valores['esc_id']."'>".$valores['esc_nome']."</option>";
                                };
                                echo "</select></td><td><input type='text' name='linha11' style='border: 1px solid white;'/></td>
                                      <td>
                                        <select name='disciplina11'style='width: 100%;text-align-last: center;border: 1px solid white;'>
                                          <option value='0'>Selecione...</option>";
                                while ($valores = mysqli_fetch_assoc($executar26)){
                                  echo "<option value='".$valores['dis_id']."'>".$valores['dis_nome']."</option>";
                                };
                                echo "</select></td></tr>";
                                echo "<tr>
                                      <td>
                                        <select name='escola12'style='width: 100%;text-align-last: center;border: 1px solid white;'>
                                          <option value='0'>Selecione...</option>";
                                while ($valores = mysqli_fetch_assoc($executar12)){
                                  echo "<option value='".$valores['esc_id']."'>".$valores['esc_nome']."</option>";
                                };
                                echo "</select></td><td><input type='text' name='linha12' style='border: 1px solid white;'/></td>
                                      <td>
                                        <select name='disciplina12'style='width: 100%;text-align-last: center;border: 1px solid white;'>
                                          <option value='0'>Selecione...</option>";
                                while ($valores = mysqli_fetch_assoc($executar27)){
                                  echo "<option value='".$valores['dis_id']."'>".$valores['dis_nome']."</option>";
                                };
                                echo "</select></td></tr>";
                                break;
                            case 13:
                                echo "<tr>
                                      <td>
                                        <select name='escola1'style='width: 100%;text-align-last: center;border: 1px solid white;'>
                                          <option value='0'>Selecione...</option>";
                                while ($valores = mysqli_fetch_assoc($executar)){
                                  echo "<option value='".$valores['esc_id']."'>".$valores['esc_nome']."</option>";
                                };
                                echo "</select></td><td><input type='text' name='linha1' style='border: 1px solid white;'/></td>
                                      <td>
                                        <select name='disciplina1'style='width: 100%;text-align-last: center;border: 1px solid white;'>
                                          <option value='0'>Selecione...</option>";
                                while ($valores = mysqli_fetch_assoc($executar16)){
                                  echo "<option value='".$valores['dis_id']."'>".$valores['dis_nome']."</option>";
                                };
                                echo "</select></td></tr>";
                                echo "<tr>
                                      <td>
                                        <select name='escola2'style='width: 100%;text-align-last: center;border: 1px solid white;'>
                                          <option value='0'>Selecione...</option>";
                                while ($valore = mysqli_fetch_assoc($executar2)){
                                  echo "<option value='".$valore['esc_id']."'>".$valore['esc_nome']."</option>";
                                };
                                echo "</select></td><td><input type='text' name='linha2' style='border: 1px solid white;'/></td>
                                      <td>
                                        <select name='disciplina2'style='width: 100%;text-align-last: center;border: 1px solid white;'>
                                          <option value='0'>Selecione...</option>";
                                while ($valores = mysqli_fetch_assoc($executar17)){
                                  echo "<option value='".$valores['dis_id']."'>".$valores['dis_nome']."</option>";
                                };
                                echo "</select></td>";
                                echo "<tr>
                                      <td>
                                        <select name='escola3'style='width: 100%;text-align-last: center;border: 1px solid white;'>
                                          <option value='0'>Selecione...</option>";
                                while ($valore = mysqli_fetch_assoc($executar3)){
                                  echo "<option value='".$valore['esc_id']."'>".$valore['esc_nome']."</option>";
                                };
                                echo "</select></td><td><input type='text' name='linha3' style='border: 1px solid white;'/></td>
                                      <td>
                                        <select name='disciplina3'style='width: 100%;text-align-last: center;border: 1px solid white;'>
                                          <option value='0'>Selecione...</option>";
                                while ($valores = mysqli_fetch_assoc($executar18)){
                                  echo "<option value='".$valores['dis_id']."'>".$valores['dis_nome']."</option>";
                                };
                                echo "</select></td></tr>";
                                echo "<tr>
                                      <td>
                                        <select name='escola4'style='width: 100%;text-align-last: center;border: 1px solid white;'>
                                          <option value='0'>Selecione...</option>";
                                while ($valores = mysqli_fetch_assoc($executar4)){
                                  echo "<option value='".$valores['esc_id']."'>".$valores['esc_nome']."</option>";
                                };
                                echo "</select></td><td><input type='text' name='linha4' style='border: 1px solid white;'/></td>
                                      <td>
                                        <select name='disciplina4'style='width: 100%;text-align-last: center;border: 1px solid white;'>
                                          <option value='0'>Selecione...</option>";
                                while ($valores = mysqli_fetch_assoc($executar19)){
                                  echo "<option value='".$valores['dis_id']."'>".$valores['dis_nome']."</option>";
                                };
                                echo "</select></td></tr>";
                                echo "<tr>
                                      <td>
                                        <select name='escola5'style='width: 100%;text-align-last: center;border: 1px solid white;'>
                                          <option value='0'>Selecione...</option>";
                                while ($valores = mysqli_fetch_assoc($executar5)){
                                  echo "<option value='".$valores['esc_id']."'>".$valores['esc_nome']."</option>";
                                };
                                echo "</select></td><td><input type='text' name='linha5' style='border: 1px solid white;'/></td>
                                      <td>
                                        <select name='disciplina5'style='width: 100%;text-align-last: center;border: 1px solid white;'>
                                          <option value='0'>Selecione...</option>";
                                while ($valores = mysqli_fetch_assoc($executar20)){
                                  echo "<option value='".$valores['dis_id']."'>".$valores['dis_nome']."</option>";
                                };
                                echo "</select></td></tr>";
                                echo "<tr>
                                      <td>
                                        <select name='escola6'style='width: 100%;text-align-last: center;border: 1px solid white;'>
                                          <option value='0'>Selecione...</option>";
                                while ($valores = mysqli_fetch_assoc($executar6)){
                                  echo "<option value='".$valores['esc_id']."'>".$valores['esc_nome']."</option>";
                                };
                                echo "</select></td><td><input type='text' name='linha6' style='border: 1px solid white;'/></td>
                                      <td>
                                        <select name='disciplina6'style='width: 100%;text-align-last: center;border: 1px solid white;'>
                                          <option value='0'>Selecione...</option>";
                                while ($valores = mysqli_fetch_assoc($executar21)){
                                  echo "<option value='".$valores['dis_id']."'>".$valores['dis_nome']."</option>";
                                };
                                echo "</select></td></tr>";
                                echo "<tr>
                                      <td>
                                        <select name='escola7'style='width: 100%;text-align-last: center;border: 1px solid white;'>
                                          <option value='0'>Selecione...</option>";
                                while ($valores = mysqli_fetch_assoc($executar7)){
                                  echo "<option value='".$valores['esc_id']."'>".$valores['esc_nome']."</option>";
                                };
                                echo "</select></td><td><input type='text' name='linha7' style='border: 1px solid white;'/></td>
                                      <td>
                                        <select name='disciplina7'style='width: 100%;text-align-last: center;border: 1px solid white;'>
                                          <option value='0'>Selecione...</option>";
                                while ($valores = mysqli_fetch_assoc($executar22)){
                                  echo "<option value='".$valores['dis_id']."'>".$valores['dis_nome']."</option>";
                                };
                                echo "</select></td></tr>";
                                echo "<tr>
                                      <td>
                                        <select name='escola8'style='width: 100%;text-align-last: center;border: 1px solid white;'>
                                          <option value='0'>Selecione...</option>";
                                while ($valores = mysqli_fetch_assoc($executar8)){
                                  echo "<option value='".$valores['esc_id']."'>".$valores['esc_nome']."</option>";
                                };
                                echo "</select></td><td><input type='text' name='linha8' style='border: 1px solid white;'/></td>
                                      <td>
                                        <select name='disciplina8'style='width: 100%;text-align-last: center;border: 1px solid white;'>
                                          <option value='0'>Selecione...</option>";
                                while ($valores = mysqli_fetch_assoc($executar23)){
                                  echo "<option value='".$valores['dis_id']."'>".$valores['dis_nome']."</option>";
                                };
                                echo "</select></td></tr>";
                                echo "<tr>
                                      <td>
                                        <select name='escola9'style='width: 100%;text-align-last: center;border: 1px solid white;'>
                                          <option value='0'>Selecione...</option>";
                                while ($valores = mysqli_fetch_assoc($executar9)){
                                  echo "<option value='".$valores['esc_id']."'>".$valores['esc_nome']."</option>";
                                };
                                echo "</select></td><td><input type='text' name='linha9' style='border: 1px solid white;'/></td>
                                      <td>
                                        <select name='disciplina9'style='width: 100%;text-align-last: center;border: 1px solid white;'>
                                          <option value='0'>Selecione...</option>";
                                while ($valores = mysqli_fetch_assoc($executar24)){
                                  echo "<option value='".$valores['dis_id']."'>".$valores['dis_nome']."</option>";
                                };
                                echo "</select></td></tr>";
                                echo "<tr>
                                      <td>
                                        <select name='escola10'style='width: 100%;text-align-last: center;border: 1px solid white;'>
                                          <option value='0'>Selecione...</option>";
                                while ($valores = mysqli_fetch_assoc($executar10)){
                                  echo "<option value='".$valores['esc_id']."'>".$valores['esc_nome']."</option>";
                                };
                                echo "</select></td><td><input type='text' name='linha10' style='border: 1px solid white;'/></td>
                                      <td>
                                        <select name='disciplina10'style='width: 100%;text-align-last: center;border: 1px solid white;'>
                                          <option value='0'>Selecione...</option>";
                                while ($valores = mysqli_fetch_assoc($executar25)){
                                  echo "<option value='".$valores['dis_id']."'>".$valores['dis_nome']."</option>";
                                };
                                echo "</select></td></tr>";
                                echo "<tr>
                                      <td>
                                        <select name='escola11'style='width: 100%;text-align-last: center;border: 1px solid white;'>
                                          <option value='0'>Selecione...</option>";
                                while ($valores = mysqli_fetch_assoc($executar11)){
                                  echo "<option value='".$valores['esc_id']."'>".$valores['esc_nome']."</option>";
                                };
                                echo "</select></td><td><input type='text' name='linha11' style='border: 1px solid white;'/></td>
                                      <td>
                                        <select name='disciplina11'style='width: 100%;text-align-last: center;border: 1px solid white;'>
                                          <option value='0'>Selecione...</option>";
                                while ($valores = mysqli_fetch_assoc($executar26)){
                                  echo "<option value='".$valores['dis_id']."'>".$valores['dis_nome']."</option>";
                                };
                                echo "</select></td></tr>";
                                echo "<tr>
                                      <td>
                                        <select name='escola12'style='width: 100%;text-align-last: center;border: 1px solid white;'>
                                          <option value='0'>Selecione...</option>";
                                while ($valores = mysqli_fetch_assoc($executar12)){
                                  echo "<option value='".$valores['esc_id']."'>".$valores['esc_nome']."</option>";
                                };
                                echo "</select></td><td><input type='text' name='linha12' style='border: 1px solid white;'/></td>
                                      <td>
                                        <select name='disciplina12'style='width: 100%;text-align-last: center;border: 1px solid white;'>
                                          <option value='0'>Selecione...</option>";
                                while ($valores = mysqli_fetch_assoc($executar27)){
                                  echo "<option value='".$valores['dis_id']."'>".$valores['dis_nome']."</option>";
                                };
                                echo "</select></td></tr>";
                                echo "<tr>
                                      <td>
                                        <select name='escola13'style='width: 100%;text-align-last: center;border: 1px solid white;'>
                                          <option value='0'>Selecione...</option>";
                                while ($valores = mysqli_fetch_assoc($executar13)){
                                  echo "<option value='".$valores['esc_id']."'>".$valores['esc_nome']."</option>";
                                };
                                echo "</select></td><td><input type='text' name='linha13' style='border: 1px solid white;'/></td>
                                      <td>
                                        <select name='disciplina13'style='width: 100%;text-align-last: center;border: 1px solid white;'>
                                          <option value='0'>Selecione...</option>";
                                while ($valores = mysqli_fetch_assoc($executar28)){
                                  echo "<option value='".$valores['dis_id']."'>".$valores['dis_nome']."</option>";
                                };
                                echo "</select></td></tr>";
                                break;
                            case 14:
                                echo "<tr>
                                      <td>
                                        <select name='escola1'style='width: 100%;text-align-last: center;border: 1px solid white;'>
                                          <option value='0'>Selecione...</option>";
                                while ($valores = mysqli_fetch_assoc($executar)){
                                  echo "<option value='".$valores['esc_id']."'>".$valores['esc_nome']."</option>";
                                };
                                echo "</select></td><td><input type='text' name='linha1' style='border: 1px solid white;'/></td>
                                      <td>
                                        <select name='disciplina1'style='width: 100%;text-align-last: center;border: 1px solid white;'>
                                          <option value='0'>Selecione...</option>";
                                while ($valores = mysqli_fetch_assoc($executar16)){
                                  echo "<option value='".$valores['dis_id']."'>".$valores['dis_nome']."</option>";
                                };
                                echo "</select></td></tr>";
                                echo "<tr>
                                      <td>
                                        <select name='escola2'style='width: 100%;text-align-last: center;border: 1px solid white;'>
                                          <option value='0'>Selecione...</option>";
                                while ($valore = mysqli_fetch_assoc($executar2)){
                                  echo "<option value='".$valore['esc_id']."'>".$valore['esc_nome']."</option>";
                                };
                                echo "</select></td><td><input type='text' name='linha2' style='border: 1px solid white;'/></td>
                                      <td>
                                        <select name='disciplina2'style='width: 100%;text-align-last: center;border: 1px solid white;'>
                                          <option value='0'>Selecione...</option>";
                                while ($valores = mysqli_fetch_assoc($executar17)){
                                  echo "<option value='".$valores['dis_id']."'>".$valores['dis_nome']."</option>";
                                };
                                echo "</select></td>";
                                echo "<tr>
                                      <td>
                                        <select name='escola3'style='width: 100%;text-align-last: center;border: 1px solid white;'>
                                          <option value='0'>Selecione...</option>";
                                while ($valore = mysqli_fetch_assoc($executar3)){
                                  echo "<option value='".$valore['esc_id']."'>".$valore['esc_nome']."</option>";
                                };
                                echo "</select></td><td><input type='text' name='linha3' style='border: 1px solid white;'/></td>
                                      <td>
                                        <select name='disciplina3'style='width: 100%;text-align-last: center;border: 1px solid white;'>
                                          <option value='0'>Selecione...</option>";
                                while ($valores = mysqli_fetch_assoc($executar18)){
                                  echo "<option value='".$valores['dis_id']."'>".$valores['dis_nome']."</option>";
                                };
                                echo "</select></td></tr>";
                                echo "<tr>
                                      <td>
                                        <select name='escola4'style='width: 100%;text-align-last: center;border: 1px solid white;'>
                                          <option value='0'>Selecione...</option>";
                                while ($valores = mysqli_fetch_assoc($executar4)){
                                  echo "<option value='".$valores['esc_id']."'>".$valores['esc_nome']."</option>";
                                };
                                echo "</select></td><td><input type='text' name='linha4' style='border: 1px solid white;'/></td>
                                      <td>
                                        <select name='disciplina4'style='width: 100%;text-align-last: center;border: 1px solid white;'>
                                          <option value='0'>Selecione...</option>";
                                while ($valores = mysqli_fetch_assoc($executar19)){
                                  echo "<option value='".$valores['dis_id']."'>".$valores['dis_nome']."</option>";
                                };
                                echo "</select></td></tr>";
                                echo "<tr>
                                      <td>
                                        <select name='escola5'style='width: 100%;text-align-last: center;border: 1px solid white;'>
                                          <option value='0'>Selecione...</option>";
                                while ($valores = mysqli_fetch_assoc($executar5)){
                                  echo "<option value='".$valores['esc_id']."'>".$valores['esc_nome']."</option>";
                                };
                                echo "</select></td><td><input type='text' name='linha5' style='border: 1px solid white;'/></td>
                                      <td>
                                        <select name='disciplina5'style='width: 100%;text-align-last: center;border: 1px solid white;'>
                                          <option value='0'>Selecione...</option>";
                                while ($valores = mysqli_fetch_assoc($executar20)){
                                  echo "<option value='".$valores['dis_id']."'>".$valores['dis_nome']."</option>";
                                };
                                echo "</select></td></tr>";
                                echo "<tr>
                                      <td>
                                        <select name='escola6'style='width: 100%;text-align-last: center;border: 1px solid white;'>
                                          <option value='0'>Selecione...</option>";
                                while ($valores = mysqli_fetch_assoc($executar6)){
                                  echo "<option value='".$valores['esc_id']."'>".$valores['esc_nome']."</option>";
                                };
                                echo "</select></td><td><input type='text' name='linha6' style='border: 1px solid white;'/></td>
                                      <td>
                                        <select name='disciplina6'style='width: 100%;text-align-last: center;border: 1px solid white;'>
                                          <option value='0'>Selecione...</option>";
                                while ($valores = mysqli_fetch_assoc($executar21)){
                                  echo "<option value='".$valores['dis_id']."'>".$valores['dis_nome']."</option>";
                                };
                                echo "</select></td></tr>";
                                echo "<tr>
                                      <td>
                                        <select name='escola7'style='width: 100%;text-align-last: center;border: 1px solid white;'>
                                          <option value='0'>Selecione...</option>";
                                while ($valores = mysqli_fetch_assoc($executar7)){
                                  echo "<option value='".$valores['esc_id']."'>".$valores['esc_nome']."</option>";
                                };
                                echo "</select></td><td><input type='text' name='linha7' style='border: 1px solid white;'/></td>
                                      <td>
                                        <select name='disciplina7'style='width: 100%;text-align-last: center;border: 1px solid white;'>
                                          <option value='0'>Selecione...</option>";
                                while ($valores = mysqli_fetch_assoc($executar22)){
                                  echo "<option value='".$valores['dis_id']."'>".$valores['dis_nome']."</option>";
                                };
                                echo "</select></td></tr>";
                                echo "<tr>
                                      <td>
                                        <select name='escola8'style='width: 100%;text-align-last: center;border: 1px solid white;'>
                                          <option value='0'>Selecione...</option>";
                                while ($valores = mysqli_fetch_assoc($executar8)){
                                  echo "<option value='".$valores['esc_id']."'>".$valores['esc_nome']."</option>";
                                };
                                echo "</select></td><td><input type='text' name='linha8' style='border: 1px solid white;'/></td>
                                      <td>
                                        <select name='disciplina8'style='width: 100%;text-align-last: center;border: 1px solid white;'>
                                          <option value='0'>Selecione...</option>";
                                while ($valores = mysqli_fetch_assoc($executar23)){
                                  echo "<option value='".$valores['dis_id']."'>".$valores['dis_nome']."</option>";
                                };
                                echo "</select></td></tr>";
                                echo "<tr>
                                      <td>
                                        <select name='escola9'style='width: 100%;text-align-last: center;border: 1px solid white;'>
                                          <option value='0'>Selecione...</option>";
                                while ($valores = mysqli_fetch_assoc($executar9)){
                                  echo "<option value='".$valores['esc_id']."'>".$valores['esc_nome']."</option>";
                                };
                                echo "</select></td><td><input type='text' name='linha9' style='border: 1px solid white;'/></td>
                                      <td>
                                        <select name='disciplina9'style='width: 100%;text-align-last: center;border: 1px solid white;'>
                                          <option value='0'>Selecione...</option>";
                                while ($valores = mysqli_fetch_assoc($executar24)){
                                  echo "<option value='".$valores['dis_id']."'>".$valores['dis_nome']."</option>";
                                };
                                echo "</select></td></tr>";
                                echo "<tr>
                                      <td>
                                        <select name='escola10'style='width: 100%;text-align-last: center;border: 1px solid white;'>
                                          <option value='0'>Selecione...</option>";
                                while ($valores = mysqli_fetch_assoc($executar10)){
                                  echo "<option value='".$valores['esc_id']."'>".$valores['esc_nome']."</option>";
                                };
                                echo "</select></td><td><input type='text' name='linha10' style='border: 1px solid white;'/></td>
                                      <td>
                                        <select name='disciplina10'style='width: 100%;text-align-last: center;border: 1px solid white;'>
                                          <option value='0'>Selecione...</option>";
                                while ($valores = mysqli_fetch_assoc($executar25)){
                                  echo "<option value='".$valores['dis_id']."'>".$valores['dis_nome']."</option>";
                                };
                                echo "</select></td></tr>";
                                echo "<tr>
                                      <td>
                                        <select name='escola11'style='width: 100%;text-align-last: center;border: 1px solid white;'>
                                          <option value='0'>Selecione...</option>";
                                while ($valores = mysqli_fetch_assoc($executar11)){
                                  echo "<option value='".$valores['esc_id']."'>".$valores['esc_nome']."</option>";
                                };
                                echo "</select></td><td><input type='text' name='linha11' style='border: 1px solid white;'/></td>
                                      <td>
                                        <select name='disciplina11'style='width: 100%;text-align-last: center;border: 1px solid white;'>
                                          <option value='0'>Selecione...</option>";
                                while ($valores = mysqli_fetch_assoc($executar26)){
                                  echo "<option value='".$valores['dis_id']."'>".$valores['dis_nome']."</option>";
                                };
                                echo "</select></td></tr>";
                                echo "<tr>
                                      <td>
                                        <select name='escola12'style='width: 100%;text-align-last: center;border: 1px solid white;'>
                                          <option value='0'>Selecione...</option>";
                                while ($valores = mysqli_fetch_assoc($executar12)){
                                  echo "<option value='".$valores['esc_id']."'>".$valores['esc_nome']."</option>";
                                };
                                echo "</select></td><td><input type='text' name='linha12' style='border: 1px solid white;'/></td>
                                      <td>
                                        <select name='disciplina12'style='width: 100%;text-align-last: center;border: 1px solid white;'>
                                          <option value='0'>Selecione...</option>";
                                while ($valores = mysqli_fetch_assoc($executar27)){
                                  echo "<option value='".$valores['dis_id']."'>".$valores['dis_nome']."</option>";
                                };
                                echo "</select></td></tr>";
                                echo "<tr>
                                      <td>
                                        <select name='escola13'style='width: 100%;text-align-last: center;border: 1px solid white;'>
                                          <option value='0'>Selecione...</option>";
                                while ($valores = mysqli_fetch_assoc($executar13)){
                                  echo "<option value='".$valores['esc_id']."'>".$valores['esc_nome']."</option>";
                                };
                                echo "</select></td><td><input type='text' name='linha13' style='border: 1px solid white;'/></td>
                                      <td>
                                        <select name='disciplina13'style='width: 100%;text-align-last: center;border: 1px solid white;'>
                                          <option value='0'>Selecione...</option>";
                                while ($valores = mysqli_fetch_assoc($executar28)){
                                  echo "<option value='".$valores['dis_id']."'>".$valores['dis_nome']."</option>";
                                };
                                echo "</select></td></tr>";
                                echo "<tr>
                                      <td>
                                        <select name='escola14'style='width: 100%;text-align-last: center;border: 1px solid white;'>
                                          <option value='0'>Selecione...</option>";
                                while ($valores = mysqli_fetch_assoc($executar14)){
                                  echo "<option value='".$valores['esc_id']."'>".$valores['esc_nome']."</option>";
                                };
                                echo "</select></td><td><input type='text' name='linha14' style='border: 1px solid white;'/></td>
                                      <td>
                                        <select name='disciplina14'style='width: 100%;text-align-last: center;border: 1px solid white;'>
                                          <option value='0'>Selecione...</option>";
                                while ($valores = mysqli_fetch_assoc($executar29)){
                                  echo "<option value='".$valores['dis_id']."'>".$valores['dis_nome']."</option>";
                                };
                                echo "</select></td></tr>";
                                break;
                            case 15:
                                echo "<tr>
                                      <td>
                                        <select name='escola1'style='width: 100%;text-align-last: center;border: 1px solid white;'>
                                          <option value='0'>Selecione...</option>";
                                while ($valores = mysqli_fetch_assoc($executar)){
                                  echo "<option value='".$valores['esc_id']."'>".$valores['esc_nome']."</option>";
                                };
                                echo "</select></td><td><input type='text' name='linha1' style='border: 1px solid white;'/></td>
                                      <td>
                                        <select name='disciplina1'style='width: 100%;text-align-last: center;border: 1px solid white;'>
                                          <option value='0'>Selecione...</option>";
                                while ($valores = mysqli_fetch_assoc($executar16)){
                                  echo "<option value='".$valores['dis_id']."'>".$valores['dis_nome']."</option>";
                                };
                                echo "</select></td></tr>";
                                echo "<tr>
                                      <td>
                                        <select name='escola2'style='width: 100%;text-align-last: center;border: 1px solid white;'>
                                          <option value='0'>Selecione...</option>";
                                while ($valore = mysqli_fetch_assoc($executar2)){
                                  echo "<option value='".$valore['esc_id']."'>".$valore['esc_nome']."</option>";
                                };
                                echo "</select></td><td><input type='text' name='linha2' style='border: 1px solid white;'/></td>
                                      <td>
                                        <select name='disciplina2'style='width: 100%;text-align-last: center;border: 1px solid white;'>
                                          <option value='0'>Selecione...</option>";
                                while ($valores = mysqli_fetch_assoc($executar17)){
                                  echo "<option value='".$valores['dis_id']."'>".$valores['dis_nome']."</option>";
                                };
                                echo "</select></td>";
                                echo "<tr>
                                      <td>
                                        <select name='escola3'style='width: 100%;text-align-last: center;border: 1px solid white;'>
                                          <option value='0'>Selecione...</option>";
                                while ($valore = mysqli_fetch_assoc($executar3)){
                                  echo "<option value='".$valore['esc_id']."'>".$valore['esc_nome']."</option>";
                                };
                                echo "</select></td><td><input type='text' name='linha3' style='border: 1px solid white;'/></td>
                                      <td>
                                        <select name='disciplina3'style='width: 100%;text-align-last: center;border: 1px solid white;'>
                                          <option value='0'>Selecione...</option>";
                                while ($valores = mysqli_fetch_assoc($executar18)){
                                  echo "<option value='".$valores['dis_id']."'>".$valores['dis_nome']."</option>";
                                };
                                echo "</select></td></tr>";
                                echo "<tr>
                                      <td>
                                        <select name='escola4'style='width: 100%;text-align-last: center;border: 1px solid white;'>
                                          <option value='0'>Selecione...</option>";
                                while ($valores = mysqli_fetch_assoc($executar4)){
                                  echo "<option value='".$valores['esc_id']."'>".$valores['esc_nome']."</option>";
                                };
                                echo "</select></td><td><input type='text' name='linha4' style='border: 1px solid white;'/></td>
                                      <td>
                                        <select name='disciplina4'style='width: 100%;text-align-last: center;border: 1px solid white;'>
                                          <option value='0'>Selecione...</option>";
                                while ($valores = mysqli_fetch_assoc($executar19)){
                                  echo "<option value='".$valores['dis_id']."'>".$valores['dis_nome']."</option>";
                                };
                                echo "</select></td></tr>";
                                echo "<tr>
                                      <td>
                                        <select name='escola5'style='width: 100%;text-align-last: center;border: 1px solid white;'>
                                          <option value='0'>Selecione...</option>";
                                while ($valores = mysqli_fetch_assoc($executar5)){
                                  echo "<option value='".$valores['esc_id']."'>".$valores['esc_nome']."</option>";
                                };
                                echo "</select></td><td><input type='text' name='linha5' style='border: 1px solid white;'/></td>
                                      <td>
                                        <select name='disciplina5'style='width: 100%;text-align-last: center;border: 1px solid white;'>
                                          <option value='0'>Selecione...</option>";
                                while ($valores = mysqli_fetch_assoc($executar20)){
                                  echo "<option value='".$valores['dis_id']."'>".$valores['dis_nome']."</option>";
                                };
                                echo "</select></td></tr>";
                                echo "<tr>
                                      <td>
                                        <select name='escola6'style='width: 100%;text-align-last: center;border: 1px solid white;'>
                                          <option value='0'>Selecione...</option>";
                                while ($valores = mysqli_fetch_assoc($executar6)){
                                  echo "<option value='".$valores['esc_id']."'>".$valores['esc_nome']."</option>";
                                };
                                echo "</select></td><td><input type='text' name='linha6' style='border: 1px solid white;'/></td>
                                      <td>
                                        <select name='disciplina6'style='width: 100%;text-align-last: center;border: 1px solid white;'>
                                          <option value='0'>Selecione...</option>";
                                while ($valores = mysqli_fetch_assoc($executar21)){
                                  echo "<option value='".$valores['dis_id']."'>".$valores['dis_nome']."</option>";
                                };
                                echo "</select></td></tr>";
                                echo "<tr>
                                      <td>
                                        <select name='escola7'style='width: 100%;text-align-last: center;border: 1px solid white;'>
                                          <option value='0'>Selecione...</option>";
                                while ($valores = mysqli_fetch_assoc($executar7)){
                                  echo "<option value='".$valores['esc_id']."'>".$valores['esc_nome']."</option>";
                                };
                                echo "</select></td><td><input type='text' name='linha7' style='border: 1px solid white;'/></td>
                                      <td>
                                        <select name='disciplina7'style='width: 100%;text-align-last: center;border: 1px solid white;'>
                                          <option value='0'>Selecione...</option>";
                                while ($valores = mysqli_fetch_assoc($executar22)){
                                  echo "<option value='".$valores['dis_id']."'>".$valores['dis_nome']."</option>";
                                };
                                echo "</select></td></tr>";
                                echo "<tr>
                                      <td>
                                        <select name='escola8'style='width: 100%;text-align-last: center;border: 1px solid white;'>
                                          <option value='0'>Selecione...</option>";
                                while ($valores = mysqli_fetch_assoc($executar8)){
                                  echo "<option value='".$valores['esc_id']."'>".$valores['esc_nome']."</option>";
                                };
                                echo "</select></td><td><input type='text' name='linha8' style='border: 1px solid white;'/></td>
                                      <td>
                                        <select name='disciplina8'style='width: 100%;text-align-last: center;border: 1px solid white;'>
                                          <option value='0'>Selecione...</option>";
                                while ($valores = mysqli_fetch_assoc($executar23)){
                                  echo "<option value='".$valores['dis_id']."'>".$valores['dis_nome']."</option>";
                                };
                                echo "</select></td></tr>";
                                echo "<tr>
                                      <td>
                                        <select name='escola9'style='width: 100%;text-align-last: center;border: 1px solid white;'>
                                          <option value='0'>Selecione...</option>";
                                while ($valores = mysqli_fetch_assoc($executar9)){
                                  echo "<option value='".$valores['esc_id']."'>".$valores['esc_nome']."</option>";
                                };
                                echo "</select></td><td><input type='text' name='linha9' style='border: 1px solid white;'/></td>
                                      <td>
                                        <select name='disciplina9'style='width: 100%;text-align-last: center;border: 1px solid white;'>
                                          <option value='0'>Selecione...</option>";
                                while ($valores = mysqli_fetch_assoc($executar24)){
                                  echo "<option value='".$valores['dis_id']."'>".$valores['dis_nome']."</option>";
                                };
                                echo "</select></td></tr>";
                                echo "<tr>
                                      <td>
                                        <select name='escola10'style='width: 100%;text-align-last: center;border: 1px solid white;'>
                                          <option value='0'>Selecione...</option>";
                                while ($valores = mysqli_fetch_assoc($executar10)){
                                  echo "<option value='".$valores['esc_id']."'>".$valores['esc_nome']."</option>";
                                };
                                echo "</select></td><td><input type='text' name='linha10' style='border: 1px solid white;'/></td>
                                      <td>
                                        <select name='disciplina10'style='width: 100%;text-align-last: center;border: 1px solid white;'>
                                          <option value='0'>Selecione...</option>";
                                while ($valores = mysqli_fetch_assoc($executar25)){
                                  echo "<option value='".$valores['dis_id']."'>".$valores['dis_nome']."</option>";
                                };
                                echo "</select></td></tr>";
                                echo "<tr>
                                      <td>
                                        <select name='escola11'style='width: 100%;text-align-last: center;border: 1px solid white;'>
                                          <option value='0'>Selecione...</option>";
                                while ($valores = mysqli_fetch_assoc($executar11)){
                                  echo "<option value='".$valores['esc_id']."'>".$valores['esc_nome']."</option>";
                                };
                                echo "</select></td><td><input type='text' name='linha11' style='border: 1px solid white;'/></td>
                                      <td>
                                        <select name='disciplina11'style='width: 100%;text-align-last: center;border: 1px solid white;'>
                                          <option value='0'>Selecione...</option>";
                                while ($valores = mysqli_fetch_assoc($executar26)){
                                  echo "<option value='".$valores['dis_id']."'>".$valores['dis_nome']."</option>";
                                };
                                echo "</select></td></tr>";
                                echo "<tr>
                                      <td>
                                        <select name='escola12'style='width: 100%;text-align-last: center;border: 1px solid white;'>
                                          <option value='0'>Selecione...</option>";
                                while ($valores = mysqli_fetch_assoc($executar12)){
                                  echo "<option value='".$valores['esc_id']."'>".$valores['esc_nome']."</option>";
                                };
                                echo "</select></td><td><input type='text' name='linha12' style='border: 1px solid white;'/></td>
                                      <td>
                                        <select name='disciplina12'style='width: 100%;text-align-last: center;border: 1px solid white;'>
                                          <option value='0'>Selecione...</option>";
                                while ($valores = mysqli_fetch_assoc($executar27)){
                                  echo "<option value='".$valores['dis_id']."'>".$valores['dis_nome']."</option>";
                                };
                                echo "</select></td></tr>";
                                echo "<tr>
                                      <td>
                                        <select name='escola13'style='width: 100%;text-align-last: center;border: 1px solid white;'>
                                          <option value='0'>Selecione...</option>";
                                while ($valores = mysqli_fetch_assoc($executar13)){
                                  echo "<option value='".$valores['esc_id']."'>".$valores['esc_nome']."</option>";
                                };
                                echo "</select></td><td><input type='text' name='linha13' style='border: 1px solid white;'/></td>
                                      <td>
                                        <select name='disciplina13'style='width: 100%;text-align-last: center;border: 1px solid white;'>
                                          <option value='0'>Selecione...</option>";
                                while ($valores = mysqli_fetch_assoc($executar28)){
                                  echo "<option value='".$valores['dis_id']."'>".$valores['dis_nome']."</option>";
                                };
                                echo "</select></td></tr>";
                                echo "<tr>
                                      <td>
                                        <select name='escola14'style='width: 100%;text-align-last: center;border: 1px solid white;'>
                                          <option value='0'>Selecione...</option>";
                                while ($valores = mysqli_fetch_assoc($executar14)){
                                  echo "<option value='".$valores['esc_id']."'>".$valores['esc_nome']."</option>";
                                };
                                echo "</select></td><td><input type='text' name='linha14' style='border: 1px solid white;'/></td>
                                      <td>
                                        <select name='disciplina14'style='width: 100%;text-align-last: center;border: 1px solid white;'>
                                          <option value='0'>Selecione...</option>";
                                while ($valores = mysqli_fetch_assoc($executar29)){
                                  echo "<option value='".$valores['dis_id']."'>".$valores['dis_nome']."</option>";
                                };
                                echo "</select></td></tr>";
                                echo "<tr>
                                      <td>
                                        <select name='escola15'style='width: 100%;text-align-last: center;border: 1px solid white;'>
                                          <option value='0'>Selecione...</option>";
                                while ($valores = mysqli_fetch_assoc($executar15)){
                                  echo "<option value='".$valores['esc_id']."'>".$valores['esc_nome']."</option>";
                                };
                                echo "</select></td><td><input type='text' name='linha15' style='border: 1px solid white;'/></td>
                                      <td>
                                        <select name='disciplina15'style='width: 100%;text-align-last: center;border: 1px solid white;'>
                                          <option value='0'>Selecione...</option>";
                                while ($valores = mysqli_fetch_assoc($executar30)){
                                  echo "<option value='".$valores['dis_id']."'>".$valores['dis_nome']."</option>";
                                };
                                echo "</select></td></tr>";
                                break;
                            };
                           ?>

                      </table>
                        <input type="submit" name="" value="Criar PDF" class="btn btn-success" style="margin-top: 20px;">
                      </form>
                      </div>
                    </div>
                  </form>
                </div>
              </div>
            </div>
            <div class="tab-pane fade" id="visualizar" role="tabpanel" aria-labelledby="visualizar-tab">
              <div class="mx-auto col-md-12 row w-100 p-3" style="min-height: 30vh;max-height: 65vh;">
                <div class="col-md-12" style="padding-top: 20px;">
                  <div class=" table-responsive mx-auto col-md-12">
                    <table id="table" class="table tg table-striped table-bordered table-hover" style="font-size: 14px">
                      <thead>
                        <tr>
                          <th><label>Nome</label></th>
                          <th><label title="Cadastro de pessoa Física">CPF</label></th>
                          <th><label title="Registro Geral">RG</label></th>
                          <th><label>Exercendo Função</label></th>
                          <th><label>Ações</label></th>
                        </tr>
                        <tr>
                          <th><input style="text-align: center" list="coluna1" placeholder="pesquisar" class="serch text-dark" type="text" id="txtColuna1"/></th>
                          <th><input style="text-align: center" list="coluna2" placeholder="pesquisar" class="serch text-dark" type="text" id="txtColuna2"/></th>
                          <th><input style="text-align: center" list="coluna3" placeholder="pesquisar" class="serch text-dark" type="text" id="txtColuna3"/></th>
                          <th><input style="text-align: center" list="coluna4" placeholder="pesquisar" class="serch text-dark" type="text" id="txtColuna4"/></th>
                          <th></th>
                        </tr>     
                      </thead>
                      <tbody >
                        <?php
                          $selecione2 = "SELECT * FROM tb_professor";
                          $executar2 = mysqli_query($conexao, $selecione2);
                          while ($valores = mysqli_fetch_assoc($executar2)){
                            echo "<tr><td><h7 style='font-size: 14px;color: black;cursor: default;'>".$valores['prof_nome']."</h7></td><td><h7 style='font-size: 14px;color: black;cursor: default;'>".$valores['prof_cpf']."</h7></td><td><h7 style='font-size: 14px;color: black;cursor: default;'>".$valores['prof_rg']."</h7></td><td></td><td><a style='margin-right: 10px;' class='link1' href='professor.php?id=".$valores['prof_id']."' title='Clique aqui para editar os dados do professor ".$valores['prof_nome'].".'><i class='fa fa-pencil' aria-hidden='true'></i></a><a class='link2' href='../back-end/DB/professor/deletar.php?id=".$valores['prof_id']."' title='Clique aqui para apagar os dados do professor ".$valores['prof_nome'].".'><i class='fa fa-trash' aria-hidden='true' style='color: red;'></i></a></td></tr>";
                          };
                        ?>
                      </tbody>
                    </table>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </body>
</html>
<script type="text/javascript">
    //inicio da pesquisa
$(function(){
    $("#table input").keyup(function(){        
        var index = $(this).parent().index();
        var nth = "#table td:nth-child("+(index+1).toString()+")";
        var valor = $(this).val().toUpperCase();
        $("#table tbody tr").show();
        $(nth).each(function(){
            if($(this).text().toUpperCase().indexOf(valor) < 0){
                $(this).parent().hide();
            }
        });
    });
 
    $("#table input").blur(function(){
        $(this).val("");
    }); 
});
//fim pesquisa
</script>