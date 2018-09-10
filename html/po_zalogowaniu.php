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
		<a href="index.php?url=10">Zarządzaj użytkownikami</a>
	</div>
	<div id="PASEKBELKA">&nbsp</div>
	<div id="PASEKGUZIK">
		<a href="index.php?url=11">Wyloguj</a>
	</div>
</div>
<div id="TEKST"><div id="RAMKA">
	<?php
		if(isset($_GET['url']))
		{
			$dana = $_GET['url'];
			if($dana == 11){
				unset($_SESSION['zalogowano']);
				session_destroy();
				header("Location: index.php?url=14");
			}
			else if($dana==10){
				if($_SESSION['flaga']==1)
				{
					require("tabela_user.php");
					require("formularz_user.php");
					require("dodawanie_user.php");
				}
				else 
				{
					echo 'Aby mieć dostęp do danych użytkowników, musisz posiadać uprawnienia administratora. <br>
					Jeżeli uważasz, że powinieneś je mieć, skontaktuj się z administatorem strony.';
				}
			}
			else if($dana==5){
				require("tabela_setting.php");
				require("formularz_setting.php");
			}
			else if($dana==6){
				require("tabela_set.php");
				require("formularz_set.php");
			}
			else if($dana==7){
				require("tabela_var.php");
				require("formularz_var.php");
			}
			else if($dana==1){
				echo 'Jako zalogowany użytkownik masz dostęp do bazy nastaw, zestawów oraz wartości. <br>
					Możesz teraz tworzyć nowe nastawy i przechowywać je w baza-nastaw.cba.pl <br>
					Nowym użytkownikom zalecamy zapoznać się z informacjami umieszczonymi na górze strony.';
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
					tel: 516 225 456 <br>
					<br>
					Piotr Opała<br>
					adres e-maila: opalap@op.pl <br>
					';
			}
			else if($dana==12){
				echo 'Podany użytkownik nie istnieje';
			}
			else if($dana==13){
				echo 'Hasło nieprawidłowe';
			}
			else if($dana==20){
				echo 'Wprowadziłeś niepoprawną wartość <br> W oknie określającym widoczność nastawy można wpisać "tak", "nie", "TAK" lub "NIE" <br> Nastawa nie została zmieniona';
			}
			else if($dana==23){
				echo 'Wprowadziłeś niepoprawną wartość <br> W oknie określającym uprawnienia administratora można wpisać "tak", "nie", "TAK" lub "NIE"';
			}
			else if($dana==21){
				echo 'Nastawa została dodana';
			}
			else if($dana==22){
				echo 'Zestaw został dodany';
			}
			else if($dana==24){
				echo 'Użytkownik został dodany';
			}
			else if($dana==25){
				echo 'Wartość nastawy została dodana';
			}
			else if($dana==26){
				echo 'Nastawa o podanej nazwie już istnieje. Podaj inną nazwę lub użyj opcji edytuj.';
			}
			else if($dana==27){
				echo 'Nastawa o podanej nazwie już istnieje. Podaj inną nazwę.';
			}
			else if($dana==28){
				echo 'Zestaw o podanej nazwie już istnieje. Podaj inną nazwę.';
			}
			else if($dana==29){
				echo 'Zestaw o podanej nazwie już istnieje. Podaj inną nazwę lub użyj opcji edytuj.';
			}
			else if($dana==30){
				echo 'Nastawa została usunięta';
			}
			else if($dana==31){
				echo 'Nastawa została poprawnie zedytowana';
			}
			else if($dana==32){
				echo 'Zestaw został usunięty';
			}
			else if($dana==33){
				echo 'Zestaw został poprawnie zedytowany';
			}
			else if($dana==34){
				echo 'Użytkownik został usunięty';
			}
			else if($dana==35){
				echo 'Użytkownik został poprawnie zedytowany';
			}
			else if($dana==37){
				echo 'Użytkownik o podanej nazwie już istnieje. Podaj inną nazwę.';
			}
			else if($dana==38){
				echo 'Użytkownik o podanej nazwie już istnieje. Podaj inną nazwę lub użyj opcji edytuj.';
			}
			else if($dana==43){
				echo 'Wartość nastawy została usunięta';
			}
			else if($dana==44){
				echo 'Wartość nastawy została poprawnie zedytowana';
			}
			else if($dana==50){
				echo $_GET['z'].$_GET['x'].$_GET['y'].$_GET['t'];
			}
			else if($dana==40){
				require("formularz_edycji_setting.php");
				$_SESSION['edid1'] = $_GET['eeid'];
			}
			else if($dana==41){
				require("formularz_edycji_set.php");
				$_SESSION['editSet'] = $_GET['eid'];
			}
			else if($dana==42){
				require("formularz_edycji_user.php");
				$_SESSION['editUser'] = $_GET['userID'];
			}
			else if($dana==45){
				require("formularz_edycji_var.php");
				$_SESSION['editVar'] = $_GET['varID'];
			}
			else if($dana==60){
				$_SESSION['genVar'] = $_GET['genID'];
				require("generowanie_pliku.php");
			}
		}	
		else{
			echo 'Witaj '.$_SESSION['uzytkownik'];
		}


?>

</div> 
</div>