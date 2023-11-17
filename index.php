<!DOCTYPE html>
<html lang="pt-br">
<?php
session_start();
date_default_timezone_set('America/Sao_Paulo');
// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
	header("Location: login.php");
    exit;
}

include('../CPDPanel/database/conn/conexao.php');
include('../CPDPanel/database/database.php');
include('func/dados_relatorio.php');



?>
<head>

<!-- Custom fonts for this template-->
<link href="../CPDPanel/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">



  
<script src="js/jquery/jquery-3.6.0.min.js"></script>
   
<?php
include('head.php');
$login_user = $_SESSION['usuarioEmail'];
?>
<style>
#divs{
margin-left:6em;
margin-top:5em;
position: inherit;
}


</style>
</head>


						

<body id="page-top" class="bg-secondary">


			<?php 
			include('navbar.php');?>		
			<br>
			
			<?php 
	if(isset($_GET['status']) && $_GET['status'] == 'erro'){?>

<script>
	$(document).ready(function(){
    $("#ModalErro").modal('show');
  });
  </script>

	<?php }elseif(isset($_GET['status']) && $_GET['status'] == 'ok'){ ?>

		<script>
	$(document).ready(function(){
    $("#ModalOk").modal('show');
  });
  </script>
		
	<?php }?>

	<div class="container-fluid">
