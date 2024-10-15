<?php
  //Conexão com um arquivo distante e inicio da sessão
  include "../back-end/DB/conexao/conexao.php";
  session_start();

  $sql = "SELECT
      tb_escola.esc_id AS IdEscola,
      tb_escola.esc_nome AS NomeEscola,
      tb_municipio.mun_nome AS NomeMunicipio,
      tb_departamento.dep_nome AS NomeDepartamento,
      tb_modalidade.mod_nome AS NomeModalidade
      FROM tb_escola
      INNER JOIN tb_municipio ON tb_escola.mun_id = tb_municipio.mun_id
      INNER JOIN tb_departamento ON tb_escola.dep_id = tb_departamento.dep_id
      INNER JOIN tb_modalidade ON tb_escola.mod_id = tb_modalidade.mod_id 
      ORDER BY esc_id DESC";
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
      <script src="//netdna.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
      <link rel="stylesheet" href="../datatables/dataTables.min.css">
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
        a::selection{
          background-color: #15C465;;
          color: white;
        }
        h1::selection{
          background-color: #15C465;;
          color: white;
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
            Disciplina
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
            <h1 class="wow animate__animated animate__bounceInLeft">Instituições Educacionais</h1>
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
                  <form method="POST" action="../back-end/DB/instituicao/inserir.php">
                    <div class="form-row">
                      <div class="form-group tg col-md-12 input-group-lg"><input type="text" class="form-control text-dark " style="background-color: transparent;border: 1px solid black;" name="nome" placeholder="Nome Completo" required></div>
                      <div  class="form-group tg col-md-12 input-group-lg">
                        <select class="form-control" name="municipio" style="background-color: transparent;border: 1px solid black;cursor: pointer;">
                          <option value="0">Municipio...</option>
                          <?php
                            $selecione = "SELECT * FROM tb_municipio";
                            $executar = mysqli_query($conexao, $selecione);
                            while ($valores = mysqli_fetch_assoc($executar)){
                              echo "<option value='".$valores['mun_id']."'>".$valores['mun_nome']."</option>";
                            };
                          ?>
                        </select>
                      </div>
                      <div  class="form-group tg col-md-6 input-group-lg">
                        <select class="form-control" name="departamento" style="background-color: transparent;border: 1px solid black; cursor: pointer;">
                          <option value="0">Departamento...</option>
                          <?php
                            $selecione = "SELECT * FROM tb_departamento";
                            $executar = mysqli_query($conexao, $selecione);
                            while ($valores = mysqli_fetch_assoc($executar)){
                              echo "<option value='".$valores['dep_id']."'>".$valores['dep_nome']."</option>";
                            };
                          ?>
                        </select>
                      </div>
                      <div  class="form-group tg col-md-6 input-group-lg">
                        <select class="form-control" name="modalidade" style="background-color: transparent;border: 1px solid black;cursor: pointer;">
                          <option value="0">Modalidade...</option>
                          <?php
                            $selecione = "SELECT * FROM tb_modalidade order by mod_id";
                            $executar = mysqli_query($conexao, $selecione);
                            while ($valores = mysqli_fetch_assoc($executar)){
                              echo "<option value='".$valores['mod_id']."'>".$valores['mod_nome']."</option>";
                            };
                          ?>
                        </select>
                      </div>
                      <div class="form-group col-md-12">
                        <button type="submit" class="btn btn-secondary w-50 ajuda1">Cadastrar</button>
                      </div>
                    </div>
                  </form>
                </div>
              </div>
            </div>
            <div class="tab-pane fade" id="alterar" role="tabpanel" aria-labelledby="alterar-tab">
              <div class="mx-auto col-md-12 row w-100 p-3" style="min-height: 30vh;max-height: 65vh;">
                <div class="col-md-12" style="padding-top: 20px;">
                  <form method="POST" action="../back-end/DB/instituicao/alterar.php?">
                    <input type="hidden" name="hidden" <?php echo "value='".$id."'"; ?>>
                    <div class="form-row">
                      <div class="form-group tg col-md-12 input-group-lg"><input type="text" class="form-control text-dark " style="background-color: transparent;border: 1px solid black;" name="nome" placeholder="Nome Completo"
                        <?php
                        $selecione3 = "SELECT * FROM tb_escola WHERE esc_id = '$id'";
                        $executar3 = mysqli_query($conexao, $selecione3);
                        while ($valores = mysqli_fetch_assoc($executar3)){
                          $nome = $valores['esc_nome'];
                        };
                        echo "value='".$nome."'";
                       ?>required></div>
                      <div  class="form-group tg col-md-6 input-group-lg">
                        <select class="form-control" name="municipio" style="background-color: transparent;border: 1px solid black;cursor: pointer;">
                          <option value="0">Municipio...</option>
                          <?php
                            $selecione = "SELECT * FROM tb_municipio";
                            $executar = mysqli_query($conexao, $selecione);
                            while ($valores = mysqli_fetch_assoc($executar)){
                              echo "<option value='".$valores['mun_id']."'>".$valores['mun_nome']."</option>";
                            };
                          ?>
                        </select>
                      </div>
                      <div  class="form-group tg col-md-6 input-group-lg">
                        <select class="form-control" name="departamento" style="background-color: transparent;border: 1px solid black; cursor: pointer;">
                          <option value="0">Departamento...</option>
                          <?php
                            $selecione = "SELECT * FROM tb_departamento";
                            $executar = mysqli_query($conexao, $selecione);
                            while ($valores = mysqli_fetch_assoc($executar)){
                              echo "<option value='".$valores['dep_id']."'>".$valores['dep_nome']."</option>";
                            };
                          ?>
                        </select>
                      </div>
                      <div  class="form-group tg col-md-6 input-group-lg">
                        <select class="form-control" name="modalidade" style="background-color: transparent;border: 1px solid black;cursor: pointer;">
                          <option value="0">Modalidade...</option>
                          <?php
                            $selecione = "SELECT * FROM tb_modalidade";
                            $executar = mysqli_query($conexao, $selecione);
                            while ($valores = mysqli_fetch_assoc($executar)){
                              echo "<option value='".$valores['mod_id']."'>".$valores['mod_nome']."</option>";
                            };
                          ?>
                        </select>
                      </div>
                      <div class="form-group col-md-12">
                        <button type="submit" class="btn btn-secondary w-50 ajuda1">Alterar</button>
                      </div>
                    </div>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- Tabela de Instituições -->
        <span id="msgAlerta"></span>
        <h2>Tabela de Instituições</h2>
        <table class="table table-bordered table-striped" id="tabelaInst">
          <!-- criação da tabela de instituições -->
            <thead>
              <tr>
                <th scope="col"><center>ID</center></th>
                <th scope="col"><center>Nome</center></th>
                <th scope="col"><center>Município</center></th>
                <th scope="col"><center>Departamento</center></th>
                <th scope="col"><center>Modalidade</center></th>
                <th scope="col"><center>Editar</center></th>
                <th scope="col"><center>Excluir</center></th>
              </tr>
            </thead>
            <tbody>
              <?php
                while($user_data = mysqli_fetch_assoc($result)){
                  echo "<tr>";
                  echo "<td>".$user_data['IdEscola']."</td>";
                  echo "<td>".$user_data['NomeEscola']."</td>";
                  echo "<td>".$user_data['NomeMunicipio']."</td>";
                  echo "<td>".$user_data['NomeDepartamento']."</td>";
                  echo "<td>".$user_data['NomeModalidade']."</td>";
                  echo "<td>
                  <a href='instituicoes-editar.php?id=" . $user_data['IdEscola'] . "'> 
                    <button type='button' class='btn btn-outline-warning' id='edit-button'>
                      <i class='fa fa-pencil' aria-hidden='true'></i>
                    </button>
                  </a>
                </td>";
                  echo "<td><button type='button' class='btn btn-outline-danger' onclick='excluirInst(".$user_data['IdEscola'].")'><i class='fa fa-trash' aria-hidden='true'></i></button></td>";
                  echo "</tr>";
                }
              ?>  
            </tbody>
          </table>
      </div>
    </div>
  </body>
</html>
<!-- arquivos necessários para o funcionamento do data tables -->
<script src="../datatables/jquery/jquery-3.7.1.min.js"></script>
<script src="../datatables/dataTables.min.js"></script>

<script>
  //função de excluir 
  async function excluirInst(id) {
    var confirmar = confirm("Você realmente quer apagar o registro selecionado?");

    if(confirmar){
      //chama a função excluir
      const dados = await fetch("../back-end/DB/instituicao/deletar.php?id=" + id);
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

<script>
    //implementando o data tables
    $(document).ready( function () {
    $('#tabelaInst').DataTable({
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