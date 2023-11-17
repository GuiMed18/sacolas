<?php

$nome = $_SESSION['usuarioNome'];

?>
<nav class="navbar navbar-expand-lg navbar-dark bg-success">

<div class="navbar-brand"> 				
<div class="nav-link">
	<ul class="navbar-nav mr-auto">
	<li class="nav-item active">
	<a  class="nav-link" href="index.php">
		
Frente de Caixa</a>
     </li>
	</ul>
</div>  
</div>

  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      
      
      <li  hidden class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Funcionalidades
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
		
          <a class="dropdown-item" hidden href="">Demonstrativo de transações</a> 
	
		  
		  </div>
      </li>
	 
    </ul>
	<div class="nav-link">
	<ul class="navbar-nav mr-auto">
	<li class="nav-item active">
	<a class="nav-link" href="https://srvsave140.br-atacadao.corp/sacolas/logout.php"> Logout</a>
     </li>
	</ul>
</div>  

</nav>

