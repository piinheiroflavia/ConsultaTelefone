<?php
    // include_once(__DIR__ .'\template\links.php');
    include_once(__DIR__ . '/../config.php');


    if (isset($_GET['email'])) {
        $email = $_GET['email'];
        //echo "<p>E-mail obtido corretamente: $email</p>";
        echo '<input type="hidden" name="email" value="' . htmlspecialchars($_GET['email']) . '">';
    } else {
        //echo '<p style="color: red;">E-mail não encontrado.</p>';
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://getbootstrap.com/docs/5.3/assets/css/docs.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />

    <title>Document</title>
    <link rel="stylesheet" href="<?php echo $consultaTelefonePath; ?>/assests/css/style.css">
    <link rel="stylesheet" href="<?php echo $consultaTelefonePath; ?>/assests/js/registro.js">
<style>


   @media screen  and (max-width: 530px){
    .sidebar{
        display: flex;
        flex-direction: column;
        width: 320px;
        padding: 0px 8px;
        background-color: #263a51;
    }
    }

    /*fim do responsivo*/
    .btnTop{
        margin: 5px;
        display: flex;
        align-items: center;
        justify-content: space-between;
    }


    /*TELA CADASTRO*/


    .input1, .input2{
        display: flex;
        margin: 15px 5px;
        flex-direction: row;
        justify-content: space-around;
    }
    .input-container-cadastro{
    height: 40px;
    position: relative;
    margin-top: 15px;
    width: 100%;
    display: flex;
    flex-wrap: wrap;
    flex-direction: row;

    }
    input[type="date"]#data-nascimento{
        color:#ead8d800;
    }
    /* icone eyes */
    .icon2{
        position: absolute;
        transition: all 0.35s;
        top:70%;
        cursor: pointer;
        right: 20px;
        transform: translateY(-50%);
        color: rgba(255, 255, 255, 0.874);
    }
    #unlock{
        display: none;
    }
    .input-cadastro, #check-inline{
        display: flex;
        align-items: center;
    }
    .form-check input #feminino #masculino #outros [type="radio"]{
        color: rgba(255, 255, 255, 0);
    border: none;
    }
    .input-cadastro, #check-inline label{
        padding:5px;
        font-size: 1rem;
        color: #fff;
    }
    .input-cadastro{
        background-color: #fff;
        border:solid 1px #fff;
        caret-color: #d82a2a00;
        color: #000;
        border-bottom: 0.5px solid #fff;
        font-size: 15px;
        height: 100%;
        width: 100%;
        outline: 0;
        padding: 2px 5px ;
        border-radius: 50px;
        box-shadow: rgba(0, 0, 0, 0.24) 0px 3px 8px;

    }
    #select-div{
        color: #000;
        background-color: #fff;
        border:solid 1px #fff;
        padding: 2px 5px ;
        border-radius: 50px;
        box-shadow: rgba(50, 50, 93, 0.25) 0px 2px 5px -1px, rgba(0, 0, 0, 0.3) 0px 1px 3px -1px;

    }
    #numero-casa-div,  #bairro-div,  #cidade-div,  #estado-div,  #cpf-cnpj-div,  #celular-div,  #telefone-div,  #senha-div,  #conf-senha-div,  #nome-materno-div,  #cep-div, #endereco-div,  #nome-div,  #nome-social-div,  #email-div{
        background-color: rgba(255, 255, 255, 0);
        border:0;
        caret-color: #d82a2a00;
        color:rgb(255, 255, 255);
        font-size: 18px;
        outline: 0;

    }
    .vago {
        border-radius: 10px;
        height: 20px;
        left: 20px;
        position: absolute;
        top: -20px;
        transform: translateY(0);
        transition: transform 200ms;
        width: 96px;
    }
    /*INPUT COM A BORDA*/
    .input-cadastro:focus,
    .input-cadastro:not(:placeholder-shown) {
        transform: translateY(6px);
        padding: 0px 10px;

    }
    .input-cadastro:focus ~ .vago,
    .input-cadastro:not(:placeholder-shown) ~ .vago {
        transform: translateY(8px);
    }
    /* label */
    .placeholder {
        opacity: 0.9;
        font-weight: 500;
        font-size: 0.9rem;
        color: #dcdcda;
        line-height: 2px;
        pointer-events: none;
        position: absolute;
        left: 20px;
        transform-origin: 0 50%;
        transition: transform 200ms, color 200ms;
        top: 20px;
        background-color:#ffffff00;

    }
    /* efeito */
    .input-cadastro:focus ~ .placeholder,
    .input-cadastro:not(:placeholder-shown) ~ .placeholder {
        transform: translateY(-30px) translateX(1px) scale(0.75);
        font-weight: 700;

    }
    .input-cadastro:not(:placeholder-shown) ~ .placeholder {
        color: #fff;

    }
    .input-cadastro:focus ~ .placeholder {
        color: #fff ;

    }
    #cadastro-lado1-btn{
        padding: 10px 40px 10px 29px;
        color:#2a72d800;
        background-color:rgba(229, 229, 229, 0.667);
    }
    .cadastra-3{
        background-color:#fff;
        border-radius: 50px;
        text-transform: uppercase;
        letter-spacing: 2px;
        font-size: 0.8rem;
        margin: 0px 10px;
        text-align: center;
        position: relative;
        transition: 0.6s;
        width: 30%;
        padding: 8px 5px;
        border: 2px solid #2a72d800;
        font-weight: 600;
        text-decoration: none;
        color: #2b44ff;

    }

    .cadastra-3:hover::after{
        font-family:"Font Awesome 5 Free";
        content: " \f061";
    }

