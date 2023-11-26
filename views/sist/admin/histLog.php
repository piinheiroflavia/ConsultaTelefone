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

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-table/1.18.3/bootstrap-table.min.css">

    <script src="https://cdn.jsdelivr.net/npm/tableexport.jquery.plugin@1.10.21/tableExport.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/tableexport.jquery.plugin@1.10.21/libs/jsPDF/jspdf.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/tableexport.jquery.plugin@1.10.21/libs/jsPDF-AutoTable/jspdf.plugin.autotable.js"></script>

</head>
<body>

<?php
        $dbDrive = 'mysql';
        $dbhost = 'localhost';
        $dbUsername = 'root';
        $dbPassword = '';
        $dbName = 'gp_03_consultanumero';
        $conn = new mysqli($dbhost, $dbUsername, $dbPassword, $dbName);

// Verifica a conexão
if ($conn->connect_error) {
    die("Falha na conexão com o banco de dados: " . $conn->connect_error);
}

// Query para selecionar os dados da tabela de log
$sql = "SELECT * FROM log";
$result = $conn->query($sql);
?>

<div class="container pt-4" id="tabelaUsuario">
    <h3 class="welcome-text" style="margin-bottom: 30px;">Histórico de <strong>Logs</strong> </h3>
    <hr style=" margin-bottom: 20px;" >



<table
style="background: #fff;"
  id="table"
  data-toggle="table"
  data-height="600"
  data-show-export="true"
  data-pagination="true"
  data-pagination-pre-text="Previous"
  data-pagination-next-text="Next">

  <thead>
    <tr>
      <th scope="col">id</th>
      <th data-field="id">Usuário</th>
      <th data-field="name">Status</th>
      <th data-field="price">Data Registro</th>
      <th data-field="descricao">Descrição</th>
    </tr>
  </thead>
  <tbody class="table-group-divider">
    <?php
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            echo "<tr>
                    <th scope='row'>" . $row['id_log'] . "</th>
                    <td>" . $row['usuario_id'] . "</td>
                    <td>" . $row['status'] . "</td>
                    <td>" . $row['data_log'] . "</td>
                    <td>" . $row['descricao'] . "</td>
                  </tr>";
        }
    } else {
        echo "Nenhum registro encontrado.";
    }

    // Fecha a conexão
    $conn->close();
    ?>
  </tbody>
</table>
<div>
<div id="toolbar" class="form-inline">
</div>
<script>
  var $table = $('#table')

  $(function() {
    $('#toolbar').find('select').change(function () {
      $table.bootstrapTable('destroy').bootstrapTable({
        exportDataType: $(this).val(),
        exportTypes: ['csv', 'txt', 'excel', 'pdf', 'print'],
        columns: [
          {field: 'state', checkbox: true, visible: true},
          {field: 'id', title: 'ID'},
          {field: 'usuario_id', title: 'Usuário'},
          {field: 'status', title: 'Status'},
          {field: 'data_log', title: 'Data Registro'},
          {field: 'descricao', title: 'Descrição'}
        ]
      })
    }).trigger('change')
  })
</script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.4.0/jspdf.umd.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/tableexport.jquery.plugin/tableExport.min.js"></script>

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-table/1.18.3/bootstrap-table.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-table/1.18.3/extensions/export/bootstrap-table-export.min.js"></script>
    <script src="https://rawgit.com/hhurz/tableExport.jquery.plugin/master/tableExport.js"></script>
    <script src="https://rawgit.com/hhurz/tableExport.jquery.plugin/master/jquery.base64.js"></script>

</body>
</html>
