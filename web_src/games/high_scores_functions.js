// Functions to interact with the high_scores database.

```
Using results return variable:

    Results contains multiple different pieces of data about the SQL response.
    results.xxxx will show that part of the response.
```

function insertScore(ID, game, score, date, username) {
    ```
    Function to insert scores into database.
    ID: Unique ID for each user (auto-incremented)
    game: Name of the game played
    score: Score achieved in the game
    date: Date the game was played
    username: Username for each user (picked)
    ```
    // Create a FormData object to store the data
    const formData = new FormData();
    formData.append('ID', ID); // example ID
    formData.append('game', game);
    formData.append('score', score);
    formData.append('date', date);
    formData.append('username', username);

    // Make the fetch request to the PHP script
    fetch('data_src\\api\\highscores\\create.php', {
      method: 'POST',
      body: formData
    })
    .then(response => response.text()) // Assuming PHP returns some response
    .then(data => {
      console.log(data); // Handle success response (e.g., display confirmation)
    })
    .catch(error => {
      console.error('Error:', error); // Handle error
    });
  }
  


function getTopScores(game){
    ```
    Function to get the top 10 scores from a game.
    game: Name of the game played
    ```

    const query = 'SELECT top 10 * FROM highscores WHERE game_played = (?) ORDER BY highscore desc'
    connection.execute(query, [game], (err, results))
    return results;
}