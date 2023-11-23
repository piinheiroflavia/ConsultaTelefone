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

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if ($_POST['acao'] === 'excluirUsuario') {
            $idUsuarioParaExcluir = isset($_POST['id']) ? $_POST['id'] : null;

            if ($idUsuarioParaExcluir !== null) {
                $resultadoExclusao = $userController->executarAcao('excluirUsuario', ['id' => $idUsuarioParaExcluir]);

                if (isset($resultadoExclusao['mensagem'])) {
                    echo $resultadoExclusao['mensagem'];
                    exit;
                }
            }
        } elseif ($_POST['acao'] === 'criarUsuario') {
            // Lógica para criar um usuário
            $nomeNovoUsuario = $_POST['nomeNovoUsuario'];
            // Adicione lógica para criar o usuário com os dados fornecidos
        } elseif ($_POST['acao'] === 'editarUsuario') {
            // Lógica para editar um usuário
            $idUsuarioParaEditar = isset($_POST['id']) ? $_POST['id'] : null;
            // Adicione lógica para editar o usuário com os dados fornecidos
        } elseif ($_POST['acao'] === 'detalhesUsuario') {
            // Lógica para obter detalhes de um usuário
            $idUsuarioDetalhes = isset($_POST['id']) ? $_POST['id'] : null;
            // Adicione lógica para obter e exibir os detalhes do usuário
        } else {
            $clientes = $userController->executarAcao($_POST['acao'], $parametros);
        }
    } else {
        $clientes = $userController->executarAcao($acao, $parametros);
    }


    

    if (isset($_GET['mensagem'])) {
        echo "<p>{$_GET['mensagem']}</p>";
    }
?>

<?php
// // Processar a edição de usuário
// if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["edit_id"])) {
//     $edit_id = $_POST["edit_id"];

//     // Recuperar os dados atuais do usuário do banco de dados usando a classe UserController
//     $currentUser = $userController->consultarUsuario($edit_id);

//     if ($currentUser) {
//         // Verificar e atualizar apenas os campos alterados
//         $fields_to_update = [];
//         $edit_fields = ['nome_usuario', 'login', /* adicione outros campos aqui */];

//         foreach ($edit_fields as $field) {
//             if (isset($_POST["edit_$field"]) && $_POST["edit_$field"] != $currentUser[$field]) {
//                 $fields_to_update[$field] = $_POST["edit_$field"];
//             }
//         }

//         // Construir a atualização somente para os campos alterados
//         if (!empty($fields_to_update)) {
//             $set_clause = implode(', ', array_map(function ($field) use ($fields_to_update) {
//                 return "$field = '{$fields_to_update[$field]}'";
//             }, array_keys($fields_to_update)));

