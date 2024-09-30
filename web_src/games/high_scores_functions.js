// Functions to interact with the high_scores database.

/*
Using results return variable:

    Results contains multiple different pieces of data about the SQL response.
    results.xxxx will show that part of the response.
*/

export function insertScore(ID, game, score, date, username) {
    /*
    Function to insert scores into database.
    ID: Unique ID for each user (auto-incremented)
    game: Name of the game played
    score: Score achieved in the game
    date: Date the game was played
    username: Username for each user (picked)
    */

    // Create a FormData object to store the data
    const formData = new FormData();
    formData.append('ID', ID); // example ID
    formData.append('game', game);
    formData.append('score', score);
    formData.append('date', date);
    formData.append('username', username);

    // Make the fetch request to the PHP script
    fetch('/gamers/data_src/api/highscores/create.php', {
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
  



export async function getTopScores(game) {
  const url = 'path/to/your/php/file.php'; // Replace with the actual path to your PHP file

  try {
      // Make a POST request to the PHP file with the game name as a parameter
      const response = await fetch(url, {
          method: 'POST',
          headers: {
              'Content-Type': 'application/x-www-form-urlencoded',
          },
          body: `game=${encodeURIComponent(game)}` // Send the game parameter in the request body
      });

      // Check if the request was successful
      if (!response.ok) {
          throw new Error(`HTTP error! status: ${response.status}`);
      }

      // Parse the JSON response
      const results = await response.json();
      return results; // Return the top scores

  } catch (error) {
      console.error('Error fetching top scores:', error);
  }
}