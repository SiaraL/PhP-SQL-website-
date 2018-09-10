<?php if(!isset($_SESSION)) session_start(['cookie_lifetime' => 1800,]); ?>
<?php require('formularz_logowania.php'); ?>
<?php
require("klasy/User.php");	
if($_SERVER['REQUEST_METHOD']=='POST')
{
	$wyniki = User::pobierz_user();
	foreach($wyniki as $uzytkownik)
	{
		if($_POST['username'] == $uzytkownik -> username)
		{
			$_SESSION['id'] = $uzytkownik -> id;
			$_SESSION['uzytkownik'] = $uzytkownik -> username;
			$haslo = $_POST['password'];
			$odszyfrowanie = password_verify($haslo, $uzytkownik -> password);
			if($odszyfrowanie)
			{
				if($uzytkownik -> admin_flag == 1)
				{
					$flaga = 1;
					$_SESSION['flaga'] = $flaga;
				}
				else 
				{
					$flaga = 0;
					$_SESSION['flaga'] = $flaga;
				}
				$_SESSION['zalogowano'] = 1;
				header("Location: index.php");
				exit();
			}
			else
			{
				throw new Exception(header("Location: index.php?url=13"));
			}
		}	 
	}
	throw new Exception(header("Location: index.php?url=12"));
}	

?>