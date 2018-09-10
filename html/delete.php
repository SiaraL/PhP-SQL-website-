<?php
$conn=new PDO("sqlite:baza.db");


$id = $_GET['id']; // $id is now defined
$sql='DELETE FROM SETTING WHERE id=:bul';
$st=$conn->prepare($sql);
$st->bindValue(":bul", $id, PDO::PARAM_STR);
$st->execute();

$conn=null;
header("Location: index.php?url=30");
?> 