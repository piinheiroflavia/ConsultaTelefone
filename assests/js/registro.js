//PÁGINA DE CADASTRO
let login = document.getElementById('login');
var resLogin = document.getElementById('resLogin');
var validLogin = false;

let nome = document.getElementById('nome');
var resN = document.getElementById('resN');
var validaNome = false;

let nascimento = document.getElementById("nascimento");
var resDn = document.getElementById('resDn'); 
var validaNascimento = false;

let materno = document.getElementById("nomeMaterno");
var resNm = document.getElementById('resNm');
var validaMaterno = false;

let cep = document.getElementById("cep");
var resCep = document.getElementById('resCep');
var validaCep = false;

let numero = document.getElementById("numero-casa");
var resNum = document.getElementById('resNum');
var validaNum = false;

let cpfcnpj = document.getElementById("cpfcnpj");
var resCpf = document.getElementById('resCpf');
var validaCpfCnpj = false;

let telefone = document.getElementById("telefone");
var resTel = document.getElementById('resTel');
var validaTelefone = false;

let celular = document.getElementById("celular"); 
var resCel = document.getElementById('resCel');
var validaCelular = false;

let senha = document.getElementById("Senha");
var resSenha = document.getElementById('resSenha');
var validaSenha = false;

let confirma = document.getElementById("confirmar");
var resConSenha = document.getElementById('resConSenha');
var validaconSenha = false;

let email = document.getElementById("email"); 
var resEmail = document.getElementById('resEmail');
var validaEmail = false;

let social = document.getElementById('social')
var resNs = document.getElementById('resNs');

let inputCadastro = document.getElementById('input-cadastro')
var respErro = document.getElementById('respErro');
var respSucesso = document.getElementById('respSucesso');

var btn = document.getElementById("btnSubmit")


//btn.style.cursor = 'not-allowed';

/*FUNÇÕES QUE INDETIFICAM SE O CAMPO ESTÁ VÁLIDO (COR VERDE), CASO O ALGUNS CAMPOS FIQUE VAZIO OU MENOR QUE 15 CARACTERES O CAMPO FICA VERMELHO, */
function validNome(){
if(nome.value == ''){
  nome.style.border = 'solid 2.3px #ff0000'
  resN.style.fontSize = '1rem'
  resN.innerHTML = '*Nome Completo';		
  resN.style.color = '#321010;'
  nome.focus();
}else if (nome.value.length < 15 || nome.value.length >= 90 ){
  nome.style.borderBlockColor = 'solid 2.3px #ff0000'
  resN.innerHTML = 'Mínimo 15 caracteres';	
  resN.style.fontSize = ' 1rem'	
  resN.style.color = '#321010';
  validaNome = false;
}else{
  resN.innerHTML='Nome Completo ';
  resN.style.color = '#321010'
  nome.style.border = 'solid 2.3px #008000'
  resN.style.fontSize = ' 1rem'
  validaNome = true;
}
}

console.log('teast')
console.log('rodaando')
function validarNascimento() {

  // var idadeMinima = 18; 
  // var dataNasc = new Date(nascimento.value);   
  // var dataAtual = new Date();
  // dataAtual.setFullYear(dataAtual.getFullYear() - idadeMinima);


  if (nascimento.value === '') {
    nascimento.style.border = 'solid 2.3px #ff0000';
    nascimento.focus();
    resDn.style.fontSize = ' 1rem'	
    resDn.innerHTML='Data de Nascimento';

  // } else if (dataNasc > idadeMinima) {
  //   nascimento.style.border = 'solid 2.3px #fff';
  //   nascimento.focus();
  //   resDn.innerHTML='Usuário menor de 18 anos ';

  } else {
       nascimento.style.border = 'solid 2.3px #008000';
  }
}


function validaLogin(){
  if(login.value == ''){
  login.style.border = 'solid 2.3px #ff0000';
  resLogin.innerHTML = '*login ';		
  resLogin.style.color = '#321010'
  login.focus();
  validLogin = false;
  }else if (login.value.length < 6  ){
    login.style.border = 'solid 2.3px #ff0000';
    resLogin.innerHTML = 'Mínimo 6 caracteres';	
    resLogin.style.fontSize = ' 1rem'	
    resLogin.style.color = '#321010';
    validLogin = false;
  }else{
    resLogin.innerHTML='login ';
    resLogin.style.color = '#321010'
    login.style.border = 'solid 2.3px #008000'
    validLogin = true;
  }
  }


