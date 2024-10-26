/* Sample formats of inputs
    let userID = 1;
    let gameName = "test";
    let score = 666;
    let time = '2024-10-04 12:35:45';
    let user = "";
*/

function sendScores(userID, game, score, timeplayed, username) {
  fetch("./create.php", {
      method: "POST",
      body: JSON.stringify({
          user_id: userID,
          game_played: game,
          score: score,
          time_played: timeplayed,
          username: username
      }),
      headers: {
        "Content-type": "application/json; charset=UTF-8"
      }
  })
  .then((response) => {
      if (!response.ok) {
          throw new Error('Network response was not ok');
      }
      return response.json();
  })
  .then((json) => console.log(json))
  .catch(error => console.error('Error: ', error));
}
