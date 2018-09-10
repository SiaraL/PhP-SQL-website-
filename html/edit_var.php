<?php
if(!isset($_SESSION)) session_start(['cookie_lifetime' => 1800,]); 

if($_SERVER['REQUEST_METHOD']=='POST') 
{
	if(isset($_POST['edit_war']) == "Zapisz") 
	{
		$wartosc_nastawy=$_POST['edit_wartosc'];
		$id = $_SESSION['editVar'];
		
			$conn=new PDO("sqlite:baza.db");
			$sql='UPDATE SETTING_VALUE SET value=:wart WHERE id=:id';
			$st=$conn->prepare($sql);
			$st->bindValue(":wart", $wartosc_nastawy, PDO::PARAM_STR);
			$st->bindValue(":id", $id, PDO::PARAM_INT);
			$st->execute();
			$conn=null;
			header("Location: index.php?url=44");
	}
}
		

?> 