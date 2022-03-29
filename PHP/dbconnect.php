<?php
// connect to database and retrieve the words 
$connect = new mysqli("localhost", "root", "", "Hangman_Words");

if($connect -> errno > 0){
    die("Adatbazis nem elerheto".$connect->connect_error);
    }
    $connect->set_charset("utf8");

?>