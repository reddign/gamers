# Instructions for working on project

- Godot

  - To use godot to edit game logic, scripts, sprites, download Godot from here https://godotengine.org/download
  - Then open the file located at "C:\xampp\htdocs\gamers\web_src\games\jayrunner\jayrunner_src\project.godot" in Godot
  - You can consult the godot docs to learn how to edit scripts and other parts of the game through the docs https://docs.godotengine.org/en/stable/ or ChatGPT
  - When finishing the work in Godot, use Project > Export and choose Web option to export the project.
    - Under the export path make sure it is /xampp/htdocs/gamers/web_src/games/jayrunner/jayrunner_exports (This is the folder where godots html file will be sent when you want to test your project in web environment)
  - Click Save for the export path, and then do Export All, and choose Debug mode (This creates the html, js and other files in jayrunner_exports that runs the game when we access it through jayrunner.php)

- Database to save scores

  - Make sure you have CS341 and trivia games database created on your local system.
  - Connect to that database and run the highscores.sql to create a highscores table within that database. Make sure you have the db_config file from professor reddig set.
  - Run the highscores.sql script to create that table to write to and read scores. This can later be removed when databse team has highscores setup.

- FEATURES TO ADD
  - DR. Atwood wanted a feature where depnding on what obstacle you encounter, there would be a message displayed related to ETown. Like for when encountering cat
    you can have a text bubble appear that says "Did you know that Etown allows students to have emotional support animals on campus?"
  - This can be added directly within Godot or on the html page depending on how you prefer. In Godot, the obstacles are numbered 1-3. You can emit that variable when the Jay
    ecnounters it, or just track it in Godot and have the proper message appear as a result.
