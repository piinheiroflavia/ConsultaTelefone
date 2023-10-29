<title> <?php echo $title ?></title>
<main id="main2fa">

  <form id="form_2fa">
    <?php $indiceAletorio = array_rand($_2fa); //retira um indice aleatorio da entidade
    $_2faAleatorio - $_2fa[$indiceAleatorio]; // usa o indice sorteado para acessar a pergunta do 2fa 
    ?>
    <h4>
        <?php echo $_2faAleatorio['2fa_quest']; //printa a pergunta do 2fa
        ?>
    </h4><br>

    <input id="input_2fa" type="text" placeholder="Resposta"><br>

    <button type="submit">
        
    </button>
  </form>