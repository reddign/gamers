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
