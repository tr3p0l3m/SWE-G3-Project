drop database if exists SEG3;
create schema SEG3;
use SEG3;

create table Users(
UserID int AUTO_INCREMENT,
fname varchar(50) NOT NULL,
lname varchar(50) NOT NULL,
dob date,
gender varchar(10), 
email varchar(50),
password varchar(50),
role varchar(1),
primary key(UserID)
);

 
 create table Books(
BookID int AUTO_INCREMENT, 
Title varchar(80) NOT NULL,
Book_image varchar(100) DEFAULT NULL, 
Category varchar(30), 
Author varchar(70) NOT NULL,
book_summary varchar(200) NOT NULL,
Book_Status enum('borrowed','on-shelf'), 
primary key (BookID)
); 

INSERT INTO `books` (`BookID`, `Title`, `Book_image`, `Category`, `Author`, `book_summary`, `Book_Status`) VALUES
(1, 'Treasure Island', 'images_Novel/Treasureisland.jpg', 'Novel', 'Robert Louis Stevenson', 'This book is set in the days of sailing ships and pirates and tells of the adventures of Jim Hawkins and his search for the buried treasure of an evil pirate, Captain Flint.', 'on-shelf'),
(2, 'Diary Of a Wimpy Kid', 'images_Novel/diary-kid.jpg', 'Novel', 'Jeff Kinney', ' The adventures of a 12 year old who is fresh out of elementary and transitions to middle school, where he has to learn the consequence to survive the year', 'on-shelf'),
(3, 'Captain Underpants', 'images_Novel\\captain-underpants.jpg', 'Novel', 'Dav Pilkey', 'Two naughty fourth-graders, George and Harold, hypnotise their school principal Benjamin Krupp and convince him that he is Captain Underpants, a superhero.', 'on-shelf'),
(4, 'The Baby-Sitters Club', 'images_Novel\\the-baby-sitters-club.jpg', 'Novel', 'Ann M. Martin', 'Kristy Thomas and her friends are often babysitting. She recruits her friends Mary Ann and Claudia, and Claudia recruits her new friend Stacy. The Club is a hit, but along the way, the girls navigate ', 'on-shelf'),
(5, 'The Adventures of Pinocchio', 'images_Novel\\The_Adventures_of_Pinocchio.jpg', 'Novel', 'Carlo Collodi', 'Wood-carver Geppetto carves a magical piece of wood into the image of a boy. Before he realises what is happening, the boy comes to life. However his troubles start immediately - Pinocchio cannot lie ', 'on-shelf'),
(6, 'Beautiful Disaster', 'images_Novel\\beautiful_disater.jpg', 'Novel', 'Jamie McGuire', 'Travis Maddox is not what Abby is looking for in a guy--he\'s handsome, but far too risky. However, he develops a bet with her--if he lets an opponent hit him once during a match, he will stay abstinen', 'on-shelf'),
(7, 'The Holder\'s Dominion', 'images_Novel\\The_Holder\'s_Dominion.jpg', 'Novel', 'Genese Davis', 'Guided by Elliott and his friends, Kaylie signs on to the massively popular online game Edannair. There she discovers a world of beautiful magical creatures, where people from all over the...', 'on-shelf');



create table Borrowed_books(
 Expected_ReturnDate date, 
 Date_Borrowed date ,
 UserID int, 
 BookID int,
 foreign key (UserID) references Users(UserID),
 foreign key (BookID) references Books(BookID) 
 );


create table messages(
 date_sent timestamp NOT NULL DEFAULT current_timestamp(),
 topic varchar(100),
 memo text,
 UserID int, 
 BookID int,
 foreign key (UserID) references Users(UserID),
 foreign key (BookID) references Books(BookID) 
 );

INSERT INTO `books` (`BookID`, `Title`, `Book_image`, `Category`, `Author`, `book_summary`, `Book_Status`) VALUES
(1, 'Treasure Island', 'Homepage/images_Novel/Treasureisland.jpg', 'Novel', 'Robert Louis Stevenson', 'This book is set in the days of sailing ships and pirates and tells of the adventures of Jim Hawkins and his search for the buried treasure of an evil pirate, Captain Flint.', 'on-shelf'),
(2, 'Diary Of a Wimpy Kid', 'Homepage/images_Novel/diary-kid.jpg', 'Novel', 'Jeff Kinney', ' The adventures of a 12 year old who is fresh out of elementary and transitions to middle school, where he has to learn the consequence to survive the year', 'on-shelf'),
(3, 'Captain Underpants', 'Homepage/images_Novel/captain-underpants.jpg', 'Novel', 'Dav Pilkey', 'Two naughty fourth-graders, George and Harold, hypnotise their school principal Benjamin Krupp and convince him that he is Captain Underpants, a superhero.', 'on-shelf'),
(4, 'The Baby-Sitters Club', 'Homepage/images_Novel/the-baby-sitters-club.jpg', 'Novel', 'Ann M. Martin', 'Kristy Thomas and her friends are often babysitting. She recruits her friends Mary Ann and Claudia, and Claudia recruits her new friend Stacy. The Club is a hit, but along the way, the girls navigate ', 'on-shelf'),
(5, 'The Adventures of Pinocchio', 'Homepage/images_Novel/The_Adventures_of_Pinocchio.jpg', 'Novel', 'Carlo Collodi', 'Wood-carver Geppetto carves a magical piece of wood into the image of a boy. Before he realises what is happening, the boy comes to life. However his troubles start immediately - Pinocchio cannot lie ', 'on-shelf'),
(6, 'Beautiful Disaster', 'Homepage/images_Novel/beautiful_disater.jpg', 'Novel', 'Jamie McGuire', 'Travis Maddox is not what Abby is looking for in a guy--he is handsome, but far too risky. If he lets an opponent hit him once during a match, he will stay abstinent', 'on-shelf'),
(7, 'The Holders Dominion', 'Homepage/images_Novel/The_Holders_Dominion.jpg', 'Novel', 'Genese Davis', 'Guided by Elliott and his friends, Kaylie signs on to the massively popular online game Edannair. There she discovers a world of beautiful magical creatures, where people from all over the...', 'on-shelf');
