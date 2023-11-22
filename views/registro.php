<?php
include_once('template/links.php');
require_once('config.php');
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tela de Registro</title>

    <link rel="stylesheet" href="<?php echo $consultaTelefonePath; ?>/assests/css/style.css">
    <style>
        /*começo do responsivo*/

        @media (max-width: 511px) {
            .sidebar {

                width: 510px;
            }
        }

        @media (max-width: 425px) {
            .sidebar {

                width: 425px;
            }   
        }

        @media (max-width: 460px) {
            .sidebar {

                width: 424px;
            }
        }

        /*fim do responsivo*/

        .sidebar {
            overflow-x: hidden;
            overflow-y: auto;
            /* Adiciona uma barra de rolagem vertical quando o conteúdo excede a altura */
            max-height: 100vh;
            /* Limita a altura do sidebar para a altura da viewport */
            padding: 20px;
            /* Espaçamento interno para os conteúdos dentro da sidebar */
            width: 560px;
        }


        form {
            width: auto;
            margin: 10px 0px;
        }

        /*TELA CADASTRO*/

        .inputN {
            margin: 15px 20px;
            width: 100%;
        }

        .input1,
        .input2 {
            display: flex;
            margin: 15px 5px;
            flex-direction: row;
            justify-content: space-around;
        }

        .input-container-cadastro {
            height: 40px;
            position: relative;
            margin-top: 15px;
            width: 45%;
            display: flex;
            flex-wrap: wrap;
            flex-direction: row;

        }

        input[type="date"]#data-nascimento {
            color: #ead8d800;
        }

        /* icone eyes */
        .icon2 {
            position: absolute;
            transition: all 0.35s;
            top: 60%;
            cursor: pointer;
            right: 20px;
            transform: translateY(-50%);
            color: #c2c5c6;
        }

        #unlock,
        #unlock2 {
            display: none;
        }

        .input-cadastro,
        #check-inline {
            display: flex;
            align-items: center;
        }

        .form-check input #feminino #masculino #outros [type="radio"] {
            color: rgba(255, 255, 255, 0);
            border: none;
        }

        .input-cadastro,
        #check-inline label {
            padding: 5px;
            font-size: 1rem;
            color: #fff;
        }

        .input-cadastro {
            background-color: #fff;
            border: solid 1px #fff;
            caret-color: #d82a2a00;
            color: #000;
            border-bottom: 0.5px solid #fff;
            font-size: 15px;
            height: 100%;
            width: 100%;
            outline: 0;
            padding: 2px 5px;
            border-radius: 50px;
            box-shadow: rgba(0, 0, 0, 0.24) 0px 3px 8px;
        }

        #select-div {
            color: #000;
            background-color: #fff;
            border: solid 1px #fff;
            padding: 2px 5px;
            border-radius: 50px;
            box-shadow: rgba(50, 50, 93, 0.25) 0px 2px 5px -1px, rgba(0, 0, 0, 0.3) 0px 1px 3px -1px;

        }

        #numero-casa-div,
        #bairro-div,
        #cidade-div,
        #estado-div,
        #cpf-cnpj-div,
        #celular-div,
        #telefone-div,
        #senha-div,
        #conf-senha-div,
        #nome-materno-div,
        #cep-div,
        #endereco-div,
        #nome-div,
        #nome-social-div,
        #email-div {
            background-color: rgba(255, 255, 255, 0);
            border: 0;
            caret-color: #d82a2a00;
            color: rgb(255, 255, 255);
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

        .input-cadastro:focus~.vago,
        .input-cadastro:not(:placeholder-shown)~.vago {
            transform: translateY(8px);
        }

        /* label */
        .placeholder {
            opacity: 0.9;
            font-weight: 500;
            font-size: 0.9rem;
            color: #000;
            line-height: 2px;
            pointer-events: none;
            position: absolute;
            left: 20px;
            transform-origin: 0 50%;
            transition: transform 200ms, color 200ms;
            top: 20px;
        }

        /* efeito */
        .input-cadastro:focus~.placeholder,
        .input-cadastro:not(:placeholder-shown)~.placeholder {
            transform: translateY(-30px) translateX(1px) scale(0.75);
            font-weight: 700;

        }

        .input-cadastro:not(:placeholder-shown)~.placeholder {
            color: #fff;

        }

        .input-cadastro:focus~.placeholder {
            color: #000;

        }

        #cadastro-lado1-btn {
            padding: 10px 40px 10px 29px;
            color: #2a72d800;
            background-color: rgba(229, 229, 229, 0.667);
        }

        .cadastra-3 {
            background-color: #dcdcda;
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

        .cadastra-3:hover::after {
            font-family: "Font Awesome 5 Free";
            content: " \f061";
        }
    </style>


</head>

<body>
    <div class="alert alert-success" id="alertLogin-error" role="alert" style="color: #05a85c;     width: 40%;">
        Usuário registrado com sucesso!! Aguarde alguns instantes e faça o login.
    </div>
    <div class="container text-center">
        <div class="row">
            <div class="col-6">
                <div class="sidebar">
                    <div class="box">
                        <!-- action faz envio -->
                        <div class="sidebar ">
                            <div class="btnTop">
                                <a href="login" class="btnhome"><span class="material-symbols-outlined" id="iconeHome">arrow_back</span></a>
                            </div>
                            <form method="POST" onsubmit="return validar()" action="../../ConsultaTelefone/controllers/RegistroController.php">

                                <div class="textLogin">
                                    <h3>Registre-se</h3>
                                </div>
                                <!--NOME-->
                                <div class="col-12 inputN">
                                    <!--NOME Completo-->
                                    <div class="input-container-cadastro" id="nome-div">
                                        <input id="nome" name="nome" class="input-cadastro" type="text" minlength="15" maxlength="60" placeholder=" " required="required" onkeyup="validNome()">
                                        <div class="vago"></div>
                                        <label for="nome" class="placeholder" id="resN" style="background: #7fffd400;">Nome Completo</label>
                                    </div>
                                </div>
                                <!--EMAIL--><!--DATA DE NASCIMENTO-->
                                <div class="col-12 input1">
                                    <!--EMAIL-->
                                    <div class="input-container-cadastro" id="email-div">
                                        <input id="email" name="email" class="input-cadastro" type="email" placeholder=" " required="required" onkeyup="validEmail(this.value)">
                                        <div class="vago"></div>
                                        <label for="email" class="placeholder" id="resEmail" style="background: #7fffd400;">Email</label>
                                    </div>
                                    <!--DATA DE NASCIMENTO-->
                                    <div class="input-container-cadastro" id="data-nascimento-div">
                                        <input id="nascimento" name="dataNascimento" class="input-cadastro" type="date" placeholder=" " required="required" onblur="validarNascimento();">
                                        <div class="vago"></div>
                                        <label for="data-nascimento" class="placeholder" id="resDn" style="background: #7fffd400;">Data de Nascimento</label>
                                    </div>

                                </div><!--input row-->
                                <!--NOME MATERNO--><!--Login-->
                                <div class="input1">
                                    <!--NOME MATERNO-->
                                    <div class="input-container-cadastro" id="nome-materno-div">
                                        <input id="nomeMaterno" name="nomeMaterno" class="input-cadastro" type="text" placeholder=" " onkeyup="validMaterno()">
                                        <div class="vago"></div>
                                        <label for="nome-materno" class="placeholder" id="resNm" style="background: #7fffd400;">Nome Materno</label>
                                    </div>
                                    <!--Login-->
                                    <div class="input-container-cadastro" id="login-div">
                                        <input id="login" name="login" class="input-cadastro" type="text" placeholder=" " minlength="6" maxlength="6" required="required" onkeyup="validaLogin()">
                                        <div class="vago"></div>
                                        <label for="login" class="placeholder" id="resLogin" style="background: #7fffd400;">Login</label>
                                    </div>
                                </div><!--input3 row-->
                                <!--CEP--><!--ENDEREÇO COMPLETO-->
                                <div class="input1">
                                    <!--CEP-->
                                    <div class="input-container-cadastro" id="cep-div">
                                        <input id="cep" class="input-cadastro" type="text" placeholder=" " required="required" onkeyup="validCep()" name="cep" size="10" maxlength="9" onblur="pesquisacep(this.value);">
                                        <div class="vago"></div>
                                        <label for="cep" class="placeholder" id="resCep" style="background: #7fffd400;">CEP</label>
                                    </div>
                                    <div class="input-container-cadastro">
                                        <select class="form-select" id="select-div" name="sexo" data-placeholder="seco">
                                            <option value="Feminino">feminino</option>
                                            <option value="Masculino">masculino</option>
                                            <option value="Outros">outros</option>
                                        </select>
                                    </div>

                                </div><!--input3 row-->
                                <!--ENDEREÇO COMPLETO--> <!--Nº-->
                                <div class="input1">
                                    <!--ENDEREÇO-->
                                    <div class="input-container-cadastro" id="endereco-div">
                                        <input id="logradouro" name="logradouro" class="input-cadastro" type="text" placeholder=" " maxlength="60" required="required">
                                        <div class="vago"></div>
                                        <label for="logradouro" class="placeholder" id="resEnd" style="background: #7fffd400;">Endereço</label>
                                    </div>
                                    <!--Nº-->
                                    <div class="input-container-cadastro" id="numero-casa-div">
                                        <input id="numero-casa" class="input-cadastro" type="text" placeholder=" " maxlength="10" required="required" onkeyup="validNumeroCasa()">
                                        <div class="vago"></div>
                                        <label for="numero-casa" class="placeholder" id="resNum" style="background: #7fffd400;">Nº</label>
                                    </div>
                                </div><!--input3 row-->
                                <!--BAIRRO--><!--CIDADE-->
                                <div class="input1">
                                    <!--BAIRRO-->
                                    <div class="input-container-cadastro" id="bairro-div">
                                        <input id="bairro" name="bairro" class="input-cadastro" type="text" placeholder=" " maxlength="60" required="required">
                                        <div class="vago"></div>
                                        <label for="bairro" class="placeholder" id="resEnd" style="background: #7fffd400;">Bairro</label>
                                    </div>
                                    <!--CIDADE-->
                                    <div class="input-container-cadastro" id="cidade-div">
                                        <input id="cidade" name="cidade" class="input-cadastro" type="text" placeholder=" " maxlength="50" required="required">
                                        <div class="vago"></div>
                                        <label for="cidade" class="placeholder" id="resEnd" style="background: #7fffd400;">Cidade</label>
                                    </div>
                                </div><!--input4 row-->
                                <!--ESTADO--><!--CPF/ CNPJ-->
                                <div class="input1">
                                    <!--ESTADO-->
                                    <div class="input-container-cadastro" id="estado-div">
                                        <input id="uf" name="uf" class="input-cadastro" type="text" placeholder=" " maxlength="50" required="required">
                                        <div class="vago"></div>
                                        <label for="uf" class="placeholder" id="resEnd" style="background: #7fffd400;">Estado</label>
                                    </div>
                                    <!--CPF/ CNPJ-->
                                    <div class="input-container-cadastro" id="cpf-cnpj-div">
                                        <input id="cpfcnpj" name="cpf" class="input-cadastro" type="text" autocomplete="off" maxlength="11" placeholder=" " required="required" oninput="validaCpf(TestaCPF(this.value));">
                                        <div class="vago"></div>
                                        <label for="cpfcnpj" class="placeholder" id="resCpf" style="background: #7fffd400;">CPF</label>
                                    </div>

                                </div><!--input4 row-->

                                <!--CELULAR--> <!--TELEFONE FIXO-->
                                <div class="input1">
                                    <!--CELULAR-->
                                    <div class="input-container-cadastro" id="celular-div">
                                        <input id="celular" name="celular" class="input-cadastro" type="tel" placeholder=" " required="required" onkeyup="validCelular()">
                                        <div class="vago"></div>
                                        <label for="celular" class="placeholder" id="resCel" style="background: #7fffd400;">Celular</label>
                                    </div>
                                    <!--TELEFONE FIXO-->
                                    <div class="input-container-cadastro" id="telefone-div">
                                        <input id="telefone" name="telefone" class="input-cadastro" type="tel" placeholder=" " required onkeyup="validTelefone()">
                                        <div class="vago"></div>
                                        <label for="telefone" class="placeholder" id="resTel" style="background: #7fffd400;">Telefone Fixo</label>
                                    </div>
                                </div><!--input5 row-->
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
                                        <input id="confirmar" name="Confsenha" class="input-cadastro" type="password" placeholder=" " onkeyup="validConfirmaSenha()" onkeypress="return ApenasLetras(event,this)">
                                        <div class="vago"></div>
                                        <label for="Senha" class="placeholder" id="resConSenha" style="background: #7fffd400;">Confirmar Senha</label>
                                        <span class="icon2">
                                            <i id="lock2" class="fa-solid fa-eye-slash" onclick="showPassword2()"></i>
                                            <i id="unlock2" class="fa-regular fa-eye" onclick="showPassword2()"></i>
                                        </span>
                                    </div>
                                </div><!--input5 row-->
                                <br>
                                <div id="respErro" class="loader">
                                    <p></p>
                                </div>
                                <div id="respSucesso" class="loader">
                                    <p></p>
                                </div>
                                <br>
                                <button type="submit" class="cadastra-3" name="submit">Cadastrar</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <script src="../../ConsultaTelefone/assests/js/registroo.js"></script>
        <script>
            function limpa_formulário_cep() {
                //Limpa valores do formulário de cep.
                document.getElementById('logradouro').value = ("");
                document.getElementById('bairro').value = ("");
                document.getElementById('cidade').value = ("");
                document.getElementById('uf').value = ("");

            }

            function meu_callback(conteudo) {
                if (!("erro" in conteudo)) {
                    //Atualiza os campos com os valores.
                    document.getElementById('logradouro').value = (conteudo.logradouro);
                    document.getElementById('bairro').value = (conteudo.bairro);
                    document.getElementById('cidade').value = (conteudo.localidade);
                    document.getElementById('uf').value = (conteudo.uf);

                } //end if.
                else {
                    //CEP não Encontrado.
                    limpa_formulário_cep();
                    alert("CEP não encontrado.");
                }
            }

            function pesquisacep(valor) {

                //Nova variável "cep" somente com dígitos.
                var cep = valor.replace(/\D/g, '');

                //Verifica se campo cep possui valor informado.
                if (cep != "") {

                    //Expressão regular para validar o CEP.
                    var validacep = /^[0-9]{8}$/;

                    //Valida o formato do CEP.
                    if (validacep.test(cep)) {

                        //Preenche os campos com "..." enquanto consulta webservice.
                        document.getElementById('logradouro').value = "...";
                        document.getElementById('bairro').value = "...";
                        document.getElementById('cidade').value = "...";
                        document.getElementById('uf').value = "...";


                        //Cria um elemento javascript.
                        var script = document.createElement('script');

                        //Sincroniza com o callback.
                        script.src = 'https://viacep.com.br/ws/' + cep + '/json/?callback=meu_callback';

                        //Insere script no documento e carrega o conteúdo.
                        document.body.appendChild(script);

                    } //end if.
                    else {
                        //cep é inválido.
                        limpa_formulário_cep();
                        alert("Formato de CEP inválido.");
                    }
                } //end if.
                else {
                    //cep sem valor, limpa formulário.
                    limpa_formulário_cep();
                }
            };
        </script>
</body>

</html>