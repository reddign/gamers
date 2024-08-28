# gamers

Gamers repository - Fall 2024
This is a project that will create games that teach incoming Etown students about the college.
We combined trivia with fun, Etown themed games, to create an interactive experience.

This project uses HTML, PHP, SQL, CSS, and JavaScript. SQL is used for the data backend.


The project is broken up into two main folders: data source and web source.


The data source folder (data_src) is split into two sub folders: API and doc files. It also contains two files: the SQL file that contains the data backend code, and the docs file, which contains a guide to using the API.

The API folder contains subfolders for the CRUD methods for different tables within the database. It also should contain an includes folder, where you would put your database connection information. More on this will be at the bottom, with the gitignore.

The doc_files folder contains some files used in the docs.html file.


The web source folder (web_src) contains five sub folders. 

The games folder contains subfolders for each game that has been implemented, or will be implemented in the future. It also contains the menu.php file, which is the game selection file.
Each game's folder contains an images folder for the used images, and whatever files necessary to play the game.

The general folder contains all the general page files, such as index, about, and login. It has an about subfolder, which contains specific files for the about page. It also has a teampics subfolder, which holds relevent pictures used in the about pages.

The includes folder contains different elements that other pages use.

The stylesheets folder contains the CSS files for all our general pages, as well as for certain games.

The trivia folder contains the files related to the trivia portion of the website.


Lastly, there is a .gitignore file. This stops the database connection file from ever being published to GitHub, giving us security on our database. It's incredibly important that your db_config file is named and placed exactly how it's listed in the .gitignore file. If you fail to do this, it will compromise the security of the website.