<!-- Tela de Avarias -->
	<?php if(isset($_GET['tela']) && $_GET['tela'] == 'avaria'){?>
	
		<div class="card text-center">
	<div class="card-header">
		<ul class="nav nav-tabs card-header-tabs">
		<li class="nav-item">
			<a class="nav-link" href="index.php">Retirada</a>
		</li>
		<li class="nav-item">
			<a class="nav-link active" href="?tela=avaria">Retirada por Avarias</a>
		</li>
		
		<li class="nav-item">
			<a class="nav-link" href="?tela=relatorio">Relatório Diário</a>
		</li>
		<li class="nav-item">
			<a class="nav-link" href="?tela=rel_acum">Relatório Acumulado</a>
		</li>
		</ul>
	</div>
	<div class="card-body">
		<h5 class="card-title">Retirada de Sacolas por avaria</h5>
		
		<p class="card-text">Insira a quantidade.</p>
		<form action="func/avaria.php" method="POST">
		<input type="text" name="nome" value="<?php echo $login_user; ?> "hidden>
		<input type="number" name="qtde" class="form-control">
		<br/>
		<input type="submit" placeholder="Efetuar" class="btn btn-secondary shadow-2 mb-4">
		</form>
	</div>
	</div>
	<!-- Tela de Relatório diário -->
	<?php }elseif(isset($_GET['tela']) && $_GET['tela'] == 'relatorio'){ ?>
	<div class="card text-center">
	<div class="card-header">
		<ul class="nav nav-tabs card-header-tabs">
		<li class="nav-item">
			<a class="nav-link" href="index.php">Retirada</a>
		</li>
		<li class="nav-item">
			<a class="nav-link" href="?tela=avaria">Retirada por Avarias</a>
		</li>
		
		<li class="nav-item">
			<a class="nav-link active" href="?tela=relatorio">Relatório Diário</a>
		</li>
		<li class="nav-item">
			<a class="nav-link" href="?tela=rel_acum">Relatório Acumulado</a>
		</li>
		</ul>
	</div>
	<div class="card-deck" style="margin:1em">
	
  
  <div class="card">
  <div class="card-header">Avariadas</div>
    <div class="card-body">	
		<br>	
         <p class="card-text"><?php if($avariadas == ""){echo "0";}else{echo $avariadas; }?> Und</p>
		 <br>
      <p class="card-text"><small class="text-muted">Sacolas avariadas em <?php echo $data; ?></small></p>
    </div>
  </div>
  <div class="card">
  <div class="card-header">Utilizadas</div>
    <div class="card-body">		
		<br>
         <p class="card-text"><?php if($retirada == ""){echo "0";}else{echo str_replace('-','',$retirada); }?> Und</p>
		 <br>
      <p class="card-text"><small class="text-muted">Sacolas retiradas em <?php echo $data; ?></small></p>
    </div>
  </div>
  <div class="card">
  <div class="card-header">Operador do dia</div>
    <div class="card-body">	
		<br>
		<p class="card-text"><?php if(isset($operador_diaria[0])){echo $operador_diaria[0];}?></p>
	<br>
       
		 
   	  <p class="card-text"> <small class="text-muted"><?php if(isset($qtde_sacolas_operador[0])){echo $qtde_sacolas_operador[0]." Und";}?></small></p>
    </div>
  </div>
</div>
<br>
<table class="table">
	<thead><h4>Registros diários</h4>
	<br>
  <tr>
    <th>Operador</th>
    <th>Quantidade</th>
    <th>Ação</th>
	<th>Usuário</th>
	<th>Horário</th>
  </tr>
  </thead>
  <tbody>


  <?php 
  $linhas = 0;


	while($linhas <= 30){
		
		
		if(isset($id[$linhas]) != true){
			break;
		  }?>
		  
 	  <tr class="mb-1">
	<td><?php echo $operador_ranking[$linhas]; ?></td>
	<td><?php echo $qtde_sacolas_ranking[$linhas]; ?></td>
	<td><?php echo $acao_ranking[$linhas]; ?></td>
	<td><?php echo $usuario_ranking[$linhas]; ?></td>
	<td><?php echo $horario_ranking[$linhas]; ?></td>
	
	</tr>

<?php	$linhas++;}  ?>
   
 
  </tbody>



	</table>

		</div>
	</div>
	</div>
	<!-- Tela de Relatório acumulado -->
	<?php }elseif(isset($_GET['tela']) && $_GET['tela'] == 'rel_acum'){?>
	<div class="card text-center">
	<div class="card-header">
		<ul class="nav nav-tabs card-header-tabs">
		<li class="nav-item">
			<a class="nav-link" href="index.php">Retirada</a>
		</li>
		<li class="nav-item">
			<a class="nav-link" href="?tela=avaria">Retirada por Avarias</a>
		</li>
		
		<li class="nav-item">
			<a class="nav-link" href="?tela=relatorio">Relatório Diário</a>
		</li>
		<li class="nav-item">
			<a class="nav-link active" href="?tela=rel_acum">Relatório Acumulado</a>
		</li>
		</ul>
	</div>
	<div class="card-deck" style="margin:1em">
	
  
  <div class="card">
  <div class="card-header">Avariadas</div>
    <div class="card-body">	
		<br>	
         <p class="card-text"><?php if($avariadas_acu == ""){echo "0";}else{echo $avariadas_acu;} ?> Und</p>
		 <br>
      <p class="card-text"><small class="text-muted">Sacolas avariadas no mês <?php $mes = date('m'); echo $mes; ?></small></p>
    </div>
  </div>
  <div class="card">
  <div class="card-header">Utilizadas</div>
    <div class="card-body">		
		<br>
         <p class="card-text"><?php if($retirada_acu == ""){echo "0";}else{ echo $retirada_acu;} ?> Und</p>
		 <br>
      <p class="card-text"><small class="text-muted">Sacolas retiradas no mês <?php echo $mes; ?></small></p>
    </div>
  </div>
  <div class="card">
  <div class="card-header">Operador do mês</div>
    <div class="card-body">	
		<br>
	<p class="card-text"><?php if(isset($qtde_sacolas_operador_acu[0]) != true){echo "";}else{ echo str_replace('-','',$qtde_sacolas_operador_acu[0])." Und";}?></p>
	<br>
         <p class="card-text"><small class="text-muted"><?php if(isset($operador_acu[0]) != true){echo "";}else{echo  $operador_acu[0];}?></small></p>
		 
   	  
    </div>
  </div>
</div>
<br>
<table class="table">
	<thead><h4>Registros Mensais</h4>
	<br>
  <tr>
    <th>Dia</th>
    <th>Quantidade de retiradas</th>
    <th>Quantidade de avariadas</th>
	
  </tr>
  </thead>
  <tbody>


  <?php 
  $linhas = 0;


	while($linhas <= 30){
		
		
		if(isset($id_retirada[$linhas]) != true){
			break;
		  }?>
		  
 	  <tr class="mb-1">
	<td><?php if(isset($data_retirada_dias[$linhas]) != true || $data_retirada_dias[$linhas] == ""){echo "";}else{echo $data_retirada_dias[$linhas];} ?></td>
	<td><?php if(isset($sacolas_retirada_dias[$linhas]) != true || $sacolas_retirada_dias[$linhas] == ""){echo "0";}else{echo $sacolas_retirada_dias[$linhas];}?></td>
	<td><?php if(isset($sacolas_avaria_dias[$linhas]) != true || $sacolas_avaria_dias[$linhas] == "" ){ echo "0";}else{ echo str_replace('-','',$sacolas_avaria_dias[$linhas]);} ?></td>
	
	
	</tr>

<?php	$linhas++;}  ?>
   
 
  </tbody>



	</table>


		</div>
	</div>
	</div>
<!-- Tela de Retirada de sacolas -->
	<?php }else{ ?>
		<div class="card text-center">
	<div class="card-header">
		<ul class="nav nav-tabs card-header-tabs">
		<li class="nav-item">
			<a class="nav-link active" href="index.php">Retirada</a>
		</li>
		
		<li class="nav-item">
			<a class="nav-link" href="?tela=avaria">Retirada por Avarias</a>
		</li>
		
		<li class="nav-item">
			<a class="nav-link" href="?tela=relatorio">Relatório Diário</a>
		</li>
		<li class="nav-item">
			<a class="nav-link" href="?tela=rel_acum">Relatório Acumulado</a>
		</li>
		</ul>
	</div>
		<div class="card-body">
		<h3 class="card-title">Retirada de Sacolas</h3>
		<br>

	
		Escolha o método de busca<br><br>
		
		
		
		<input type="button" value="Nome do operador" class="btn btn-secondary pulse" name="option" id="" onclick=location.href="index.php?option=nome">
	
		<input type="button" value="Número do operador" class="btn btn-secondary pulse" id="" onclick=location.href="index.php?option=numero"><br><br>
		
		<form id="formulario" name="formulario" method="POST" action="func/retirada.php">

		<?php if(isset($_GET['option']) && $_GET['option'] == 'nome'){ ?>
			<select name="operador" id="operador_nome" class="form-control">
		<?php								
		$sql_operadores = mysqli_query($connection,"SELECT * FROM operadores_fcx order by nome_op asc");
		while ($linha = mysqli_fetch_array($sql_operadores))
		{
		$operador = $linha['operador'];
		$nome_op = $linha['nome_op'];

		$operador_com_nome = $operador.'-'.$nome_op;
		?>
		<option value="" hidden selected>Insira um nome de operador</option>
		<option value="<?php echo $operador_com_nome;?>"> <?php  echo $nome_op; ?></option>
		
		<?php
		}
		?>							
		</select>
		<?php
		}else{
		?>		
		<select name="operador" id="operador_numero" class="form-control">
		<?php								
		$sql_operadores = mysqli_query($connection,"SELECT * FROM operadores_fcx order by operador asc");
		while ($linha = mysqli_fetch_array($sql_operadores))
		{
		$operador = $linha['operador'];
		$nome_op = $linha['nome_op'];

		$operador_com_nome = $operador.'-'.$nome_op;
		?>
		<option value="" hidden selected>Insira um número de operador</option>
		<option value="<?php echo $operador_com_nome;?>"> <?php  echo $operador; ?></option>
		
		<?php
		}
		?>
		</select>
		<?php
		}
		?>
		
		<br/>
		Insira a quantidade.
		<br/><br/>
		<select name="qtde" class="form-control">
			<option value="20">20 Und</option>
			<option value="40">40 Und</option>
			<option value="50">50 Und</option>
			<option value="60">60 Und</option>
			<option value="80">80 Und</option>
			<option value="100">100 Und</option>
		</select>
		
		<br/><br/>
		<input type="text" name="nome" value="<?php echo $login_user; ?> "hidden>

		<input type="submit" class="btn btn-secondary shadow-2 mb-4" >

	</form>
	</div>
	</div>
	<?php	} ?>
	<br>
	
