function sendScores(){
    fetch("./create.php", {
        method: "POST",
        body: JSON.stringify({
            game: gameName,
            score: score
        }),
        headers: {
          "Content-type": "application/json; charset=UTF-8"
        }
      })
        .then((response) => response.json())
        .then((json) => console.log(json));
}

let gameName = "test";
let score = 666;

sendScores();