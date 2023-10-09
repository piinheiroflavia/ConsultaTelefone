<?php
include_once('../template/links.php');
?> 
<!DOCTYPE html>
    <html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Tela de Registro</title>
        
        <link rel="stylesheet" href="../assests/css/style.css">
    <style>

        .sidebar{
            overflow-x: hidden;
            overflow-y: auto; /* Adiciona uma barra de rolagem vertical quando o conteúdo excede a altura */
            max-height: 100vh; /* Limita a altura do sidebar para a altura da viewport */
            padding: 20px; /* Espaçamento interno para os conteúdos dentro da sidebar */
        }
        </style> 
        
  
    </head>
    <body>
        <!-- <img src="../assests/imgs/Logotipo.png" alt="logo" height="65px" class="m-2"> -->
        
        <div class="container text-center">
            <div class="row">
                <div class="col-6">
                    <div class="sidebar">
                            <div class="box">
                                <!-- action faz envio -->
                                <a href="./home.php" class="btnhome"><span class="material-symbols-outlined" id="iconeHome">home</span> </a>
                                <form  method="POST" action="../controllers/RegistroController.php">

                                    <div class="textLogin">
                                        <h3 >Registre-se</h3>
                                    </div>
                                    <br>
                                        <div class="col-md-12">
                                            <div class="form-outline">
                                            <input type="text" name="nome" class="form-control" id="nome" required />
                                            <label for="nome" class="form-label">Nome Completo</label>
                                            </div>
                                        </div>
                                    <br>
                                    <label >sexo:</label><br>
                                    <div class="form-check form-check-inline">
                                        <label class="form-check-label" for="feminino" style="font-size: 0.9rem;">Fem..</label>
                                        <input class="form-check-input" type="radio" name="sexo" id="feminino" value="F">
                                      </div>
                                      <div class="form-check form-check-inline">
                                        <label class="form-check-label" for="Masculino" style="font-size: 0.9rem;">Mas..</label>
                                        <input class="form-check-input" type="radio" name="sexo" id="Masculino" value="M">
                                      </div>
                                      <div class="form-check form-check-inline">
                                        <label class="form-check-label" for="Outros" style="font-size: 0.9rem;">Outros</label>
                                        <input class="form-check-input" type="radio" name="sexo" id="Outros" value="O">
                                      </div>

                                        <div>
                                            <label for="dataNascimento"><b>Data de Nascimento</b></label>
                                            <input type="date" name="dataNascimento" id="dataNascimento" class="inputUser">
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-outline">
                                            <input type="text" name="nomeMaterno" class="form-control" id="nomeMaterno" required />
                                            <label for="nomeMaterno" class="form-label">Nome Materno</label>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-outline">
                                            <input type="email" name="email" class="form-control" id="email" required />
                                            <label for="email" class="form-label">Login</label>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-outline">
                                            <input type="text" name="login" class="form-control" id="login" required />
                                            <label for="login" class="form-label">Login</label>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-outline">
                                            <input type="text" name="cpf" class="form-control" id="cpf" required />
                                            <label for="cpf" class="form-label">CPF</label>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-outline">
                                            <input type="tel" name="celular" class="form-control" id="celular" required />
                                            <label for="celular" class="form-label">Celular</label>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-outline">
                                            <input type="tel" name="telefone" class="form-control" id="telefone" required />
                                            <label for="telefone" class="form-label">Telefone</label>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-outline">
                                            <input type="text" name="cep" class="form-control" id="cep"  value="" size="10" maxlength="9"
                                                onblur="pesquisacep(this.value);" required />
                                            <label for="cep" class="form-label">Cep</label>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-outline">
                                            <input type="text" name="logradouro" class="form-control" id="logradouro" required />
                                            <label for="logradouro" class="form-label">Rua</label>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-outline">
                                            <input type="text" name="bairro" class="form-control" id="bairro" required />
                                            <label for="bairro" class="form-label">Bairro</label>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-outline">
                                            <input type="text" name="cidade" class="form-control" id="cidade" required />
                                            <label for="cidade" class="form-label">Cidade</label>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-outline">
                                            <input type="text" name="uf" class="form-control" id="uf" required />
                                            <label for="uf" class="form-label">UF</label>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            
                                            <div class="form-outline">
                                            <input type="password" name="senha" class="form-control" id="senha" required />
                                            <label for="senha" class="form-label">Senha</label>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-outline">
                                            <input type="password" name="Confsenha" class="form-control" id="Confsenha" required />
                                            <label for="Confsenha" class="form-label">Confirma Senha:</label>
                                            </div>
                                        </div>
                                        <button type="submit" id="btnSubmit" name="submit">Cadastrar</button>
                                </form>
                            </div>
                    </div>
                </div>
            </div>
        </div>
        
       
<script>
        
    
    function limpa_formulário_cep() {
            //Limpa valores do formulário de cep.
            document.getElementById('logradouro').value=("");
            document.getElementById('bairro').value=("");
            document.getElementById('cidade').value=("");
            document.getElementById('uf').value=("");
            
    }

    function meu_callback(conteudo) {
        if (!("erro" in conteudo)) {
            //Atualiza os campos com os valores.
            document.getElementById('logradouro').value=(conteudo.logradouro);
            document.getElementById('bairro').value=(conteudo.bairro);
            document.getElementById('cidade').value=(conteudo.localidade);
            document.getElementById('uf').value=(conteudo.uf);
            
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
            if(validacep.test(cep)) {

                //Preenche os campos com "..." enquanto consulta webservice.
                document.getElementById('logradouro').value="...";
                document.getElementById('bairro').value="...";
                document.getElementById('cidade').value="...";
                document.getElementById('uf').value="...";
                

                //Cria um elemento javascript.
                var script = document.createElement('script');

                //Sincroniza com o callback.
                script.src = 'https://viacep.com.br/ws/'+ cep + '/json/?callback=meu_callback';

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