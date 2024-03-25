-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 22, 2024 at 06:56 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `librarydb`
--

-- --------------------------------------------------------

--
-- Table structure for table `books`
--

CREATE TABLE `books` (
  `book_id` int(11) NOT NULL,
  `isbn` varchar(20) NOT NULL,
  `title` varchar(100) NOT NULL,
  `author` varchar(100) NOT NULL,
  `genre` varchar(50) NOT NULL,
  `quantity` int(11) NOT NULL,
  `status` varchar(50) NOT NULL DEFAULT 'Available',
  `category` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `books`
--

INSERT INTO `books` (`book_id`, `isbn`, `title`, `author`, `genre`, `quantity`, `status`, `category`) VALUES
(1, '9781982121288', 'To Kill a Mockingbird', 'Harper Lee', '0', 14, 'Available', ''),
(4, '9780140283334', 'The Catcher in the Rye', 'J.D. Salinger', '0', 22, 'Available', ''),
(5, '9780060850524', 'The Hobbit', 'J.R.R. Tolkien', '0', 25, 'Available', ''),
(6, '975623021457', '1987', 'Haruki Murakami', '0', 14, 'Available', ''),
(7, '9780345339683', 'The Hobbit', 'J.R.R. Tolkien', 'Fantasy', 8, 'Available', ''),
(8, '9780060935467', 'To Kill a Mockingbird', 'Harper Lee', 'Fiction', 5, 'Available', ''),
(9, '9780141439846', '1984', 'George Orwell', 'Dystopian', 7, 'Available', ''),
(10, '9780439023528', 'The Hunger Games', 'Suzanne Collins', 'Dystopian', 10, 'Available', ''),
(11, '9780142424179', 'The Fault in Our Stars', 'John Green', 'Young Adult', 4, 'Available', ''),
(12, '9780061120084', 'The Catcher in the Rye', 'J.D. Salinger', 'Fiction', 7, 'Available', ''),
(13, '9780062073488', 'The Great Gatsby', 'F. Scott Fitzgerald', 'Fiction', 7, 'Available', ''),
(14, '9780544003415', 'The Lord of the Rings', 'J.R.R. Tolkien', 'Fantasy', 9, 'Available', ''),
(15, '9780062315007', 'Divergent', 'Veronica Roth', 'Dystopian', 13, 'Available', ''),
(16, '9780765326355', 'A Game of Thrones', 'George R.R. Martin', 'Fantasy', 12, 'Available', ''),
(17, '9780439554930', 'Harry Potter and the Sorcerer\'s Stone', 'J.K. Rowling', 'Fantasy', 8, 'Available', ''),
(18, '9780743273565', 'The Da Vinci Code', 'Dan Brown', 'Mystery', 4, 'Available', ''),
(19, '9780385537858', 'The Girl on the Train', 'Paula Hawkins', 'Thriller', 6, 'Available', ''),
(20, '9780553212419', 'Pride and Prejudice', 'Jane Austen', 'Romance', 5, 'Available', ''),
(22, '9781503280786', 'Moby-Dick', 'Herman Melville', 'Adventure', 7, 'Available', ''),
(23, '9781400079988', 'The Kite Runner', 'Khaled Hosseini', 'Historical Fiction', 11, 'Available', ''),
(24, '9780141187761', 'One Hundred Years of Solitude', 'Gabriel Garcia Marquez', 'Magical Realism', 5, 'Available', ''),
(25, '9780451524935', 'Animal Farm', 'George Orwell', 'Political Satire', 7, 'Available', ''),
(26, '9781594746031', 'Miss Peregrine\'s Home for Peculiar Children', 'Ransom Riggs', 'Fantasy', 6, 'Available', ''),
(27, '9780143039471', 'Ender\'s Game', 'Orson Scott Card', 'Science Fiction', 8, 'Available', ''),
(28, '9780062225685', 'Gone Girl', 'Gillian Flynn', 'Mystery', 10, 'Available', ''),
(29, '9780316769174', 'The Bell Jar', 'Sylvia Plath', 'Autobiographical Fiction', 6, 'Available', ''),
(30, '9780393312838', 'Brave New World', 'Aldous Huxley', 'Dystopian', 9, 'Available', ''),
(31, '9781400032716', 'Life of Pi', 'Yann Martel', 'Adventure', 7, 'Available', ''),
(32, '9780451524935', 'The Book Thief', 'Markus Zusak', 'Historical Fiction', 8, 'Available', ''),
(33, '9780140187396', 'Catch-22', 'Joseph Heller', 'Satire', 10, 'Available', ''),
(34, '9780060587017', 'The Road', 'Cormac McCarthy', 'Post-Apocalyptic', 7, 'Available', ''),
(35, '9780141185040', 'The Metamorphosis', 'Franz Kafka', 'Absurdist Fiction', 5, 'Available', ''),
(36, '9780765326386', 'A Clash of Kings', 'George R.R. Martin', 'Fantasy', 12, 'Available', ''),
(37, '9865471203254', 'clash of kings', 'martin', 'fantasy', 13, 'Available', ''),
(38, '9874563214523', 'KIM', 'KIM', 'Technology', 30, 'Available', '');

-- --------------------------------------------------------

--
-- Table structure for table `book_borrow`
--

CREATE TABLE `book_borrow` (
  `borrow_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `book_id` int(11) NOT NULL,
  `borrow_date` date NOT NULL,
  `return_date` date NOT NULL,
  `status` varchar(20) NOT NULL DEFAULT 'Not Returned',
  `fine` text DEFAULT NULL,
  `fine_amount` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `book_borrow`
--

INSERT INTO `book_borrow` (`borrow_id`, `user_id`, `book_id`, `borrow_date`, `return_date`, `status`, `fine`, `fine_amount`) VALUES
(1, 1, 1, '2024-03-18', '2024-03-18', 'Paid', '0.00', 0),
(2, 1, 6, '2024-03-18', '2024-03-19', 'Returned', '0.00', 0),
(3, 1, 1, '2024-03-10', '2024-03-18', 'Paid', '0.00', 0),
(4, 1, 1, '2024-03-15', '2024-03-18', 'Paid', '0.00', 0),
(5, 1, 1, '2024-03-10', '2024-03-18', 'Paid', '0.00', 0),
(6, 1, 1, '2024-03-10', '2024-03-18', 'Paid', '0.00', 0),
(7, 1, 1, '2024-03-10', '2024-03-18', 'Returned', '0.00', 0),
(8, 1, 1, '2024-03-10', '2024-03-18', 'Returned', '0.00', 0),
(9, 2, 5, '2024-03-10', '2024-03-18', 'Returned', '0.00', 0),
(10, 3, 5, '2024-03-11', '2024-03-18', 'Returned', 'Paid', 0),
(11, 1, 1, '2024-03-10', '2024-03-18', 'Returned', '0.00', 0),
(12, 1, 1, '2024-03-10', '2024-03-18', 'Returned', '0.00', 0),
(13, 3, 4, '2024-03-10', '2024-03-19', 'Returned', '0.00', 0),
(14, 1, 1, '2024-03-10', '2024-03-12', 'Paid', '0.00', 0),
(15, 5, 4, '2024-03-12', '2024-03-15', 'Paid', '0.00', 0),
(16, 5, 6, '2024-03-15', '2024-03-19', 'Returned', '0.00', 0),
(17, 3, 4, '2024-03-19', '2024-03-19', 'Returned', '0.00', 0),
(18, 1, 4, '2024-03-12', '2024-03-15', 'Returned', '0.00', 0),
(19, 4, 5, '2024-03-15', '2024-03-19', 'Returned', '0', 0),
(20, 4, 5, '2024-03-15', '2024-03-16', 'Returned', '0', 0),
(21, 2, 5, '2024-03-15', '2024-03-16', 'Returned', '0', 0),
(22, 3, 5, '2024-03-14', '2024-03-16', 'Not Returned', 'Paid', 0),
(23, 5, 5, '2024-03-12', '2024-03-15', 'Not Returned', 'Paid', 0),
(24, 2, 4, '2024-03-15', '2024-03-16', 'Not Returned', 'Paid', 0),
(25, 5, 1, '2024-03-19', '2024-03-26', 'Returned', NULL, 0),
(26, 1, 4, '2024-03-19', '2024-03-25', 'Returned', NULL, 0),
(27, 5, 5, '2024-03-20', '2024-03-21', 'Returned', NULL, 0),
(28, 1, 4, '2024-03-20', '2024-03-21', 'Not Returned', NULL, 0),
(29, 1, 4, '2024-03-20', '2024-03-21', 'Returned', NULL, 0),
(30, 3, 5, '2024-03-20', '2024-03-21', 'Returned', NULL, 0),
(31, 3, 5, '2024-03-20', '2024-03-21', 'Returned', NULL, 0),
(32, 5, 18, '2024-03-20', '2024-03-21', 'Returned', NULL, 0),
(33, 5, 18, '2024-03-20', '2024-03-21', 'Returned', NULL, 0),
(34, 1, 22, '2024-03-20', '2024-03-21', 'Returned', NULL, 0),
(35, 1, 22, '2024-03-20', '2024-03-21', 'Returned', NULL, 0),
(36, 4, 17, '2024-03-20', '2024-03-27', 'Returned', NULL, 0),
(37, 4, 17, '2024-03-20', '2024-03-27', 'Returned', NULL, 0),
(38, 7, 6, '2024-03-21', '2024-03-25', 'Returned', NULL, 0),
(39, 7, 6, '2024-03-21', '2024-03-25', 'Returned', NULL, 0),
(40, 7, 10, '2024-03-21', '2024-03-25', 'Returned', NULL, 0),
(41, 7, 10, '2024-03-21', '2024-03-25', 'Returned', NULL, 0),
(44, 5, 16, '2024-03-14', '2024-03-15', 'Returned', NULL, 0),
(45, 5, 16, '2024-03-14', '2024-03-15', 'Returned', NULL, 0),
(46, 1, 1, '2024-03-15', '2024-03-19', 'Not Returned', NULL, 0),
(47, 1, 1, '2024-03-15', '2024-03-19', 'Not Returned', NULL, 0),
(48, 4, 14, '2024-03-10', '2024-03-12', 'Returned', NULL, 0),
(49, 4, 14, '2024-03-10', '2024-03-12', 'Returned', NULL, 0),
(50, 1, 1, '2024-03-12', '2024-03-15', 'Not Returned', NULL, 0),
(51, 1, 1, '2024-03-12', '2024-03-15', 'Not Returned', NULL, 0),
(52, 1, 1, '2024-03-12', '2024-03-15', 'Not Returned', NULL, 0),
(53, 1, 1, '2024-03-12', '2024-03-15', 'Not Returned', NULL, 0),
(54, 1, 1, '2024-03-12', '2024-03-15', 'Not Returned', NULL, 0),
(55, 1, 1, '2024-03-12', '2024-03-15', 'Not Returned', NULL, 0),
(56, 1, 1, '2024-03-15', '2024-03-18', 'Not Returned', NULL, 0),
(57, 1, 1, '2024-03-15', '2024-03-18', 'Not Returned', NULL, 0),
(58, 8, 15, '2024-03-16', '2024-03-18', 'Returned', NULL, 0),
(59, 8, 15, '2024-03-16', '2024-03-18', 'Not Returned', NULL, 0),
(60, 7, 9, '2024-03-10', '2024-03-12', 'Not Returned', NULL, 0),
(61, 4, 1, '2024-03-12', '2024-03-15', 'Returned', NULL, 0),
(62, 4, 1, '2024-03-12', '2024-03-15', 'Returned', NULL, 0),
(63, 1, 18, '2024-03-21', '2024-03-27', 'Not Returned', NULL, 0),
(65, 5, 7, '2024-03-12', '2024-03-15', 'Returned', NULL, 0),
(66, 5, 7, '2024-03-12', '2024-03-15', 'Not Returned', 'Paid', 0),
(67, 3, 13, '2024-03-12', '2024-03-15', 'Not Returned', NULL, 0),
(68, 3, 13, '2024-03-12', '2024-03-15', 'Not Returned', NULL, 0),
(69, 4, 37, '2024-03-12', '2024-03-18', 'Returned', NULL, 0),
(70, 4, 37, '2024-03-12', '2024-03-18', 'Not Returned', NULL, 0),
(71, 7, 20, '2024-03-22', '2024-03-24', 'Not Returned', NULL, 0),
(72, 7, 20, '2024-03-22', '2024-03-24', 'Returned', NULL, 0);

-- --------------------------------------------------------

--
-- Table structure for table `fines`
--

CREATE TABLE `fines` (
  `fine_id` int(11) NOT NULL,
  `borrow_id` int(11) DEFAULT NULL,
  `fine_amount` decimal(10,2) DEFAULT NULL,
  `paid_date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `transactions`
--

CREATE TABLE `transactions` (
  `transaction_id` int(11) NOT NULL,
  `book_id` int(11) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `transaction_date` timestamp NOT NULL DEFAULT current_timestamp(),
  `transaction_type` varchar(20) NOT NULL,
  `amount` int(11) NOT NULL,
  `status` varchar(240) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `transactions`
--

INSERT INTO `transactions` (`transaction_id`, `book_id`, `user_id`, `transaction_date`, `transaction_type`, `amount`, `status`) VALUES
(1, 1, 1, '2023-01-15 04:30:00', '', 0, 'Success'),
(4, 4, 2, '2023-02-10 03:45:00', '', 0, 'Success'),
(5, 5, 1, '2023-02-15 02:30:00', '', 0, 'Success'),
(6, 1, 1, '2024-03-18 07:48:47', '', 4, 'Success'),
(7, 6, 1, '2024-03-18 08:14:03', '', 14, 'Pending'),
(8, 1, 1, '2024-03-18 09:06:36', '', 10, 'Success'),
(9, 1, 1, '2024-03-18 09:14:35', '', 4, 'Success'),
(10, 1, 1, '2024-03-18 09:24:08', '', 4, 'Success'),
(11, 1, 1, '2024-03-18 09:26:27', '', 4, 'Success'),
(12, 1, 1, '2024-03-18 09:33:40', '', 4, 'Success'),
(13, 1, 1, '2024-03-18 09:34:55', '', 10, 'Pending'),
(14, 5, 2, '2024-03-18 09:49:57', '', 4, 'Pending'),
(15, 5, 3, '2024-03-18 09:59:42', '', 4, 'Pending'),
(16, 1, 1, '2024-03-18 10:07:49', '', 4, 'Success'),
(17, 1, 1, '2024-03-18 10:09:08', '', 4, 'Pending'),
(18, 4, 3, '2024-03-18 10:11:36', '', 4, 'Pending'),
(19, 1, 1, '2024-03-18 10:11:49', '', 4, 'Pending'),
(20, 1, 1, '2024-03-18 10:25:22', '', 0, 'Success'),
(21, 1, 1, '2024-03-18 10:25:32', '', 0, 'Success'),
(22, 1, 1, '2024-03-18 10:30:06', '', 0, 'Success'),
(23, 1, 1, '2024-03-18 10:30:14', '', 0, 'Pending'),
(24, 1, 1, '2024-03-18 10:31:40', '', 0, 'Pending'),
(25, 1, 1, '2024-03-18 10:33:25', '', 0, 'Pending'),
(26, 1, 1, '2024-03-18 11:17:29', '', 0, 'Pending'),
(27, 1, 1, '2024-03-18 11:37:17', '', 0, 'Pending'),
(28, 1, 1, '2024-03-19 05:36:14', '', 0, 'Pending'),
(29, 1, 1, '2024-03-19 05:36:19', '', 0, 'Pending'),
(30, 1, 1, '2024-03-19 05:50:05', '', 0, 'Pending'),
(31, 1, 1, '2024-03-19 05:50:14', '', 0, 'Pending'),
(32, 1, 1, '2024-03-19 05:51:54', '', 0, 'Pending'),
(33, 1, 1, '2024-03-19 05:51:54', '', 0, 'Pending'),
(34, 1, 1, '2024-03-19 06:02:17', '', 0, 'Pending'),
(35, 1, 1, '2024-03-19 06:53:54', '', 0, 'Pending'),
(36, 1, 1, '2024-03-19 06:54:01', '', 0, 'Pending'),
(37, 1, 1, '2024-03-19 06:54:05', '', 0, 'Pending'),
(38, 1, 1, '2024-03-19 06:54:09', '', 0, 'Pending'),
(39, 4, 5, '2024-03-19 07:35:44', '', 6, 'Pending'),
(40, 4, 5, '2024-03-19 07:36:26', '', 0, 'Pending'),
(41, 6, 5, '2024-03-19 07:37:13', '', 6, 'Pending'),
(42, 4, 3, '2024-03-19 07:48:08', '', 6, 'Pending'),
(43, 1, 1, '2024-03-19 07:55:39', '', 0, 'Pending'),
(44, 4, 1, '2024-03-19 07:56:09', '', 6, 'Pending'),
(45, 4, 1, '2024-03-19 07:56:26', '', 0, 'Pending'),
(46, 5, 4, '2024-03-19 07:59:57', '', 2, 'Pending'),
(47, 5, 4, '2024-03-19 08:03:11', '', 2, 'Pending'),
(48, 5, 2, '2024-03-19 08:04:50', '', 2, 'Pending'),
(49, 5, 3, '2024-03-19 08:12:26', '', 4, 'Pending'),
(50, 5, 3, '2024-03-19 08:50:15', '', 0, 'Pending'),
(51, 5, 5, '2024-03-19 09:14:56', '', 6, 'Pending'),
(52, 4, 2, '2024-03-19 09:25:46', '', 2, 'Pending'),
(53, 1, 5, '2024-03-19 09:43:44', '', 14, 'Success'),
(54, 4, 1, '2024-03-19 11:25:26', '', 12, 'Success'),
(55, 5, 5, '2024-03-20 05:25:42', '', 2, 'Success'),
(56, 4, 1, '2024-03-20 06:34:39', '', 2, NULL),
(57, 5, 3, '2024-03-20 06:36:35', '', 2, 'Success'),
(58, 18, 5, '2024-03-20 07:53:53', '', 2, 'Success'),
(59, 22, 1, '2024-03-20 07:55:32', '', 2, 'Success'),
(60, 17, 4, '2024-03-20 11:20:25', '', 14, NULL),
(61, 6, 7, '2024-03-21 08:55:44', '', 8, NULL),
(62, 10, 7, '2024-03-21 09:23:21', '', 8, NULL),
(64, 16, 5, '2024-03-21 09:35:57', '', 2, NULL),
(65, 1, 1, '2024-03-21 09:52:12', '', 8, NULL),
(66, 14, 4, '2024-03-21 09:55:38', '', 4, NULL),
(67, 1, 1, '2024-03-21 10:01:45', '', 6, NULL),
(68, 1, 1, '2024-03-21 10:03:29', '', 6, NULL),
(69, 1, 1, '2024-03-21 10:15:38', '', 6, NULL),
(70, 1, 1, '2024-03-21 10:40:54', '', 6, NULL),
(71, 15, 8, '2024-03-21 10:46:02', '', 4, NULL),
(72, 1, 4, '2024-03-21 11:02:07', '', 6, 'Success'),
(73, 18, 1, '2024-03-21 11:09:38', '', 12, NULL),
(74, 7, 5, '2024-03-21 11:14:10', '', 6, NULL),
(75, 13, 3, '2024-03-21 11:15:51', '', 6, NULL),
(76, 37, 4, '2024-03-21 11:25:26', '', 12, NULL),
(77, 20, 7, '2024-03-22 05:42:27', '', 4, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `user_type` varchar(50) DEFAULT NULL,
  `registration_date` timestamp NOT NULL DEFAULT current_timestamp(),
  `status` varchar(20) NOT NULL DEFAULT 'Active'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `username`, `password`, `name`, `email`, `user_type`, `registration_date`, `status`) VALUES
(1, 'student02', 'password1', 'John Doe', 'john.doe@example.com', 'Student', '2024-03-21 18:30:00', 'Active'),
(2, 'student2', 'password2', 'Jane Smith', 'jane.smith@example.com', 'Student', '2024-03-18 06:58:12', 'Active'),
(3, 'staff1', 'password3', 'Admin User', 'admin@example.com', 'Staff', '2024-03-18 06:58:12', 'Active'),
(4, 'Admin', '$2y$10$jkjdEXEqMyzUwEjuTa3Nu.Nm/DI71RxVZvEmkiMekp9fUpD5wU6Qm', 'Admin', 'admin@gmail.com', 'Staff', '2024-03-17 18:30:00', 'Active'),
(5, 'amri', '$2y$10$LdiQd.Qp1.lahNrcNnvmfOYy1gCvIpK0xX4oysolqPkSaFLrr0KEW', 'Amri', 'amri@gmail.com', 'Staff', '2024-03-18 18:30:00', 'Active'),
(7, 'Shanab', '$2y$10$Hitrilr7VWjALfIpPJisH.Hl1vznW32JRCRkffExTBkNk6l6fFDQq', 'Shanab', 'Shanab@mail.com', 'Student', '2024-03-20 18:30:00', 'Active'),
(8, 'Mahi', '$2y$10$hnzQ8YKJnAEqVyqRh2f.4uYTqBp7Ho3eZAaRazZdhumGTfvNjCWRe', 'Mahi', 'MSD@gmail.com', 'Student', '2024-03-20 18:30:00', 'Active');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `books`
--
ALTER TABLE `books`
  ADD PRIMARY KEY (`book_id`);

--
-- Indexes for table `book_borrow`
--
ALTER TABLE `book_borrow`
  ADD PRIMARY KEY (`borrow_id`),
  ADD KEY `book_id` (`book_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `fines`
--
ALTER TABLE `fines`
  ADD PRIMARY KEY (`fine_id`),
  ADD KEY `borrow_id` (`borrow_id`);

--
-- Indexes for table `transactions`
--
ALTER TABLE `transactions`
  ADD PRIMARY KEY (`transaction_id`),
  ADD KEY `book_id` (`book_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `books`
--
ALTER TABLE `books`
  MODIFY `book_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT for table `book_borrow`
--
ALTER TABLE `book_borrow`
  MODIFY `borrow_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=73;

--
-- AUTO_INCREMENT for table `fines`
--
ALTER TABLE `fines`
  MODIFY `fine_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `transactions`
--
ALTER TABLE `transactions`
  MODIFY `transaction_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=78;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `book_borrow`
--
ALTER TABLE `book_borrow`
  ADD CONSTRAINT `book_borrow_ibfk_2` FOREIGN KEY (`book_id`) REFERENCES `books` (`book_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `book_borrow_ibfk_3` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `fines`
--
ALTER TABLE `fines`
  ADD CONSTRAINT `fines_ibfk_1` FOREIGN KEY (`borrow_id`) REFERENCES `book_borrow` (`borrow_id`);

--
-- Constraints for table `transactions`
--
ALTER TABLE `transactions`
  ADD CONSTRAINT `transactions_ibfk_3` FOREIGN KEY (`book_id`) REFERENCES `books` (`book_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `transactions_ibfk_4` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
