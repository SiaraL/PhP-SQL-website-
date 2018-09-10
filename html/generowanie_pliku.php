<?php
	$id = $_SESSION['genVar'];
	$getID;
	$getSettingID;
	$getSettID;
	$getValue;
	$SettingID;
	$SettID;
	require("klasy/Var.php");	
	$row1 = Varr::pobierz_var();
	foreach($row1 as $rekord)
	{	
		foreach($rekord as $parametr=>$wpis )
		{
			if($id == $rekord -> id)
			{
				if($wpis == $rekord -> id) $getID = $wpis;
				if($wpis == $rekord -> setting_id) $getSettingID = $wpis;
				if($wpis == $rekord -> set_id) $getSettID = $wpis;
				if($wpis == $rekord -> value) $getValue = $wpis;
			}
		}
	}
	require("klasy/Setting.php");	
	$row1 = Setting::pobierz_id();
	foreach($row1 as $rekord) foreach($rekord as $parametr=>$wpis )	if($getSettingID == $rekord -> id) $SettingID = $rekord -> name2;
	require("klasy/Sett.php");	
	$row1 = Sett::pobierz_id_();
	foreach($row1 as $rekord) foreach($rekord as $parametr=>$wpis )	if($getSettID == $rekord -> id_) $SettID = $rekord -> name1;

		
		
		
		
$plik = fopen('plik_txt/innaNazwa.txt', "w");
fwrite($plik, 'Numer id:        '.$getID.'
');					
fwrite($plik, 'Nazwa nastawy:   '.$SettingID.'
');
fwrite($plik, 'Nazwa zestawu:   '.$SettID.'
');
fwrite($plik, 'Watrtość:        '.$getValue.'
');
fclose($plik);

$pobierz = 'plik_txt/innaNazwa.txt';
if (file_exists($pobierz)) {
    header('Content-Description: File Transfer');
	header('Content-Type: application/octet-stream');
	header('Content-Disposition: attachment; filename='.basename($pobierz));
	header('Content-Transfer-Encoding: binary');
	header('Expires: 0');
	header('Cache-Control: must-revalidate, post-check=0, pre-check=0');
	header('Pragma: public');
	header('Content-Length: ' . filesize($pobierz));
	ob_clean();
	flush();
	readfile($pobierz);
	exit;
}
	
?>
