<?php 
	require_once 'config.php';
	header('Content-Type: text/html; charset=utf-8');
	
	$conexao = @mysql_connect($host, $usuario, $senha) or exit(mysql_error());
	mysql_set_charset("utf8", $conexao);
	
	mysql_select_db($banco);
	
	$ra = htmlentities($_POST['ra'],ENT_QUOTES);
	
	$sql = "DELETE FROM aluno WHERE RA = {$ra}";
	$query = mysql_query($sql, $conexao);
	
	echo "ok";
?>