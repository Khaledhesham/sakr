-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Dec 26, 2016 at 04:00 PM
-- Server version: 10.1.10-MariaDB
-- PHP Version: 5.6.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `warehouse`
--

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `CID` int(11) NOT NULL,
  `Name` varchar(100) NOT NULL,
  `Address` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`CID`, `Name`, `Address`) VALUES
(1, 'sakr', 'sakora');

-- --------------------------------------------------------

--
-- Table structure for table `customermobilenumber`
--

CREATE TABLE `customermobilenumber` (
  `CID` int(11) NOT NULL,
  `MobileNumber` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `lists`
--

CREATE TABLE `lists` (
  `OrderNumber` int(11) NOT NULL,
  `SerialNumber` int(11) NOT NULL,
  `Quantity` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `lists`
--

INSERT INTO `lists` (`OrderNumber`, `SerialNumber`, `Quantity`) VALUES
(1, 2134, 1),
(2, 2134, 1),
(3, 2134, 1),
(4, 2134, 1),
(5, 2134, 1),
(6, 2134, 1),
(7, 2134, 1),
(8, 2134, 1),
(9, 2134, 1),
(9, 3242, 1),
(10, 2134, 1),
(10, 3242, 1),
(11, 2134, 1),
(11, 3242, 1),
(13, 2134, 1),
(13, 3242, 1),
(14, 2134, 1),
(14, 3242, 1),
(15, 2134, 1),
(15, 3242, 1),
(16, 2134, 1),
(16, 3242, 1);

-- --------------------------------------------------------

--
-- Table structure for table `located_in`
--

CREATE TABLE `located_in` (
  `WarehouseN` varchar(100) NOT NULL,
  `SerialNumber` int(11) NOT NULL,
  `Count` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `located_in`
--

INSERT INTO `located_in` (`WarehouseN`, `SerialNumber`, `Count`) VALUES
('osama', 2134, 49),
('osama', 3242, 36),
('sakr', 2134, 24),
('sakr', 3242, 1);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `OrderNumber` int(11) NOT NULL,
  `Date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `CID` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`OrderNumber`, `Date`, `CID`) VALUES
(1, '2016-12-26 14:13:18', 1),
(2, '2016-12-26 14:13:52', 1),
(3, '2016-12-26 14:14:17', 1),
(4, '2016-12-26 14:17:20', 1),
(5, '2016-12-26 14:18:30', 1),
(6, '2016-12-26 14:21:50', 1),
(7, '2016-12-26 14:24:55', 1),
(8, '2016-12-26 14:26:16', 1),
(9, '2016-12-26 14:26:54', 1),
(10, '2016-12-26 14:27:59', 1),
(11, '2016-12-26 14:32:04', 1),
(12, '2016-12-26 14:37:50', 1),
(13, '2016-12-26 14:38:19', 1),
(14, '2016-12-26 14:38:55', 1),
(15, '2016-12-26 14:39:26', 1),
(16, '2016-12-26 14:40:53', 1);

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `SerialNumber` int(11) NOT NULL,
  `Name` varchar(100) DEFAULT NULL,
  `Price` int(11) NOT NULL,
  `SName` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`SerialNumber`, `Name`, `Price`, `SName`) VALUES
(2134, 'dildo', 10, 'khaled'),
(3242, 'mirna', 0, 'sha3rawy'),
(9287, 'mouse', 10, 'khaled');

-- --------------------------------------------------------

--
-- Table structure for table `salesrepres`
--

CREATE TABLE `salesrepres` (
  `S_ID` int(11) NOT NULL,
  `Name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `salesrepresmobilenumber`
--

CREATE TABLE `salesrepresmobilenumber` (
  `S_ID` int(11) NOT NULL,
  `MobileNumber` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `serves`
--

CREATE TABLE `serves` (
  `S_ID` int(11) NOT NULL,
  `CID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `supplier`
--

CREATE TABLE `supplier` (
  `Name` varchar(100) NOT NULL,
  `Address` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `supplier`
--

INSERT INTO `supplier` (`Name`, `Address`) VALUES
('khaled', 'fdsfdsfdsdfsdfsgfdgbbf'),
('sha3rawy', 'fdsdsdsfsd');

-- --------------------------------------------------------

--
-- Table structure for table `suppliermobilenumber`
--

CREATE TABLE `suppliermobilenumber` (
  `SName` varchar(100) NOT NULL,
  `MobileNumber` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `warehouse`
--

CREATE TABLE `warehouse` (
  `WarehouseName` varchar(100) NOT NULL,
  `Address` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `warehouse`
--

INSERT INTO `warehouse` (`WarehouseName`, `Address`) VALUES
('osama', 'dggdsgdsgds'),
('sakr', 'sakora midan sakr , sakr ,sakr government');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`CID`);

--
-- Indexes for table `customermobilenumber`
--
ALTER TABLE `customermobilenumber`
  ADD PRIMARY KEY (`CID`);

--
-- Indexes for table `lists`
--
ALTER TABLE `lists`
  ADD PRIMARY KEY (`OrderNumber`,`SerialNumber`),
  ADD KEY `SerialNumber` (`SerialNumber`);

--
-- Indexes for table `located_in`
--
ALTER TABLE `located_in`
  ADD PRIMARY KEY (`WarehouseN`,`SerialNumber`),
  ADD KEY `SerialNumber` (`SerialNumber`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`OrderNumber`),
  ADD KEY `CID` (`CID`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`SerialNumber`),
  ADD KEY `SName` (`SName`);

--
-- Indexes for table `salesrepres`
--
ALTER TABLE `salesrepres`
  ADD PRIMARY KEY (`S_ID`);

--
-- Indexes for table `salesrepresmobilenumber`
--
ALTER TABLE `salesrepresmobilenumber`
  ADD PRIMARY KEY (`S_ID`);

--
-- Indexes for table `serves`
--
ALTER TABLE `serves`
  ADD PRIMARY KEY (`S_ID`,`CID`),
  ADD KEY `CID` (`CID`);

--
-- Indexes for table `supplier`
--
ALTER TABLE `supplier`
  ADD PRIMARY KEY (`Name`);

--
-- Indexes for table `suppliermobilenumber`
--
ALTER TABLE `suppliermobilenumber`
  ADD PRIMARY KEY (`SName`);

--
-- Indexes for table `warehouse`
--
ALTER TABLE `warehouse`
  ADD PRIMARY KEY (`WarehouseName`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `CID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `OrderNumber` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT for table `salesrepres`
--
ALTER TABLE `salesrepres`
  MODIFY `S_ID` int(11) NOT NULL AUTO_INCREMENT;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `customermobilenumber`
--
ALTER TABLE `customermobilenumber`
  ADD CONSTRAINT `customermobilenumber_ibfk_1` FOREIGN KEY (`CID`) REFERENCES `customer` (`CID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `lists`
--
ALTER TABLE `lists`
  ADD CONSTRAINT `lists_ibfk_1` FOREIGN KEY (`OrderNumber`) REFERENCES `orders` (`OrderNumber`) ON UPDATE CASCADE,
  ADD CONSTRAINT `lists_ibfk_2` FOREIGN KEY (`SerialNumber`) REFERENCES `product` (`SerialNumber`) ON UPDATE CASCADE;

--
-- Constraints for table `located_in`
--
ALTER TABLE `located_in`
  ADD CONSTRAINT `located_in_ibfk_1` FOREIGN KEY (`WarehouseN`) REFERENCES `warehouse` (`WarehouseName`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `located_in_ibfk_2` FOREIGN KEY (`SerialNumber`) REFERENCES `product` (`SerialNumber`) ON UPDATE CASCADE;

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`CID`) REFERENCES `customer` (`CID`) ON UPDATE CASCADE;

--
-- Constraints for table `product`
--
ALTER TABLE `product`
  ADD CONSTRAINT `product_ibfk_1` FOREIGN KEY (`SName`) REFERENCES `supplier` (`Name`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Constraints for table `salesrepresmobilenumber`
--
ALTER TABLE `salesrepresmobilenumber`
  ADD CONSTRAINT `salesrepresmobilenumber_ibfk_1` FOREIGN KEY (`S_ID`) REFERENCES `salesrepres` (`S_ID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `serves`
--
ALTER TABLE `serves`
  ADD CONSTRAINT `serves_ibfk_1` FOREIGN KEY (`S_ID`) REFERENCES `salesrepres` (`S_ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `serves_ibfk_2` FOREIGN KEY (`CID`) REFERENCES `customer` (`CID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `suppliermobilenumber`
--
ALTER TABLE `suppliermobilenumber`
  ADD CONSTRAINT `suppliermobilenumber_ibfk_1` FOREIGN KEY (`SName`) REFERENCES `supplier` (`Name`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
