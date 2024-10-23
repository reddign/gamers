const triviaQuestions = []; // empty list
const questionResults = [];

let currentQuestionIndex = 0;
let count = 0; // Counter for number of Correct Answers
let correctCount = 0;

// TODO: Prevent repeat questions
// TODO: Position of answers
function displayRandomQuestion2() {
    console.log(triviaQuestions)
}

function displayRandomQuestion() {
    if (triviaQuestions.length > 0 && currentQuestionIndex < triviaQuestions.length) { // Explain
        const questionContainer = document.getElementById("question-container");
        const question = triviaQuestions[currentQuestionIndex].question;
        const answers = triviaQuestions[currentQuestionIndex].answers.slice();

        shuffle(answers);
        questionContainer.innerHTML = `<p>${question}</p>`;

        const answerOptions = document.getElementById("answer-options");
        answerOptions.innerHTML = ''; // Clear previous buttons

        answers.forEach(answerData=> {
            const answerButton = document.createElement("button");
            answerButton.textContent = answerData.answer;
            answerButton.addEventListener("click", () => checkAnswer(answerData.isCorrect));
            answerOptions.appendChild(answerButton);
        });
    }
}

function randomQuestion() { // Get questions from database
    fetch('../../data_src/api/questions/questions.php', {method: 'get'}) // TODO: Change file path for FTP
        .then(response => response.json())
        .then(data => { const question = data.question; const answers = data.answers; // 1 questions with 3 answers
            triviaQuestions.push({question, answers}); // .push adds to arrays
            displayRandomQuestion(); // Just gets called until count hits 3 {Confetti}
    }).catch(error => {
        console.error("Error fetching data", error);
        randomQuestion(); // If it at first you don't fetch, try again and again
    });
}

const circleResults = [];

function checkAnswer(isCorrect) {
    const questionContainer = document.getElementById("question-container");
    const currentCircle = document.getElementById(`circle${currentQuestionIndex + 1}`);

    if (isCorrect) {
        correctCount++;
        circleResults[currentQuestionIndex] = true;
        questionContainer.style.backgroundColor = "green";
        currentCircle.style.backgroundColor = "green";
    } else {
        circleResults[currentQuestionIndex] = false;
        questionContainer.style.backgroundColor = "red";
        currentCircle.style.backgroundColor = "red";
    }

    setTimeout(() => {
        questionContainer.style.backgroundColor = "";

        count++;
        currentQuestionIndex++;

        if (count < 3) {
            randomQuestion();
        } else if (count === 3) {
            setTimeout(() => {
                confirmationMessage(correctCount);
            }, 500); // Delay confirmation message by additional 500ms
        }
    }, 500);
}


/* function checkAnswer(isCorrect) {
    if (isCorrect) { // If true or 1
        correctCount++
        document.body.style.backgroundColor = "green";
        document.getElementById("question-container").classList.add("green-background"); // Add green background class
        setTimeout(() => {
            document.body.style.backgroundColor = "";
            document.getElementById("question-container").classList.remove("green-background"); // Remove green background class
        }, 1000);
    } else {
        document.getElementById("question-container").classList.add("red-background");
        setTimeout(() => {
            document.getElementById("question-container").classList.remove("red-background");
        }, 1000);
    }
    count++;
    currentQuestionIndex++;
    if (count < 3) {
        randomQuestion(); // Can get repetitive
    } else if (count === 3){
        confirmationMessage(correctCount);
    }
}
*/

function confirmationMessage(correctCount) { // You too can be told you are valid
    const confirmation = confirm("Congratulations! You've completed the trivia. " + correctCount + "/3. " + "Click OK to go to the game page.");
    if (confirmation) {
        window.location.href = "../games/menu.php";
    }
}

function shuffle(array) {
    for (let i = array.length - 1; i > 0; i--) { // For whole array
        const j = Math.floor(Math.random() * (i + 1));
        [array[i], array[j]] = [array[j], array[i]]; // Swap
    }
  }


window.onload = randomQuestion;
