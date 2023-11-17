<?php
include('../../CPDPanel/database/conn/conexao.php');

date_default_timezone_set('America/Sao_Paulo');

$quantidade = "-".$_POST['qtde'];
$acao = 'Avaria';
$usuario = $_POST['nome'];

$dia = date('d/m/Y');
$hr = date('H:i');

if($quantidade == "-"){
    $sql = false;
    }else{
        $sql = "INSERT INTO sacolas(transacao,acao,operador,usuario,hora,data) VALUES ('$quantidade','$acao','$operador','$usuario','$hr','$dia')";

    }  

$query = mysqli_query($conn,$sql);

if($query){
    header("Location: https://srvsave140.br-atacadao.corp/sacolas/index.php?status=ok&tela=avaria");
 }else{
     header("Location: https://srvsave140.br-atacadao.corp/sacolas/index.php?status=erro&tela=avaria");
 }
?>


