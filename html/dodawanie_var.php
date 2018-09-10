<?php
	
//	require('formularz_setting.php'); 
	
	if($_SERVER['REQUEST_METHOD']=='POST') 
	{
		require("klasy/Setting.php");	
		require("klasy/Sett.php");
		$row1 = Setting::pobierz_id();
		$row2 = Sett::pobierz_id_();
		
		
		if(isset($_POST['dodaj_wartosc']) == "Dodaj wartość") 
		{
			$nazwa_nastawy = $_POST['nastawa'];
			$nazwa_zestawu = $_POST['zestaw'];
			$wartosc = $_POST['wartosc'];
	
			foreach($row1 as $nazwanastawy)
			{
				if($nazwa_nastawy==$nazwanastawy->name2)
				{
					$id_nastawy= $nazwanastawy->id;
				}
			}
			foreach($row2 as $nazwazestawu)
			{
				if($nazwa_zestawu==$nazwazestawu->name1)
				{
					$id_zestawu= $nazwazestawu->id_;
				}
			}
			
			$conn=new PDO("sqlite:baza.db");
			$sql='INSERT INTO SETTING_VALUE (setting_id, set_id, value) VALUES (:settingid, :setid, :val)';
			
			$st=$conn->prepare($sql);
			
			$st->bindValue(":settingid", $id_nastawy, PDO::PARAM_INT);
			$st->bindValue(":setid", $id_zestawu, PDO::PARAM_INT);
			$st->bindValue(":val", $wartosc, PDO::PARAM_STR);
			
			$st->execute();
			
			$conn=null;
			header("Location: index.php?url=25");
			
		} 
	}
?>