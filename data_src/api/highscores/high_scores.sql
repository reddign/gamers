-- highscores.sql

use triviagames;

-- Create a table to store the user, the date, the score, and the game played. (create table)
    -- Unique ID for each user (auto-incremented)
    -- Name of the game played
    -- Score achieved in the game
    -- Date the game was played
    -- Username for each user (picked)
CREATE TABLE IF NOT EXISTS highscores (
    user_id INT NOT NULL,                 	 
    game_played VARCHAR(100) NOT NULL,       
    score INT NOT NULL,                      
    time_played DATETIME NOT NULL,           
    username VARCHAR(100) NOT NULL,          
    FOREIGN KEY (user_id) REFERENCES user(userID)
);

--Dummy Players:
-- INSERT INTO user VALUES(100, 'User0', 'User0@etown.edu', NOW(), 'Dummy0');
-- INSERT INTO user VALUES(101, 'User1', 'User1@etown.edu', NOW(), 'Dummy1');
-- INSERT INTO user VALUES(102, 'User2', 'User2@etown.edu', NOW(), 'Dummy2');
-- INSERT INTO user VALUES(103, 'User3', 'User3@etown.edu', NOW(), 'Dummy3');

--Dummy Scores:
-- INSERT INTO highscores VALUES (100, 'Pong', 20, NOW(), 'Dummy0');
-- INSERT INTO highscores VALUES (100, 'Pong', 47, NOW(), 'Dummy0');
-- INSERT INTO highscores VALUES (100, 'Pong', 14, NOW(), 'Dummy0');
-- INSERT INTO highscores VALUES (100, 'Pong', 51, NOW(), 'Dummy0');

-- INSERT INTO highscores VALUES (101, 'Pong', 6, NOW(), 'Dummy1');
-- INSERT INTO highscores VALUES (101, 'Pong', 11, NOW(), 'Dummy1');
-- INSERT INTO highscores VALUES (101, 'Pong', 15, NOW(), 'Dummy1');
-- INSERT INTO highscores VALUES (101, 'Pong', 60, NOW(), 'Dummy1');

-- INSERT INTO highscores VALUES (102, 'Pong', 32, NOW(), 'Dummy2');
-- INSERT INTO highscores VALUES (102, 'Pong', 37, NOW(), 'Dummy2');
-- INSERT INTO highscores VALUES (102, 'Pong', 24, NOW(), 'Dummy2');
-- INSERT INTO highscores VALUES (102, 'Pong', 30, NOW(), 'Dummy2');

-- INSERT INTO highscores VALUES (103, 'Pong', 64, NOW(), 'Dummy3');
-- INSERT INTO highscores VALUES (103, 'Pong', 27, NOW(), 'Dummy3');
-- INSERT INTO highscores VALUES (103, 'Pong', 31, NOW(), 'Dummy3');
-- INSERT INTO highscores VALUES (103, 'Pong', 17, NOW(), 'Dummy3');

-- INSERT INTO highscores VALUES (100, 'Tetris', 25, NOW(), 'Dummy0');
-- INSERT INTO highscores VALUES (100, 'Tetris', 47, NOW(), 'Dummy0');
-- INSERT INTO highscores VALUES (100, 'Tetris', 24, NOW(), 'Dummy0');
-- INSERT INTO highscores VALUES (100, 'Tetris', 71, NOW(), 'Dummy0');

-- INSERT INTO highscores VALUES (101, 'Tetris', 60, NOW(), 'Dummy1');
-- INSERT INTO highscores VALUES (101, 'Tetris', 11, NOW(), 'Dummy1');
-- INSERT INTO highscores VALUES (101, 'Tetris', 45, NOW(), 'Dummy1');
-- INSERT INTO highscores VALUES (101, 'Tetris', 65, NOW(), 'Dummy1');

-- INSERT INTO highscores VALUES (102, 'Tetris', 49, NOW(), 'Dummy2');
-- INSERT INTO highscores VALUES (102, 'Tetris', 75, NOW(), 'Dummy2');
-- INSERT INTO highscores VALUES (102, 'Tetris', 74, NOW(), 'Dummy2');
-- INSERT INTO highscores VALUES (102, 'Tetris', 30, NOW(), 'Dummy2');

-- INSERT INTO highscores VALUES (103, 'Tetris', 67, NOW(), 'Dummy3');
-- INSERT INTO highscores VALUES (103, 'Tetris', 27, NOW(), 'Dummy3');
-- INSERT INTO highscores VALUES (103, 'Tetris', 31, NOW(), 'Dummy3');
-- INSERT INTO highscores VALUES (103, 'Tetris', 17, NOW(), 'Dummy3');