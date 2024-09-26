-- highscores.sql

use triviagames;

-- TSK-8.1 Create a table to store the user, the date, the score, and the game played. (create table)
CREATE TABLE IF NOT EXISTS highscores (
    user_id INT NOT NULL,                 	 -- Unique ID for each user (auto-incremented)
    game_played VARCHAR(100) NOT NULL,       -- Name of the game played
    score INT NOT NULL,                      -- Score achieved in the game
    time_played DATETIME NOT NULL,           -- Date the game was played
    username VARCHAR(100) NOT NULL,          -- Username for each user (picked)
    FOREIGN KEY (user_id) REFERENCES user(userID)
);

--Dummy Players:
INSERT INTO user VALUES(100, 'User0', 'User0@etown.edu', NOW(), 'Dummy0');
INSERT INTO user VALUES(101, 'User1', 'User1@etown.edu', NOW(), 'Dummy1');
INSERT INTO user VALUES(102, 'User2', 'User2@etown.edu', NOW(), 'Dummy2');
INSERT INTO user VALUES(103, 'User3', 'User3@etown.edu', NOW(), 'Dummy3');

--Dummy Scores:
INSERT INTO highscores VALUES (100, 'Pong', 20, NOW(), 'Dummy0');
INSERT INTO highscores VALUES (100, 'Pong', 47, NOW(), 'Dummy0');
INSERT INTO highscores VALUES (100, 'Pong', 14, NOW(), 'Dummy0');
INSERT INTO highscores VALUES (100, 'Pong', 51, NOW(), 'Dummy0');

INSERT INTO highscores VALUES (101, 'Pong', 6, NOW(), 'Dummy1');
INSERT INTO highscores VALUES (101, 'Pong', 11, NOW(), 'Dummy1');
INSERT INTO highscores VALUES (101, 'Pong', 15, NOW(), 'Dummy1');
INSERT INTO highscores VALUES (101, 'Pong', 60, NOW(), 'Dummy1');

INSERT INTO highscores VALUES (102, 'Pong', 32, NOW(), 'Dummy2');
INSERT INTO highscores VALUES (102, 'Pong', 37, NOW(), 'Dummy2');
INSERT INTO highscores VALUES (102, 'Pong', 24, NOW(), 'Dummy2');
INSERT INTO highscores VALUES (102, 'Pong', 30, NOW(), 'Dummy2');

INSERT INTO highscores VALUES (103, 'Pong', 64, NOW(), 'Dummy3');
INSERT INTO highscores VALUES (103, 'Pong', 27, NOW(), 'Dummy3');
INSERT INTO highscores VALUES (103, 'Pong', 31, NOW(), 'Dummy3');
INSERT INTO highscores VALUES (103, 'Pong', 17, NOW(), 'Dummy3');

INSERT INTO highscores VALUES (100, 'Tetris', 25, NOW(), 'Dummy0');
INSERT INTO highscores VALUES (100, 'Tetris', 47, NOW(), 'Dummy0');
INSERT INTO highscores VALUES (100, 'Tetris', 24, NOW(), 'Dummy0');
INSERT INTO highscores VALUES (100, 'Tetris', 71, NOW(), 'Dummy0');

INSERT INTO highscores VALUES (101, 'Tetris', 60, NOW(), 'Dummy1');
INSERT INTO highscores VALUES (101, 'Tetris', 11, NOW(), 'Dummy1');
INSERT INTO highscores VALUES (101, 'Tetris', 45, NOW(), 'Dummy1');
INSERT INTO highscores VALUES (101, 'Tetris', 65, NOW(), 'Dummy1');

INSERT INTO highscores VALUES (102, 'Tetris', 49, NOW(), 'Dummy2');
INSERT INTO highscores VALUES (102, 'Tetris', 75, NOW(), 'Dummy2');
INSERT INTO highscores VALUES (102, 'Tetris', 74, NOW(), 'Dummy2');
INSERT INTO highscores VALUES (102, 'Tetris', 30, NOW(), 'Dummy2');

INSERT INTO highscores VALUES (103, 'Tetris', 67, NOW(), 'Dummy3');
INSERT INTO highscores VALUES (103, 'Tetris', 27, NOW(), 'Dummy3');
INSERT INTO highscores VALUES (103, 'Tetris', 31, NOW(), 'Dummy3');
INSERT INTO highscores VALUES (103, 'Tetris', 17, NOW(), 'Dummy3');

describe user;
select * from user;
select * from highscores;

-- TSK-8.2	Create a screen to show the top 10 players for each game.
    -- high_scores.php which has a filepath of gamers/web_src/games/high_scores.php (R: Read for 8.3)

-- TSK-8.3 Make sure that there are CRUD methods for this data
-- TSK-8.4	Update the documentation for these new CRUD methods.
    -- Create (add data to the table) 
        -- INSERT INTO highscores (user_id, game_played, score, time_played, username)
        -- VALUES (user_id, game_played, score, time_played, username);

    -- Read (read data from table)
        -- Select username, game_played, score, time_played
        -- From highscores
        -- *** Filter by username, game_played, time_played ***
        -- Always show by DESC
         
        -- Run Onto Highscores Page (whole table)
        -- After game played, automatically filter by game_played (show top 10 DESC ... you) 
        -- Be able to cgo to high scores page by click button from high scores showed after games

-- Notes:
    -- 1) Have separate leaderboard page which can be filtered by game, player, date, etc
    -- 2) Show leaderboard after each game, to show top 10 for the game just played
    -- 3) (CURRENTLY) Foreign Key Constraint not matched due to no current users