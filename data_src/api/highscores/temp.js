
let userID = 1;
let gameName = "test";
let score = 666;
let time = '2024-10-04 12:35:45';
let user = "";


function sendScores(){
    fetch("./create.php", {
        method: "POST",
        body: JSON.stringify({
            user_id: userID,
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

sendScores();