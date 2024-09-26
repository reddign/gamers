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
    const query = 'INSERT INTO highscores (ID, game, score, date, username) VALUES (?, ?, ?, ?, ?)';
  
    connection.execute(query, [ID, game, score, date, username], (err, results) => {
      if (err) {
        console.error('Error inserting data:', err);
        return;
      }
      return;
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