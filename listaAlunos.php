<?php 
	require 'config.php';
	$conexao = @mysql_connect($host, $usuario, $senha) or exit(mysql_error());
	mysql_set_charset("utf8", $conexao);
	
	mysql_select_db($banco);
	$sql = "SELECT RA,NOME,CURSO,EMAIL FROM aluno order by nome DESC;";
	$query = mysql_query($sql, $conexao);
	
	$registros = mysql_num_rows($query); 
	header('Content-Type: text/html; charset=utf-8');
	
	$h2 = "Listagem de alunos";
	$action = "add";
	
	//header("Location: cadastro.php")
?>

		<?php include("cabecalho.php");?>
        
						<table class="striped highlight left" id="table">
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
									<th>
										Email
									</th>
									<th>Editar</th>
									<th>Remover</th>
								</tr>
							</thead>
							<tbody>
								<?php if ($registros){
									while($result = mysql_fetch_array($query)){
								?>
										<tr id="<?=$result["RA"]?>">
											<td><?=$result["RA"]?></td>
											<td><?=$result["NOME"]?></td>
											<td><?=$result["CURSO"]?></td>
											<td><a href="mailto:<?= strtolower($result["EMAIL"])?>"><?= strtolower($result["EMAIL"])?></a></td>
											<td><i class="material-icons editar">edit</i></td>
											<td><i class="material-icons remover">delete</i></td>
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
									<th>
										Email
									</th>
									<th>Editar</th>
									<th>Remover</th>
								</tr>
							</tfoot>
						</table>			
					
		
		<?php include("rodape.php");?>