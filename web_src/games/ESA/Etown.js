let score = 0;
let username;
let major;


function startgame(){
    // shows a welcome page 
    // displays start game button

}

function morning_routine(){
    // describes first scenarion in dorm room
    // 
}

function first_class(){
    // finds first class 
    // 
}

function have_eaten(){
    
}

function has_keycard(){

}

function first_lecture(){
    
}

// This function sends scores to the database created by the other group
function sendScores(){
    fetch(// This should be the file path for the data file,
         {
        method: "POST",
        body: JSON.stringify({
            user_name: username,
            game_played: "Etown Student Adventure",
            score: score
        }),
        headers: {
          "Content-type": "application/json; charset=UTF-8"
        }
      })
        .then((response) => response.json())
        .then((json) => console.log(json));
}

function gameOver(){
    // set criteria for game over
    sendScores() // send scores after game over

}