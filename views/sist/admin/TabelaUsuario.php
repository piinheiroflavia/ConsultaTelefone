<?php
include_once('template/links.php');
require_once('config.php');
// Certifique-se de que o caminho para o UserController.php está correto
include_once(__DIR__ . '/../../../controllers/UserController.php');

?>

<!-- Cabeçalho e estilos -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Usuários</title>
    <style>
        /* Estilos aqui... */
    </style>
</head>
<body>

<?php
    // Criar uma instância da classe UserController, passando a conexão como argumento
    $userController = new UserController($conexao);

    // Definir ação padrão
    $acao = 'selectAllClientes';
    $parametros = [];

    // Executar ação
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if ($_POST['acao'] === 'excluirUsuario') {
            $idUsuarioParaExcluir = isset($_POST['id']) ? $_POST['id'] : null;

            if ($idUsuarioParaExcluir !== null) {
                $resultadoExclusao = $userController->executarAcao('excluirUsuario', ['id' => $idUsuarioParaExcluir]);

                if (isset($resultadoExclusao['mensagem'])) {
                    // Exibindo a mensagem de exclusão (pode ser ajustado conforme necessário)
                    echo $resultadoExclusao['mensagem'];
                    exit; // Garante que nada mais seja enviado junto com a resposta
                }
            }
        } else {
            $clientes = $userController->executarAcao($_POST['acao'], $parametros);
        }
    } else {
        $clientes = $userController->executarAcao($acao, $parametros);
    }

    // Exibir mensagem de exclusão (se houver)
    if (isset($_GET['mensagem'])) {
        echo "<p>{$_GET['mensagem']}</p>";
    }
?>


<!-- Seu HTML com a tabela -->
<div class="container pt-4" id="tabelaUsuario">
    <!-- ... (código anterior) -->

    <div class="table-responsive text-nowrap">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Login</th>
                    <th>Nome</th>
                    <th>Status</th>
                    <th>Email</th>
                    <th>Cpf</th>
                    <th>Celular</th>
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
                        <td><?php echo $cliente['celular']; ?></td>
                        <td><span class="material-symbols-outlined" onclick="editarUsuario(<?php echo $cliente['id_usuario']; ?>)">info</span></td>
                        <td><span class="material-symbols-outlined" onclick="deleteUser(<?php echo $cliente['id_usuario']; ?>)">delete</span></td>
                        <td>
                            <form method="post" action="http://localhost/ConsultaTelefone/historico-usuario">
                                <input type="hidden" name="acao" value="excluirUsuario">
                                <input type="hidden" name="id" value="<?php echo $cliente['id_usuario']; ?>">
                                <button type="submit">Excluir</button>
                            </form>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>
<!-- Scripts e funções JavaScript -->
<script>
    function deleteUser(userId) {
    console.log("Excluindo usuário: " + userId);

    if (confirm("Tem certeza que deseja excluir este usuário?")) {
            // Fazer solicitação AJAX para excluir o usuário
            fetch(`http://localhost/ConsultaTelefone/historico-usuario?acao=excluirUsuario&id=${userId}`)
                .then(response => response.json())
                .then(data => {
                    alert(data.mensagem);
                    // Recarregar a página ou atualizar a tabela de usuários
                    window.location.reload();
                })
                .catch(error => console.error('Erro ao excluir usuário:', error));
        }
    }


    // Função fictícia para editar usuário (substitua pelo seu código real)
    function editarUsuario(userId) {
        alert(`Editar usuário ${userId}`);
    }
</script>



<!-- 
  <script>
    function deleteUser(id) {
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
                // Chama a função do userController para excluir o usuário
                // Passa o ID do usuário como parâmetro
                // Atualiza a tabela após a exclusão
                userController.executarAcao('excluirUsuario', { id: id })
                    .then(() => {
                        Swal.fire(
                            'Usuário deletado com sucesso!',
                            'Esse usuário não existe mais',
                            'success'
                        );
                        // Recarrega a página ou atualiza a tabela de alguma forma
                         window.location.reload();
                        // OU
                        // Atualize a tabela dinamicamente sem recarregar a página
                        // Atualiza a tabela dinamicamente sem recarregar a página
                        document.querySelector(`tr[data-id="${id}"]`).remove();
                    })
                    .catch((error) => {
                        console.error(error);
                        Swal.fire(
                            'Erro',
                            'Ocorreu um erro ao excluir o usuário',
                            'error'
                        );
                    });
            }
        });
    }

    // Função para editar usuário
    function editarUsuario(id) {
        // Implemente a lógica de edição do usuário aqui
        // Pode abrir um modal de edição, redirecionar para outra página, etc.
        console.log('Editar usuário com ID:', id);
    }
</script> -->
</body>
</html>