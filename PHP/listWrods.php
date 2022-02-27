<?php
include 'hangman.php';

$sql = "SELECT id, word, category FROM hangman";
$result = $connect ->query($sql);

if ($result->num_rows > 0){
   
        while ($row = $result -> fetch_assoc()){
            echo '<p>'.$row["id"].'</p>';
            echo '<p>'.$row["word"].'</p>';
            echo '<p>'.$row["category"].'<p>';       
        }
    }

 ?>