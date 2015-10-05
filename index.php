<?php 
	require 'config.php';
	$conexao = @mysql_connect($host, $usuario, $senha) or exit(mysql_error());
	mysql_select_db($banco);
	$sql = "SELECT RA,NOME,CURSO FROM aluno order by nome ASC;";
	$query = mysql_query($sql, $conexao);
	
	$registros = mysql_num_rows($query); 
?>
<html>
	<head>
		<title>Escola</title>
	</head>
	<body>
		<div class="container">
			<h1>Listagem dos alunos</h1>
		</div>
		<div class="container">
			<table>
				<thead>
					<th>
						ra
					</th>
					<th>
						nome
					</th>
					<th>
						curso
					</th>
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
					<th>
						ra
					</th>
					<th>
						nome
					</th>
					<th>
						curso
					</th>
				</tfoot>
			</table>			
		</div>
	</body>
</html>