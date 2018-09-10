	<div id="PASEK">
	<div id="PASEKGUZIK">
		<a href="index.php?url=5">Nastawy</a>
	</div>
	<div id="PASEKBELKA">&nbsp</div>
	<div id="PASEKGUZIK">
		<a href="index.php?url=6">Zestawy nastaw</a>
	</div>
	<div id="PASEKBELKA">&nbsp</div>
	<div id="PASEKGUZIK">
		<a href="index.php?url=7">Wartości nastaw</a>
	</div>
	<div id="PASEKBELKA">&nbsp</div>
	<div id="PASEKGUZIK">
		<a href="index.php?url=8">Załóż konto</a>
	</div>
	<div id="PASEKBELKA">&nbsp</div>
	<div id="PASEKGUZIK">
		<a href="index.php?url=9">Zaloguj</a>
	</div>
</div>
<div id="TEKST"><div id="RAMKA">
<?php
		if(isset($_GET['url']))
		{
			$dana = $_GET['url'];
			if($dana == 9){
				require('logowanie.php');
			}
			else if($dana==8){
				require("rejestracja.php");
			}
			else if($dana==5){
				echo 'Aby uzyskać dostęp do nastaw, musisz się zalogować';
			}
			else if($dana==6){
				echo 'Aby uzyskać dostęp do zestawów nastaw, musisz się zalogować';
			}
			else if($dana==7){
				echo 'Aby uzyskać dostęp do wartości nastaw, musisz się zalogować';
			}
			else if($dana==1){
				echo 'Witaj na stronie poświęconej nastawom przekaźników elektroenergetycznych.<br>
					Jeśli chcesz uzyskać więcej informacji, zapoznaj się z zakładką <i><a href="index.php?url=2">informacje o stronie</a></i><br>
					Aby uzyskać dostęp do bazy nastaw, <i><a href="index.php?url=9">zaloguj się</a></i>.';
			}
			else if($dana==2){
				echo 'Strona powstała jako projekt na zaliczenie przedmiotu Zaawansowane Technologie Internetowe, na kierunku Elektrotechnika, specjalność Automatyka Zabezpieczeniowa w czerwcu 2018. <br>
					Funckjonalność strony polega na tym, że użytkownik jest w stanie dodać, edytować oraz usuwać nastawę, zestaw nastaw, a następnie wybrać interesujące go wartości i nadać im wartość. <br>
					Wszystkie wielkości na stronie przechowywane są w bazie danych SQLite.';
			}
			else if($dana==3){
				echo 'Nastawy przekaźników, to takie ustawienie urządzeń zabezpieczeniowych, które są w stanie zadziałać, tj. podać sygnałdwustanowy, np. na otworzenie wyłącznika. <br>
					Nazwa nastawy pochodzi od kryterium, które obejmuje swoim działaniem i od przekroczenia wartości od strony dolnej, lub górnej. <br>
					Przykładowo nastawa <br>
					I> <br>
					nazywana jest nadprądową, a  <br>
					Z< <br>
					to nastawa podimpedanycjna. <br>
					';
			}
			else if($dana==4){
				echo 'Autorzy strony: <br><br>
					Łukasz Siara <br>
					adres e-mail: siara.lukasz@gmail.com <br>
					tel: 516 225 456 <br>';
					/*<br>
					Piotr Opała<br>
					adres e-maila: opalap@op.pl <br>
					tel: 0 700 885 223';*/
			}
			else if($dana==12){
				echo 'Podany użytkownik nie istnieje';
			}
			else if($dana==13){
				echo 'Hasło nieprawidłowe';
			}
			else if($dana==14){
				echo "Zostałeś wylogowany";
			}
			
		}	
		else{
			echo 'Witaj na stronie poświęconej nastawom przekaźników elektroenergetycznych.<br>
					Jeśli chcesz uzyskać więcej informacji, zapoznaj się z zakładką <i><a href="index.php?url=2">informacje o stronie</a></i><br>
					Aby uzyskać dostęp do bazy nastaw, <i><a href="index.php?url=9">zaloguj się</a></i>.';
		}

?>

</div></div>