</style>
    <!-- ... (seu código HTML continua aqui) ... -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
   <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

</head>

<body>
    <div class="d-flex align-items-center"  id="alertLogin-error">
        <svg class="bi flex-shrink-0 me-2" role="img" aria-label="Danger:"><use xlink:href="#exclamation-triangle-fill"/></svg>
    </div>
    <div class="container text-center">

    <div class="sidebar ">

         <form  action=""
method="post" >
            <div class="textLogin">
                <h3 >Digite uma nova senha:</h3>
            </div>
            <!--senha nova-->
            <br>
            <div class="input-container-cadastro" id="senha-div">
                <input id="Senha" name="novaSenha" class="input-cadastro" type="password" placeholder=" " minlength="8" maxlength="8" required="required">
                <div class="vago"></div>
                <label for="Senha" class="placeholder" id="resSenha" style="background: #7fffd400;">Senha nova</label>
                <span class="icon2">
                <i id="lock" class="fa-solid fa-eye-slash" onclick="showPassword()"></i>
                <i id="unlock" class="fa-regular fa-eye" onclick="showPassword()"></i>
                </span>
            </div>
            <br>
         
    
    <!-- Campo oculto para o e-mail -->
    <input type="hidden" name="email" value="<?php echo htmlspecialchars($_GET['email']); ?>">



            <br>
            <button type="submit" class="btnLogar" name="trocarSenha" ><span class="material-symbols-outlined" id="iconeSeta">arrow_forward</span></button>

          </form>

          <?php
          // Adicione o código de tratamento do formulário aqui...
            if (isset($_POST['trocarSenha'])) {
                // Verifica se os campos necessários estão definidos
                if (isset($_GET['email']) && isset($_POST['novaSenha'])) {
                    $email = $_GET['email'];
                    $novaSenha = $_POST['novaSenha'];
                
                    // Código para atualizar a senha
                    $conexao = new mysqli($dbhost, $dbUsername, $dbPassword, $dbName);
                    // ... (código de conexão continua aqui)
                
                    // Prepara a declaração SQL com declarações preparadas
                    $UpSql = "UPDATE usuario SET senha = ? WHERE email = ?";
                    $stmt = $conexao->prepare($UpSql);
                    if (!$stmt) {
                        die($conexao->error);
                    }
                    $stmt->bind_param("ss", $novaSenha, $email);
                    $stmt->execute();
                
                    // Verifica se a atualização foi bem-sucedida
                    if ($stmt->affected_rows > 0) {
                        // Código para obter o ID do usuário
                        $queryUserId = "SELECT id_usuario, nome_usuario FROM usuario WHERE email = ?";
                        $stmtUserId = $conexao->prepare($queryUserId);
                        if ($stmtUserId) {
                            $stmtUserId->bind_param("s", $email);
                            $stmtUserId->execute();
                            $stmtUserId->bind_result($id_usuario, $nome_usuario);
                            $stmtUserId->fetch();
                            $stmtUserId->close();
                
                            // Código para registrar na tabela de log
                            $data_log = date('Y-m-d H:i:s');
                            $status_log = 'ativo';
                            $descricao_log = "O usuário $nome_usuario (id: $id_usuario) atualizou a senha.";
                
                            $queryLog = "INSERT INTO log (usuario_id, data_log, status, descricao) VALUES (?, ?, ?, ?)";
                
                            // Use prepared statement para a consulta de inserção
                            $stmtLog = $conexao->prepare($queryLog);
                            if ($stmtLog) {
                                $stmtLog->bind_param("ssss", $id_usuario, $data_log, $status_log, $descricao_log);
                                $stmtLog->execute();
                                $stmtLog->close();
                            } else {
                                // Lidar com erro na preparação da declaração para a tabela de log
                                die($conexao->error);
                            }
                
                            // Código para exibir a mensagem de sucesso
                            echo '<script>
                                Swal.fire({
                                    title: "Senha atualizada com sucesso!",
                                    icon: "success",
                                    showCancelButton: true,
                                    confirmButtonColor: "#3085d6",
                                    cancelButtonColor: "#d33",
                                    confirmButtonText: "Login",
                                    cancelButtonText: "Sair"
                                }).then((result) => {
                                    if (result.isConfirmed) {
                                        window.location.href = "../login";
                                    } else {
                                        // Código para lidar com a escolha de "Sair"
                                    }
                                });
                            </script>';
                
                            exit();
                        } else {
                            // Lidar com erro na preparação da declaração para obter o ID do usuário
                            die($conexao->error);
                        }
                    } else {
                        // Erro ao atualizar a senha
                        //echo "<p style='color: red;'>Erro ao trocar a senha.</p>";
                    }
                
                    // Fecha a declaração preparada
                    $stmt->close();
                
                    // Fecha a conexão
                    $conexao->close();
                } else {
                    // Parâmetros inválidos no formulário ou e-mail não encontrado
                    //echo "<p style='color: red;'>Parâmetros inválidos no formulário.</p>";
                }
            }
    ?>
    </div>
</body>
</html>