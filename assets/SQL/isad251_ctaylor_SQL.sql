-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: proj-mysql.uopnet.plymouth.ac.uk
-- Generation Time: Jan 09, 2020 at 08:31 PM
-- Server version: 8.0.16
-- PHP Version: 7.2.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `isad251_ctaylor`
--

DELIMITER $$
--
-- Procedures
--
CREATE DEFINER=`ISAD251_CTaylor`@`%` PROCEDURE `AddProduct` (IN `Name` VARCHAR(255), IN `Description` VARCHAR(255), IN `Price` DECIMAL(5,2), IN `Category` VARCHAR(255))  NO SQL
BEGIN
	INSERT INTO items (it_Name, it_Description, it_Price, it_Catagory)
    VALUES (Name, Description, Price, Category);
END$$

CREATE DEFINER=`ISAD251_CTaylor`@`%` PROCEDURE `CreateOrder` (IN `TableNo` INT(11), IN `Total` DECIMAL(5,2))  BEGIN
	INSERT INTO orders (od_TableNo, od_Total) 
	VALUES (TableNo, Total);
END$$

CREATE DEFINER=`ISAD251_CTaylor`@`%` PROCEDURE `DisplayOrderLine` (IN `OrderID` INT)  NO SQL
BEGIN
	SELECT * FROM orderline
    WHERE od_ID = OrderID;
END$$

CREATE DEFINER=`ISAD251_CTaylor`@`%` PROCEDURE `displayOrders` (IN `TableNo` INT)  NO SQL
BEGIN
	SELECT * FROM orders
    WHERE od_Table = TableNo;
END$$

CREATE DEFINER=`ISAD251_CTaylor`@`%` PROCEDURE `EditItem` (IN `Item` INT, IN `Name` VARCHAR(255), IN `Description` VARCHAR(255), IN `Price` DECIMAL(5,2), IN `Category` VARCHAR(255))  NO SQL
BEGIN
	UPDATE items
    SET it_Name = Name, it_Description = Description, it_Price = Price, 			it_Catagory = Category
    WHERE it_ID = Item;
END$$

CREATE DEFINER=`ISAD251_CTaylor`@`%` PROCEDURE `findItem` (IN `itemID` INT)  BEGIN
	SELECT * FROM items WHERE it_ID = itemID;
END$$

CREATE DEFINER=`ISAD251_CTaylor`@`%` PROCEDURE `findOrder` (IN `Total` DECIMAL(5,2), IN `TableNo` INT)  BEGIN
	SELECT od_ID 
	FROM orders 
	WHERE (od_total = Total AND od_TableNo = TableNo)
    LIMIT 1;
    END$$

CREATE DEFINER=`ISAD251_CTaylor`@`%` PROCEDURE `GetOrderTotal` (IN `orderNo` INT)  NO SQL
BEGIN
	SELECT od_Total from orders
    WHERE od_ID = orderNo;
END$$

CREATE DEFINER=`ISAD251_CTaylor`@`%` PROCEDURE `OrderLine` (IN `ThisOrder` INT, IN `Item` INT, IN `Quantity` INT)  BEGIN
	INSERT INTO orderline (od_ID, it_ID, ol_Quantity)
	VALUES (ThisOrder, Item, Quantity);
END$$

CREATE DEFINER=`ISAD251_CTaylor`@`%` PROCEDURE `ordersView` (IN `orderNo` INT)  BEGIN
	SELECT * 
	FROM orderline
	WHERE od_ID = orderNo;
END$$

CREATE DEFINER=`ISAD251_CTaylor`@`%` PROCEDURE `RemoveItem` (IN `Item` INT)  NO SQL
BEGIN
	DELETE FROM items WHERE it_ID = Item;
END$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `items`
--

CREATE TABLE `items` (
  `it_ID` int(11) NOT NULL,
  `it_Name` varchar(255) NOT NULL,
  `it_Description` varchar(255) NOT NULL,
  `it_Price` decimal(5,2) NOT NULL,
  `it_Catagory` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `orderline`
--

CREATE TABLE `orderline` (
  `ol_ID` int(11) NOT NULL,
  `od_ID` int(11) NOT NULL,
  `it_ID` int(11) NOT NULL,
  `ol_Quantity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `od_ID` int(11) NOT NULL,
  `od_TableNo` int(11) NOT NULL,
  `od_Total` decimal(5,2) NOT NULL,
  `od_Email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `items`
--
ALTER TABLE `items`
  ADD PRIMARY KEY (`it_ID`);

--
-- Indexes for table `orderline`
--
ALTER TABLE `orderline`
  ADD PRIMARY KEY (`ol_ID`),
  ADD KEY `it_ID` (`it_ID`),
  ADD KEY `od_ID` (`od_ID`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`od_ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `items`
--
ALTER TABLE `items`
  MODIFY `it_ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `orderline`
--
ALTER TABLE `orderline`
  MODIFY `ol_ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `od_ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `orderline`
--
ALTER TABLE `orderline`
  ADD CONSTRAINT `orderline_ibfk_1` FOREIGN KEY (`it_ID`) REFERENCES `items` (`it_ID`),
  ADD CONSTRAINT `orderline_ibfk_2` FOREIGN KEY (`od_ID`) REFERENCES `orders` (`od_ID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
