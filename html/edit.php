<?php
if(!isset($_SESSION)) session_start(['cookie_lifetime' => 1800,]); 

if($_SERVER['REQUEST_METHOD']=='POST') 
{
	if(isset($_POST['edytuj_nastawe']) == "Zapisz") 
	{
		$nazwa_nastawy=$_POST['edycja_nastawy'];
		$id = $_SESSION['edid1'];
		require("klasy/Setting.php");
			$row = Setting::pobierz_id();
			foreach($row as $nazwanastawy)
			{
				if($nazwa_nastawy==$nazwanastawy->name2  && $id != $nazwanastawy->id)
				{
					$blad2=1;
				}
			}
		$czy_aktywna=$_POST['edycja_czy_aktywna'];
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
			header("Location: index.php?url=27");
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
			$sql='UPDATE SETTING SET name2=:nam, is_active=:activ WHERE id=:id';
			$st=$conn->prepare($sql);
			$st->bindValue(":nam", $nazwa_nastawy, PDO::PARAM_STR);
			$st->bindValue(":activ", $aktywna, PDO::PARAM_INT);
			$st->bindValue(":id", $id, PDO::PARAM_INT);
			$st->execute();
			$conn=null;
			header("Location: index.php?url=31");
			}
		}
		

		
	}
}
?> 