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

</head>
<body>

<?php
  $userController = new UserController($conexao);
  $acao = 'selectAllLogs';
  $parametros = [];
  $logs = [];

  $logs = $userController->executarAcao($acao, $parametros);


?>
<div class="container pt-2" id="tabelaUsuario">
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
                        <th>id</th>
                        <th>Usuário</th>  
                        <th>Categoria</th>                      
                        <th>status</th>
                        <th>Data de Registro</th>
                        <th>Descrição</th>                    
                    </tr>
                </thead>
                <tbody>
                </div>
            </div>
            </div>
        </div>
        </div>
      </div>
    </div>
  </div>


    
  
  
  <script>

   var logs = <?php echo json_encode($logs); ?>;
   console.log(logs);


    $(document).ready(function() {
        $('#tabelaUsers').DataTable({
            data: logs,
            columns: [
                { data: 'id_log' },
                { data: 'nome_usuario' },
                { data: 'tipoUser' },
                { data: 'status' },
                { data: 'data_log' },
                { data: 'descricao' }
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
