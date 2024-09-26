document.addEventListener("DOMContentLoaded", function () {
    let word = '';
    let guessedWord = '';
    let attempts = 6;

    const wordDisplay = document.getElementById("word-display");
    const guessInput = document.getElementById("guess");
    const guessButton = document.getElementById("guess-button");
    const attemptCount = document.getElementById("attempt-count");
    const guessedLettersList = document.getElementById("guessed-letters-list");
    const birdPics = document.getElementById("bird-cycle");
    const guessedLetters = [];

    // Initial setup
    randomWord();

    // Event listener for clicking the "Guess" button
    guessButton.addEventListener("click", function () {
        handleGuess(guessInput.value.toUpperCase());
        guessInput.value = "";
    });

    // Event listener for Enter key presses in the guess input field
    guessInput.addEventListener("keypress", function (event) {
        const guess = guessInput.value.toUpperCase();
        if (event.key === "Enter") {
            if (guess.length === 1 && guess.match(/[A-Z]/)) {
                handleGuess(guess);
            } else {
                alert("Please enter a single letter.");
            }
            guessInput.value = "";
            event.preventDefault();
        }
    });

    function randomWord() {
        fetch('../../../data_src/api/hangman/word.php', { method: 'get' })
            .then(response => response.json())
            .then(data => {
                word = data.word;
                guessedWord = initializeGuessedWord(word);
                renderWordDisplay();
            })
            .catch(console.error);
    }

    // Be able to handle spaces?
    function initializeGuessedWord(word) {
        return "_".repeat(word.length).split("");
    }

    function renderWordDisplay() {
        wordDisplay.textContent = guessedWord.join(" ");
    }

    function handleGuess(letter) {
        if (attempts > 0) {
            if (guessedLetters.includes(letter)) {
                alert(letter + " has already been guessed.");
            } else if (word.includes(letter)) {
                guessedLetters.push(letter);
                guessedLettersList.textContent = guessedLetters.join(", ");
                for (let i = 0; i < word.length; i++) {
                    if (word[i] === letter) {
                        guessedWord[i] = letter;
                    }
                }
                renderWordDisplay();
                if (guessedWord.join("") === word) {
                    //birdPics.src = "../../../web_src/games/hangman/nest2.png";
                    endGame("Congratulations! You guessed the word: " + word);
                }
            } else {
                attempts--;
                if (attempts === 5) { // Bird Life Cycle
                    birdPics.src = "../../../web_src/games/hangman/images/egg in nest2.png";
                } else if (attempts === 4) {
                    birdPics.src = "../../../web_src/games/hangman/images/cracked egg2.png";
                } else if (attempts === 3) {
                    birdPics.src = "../../../web_src/games/hangman/images/open egg2.png";
                } else if (attempts === 2) {
                    birdPics.src = "../../../web_src/games/hangman/images/baby bird2.png";
                } else if (attempts === 1) {
                    birdPics.src = "../../../web_src/games/hangman/images/bluejay2.png";
                }
                attemptCount.textContent = attempts;
                guessedLetters.push(letter);
                guessedLettersList.textContent = guessedLetters.join(", ");
                if (attempts === 0) {
                    //birdPics.src = "../../../web_src/games/hangman/images/flyer.png"; // Bird flies away cause you're dumb
                    endGame("Sorry, you're out of attempts. The word was: " + word);
                }
            }
        }
    }

    function endGame(message) {
        birdPics.src = "../../../web_src/games/hangman/images/flyer.png";
        setTimeout(function() {
            alert(message);
            guessInput.disabled = true;
            guessButton.disabled = true;
            window.location.href = "../../../data_src/api/visitor/update.php";
        }, 1000);
    }
});
