//przygotowanie do aktualizacji
<?php
session_start();
include('db_connect.php');

$id=$_GET['id'];
$result = $mysqli->prepare("SELECT * FROM animals WHERE id=? LIMIT 1");
$result->bind_param("i",$id);
$result->execute();
$result->bind_result($id,$title,$image,$text); 
$result->fetch();
$_SESSION['id']=$id;
$_SESSION['title']=$title;
$_SESSION['image']=$image;
$_SESSION['text']=$text;
$result->close();
header("Location: animals.php");
 ?>
