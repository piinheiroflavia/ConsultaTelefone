<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tabela de Usuários</title>

    <!-- Adicione os links necessários para a DataTables e seus plugins -->
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/buttons/2.0.1/css/buttons.dataTables.min.css">
    <!-- Adicione outros links conforme necessário -->

    <!-- Adicione jQuery e DataTables JavaScript -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.0.1/js/dataTables.buttons.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.0.1/js/buttons.html5.min.js"></script>
    <!-- Adicione outros scripts conforme necessário -->
</head>
<body>

<div class="container">
    <h2>Tabela de Usuários</h2>

    <table id="tabelaUsuarios" class="display">
        <thead>
        <tr>
            <th>ID</th>
            <th>Nome Completo</th>
            <th>Sexo</th>
            <th>Data de Nascimento</th>
            <th>Nome Materno</th>
            <th>Login</th>
            <th>Email</th>
            <th>CPF</th>
            <th>Celular</th>
            <th>Telefone</th>
            <th>CEP</th>
            <th>Logradouro</th>
            <th>Bairro</th>
            <th>UF</th>
            <th>Senha</th>
            <th>Tipo de Usuário</th>
            <th>Status</th>
        </tr>
        </thead>
        <tbody>
        </tbody>
    </table>
</div>

<script>
    $(document).ready(function () {
        // Inicialize a DataTable com as configurações desejadas
        var tabelaUsuarios = $('#tabelaUsuarios').DataTable({
            ajax: 'controllers/data.php', // Caminho para o arquivo data.php que retorna os dados
            columns: [
                {data: 'id_usuario'},
                {
                    data: null,
                    render: function (data, type, row) {
                        // Combine o primeiro e último nome em um único campo da tabela
                        return data.nome_usuario + ' ' + data.nome_materno;
                    }
                },
                {data: 'sexo'},
                {data: 'data_nasc'},
                {data: 'nome_materno'},
                {data: 'login'},
                {data: 'email'},
                {data: 'cpf'},
                {data: 'celular'},
                {data: 'telefone'},
                {data: 'cep'},
                {data: 'logradouro'},
                {data: 'bairro'},
                {data: 'uf'},
                {data: 'senha'},
                {data: 'tipoUser'},
                {data: 'status'}
            ],
            dom: 'Bfrtip',
            buttons: [
                {extend: 'copy', exportOptions: {columns: ':visible'}},
                {extend: 'excel', exportOptions: {columns: ':visible'}},
                {extend: 'csv', exportOptions: {columns: ':visible'}},
                {extend: 'pdf', exportOptions: {columns: ':visible'}},
                {extend: 'print', exportOptions: {columns: ':visible'}}
            ],
            colReorder: true,
            select: true
        });
    });
</script>

</body>
</html>
