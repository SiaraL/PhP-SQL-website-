<?php


	$tabela1 = '<table border="1" align="center">';
		$tabela1.='<tr>';
			$tabela1.='<th>'."Utworzona <br> przez".'</th>';
			$tabela1.='<th>'."Data <br> utworzenia".'</th>';
			$tabela1.='<th>'."Nazwa <br> zestawu".'</th>';
			$tabela1.='<th>'."Opis".'</th>';
			$tabela1.='<th>'."Edytuj".'</th>';
			$tabela1.='<th>'."Usuń".'</th>';
		$tabela1.='</tr>';
		require("klasy/Sett.php");	
		$row1 = Sett::pobierz_id_();
		foreach($row1 as $rekord)
		{	
			$tabela1.='<tr align="center">';
			foreach($rekord as $parametr=>$wpis )
			{
				if($wpis != $rekord -> id_)
				{
					if($wpis> 1000000000)
					{
						date_default_timezone_set("Europe/Warsaw");
						$wpis = date('G:i:s<\b\\r>d/m/Y', $wpis);
					}
					if($wpis == $rekord -> user_id)
					{
						include_once("klasy/User.php");
						$userus=User::pobierz_user();
						foreach($userus as $dana)
						{
							if($wpis == $dana->id)
								$wpis=$dana->username;
						}
					}
					$tabela1.='<td>'.$wpis.'</td>';
				}
			}						
			$tabela1.='<td>'.'<a href="index.php?url=41&eid='.$rekord->id_.'&var=2">Edytuj</a>'.'</td>';
			$tabela1.='<td>'.'<a href="delete_set.php?id='.$rekord->id_.'">Usuń</a>'.'</td>';

		$tabela1.'</tr>';						
		}
	$tabela1.= '</table>';
	echo $tabela1;
?>