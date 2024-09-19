create database jayhunt;

use jayhunt;

CREATE TABLE IF NOT EXISTS user (
    userID INT AUTO_INCREMENT,
    username VARCHAR(50) NOT NULL,
    date DATE,
    PRIMARY KEY (userID)
);

CREATE TABLE IF NOT EXISTS trivia ( # We have to return the question ID
	questionID INT AUTO_INCREMENT,
    question VARCHAR(255) NOT NULL,
    PRIMARY KEY (questionID)
);

CREATE TABLE IF NOT EXISTS answer (
	answerID INT NOT NULL AUTO_INCREMENT,
    questionID INT NOT NULL,
    triv_answer varchar(255) DEFAULT ("Google it"),
    is_Correct boolean NOT NULL,
    PRIMARY KEY (answerID),
    FOREIGN KEY (questionID) REFERENCES trivia (questionID)
);

CREATE TABLE Scores (
    score_id INT AUTO_INCREMENT PRIMARY KEY,
    user_id INT NOT NULL,
    score INT NOT NULL,
);

INSERT INTO trivia (question) VALUES ("How old is Skeeter?");
INSERT INTO answer (questionID, triv_answer, is_Correct) VALUES (1, "25", TRUE);
INSERT INTO answer (questionID, triv_answer, is_Correct) VALUES (1, "12", FALSE);
INSERT INTO answer (questionID, triv_answer, is_Correct) VALUES (1, "Unborn", FALSE);

INSERT INTO trivia (question) VALUES ("Where is Skeeter right now?"); 
INSERT INTO answer (questionID, triv_answer, is_Correct) VALUES (2, "Prolly not here", TRUE);
INSERT INTO answer (questionID, triv_answer, is_Correct) VALUES (2, "In class", FALSE);
INSERT INTO answer (questionID, triv_answer, is_Correct) VALUES (2, "Jim", FALSE);

INSERT INTO user (username, date) VALUES ("user1", DATE_FORMAT(NOW(), '%Y-%m-%d'));