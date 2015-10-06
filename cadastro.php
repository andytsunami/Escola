<?php 
	$h2 = "Cadastro de alunos";
	$action = "mode_edit";
	//header("Location: listagem.php")
?>
<?php include("cabecalho.php");?>

	<form class="col s12" method="post" id="form">
      <div class="row">
        <div class="input-field col s6">
          <input id="nome" type="text" class="validate" maxlength="50" name="nome"/>
          <label for="nome">Nome completo</label>
        </div>
        <div class="input-field col s6">
          <input id="curso" type="text" class="validate" maxlength="15" name="curso">
          <label for="curso">Curso</label>
        </div>
      </div>
      <div class="row">
        <div class="input-field col s12">
          <input id="email" type="email" class="validate" maxlength="30" name="email">
          <label for="email">Email</label>
        </div>
      </div>
    </form>
<?php include( 'rodape.php'); ?>