-- highscores.sql

use triviagames;

-- TSK-8.1 Create a table to store the user, the date, the score, and the game played. (create table)

-- TSK-8.2	Create a screen to show the top 10 players for each game.
    -- high_scores.php which has a filepath of gamers/web_src/games/high_scores.php (R: Read for 8.3)

-- TSK-8.3 Make sure that there are CRUD methods for this data in data_src/api/scoreRecord (possible folder name?)???
    -- high_scores.sql add data to the table (C: Create for 8.3)
    -- (CURRENTLY) Foreign Key Constraint not matched due to no current users

-- Notes:
    -- 1) Have separate leaderboard page which can be filtered by game, player, date, etc
    -- 2) Show leaderboard after each game, to show top 10 for the game just played
	
--  TSK-8.4	Update the documentation for these new CRUD methods.
    -- Done in the high_scores.php file (R) & high_scores.sql file (C)