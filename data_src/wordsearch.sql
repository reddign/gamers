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
("Dorms")
;

insert into WordSearch_WordBank(word,category_id)
VALUES
("Schlosser",1),
("Royer",1),
("Brinser",1),
("Ober",1),
("Hackman",1),
("Quads",1),
("Myer",1)
;