function sendScores(){
    fetch("./create.php", {
        method: "POST",
        body: JSON.stringify({
            user_id: userid,
            game: gameName,
            score: score,
            timeplayed: time,
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

let userid = 1;
let gameName = "test";
let score = 666;
let time = Date.now();
let user = "Dummy0";
sendScores();