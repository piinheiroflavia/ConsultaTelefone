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

    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.7/css/jquery.dataTables.min.css">
    <script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>

    <!-- External Libraries -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="../../extensions/Editor/css/editor.dataTables.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/select/1.7.0/css/select.dataTables.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.4.2/css/buttons.dataTables.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/datetime/1.5.1/css/dataTables.dateTime.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/colreorder/1.7.0/css/colReorder.dataTables.min.css">

    <script src="https://code.jquery.com/jquery-3.7.0.js"></script>
    <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
    <script src="../../extensions/Editor/js/dataTables.editor.min.js"></script>
    <script src="https://cdn.datatables.net/select/1.7.0/js/dataTables.select.min.js"></script>
    <script src="https://cdn.datatables.net/datetime/1.5.1/js/dataTables.dateTime.min.js"></script>
    <script src="https://cdn.datatables.net/colreorder/1.7.0/js/dataTables.colReorder.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.4.2/js/dataTables.buttons.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.10.1/jszip.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.4.2/js/buttons.html5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.4.2/js/buttons.print.min.js"></script>


    <style>
         .modal-content{
            width: 600px;
        }
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

   
    $clientes = $userController->executarAcao($acao, $parametros);
   
?>
 <div class="container pt-4" id="tabelaUsuario">
    <h3 class="welcome-text" style="margin-bottom: 30px;">Histórico de <strong>Usuários</strong> </h3>
    <hr style=" margin-bottom: 20px;" >
    <div class="layout-wrapper layout-content-navbar">
      <div class="layout-container">
          <div class="content-wrapper">
            <div class="container-xxl flex-grow-1 container-p-y">
              <div class="card mb-4">
              
               <div class="card-body">
               
               <table id="tabelaUsers" class="table table-hover" style="width: 100% !important;">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nome do Usuário</th>                      
                        <th>Login</th>
                        <th>Email</th>
                        <th>CPF</th>                    
                        <th>Status</th>
                        <th></th>
                        
                    </tr>
                </thead>
                <tbody>
                </tbody>
                </table>
                </div>
            </div>
            </div>
        </div>
        </div>
      </div>
      <div class="layout-overlay layout-menu-toggle"></div>
    </div>
  </div>

    <!--Modal de detalhes -->
    <div class="modal fade" id="userDetailsModal" tabindex="-1" aria-labelledby="userDetailsModalLabel" aria-hidden="true" >
        <div class="modal-dialog">
            <div class="modal-content" >
                <div class="modal-header">
                    <h5 class="modal-title" id="userDetailsModalLabel">Detalhes do Usuário</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body" id="userDetailsContent">
                </div>
                <!-- <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
                </div> -->
            </div>
        </div>
    </div>
    
  
  <script>
   var clientes = <?php echo json_encode($clientes); ?>;
   console.log(clientes);


    $(document).ready(function() {
        var table = $('#tabelaUsers').DataTable({
            data: clientes,
            columns: [
                { data: 'id_usuario' },
                { data: 'nome_usuario' },
                { data: 'login' },
                { data: 'email' },
                { data: 'cpf' },
                { data: 'status' },
                {
                    data: 'id_usuario',
                    render: function (data, type, row, meta) {
                        return `
                            <div>
                                <button class="btn-detalhes" data-usuario-id="${data}" style="border: none;background:none">
                                    <span class="material-symbols-outlined">info</span>
                                </button>
                                <button class="btn-excluir" data-usuario-id="${data}" style="border: none;background:none">
                                    <span class="material-symbols-outlined">delete</span>
                                </button>
                            </div>
                        `;
                    }
                }
            ],
            "order": [[0, "desc"]],
            "pageLength": 10,
            dom: 'Bfrtip', 
            buttons: [
                    {
                        extend: 'collection',
                        text: 'Export',
                        buttons: [
                        'copy', 'excel', 'csv', 'pdf', 'print'
                        ]
                    }
                ]
            
        });


        // Função para exibir detalhes do usuário no modal
        function exibirDetalhesUsuario(userId) {
            // Encontrar o usuário pelo ID
            var usuario = clientes.find(function(user) {
                return user.id_usuario === userId;
            });

            // Atualizar o conteúdo do modal com as informações do usuário
            $('#userDetailsContent').html(`

            <div class="row gx-3 mb-3">
                <div class="col-md-4">
                    <p><strong>ID: </strong>${usuario.id_usuario}</p>
                </div>
                <div class="col-md-8">
                     <p><strong>Nome do Usuário: </strong>${usuario.nome_usuario}</p>
                </div>
            </div>
            <div class="row gx-3 mb-3">
                <div class="col-md-4">
                    <p><strong>Sexo: </strong>${usuario.sexo}</p>
                </div>
                <div class="col-md-8">
                     <p><strong>Data Nascimento: </strong>${usuario.data_nasc}</p>
                </div>
            </div>
            <div class="row gx-3 mb-3">
                <div class="col-md-4">
                    <p><strong>Login: </strong>${usuario.login}</p>
                </div>
                <div class="col-md-8">
                     <p><strong>Email: </strong>${usuario.email}</p>
                </div>
            </div>
            <div class="row gx-3 mb-3">
                <div class="col-md-4">
                    <p><strong>CPF: </strong>${usuario.cpf}</p>
                </div>
                <div class="col-md-8">
                    <p><strong>Celular: </strong>${usuario.celular}</p>
                </div>
            </div>

            <div class="row gx-3 mb-3">
                <div class="col-md-4">
                     <p><strong>Status: </strong>${usuario.status}</p>
                </div>
                <div class="col-md-8">
                     <p><strong>Telefone: </strong>${usuario.telefone}</p>
                </div>
            </div>
            <div class="row gx-3 mb-3">
                <div class="col-md-4">
                    <p><strong>Cep: </strong>${usuario.cep}</p>
                </div>
                <div class="col-md-8">
                     <p><strong>Logradouro: </strong>${usuario.logradouro}</p>
                </div>
            </div>
            <div class="row gx-3 mb-3">
                <div class="col-md-4">
                    <p><strong>bairro: </strong>${usuario.bairro}</p>
                </div>
                <div class="col-md-8">
                     <p><strong>uf: </strong>${usuario.uf}</p>
                </div>
            </div>
            `);

            // Exibir o modal
            $('#userDetailsModal').modal('show');
        }

        $('#tabelaUsers tbody').on('click', '.btn-detalhes', function () {
            var data = table.row($(this).parents('tr')).data();
            exibirDetalhesUsuario(data.id_usuario);
        }); 




         // Função para excluir um usuário via AJAX
        function excluirUsuario(idUsuario) {
            console.log('id', idUsuario);
            $.ajax({
                type: 'POST',
                url: './views/sist/admin/delete_user.php', 
                data: { id: idUsuario },
                    success: function (response) {
                        Swal.fire({
                                    title: "Usuário excluido com sucesso!",
                                    icon: "success",
                                    showCancelButton: false,
                                    confirmButtonColor: "#3085d6",
                                    cancelButtonColor: "#d33",
                                    confirmButtonText: "Ok",
                                }).then((result) => {
                                    if (result.isConfirmed) {
                                        window.location.href = "./historico-usuario";
                                    } else {
                                        // Código para lidar com a escolha de "Sair"
                                    }
                                });
                },
                error: function () {
                    console.log('erro1', data);
                    console.log("Erro na solicitação AJAX");
                    Swal.fire({
                        title: 'Erro!',
                        text: 'Erro ao se comunicar com o servidor.',
                        icon: 'error',
                    });
                }
            });
        }

        // Delegação de eventos para os botões
        $('#tabelaUsers tbody').on('click', '.btn-excluir', function () {
            console.log('excluir', data);
            var data = table.row($(this).parents('tr')).data();
            var idUsuario = data.id_usuario;
            console.log('excluir1', data);
            Swal.fire({
                title: 'Tem certeza?',
                text: 'Esta ação não pode ser desfeita!',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#d33',
                cancelButtonColor: '#3085d6',
                confirmButtonText: 'Sim, excluir!'
            }).then((result) => {
                if (result.isConfirmed) {
                    excluirUsuario(idUsuario);
                }
            });
        });





    });

    
    </script>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.4.0/jspdf.umd.min.js"></script>     
  
    <script type="text/javascript" src="https://cdn.datatables.net/buttons/2.2.3/js/dataTables.buttons.min.js" asp-append-version="true"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/buttons/2.2.3/js/buttons.html5.min.js" asp-append-version="true"></script>
    <script src="https://cdn.datatables.net/plug-ins/1.11.4/i18n/pt_br.json"></script>
    <!-- Inclua outros scripts externos se necessário... -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
   
</body>
</html>