function validMaterno(){
  if(materno.value == ''){
  materno.style.border = 'solid 2.3px #ff0000';
  resNm.innerHTML = '*Nome Materno ';		
  resNm.style.color = '#321010'
  materno.focus();
  validaMaterno = false;
  }else if (materno.value.length < 15 || materno.value.length >= 90 ){
  materno.style.borderBlockColor = 'solid 2.3px #ff0000';
  resNm.innerHTML = 'Mínimo 15 caracteres';	
  resNm.style.fontSize = ' 1rem'	
  resNm.style.color = '#321010';
  validaMaterno = false;
  }else{
    resNm.innerHTML='Nome Materno ';
    resNm.style.color = '#321010'
    materno.style.border = 'solid 2.3px #008000'
    validaMaterno = true;
  }
}

function validEmail(emaill){

//regex da validação de email 
let ev = /^([_a-zA-Z0-9-]+)(\.[_a-zA-Z0-9-]+)*@([a-zA-Z0-9-]+\.)+([a-zA-Z]{2,3})$/;

 if(email.value==''){
    email.style.border = 'solid 2.3px #ff0000';
    resEmail.innerHTML ='*Email';		
    resEmail.style.fontSize = ' 1rem'	
    resEmail.style.color = ' #321010'
    email.focus();
    validaEmail = false;
//lse if verifica se o email inserido bate com o reGex (precisa ter um @ e de 2 a 3 caracteres após o ponto)
  } else if (!ev.test(emaill)) {
    email.style.border = 'solid 2.3px #ff0000';
    resEmail.innerHTML = '*Email Inválido';	
    resEmail.style.fontSize = ' 1rem'		
    resEmail.style.color = '#321010';
  }else{
      resEmail.style.color = '#321010'
      resEmail.innerHTML ='Email ';	
      email.style.border = 'solid 2.3px #008000'
      validaEmail = true;
  }
}

function validCep(){

  if(cep.value==''){
    cep.style.border = 'solid 2.3px #ff0000';
    resCep.innerHTML='*CEP';		
    resCep.style.fontSize = ' 1rem'	
    resCep.style.border = 'solid 2.3px #fff'
    cep.focus();
    validaCep = false;
  }else if (cep.value.length < 8 || cep.value.length >= 9 ){
    cep.style.border = 'solid 2.3px #ff0000';
    resCep.innerHTML = '*CEP Inválido';	
    resCep.style.fontSize = ' 1rem'	
    resCep.style.color = '#321010';
    validaCep = false;
  }else{
    resCep.style.color = '#321010'
    resCep.innerHTML='CEP ';	
    cep.style.border = 'solid 2.3px #008000'
    validaCep = true;
  }
}

function validNumeroCasa(){

  if(numero.value==''){
    numero.style.border = 'solid 2.3px #ff0000';
    resNum.innerHTML='*Nº Casa';		
    resNum.style.fontSize = ' 1rem'		
    resNum.style.color = '#321010';
    numero.focus();
    validaNum = false;
  }else if (email.value.length < 0 ){
    email.style.border = 'solid 2.3px #ff0000';
    resNum.innerHTML = '*Nº Casa';	
    resNum.style.fontSize = ' 1rem'			
    resNum.style.color = '#321010';
  }else{
    resNum.style.color = '#321010';
    resNum.innerHTML='Nº Casa';	
    numero.style.border = 'solid 2.3px #008000'
    validaNum = true;
  }
}

