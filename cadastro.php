<?php 
	$h2 = "Cadastro de alunos";
	$action = "mode_edit";
	//header("Location: listagem.php")
?>
<?php include("cabecalho.php");?>

	<form class="col s12" method="post">
      <div class="row">
        <div class="input-field col s6">
          <input id="ra" type="text" class="validate" maxlength="8">
          <label for="ra">RA</label>
        </div>
        <div class="input-field col s6">
          <input id="nome" type="text" class="validate"/>
          <label for="nome">Nome completo</label>
        </div>
      </div>
      <div class="row">
        <div class="input-field col s12">
          <input id="email" type="email" class="validate">
          <label for="email">Email</label>
        </div>
      </div>
    </form>
    	
<?php include( 'rodape.php'); ?>