<?php
include_once('config.php');

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gerenciamento de Usuários</title>
    <style>
        table {
            border-collapse: collapse;
            width: 100%;
            margin-top: 20px;
        }

        table,
        th,
        td {
            border: 1px solid black;
        }

        th,
        td {
            padding: 10px;
            text-align: left;
        }

        th {
            background-color: #f2f2f2;
        }

        form {
            margin-bottom: 20px;
        }
    </style>

    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>

<body>
<?php
        // Conexão com o banco de dados (substitua pelos seus próprios dados)
        $dbDrive = 'mysql';
        $dbhost = 'localhost';
        $dbUsername = 'root';
        $dbPassword = '';
        $dbName = 'gp_03_consultanumero';
        $conn = new mysqli($dbhost, $dbUsername, $dbPassword, $dbName);

        if ($conn->connect_error) {
            die("Erro de conexão: " . $conn->connect_error);
        }

        // Processar a exclusão de usuário
        if (isset($_GET["selectId"])) {
            $id = $_GET["selectId"];

            
            // Excluir usuário do banco de dados
            $sql = "select * FROM usuario WHERE id_usuario=$id";
            $conn->query($sql);
        }

        // Processar o formulário de criação de usuário
        if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["nome_usuario"], $_POST["email"])) {
            $nome_usuario = $_POST["nome_usuario"];
            $email = $_POST["email"];

            // Inserir usuário no banco de dados
            $sql = "INSERT INTO usuario (nome_usuario, email) VALUES ('$nome_usuario', '$email')";
            $conn->query($sql);
        }





        // Processar a exclusão de usuário
        if (isset($_GET["delete"])) {
            $id = $_GET["delete"];

            // Excluir usuário do banco de dados
            $sql = "DELETE FROM usuario WHERE id_usuario=$id";
            $conn->query($sql);
        }

        // Processar a edição de usuário
    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["edit_id"])) {
    $edit_id = $_POST["edit_id"];

    // Recuperar os dados atuais do usuário do banco de dados
    $sql_select = "SELECT * FROM usuario WHERE id_usuario = $edit_id";
    $result_select = $conn->query($sql_select);

    if ($result_select) {
        $row = $result_select->fetch_assoc();

        // Verificar e atualizar apenas os campos alterados
        $fields_to_update = [];
        $edit_fields = [
            'nome_usuario', 'sexo', 'data_nasc', 'nome_materno',
            'login', 'email', 'cpf', 'celular', 'telefone',
            'cep', 'logradouro', 'bairro', 'uf', 'senha',
            'tipoUser', 'status'
        ];

        foreach ($edit_fields as $field) {
            if (isset($_POST["edit_$field"]) && $_POST["edit_$field"] != $row[$field]) {
                $fields_to_update[$field] = $_POST["edit_$field"];
            }
        }

        // Construir a atualização somente para os campos alterados
        if (!empty($fields_to_update)) {
            $set_clause = implode(', ', array_map(function ($field) use ($fields_to_update) {
                return "$field = '{$fields_to_update[$field]}'";
            }, array_keys($fields_to_update)));

            $sql_update = "UPDATE usuario SET $set_clause WHERE id_usuario = $edit_id";
            $conn->query($sql_update);
        }
    }
    }
   // Consultar usuários do banco de dados
        $result = $conn->query("SELECT * FROM usuario");
?>

    <table id="userTable" class="datatable">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nome do Usuário</th>
                <th>Sexo</th>
                <th>Data de Nascimento</th>
                <!-- Adicione outras colunas conforme necessário -->
                <th>Editar</th>
            </tr>
        </thead>
        <tbody>
            <?php
            // Exibir usuários na tabela
            while ($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<td>" . $row["id_usuario"] . "</td>";
                echo "<td>" . $row["nome_usuario"] . "</td>";
                echo "<td>" . $row["sexo"] . "</td>";
                echo "<td>" . $row["data_nasc"] . "</td>";
                // Adicione mais colunas conforme necessário
                echo "<td><a href='#' onclick='editUser(" . $row["id_usuario"] . ", \"" . $row["nome_usuario"] . "\", \"" . $row["sexo"] . "\", \"" . $row["data_nasc"] . "\", \"" . $row["nome_materno"] . "\", \"" . $row["login"] . "\", \"" . $row["email"] . "\", \"" . $row["cpf"] . "\", \"" . $row["celular"] . "\", \"" . $row["telefone"] . "\", \"" . $row["cep"] . "\", \"" . $row["logradouro"] . "\", \"" . $row["bairro"] . "\", \"" . $row["uf"] . "\", \"" . $row["senha"] . "\", \"" . $row["tipoUser"] . "\", \"" . $row["status"] . "\")'>Editar</a></td>";
                echo "</tr>";
            }
            ?>
        </tbody>
    </table>

    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal" data-bs-whatever="@mdo">Open modal</button>

    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <!-- ... (restante do seu código Modal) -->
    </div>

    <!-- Formulário de edição (inicialmente oculto) -->
    <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>" id="editForm" style="display: none;">
        <!-- ... (restante do seu código Formulário de Edição) -->
    </form>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.js"></script>
    <script>
        $(document).ready(function() {
            $('#userTable').DataTable();
        });

        // Restante do seu script JavaScript
        function editUser(id, nome_usuario, sexo, data_nasc, nome_materno, login, email, cpf, celular, telefone, cep, logradouro, bairro, uf, senha, tipoUser, status) {
            document.getElementById("edit_id").value = id;
            // ... (restante do seu código para preencher campos de edição)
            document.getElementById("editForm").style.display = "block";
        }
    </script>

    <!-- ... (restante do seu código JavaScript) -->

    <?php
    // Fechar a conexão com o banco de dados
    $conn->close();
    ?>
</body>

</html>
