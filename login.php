<!DOCTYPE html>
<html lang="pt-br">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Painel de Sacolas</title>

    <!-- Custom fonts for this template-->
    <link href="../CPDPanel/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="../CPDPanel/css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body class="bg-gradient-success">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-xl-4 col-lg-6 col-md-8">
                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="p-5">
                                    <div class="text-center text-gray-700">
                                        <div class="sidebar-brand-icon">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" fill="currentColor" class="bi bi-bag" viewBox="0 0 16 16">
                                    <path d="M8 1a2.5 2.5 0 0 1 2.5 2.5V4h-5v-.5A2.5 2.5 0 0 1 8 1zm3.5 3v-.5a3.5 3.5 0 1 0-7 0V4H1v10a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2V4h-3.5zM2 5h12v9a1 1 0 0 1-1 1H3a1 1 0 0 1-1-1V5z"/>
                                    </svg>
                                        </div></br>
                                        <div class="sidebar-brand-text mx-3">
                                            <h4>Frente de Caixa </h4>
                                        </div>
                             <form class="form-signin" method="POST" action="func/verif_login.php">
                            <div class="card-body text-center">
                                
                        <label for="inputEmail" class="sr-only">Email</label>
                       <input type="text" name="email" id="inputEmail" class="form-control" placeholder="Email" required autofocus><br>
                       <label for="inputPassword" class="sr-only">Senha</label>
                       <input type="password" name="senha" id="inputPassword" class="form-control" placeholder="Senha" required>
                    
                  
 

                 <br>
                        </div>
                        
                        <button class="btn btn-secondary shadow-2 mb-4" type="submit">Acessar</button>
                        
                    </div>
                </form>
             
        <?php if(isset($_SESSION['loginErro'])){?>
            <p class="text-center text-danger">
        <?php    echo $_SESSION['loginErro'];
            unset($_SESSION['loginErro']);
           ?> </p>
       <?php }?>
   
    
        <?php 
        if(isset($_SESSION['logindeslogado'])){?>
        <p class="text-center text-success">
          <?php  echo $_SESSION['logindeslogado'];
            unset($_SESSION['logindeslogado']); 
            ?></p>
      <<?php  }
        ?>

                             
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    

 <!-- Required Js -->
 <script src="assets/js/vendor-all.min.js"></script>
	<script src="assets/plugins/bootstrap/js/bootstrap.min.js"></script>


</body>

</html>