function animate(){
    //add  selection through character spritesheet for animation
}

function detectCOllision(){
    //add collision to the map
}

//:)

function reportScore() {
    // TODO: report username, game, score, maybe time? to database
    let gameStats = {
        username: username,
        gameName: gameName,
        score: score,
        // time: gameTime // maybe implemented depending on database capabilities
    };

    // TODO: Update below once more lectures have occurred 

    // fetch('file where this will be stored.php', {
    //     method: 'POST',
    //     headers: {
    //         'Content-Type': 'application/json',
    //     },
    //     body: JSON.stringify(gameStats),
    // })
    // .then(response => response.json())
    // .then(data => {
    //     console.log('Success', data);
    // })
    // .catch((error) => {
    //     console.error('Error:', error);
    // });
}