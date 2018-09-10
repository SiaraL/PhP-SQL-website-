<?php

	
	include_once("klasy/Setting.php");	
	$row1 = Setting::pobierz_id();
	foreach($row1 as $nazwanastawy)
	{
		if(($nazwanastawy->is_active)=='1' || ($nazwanastawy->is_active)==1)
		{
			echo '<option>'.$nazwanastawy->name2.'</option>';
		}
		else
		{
			$aktywna=0;
		}
		
	}



?>