// Functions to interact with the high_scores database.

// Function to insert data into the database
function insertScore(ID, game, score, date, username) {
    const query = 'INSERT INTO highscores (ID, game, score, date, username) VALUES (?, ?, ?, ?, ?)';
  
    connection.execute(query, [ID, game, score, date, username], (err, results) => {
      if (err) {
        console.error('Error inserting data:', err);
        return;
      }
    });
}