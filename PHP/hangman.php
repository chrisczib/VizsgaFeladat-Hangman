<!-- PHP RETRIEVES DATA THAT AJAX WILL USE IN THE JS FILE-->

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