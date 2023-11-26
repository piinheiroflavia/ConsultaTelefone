<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Atualizar Senha</title>
    <!-- Adicione os links do Bootstrap ou outros estilos que você está usando -->
</head>

<body>

    <div class="container text-center">
        <div class="sidebar">
            <!-- Adicione qualquer elemento de navegação ou cabeçalho aqui -->

            <form action="../../ConsultaTelefone/controllers/TrocarSenhaController.php?acao=trocarSenha" method="post">
                <div class="textLogin">
                    <h3>Digite sua nova senha</h3>
                </div>
                <!-- NOVA SENHA -->
                <div class="input-container-cadastro" id="senha-div">
                    <label for="novaSenha">Nova Senha:</label>
                    <input type="password" id="novaSenha" name="novaSenha" required>
                </div>
                
                <!-- CONFIRMAR NOVA SENHA -->
                <div class="input-container-cadastro" id="conf-senha-div">
                    <label for="confNovaSenha">Confirmar Nova Senha:</label>
                    <input type="password" id="confNovaSenha" name="confNovaSenha" required>
                </div>

                <button type="submit" class="btnLogar" name="trocarSenha">Trocar Senha</button>
            </form>
        </div>
    </div>

</body>

</html>
