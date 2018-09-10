<?php
if(!isset($_SESSION)) session_start(['cookie_lifetime' => 1800,]); 

if($_SERVER['REQUEST_METHOD']=='POST') 
{
	if(isset($_POST['edytuj_zestaw']) == "Zapisz") 
	{
		$nazwa_zestawu=$_POST['edycja_zestawu'];
		$opis=$_POST['edycja_opis'];
		$id = $_SESSION['editSet'];
		$data = time();
		
		require("klasy/Sett.php");
		$row = Sett::pobierz_id_();
		foreach($row as $nazwazestawu)
		{
			if($nazwa_zestawu==$nazwazestawu->name1  && $id != $nazwazestawu->id_)
			{
				$blad2=1;
			}
		}
		
		
		require("klasy/User.php");
		$row = User::pobierz_user();
		foreach($row as $rekord)
		{
			if($_SESSION['uzytkownik']==$rekord->username)
			{
				$usid=$rekord->id;
			}
		}
		if(isset($blad2))
		{
			header("Location: index.php?url=28");
		}
		else
		{
			$conn=new PDO("sqlite:baza.db");
			$sql='UPDATE SETT SET user_id=:userid, date_=:datee, name1=:nam, description=:descr WHERE id_=:id';
			$st=$conn->prepare($sql);
			$st->bindValue(":userid", $usid, PDO::PARAM_STR);
			$st->bindValue(":datee", $data, PDO::PARAM_STR);
			$st->bindValue(":nam", $nazwa_zestawu, PDO::PARAM_STR);
			$st->bindValue(":descr", $opis, PDO::PARAM_STR);
			$st->bindValue(":id", $id, PDO::PARAM_INT);
			$st->execute();
			$conn=null;
			header("Location: index.php?url=33");
		}
		

		
	}
}
?> 