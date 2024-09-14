-- highscores.sql

use triviagames;

-- 3. Create the highscores table
CREATE TABLE IF NOT EXISTS highscores (
    user_id INT NOT NULL,                 	 -- Unique ID for each user (auto-incremented)
    game_played VARCHAR(100) NOT NULL,       -- Name of the game played
    score INT NOT NULL,                      -- Score achieved in the game
    time_played DATETIME NOT NULL,           -- Date the game was played
    username VARCHAR(100) NOT NULL,
    FOREIGN KEY (user_id) REFERENCES user(userID)
);

-- 4. Insert sample data (optional)
INSERT INTO highscores (user_id, game_played, score, date_played)
VALUES 
(100, 'Space Invaders', 1500, '2024-09-01'),
(101, 'Pac-Man', 2000, '2024-09-02');