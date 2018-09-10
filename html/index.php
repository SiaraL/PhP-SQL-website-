<?php session_start(['cookie_lifetime' => 1800,]); ?>
<?php require("style.php"); ?>
<?php require("menu.php"); ?>
			
<?php
	
	
	if (isset($_SESSION['ostatnia_aktywność']) && (time() - $_SESSION['ostatnia_aktywność'] > 1800)) 
	{
		session_unset();   
		session_destroy();   
	}
	$_SESSION['ostatnia_aktywność'] = time();
		
	try 
	{
		if(!isset($_SESSION['zalogowano']))
		{
			require("przed_zalogowaniem.php");
		}		
		else
		{
			require("po_zalogowaniu.php");
		}
	}
	catch (Exception $e)
	{
	
	}
?>

	</body>
</html>
