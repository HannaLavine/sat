<?php
  //Conexão com um arquivo distante e inicio da sessão
  include "../back-end/DB/conexao/conexao.php";
  session_start();
  
  $sql = "SELECT * from tb_disciplina ORDER BY dis_id DESC";
  $result = $conexao -> query($sql);
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
      <link rel="stylesheet" href="../datatables/dataTables.min.css">
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
            Professor
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
            Disciplina
          </a>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown navegacao" href="#" id="navbardrop3" data-toggle="dropdown">
            <i class="fa fa-file-text" aria-hidden="true"></i>
            Criar autorizações
          </a>
          <div class="dropdown-menu">
            <!-- inicio do formulário para criação da autorização -->
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
            <h1 class="wow animate__animated animate__bounceInLeft">Disciplinas</h1>
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
              <div class="mx-auto col-md-12 row w-100 p-3" style="min-height: 30vh;max-height: 65vh;">
                <div class="col-md-12" style="padding-top: 20px;">
                  <form method="POST" action="../back-end/DB/materia/inserir.php">
                    <div class="form-row">
                      <div class="form-group tg col-md-12 input-group-lg"><input type="text" class="form-control text-dark " style="background-color: transparent;border: 1px solid black;" name="nome" placeholder="Nome da disciplina" required></div>
                      <div class="form-group col-md-12">
                        <button type="submit" class="btn btn-secondary w-50 ajuda1">Cadastrar</button>
                      </div>
                    </div>
                  </form>
                  <!-- fim do formulário-->
                </div>
              </div>
            </div>
          </div>
        </div>
        <span id="msgAlerta"></span>
          <h2>Tabela de Disciplinas</h2>
          <table class="table table-bordered table-striped" id="TableDsc">
            <thead>
              <tr>
                <th scope="col"><center>Nome</center></th>
                <th scope="col"><center>Editar</center></th>
                <th scope="col"><center>Deletar</center></th>
              </tr>
            </thead>
            <!-- corpo da tabela -->
            <tbody>
              <?php
                while($user_data = mysqli_fetch_assoc($result)){
                  echo "<tr>";
                  echo "<td>".$user_data['dis_nome']."</td>";
                  echo "<td>
                  <a href='materias-editar.php?id=" . $user_data['dis_id'] . "'> 
                    <button type='button' class='btn btn-outline-warning' id='edit-button'>
                      <i class='fa fa-pencil' aria-hidden='true'></i>
                    </button>
                  </a>
                </td>";
                  echo "<td><button type='button' class='btn btn-outline-danger' onclick='excluirDis(".$user_data['dis_id'].")'><i class='fa fa-trash' aria-hidden='true'></i></button></td>";
                  echo "</tr>";
                }
              ?>  
            </tbody>
          </table>
      </div>
    </div>
  </body>
</html>

<script>
  //função de excluir 
  async function excluirDis(id) {
    var confirmar = confirm("Você realmente quer apagar o registro selecionado?");

    if(confirmar){
      //chama a função excluir
      const dados = await fetch("../back-end/DB/materia/delete.php?id=" + id);
      //altera a mensagem exibida pelo span msgAlerta
      document.getElementById("msgAlerta").innerHTML = "<div class='alert alert-success' role='alert'>Registro apagado com sucesso!</div>";
      //recarrega a página
      setTimeout(function() {
						location.reload();
					}, 300);
    }else{
      //altera a mensagem
      document.getElementById("msgAlerta").innerHTML = "<div class='alert alert-danger' role='alert'> Registro não apagado</div>";
      //recarrega a página
      setTimeout(function() {
						location.reload();
					}, 300);
    }
  }
</script>

<script src="../datatables/jquery/jquery-3.7.1.min.js"></script>
<script src="../datatables/dataTables.min.js"></script>

<script>
    //implementando o data tables
    $(document).ready( function () {
    $('#TableDsc').DataTable({
      language: {
			url: "../datatables/pt_br.json"
		},
    columnDefs: [{
			"defaultContent": "-",
			"targets": "_all",
			"className": "dt-body-center"
		}],
		"lengthMenu": [[5, 10, 15, 25, 50, 100, -1], [5, 10, 15, 25, 50, 100, "Tudo"]],
    });
} );

</script>