<?php 
	require_once 'config.php';
	header('Content-Type: text/html; charset=utf-8');
	
	$conexao = @mysql_connect($host, $usuario, $senha) or exit(mysql_error());
	mysql_set_charset("utf8", $conexao);
	
	mysql_select_db($banco);
	
	$nome = htmlentities($_POST['nome'],ENT_QUOTES);
	$curso = htmlentities($_POST['curso'],ENT_QUOTES);
	$email = htmlentities($_POST['email'],ENT_QUOTES);
	
	$sql = "";
	$retorno = "";
	
	if(isset($_POST['RA'])){
		$ra = $_POST['RA'];
		$sql =  "UPDATE aluno SET NOME = '{$nome}', CURSO = '{$curso}', EMAIL = '{$email}' WHERE RA = {$ra};";
		$retorno = "Aluno alterado com sucesso!"; 
	} else {
		$sql = "INSERT INTO aluno (NOME, CURSO, EMAIL) VALUES ('".$nome."','".$curso."','".$email."');";
		$retorno = "Aluno cadastrado com sucesso!";
	}
	
	$query = mysql_query($sql, $conexao);
	
	  
	header("Location: listaAlunos.php");
	
?>