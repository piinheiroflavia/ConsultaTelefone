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
                        <th>Senha</th>
                        <th>Status</th>
                        <th></th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                </div>
            </div>
            </div>
        </div>
        </div>
      </div>
      <div class="layout-overlay layout-menu-toggle"></div>
    </div>
  </div>


    
  
  
  <script>

   var clientes = <?php echo json_encode($clientes); ?>;
   console.log(clientes);


    $(document).ready(function() {
        $('#tabelaUsers').DataTable({
            data: clientes,
            columns: [
                { data: 'id_usuario' },
                { data: 'nome_usuario' },
                { data: 'login' },
                { data: 'email' },
                { data: 'cpf' },
                { data: 'senha' },
                { data: 'status' },
                {
                    "data": null,
                    "title": "Ação",
                    "render": function(data, type, row) {
                       
                        return '<div><button onclick="excluirUsuario(' + row.id_usuario + ')" style="border: none;background:none"><span class="material-symbols-outlined">info</span></button></div>';
                    }
                },
                {
                    "data": null,
                    "title": "Ação",
                    "render": function(data, type, row) {
                       
                        return '<div><button onclick="excluirUsuario(' + row.id_usuario + ')" style="border: none;background:none"><span class="material-symbols-outlined">delete</span></button></div>';
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
            // Adicione configurações adicionais do DataTables conforme necessário
        });
    });


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

    </script>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.4.0/jspdf.umd.min.js"></script>     
  
    <script type="text/javascript" src="https://cdn.datatables.net/buttons/2.2.3/js/dataTables.buttons.min.js" asp-append-version="true"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/buttons/2.2.3/js/buttons.html5.min.js" asp-append-version="true"></script>
    <script src="https://cdn.datatables.net/plug-ins/1.11.4/i18n/pt_br.json"></script>
</body>
</html>
