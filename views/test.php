<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gerenciamento de Usuários</title>
    <style>
        table {
            border-collapse: collapse;
            width: 50%;
            margin-top: 20px;
        }

        table, th, td {
            border: 1px solid black;
        }

        th, td {
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

        
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>

    

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

<!-- create -->
            

    
    <table>
    <tr>
        <th id='id_user'>ID</th>
        <th id='nome'>Nome do Usuário</th>
        <th id='sexo'>Sexo</th>
        <th id='dateN'>Data de Nascimento</th>
        <th id='nomeM'>Nome Materno</th>
        <th id='login'>Login</th>
        <th id='email'>Email</th>
        <th id='cpf'>CPF</th>
        <th id='cel'>Celular</th>
        <th id='tel'>Telefone</th>
        <th id='cep'>CEP</th>
        <th id='loga'>Logradouro</th>
        <th id='bair'>Bairro</th>
        <th id='uf'>UF</th>
        <th id='senha'>Senha</th>
        <th id='tipoUse'>Tipo de Usuário</th>
        <th id='status'>Status</th>
        <th id='id_user'>info</th>
        <th id='id_user'>Ação</th>
        <th id='id_user'>Editar</th>
    </tr>
    <?php
        // Exibir usuários na tabela
        while ($row = $result->fetch_assoc()) {
            echo "<tr>";
            echo "<td>" . $row["id_usuario"] . "</td>";
            echo "<td>" . $row["nome_usuario"] . "</td>";
            echo "<td>" . $row["sexo"] . "</td>";
            echo "<td>" . $row["data_nasc"] . "</td>";
            echo "<td>" . $row["nome_materno"] . "</td>";
            echo "<td>" . $row["login"] . "</td>";
            echo "<td>" . $row["email"] . "</td>";
            echo "<td>" . $row["cpf"] . "</td>";
            echo "<td>" . $row["celular"] . "</td>";
            echo "<td>" . $row["telefone"] . "</td>";
            echo "<td>" . $row["cep"] . "</td>";
            echo "<td>" . $row["logradouro"] . "</td>";
            echo "<td>" . $row["bairro"] . "</td>";
            echo "<td>" . $row["uf"] . "</td>";
            echo "<td>" . $row["senha"] . "</td>";
            echo "<td>" . $row["tipoUser"] . "</td>";
            echo "<td>" . $row["status"] . "</td>";
            
            echo "<td><a href='#' onclick='showUserInfo(" . $row["id_usuario"] . ", \"" . $row["nome_usuario"] . "\", \"" . $row["sexo"] . "\", \"" . $row["data_nasc"] . "\", \"" . $row["nome_materno"] . "\", \"" . $row["login"] . "\", \"" . $row["email"] . "\", \"" . $row["cpf"] . "\", \"" . $row["celular"] . "\", \"" . $row["telefone"] . "\", \"" . $row["cep"] . "\", \"" . $row["logradouro"] . "\", \"" . $row["bairro"] . "\", \"" . $row["uf"] . "\", \"" . $row["senha"] . "\", \"" . $row["tipoUser"] . "\", \"" . $row["status"] . "\")'>Info</a></td>";

            
            // echo "<td><a href='http://localhost/ConsultaTelefone/views/test.php?selectId=" . $row["id_usuario"] . "'  onclick='info(" . $row["id_usuario"] . ", \"" . $row["nome_usuario"] . "\", \"" . $row["sexo"] . "\", \"" . $row["data_nasc"] . "\", \"" . $row["nome_materno"] . "\", \"" . $row["login"] . "\", \"" . $row["email"] . "\", \"" . $row["cpf"] . "\", \"" . $row["celular"] . "\", \"" . $row["telefone"] . "\", \"" . $row["cep"] . "\", \"" . $row["logradouro"] . "\", \"" . $row["bairro"] . "\", \"" . $row["uf"] . "\", \"" . $row["senha"] . "\", \"" . $row["tipoUser"] . "\", \"" . $row["status"] . "\")' >Info</a></td>";


            echo "<td><a href='http://localhost/ConsultaTelefone/views/test.php?delete=" . $row["id_usuario"] . "'>Excluir</a></td>";

            echo "<td><a href='#' onclick='editUser(" . $row["id_usuario"] . ", \"" . $row["nome_usuario"] . "\", \"" . $row["sexo"] . "\", \"" . $row["data_nasc"] . "\", \"" . $row["nome_materno"] . "\", \"" . $row["login"] . "\", \"" . $row["email"] . "\", \"" . $row["cpf"] . "\", \"" . $row["celular"] . "\", \"" . $row["telefone"] . "\", \"" . $row["cep"] . "\", \"" . $row["logradouro"] . "\", \"" . $row["bairro"] . "\", \"" . $row["uf"] . "\", \"" . $row["senha"] . "\", \"" . $row["tipoUser"] . "\", \"" . $row["status"] . "\")'>Editar</a></td>";
            echo "</tr>";

        }
    ?>
</table>

<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal" data-bs-whatever="@mdo">Open modal </button>

<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
<div class="modal-dialog">
<div class="modal-content">
  <div class="modal-header">
    <h1 class="modal-title fs-5" id="exampleModalLabel">New message</h1>
    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
  </div>
  <div class="modal-body">
  <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
                <label for="nome_usuario">Nome do Usuário:</label>
                <input type="text" id="nome_usuario" name="nome_usuario" required>

                <label for="email">Nome do Usuário:</label>
                <input type="text" id="email" name="email" required>
                 <button type="submit" onclick="alert()" class="btn btn-primary">Criar Usuário</button>
            </form>

  </div>
</div>
</div>
</div>




<!-- Formulário de edição (inicialmente oculto) -->
<form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>" id="editForm" style="display: none;">
    <input type="hidden" name="edit_id" id="edit_id">
    <label for="edit_nome_usuario">Novo Nome do Usuário:</label>
    <input type="text" id="edit_nome_usuario" name="edit_nome_usuario" required>

    <label for="edit_sexo">Novo Sexo:</label>
    <input type="text" id="edit_sexo" name="edit_sexo">

    <label for="edit_data_nasc">Nova Data de Nascimento:</label>
    <input type="date" id="edit_data_nasc" name="edit_data_nasc">

    <label for="edit_nome_materno">Novo Nome Materno:</label>
    <input type="text" id="edit_nome_materno" name="edit_nome_materno">

    <label for="edit_login">Novo Login:</label>
    <input type="text" id="edit_login" name="edit_login" required>

    <label for="edit_email">Novo Email:</label>
    <input type="email" id="edit_email" name="edit_email" required>

    <label for="edit_cpf">Novo CPF:</label>
    <input type="text" id="edit_cpf" name="edit_cpf">

    <label for="edit_celular">Novo Celular:</label>
    <input type="text" id="edit_celular" name="edit_celular">

    <label for="edit_telefone">Novo Telefone:</label>
    <input type="text" id="edit_telefone" name="edit_telefone">

    <label for="edit_cep">Novo CEP:</label>
    <input type="text" id="edit_cep" name="edit_cep">

    <label for="edit_logradouro">Novo Logradouro:</label>
    <input type="text" id="edit_logradouro" name="edit_logradouro">

    <label for="edit_bairro">Novo Bairro:</label>
    <input type="text" id="edit_bairro" name="edit_bairro">

    <label for="edit_uf">Nova UF:</label>
    <input type="text" id="edit_uf" name="edit_uf">

    <label for="edit_senha">Nova Senha:</label>
    <input type="password" id="edit_senha" name="edit_senha" required>

    <label for="edit_tipoUser">Novo Tipo de Usuário:</label>
    <input type="text" id="edit_tipoUser" name="edit_tipoUser">

    <label for="edit_status">Novo Status:</label>
    <input type="text" id="edit_status" name="edit_status">

    <button type="submit">Salvar Edição</button>
</form>




<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>


<!-- Script para preencher o formulário de edição ao clicar em "Editar" -->
<script>

    var tesNo = document.getElementById("nome").value = nome_usuario;
    console.log(tesNo)
    
        function alert(){
        alert('test')
    }
    function editUser(id, nome_usuario, sexo, data_nasc, nome_materno, login, email, cpf, celular, telefone, cep, logradouro, bairro, uf, senha, tipoUser, status) {
        document.getElementById("edit_id").value = id;
        document.getElementById("edit_nome_usuario").value = nome_usuario;
        document.getElementById("edit_sexo").value = sexo;
        document.getElementById("edit_data_nasc").value = data_nasc;
        document.getElementById("edit_nome_materno").value = nome_materno;
        document.getElementById("edit_login").value = login;
        document.getElementById("edit_email").value = email;
        document.getElementById("edit_cpf").value = cpf;
        document.getElementById("edit_celular").value = celular;
        document.getElementById("edit_telefone").value = telefone;
        document.getElementById("edit_cep").value = cep;
        document.getElementById("edit_logradouro").value = logradouro;
        document.getElementById("edit_bairro").value = bairro;
        document.getElementById("edit_uf").value = uf;
        document.getElementById("edit_senha").value = senha;
        document.getElementById("edit_tipoUser").value = tipoUser;
        document.getElementById("edit_status").value = status;
        document.getElementById("editForm").style.display = "block";
    }


    function showUserInfo(id, nome_usuario, sexo, data_nasc, nome_materno, login, email, cpf, celular, telefone, cep, logradouro, bairro, uf, senha, tipoUser, status) {
            var userInfo = document.getElementById('user-info');
            userInfo.innerHTML = `
                <p>ID: ${id}</p>
                <p>Nome do Usuário: ${nome_usuario}</p>
                <p>Sexo: ${sexo}</p>
                <p>Data de Nascimento: ${data_nasc}</p>
                <!-- Adicione mais campos conforme necessário -->
            `;
            // Abre o modal
            var myModal = new bootstrap.Modal(document.getElementById('userInfoModal'));
            myModal.show();
        }
</script>
    <?php
        // Fechar a conexão com o banco de dados
        $conn->close();
    ?>
</body>
</html>
