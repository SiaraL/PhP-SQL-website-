<?php
		
	if($_SERVER['REQUEST_METHOD']=='POST') 
	{
	
		if(isset($_POST['dodaj_uzytkownika']) == "Dodaj użytkownika") 
		{
			$nazwa = $_POST['nazwa_uzytkownika'];
			$haslo = $_POST['haslo'];
			$haslo_szyfrowane = password_hash($haslo, PASSWORD_DEFAULT);
			$uprawnienia = $_POST['uprawnienia'];
			
			require("klasy/User.php");
			$row = User::pobierz_user();
			foreach($row as $nazwauzytkownika)
			{
				if($nazwa==$nazwauzytkownika->username)
				{
					$blad2=1;
				}
			}
			
			if($uprawnienia=="tak" || $uprawnienia=="TAK")
			{
				$admin = 1;
			}
			else if($uprawnienia=="nie" || $uprawnienia=="NIE")
			{
				$admin = 0;
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

					$sql='INSERT INTO USER (username, password, admin_flag) VALUES (:usern, :passw, :adm_flag)';
					
					$st=$conn->prepare($sql);
					
					$st->bindValue(":usern", $nazwa, PDO::PARAM_STR);
					$st->bindValue(":passw", $haslo_szyfrowane, PDO::PARAM_STR);
					$st->bindValue(":adm_flag", $admin, PDO::PARAM_INT);
					
					$st->execute();
					$conn=null;
					header("Location: index.php?url=24");
				}
			}
		}
	} 
?>