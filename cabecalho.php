<html>
	<head>
<meta charset="UTF-8" />	
		<link type="text/css" rel="stylesheet" href="css/reset.css"  media="screen,projection"/>
		<!--Import Google Icon Font-->
	    <link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
	    <!--Import materialize.css-->
	    <link type="text/css" rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.1/css/materialize.min.css"  media="screen,projection"/>
	
	    <!--Let browser know website is optimized for mobile-->
      	<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
      	
      	<!--Import jQuery before materialize.js-->
      	<script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
      	<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.1/js/materialize.min.js"></script>
      	
      	<script type="text/javascript" src="https://cdn.datatables.net/r/dt/dt-1.10.9/datatables.min.js"></script>
      	<link type="text/css" rel="stylesheet" href="https://cdn.datatables.net/r/dt/dt-1.10.9/datatables.min.css"  media="screen,projection"/>
		
		<script type="text/javascript" src="https://dl.dropboxusercontent.com/u/35720465/js/konami.js"></script>
		<link type="text/css" rel="stylesheet" href="css/estilos.css"  media="screen,projection"/>
		
<title>ESCOLA: <?=$h2 ?></title>
		
		<script type="text/javascript">
			$(document).ready(function() {
				$.konami(function(ev){
					ev.preventDefault();
			 
			        var id = "#janela1";
			 
			        var alturaTela = $(document).height();
			        var larguraTela = $(window).width();
			     
			        //colocando o fundo preto
			        $('#mascara').css({'width':larguraTela,'height':alturaTela});
			        $('#mascara').fadeIn(1000); 
			        $('#mascara').fadeTo("slow",0.8);
			 
			       //var left = ($(window).width() /2) - ( $(id).width() / 2 );
			       //var top = ($(window).height() / 2) - ( $(id).height() / 2 );
			       
			       var top = 87;
			       var left = 535;
			     
			        $(id).css({'top':top,'left':left, display: 'table',height: 'auto',width: 'auto'});
			        $(id).show();
		          
				});
				
				
				var table = $("#table").DataTable({
					"lengthMenu": [[10, 25, 50, -1], [10, 25, 50, "All"]],
					"order": [[ 0, "desc" ]]
				});
				
				$("#mode_edit").click(function(){
					console.log("Logando...");
					$("#form").attr("action", "salva.php");
					$("#form").submit();
				});
				
				$("#add").click(function(){
					window.location = "cadastro.php";
				});
				
				$("#view_list").click(function(){
					window.location = "index.php";
				});
				
				$("#list").click(function(){
					window.location = "listaAlunos.php";
				});
				
				$("#table tbody").on('click','.remover',function(){
					var codRa = $(this).parents('tr').attr('id');
					var linha = $(this).parents('tr');
					$.post("exclui.php", {ra: codRa}).done(function(data){
							$(linha).fadeOut("slow",function(){
								table.row(linha).remove().draw();
							});
					});
				});
				
				$("#table tbody").on('click','.editar',function(){
					var codRa = $(this).parents('tr').attr('id');
					window.location = "cadastro.php?ra="+codRa;
				});
				
				/*MODAL*/
				
		 
			    $("#mascara").click( function(){
			        $(this).hide();
			        $(".window").hide();
			    });
			 
			    $('.fechar').click(function(ev){
			        ev.preventDefault();
			        $("#mascara").hide();
			        $(".window").hide();
			    });
				
			});
			
		</script>
		
	</head>
	<body>
		<div class="window" id="janela1">
		    <a href="#" class="fechar large material-icons">close</a>
		    <h4 class="center teal-text text-darken-2 header">Moises... Não consegue.</h4>
		    <img id="moises" src="img/moises.jpg"/>
		</div>
		<div id="mascara"></div>
		
		
		  <nav>
		    <div class="teal nav-wrapper">
		      <a href="index.php" class="brand-logo"><img src="img/logo.png" alt="logo" class="logo"/></a>
		      <a href="index.php" data-activates="mobile-demo" class="button-collapse"><i class="material-icons">menu</i></a>
		      <ul class="right hide-on-med-and-down">
		        <li><a href="index.php">Listagem de alunos</a></li>
		        <li><a href="listaAlunos.php">Listagem completa de alunos</a></li>
		        <li><a href="cadastro.php">Cadastro de alunos</a></li>
		      </ul>
		      <ul class="side-nav" id="mobile-demo">
		        <li><a href="index.php">Listagem de alunos</a></li>
		        <li><a href="listaAlunos.php">Listagem completa de alunos</a></li>
		        <li><a href="cadastro.php">Cadastro de alunos</a></li>
		      </ul>
		    </div>
		  </nav>
		  
<div class="container">
        	<div class="row">
			    <div class="col s12 m9 l12">
			    	<div class="section scrollspy">
				      <h2 class="teal-text text-darken-2 header"><?=$h2 ?></h2>