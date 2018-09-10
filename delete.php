<?php
session_start();
include('db_connect.php');
if (isset($_GET['id'])){
$r=$_SESSION['tablica'];
$id=$_GET['id'];

    $myQuery = $mysqli->prepare("DELETE from $r WHERE id=? LIMIT 1");
    $myQuery->bind_param("i",$id);
    $myQuery->execute();
    $myQuery->close();
    header("Location: $r.php");
}