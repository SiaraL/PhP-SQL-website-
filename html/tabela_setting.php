<?php


	$tabela1 = '<table border="1" align="center">';
		$tabela1.='<tr>';
			$tabela1.='<th>'."Nazwa nastawy".'</th>';
			$tabela1.='<th>'."Czy wyświetlana <br> w zestawach".'</th>';
			$tabela1.='<th>'."Edytuj".'</th>';
			$tabela1.='<th>'."Usuń".'</th>';
		$tabela1.='</tr>';
		require("klasy/Setting.php");	
		$row1 = Setting::pobierz_id();
		foreach($row1 as $rekord)
		{
			$tabela1.='<tr align="center">';						
			foreach($rekord as $parametr=>$wpis )
			{
				if($wpis != $rekord -> id)
				{
					if($wpis!= '0' && $wpis!='1')
					{
						$tabela1.='<td>'.$wpis.'</td>';
					}
					else
					{
						if($wpis==1)
						{
							$wpis='tak';
							$tabela1.='<td>'.$wpis.'</td>';
						}
						else
						{
							$wpis='nie';
							$tabela1.='<td>'.$wpis.'</td>';
						}
					}
				}
			
			}
				$tabela1.='<td>'.'<a href="index.php?url=40&eeid='.$rekord->id.'&var=1">Edytuj</a>'.'</td>';
				$tabela1.='<td>'.'<a href="delete.php?id='.$rekord->id.'">Usuń</a>'.'</td>';
			$tabela1.'</tr>';						
		}
$tabela1.= '</table>';

echo $tabela1.'<br>';

?>