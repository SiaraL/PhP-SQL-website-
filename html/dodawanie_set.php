<?php
	if(!isset($_SESSION)) session_start(['cookie_lifetime' => 1800,]); 
	
	
	if($_SERVER['REQUEST_METHOD']=='POST') 
	{
	
		if(isset($_POST['dodaj_zestaw']) == "Dodaj zestaw") 
		{
			$numer = $_SESSION['id'];
			$nazwa = $_POST['nazwa_zestawu'];
			$opis  = $_POST['opis'];
			$data = time();
			require("klasy/Sett.php");
			$row = Sett::pobierz_id_();
			foreach($row as $nazwazestawu)
			{
				if($nazwa==$nazwazestawu->name1)
				{
					$blad2=1;
				}
			}
			if(isset($blad2))
			{
				header("Location: index.php?url=29");
			}
			else
			{
				$conn=new PDO("sqlite:baza.db");

				$sql='INSERT INTO SETT (user_id, date_, name1, description) VALUES (:userid, :datee, :namee, :descr)';
				
				$st=$conn->prepare($sql);
				
				$st->bindValue(":userid", $numer, PDO::PARAM_STR);
				$st->bindValue(":datee", $data, PDO::PARAM_STR);
				$st->bindValue(":namee", $nazwa, PDO::PARAM_STR);
				$st->bindValue(":descr", $opis, PDO::PARAM_STR);
				
				$st->execute();
				$conn=null;
				header("Location: index.php?url=22");
			}
		} 
	}
?>