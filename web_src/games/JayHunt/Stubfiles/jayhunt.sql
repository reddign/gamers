-- Create a database called 'jayhunt' if it doesn't already exist
CREATE DATABASE IF NOT EXISTS jayhunt;

-- Switch to the 'jayhunt' database
USE jayhunt;

-- Create a 'user' table to store user information
-- userID: Primary key, auto-incremented
-- username: Username of the user, cannot be NULL
-- date: The date the user registered (or any relevant date)
CREATE TABLE IF NOT EXISTS user (
    userID INT AUTO_INCREMENT,               -- Auto-incrementing primary key for each user
    username VARCHAR(50) NOT NULL,           -- The username field, required (not null)
    date DATE,                               -- A date field (can be for registration or other purposes)
    PRIMARY KEY (userID)                     -- userID as the primary key for this table
);

-- Create a 'trivia' table to store trivia questions
-- questionID: Primary key, auto-incremented
-- question: The actual trivia question, cannot be NULL
CREATE TABLE IF NOT EXISTS trivia (
	questionID INT AUTO_INCREMENT,           -- Auto-incrementing primary key for each trivia question
    question VARCHAR(255) NOT NULL,          -- The trivia question itself, required (not null)
    PRIMARY KEY (questionID)                 -- questionID as the primary key for this table
);

-- Create an 'answer' table to store answers related to trivia questions
-- answerID: Primary key, auto-incremented
-- questionID: Foreign key referencing the 'trivia' table's questionID
-- triv_answer: The actual answer text
-- is_Correct: Boolean value indicating if the answer is correct (TRUE) or incorrect (FALSE)
CREATE TABLE IF NOT EXISTS answer (
	answerID INT NOT NULL AUTO_INCREMENT,    -- Auto-incrementing primary key for each answer
    questionID INT NOT NULL,                 -- Foreign key that references the question in the trivia table
    triv_answer VARCHAR(255) DEFAULT ("No"), -- The text of the answer, default is "No" if none provided
    is_Correct BOOLEAN NOT NULL,             -- Boolean indicating if the answer is correct (true) or not (false)
    PRIMARY KEY (answerID),                  -- answerID as the primary key for this table
    FOREIGN KEY (questionID) REFERENCES trivia (questionID)  -- Foreign key linking to the trivia table
);

-- Create a 'scores' table to store user scores for trivia
-- score_id: Primary key, auto-incremented
-- user_id: Foreign key referencing the 'user' table's userID
-- score: The score the user achieved
CREATE TABLE IF NOT EXISTS scores (
    score_id INT AUTO_INCREMENT PRIMARY KEY, -- Auto-incrementing primary key for each score record
    user_id INT NOT NULL,                    -- Foreign key linking to the user table
    score INT NOT NULL                       -- The score the user achieved, required (not null)
);

-- Insert a trivia question: "How old is Skeeter?"
INSERT INTO trivia (question) VALUES ("How old is Skeeter?");

-- Insert answers for the "How old is Skeeter?" question
-- The correct answer is "25"
INSERT INTO answer (questionID, triv_answer, is_Correct) VALUES (1, "25", TRUE);   -- Correct answer
INSERT INTO answer (questionID, triv_answer, is_Correct) VALUES (1, "12", FALSE);  -- Incorrect answer
INSERT INTO answer (questionID, triv_answer, is_Correct) VALUES (1, "Unborn", FALSE); -- Incorrect answer

-- Insert another trivia question: "Where is Skeeter right now?"
INSERT INTO trivia (question) VALUES ("Where is Skeeter right now?");

-- Insert answers for the "Where is Skeeter right now?" question
-- The correct answer is "Prolly not here"
INSERT INTO answer (questionID, triv_answer, is_Correct) VALUES (2, "Prolly not here", TRUE); -- Correct answer
INSERT INTO answer (questionID, triv_answer, is_Correct) VALUES (2, "In class", FALSE);       -- Incorrect answer
INSERT INTO answer (questionID, triv_answer, is_Correct) VALUES (2, "Jim", FALSE);            -- Incorrect answer

-- Insert a user into the 'user' table with the current date
-- Username is "user1" and the date is the current date
INSERT INTO user (username, date) VALUES ("user1", DATE_FORMAT(NOW(), '%Y-%m-%d'));
