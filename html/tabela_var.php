<?php
	$tabela1 = '<table border="1" align="center">';
		$tabela1.='<tr>';
			$tabela1.='<th>'."Nazwa nastawy".'</th>';
			$tabela1.='<th>'."Nazwa zestawu".'</th>';
			$tabela1.='<th>'."Wartość nastawy".'</th>';
			$tabela1.='<th>'."Edytuj".'</th>';
			$tabela1.='<th>'."Usuń".'</th>';
			$tabela1.='<th>'."Generuj <br> plik".'</th>';
		$tabela1.='</tr>';
		require("klasy/Var.php");	
		$row1 = Varr::pobierz_var();
		foreach($row1 as $rekord)
		{	
			$tabela1.='<tr align="center">';
			foreach($rekord as $parametr=>$wpis )
			{
				if($wpis != $rekord -> id)
				{
					if($wpis == $rekord -> setting_id)
					{
						include_once("klasy/Setting.php");
						$settingID=Setting::pobierz_id();
						foreach($settingID as $dana)
						{
							if($wpis == $dana->id)
								$wpis=$dana->name2;
						}
					}
					if($wpis == $rekord -> set_id)
					{
						include_once("klasy/Sett.php");
						$settID=Sett::pobierz_id_();
						foreach($settID as $dana2)
						{
							if($wpis == $dana2->id_)
								$wpis=$dana2->name1;
						}
					}
					$tabela1.='<td>'.$wpis.'</td>';
				}
			}						
			$tabela1.='<td>'.'<a href="index.php?url=45&varID='.$rekord->id.'">Edytuj</a>'.'</td>';
			$tabela1.='<td>'.'<a href="delete_var.php?id='.$rekord->id.'">Usuń</a>'.'</td>';
			$tabela1.='<td>'.'<a href="index.php?url=60&genID='.$rekord->id.'">Generuj <br> plik</a>'.'</td>';
		$tabela1.'</tr>';						
		}
	$tabela1.= '</table>';
	echo $tabela1;
	
?>