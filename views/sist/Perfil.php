<?php
ob_start();
include_once('template/links.php');

// Verifique se a chave 'nome' está definida na sessão
if (isset($_SESSION['nome'])) {
    $nomeUsuario = $_SESSION['nome'];
    $tipoUser = $_SESSION['tipoUser'];
    $data_nasc = $_SESSION['data_nasc'];
    $email = $_SESSION['email'];
    $cpf = $_SESSION['cpf'];
    $celular = $_SESSION['celular'];
    $telefone = $_SESSION['telefone'];
    $cep = $_SESSION['cep'];
    $logradouro = $_SESSION['logradouro'];
    $status = $_SESSION['status'];
    //var_dump($_SESSION);


    echo "</pre>";
} else {
    // Se 'nome' não estiver definido, trate de acordo (por exemplo, redirecione para a página de login)
    header("Location: login.php");
    exit(); // Certifique-se de sair após redirecionar para evitar a execução adicional do código
}


ob_end_flush(); 
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
<style>
    .btn{
        color: #fff;
        background-color: #47C9FF;
        padding: 10px
    }
    .img-account-profile {
        height: 10rem;
    }
    .rounded-circle {
        border-radius: 50% !important;
    }
    .card {
        box-shadow: rgba(0, 0, 0, 0.12) 0px 1px 3px, rgba(0, 0, 0, 0.24) 0px 1px 2px;
    }
    .card .card-header {
        font-weight: 500;
    }
    .card-header:first-child {
        border-radius: 0.35rem 0.35rem 0 0;
    }
    .card-header {
        padding: 1rem 1.35rem;
        margin-bottom: 0;
        background-color: rgba(33, 40, 50, 0.03);
        border-bottom: 1px solid rgba(33, 40, 50, 0.125);
    }
    .form-control, .dataTable-input {
        display: block;
        width: 100%;
        padding: 0.875rem 1.125rem;
        font-size: 0.875rem;
        font-weight: 400;
        line-height: 1;
        color: #69707a;
        background-color: #fff;
        background-clip: padding-box;
        border: 1px solid #c5ccd6;
        -webkit-appearance: none;
        -moz-appearance: none;
        appearance: none;
        border-radius: 0.35rem;
        transition: border-color 0.15s ease-in-out, box-shadow 0.15s ease-in-out;
    }

    .nav-borders .nav-link.active {
        color: #0061f2;
        border-bottom-color: #0061f2;
    }
    .nav-borders .nav-link {
        color: #69707a;
        border-bottom-width: 0.125rem;
        border-bottom-style: solid;
        border-bottom-color: transparent;
        padding-top: 0.5rem;
        padding-bottom: 0.5rem;
        padding-left: 0;
        padding-right: 0;
        margin-left: 1rem;
        margin-right: 1rem;
    }
  /*MODELO DB*/
    /*parte do modelo db*/
    .blocoDB1, .blocoDB2{
      background-color: #ffffff;
      padding: 10px;
      border-radius: 10px;
      border: solid 1px #e0e0e0;
      box-shadow: rgba(99, 99, 99, 0.2) 0px 2px 8px 0px;
    }
    #btnDB1,#btnDB2 {
      background-color: #47C9FF;
      color: #fff;
      padding: 3px 8px;
      border-radius: 10px 10px 0px 0px;
      border: none;
    }
    /*fim parte do modelo db*/
    </style>
</head>
<?php

//$userController = new UserController($conexao);
$acao = 'selectAllClientes';
$parametros = [];



?>

