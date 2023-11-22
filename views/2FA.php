<?php
include_once('template/links.php');
include_once('config.php');
require_once(__DIR__ . '/../models/_2fa.php');

$models2fa = new _2fa();
$tabela_2fa = $models2fa->select_2fa();


$indiceAleatorio = array_rand($tabela_2fa); // Retira um índice aleatório da entidade
$_2faAleatorio = $tabela_2fa[$indiceAleatorio];

$perguntas = $_2faAleatorio['2fa_quest'];
session_start();
$login = $_SESSION["login_user"];

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://getbootstrap.com/docs/5.3/assets/css/docs.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

    <title>2FA</title>


    <link rel="stylesheet" href="<?php echo $consultaTelefonePath; ?>/assests/css/style.css">

    <style>
        h2 {
            margin-top: 200px;
            width: 400px;
            color: black;
            font-family: Arial;
            text-align: left;
            font-size: 40px;

        }

        p {

            width: 400px;
            color: black;
            font-family: Arial;
            font-size: 23px;
            margin-top: 400px;
            margin-top: auto;
            margin-bottom: 25rem;

        }

        h1 {
            font-family: Arial;
            text-align: left;


        }

        .btnTop {
            margin: 5px;
            display: flex;
            align-items: center;
            justify-content: space-between;
        }

        .input-container-cadastro {
            background-color: #fff;
            border: solid 1px #fff;
            caret-color: #d82a2a00;
            color: #000;
            border-bottom: 0.5px solid #fff;
            font-size: 20px;
            height: 100%;
            width: 95%;
            outline: 0;

            border-radius: 50px;
            box-shadow: rgba(0, 0, 0, 0.24) 0px 3px 8px;
        }

        .input-cadastro:focus~.placeholder,
        .input-cadastro:not(:placeholder-shown)~.placeholder {
            transform: translateY(-30px) translateX(1px) scale(0.75);
            font-weight: 700;

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
            padding: 9px 5px;
            border-radius: 50px;
            box-shadow: rgba(0, 0, 0, 0.24) 0px 3px 8px;
        }
    </style>

</head>

<body>
    <div class="d-flex align-items-center" id="alertLogin-error">
        <svg class="bi flex-shrink-0 me-2" role="img" aria-label="Danger:">
            <use xlink:href="#exclamation-triangle-fill" />
        </svg>
    </div>
    <div class="container text-center">

        <div class="sidebar ">
            <div class="btnTop">
                <a href="home" class="btnhome"><span class="material-symbols-outlined" id="iconeHome">arrow_back</span></a>
                <a href="login" class="btnhome"><span class="material-symbols-outlined" id="iconeHome">home</span> </a>
            </div>

            <form method="post" action="../../ConsultaTelefone/controllers/_2faController.php">
                <h4>
                    <?php echo $perguntas; //printa as perguntas do 2fa
                    ?>
                </h4><br>
              
                <input name="pergunta_2fa" value="<?= $perguntas ?>" type="hidden">
                <input name="login_2fa" value="<?= $login ?>" type="hidden">

                <?php if ($perguntas == 'Digite sua data de nascimento?') : ?>
                    <input class="input_2fa" name="resposta_2fa" type="date" placeholder="Resposta" maxlength="8"><br>
                <?php endif; ?>

                <?php if ($perguntas != 'Digite sua data de nascimento?') : ?>
                    <input class="input_2fa" name="resposta_2fa" type="text" placeholder="Resposta" maxlength="60"><br>
                <?php endif; ?>





                <button type="submit">
                    <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-arrow-right" viewBox="0 0 16 16">
                        <path fill-rule="evenodd" d="M1 8a.5.5 0 0 1 .5-.5h11.793l-3.147-3.146a.5.5 0 0 1 .708-.708l4 4a.5.5 0 0 1 0 .708l-4 4a.5.5 0 0 1-.708-.708L13.293 8.5H1.5A.5.5 0 0 1 1 8z" />
                    </svg>
                </button>
            </form>
        </div>



</body>

</html>