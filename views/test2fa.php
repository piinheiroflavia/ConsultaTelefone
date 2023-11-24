<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-table/1.18.3/bootstrap-table.min.css">

  <title>Bootstrap Table Example</title>
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

<table
  id="table"
  data-toggle="table"
  data-height="460"
  data-pagination="true"
  data-pagination-pre-text="Previous"
  data-pagination-next-text="Next">

  <thead>
    <tr>
      <th scope="col">#</th>
      <th data-field="id">ID</th>
      <th data-field="name">Item Name</th>
      <th data-field="price">Item Price</th>
      <th data-field="descricao">descricao</th>
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

<div id="toolbar" class="form-inline">
</div>

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-table/1.18.3/bootstrap-table.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-table/1.18.3/extensions/export/bootstrap-table-export.min.js"></script>
<script src="https://rawgit.com/hhurz/tableExport.jquery.plugin/master/tableExport.js"></script>
<script src="https://rawgit.com/hhurz/tableExport.jquery.plugin/master/jquery.base64.js"></script>

</body>
</html>
