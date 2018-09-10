<?php
$conn=new PDO("sqlite:baza.db");


$id = $_GET['id']; 
$sql='DELETE FROM USER WHERE id=:bul';
$st=$conn->prepare($sql);
$st->bindValue(":bul", $id, PDO::PARAM_STR);
$st->execute();

$conn=null;
header("Location: index.php?url=34");
?> 