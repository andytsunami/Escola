<?php 
	require_once 'config.php';
	header('Content-Type: text/html; charset=utf-8');
	
	$conexao = @mysql_connect($host, $usuario, $senha) or exit(mysql_error());
	mysql_set_charset("utf8", $conexao);
	
	mysql_select_db($banco);
	
	$nome = htmlentities($_POST['nome'],ENT_QUOTES);
	$curso = htmlentities($_POST['curso'],ENT_QUOTES);
	$email = htmlentities($_POST['email'],ENT_QUOTES);
	
	
	$sql = "INSERT INTO aluno (NOME, CURSO, EMAIL) VALUES ('".$nome."','".$curso."','".$email."');";
	$query = mysql_query($sql, $conexao);
	
	$retorno = "Aluno cadastrado com sucesso!";  
	header("Location: listaAlunos.php");
	
?>