<!-- PHP RETRIEVES DATA THAT AJAX WILL USE IN THE JS FILE-->

<?php   
    $mysqli = new mysqli("localhost", "root", "", "akasztofa");

    if($mysqli->connect_errno){
        echo 'Hiba a csatlakozáskor!';
        exit();
    }
    $mysqli->set_charset("utf8");
    $sql = "SELECT szo FROM vizsga";
    $result = $mysqli ->query($sql);
    if ($result->num_rows > 0){
            while ($row = $result -> fetch_assoc()){
                echo "<p>";
                echo $row['szo'];
                echo "</p>";
        }
    }
?>