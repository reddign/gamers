function sendScores(gameName, score, userName){
    fetch("./create.php", {
        method: "POST",
        body: JSON.stringify({
            game: gameName,
            score: score,
            user: userName
        }),
        headers: {
          "Content-type": "application/json; charset=UTF-8"
        }
      })
        .then((response) => response.json())
        .then((json) => console.log(json))
        .catch(error => console.error('Error: ',error));
}

let gameName = "test";
let score = 666;
let user = "Dummy0"

sendScores();