-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 16, 2023 at 09:39 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `library`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `admin_id` int(11) NOT NULL,
  `admin_email` varchar(200) NOT NULL,
  `admin_password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`admin_id`, `admin_email`, `admin_password`) VALUES
(1, 'admin@gmail.com', 'Password1');

-- --------------------------------------------------------

--
-- Table structure for table `author`
--

CREATE TABLE `author` (
  `author_id` int(11) NOT NULL,
  `author_name` varchar(200) NOT NULL,
  `author_status` enum('Enable','Disable') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `author`
--

INSERT INTO `author` (`author_id`, `author_name`, `author_status`) VALUES
(1, 'J. R. R. Tolkien', 'Enable'),
(2, 'William Goldman', 'Enable'),
(3, 'F. Scott Fitzgerald', 'Enable'),
(5, 'Jane Austen', 'Enable'),
(6, 'Harper Lee', 'Enable'),
(7, 'Gillian Flynn', 'Enable'),
(8, 'Truman Capote', 'Enable'),
(9, 'Dan Brown', 'Enable'),
(10, 'Jane Austen', 'Enable'),
(11, 'Louisa May Alcott', 'Enable'),
(20, 'Charles Dickens', 'Enable');

-- --------------------------------------------------------

--
-- Table structure for table `book`
--

CREATE TABLE `book` (
  `book_id` int(11) NOT NULL,
  `book_category` varchar(200) NOT NULL,
  `book_author` varchar(200) NOT NULL,
  `book_name` text NOT NULL,
  `book_isbn_number` varchar(30) NOT NULL,
  `book_no_of_copy` int(5) NOT NULL,
  `book_status` enum('Enable','Disable') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `book`
--

INSERT INTO `book` (`book_id`, `book_category`, `book_author`, `book_name`, `book_isbn_number`, `book_no_of_copy`, `book_status`) VALUES
(1, 'Fantasy', 'J. R. R. Tolkien', 'The Hobbit', '978152279214', 5, 'Enable'),
(2, 'Romance', 'Louisa May Alcott', 'Little Women', '852369852123', 5, 'Enable'),
(3, 'Mystery', 'Gillian Flynn', 'Gone Girl', '7539518526963', 5, 'Enable'),
(4, 'Fantasy', 'William Goldman', 'The Princess Bride', '74114774147', 5, 'Enable'),
(5, 'Romance', 'Jane Austen', 'Emma', '85225885258', 5, 'Enable'),
(6, 'Mystery', ' Truman Capote', 'In Cold Blood', '8585858596632', 5, 'Enable'),
(7, 'Classics', 'F. Scott Fitzgerald', 'The Great Gatsby', '753852963258', 5, 'Enable'),
(8, 'Classics', 'Jane Austen', 'Pride and Prejudice', '969335785842', 5, 'Enable'),
(9, 'Mystery', 'Dan Brown', 'The Da Vinci Code', '963369852258', 5, 'Enable'),
(10, 'Classics', 'Harper Lee', 'To Kill a Mockingbird', '85478569856', 5, 'Enable');

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `category_id` int(11) NOT NULL,
  `category_name` varchar(200) NOT NULL,
  `category_status` enum('Enable','Disable') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`category_id`, `category_name`, `category_status`) VALUES
(1, 'Fantasy', 'Enable'),
(2, 'Classics', 'Enable'),
(3, 'Mystery', 'Enable'),
(4, 'Romance', 'Enable');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_id` int(11) NOT NULL,
  `user_name` varchar(200) NOT NULL,
  `user_contact_no` varchar(30) NOT NULL,
  `user_email_address` varchar(200) NOT NULL,
  `user_password` varchar(30) NOT NULL,
  `user_status` enum('Enable','Disable') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `user_name`, `user_contact_no`, `user_email_address`, `user_password`, `user_status`) VALUES
(22, 'Ksenia', '0682370709', 'kmuho31@gmail.com', '$2y$10$K20OvjcxxJNFVn3ixR.H5Oz', 'Enable'),
(23, 'Klea', '0685854001', 'kkaraj@gmail.com', '$2y$10$.UQg0Y9UcR2ylgFiG5eY6eU', 'Enable'),
(24, 'Era', '0676111092', 'eraalcani@gmail.com', '$2y$10$hJ1IR0sFKwffsY2F0CNhz.c', 'Enable'),
(26, 'user', '0699979999', 'user@gmail.com', '$2y$10$AAtjqz01pF7SZbgB7nzNd.9', 'Enable');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `author`
--
ALTER TABLE `author`
  ADD PRIMARY KEY (`author_id`);

--
-- Indexes for table `book`
--
ALTER TABLE `book`
  ADD PRIMARY KEY (`book_id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `author`
--
ALTER TABLE `author`
  MODIFY `author_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `book`
--
ALTER TABLE `book`
  MODIFY `book_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