</div> <!-- Fecha Conteiner -->		

<!-- Modal de Erro-->
<div class="modal fade" id="ModalErro" tabindex="-1" role="dialog" aria-labelledby="ModalErroLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
	
	 
        <h5 class="modal-title text-center" id="ModalErroLabel"> <img src="img/alarme.gif" style="width: 3em; margin-right:5em;" alt="" srcset=""> Atenção</h5>
		
		
        <button type="button" class="close" data-dismiss="modal" aria-label="Fechar">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
 
        Revise os campos antes de inserir
		
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
		
        
      </div>
    </div>
  </div>
</div>

<!-- Modal de Sucesso -->
<div class="modal fade" id="ModalOk" tabindex="-1" role="dialog" aria-labelledby="ModalOkLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
	
	 
        <h5 class="modal-title text-center" id="ModalOkLabel"> <img src="img/sucesso.gif" style="width: 3em; margin-right:5em;" alt="" srcset=""> Sucesso</h5>
		
		
        <button type="button" class="close" data-dismiss="modal" aria-label="Fechar">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
		<!-- Se o array tela for avaria, mostra a msg de avarias -->
	<?php if(isset($_GET['tela']) && $_GET['tela'] == 'avaria'){?>
	 Adicionadas <?php echo $qtde; ?> sacolas em avarias
	<?php }else{ ?>
	Retirada de <?php echo $qtde;?> sacolas <br>p/ operador(a) <?php echo $operador_dina;?>
	<?php } ?>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary pulse" data-dismiss="modal">Fechar</button>
		
        
      </div>
    </div>
  </div>
</div>
				
					
<script>





function esconde() {
			document.getElementById("msg").style.visibility = "hidden";
			}
			setTimeout(esconde, 2000);
			
</script>
					

			<?php
			include('cab_rod_cn/rodape.php');
			
		
			?>
					
</body>

</html>