//             $sql_update = "UPDATE usuario SET $set_clause WHERE id_usuario = $edit_id";
//             $conn->query($sql_update);
//         }
//     }
// } 


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
                 
                  <div class="col-md-2">
                        <div>
                            <label for="defaultFormControlInput" class="form-label">Pesquisar</label> 
                            <input
                            type="text"
                            class="form-control"
                            id="defaultFormControlInput"
                            placeholder="digite aqui.."
                            aria-describedby="defaultFormControlHelp"
                            />  
                      </div>
                      
                    </div>                                 
                    <div class="col-md-2 float-left" >
                        <label class="form-label" for="showToastPlacement">&nbsp;</label>
                        <button id="showToastPlacement" class="btn d-block" style="border:none; padding: 0px 2px; width: 28px; box-shadow: none;">
                            <span class="material-symbols-outlined" id="iconSearch" onclick="buscarUsuarios()">search</span>
                        </button>
                    </div>
                    <div class="col-md-2 float-left" style=" margin-left: 370px;" >
                        <label class="form-label" for="showToastPlacement">&nbsp;</label>
                        <button id="showToastPlacement" class="btn d-block" style="background-color:#35aad4; color:#fff;     padding: 5px 22px;  width: 169px; ">Exportar PDF</button>
                    </div>
                    <div class="col-md-2 float-left" style=" margin-left: 10px;" >
                        <label class="form-label" for="showToastPlacement">&nbsp;</label>
                        <button class="btn d-block" style="background-color:#35aad4; color:#fff; padding: 5px 22px; width: 189px;" onclick="criarUsuario()">Criar Usuário</button>
                    </div>
                  </div>
                </div>
                <!-- fim card-body -->
              </div>
              <div class="card mb-4">
                <h5 class="card-header">Usuários</h5>
                <div class="table-responsive text-nowrap">
                    <table class="table table-striped">
                    <thead>
                        <tr>
                        <th>ID</th>
                        <th>Usuário</th>
                        <th>Login</th>
                        <th>Status</th>
                        <th>Email</th>

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

                                <td><span class="material-symbols-outlined" onclick="editarUsuario('<?php echo $cliente['id_usuario']; ?>', '<?php echo $cliente['nome_usuario']; ?>', '<?php echo $cliente['sexo']; ?>', '<?php echo $cliente['data_nasc']; ?>', '<?php echo $cliente['nome_materno']; ?>', '<?php echo $cliente['login']; ?>', '<?php echo $cliente['email']; ?>', '<?php echo $cliente['cpf']; ?>', '<?php echo $cliente['celular']; ?>', '<?php echo $cliente['telefone']; ?>', '<?php echo $cliente['cep']; ?>', '<?php echo $cliente['logradouro']; ?>', '<?php echo $cliente['bairro']; ?>', '<?php echo $cliente['uf']; ?>', '<?php echo $cliente['senha']; ?>', '<?php echo $cliente['tipoUser']; ?>', '<?php echo $cliente['status']; ?>')">edit</span></td>

                                <td><span class="material-symbols-outlined" onclick="detalhesUsuario('<?php echo $cliente['id_usuario']; ?>', '<?php echo $cliente['nome_usuario']; ?>', '<?php echo $cliente['sexo']; ?>', '<?php echo $cliente['data_nasc']; ?>', '<?php echo $cliente['nome_materno']; ?>', '<?php echo $cliente['login']; ?>', '<?php echo $cliente['email']; ?>', '<?php echo $cliente['cpf']; ?>', '<?php echo $cliente['celular']; ?>', '<?php echo $cliente['telefone']; ?>', '<?php echo $cliente['cep']; ?>', '<?php echo $cliente['logradouro']; ?>', '<?php echo $cliente['bairro']; ?>', '<?php echo $cliente['uf']; ?>', '<?php echo $cliente['senha']; ?>', '<?php echo $cliente['tipoUser']; ?>', '<?php echo $cliente['status']; ?>')">info</span></td>

                                <td><span class="material-symbols-outlined" onclick="deleteUser(<?php echo $cliente['id_usuario']; ?>)">delete</span></td>

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
      <!-- Overlay -->
      <div class="layout-overlay layout-menu-toggle"></div>
    </div>
    <!-- / Layout wrapper -->
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

  <script>

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
    // Preencher os campos do modal com os dados do usuário
    document.getElementById("edit_id_modal").value = id;
        document.getElementById("edit_nome_usuario_modal").value = nome_usuario;
        document.getElementById("edit_login_modal").value = login; // Corrigido aqui

    
    // Preencha outros campos conforme necessário

    // Abrir o modal de edição
    var editarUsuarioModal = new bootstrap.Modal(document.getElementById('editarUsuarioModal'));
    editarUsuarioModal.show();
    }



    function deleteUser(userId){   
      Swal.fire({
      title: 'Deletar Usuário',
      text: "Essa ação não pode ser revertida!",
      icon: 'warning',
      showCancelButton: true,
      confirmButtonColor: '#3085d6',
      cancelButtonColor: '#d33',
      confirmButtonText: 'ok',
      cancelButtonText: 'cancelar'
        }).then((result) => {
        if (result.isConfirmed) {
            Swal.fire(
            'Usuário deletado com sucesso!',
            'Esse usuário não existe mais',
            'success'
            )
        }
        })
    }

    // function buscarUsuarios() {
    //     // Fazer solicitação AJAX para buscar usuários
    //     var termoPesquisa = document.getElementById('defaultFormControlInput').value;

    //     fetch('http://localhost/ConsultaTelefone/historico-usuario', {
    //         method: 'POST',
    //         headers: {
    //             'Content-Type': 'application/x-www-form-urlencoded',
    //         },
    //         body: 'acao=buscarUsuarios&termoPesquisa=' + termoPesquisa,
    //     })
    //     .then(response => response.json())
    //     .then(data => {
    //         // Atualizar a tabela com os resultados da busca
    //         var tbody = document.querySelector('.table tbody');
    //         tbody.innerHTML = '';

    //         data.forEach(function(cliente) {
    //             var row = document.createElement('tr');
    //             row.innerHTML = `
    //                 <td>${cliente.id_usuario}</td>
    //                 <td>${cliente.login}</td>
    //                 <td>${cliente.nome_usuario}</td>
    //                 <td>${cliente.status}</td>
    //                 <td>${cliente.email}</td>
    //                 <td>${cliente.cpf}</td>
    //                 <td>${cliente.celular}</td>
    //                 <td><span class="material-symbols-outlined" onclick="editarUsuario(${cliente.id_usuario})">info</span></td>
    //                 <td><span class="material-symbols-outlined" onclick="deleteUser(${cliente.id_usuario})">delete</span></td>
    //             `;

    //             tbody.appendChild(row);
    //         });
    //     })
    //     .catch(error => console.error('Erro ao buscar usuários:', error));
    // }

    // Função fictícia para editar usuário (substitua pelo seu código real)

  </script>
</body>
</html>
