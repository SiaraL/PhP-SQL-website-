<?php if(!isset($_SESSION)) session_start(['cookie_lifetime' => 1800,]); 

if($_SERVER['REQUEST_METHOD']=='POST') 
{
	if(isset($_POST['edycja_user']) == "Zapisz") 
	{
		$nazwa_uzytkownika=$_POST['edycja_username'];
		$haslo_uzytkownika=$_POST['edycja_password'];
		$haslo = password_hash($haslo_uzytkownika, PASSWORD_DEFAULT);	
		$czy_aktywna=$_POST['edycja_uprawnienia'];
		$id = $_SESSION['editUser'];
		
		require("klasy/User.php");
		$row = User::pobierz_user();
		foreach($row as $nazwauzytkownika)
		{
			if($nazwa_uzytkownika == $nazwauzytkownika->username && $id != $nazwauzytkownika->id)
			{
				$blad2=1;
			}
		}
		
		if($czy_aktywna=='tak' || $czy_aktywna=='TAK')
		{
			$aktywna = 1;
		}
		elseif($czy_aktywna=='nie' || $czy_aktywna=='NIE')
		{
			$aktywna = 0;
		}
		else
		{
			$blad = 1;
		}
		
		if(isset($blad2))
		{
			header("Location: index.php?url=37");
		}
		else
		{
			if(isset($blad))
			{
			header("Location: index.php?url=23");
			}
			else
			{			
			$conn=new PDO("sqlite:baza.db");
			$sql='UPDATE USER SET username=:usnam, password=:passw, admin_flag=:activ WHERE id=:id';
			$st=$conn->prepare($sql);
			$st->bindValue(":usnam", $nazwa_uzytkownika, PDO::PARAM_STR);
			$st->bindValue(":passw", $haslo, PDO::PARAM_STR);
			$st->bindValue(":activ", $aktywna, PDO::PARAM_INT);
			$st->bindValue(":id", $id, PDO::PARAM_INT);
			$st->execute();
			$conn=null;
			header("Location: index.php?url=35");
			}
		}
	}
}
?> 