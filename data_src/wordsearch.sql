use triviagames;

create table if not exists WordSearch_Category(
category_id INT primary key auto_increment,
Name varchar(45) not null
);

create table if not exists WordSearch_WordBank(
wordbank_id INT primary key auto_increment,
word varchar(45) not null,
category_id INT not null,
constraint category_id_fk_WordSearch_Category 
foreign key (category_id)
references WordSearch_Category (category_id)
);

insert into WordSearch_Category(Name)
VALUES
("DORMS"),
("EXPERTISE"),
("TOOLS"),
("LANGUAGES")
;

insert into WordSearch_WordBank(word,category_id)
VALUES
("SCHLOSSER",1),
("ROYER",1),
("BRINSER",1),
("OBER",1),
("HACKMAN",1),
("QUADS",1),
("MYER",1)
;

insert into WordSearch_WordBank(word,category_id)
VALUES
("DATASCIENCE",2),
("DATABASES",2),
("LLMS",2),
("CYBERSECURITY",2),
("WEBDEV",2),
("JAVA",2)
;

insert into WordSearch_WordBank(word,category_id)
VALUES
("ECLIPSE",3),
("VSCODE",3),
("JJTURTLE",3),
("PANDAS",3),
("MYSQL",3),
("XAMPP",3),
("GNU",3)
;

insert into WordSearch_WordBank(word,category_id)
VALUES
("JAVA",4),
("PYTHON",4),
("HTML",4),
("PHP",4),
("JAVASCRIPT",4),
("CSS",4)
;