function validCelular(){

  if(celular.value==''){
    celular.style.border = 'solid 2.3px #ff0000';
    resCel.innerHTML='*Celular ';		
    resCel.style.color = ' #321010'
    resCel.style.fontSize = ' 1rem'
    celular.focus();
    validaCelular = false;
  }else if (celular.value.length <20 ){
      celular.style.border = 'solid 2.3px #ff0000';
      resCel.innerHTML = '*Celular ';		
      resCel.style.fontSize = ' 1rem'	
      resCel.style.color = '#321010';
      validaCelular = false;
  }else{
    resCel.style.color = '#321010'
    resCel.innerHTML='Celular ';		
    celular.style.border = 'solid 2.3px #008000'
    validaCelular = true;
  }

  /*CELULAR*/
  $("#celular")
        .mask("(+99) 99 9 9999-9999")
        .focusout(function (event) {  
            var target, phone, element;  
            target = (event.currentTarget) ? event.currentTarget : event.srcElement;  
            phone = target.value.replace(/\D/g, '');
            element = $(target);  
            element.unmask();  
            if(phone.length > 12) {  
                element.mask("(+99) 99 9 9999-9999");  
            } else {  
                element.mask("(+99) 99 99999-9999");  
            }  
        });
}

/*MÁSCARA CPF COM JQUERY */
$(document).ready(function () {
  $('#cpfcnpj').mask('000.000.000-00');

  // Resto do seu código aqui
});

/*FUNÇÃO QUE INDETIFICA SE O CAMPO ESTÁ VÁLIDO E DE ACORDO COM OS REQUISITOS PARA VERIFICAR SE EXISTE O CPF*/
function validaCpf(retorno) {
  if (retorno == true) {
    resCpf.style.color = '#008000'
    resCpf.style.fontSize = ' 1rem'	
    resCpf.innerHTML='CPF';	
    cpfcnpj.style.border = 'solid 2.3px #008000'
    validaCpfCnpj = true;
  } else {
    cpfcnpj.style.border = 'solid 2.3px #008000'
    resCpf.innerHTML='CPF Inválido ';	
    resCpf.style.color = '#321010'
    cpfcnpj.focus();
    validaCpfCnpj = false;
  }
}

function TestaCPF(strCPF) {

str = strCPF.replace('.', '').replace('.', '').replace('-', '');
var cpfmask = str;
var Soma;
var Resto;
Soma = 0;
if (cpfmask == "00000000000" || cpfmask == "11111111111" || cpfmask == "22222222222" || cpfmask == "33333333333" || cpfmask == "44444444444" || cpfmask == "55555555555" || cpfmask == "66666666666" || cpfmask == "77777777777" || cpfmask == "88888888888" || cpfmask == "99999999999")
return false;

for (i=1; i<=9; i++) Soma = Soma + parseInt(cpfmask.substring(i-1, i)) * (11 - i);
Resto = (Soma * 10) % 11;

if ((Resto == 10) || (Resto == 11))  Resto = 0;
if (Resto != parseInt(cpfmask.substring(9, 10)) ) return false;

Soma = 0;
for (i = 1; i <= 10; i++) Soma = Soma + parseInt(cpfmask.substring(i-1, i)) * (12 - i);
Resto = (Soma * 10) % 11;

if ((Resto == 10) || (Resto == 11))  Resto = 0;
if (Resto != parseInt(cpfmask.substring(10, 11) ) ) return false;
return true;

}



function validTelefone(){

if(telefone.value==''){
  telefone.style.border = 'solid 2.3px #ff0000';
  resTel.innerHTML='*Telefone';		
  resTel.style.fontSize = ' 1rem'	
  resTel.style.color = ' #321010'
  telefone.focus();
  validaTelefone = false;
 }else if (telefone.value.length < 15 ){
   telefone.style.border = 'solid 2.3px #ff0000'
   resTel.innerHTML = '*Telefone';		
   resTel.style.fontSize = ' 1rem'	
   resTel.style.color = '#321010';
   validaTelefone = false;
   
}else{
  resTel.style.color = '#321010'
  resTel.style.fontSize = ' 1rem'	
  resTel.innerHTML='Telefone ';		
  telefone.style.border = 'solid 2.3px #008000'
  validaTelefone = true;
}

}
/*MÁSCARA TELEFONE COM JQUERY */
$("#telefone")
    .mask("(99) 9999-9999")
    .focusout(function (event) {  
        var target, phone, element;  
        target = (event.currentTarget) ? event.currentTarget : event.srcElement;  
        phone = target.value.replace(/\D/g, ''); // Remover todos os caracteres não numéricos
        element = $(target);  
        element.unmask();  
        if(phone.length > 10) {  
            element.mask("(99) 9999-9999");  
        } else {  
            element.mask("(99) 99999-9999");  
        }  
    });

