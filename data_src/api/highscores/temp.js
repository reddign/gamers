function sendScores(){
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
        .then((json) => console.log(json));
}

let gameName = "test";
let score = 666;
let user = "Dummy0"

sendScores();

gameName = "test";
score = 777;
user = "Dummy1"

sendScores();

gameName = "test";
score = 555;
user = "Dummy2"

sendScores();