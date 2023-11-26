<?php
  include_once('template/links.php');
  
  require_once('config.php');
  include_once(__DIR__ . '/../../../controllers/UserController.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

         
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
 

    <style>
      #iconSearch{
      background-color: #35aad4;
      margin: 5px;
      border: solid 3px #fff;
      padding: 7px;
      border-radius: 50px;
      color: #fff;
      }
      #iconPdf{
         margin-top: 3px;
      }
      .material-symbols-outlined{
        cursor: pointer;
      }
    </style>
</head>
<body>
<?php
   $userController = new UserController($conexao);
   $acao = 'selectAllClientes';
   $parametros = [];
   $clientes = [];

   // Deletar usuário
   if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["id"])) {
       $id = $_POST["id"];
   
       // Excluir usuário do banco de dados
       $sql = "DELETE FROM usuario WHERE id_usuario = $id";
       if ($conn->query($sql) === TRUE) {
           echo json_encode(['success' => true]);
           exit(); 
       } else {
           echo json_encode(['success' => false, 'error' => 'Erro ao excluir usuário']);
           exit();
       }
   }

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $acao = isset($_POST['acao']) ? $_POST['acao'] : null;

        if ($acao === 'pesquisar') {

        } elseif ($acao === 'criarUsuario') {
            $nomeNovoUsuario = $_POST['nomeNovoUsuario'];

        } elseif ($acao === 'editarUsuario') {
            $idUsuarioParaEditar = isset($_POST['id']) ? $_POST['id'] : null;  

        } elseif ($acao === 'detalhesUsuario') {          
           $idUsuarioDetalhes = isset($_POST['id']) ? $_POST['id'] : null;
        } else {
          
            $clientes = $userController->executarAcao($acao, $parametros);
        }
    }
    //filtro de pesquisa
    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["search_terms"])) {
        $search_terms = $_POST["search_terms"];
        $search_array = explode(" ", $search_terms);

        $where_conditions = [];

        foreach ($search_array as $term) {
            $where_conditions[] = "(nome_usuario LIKE '%$term%' OR cpf LIKE '%$term%' OR email LIKE '%$term%')";
        }

        // Construir a condição de pesquisa com base nos termos fornecidos
        $where_clause = implode(" AND ", $where_conditions);

        // Consultar usuários do banco de dados com base nas condições de pesquisa
        if (!empty($where_conditions)) {
            $result = $conn->query("SELECT * FROM usuario WHERE $where_clause");
            $clientes = [];
            while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
                $clientes[] = $row;
            }
        } else {
            $result = $conn->query("SELECT * FROM usuario");
            $clientes = [];
            while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
                $clientes[] = $row;
            }
        }
    } else {
        // Se não houver uma solicitação de pesquisa, exibir todos os usuários
        $userController = new UserController($conexao);
        $acao = 'selectAllClientes';
        $parametros = [];
        $clientes = $userController->executarAcao($acao, $parametros);
    }

    if ($acao === 'pesquisar' && isset($_POST["search_terms"])) {
        $search_terms = $_POST["search_terms"];
        $search_array = explode(" ", $search_terms);

        $where_conditions = [];

        foreach ($search_array as $term) {
            $where_conditions[] = "(nome_usuario LIKE '%$term%' OR cpf LIKE '%$term%' OR email LIKE '%$term%')";
        }

        // Construir a condição de pesquisa com base nos termos fornecidos
        $where_clause = implode(" AND ", $where_conditions);

        // Consultar usuários do banco de dados com base nas condições de pesquisa
        if (!empty($where_conditions)) {
            $result = $conn->query("SELECT * FROM usuario WHERE $where_clause");

            if ($result) {
                while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
                    $clientes[] = $row;
                }
            }
        }
    } else {
        // Lógica padrão quando não é uma pesquisa
        $clientes = $userController->executarAcao($acao, $parametros);
    }

    if (isset($_GET['mensagem'])) {
        echo "<p>{$_GET['mensagem']}</p>";
    }

