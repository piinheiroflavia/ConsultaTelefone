<?php

ob_start();
session_start();
require_once('config.php');

if (isset($_SESSION['nome'])) {
  $nomeUsuario = $_SESSION['nome'];

  echo "</pre>";
} else {
  
  //header("Location: login.php");
  exit(); 
}

// Obtém o papel do usuário da sessão
$role = isset($_SESSION['role']) ? $_SESSION['role'] : '';

if (isset($_POST['logout'])) {
  // Limpe ou destrua completamente a sessão
  session_destroy();
  echo "limpo";
  // Redirecione para a página de login ou outra página após o logout
  print "<script> location.href='./'</script>";
  exit();
}
?> 
<!DOCTYPE html>
<html lang="en">
  <head>
    <base href="./">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <meta name="description" content="CoreUI - Open Source Bootstrap Admin Template">
    <meta name="author" content="Łukasz Holeczek">
    <meta name="keyword" content="Bootstrap,Admin,Template,Open,Source,jQuery,CSS,HTML,RWD,Dashboard">
    <title>Sistema Consulta Telefone</title>
    
    <meta name="msapplication-TileColor" content="#ffffff">
    <meta name="msapplication-TileImage" content="assets/favicon/ms-icon-144x144.png">
    <meta name="theme-color" content="#ffffff">

    <link rel="shortcut icon" href="<?php echo $consultaTelefonePath; ?>/assests/imgs/favicon.png" type="image/x-icon">
    <!-- Vendors styles-->
    <link rel="stylesheet" href="<?php echo $consultaTelefonePath; ?>/template/vendors/simplebar/css/simplebar.css">
    <link rel="stylesheet" href="<?php echo $consultaTelefonePath; ?>/template/css/vendors/simplebar.css">
    <!-- Main styles for this application-->
    <link href="<?php echo $consultaTelefonePath; ?>/template/css/style.css" rel="stylesheet">
    <!-- We use those styles to show code examples, you should remove them in your application.-->
    <link href="<?php echo $consultaTelefonePath; ?>/template/css/examples.css" rel="stylesheet">
    <link href="<?php echo $consultaTelefonePath; ?>/template/vendors/@coreui/chartjs/css/coreui-chartjs.css" rel="stylesheet">
  </head>

  <style>
    body {
    background-color: #f6f6f6;
    }
    #sidebar{
        background-color: #fff; 
        color:#000; 
        width:220px;
        box-shadow: rgba(0, 0, 0, 0.18) 0px 2px 4px; 
    }
   #parteSupImg{
    margin-top: 10px;
    background-color: #fff;
    border-bottom: solid 1px #dcdcda ; 
    padding :15px 10px"
   }
   #header{
    box-shadow: rgba(0, 0, 0, 0.18) 0px 2px 4px; 
   }
   .nav-item:hover{
    background-color: #dcdcda;
   }
   .nav-item:active{
    background-color: #dcdcda;
   }
  </style>



  <body>
    <div class="sidebar sidebar-dark sidebar-fixed" id="sidebar" >
      <div class="sidebar-brand d-none d-md-flex" id="parteSupImg" >
        <img src="<?php echo $consultaTelefonePath; ?>/assests/imgs/Logotipo.png" alt="" width="80%" height="100%">
      </div>
      <!-- MENU LATERAL -->
      <ul class="sidebar-nav" data-coreui="navigation" data-simplebar="">
        <li class="nav-title" style="color:#000">Menu</li>
        <li class="nav-item"><a class="nav-link" href="servico" style="color:#000">
           Serviço</a>
        </li>
        
        <?php
        // Mostra opções adicionais para o administrador
        if ($role === 'admin') {
            echo '
              <li class="nav-item"><a class="nav-link" href="dashboard" style="color:#000" >
                   Dashboard</a>
              </li>
              <li class="nav-item"><a class="nav-link" href="historico-usuario" style="color:#000">
                   Histórico de Usuário</a>
              </li>
              <li class="nav-item"><a class="nav-link" href="historico-log" style="color:#000">
                   Histórico de Logs</a>
              </li>
              <li class="nav-item"><a class="nav-link" href="database" style="color:#000">
                   Modelo de DB</a>
              </li>
            ';
        }
        ?>
