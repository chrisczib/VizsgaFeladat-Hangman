/* NEED AJAX TO RETRIEVE DATA FROM THE RETRIEVAL PHP */



//This will be changed to pull the data from the database with PHP and MySQL. 
//Also updated to different categories. 
//User will be able to choose categories which will contain about 15 words each.
var programming_languages = [
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
    answer = programming_languages[Math.floor(Math.random() * programming_languages.length)]
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