<body>

  <div class="container-xl px-4 mt-4">
    <div class="row">
        <div class="col-xl-4">
            <!-- Profile card-->
            <div class="card mb-4 mb-xl-0">
                <div class="card-header">Perfil</div>
                <div class="card-body text-center">
                    <!-- Profile image-->
                    <img class="img-account-profile rounded-circle mb-2" src="https://cdn-icons-png.flaticon.com/512/3135/3135823.png" alt="">
                    <p><strong><?php  echo " $nomeUsuario"; ?></strong></p>       
                    <p><?php  echo " $tipoUser"; ?></p>       
                  <!-- <input type="file" name="arquivos" class="btn"  accept="image/png, image/jpeg"  multiple />  -->
                </div>
            </div>
        </div>
        <div class="col-xl-8">
            <!-- Detalhes da conta-->
            <div class="card mb-4">
                <div class="card-header">Detalhes da conta</div>
                <div class="card-body">
                    <form>
                        <div class="row gx-3 mb-3">
                            <div class="col-md-6">
                                <p><strong>Nome</strong></p>
                                <p><?php  echo " $nomeUsuario"; ?></p>
                            </div>
                            
                            <div class="col-md-6">
                              <p><strong>email</strong></p>
                              <p><?php  echo " $email"; ?></p>
                            </div>
                        </div>
                        <div class="row gx-3 mb-3">
                            <div class="col-md-6">
                              <p><strong>Data de Nascimento</strong></p>
                              <p><?php  echo " $data_nasc"; ?></p>
                            </div>
                            <div class="col-md-6">
                              <p><strong>cpf</strong></p>
                                <p><?php  echo " $cpf"; ?></p>
                            </div>
                        </div>
                        <div class="row gx-3 mb-3">
                          <div class="col-md-6">
                            <p><strong>Telefone</strong></p>
                            <p><?php  echo " $telefone"; ?></p>
                          </div>
                          <div class="col-md-6">
                            <p><strong>Celular</strong></p>
                              <p><?php  echo " $celular"; ?></p>
                          </div>
                      </div>
                      <div class="row gx-3 mb-3">
                        <div class="col-md-6">
                          <p><strong>CEP</strong></p>
                            <p><?php  echo " $cep"; ?></p>
                        </div>
                        <div class="col-md-6">
                            <p><strong>Endereço</strong></p>
                            <p><?php  echo " $logradouro"; ?></p>
                        </div>
                    </div>                  
                    <div class="row gx-3">
                        <div class="col-md-9">
                        </div>
                        <div class="col-md-3">
                            <button class="btn" type="button" data-bs-toggle="modal" data-bs-target="#exampleModal">Alteração senha</button>
                        </div>
                    </div>       
                    </form>
                </div>
            </div>
        </div>


    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
        <div class="modal-header">
            <h1 class="modal-title fs-5" id="exampleModalLabel">Alterar Senha</h1>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
        <form>
          <!--SENHA--> <!--CONFIRMAR SENHA-->
          <div class="input1">
                                    <!--SENHA-->
                                    <div class="input-container-cadastro" id="senha-div">
                                        <input id="Senha" name="senha" class="input-cadastro" type="password" placeholder=" " minlength="8" maxlength="8" required="required" onkeyup="validSenha()" onkeypress="return ApenasLetras(event,this)">
                                        <div class="vago"></div>
                                        <label for="Senha" class="placeholder" id="resSenha" style="background: #7fffd400;">Senha</label>
                                        <span class="icon2">
                                            <i id="lock" class="fa-solid fa-eye-slash" onclick="showPassword()"></i>
                                            <i id="unlock" class="fa-regular fa-eye" onclick="showPassword()"></i>
                                        </span>
                                    </div>

                                    <!--CONFIRMAR SENHA-->
                                    <div class="input-container-cadastro" id="conf-senha-div">
                                        <input id="confirmar" name="Confsenha" class="input-cadastro" type="password" placeholder=" " onkeyup="validConfirmaSenha()" onkeypress="return ApenasLetras(event,this)"  minlength="8" maxlength="8">
                                        <div class="vago"></div>
                                        <label for="Senha" class="placeholder" id="resConSenha" style="background: #7fffd400;">Confirmar Senha</label>
                                        <span class="icon2">
                                            <i id="lock2" class="fa-solid fa-eye-slash" onclick="showPassword2()"></i>
                                            <i id="unlock2" class="fa-regular fa-eye" onclick="showPassword2()"></i>
                                        </span>
                                    </div>
                </form>
            <button type="button" class="btn btn-primary">Salvar alterações</button>
            <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Sair</button>

        </div>
    </div>
    </div>
      </div> 
    </div>
</div>
<script src="../../ConsultaTelefone/assests/js/registroo.js"></script>
<script src="<?php echo $consultaTelefonePath; ?>/assests/js/registro.js"></script>
</body>
</html>

