-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 08, 2024 at 10:39 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `database`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `a_id` int(11) NOT NULL,
  `a_uname` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `a_email` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `a_password` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `card_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `comment`
--

CREATE TABLE `comment` (
  `comment_id` int(11) NOT NULL,
  `item_id` int(11) NOT NULL,
  `description` varchar(500) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `rate` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `items`
--

CREATE TABLE `items` (
  `i_id` int(11) NOT NULL,
  `i_name` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `i_description` varchar(500) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `price` float NOT NULL,
  `image` varchar(200) NOT NULL,
  `rate` int(11) NOT NULL,
  `ammount` int(11) NOT NULL,
  `offer` int(11) NOT NULL,
  `catagory_name` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `items`
--

INSERT INTO `items` (`i_id`, `i_name`, `i_description`, `price`, `image`, `rate`, `ammount`, `offer`, `catagory_name`) VALUES
(1, 'first product', 'this first item descrition', 100, '../images/6.jpg', 0, 10, 0, 'electronics'),
(2, 'second product', 'this is the second product', 200, '../images/06-22-465.jpg', 0, 5, 0, 'electronics'),
(4, 'fourth product', 'this fourth product description', 300, '../images/05-40-482.jpg', 0, 30, 0, 'food'),
(5, 'صيص بجنيه', 'dfdf', 1, '../imagesWhatsApp Image 2024-05-08 at 22.54.20_88178834.jpg', 0, 20, 20, 'animals'),
(6, 'product 4', 'rgfhddfgh', 100, '../images05-38-023.jpg', 0, 30, 0, 'food'),
(7, 'وز صغير', 'woz sgher', 10, '../imageswoz.jpg', 0, 30, 0, 'animals');

-- --------------------------------------------------------

--
-- Table structure for table `order_history`
--

CREATE TABLE `order_history` (
  `user_id` int(11) NOT NULL,
  `item_id` int(11) DEFAULT NULL,
  `price` float NOT NULL,
  `quantity` int(11) NOT NULL,
  `shopping_date` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `ID` int(11) NOT NULL,
  `first_name` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `last_name` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `username` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `email` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `password` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `phone` int(11) NOT NULL,
  `address` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `role` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`ID`, `first_name`, `last_name`, `username`, `email`, `password`, `phone`, `address`, `role`) VALUES
(1, 'ابو', 'ربيع', 'abo rabe3', 'abo@gmail.com', '1234', 1010101010, '50abo rbe3 street', 'customer');

-- --------------------------------------------------------

--
-- Table structure for table `user_make_comment`
--

CREATE TABLE `user_make_comment` (
  `user_id` int(11) NOT NULL,
  `comment_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `user_oreder_items`
--

CREATE TABLE `user_oreder_items` (
  `user_id` int(11) NOT NULL,
  `item_id` int(11) NOT NULL,
  `amount` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `user_sell_items`
--

CREATE TABLE `user_sell_items` (
  `user_id` int(11) NOT NULL,
  `item_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`a_id`);

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`card_id`) USING BTREE,
  ADD KEY `cart_user` (`user_id`) USING BTREE;

--
-- Indexes for table `comment`
--
ALTER TABLE `comment`
  ADD PRIMARY KEY (`comment_id`,`item_id`) USING BTREE,
  ADD UNIQUE KEY `item_id` (`item_id`);

--
-- Indexes for table `items`
--
ALTER TABLE `items`
  ADD PRIMARY KEY (`i_id`);

--
-- Indexes for table `order_history`
--
ALTER TABLE `order_history`
  ADD UNIQUE KEY `user_id` (`user_id`,`item_id`) USING BTREE,
  ADD KEY `item_orderd_history` (`item_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`ID`),
  ADD UNIQUE KEY `ID` (`ID`);

--
-- Indexes for table `user_make_comment`
--
ALTER TABLE `user_make_comment`
  ADD UNIQUE KEY `user_id` (`user_id`),
  ADD UNIQUE KEY `comment_id` (`comment_id`);

--
-- Indexes for table `user_oreder_items`
--
ALTER TABLE `user_oreder_items`
  ADD UNIQUE KEY `user_id` (`user_id`,`item_id`),
  ADD KEY `item_id` (`item_id`);

--
-- Indexes for table `user_sell_items`
--
ALTER TABLE `user_sell_items`
  ADD UNIQUE KEY `user_id` (`user_id`,`item_id`),
  ADD KEY `item_id` (`item_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `a_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `card_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `comment`
--
ALTER TABLE `comment`
  MODIFY `comment_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `items`
--
ALTER TABLE `items`
  MODIFY `i_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `cart`
--
ALTER TABLE `cart`
  ADD CONSTRAINT `cart_user` FOREIGN KEY (`user_id`) REFERENCES `user` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `comment`
--
ALTER TABLE `comment`
  ADD CONSTRAINT `item_comment` FOREIGN KEY (`item_id`) REFERENCES `items` (`i_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `order_history`
--
ALTER TABLE `order_history`
  ADD CONSTRAINT `item_orderd_history` FOREIGN KEY (`item_id`) REFERENCES `items` (`i_id`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `user_order_history` FOREIGN KEY (`user_id`) REFERENCES `user` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `user_make_comment`
--
ALTER TABLE `user_make_comment`
  ADD CONSTRAINT `comment_id` FOREIGN KEY (`comment_id`) REFERENCES `comment` (`comment_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `user_id` FOREIGN KEY (`user_id`) REFERENCES `user` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `user_oreder_items`
--
ALTER TABLE `user_oreder_items`
  ADD CONSTRAINT `item_id` FOREIGN KEY (`item_id`) REFERENCES `items` (`i_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `user_iid` FOREIGN KEY (`user_id`) REFERENCES `user` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `user_sell_items`
--
ALTER TABLE `user_sell_items`
  ADD CONSTRAINT `user_sell_items_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `user_sell_items_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `admin` (`a_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `user_sell_items_ibfk_3` FOREIGN KEY (`item_id`) REFERENCES `items` (`i_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
