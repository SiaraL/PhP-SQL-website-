<form method="POST" action="dodawanie_var.php">
<b>Dodaj wartość nastawy</b><br>
Wybierz nastawę:
<select name="nastawa">  <option label="0">--- Nastawa ---
<?php require("wybor_nastaw.php"); ?>
</select><br>
Wybierz zestaw:
<select name="zestaw"> <option label="0"> --- Zestaw --- 
<?php require("wybor_zestawow.php"); ?>
</select><br>
Wprowadź wartość:
<input type="text" name="wartosc"/><br>
<input type="submit" name="dodaj_wartosc" value="Dodaj wartość"/>