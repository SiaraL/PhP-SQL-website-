<?php
	
	$conn=new PDO("sqlite:baza.db");

	$sql='SELECT name1 FROM SETT';

	$st=$conn->prepare($sql);

	$st->execute();

	$tabela = array();

	while($row=$st->fetch(PDO::FETCH_ASSOC))
	{
			array_push($tabela, $row);
	}

	$conn=null;
	
		foreach($tabela as $indeks => $rekord)
		{					
			foreach($rekord as $parametr=>$wpis )
			{
				echo '<option>'.$wpis.'</option>';
			}
		}



?>