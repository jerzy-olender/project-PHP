<?php
//ustawienia logowania
session_start();
if ((!isset($_POST['login'])) || (!isset($_POST['password']))){
    header('Location: index.php');
    exit();
}
include "db_connect.php";
if ( !(mysqli_connect_errno())) {
	$login = $_POST['login'];
    $password = $_POST['password'];
    $sql = "SELECT * FROM users WHERE login='$login'";
    if($result = $mysqli->query($sql)){
      if(($result->num_rows)>0){
          $row = $result->fetch_assoc();
          if(password_verify($password,$row['password'])){
          $_SESSION['logged'] = true;
          
          $_SESSION['id_login'] = $row['id'];
          $_SESSION['login'] = $row['login'];
          unset($_SESSION['error']);
          $result->close();
          header('Location: animals.php');
          }else{
          $_SESSION['error']= '<span style="color:red">Nieprawidłowy login lub hasło!</span>';
          header('Location: index.php');
      }  
          
      }else{
          $_SESSION['error']= '<span style="color:red">Nieprawidłowy login lub hasło!</span>';
          header('Location: index.php');
      }  
    }
    
    $mysqli->close();
}


?>