</ul>
    </div>
    <!-- HEADER -->
    <div class="wrapper d-flex flex-column min-vh-100 bg-light" >
      <header class="header header-sticky mb-4" id="header">
        <div class="container-fluid">
        <!--BUTTON DIMINUIR HEADER -->
          <button class="header-toggler px-md-0 me-md-3" type="button" onclick="coreui.Sidebar.getInstance(document.querySelector('#sidebar')).toggle()">
            <svg class="icon icon-lg">
              <use xlink:href="<?php echo $consultaTelefonePath; ?>/template/vendors/@coreui/icons/svg/free.svg#cil-menu"></use>
            </svg>
          </button><a class="header-brand d-md-none" href="#">
            <!-- Avatar -->
            <div class="dropdown">  
              <ul class="nav justify-content-end">
                <li class="">
                  <a class="nav-link disabled" aria-disabled="true"><?php  echo " $nomeUsuario"; ?></a>
                </li>
                <li class="">
                  <a class=" dropdown-toggle d-flex align-items-start hidden-arrow " style="margin-right: 10px;" role="button"  id="navbarDropdownMenuAvatar" data-bs-toggle="dropdown" aria-expanded="false">
                    <img
                      src="https://img.icons8.com/?size=256&id=UbNZ9CFCwtyU&format=png"
                      class="rounded-circle"
                      height="35"
                      alt="user"
                      loading="lazy"
                    />
                  </a>
                  <div class="dropdown-menu dropdown-menu-end pt-0">
                    <div class="dropdown-header bg-light py-2">
                      <div class="fw-semibold">Conta</div>
                    </div>
                      <a class="dropdown-item" href="perfil">
                      <svg class="icon me-2">
                        <use xlink:href="<?php echo $consultaTelefonePath; ?>/template/vendors/@coreui/icons/svg/free.svg#cil-user"></use>
                      </svg> Perfil</a>

                      <a class="dropdown-item" onclick="clickSair()">
                      <svg class="icon me-2">
                        <use xlink:href="<?php echo $consultaTelefonePath; ?>/template/vendors/@coreui/icons/svg/free.svg#cil-account-logout"></use>
                      </svg> Sair</a>
                  </div>
                </li>
              </ul>
            </div>
        </div>
        
      </header>
     
      <!-- CONTEUDO DO CENTRO -->
      <?php
      
                if ($currentPage === 'historico-log') {
                    require_once "views/sist/admin/histLog.php";  
        
                } else if ($currentPage === 'dashboard') {
                    require_once "views/sist/admin/dashboard.php";
                    
                }else if ($currentPage === 'perfil') {
                  require_once "views/sist/Perfil.php";
                  
                }else if ($currentPage === 'historico-usuario') {
                  require_once "views/sist/admin/TabelaUsuario.php";
                  
                }else if ($currentPage === 'database') {
                  require_once "views/sist/admin/modeloDB.php";
                  
                }else if ($currentPage === 'servico') {
                  require_once "views/sist/servico.php";
                   
              } else {
                    //require_once "controller\ErroController.php";
                }
              ?>
      
      
    </div>
    
    <form method="post" id="logoutForm">
        <input type="hidden" name="logout" value="1">
    </form>

    <!-- CoreUI and necessary plugins-->
    <script src="vendors/@coreui/coreui/js/coreui.bundle.min.js"></script>
    <script src="vendors/simplebar/js/simplebar.min.js"></script>
    <script src="vendors/chart.js/js/chart.min.js"></script>
    <script src="vendors/@coreui/chartjs/js/coreui-chartjs.js"></script>
    <script src="vendors/@coreui/utils/js/coreui-utils.js"></script>
    <script src="js/widgets.js"></script>
    <script src="../../ConsultaTelefone/template/vendors/@coreui/coreui/js/coreui.bundle.min.js"></script>


<script>
  function clickSair(){
    Swal.fire({
      title: 'Tem certeza que deseja sair?',
      showDenyButton: true,
      showCancelButton: false,
      confirmButtonText: 'Sair',
      confirmButtonColor: '#3085d6',
      denyButtonText: 'Cancela',
    }).then((result) => {
      if (result.isConfirmed) {
        document.getElementById('logoutForm').submit();
      }
    });
  }
</script>

  </body>
</html>