<?php 
	$h2 = "Cadastro de alunos";
	$action = "mode_edit";
	
	$ra;
	$nome;
	$curso;
	$email;
	
	//header("Location: listagem.php")
?>
<?php include("cabecalho.php");?>

	<form class="col s12" method="post" id="form">
		<?php 
			if($_GET['ra'] > 0 ){
				require 'config.php';
				$conexao = @mysql_connect($host, $usuario, $senha) or exit(mysql_error());
				mysql_set_charset("utf8", $conexao);
				
				mysql_select_db($banco);
				$sql = "SELECT RA,NOME,CURSO,EMAIL FROM aluno WHERE RA = ".$_GET['ra'].";";
				$query = mysql_query($sql, $conexao);
				
				$registros = mysql_fetch_array($query); 
				header('Content-Type: text/html; charset=utf-8');
				
				$ra = $registros["RA"];
				$nome = $registros["NOME"];
				$curso = $registros["CURSO"];
				$email = $registros["EMAIL"];
				
		?>
		
		<input type="hidden" value="<?=$ra?>" name="RA" />
		
		<?php 
			}
		?>
		
      <div class="row">
        <div class="input-field col s6">
          <input id="nome" type="text" class="validate" maxlength="50" name="nome" value="<?=$nome?>"/>
          <label for="nome">Nome completo</label>
        </div>
        <div class="input-field col s6">
          <input id="curso" type="text" class="validate" maxlength="15" name="curso" value="<?=$curso?>"/>
          <label for="curso">Curso</label>
        </div>
      </div>
      <div class="row">
        <div class="input-field col s12">
          <input id="email" type="email" class="validate" maxlength="30" name="email" value="<?=$email?>"/>
          <label for="email">Email</label>
        </div>
      </div>
    </form>
<?php include( 'rodape.php'); ?>