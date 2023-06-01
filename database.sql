-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 01, 2023 at 11:35 PM
-- Server version: 5.7.17
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
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
-- Table structure for table `tbl_crust`
--

CREATE TABLE `tbl_crust` (
  `crust_id` int(11) NOT NULL,
  `crust_name` varchar(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_crust`
--

INSERT INTO `tbl_crust` (`crust_id`, `crust_name`) VALUES
(1, 'Thin'),
(2, 'Classic'),
(3, 'Thick');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_customer`
--

CREATE TABLE `tbl_customer` (
  `customer_id` int(11) NOT NULL,
  `customer_email` varchar(30) NOT NULL,
  `customer_username` varchar(20) NOT NULL,
  `customer_password` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_customer`
--

INSERT INTO `tbl_customer` (`customer_id`, `customer_email`, `customer_username`, `customer_password`) VALUES
(2, 'admin@admin.com', 'admin', '$2y$10$rqO5r9ryWDpaDKisbSEONu3mmoL4snnMOU7Ty9ybQxTLc3VMlUKc2');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_order`
--

CREATE TABLE `tbl_order` (
  `order_id` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `pizza_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_order`
--

INSERT INTO `tbl_order` (`order_id`, `customer_id`, `pizza_id`) VALUES
(1, 2, 1),
(2, 2, 2),
(3, 2, 2),
(4, 2, 3),
(5, 2, 4),
(6, 2, 3),
(7, 2, 6),
(8, 2, 7),
(9, 2, 3),
(10, 2, 9),
(11, 2, 4),
(12, 2, 11),
(13, 2, 12);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_pizza`
--

CREATE TABLE `tbl_pizza` (
  `pizza_id` int(11) NOT NULL,
  `size_id` int(11) NOT NULL,
  `crust_id` int(11) NOT NULL,
  `sauce_name` varchar(256) NOT NULL,
  `topping_name` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_pizza`
--

INSERT INTO `tbl_pizza` (`pizza_id`, `size_id`, `crust_id`, `sauce_name`, `topping_name`) VALUES
(1, 1, 1, 'Barbecue GarlicHerb', 'Bacon'),
(2, 3, 2, 'Tomato Pesto', 'greenPeppers mushrooms olives onion tomato'),
(3, 3, 2, 'Tomato Barbecue', 'bacon greenPeppers mushrooms onion'),
(4, 3, 2, 'Tomato GarlicHerb', 'greenPeppers pepperoni tomato'),
(5, 3, 2, 'Tomato Barbecue', 'bacon greenPeppers mushrooms onion'),
(6, 2, 2, 'Barbecue Pesto', 'bacon'),
(7, 2, 1, 'Pesto', 'Mushrooms'),
(8, 3, 2, 'Tomato Barbecue', 'bacon greenPeppers mushrooms onion'),
(9, 1, 3, 'Barbecue GarlicHerb', 'Bacon'),
(10, 3, 2, 'Tomato GarlicHerb', 'greenPeppers pepperoni tomato'),
(11, 1, 2, 'Pesto', 'Bacon'),
(12, 2, 3, 'Barbecue', '');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_sauce`
--

CREATE TABLE `tbl_sauce` (
  `sauce_name` varchar(15) NOT NULL,
  `sauce_price` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_sauce`
--

INSERT INTO `tbl_sauce` (`sauce_name`, `sauce_price`) VALUES
('Barbecue', 5),
('GarlicHerb', 5.5),
('Pesto', 6),
('Tomato', 4.5);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_size`
--

CREATE TABLE `tbl_size` (
  `size_id` int(11) NOT NULL,
  `size_name` varchar(12) NOT NULL,
  `size_price` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_size`
--

INSERT INTO `tbl_size` (`size_id`, `size_name`, `size_price`) VALUES
(1, 'Small', 6),
(2, 'Medium', 10),
(3, 'Large', 12);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_topping`
--

CREATE TABLE `tbl_topping` (
  `topping_name` varchar(20) NOT NULL,
  `topping_price` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_topping`
--

INSERT INTO `tbl_topping` (`topping_name`, `topping_price`) VALUES
('Bacon', 6),
('Green Peppers', 3),
('Jalapenos', 5),
('Mushrooms', 3),
('Olives', 4),
('Onions', 3),
('Pepperoni', 6),
('Tomatoes', 3);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_crust`
--
ALTER TABLE `tbl_crust`
  ADD PRIMARY KEY (`crust_id`);

--
-- Indexes for table `tbl_customer`
--
ALTER TABLE `tbl_customer`
  ADD PRIMARY KEY (`customer_id`),
  ADD KEY `customer_id` (`customer_id`);

--
-- Indexes for table `tbl_order`
--
ALTER TABLE `tbl_order`
  ADD PRIMARY KEY (`order_id`),
  ADD KEY `customer_id` (`customer_id`),
  ADD KEY `customer_id_2` (`customer_id`),
  ADD KEY `pizza_id` (`pizza_id`);

--
-- Indexes for table `tbl_pizza`
--
ALTER TABLE `tbl_pizza`
  ADD PRIMARY KEY (`pizza_id`),
  ADD KEY `size_name` (`size_id`,`crust_id`),
  ADD KEY `crust_id` (`crust_id`);

--
-- Indexes for table `tbl_sauce`
--
ALTER TABLE `tbl_sauce`
  ADD PRIMARY KEY (`sauce_name`);

--
-- Indexes for table `tbl_size`
--
ALTER TABLE `tbl_size`
  ADD PRIMARY KEY (`size_id`);

--
-- Indexes for table `tbl_topping`
--
ALTER TABLE `tbl_topping`
  ADD PRIMARY KEY (`topping_name`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_customer`
--
ALTER TABLE `tbl_customer`
  MODIFY `customer_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `tbl_order`
--
ALTER TABLE `tbl_order`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `tbl_pizza`
--
ALTER TABLE `tbl_pizza`
  MODIFY `pizza_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `tbl_size`
--
ALTER TABLE `tbl_size`
  MODIFY `size_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `tbl_order`
--
ALTER TABLE `tbl_order`
  ADD CONSTRAINT `tbl_order_ibfk_2` FOREIGN KEY (`customer_id`) REFERENCES `tbl_customer` (`customer_id`),
  ADD CONSTRAINT `tbl_order_ibfk_3` FOREIGN KEY (`pizza_id`) REFERENCES `tbl_pizza` (`pizza_id`);

--
-- Constraints for table `tbl_pizza`
--
ALTER TABLE `tbl_pizza`
  ADD CONSTRAINT `tbl_pizza_ibfk_2` FOREIGN KEY (`crust_id`) REFERENCES `tbl_crust` (`crust_id`),
  ADD CONSTRAINT `tbl_pizza_ibfk_3` FOREIGN KEY (`size_id`) REFERENCES `tbl_size` (`size_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
