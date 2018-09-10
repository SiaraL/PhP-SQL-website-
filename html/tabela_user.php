<?php

	$tabela1 = '<table border="1" align="center">';
		$tabela1.='<tr>';
			$tabela1.='<th>'."Użytkownik".'</th>';
			$tabela1.='<th>'."Uprawnienia <br> administratora".'</th>';
			$tabela1.='<th>'."Edytuj".'</th>';
			$tabela1.='<th>'."Usuń".'</th>';
		$tabela1.='</tr>';
		require("klasy/User.php");	
		$row1 = User::pobierz_user();
		foreach($row1 as $rekord)
		{
			$tabela1.='<tr align="center">';						
			foreach($rekord as $parametr=>$wpis )
			{
				if($wpis != $rekord -> id && $wpis != $rekord -> password)
				{
					if($wpis == $rekord -> admin_flag)
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
					else
					{
						$tabela1.='<td>'.$wpis.'</td>';
					}
				}
			}
			$tabela1.='<td>'.'<a href="index.php?url=42&userID='.$rekord->id.'">Edytuj</a>'.'</td>';
			$tabela1.='<td>'.'<a href="delete_user.php?id='.$rekord->id.'">Usuń</a>'.'</td>';
		$tabela1.'</tr>';						
		}
	$tabela1.= '</table>';
	echo $tabela1;
	
	
	
?>