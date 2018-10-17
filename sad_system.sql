-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 17, 2018 at 07:11 PM
-- Server version: 10.1.35-MariaDB
-- PHP Version: 7.2.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sad_system`
--

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `product_id` int(11) NOT NULL,
  `product_name` varchar(16) NOT NULL,
  `product_price` int(11) NOT NULL,
  `product_quanity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`product_id`, `product_name`, `product_price`, `product_quanity`) VALUES
(1, 'Dove(shampoo)', 7, 0),
(2, 'Palmolive', 7, 10),
(3, 'Cream Silk', 7, 10),
(4, 'Dove(conditioner', 7, 10),
(5, 'Tanuday(jr))', 40, 10),
(6, 'Tanduay(sr))', 55, 10),
(7, 'Tanduay(long nec', 110, 10),
(8, 'item1', 1, 10),
(9, 'item2', 2, 10),
(10, 'item3', 3, 10),
(11, 'item4', 4, 10),
(12, 'item5', 5, 10),
(13, 'item6', 6, 10),
(14, 'item7', 7, 10),
(15, 'item8', 8, 10),
(16, 'item9', 9, 10),
(17, 'item10', 10, 10),
(18, 'item11', 11, 10),
(19, 'item12', 12, 10);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `name` varchar(36) NOT NULL,
  `username` varchar(36) NOT NULL,
  `password` varchar(36) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `name`, `username`, `password`) VALUES
(8, 'wendale', 'wendale1231', 'gabriella143'),
(9, 'albert', 'gg', 'sad'),
(10, 'otin', 'otin', 'dako'),
(11, 'toyi', 'awaw', '123'),
(12, 'wendale oten', 'neto', 'eton'),
(13, 'halfbyte', 'admin', 'admin'),
(14, 'zarrah mae violanda', 'zarrahmae', 'zarrahmae'),
(15, 'Name', '123', '123');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`product_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
COMMIT;

CREATE TABLE `order` (
  `order_id` INT NOT NULL,
  `order_quantity` INT NOT NULL,
  `order_date` INT NOT NULL,
  `order_status` TINYINT(1) NOT NULL,
  `evaluated_by` INT NOT NULL,
  `user_id` INT NOT NULL,
  `product_id` INT NOT NULL,
  PRIMARY KEY (`order_id`),
  INDEX `fk_order_users_idx` (`user_id` ASC),
  INDEX `fk_order_products1_idx` (`product_id` ASC),
  CONSTRAINT `fk_order_users`
    FOREIGN KEY (`user_id`)
    REFERENCES `sad_system`.`users` (`user_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_order_products1`
    FOREIGN KEY (`product_id`)
    REFERENCES `sad_system`.`products` (`product_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
