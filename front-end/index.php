<?php
  //Conexão com um arquivo distante e inicio da sessão
  include "../back-end/DB/conexao/conexao.php";
  session_start();


  //chamando todos os registros da tabela professor
  $sql = "SELECT * from tb_professor ORDER BY prof_id DESC";
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
          </ul>
          <div class="tab-content" id="myTabContent" style="overflow-y: scroll;overflow-x: scroll;">
            <div class="tab-pane fade show active" id="cadastrar" role="tabpanel" aria-labelledby="cadastrar-tab">
              <div class="mx-auto col-md-12 row w-100 p-3" style="min-height: 30vh;max-height: 65vh;">
                <div class="col-md-12" style="padding-top: 20px;">
                  <!--Formulário de cadastro de professores-->
                  <form enctype="multipart/form-data" method="POST" action="../back-end/DB/professor/inserir.php">
                    <div class="form-row">
                      <div class="form-group tg col-md-12 input-group-lg"><input type="text" class="form-control text-dark " title="Preencha este campo com o nome completo do professor" style="background-color: transparent;border: 1px solid black;" name="nome" placeholder="Nome Completo" id="nomeProf" required></div>
                      <div class="form-group tg col-md-6 input-group-lg" title="Evite sinais de pontuação e caracteres especiais."><input type="text" class="form-control text-dark " style="background-color: transparent;border: 1px solid black;" name="CPF" placeholder="CPF" id="cpfProf" required></div>
                      <div class="form-group tg col-md-6 input-group-lg" title="Evite sinais de pontuação e caracteres especiais."><input type="text" class="form-control text-dark " style="background-color: transparent;border: 1px solid black;" name="RG" placeholder="Número do RG" id="rgProf" required></div>
                      <div class="form-group tg col-md-6 input-group-lg" title="Neste campo deve ser enviado o RG scaneado"><label for="RGScan">RG Scaneado</label><input type="file" class="form-control text-dark " style="background-color: transparent;border: 1px solid black;" name="RGScan" placeholder="RG" id="RGScan" required></div>
                      <div class="form-group col-md-12">
                        <center><input type="submit" value="Cadastrar" class="inline-btn" name="action"></center>
                      </div>
                    </div>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!--Tabela de professores-->
          <span id="msgAlerta"></span>
          <h2>Tabela de Professores</h2>
          <table class="table table-bordered" id="tabelaProf">
            <thead>
              <tr>
                <th scope="col"><center>ID</center></th>
                <th scope="col"><center>Nome</center></th>
                <th scope="col"><center>CPF</center></th>
                <th scope="col"><center>RG</center></th>
                <th><center>Visualizar RG</center></th>
                <th scope="col"><center>Editar</center></th>
                <th scope="col"><center>Excluir</center></th>
              </tr>
            </thead>
            <tbody>
              <?php
                while($user_data = mysqli_fetch_assoc($result)){
                  echo "<tr>";
                  echo "<td>".$user_data['prof_id']."</td>";
                  echo "<td>".$user_data['prof_nome']."</td>";
                  echo "<td>".$user_data['prof_cpf']."</td>";
                  echo "<td>".$user_data['prof_rg']."</td>";
                  echo "<td>
                    <a href='../back-end/DB/professor/" . $user_data["path"] . "' target='_blank'>
                      <button class='btn' data-bs-toggle='button'>
                        <img src='../back-end/DB/professor/" . $user_data["path"] . "' alt='Imagem do RG' width='70'/>
                      </button>
                    </a>
                  </td>";
                  echo "<td><button type='button' class='btn btn-outline-warning' id='edit-button' onclick='editarProf(".$user_data['prof_id'].")'><i class='fa fa-pencil' aria-hidden='true'></i></button></td>";
                  echo "<td><button type='button' class='btn btn-outline-danger' onclick='excluirProf(".$user_data['prof_id'].")'><i class='fa fa-trash' aria-hidden='true'></i></button></td>";
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
  async function excluirProf(idProf) {
    var confirmar = confirm("Você realmente quer apagar o registro selecionado?");

    if(confirmar){
      //chama a função excluir
      const dados = await fetch("../back-end/DB/professor/deletar.php?id=" + idProf);
      //altera a mensagem exibida pelo span msgAlerta
      document.getElementById("msgAlerta").innerHTML = "<div class='alert alert-success' role='alert'>Registro apagado com sucesso!</div>";
      //recarrega a página
      setTimeout(function() {
						location.reload();
					}, 250);
    }else{
      //altera a mensagem
      document.getElementById("msgAlerta").innerHTML = "<div class='alert alert-danger' role='alert'> Erro: Registro não apagado</div>";
      //recarrega a página
      setTimeout(function() {
						location.reload();
					}, 250);
    }
  }
</script>

<script>
	async function editarProf(id) {
    const idProf = id;

    $('table tbody tr').each(function() {
				var rowId = $(this).find('td:eq(0)').text(); // Considerando que o ID está na primeira coluna
        //a variável rowId pegará todos os ids existentes no banco, portanto, iremos comparar com a variável idProf
        if (rowId == idProf) {
					var nome = $(this).find('td:eq(1)').text();
          var cpf = $(this).find('td:eq(2)').text();
          var rg = $(this).find('td:eq(3)').text();

					// Preencher os campos do formulário com os dados obtidos
					$('#nomeProf').val(nome);
					$('#cpfProf').val(cpf);
					$('#rgProf').val(rg);

					// Alterar o modo de ação para editar
					$('#modoAcao').val('editar');
					// Alterar o valor do botão para refletir a ação de edição
					$('input[type="submit"]').val('Editar');
					// Alterar a rota do formulário para a rota de atualização de usuários
					$('form').attr('action', '../back-end/DB/professor/alterar.php?id='+idProf); // Alterar a action do formulário para a rota correta
					// Alterar o nome do botão para identificar a ação como atualização
					$('#btnC').attr('name', 'Editar');
				}
			});
  }
</script>
	
<script src="../datatables/jquery/jquery-3.7.1.min.js"></script>
<script src="../datatables/dataTables.min.js"></script>

<script>
    //implementando o data tables
    $(document).ready( function () {
    $('#tabelaProf').DataTable({
      language: {
			url: "../datatables/pt_br.json"
		},
    columnDefs: [{
			"defaultContent": "-",
			"targets": "_all",
			"className": "dt-body-center"
		}],
		"lengthMenu": [[10, 15, 25, 50, 100, -1], [10, 15, 25, 50, 100, "Tudo"]],
    });
} );

</script>