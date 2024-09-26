create database triviagames;
use triviagames;

CREATE TABLE IF NOT EXISTS user (

    userID INT AUTO_INCREMENT,
    username VARCHAR(50) NOT NULL,
    email VARCHAR(255) NOT NULL,
    date DATE,
    firstname VARCHAR(255) NOT NULL,
    PRIMARY KEY (userID)

);

INSERT INTO user (username, email, date, firstname) VALUES ("user1", "fakeemail@something.com", DATE_FORMAT(NOW(), "%Y-%m-%d"), "user");

CREATE TABLE IF NOT EXISTS trivia ( # We have to return the question ID

	questionID INT AUTO_INCREMENT,
    question VARCHAR(255) NOT NULL,
    genre INT,
    times_shown INT DEFAULT 0,
    times_right INT DEFAULT 0,
    times_wrong INT DEFAULT 0,
    times_skipped INT DEFAULT 0,
    PRIMARY KEY (questionID)

);

CREATE TABLE IF NOT EXISTS visitor (

	username VARCHAR(50) NOT NULL,
    fav_game INT DEFAULT 0,
    fav_genre INT DEFAULT 0,
    unique_played INT DEFAULT 0,
    num_played_hangman INT DEFAULT 0,
    num_played_flappy INT DEFAULT 0,
    num_played_2048 INT DEFAULT 0,
    PRIMARY KEY (username)

);

CREATE TABLE IF NOT EXISTS visit (
	
    visit_id INT AUTO_INCREMENT,
	time_start DATETIME NOT NULL,
    visit_length DATETIME,
    visitor VARCHAR(50),
    PRIMARY KEY (visit_id),
    FOREIGN KEY (visitor) REFERENCES visitor (username)

);

CREATE TABLE IF NOT EXISTS answer (

	answerID INT NOT NULL AUTO_INCREMENT,
    questionID INT NOT NULL,
    triv_answer varchar(255) DEFAULT ("Google it"),
    is_Correct boolean NOT NULL,
    PRIMARY KEY (answerID),
    FOREIGN KEY (questionID) REFERENCES trivia (questionID)

);

CREATE TABLE IF NOT EXISTS hangman (

	wordID INT NOT NULL AUTO_INCREMENT,
    word varchar(50) NOT NULL,
    PRIMARY KEY (wordID)

);

CREATE TABLE IF NOT EXISTS admin (

    adminID INT NOT NULL AUTO_INCREMENT,
    username varchar(50) NOT NULL,
    password varchar(250) NOT NULL,
    PRIMARY KEY (adminID)
);

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

# Question 10 and answers
INSERT INTO trivia (question) VALUES ("Where is the Blue Bean located on campus?");
INSERT INTO answer (questionID, triv_answer, is_Correct) VALUES (10, "The BSC", TRUE);
INSERT INTO answer (questionID, triv_answer, is_Correct) VALUES (10, "Bowers Center", FALSE);
INSERT INTO answer (questionID, triv_answer, is_Correct) VALUES (10, "Esbenshade", FALSE);

# Question 11 and answers
INSERT INTO trivia (question) VALUES ("Where is the Jay's Nest located on campus?");
INSERT INTO answer (questionID, triv_answer, is_Correct) VALUES (11, "The BSC", TRUE);
INSERT INTO answer (questionID, triv_answer, is_Correct) VALUES (11, "Bowers Center", FALSE);
INSERT INTO answer (questionID, triv_answer, is_Correct) VALUES (11, "Esbenshade", FALSE);

# Question 12 and answers
INSERT INTO trivia (question) VALUES ("What is Etown's most popular sport?");
INSERT INTO answer (questionID, triv_answer, is_Correct) VALUES (12, "Lacrosse", TRUE);
INSERT INTO answer (questionID, triv_answer, is_Correct) VALUES (12, "Baseball", FALSE);
INSERT INTO answer (questionID, triv_answer, is_Correct) VALUES (12, "Cross Country", FALSE);

# Question 13 and answers
INSERT INTO trivia (question) VALUES ("What is Etown's most popular program?");
INSERT INTO answer (questionID, triv_answer, is_Correct) VALUES (13, "Occupational Therapy", TRUE);
INSERT INTO answer (questionID, triv_answer, is_Correct) VALUES (13, "Computer Science", FALSE);
INSERT INTO answer (questionID, triv_answer, is_Correct) VALUES (13, "Business", FALSE);

# Question 14 and answers
INSERT INTO trivia (question) VALUES ("Who's the first Pantry Coordinator?");
INSERT INTO answer (questionID, triv_answer, is_Correct) VALUES (14, "Ariea O'Krepka", TRUE);
INSERT INTO answer (questionID, triv_answer, is_Correct) VALUES (14, "Professor Reddig", FALSE);
INSERT INTO answer (questionID, triv_answer, is_Correct) VALUES (14, "Thomas Leap", FALSE);

# Populating hangman with words
INSERT INTO hangman (word) VALUES ("TRUMAN");
INSERT INTO hangman (word) VALUES ("CONRAD");
INSERT INTO hangman (word) VALUES ("BLUEJAY");
INSERT INTO hangman (word) VALUES ("BOWERS");
INSERT INTO hangman (word) VALUES ("FOUNDERS");
INSERT INTO hangman (word) VALUES ("SCHLOSSER");
INSERT INTO hangman (word) VALUES ("ELIZABETHTOWN");
INSERT INTO hangman (word) VALUES ("JAYNEST");
INSERT INTO hangman (word) VALUES ("THOMPSON");
INSERT INTO hangman (word) VALUES ("BRINSER");
