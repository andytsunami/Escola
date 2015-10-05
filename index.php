<?php 
	require 'config.php';
	$conexao = @mysql_connect($host, $usuario, $senha) or exit(mysql_error());
	mysql_set_charset("utf8", $conexao);
	
	mysql_select_db($banco);
	$sql = "SELECT RA,NOME,CURSO FROM aluno order by nome ASC;";
	$query = mysql_query($sql, $conexao);
	
	$registros = mysql_num_rows($query); 
header('Content-Type: text/html; charset=utf-8');
?>
<html>
	<head>
		<meta charset="UTF-8" />	
		<link type="text/css" rel="stylesheet" href="css/reset.css"  media="screen,projection"/>
		<!--Import Google Icon Font-->
	    <link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
	    <!--Import materialize.css-->
	    <link type="text/css" rel="stylesheet" href="css/materialize.min.css"  media="screen,projection"/>
	
	    <!--Let browser know website is optimized for mobile-->
      	<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
      	
      	<!--Import jQuery before materialize.js-->
      	<script type="text/javascript" src="js/jquery-2.1.4.min.js"></script>
      	<script type="text/javascript" src="js/materialize.min.js"></script>
      	
      	<script type="text/javascript" src="js/datatables.min.js"></script>
      	<link type="text/css" rel="stylesheet" href="css/datatables.min.css"  media="screen,projection"/>
		
		<link type="text/css" rel="stylesheet" href="css/estilos.css"  media="screen,projection"/>
		
		<title>Escola</title>
		
		<script type="text/javascript">
			$(document).ready(function() {
				$("#table").DataTable({
					"lengthMenu": [[10, 25, 50, -1], [10, 25, 50, "All"]]
				});
				
			});
			
		</script>
		
	</head>
	<body>
		
		  <nav>
		    <div class="teal nav-wrapper">
		      <a href="#!" class="brand-logo">Escola</a>
		      <a href="#" data-activates="mobile-demo" class="button-collapse"><i class="material-icons"></i></a>
		      <ul class="right hide-on-med-and-down">
		        <li><a href="#">Listagem de alunos</a></li>
		        <li><a href="#">Listagem completa de alunos</a></li>
		        <li><a href="#">Cadastro de alunos</a></li>
		      </ul>
		      <ul class="side-nav" id="mobile-demo">
		         <li><a href="#">Listagem de alunos</a></li>
		        <li><a href="#">Listagem completa de alunos</a></li>
		        <li><a href="#">Cadastro de alunos</a></li>
		      </ul>
		    </div>
		  </nav>
        
        <div class="container">
        	<div class="row">
			    <div class="col s12 m9 l12">
			    	<div class="section scrollspy">
				      <h2 class="teal-text text-darken-2 header">Listagem de alunos</h2>
						<table class="striped highlight" id="table">
							<thead>
								<tr class="teal-text">
									<th>
										ra
									</th>
									<th>
										nome
									</th>
									<th>
										curso
									</th>
								</tr>
							</thead>
							<tbody>
								<?php if ($registros){
									while($result = mysql_fetch_array($query)){
								?>
										<tr>
											<td><?=$result["RA"]?></td>
											<td><?=$result["NOME"]?></td>
											<td><?=$result["CURSO"]?></td>
										</tr>
								<?php 
									}
								}
								?>
							</tbody>
							<tfoot>
								<tr class="teal-text">
									<th>
										ra
									</th>
									<th>
										nome
									</th>
									<th>
										curso
									</th>
								</tr>
							</tfoot>
						</table>			
					</div>
			    </div>
        	</div>
        </div>
		
		<div class="fixed-action-btn" style="bottom: 45px; right: 24px;">
		    <a class="btn-floating btn-large teal">
		      <i class="large material-icons">add</i>
		    </a>
		    <ul>
		      <li><a class="btn-floating yellow darken-1"><i class="material-icons">view_list</i></a></li>
		      <li><a class="btn-floating green"><i class="material-icons">list</i></a></li>
		    </ul>
 		 </div>
	</body>
</html>