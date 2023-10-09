<!-- consultas / regras de negocios -->
 
<!DOCTYPE html>
    <html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Tela de Registro</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
        <link href="https://getbootstrap.com/docs/5.3/assets/css/docs.css" rel="stylesheet">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

        <!-- icone google -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />

        <link rel="stylesheet" href="./style.css">
        <style>

        .sidebar{
            overflow-x: hidden;
            overflow-y: auto; /* Adiciona uma barra de rolagem vertical quando o conteúdo excede a altura */
            max-height: 100vh; /* Limita a altura do sidebar para a altura da viewport */
            padding: 20px; /* Espaçamento interno para os conteúdos dentro da sidebar */
        }
            h2{
                margin-top: 200px; 
                width: 400px;
                color: black;   
                font-family: Arial; 
                text-align: left;
                font-size: 40px;
        
            }
            
             
            h1{
                font-family: Arial;
                text-align: left;
                
        
            }
        
            form {
                width: 300px;
                text-align: center;
            }
        
            input {
                display: block;
                margin: 10px auto;
                width: 350px;
                height: 45px;
            }
        
            input[type="submit"] {
                    background-color: #FAFAFA; /* Cor de fundo do botão */
                    color: #0A94C1; /* Cor do texto do botão */
                    padding: 10px 20px; /* Espaçamento interno do botão */
                    border-radius: 5px; 
                    cursor: pointer; /* Muda o cursor ao passar o mouse sobre o botão */
                    width: 200px;
                   
                   
                }
        
                a {
                    color: rgba(255, 255, 255, 1); /* Define a cor como branca  */
                    text-align: end;
                } 
                
        
                label{
                    text-align: start;
                }
        </style> 
        
  
    </head>
    <body>
        <img src="../template/Logotipo.png" alt="logo" height="65px" class="m-2">
        
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
                                    <input id="nome" class="input-cadastro" type="text" minlength="15" maxlength="60" placeholder=" "  required="required"  >
                                    <div class="vago"></div>
                                    <label for="nome" class="placeholder" id="resN">Nome</label>

                                        <div class="inputBox">
                                            <label for="nome" class="labelInput">Nome Completo:</label>
                                            <input type="text" name="nome" id="nome">
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
                                    <br>
                                        <div class="inputBox">
                                            <label for="nome" class="labelInput">Nome Materno:</label>
                                            <input type="text" name="nomeMaterno" id="nomeMaterno">
                                        </div>
                                    <br>
                                        <div class="inputBox">
                                            <label for="email" class="labelInput">email:</label>
                                            <input type="email" name="email" id="email">
                                        </div>
                                    <br>
                                        <div class="inputBox">
                                            <label for="nome" class="labelInput">Login:</label>
                                            <input type="text" name="login" id="login" class="inputUser">
                                        </div>
                                    <br>
                                        <div class="inputBox">
                                            <label for="cpf"class="labelInput">CPF:</label>
                                            <input type="text" name="cpf" id="cpf" >
                                        </div>
                                    <br>
                                        <div class="inputBox">
                                           <label for="nome"class="labelInput">Celular:</label>
                                           <input type="tel" name="celular" id="celular">
                                        </div>
                                    <br>
                                        <div class="inputBox">
                                            <label for="nome"class="labelInput">Telefone Fixo:</label>
                                            <input type="tel" name="telefone" id="telefone">
                                        </div>
                                    <br><br>
                                           <div class="inputBox">
                                               <label for="cep"class="labelInput">cep:</label>
                                                <input name="cep" type="text" id="cep" value="" size="10" maxlength="9"
                                          onblur="pesquisacep(this.value);" class="inputUser">
                                           </div>
                                          <br>
                                           <div class="inputBox">
                                               <label for="logradouro"class="labelInput">Rua:</label>
                                                <input type="text" name="logradouro" id="logradouro" class="inputUser">
                                           </div>
                                          <br>
                                           <div class="inputBox">
                                               <label for="bairro"class="labelInput">bairro:</label>
                                                <input type="text" name="bairro" id="bairro" class="inputUser">
                                          </div>
                                          <br>
                                            <div class="inputBox">
                                                <label for="cidade"class="labelInput">cidade:</label>
                                                <input type="text" name="cidade" id="cidade" class="inputUser">
                                          </div>
                                          <br>
                                          <div class="inputBox">
                                              <label for="uf"class="labelInput">Estado:</label>
                                                <input type="text" name="uf" id="uf" class="inputUser">
                                           </div>
                                          <br> 
                                          <div class="inputBox">
                                              <label for="senha" class="labelInput">Senha:</label>
                                                <input type="password" name="senha" id="senha" class="inputUser">
                                           </div>
                                          <br>
                                           <div class="inputBox">
                                               <label for="Confsenha" class="labelInput"> Confirma Senha:</label>
                                                <input type="password" name="Confsenha" id="Confsenha" class="inputUser">
                                         </div>
                                          <br>
                                         <br><br>
                                          <button type="submit" id="btnSubmit" name="submit">Enviar</button>
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