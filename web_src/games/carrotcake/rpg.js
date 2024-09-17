function animate(){
    //add  selection through character spritesheet for animation
}

function detectCOllision(){
    //add collision to the map
}

function reportScore() {
    // TODO: report username, game, score, maybe time? to database
    let gameStats = {
        username: username,
        gameName: gameName,
        score: score,
        // time: gameTime // maybe implemented depending on database capabilities
    };


    fetch('PLACEHOLDER.php', { // TODO: Update with the create.php file associated with highscores 
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
        },
        body: JSON.stringify(gameStats),
    })
    .then((response) => response.json())
    .then((json) => console.log(json));
}