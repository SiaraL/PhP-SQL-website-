<?php
	
//	require('formularz_setting.php'); 
	
	if($_SERVER['REQUEST_METHOD']=='POST') 
	{
	
		if(isset($_POST['dodaj_nastawe']) == "Dodaj nastawę") 
		{
			$nazwa = $_POST['nazwa_nastawy'];
			require("klasy/Setting.php");
			$row = Setting::pobierz_id();
			foreach($row as $nazwanastawy)
			{
				if($nazwa==$nazwanastawy->name2)
				{
					$blad2=1;
				}
			}
			
			$czy_aktywna = $_POST['czy_aktywna'];
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
				header("Location: index.php?url=26");
			}
			else
			{
				if(isset($blad))
				{
					header("Location: index.php?url=20");
				}
				else
				{
					$conn=new PDO("sqlite:baza.db");

					$sql='INSERT INTO SETTING (name2, is_active) VALUES (:name1, :active1)';
					
					$st=$conn->prepare($sql);
					
					$st->bindValue(":name1", $nazwa, PDO::PARAM_STR);
					
					$st->bindValue(":active1", $aktywna, PDO::PARAM_INT);
					
					$st->execute();
					$conn=null;
					header("Location: index.php?url=21");
				}
			}
		} 
	}
?>