function validSenha() {

if(senha.value.length < 8 ){

  senha.style.border = 'solid 2.3px #ff0000'
  resSenha.style.fontSize = ' 1rem'		
  resSenha.innerHTML='Senha  *Apenas letras';		
  resSenha.style.color = ' #321010'
  senha.focus();
  validaSenha = false;

}else{
  resSenha.style.color = '#321010'
  resSenha.style.fontSize = ' 1rem'		
  resSenha.innerHTML='Senha ';		
  senha.style.border = 'solid 2.3px #008000'
  validaSenha = true;
}
}
//função que verifica se o confirma senha e a senha são iguais
function validConfirmaSenha(){

if((confirma.value == '')||(senha.value != confirma.value)){
  confirma.style.border = 'solid 2.3px #ff0000'
  resConSenha.style.fontSize = ' 1rem'	
  resConSenha.innerHTML='As senhas não são iguais';		
  resConSenha.style.color = ' #321010'
  confirma.focus();
  validaconSenha = false;
}else{
  resConSenha.style.fontSize = ' 1rem'	
  resConSenha.style.color = '#321010'
  resConSenha.innerHTML='Confirmar senha ';		
  confirma.style.border = 'solid 2.3px #008000'
  validaconSenha = true;
}
}


//VERIFICAR SE TODOS OS CAMPOS ESTAO VAZIOS ANTES DE CADASTRAR O USUÁRIO
 function validarEnvio(){

 if (validaNome && validLogin && validaEmail && validaCep && validaNum && validaCpfCnpj && validaCelular && validaTelefone && validaSenha && validaconSenha){

   respErro.setAttribute('style', 'display: bloco', 'color: #0C4B77')
   respSucesso.innerHTML = '<strong>Cadastrando usuário...</strong>'
   console.log('<strong>Cadastrando usuário...</strong>')
   respErro.innerHTML =''
   btn.disabled = true 
   btn.style.backgroundColor = '#fff'

// //se nem todos os campos são preenchidos
 }else{
   respErro.setAttribute('style', 'display: bloco', 'color: #0C4B77')
   respSucesso.innerHTML = ''
   respErro.innerHTML = 'Preencha todos os campos corretamente'
   respErro.style.color = '#fff'
   btn.disabled = true
   btn.style.cursor = 'no-drop'
 }
   
 }

//FUNÇÃO PARA ACEITAR APENAS LETRAS NA SENHA
function ApenasLetras(e, t) {
try {
    if (window.event) {
        var charCode = window.event.keyCode;
    } else if (e) {
        var charCode = e.which;
    } else {
        return true;
    }
    if (
      (charCode > 64 && charCode < 91) || 
      (charCode > 96 && charCode < 123) ||
      (charCode > 191 && charCode <= 255) // letras com acentos
      ){
        return true;
      } else {
        return false;
      }
    } catch (err) {
      alert(err.Description);
    }
  }
  
//OCULTAR A SENHA LOGIN
function showPassword() {
const aberto = document.getElementById('lock');
const fechado = document.getElementById('unlock');

if (aberto.style.display === 'block'){
  aberto.style.display = 'none';
  fechado.style.display = 'block';
  senha.type = 'text';
}else{
  aberto.style.display = 'block';
  fechado.style.display = 'none';
  senha.type = 'password';
}
}
//OCULTAR A SENHA CADASTRO
function showPassword2() {
const aberto2 = document.getElementById('lock2');
const fechado2 = document.getElementById('unlock2');

if (aberto2.style.display === 'block'){
  aberto2.style.display = 'none';
  fechado2.style.display = 'block';
  confirma.type = 'text';
}else{
  aberto2.style.display = 'block';
  fechado2.style.display = 'none';
  confirma.type = 'password';
}
}

