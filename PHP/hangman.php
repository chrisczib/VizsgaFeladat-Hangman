<!-- PHP RETRIEVES DATA THAT AJAX WILL USE IN THE JS FILE-->

<?php
// connect to database and retrieve the words 
$connect = new mysqli("localhost", "root", "", "hangman");

if($connect -> errno > 0){
    die("Adatbazis nem elerheto ".$connect->connect_error);
    }
    $connect->set_charset("utf8");

    $sql = "SELECT id, word, category FROM hangman";
    $result = $connect ->query($sql);
    if ($result->num_rows > 0){
            while ($row = $result -> fetch_assoc()){
        }
    }
?>




<!-- Used to be programming_languages-->
var words = [
    "python",
    "javascript",
    "mongodb",
    "json",
    "java",
    "html",
    "css",
    "c",
    "csharp",
    "golang",
    "kotlin",
    "php",
    "sql",
    "ruby"
]



let answer = '';
let maxWrong = 6;
let mistakes = 0;
let guessed = [];
let wordStatus = null;


function randomWord (){
    answer = words[Math.floor(Math.random() * words.length)]
}

function generateButtons(){
    let buttonsHTML = 'abcdefghijklmnopqrstuvwxyz'.split('').map(letter => 
        `
            <button
                class="btn btn-lg btn-primary m-2"
                id='` + letter + `'
                onClick="handleGuess('` + letter + `')"
            >
              `+ letter + `
            </button>
        `).join('');

    document.getElementById('keyboard').innerHTML = buttonsHTML;
}
function guessedWord(){
    wordStatus = answer.split('').map(letter => (guessed.indexOf(letter) >= 0 ? letter : " _ ")).join('');

    document.getElementById('wordSpotlight').innerHTML = wordStatus;
}

function handleGuess(chosenLetter){
    guessed.indexOf(chosenLetter) === -1 ? guessed.push(chosenLetter) : null;
    document.getElementById(chosenLetter).setAttribute('disabled', true);

    if (answer.indexOf(chosenLetter) >= 0){
        guessedWord();
        checkIfGameWon();
    }else if (answer.indexOf(chosenLetter)=== -1){
        mistakes++;
        updateMistakes();
        checkIfGameLost();
        updateHangmanPicture();
    }
}

function updateHangmanPicture(){
    document.getElementById('hangmanPic').src = './images/' + mistakes + '.jpg';
}

function checkIfGameWon(){
    if(wordStatus === answer){
        document.getElementById('keyboard').innerHTML = 'You won!';
    }
}

function checkIfGameLost(){
    if(mistakes === maxWrong){
        document.getElementById('wordSpotlight').innerHTML = 'The answer was: ' + answer;
        document.getElementById('keyboard').innerHTML = 'You lost!';
    }
}


function updateMistakes(){
    document.getElementById('mistakes').innerHTML = mistakes;

}

function reset(){
    mistakes = 0;
    guessed = [];
    document.getElementById('hangmanPic').src = './images/0.jpg';

    randomWord();
    guessedWord();
    updateMistakes();
    generateButtons();
}


document.getElementById('maxWrong').innerHTML = maxWrong;




randomWord();
generateButtons();
guessedWord();