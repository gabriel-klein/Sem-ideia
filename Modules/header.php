<!DOCTYPE html>
<html>
<?php include 'database.php'; ?>
<head>
  <title>Banco de talentos</title>
  <meta charset="UTF-8">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.6.9/angular.min.js"></script>
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
  <script src="Banco de talentos.js"></script>
  <link rel="stylesheet" href="style.css">
</head>
<body class="container-fluid"  ng-app="app" onload="show(); ">
<!--     <div class="row" id="topo" >
    <img src="Logo_Comunitario.png" width="150" height="80">
    </div><br><br> -->
  <nav class="navbar navbar-expand-lg navbar-light bg-light mb-2">
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navcol" aria-controls="navbarTogglerDemo03" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <a class="navbar-brand" href="home.php"><img src="" alt="Ação Comunitária"></a>

    <div class="collapse navbar-collapse" id="navcol">
      <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
        <li class="nav-item active">
          <a class="nav-link" href="home.php">Página Inicial</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="cadastro.php">Cadastro <i class="fas fa-user-plus"></i></a>
        </li>
      </ul>
      <button class="btn btn-outline-dark my-2 my-sm-0" type="submit"><i class="fas fa-sign-in-alt"></i> Entrar</button>
    </div>
  </nav>