use triviagames;

DROP TABLE IF EXISTS highscores; 

CREATE TABLE IF NOT EXISTS highscores (

    user_id INT NOT NULL,                                                             

    game_played VARCHAR(100) NOT NULL,                        

    score INT NOT NULL,                                                          

    time_played DATETIME NOT NULL,                                    

    username VARCHAR(100) NOT NULL,                             

    FOREIGN KEY (user_id) REFERENCES user(userID)

);

select * from highscores;