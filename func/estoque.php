<?php
include('../../CPDPanel/database/conn/conexao.php');

date_default_timezone_set('America/Sao_Paulo');

$operador = $_POST['operador'];
$quantidade = $_POST['qtde'];
$acao = 'Entrada';
$usuario = $_POST['nome'];

$dia = date('d/m/Y');
$hr = date('H:i');


$sql = "INSERT INTO sacolas(transacao,acao,operador,usuario,hora,data) VALUES ('$quantidade','$acao','$operador','$usuario','$hr','$dia')";

$query = mysqli_query($conn,$sql);

if($query){
   header("Location: https://srvsave140.br-atacadao.corp/sacolas/index.php?status=ok&tela=estoque");
}else{
    header("Location: https://srvsave140.br-atacadao.corp/sacolas/index.php?status=erro&tela=estoque");
}
?>