?>

  <!-- TABELA USUÁRIO -->
  <div class="container pt-4" id="tabelaUsuario">
    <h3 class="welcome-text" style="margin-bottom: 30px;">Histórico de <strong>Usuários</strong> </h3>
    <hr style=" margin-bottom: 20px;" >
    <div class="layout-wrapper layout-content-navbar">
      <div class="layout-container">
          <div class="content-wrapper">
            <div class="container-xxl flex-grow-1 container-p-y">
              <div class="card mb-4">
               <!-- card-body -->
               <div class="card-body">
                  <div class="row gx-3 gy-2 align-items-center" >
                 
                  <div class="col-md-2 float-left">
                    <!-- <label for="defaultFormControlInput">Pesquisar</label>
                    <input
                        type="text"
                        class="form-control"
                        id="defaultFormControlInput"
                        placeholder="digite aqui.."
                        aria-describedby="defaultFormControlHelp"
                    />
                </div>
                <div class="col-md-2 float-left">
                    <label class="form-label" for="showToastPlacement">&nbsp;</label>
                    <button id="showToastPlacement" class="btn d-block" style="border:none; padding: 0px 2px; width: 28px; box-shadow: none;">
                        <span class="material-symbols-outlined" id="iconSearch" onclick="buscarPorCPF()">search</span>
                    </button> -->
                     <!-- Adicione o formulário de pesquisa -->
                    
                </div>
                <form method="POST"  action="http://localhost/ConsultaTelefone/historico-usuario">
                        <div class="input-group ">
                            <input type="text" class="form-control" placeholder="Pesquisar por Nome, CPF ou Email" name="acao" aria-describedby="button-search">

                            <button class="btn" type="submit" id="button-search" style="background-color:#35aad4; color:#fff; margin:5px;  width: 169px; border-radius: 10px; padding:8px">Pesquisar</button>

                            <button id="btnGerarPDF" class="btn d-block" style="background-color:#35aad4; color:#fff; margin:5px; width: 169px; border-radius: 10px;padding:8px 10px" >Exportar</button>
                        </div>

                    </form>

                    <!-- <div class="col-md-2 float-left" style=" margin-left: 40px;" >
                        <label class="form-label" for="showToastPlacement">&nbsp;</label>
                        <button class="btn d-block" style="background-color:#35aad4; color:#fff; padding: 5px 22px; width: 179px;" onclick="criarUsuario()">Criar Usuário</button>
                    </div> -->
                  </div>
                </div>
                <!-- fim card-body -->
              </div>
              <div class="card mb-4">
                <h5 class="card-header">Usuários</h5>
                <div class="table-responsive text-nowrap">
                    <table class="table table-striped" id="tabela">
                    <thead>
                        <tr>
                        <th>ID</th>
                        <th>Login</th>
                        <th>Usuário</th>
                        <th>Status</th>
                        <th>Email</th>
                        <th>CPF</th>
                        <th></th>
                        <th></th>

                        </tr>
                    </thead>
                    <tbody class="table-border-bottom-0">
                  
                        <?php foreach ($clientes as $cliente) : ?>
                            <tr>
                                <td><?php echo $cliente['id_usuario']; ?></td>
                                <td><?php echo $cliente['login']; ?></td>
                                <td><?php echo $cliente['nome_usuario']; ?></td>
                                <td><?php echo $cliente['status']; ?></td>
                                <td><?php echo $cliente['email']; ?></td>
                                <td><?php echo $cliente['cpf']; ?></td>

                                <!-- <td><span class="material-symbols-outlined" onclick="editarUsuario('<?php echo $cliente['id_usuario']; ?>', '<?php echo $cliente['nome_usuario']; ?>', '<?php echo $cliente['sexo']; ?>', '<?php echo $cliente['data_nasc']; ?>', '<?php echo $cliente['nome_materno']; ?>', '<?php echo $cliente['login']; ?>', '<?php echo $cliente['email']; ?>', '<?php echo $cliente['cpf']; ?>', '<?php echo $cliente['celular']; ?>', '<?php echo $cliente['telefone']; ?>', '<?php echo $cliente['cep']; ?>', '<?php echo $cliente['logradouro']; ?>', '<?php echo $cliente['bairro']; ?>', '<?php echo $cliente['uf']; ?>', '<?php echo $cliente['senha']; ?>', '<?php echo $cliente['tipoUser']; ?>', '<?php echo $cliente['status']; ?>')">edit</span></td> -->

                                <td><span class="material-symbols-outlined" onclick="detalhesUsuario('<?php echo $cliente['id_usuario']; ?>', '<?php echo $cliente['nome_usuario']; ?>', '<?php echo $cliente['sexo']; ?>', '<?php echo $cliente['data_nasc']; ?>', '<?php echo $cliente['nome_materno']; ?>', '<?php echo $cliente['login']; ?>', '<?php echo $cliente['email']; ?>', '<?php echo $cliente['cpf']; ?>', '<?php echo $cliente['celular']; ?>', '<?php echo $cliente['telefone']; ?>', '<?php echo $cliente['cep']; ?>', '<?php echo $cliente['logradouro']; ?>', '<?php echo $cliente['bairro']; ?>', '<?php echo $cliente['uf']; ?>', '<?php echo $cliente['senha']; ?>', '<?php echo $cliente['tipoUser']; ?>', '<?php echo $cliente['status']; ?>')">info</span></td>

                                <td>
                                    <button onclick="excluirUsuario(<?php echo $cliente['id_usuario']; ?>)" style="border: none;background:none"><span class="material-symbols-outlined">delete</span></button>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                    </table>
                </div>
            </div>
            </div>
            <div class="content-backdrop fade"></div>
          </div>
        </div>
      </div>
      <div class="layout-overlay layout-menu-toggle"></div>
    </div>
  </div>

    <!--Modal de detalhes -->
    <div class="modal fade" id="userDetailsModal" tabindex="-1" aria-labelledby="userDetailsModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="userDetailsModalLabel">Detalhes do Usuário</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body" id="userDetailsContent">
                    <!-- As informações do usuário serão exibidas aqui -->
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
                </div>
            </div>
        </div>
    </div>


    <!-- Modal de Edição -->
    <div class="modal fade" id="editarUsuarioModal" tabindex="-1" aria-labelledby="editarUsuarioModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editarUsuarioModalLabel">Editar Usuário</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                   <!-- Formulário de Edição -->
                    <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
                        <input type="hidden" name="edit_id" id="edit_id_modal">
                        <label for="edit_nome_usuario_modal">Novo Nome do Usuário:</label>
                        <input type="text" id="edit_nome_usuario_modal" name="edit_nome_usuario" required>

                        <!-- Inclua outros campos aqui, por exemplo: -->
                        <label for="edit_login_modal">Novo login:</label>
                        <input type="text" id="edit_login_modal" name="edit_login" required>

                        <!-- Adicione outros campos conforme necessário -->

                        <button type="submit" class="btn btn-primary">Salvar Edição</button>
                    </form>

                </div>
            </div>
        </div>
    </div>


  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
  
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.4.0/jspdf.umd.min.js"></script>     
  
  
  <script>

    function imprimirTela() {
            window.print();
        }

    function detalhesUsuario(userId, nome_usuario, sexo, data_nasc, nome_materno, login, email, cpf, celular, telefone, cep, logradouro, bairro, uf, senha, tipoUser, status) {
        // Preencher as informações do usuário no modal
        var userDetailsContent = document.getElementById('userDetailsContent');
        userDetailsContent.innerHTML = `
            <div>
            <p>ID: ${userId}</p>
            <p>Nome do Usuário: ${nome_usuario}</p>
            </div>

            <div>
            <p>Sexo: ${sexo}</p>
            <p>Data de Nascimento: ${data_nasc}</p>
            </div>

            <div>
            <p>Nome Materno: ${nome_materno}</p>
            <p>Login: ${login}</p>
            </div>

            <div>
            <p>Email: ${email}</p>
            <p>CPF: ${cpf}</p>
            </div>

            <div>
            <p>Celular: ${celular}</p>
            <p>Telefone: ${telefone}</p>
            </div>

            <div>
            <p>CEP: ${cep}</p>
            <p>Logradouro: ${logradouro}</p>
            </div>

            <div>
            <p>Bairro: ${bairro}</p>
            <p>UF: ${uf}</p>
            </div>

            <div>
            <p>Senha: ${senha}</p>
            <p>Tipo de Usuário: ${tipoUser}</p>
            <p>Status: ${status}</p>
            </div>
        `;

        // Abre o modal
        var userDetailsModal = new bootstrap.Modal(document.getElementById('userDetailsModal'));
        userDetailsModal.show();
    }

    function editarUsuario(id, nome_usuario, sexo, data_nasc, nome_materno, login, email, cpf, celular, telefone, cep, logradouro, bairro, uf, senha, tipoUser, status) {

        document.getElementById("edit_id_modal").value = id;
        document.getElementById("edit_nome_usuario_modal").value = nome_usuario;
        document.getElementById("edit_login_modal").value = login; // Corrigido aqui

    

    var editarUsuarioModal = new bootstrap.Modal(document.getElementById('editarUsuarioModal'));
    editarUsuarioModal.show();
    }

    function excluirUsuario(userId) {
    if (confirm("Tem certeza de que deseja excluir este usuário?")) {
        Swal.fire({
            title: 'Tem certeza?',
            text: 'Esta ação não pode ser revertida!',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Sim, exclua!',
            cancelButtonText: 'Cancelar'
        }).then((result) => {
            if (result.isConfirmed) {
                fetch(window.location.href, {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/x-www-form-urlencoded',
                    },
                    body: 'id=' + userId,
                })
                .then(response => response.json())
                .then(data => {
                    if (data.success) {
                        // Remover a linha da tabela
                        var row = document.querySelector('tr[data-id="' + userId + '"]');
                        if (row) {
                            row.remove();
                        }

                        Swal.fire({
                            title: 'Excluído!',
                            text: 'Usuário excluído com sucesso.',
                            icon: 'success',
                            timer: 5000, // 5 segundos
                            timerProgressBar: true,
                            onClose: () => {
                                location.reload();
                            }
                        });
                    } else {
                        Swal.fire({
                            title: 'Erro!',
                            text: 'Erro ao excluir o usuário: ' + data.error,
                            icon: 'error'
                        });
                    }
                })
                .catch(error => console.error('Erro ao excluir usuário:', error));
            }
        });
    }
}

    document.getElementById('btnGerarPDF').addEventListener('click', function() {
      // Instancia o objeto jsPDF
      var doc = new jsPDF();

      // Pega a tabela
      var tabela = document.getElementById('tabela');

      // Converte a tabela para um array de arrays de dados
      var dados = [];
      var linhas = tabela.getElementsByTagName('tr');
      for (var i = 0; i < linhas.length; i++) {
         var linha = [];
         var colunas = linhas[i].getElementsByTagName('td');
         for (var j = 0; j < colunas.length; j++) {
            linha.push(colunas[j].innerText);
         }
         dados.push(linha);
      }

      // Adiciona os dados ao PDF
      doc.autoTable({
         head: [['ID', 'Usuário', 'Login','Status','Email'  ]], // Cabeçalho da tabela no PDF
         body: dados,
      });

      doc.save('tabela.pdf');
   });
  </script>
</body>
</html>
