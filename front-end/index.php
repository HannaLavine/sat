<?php
  //Conexão com um arquivo distante e inicio da sessão
  include "../back-end/DB/conexao/conexao.php";
  session_start();
  
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
      <script src="../extensions/scripts/bootstrap.min.js"></script>
      <link rel="stylesheet" type="text/css" href="../extensions/styles/bootstrap.min.css">
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
            <h1 class="wow animate__animated animate__bounceInLeft">Professores</h1>
            <hr class="mx-auto w-25 bg-success">
          </div>
        </div>
        <div class="col-md-10 m-5 mx-auto bg-white" style="box-shadow: 0px 0px 20px 0px #000000b8;border-radius: 15px;"> <br>
          <ul class="nav nav-tabs" id="myTab" role="tablist">
            <li class="nav-item">
              <a  class="nav-link text-dark active" id="cadastrar-tab" data-toggle="tab" href="#cadastrar" role="tab" aria-controls="cadastrar" aria-selected="true">Cadastrar</a>
            </li>
            <li class="nav-item">
              <a class="nav-link text-dark" id="visualizar-tab" data-toggle="tab" href="#visualizar" role="tab" aria-controls="visualizar" aria-selected="false">Visualizar</a>
            </li>
          </ul>
          <div class="tab-content" id="myTabContent" style="overflow-y: scroll;overflow-x: scroll;">
            <div class="tab-pane fade show active" id="cadastrar" role="tabpanel" aria-labelledby="cadastrar-tab">
              <div class="mx-auto col-md-12 row w-100 p-3" style="min-height: 30vh;max-height: 65vh;">
                <div class="col-md-12" style="padding-top: 20px;">
                  <form method="POST" action="../back-end/DB/professor/inserir.php">
                    <div class="form-row">
                      <div class="form-group tg col-md-12 input-group-lg"><input type="text" class="form-control text-dark " style="background-color: transparent;border: 1px solid black;" name="nome" placeholder="Nome Completo" required></div>
                      <div class="form-group tg col-md-6 input-group-lg" title="Evite sinais de pontuação e caracteres especiais."><input type="text" class="form-control text-dark " style="background-color: transparent;border: 1px solid black;" name="CPF" placeholder="CPF" required></div>
                      <div class="form-group tg col-md-6 input-group-lg" title="Evite sinais de pontuação e caracteres especiais."><input type="text" class="form-control text-dark " style="background-color: transparent;border: 1px solid black;" name="RG" placeholder="Número do RG" required></div>
                      <div class="form-group col-md-12">
                        <button type="submit" class="btn btn-secondary w-50 ajuda1">Cadastrar</button>
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
                          <th><label>Ações</label></th>
                        </tr>
                        <tr>
                          <th><input style="text-align: center" list="coluna1" placeholder="pesquisar" class="serch text-dark" type="text" id="txtColuna1"/></th>
                          <th><input style="text-align: center" list="coluna2" placeholder="pesquisar" class="serch text-dark" type="text" id="txtColuna2"/></th>
                          <th><input style="text-align: center" list="coluna3" placeholder="pesquisar" class="serch text-dark" type="text" id="txtColuna3"/></th>
                          <th></th>
                        </tr>     
                      </thead>
                      <tbody >
                        <?php
                          $selecione2 = "SELECT * FROM tb_professor";
                          $executar2 = mysqli_query($conexao, $selecione2);
                          while ($valores = mysqli_fetch_assoc($executar2)){
                            echo "<tr><td><h7 style='font-size: 14px;color: black;cursor: default;'>".$valores['prof_nome']."</h7></td><td><h7 style='font-size: 14px;color: black;cursor: default;'>".$valores['prof_cpf']."</h7></td><td><h7 style='font-size: 14px;color: black;cursor: default;'>".$valores['prof_rg']."</h7></td><td><a style='margin-right: 10px;' class='link1' href='professor.php?id=".$valores['prof_id']."' title='Clique aqui para editar os dados do professor ".$valores['prof_nome'].".'><i class='fa fa-pencil' aria-hidden='true'></i></a><a class='link2' href='../back-end/DB/professor/deletar.php?id=".$valores['prof_id']."' title='Clique aqui para apagar os dados do professor ".$valores['prof_nome'].".'><i class='fa fa-trash' aria-hidden='true' style='color: red;'></i></a></td></tr>";
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