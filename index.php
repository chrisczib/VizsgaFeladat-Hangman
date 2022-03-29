<?php   
   require 'hangman.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <style>
        #reset, #newGame{
            visibility: hidden;
        }

    </style>
    <title>Akasztófa</title>
</head>
<body>
    <div class="container col-sm-6">
        <h1 class="text-center">Akasztófa</h1>
        <div class="float-end">Rossz talalat: <span id ='mistakes'> </span></div> <br>
        <div class="float-end">Játékok: <span id ='games'> </span></div>
        <div class="text-center"></div>
            <img id="hangmanPic" src="./images/0.png" alt="">
           
            <p class="text-center" id="wordSpotlight"></p>
        </div>
        <div class="text-center"><div id="keyboard"></div></div>
        
        <div class="text-center"> <button class="btn btn-info" onclick="startGame()" id="startButton"> Kezdjük!</button> </div>
        <div class="text-center"> <button class="btn btn-info" onclick="reset()" id="reset">Még egy kör!</button> </div>
        <div class="text-center"> <button class="btn btn-info" onclick="newGame()" id="newGame">Új Játék! </button> </div>
    </div>

    <script src="JS/hangman.js"></script>

    <div>
    <?php
// connect to database and retrieve the words 
    $sql = "SELECT id, word, category FROM hangman";
    $result = $connect ->query($sql);
    if ($result->num_rows > 0){
        while ($row = $result -> fetch_assoc($result)){
            echo "<p>";
            echo $row['word'];
            echo "</p>";
        }
    }
?>
    </div>




</body>
</html>