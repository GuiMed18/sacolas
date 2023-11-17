<?php
session_start(); 

date_default_timezone_set('America/Sao_Paulo');

include('../../database/conn/conexao.php');

// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
	header("Location: login.php");
    exit;
}
if($_SESSION['usuarioNiveisAcessoId'] == "1"){
	include ('../sidebars/sidebar.php');
}elseif($_SESSION['usuarioNiveisAcessoId'] == "2"){
	include ('../sidebars/sidebar2.php');
}elseif($_SESSION['usuarioNiveisAcessoId'] == "3"){
	include ('../sidebars/sidebar3.php');
}else{
	include ('../sidebars/sidebar2.php');

}

include('../../database/conn/confiles.php');

include('../../database/database.php');

include('../../database/func_php/php_register.php');


?>
