<?php
date_default_timezone_set('America/Sao_Paulo');


$data = date('d/m/Y');
//Soma estoque
$sql_estoque = "SELECT sum(transacao) as estoque from sacolas where data LIKE '%$data%'";

$query = mysqli_query($conn,$sql_estoque);

while($dados = mysqli_fetch_assoc($query)){
    $estoque = $dados['estoque'];   
}
//Soma avaria
$sql_avaria = "SELECT sum(transacao) as avaria from sacolas where data LIKE '%$data%' and acao = 'Avaria'";

$query = mysqli_query($conn,$sql_avaria);

while($dados = mysqli_fetch_assoc($query)){
    $avariadas = $dados['avaria'];   
}
$avariadas = str_replace('-','',$avariadas);

//Soma retirada
$sql_retirada = "SELECT sum(transacao) as retirada from sacolas where data LIKE '%$data%' and acao = 'Retirada'";

$query = mysqli_query($conn,$sql_retirada);

while($dados = mysqli_fetch_assoc($query)){
    $retirada = $dados['retirada'];   
}
$retirada = str_replace('-','',$retirada);

//Info dinamica

$sql_dinam = "SELECT * FROM sacolas order by id DESC limit 1";

$query = mysqli_query($conn, $sql_dinam);

while($dados = mysqli_fetch_array($query)){
    $operador_dina = $dados['operador'];
    $qtde = $dados['transacao'];
    $qtde = str_replace('-','',$qtde);
}

//Quantidade por operador diária

$sql_diaria = "SELECT distinct id, acao,data, operador, sum(transacao) as sacolas_qtde from sacolas where data LIKE '%$data%' AND acao LIKE '%Retirada%' GROUP BY operador order by sacolas_qtde asc LIMIT 1";

$query = mysqli_query($conn, $sql_diaria);
$cont = 0;
while($row = mysqli_fetch_array($query)){
    $operador_diaria[$cont] = $row['operador'];     
    $qtde_sacolas[$cont]  = $row['sacolas_qtde'];    
    $qtde_sacolas_operador = str_replace('-','',$qtde_sacolas);

   
    
    $cont++;
    
}
//Registro diário tabela

$sql_diaria = "SELECT id, usuario, acao, data, hora, operador, transacao from sacolas where data LIKE '%$data%' order by id desc";

$query = mysqli_query($conn, $sql_diaria);
$cont = 0;
while($row = mysqli_fetch_array($query)){
    $operador_ranking[$cont] = $row['operador'];
    $id[$cont] = $row['id'];
    $qtde_sacolas_ranking[$cont]  = $row['transacao'];    
    $acao_ranking[$cont] = $row['acao'];
    $horario_ranking[$cont]  = $row['hora'];
    $usuario_ranking[$cont] = $row['usuario'];
    $data_ranking[$cont] = $row['data'];

    $horario_ranking[$cont] = $data_ranking[$cont].' ás '.$horario_ranking[$cont];
   
    
    $cont++;
    
}
$primeiro_dia_do_mes = date('01/m/Y');
$ultimo_dia_do_mes = date('31/m/Y');

//Soma avaria mensal
$sql_avaria_acu = "SELECT sum(transacao) as avaria from sacolas where data >= '$primeiro_dia_do_mes' and data <= '$ultimo_dia_do_mes' and acao = 'Avaria'";

$query_acu = mysqli_query($conn,$sql_avaria_acu);

while($dados = mysqli_fetch_assoc($query_acu)){
    $avariadas_acu = $dados['avaria'];   
}
$avariadas_acu = str_replace('-','',$avariadas_acu);

//Soma retirada
$sql_retirada_acu = "SELECT sum(transacao) as retirada from sacolas where data >= '$primeiro_dia_do_mes' and data <= '$ultimo_dia_do_mes' and acao = 'Retirada'";

$query_acu = mysqli_query($conn,$sql_retirada_acu);

while($dados = mysqli_fetch_assoc($query_acu)){
    $retirada_acu = $dados['retirada'];   
}
$retirada_acu = str_replace('-','',$retirada_acu);


//Quantidade por operador acumulada

$sql_operador_acu = "SELECT distinct id, acao,data, operador, sum(transacao) as sacolas_qtde from sacolas where data >= '$primeiro_dia_do_mes' and data <= '$ultimo_dia_do_mes' AND acao LIKE '%Retirada%' GROUP BY operador order by sacolas_qtde asc LIMIT 1";

$query = mysqli_query($conn, $sql_operador_acu);
$cont = 0;
while($row = mysqli_fetch_array($query)){
    $operador_acu[$cont] = $row['operador'];     
    $qtde_sacolas_acu[$cont]  = $row['sacolas_qtde'];    
    $qtde_sacolas_operador_acu = str_replace('-','',$qtde_sacolas_acu);

   
    
    $cont++;
    
}

//Registros de tabelas
//Coleta avaria dos 30 ultimos dias

$sql_avaria_diario = "SELECT distinct id, acao,data, sum(transacao) as sacolas_qtde from sacolas where acao LIKE '%Avaria%' GROUP BY data order by data desc";

$query_avaria_diario = mysqli_query($conn,$sql_avaria_diario);
$cont = 0;
while($row = mysqli_fetch_array($query_avaria_diario)){
   
    $sacolas_avaria_dias[$cont] = $row['sacolas_qtde']; 
    $cont++;
    
}

$sql_retirada_dias = "SELECT distinct id, acao,data, sum(transacao) as sacolas_qtde from sacolas where acao LIKE '%Retirada%' GROUP BY data order by data desc";

$query_retirada_dias = mysqli_query($conn,$sql_retirada_dias);
$cont = 0;
while($row = mysqli_fetch_array($query_retirada_dias)){
    $id_retirada[$cont] = $row['id'];
    $data_retirada_dias[$cont] = $row['data'];
    $sacolas_retirada_dias[$cont] = $row['sacolas_qtde'];
   
    
    $cont++;
    
}

?>


