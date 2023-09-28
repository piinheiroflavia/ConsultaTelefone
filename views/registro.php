<?php
 include_once('config.php');

//  if(isset($_POST['submit']))
//  {
//    //print_r('nome:' . $_POST['nome']);
//    //print_r('<br>');
//    //print_r('email:' . $_POST['email']);
//    //print_r('<br>');
//    //print_r('nome Materno:' . $_POST['nomeMaterno']);
//    //print_r('<br>');
//    //print_r('cpf:' . $_POST['cpf']);
//    // print_r('<br>');
//    //print_r('telefone:' . $_POST['telefone']);
//    //print_r('<br>');
//    // print_r('celular:' . $_POST['celular']);
//    //print_r('<br>');
//    //print_r('genero:' . $_POST['genero']);
//    //print_r('<br>');
//    //print_r('data de Nascimento:' . $_POST['dataNascimento']);
//    //print_r('<br>');
//    //print_r('endereco:' . $_POST['endereco']);
//    //print_r('<br>');
//    //print_r('complemento:' . $_POST['complemento']);

//    include_once('config.php');
   
//    $nome = $_POST['nome'];
//    $nomeMaterno = $_POST['nomeMaterno'];
//    $dataNascimento = $_POST['dataNascimento'];
//    $sexo = $_POST['genero'];
//    $cpf = $_POST['cpf'];
//    $celular = $_POST['celular'];
//    $telefone = $_POST['telefone'];
//    $endereco = $_POST['endereco'];
//    $complemento = $_POST['complemento'];

//    $result = mysqli_query($conexao, "INSERT INTO usuario (nome, nomeMaterno, dataNascimento, sexo, cpf, celular, telefone, endereco, complemento) VALUES ('$nome', '$nomeMaterno', '$dataNascimento', '$sexo', '$cpf', '$celular', '$telefone', '$endereco', '$complemento')");
 //}
?>    
          
    <!DOCTYPE html>
    <html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Tela de Registro</title>
        <!---
        <style>
            /*fundo da tela */
            body{
                font-family: Arial, Helvetica, sans-serif;
                background-image: linear-gradient(45deg, rgb(223, 219, 219), rgb(41, 39, 39));        
            }
            /*Quadrado de cadastro */
            .box{
                position: absolute;
                top:50%;
                left:50%;
                transform: translate(-50%, -50%);
                background-color: rgb(205, 197, 197);
                padding: 15px;
                border-radius: 15px;
            }

            fieldset{
                border: 3px solid black;
            }
            legend{
                padding: 10px;
                text-align: center;
            }
            .inputBox{
                position: relative;
            }
            .inputUser{
                border-bottom:1px ;
                outline: none;
                font-size: 15px;
                width: 50%;
                letter-spacing: 2px;
            }
            .LabelInput{
                position:absolute;
                top: 0px;
                left: 0px;
                pointer-events: none;
                transition: .5s;
            }
            .imputUser:focus ~ .LabelInput{
                top: -20px;
            }

        </style>-->
    </head>
    <body>
        <div class="box">
            <!-- action faz envio -->
            <form  method="POST">
                <fieldset>
                    <legend><b>Registre-se</b></legend>
                    <br>
                    <div class="inputBox">
                        <input type="text" name="nome" id="nome">
                        <label for="nome" class="labelInput">Nome Completo:</label>
                    </div>
                    <br>
                    <div class="inputBox">
                        <input type="email" name="email" id="email">
                        <label for="email" class="labelInput">email:</label>
                    </div>
                    <br>
                    <div class="inputBox">
                        <input type="text" name="nomeMaterno" id="nomeMaterno">
                        <label for="nome" class="labelInput">Nome Materno:</label>
                    </div>
                    <br>
                    <div class="inputBox">
                        <input type="text" name="cpf" id="cpf" >
                        <label for="cpf"class="labelInput">CPF:</label>
                    </div>
                    <br>
                    <div class="inputBox">
                        <input type="tel" name="telefone" id="telefone">
                        <label for="nome"class="labelInput">Telefone Fixo:</label>
                    </div>
                    <br>
                    <div class="inputBox">
                        <input type="tel" name="celular" id="celular">
                        <label for="nome"class="labelInput">Celular:</label>
                    </div>
                    <p>sexo:</p>
                    <input type="radio" id="feminino" name="genero" value="feminino">
                    <label for="feminino">Feminino</label>
                    <input type="radio" id="masculino" name="genero" value="masculino">
                    <label for="masculino">Masculino</label>
                    <input type="radio" id="outro" name="genero" value="outro">
                    <label for="outro">Outro</label>
                    <br><br>
                    <div>
                        <label for="dataNascimento"><b>Data de Nascimento</b></label>
                        <input type="date" name="dataNascimento" id="dataNascimento" class="inputUser">
                    </div>
                    <br><br>
                    <div class="inputBox">
                        <input type="text" name="endereco" id="endereco" class="inputUser">
                        <label for="endereco"class="labelInput">Endereço:</label>
                    </div>
                    <br>
                    <div class="inputBox">
                        <input type="text" name="complemento" id="complemento" class="inputUser">
                        <label for="complemento"class="labelInput">Complemento:</label>
                    </div>
                    <br>
                    <div class="inputBox">
                        <input type="password" name="senha" id="senha" class="inputUser">
                        <label for="senha" class="labelInput">Senha:</label>
                    </div>
                    <br>
                    <div class="inputBox">
                        <input type="password" name="Confsenha" id="Confsenha" class="inputUser">
                        <label for="senha" class="labelInput"> Confirma Senha:</label>
                    </div>
                    <br>
                    <div class="inputBox">
                        <input type="text" name="login" id="login" class="inputUser">
                        <label for="nome" class="labelInput">Login:</label>
                    </div>
                    <br><br>
                    <button type="submit" id="btnSubmit" name="submit">Enviar</button>

                </fieldset>
            </form>
        </div>
    </body>
    </html>   

