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

INSERT INTO admin (username, password) VALUES ("jays", "ninja");

# Question 1 and answers
INSERT INTO trivia (question) VALUES ("What year was Etown founded?");
INSERT INTO answer (questionID, triv_answer, is_Correct) VALUES (1, "1899", TRUE);
INSERT INTO answer (questionID, triv_answer, is_Correct) VALUES (1, "1901", FALSE);
INSERT INTO answer (questionID, triv_answer, is_Correct) VALUES (1, "1874", FALSE);

# Question 2 and answers
INSERT INTO trivia (question) VALUES ("What is the mascot's name?"); 
INSERT INTO answer (questionID, triv_answer, is_Correct) VALUES (2, "Conrad", TRUE);
INSERT INTO answer (questionID, triv_answer, is_Correct) VALUES (2, "Blue", FALSE);
INSERT INTO answer (questionID, triv_answer, is_Correct) VALUES (2, "Truman", FALSE);

# Question 3 and answers
INSERT INTO trivia (question) VALUES ("What is the name of the Bluejay?");
INSERT INTO answer (questionID, triv_answer, is_Correct) VALUES (3, "Blue", TRUE);
INSERT INTO answer (questionID, triv_answer, is_Correct) VALUES (3, "Conrad", FALSE);
INSERT INTO answer (questionID, triv_answer, is_Correct) VALUES (3, "Truman", FALSE);

# Question 4 and answers
INSERT INTO trivia (question) VALUES ("What is the campus support dog's name?");
INSERT INTO answer (questionID, triv_answer, is_Correct) VALUES (4, "Truman", TRUE);
INSERT INTO answer (questionID, triv_answer, is_Correct) VALUES (4, "Conrad", FALSE);
INSERT INTO answer (questionID, triv_answer, is_Correct) VALUES (4, "Blue", FALSE);

# Question 5 and answers
INSERT INTO trivia (question) VALUES ("Who is the president of etown?");
INSERT INTO answer (questionID, triv_answer, is_Correct) VALUES (5, "Betty Rider", TRUE);
INSERT INTO answer (questionID, triv_answer, is_Correct) VALUES (5, "Cecilia McCormick", FALSE);
INSERT INTO answer (questionID, triv_answer, is_Correct) VALUES (5, "Thomas Leap", FALSE);

# Question 6 and answers
INSERT INTO trivia (question) VALUES ("What sport plays the marshmallow game?");
INSERT INTO answer (questionID, triv_answer, is_Correct) VALUES (6, "Soccer", TRUE);
INSERT INTO answer (questionID, triv_answer, is_Correct) VALUES (6, "Lacrosse", FALSE);
INSERT INTO answer (questionID, triv_answer, is_Correct) VALUES (6, "Baseball", FALSE);

# Question 7 and answers
INSERT INTO trivia (question) VALUES ("What sport does etown not have?");
INSERT INTO answer (questionID, triv_answer, is_Correct) VALUES (7, "Football", TRUE);
INSERT INTO answer (questionID, triv_answer, is_Correct) VALUES (7, "Golf", FALSE);
INSERT INTO answer (questionID, triv_answer, is_Correct) VALUES (7, "Tennis", FALSE);

# Question 8 and answers
INSERT INTO trivia (question) VALUES ("What dessert is etown known for?");
INSERT INTO answer (questionID, triv_answer, is_Correct) VALUES (8, "Carrot cake", TRUE);
INSERT INTO answer (questionID, triv_answer, is_Correct) VALUES (8, "Cheesecake", FALSE);
INSERT INTO answer (questionID, triv_answer, is_Correct) VALUES (8, "Chocolate cake", FALSE);

# Question 9 and answers
INSERT INTO trivia (question) VALUES ("Where is the Fresh Nest located on campus?");
INSERT INTO answer (questionID, triv_answer, is_Correct) VALUES (9, "Bowers Center", TRUE);
INSERT INTO answer (questionID, triv_answer, is_Correct) VALUES (9, "The BSC", FALSE);
INSERT INTO answer (questionID, triv_answer, is_Correct) VALUES (9, "Esbenshade", FALSE);

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
