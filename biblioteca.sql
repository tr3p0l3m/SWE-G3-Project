-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 26, 2021 at 10:03 PM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.4.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `seg3`
--

-- --------------------------------------------------------

--
-- Table structure for table `books`
--

CREATE TABLE `books` (
  `BookID` int(11) NOT NULL,
  `Title` varchar(80) NOT NULL,
  `Book_image` varchar(100) DEFAULT NULL,
  `Category` varchar(30) DEFAULT NULL,
  `Author` varchar(70) NOT NULL,
  `book_summary` varchar(200) NOT NULL,
  `Book_Status` enum('borrowed','on-shelf') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `books`
--

INSERT INTO `books` (`BookID`, `Title`, `Book_image`, `Category`, `Author`, `book_summary`, `Book_Status`) VALUES
(1, 'Treasure Island', 'images_Novel/Treasureisland.jpg', 'Novel', 'Robert Louis Stevenson', 'This book is set in the days of sailing ships and pirates and tells of the adventures of Jim Hawkins and his search for the buried treasure of an evil pirate, Captain Flint.', 'on-shelf'),
(2, 'Diary Of a Wimpy Kid', 'images_Novel/diary-kid.jpg', 'Novel', 'Jeff Kinney', ' The adventures of a 12 year old who is fresh out of elementary and transitions to middle school, where he has to learn the consequence to survive the year', 'on-shelf'),
(3, 'Captain Underpants', 'images_Novel\\captain-underpants.jpg', 'Novel', 'Dav Pilkey', 'Two naughty fourth-graders, George and Harold, hypnotise their school principal Benjamin Krupp and convince him that he is Captain Underpants, a superhero.', 'on-shelf'),
(4, 'The Baby-Sitters Club', 'images_Novel\\the-baby-sitters-club.jpg', 'Novel', 'Ann M. Martin', 'Kristy Thomas and her friends are often babysitting. She recruits her friends Mary Ann and Claudia, and Claudia recruits her new friend Stacy. The Club is a hit, but along the way, the girls navigate ', 'on-shelf'),
(5, 'The Adventures of Pinocchio', 'images_Novel\\The_Adventures_of_Pinocchio.jpg', 'Novel', 'Carlo Collodi', 'Wood-carver Geppetto carves a magical piece of wood into the image of a boy. Before he realises what is happening, the boy comes to life. However his troubles start immediately - Pinocchio cannot lie ', 'on-shelf'),
(6, 'Beautiful Disaster', 'images_Novel\\beautiful_disater.jpg', 'Novel', 'Jamie McGuire', 'Travis Maddox is not what Abby is looking for in a guy--he\'s handsome, but far too risky. However, he develops a bet with her--if he lets an opponent hit him once during a match, he will stay abstinen', 'on-shelf'),
(7, 'The Holder\'s Dominion', 'images_Novel\\The_Holder\'s_Dominion.jpg', 'Novel', 'Genese Davis', 'Guided by Elliott and his friends, Kaylie signs on to the massively popular online game Edannair. There she discovers a world of beautiful magical creatures, where people from all over the...', 'on-shelf');

-- --------------------------------------------------------

--
-- Table structure for table `borrowed_books`
--

CREATE TABLE `borrowed_books` (
  `Expected_ReturnDate` date DEFAULT NULL,
  `Date_Borrowed` date DEFAULT NULL,
  `UserID` int(11) DEFAULT NULL,
  `BookID` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE `messages` (
  `date_sent` timestamp NOT NULL DEFAULT current_timestamp(),
  `topic` varchar(100) DEFAULT NULL,
  `memo` text DEFAULT NULL,
  `UserID` int(11) DEFAULT NULL,
  `BookID` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `UserID` int(11) NOT NULL,
  `fname` varchar(50) NOT NULL,
  `lname` varchar(50) NOT NULL,
  `dob` date DEFAULT NULL,
  `gender` varchar(10) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `password` varchar(50) DEFAULT NULL,
  `role` varchar(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `books`
--
ALTER TABLE `books`
  ADD PRIMARY KEY (`BookID`);

--
-- Indexes for table `borrowed_books`
--
ALTER TABLE `borrowed_books`
  ADD KEY `UserID` (`UserID`),
  ADD KEY `BookID` (`BookID`);

--
-- Indexes for table `messages`
--
ALTER TABLE `messages`
  ADD KEY `UserID` (`UserID`),
  ADD KEY `BookID` (`BookID`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`UserID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `books`
--
ALTER TABLE `books`
  MODIFY `BookID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `UserID` int(11) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `borrowed_books`
--
ALTER TABLE `borrowed_books`
  ADD CONSTRAINT `borrowed_books_ibfk_1` FOREIGN KEY (`UserID`) REFERENCES `users` (`UserID`),
  ADD CONSTRAINT `borrowed_books_ibfk_2` FOREIGN KEY (`BookID`) REFERENCES `books` (`BookID`);

--
-- Constraints for table `messages`
--
ALTER TABLE `messages`
  ADD CONSTRAINT `messages_ibfk_1` FOREIGN KEY (`UserID`) REFERENCES `users` (`UserID`),
  ADD CONSTRAINT `messages_ibfk_2` FOREIGN KEY (`BookID`) REFERENCES `books` (`BookID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
