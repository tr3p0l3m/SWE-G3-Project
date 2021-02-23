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
Book_Status enum('borrowed','on-shelf'), 
primary key (BookID)
); 

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
