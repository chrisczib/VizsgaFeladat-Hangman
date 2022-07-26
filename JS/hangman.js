
//This will be changed to pull the data from the database with PHP and MySQL. 
//Also updated to different categories. 
//User will be able to choose categories which will contain about 15 words each.
var word_list = [
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
    "ruby",
    "akasztófa"
]

var word_list2 = [
    "akasztófa"
]


let gameCounter = 0;
let answer = '';
let maxWrong = 6;
let mistakes = 0;
let guessed = [];
let wordStatus = null;


function randomWord (){
    answer = word_list[Math.floor(Math.random() * word_list.length)]
}

function generateButtons(){
    let buttonsHTML = 'AÁBCDEÉFGHIÍJKLMNNOÓÖŐPRSTUÚÜŰVZ'.split('').map(letter => 
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
    document.getElementById('hangmanPic').src = './images/' + mistakes + '.png';
}

function checkIfGameWon(){
    if(wordStatus === answer){
        document.getElementById('keyboard').innerHTML = 'Nyertél!';
    }
}

function checkIfGameLost(){
    if(mistakes === maxWrong){
        document.getElementById('wordSpotlight').innerHTML = 'Helyes válasz: ' + answer;
        document.getElementById('keyboard').innerHTML = 'Vesztettél!';
    }
}

function newGame(){
    
}


function updateMistakes(){
    document.getElementById('mistakes').innerHTML = mistakes;

}

function reset(){
    mistakes = 0;
    gameCounter++;
    guessed = [];
    document.getElementById('hangmanPic').src = './images/0.png';
    document.getElementById('games').innerHTML = gameCounter;
    randomWord();
    guessedWord();
    updateMistakes();
    generateButtons();
    //updateGames();
}

function startGame(){
    document.getElementById('hangmanPic').src = './images/0.png';
    document.getElementById('games').innerHTML = gameCounter;
    randomWord();
    guessedWord();
    updateMistakes();
    generateButtons();
    
}

function newGame(){
    gameCounter = 0;
    mistakes = 0;
    guessed = [];
    document.getElementById('hangmanPic').src = './images/0.png';
    document.getElementById('games').innerHTML = gameCounter;
    randomWord();
    guessedWord();
    updateMistakes();
    generateButtons();
}


const startButton = document.getElementById('startButton');
const resetButton = document.getElementById('reset');
const newGameButton = document.getElementById('newGame');


startButton.addEventListener('click', () => {
  // 👇️ hide button
  startButton.style.display = 'none';
  resetButton.style.visibility = 'visible';
  newGameButton.style.visibility = 'visible';
  randomWord();
  generateButtons();
  guessedWord();



});



//randomWord();
//generateButtons();
//guessedWord();