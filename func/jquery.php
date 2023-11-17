<?php

$search = $_GET['searchFor'];


include('../CPDPanel/database/conn/conexao.php');

$sql = "SELECT operador,nome_op from operadores_fcx where operador = '$search'";

$query = mysqli_query($conn,$sql);

while($rows = mysqli_fetch_assoc($query)){
	$operador = $rows['operador'];
	$nome_op = $rows['nome_op'];

}

?>