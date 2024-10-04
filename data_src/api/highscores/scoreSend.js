


function sendScores(userid,game,score,time,username){
    fetch("./create.php", {
        method: "POST",
        body: JSON.stringify({
            user_id: userid,
            game: game,
            score: score,
            timeplayed: time,
            user: username
        }),
        headers: {
          "Content-type": "application/json; charset=UTF-8"
        }
      })
        .then((response) => response.json())
        .then((json) => console.log(json))
        .catch(error => console.error('Error: ',error));
}

