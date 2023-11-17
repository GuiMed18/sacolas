<?php
include('../../CPDPanel/database/conn/conexao.php');

date_default_timezone_set('America/Sao_Paulo');

$operador = $_POST['operador'];
$quantidade = "-".$_POST['qtde'];
$acao = 'Retirada';
$usuario = $_POST['nome'];

$dia = date('d/m/Y');
$hr = date('H:i');



if(is_null($operador) || $quantidade == "-" || $operador == ""){
$sql = false;
}else{
    $sql = "INSERT INTO sacolas(transacao,acao,operador,usuario,hora,data) VALUES ('$quantidade','$acao','$operador','$usuario','$hr','$dia')";
   
}   



$query = mysqli_query($conn,$sql);

if($query){
   header("Location: https://srvsave140.br-atacadao.corp/sacolas/index.php?status=ok");
}else{
  header("Location: https://srvsave140.br-atacadao.corp/sacolas/index.php?status=erro");
}




?>


