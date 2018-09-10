<?php
//ustawienia dla aktualizacji i wstawiania artykułów
include('db_connect.php');
if ( isset($_POST['add']) ) {
$title = strip_tags($_POST['title']);
$text = strip_tags($_POST['text']);
$image = strip_tags($_POST['image']);
                        
if($myQuery = $mysqli->prepare("INSERT animals (title,image,text) VALUES (?,?,?)")){
$myQuery->bind_param("sss",$title,$image,$text);
$myQuery->execute();
$myQuery->close();

}
if ( isset($_SESSION['id']) )unset($_SESSION['id']);
if ( isset($_SESSION['title']) )unset($_SESSION['title']);
if ( isset($_SESSION['text']) )unset($_SESSION['text']);
if ( isset($_SESSION['image']) )unset($_SESSION['image']);
header('Location: animals.php');     
}

if ( isset($_POST['update']) ) {
$id=$_SESSION['id'];
$title =($_POST['title']);
$text = ($_POST['text']);
$image = ($_POST['image']);
                        
if($myQuery = $mysqli->prepare("UPDATE animals SET title=?,image=?,text=? WHERE id=?")){
$myQuery->bind_param("sssi",$title,$image,$text,$id);
    
$myQuery->execute();
    
$myQuery->close();
}
if ( isset($_SESSION['id']) )unset($_SESSION['id']);
if ( isset($_SESSION['title']) )unset($_SESSION['title']);
if ( isset($_SESSION['text']) )unset($_SESSION['text']);
if ( isset($_SESSION['image']) )unset($_SESSION['image']);
header('Location: animals.php');    
}
          
      


?>
