-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jun 18, 2017 at 09:31 PM
-- Server version: 5.6.17
-- PHP Version: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `rogalit`
--

-- --------------------------------------------------------

--
-- Table structure for table `clients`
--

CREATE TABLE IF NOT EXISTS `clients` (
  `username` varchar(100) NOT NULL,
  `ID` int(11) NOT NULL,
  `fname` varchar(100) NOT NULL,
  `lname` varchar(100) NOT NULL,
  `mail` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `city` varchar(100) NOT NULL,
  `street` varchar(100) NOT NULL,
  `birthdate` date NOT NULL,
  `phoneStart` int(11) NOT NULL,
  `phoneNumber` int(11) NOT NULL,
  `advertasing` varchar(11) NOT NULL,
  `gender` varchar(11) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=hebrew;

--
-- Dumping data for table `clients`
--

INSERT INTO `clients` (`username`, `ID`, `fname`, `lname`, `mail`, `password`, `city`, `street`, `birthdate`, `phoneStart`, `phoneNumber`, `advertasing`, `gender`) VALUES
('elinor', 100100100, 'elinor', 'elinor', 'eli@gmail.com', '345345', 'beer sheva', 'avino', '1990-06-13', 53, 2342113, 'off', 'female'),
('hadar', 203954300, 'hadar', 'lackritz', 'hadar.lack@gmail.com', 'HADAR2005', 'beer-sheva', 'susu', '1991-05-20', 52, 3622168, 'off', 'female'),
('jaimy10', 302916408, 'Jaimy', 'fuss', 'jaimy1010@gmail.com', '12345', 'carmiel', 'tavor', '1990-06-18', 54, 7323939, 'off', 'male'),
('shahar', 305340887, 'shahar', 'gad', 'shahargad224@gmail.com', 'shu224Sh', 'beer sheva', 'kadesh', '1991-07-05', 52, 6805846, 'on', 'female'),
('inbalyos', 305624595, 'inbal', 'yossovich', 'inbal317@gmail.com', '123123', 'beer sheva', 'rager', '1991-06-28', 52, 6805888, 'on', 'female');

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

CREATE TABLE IF NOT EXISTS `contact` (
  `fname` varchar(50) NOT NULL,
  `phone` varchar(50) NOT NULL,
  `textarea1` varchar(225) NOT NULL,
  PRIMARY KEY (`fname`)
) ENGINE=InnoDB DEFAULT CHARSET=hebrew;

--
-- Dumping data for table `contact`
--

INSERT INTO `contact` (`fname`, `phone`, `textarea1`) VALUES
('ohad', '0522496749', 'i would like to order tour, please call mw back'),
('omer', '0506311455', 'hi please call me back');

-- --------------------------------------------------------

--
-- Table structure for table `creditcards`
--

CREATE TABLE IF NOT EXISTS `creditcards` (
  `customerID` int(11) NOT NULL,
  `number` varchar(50) NOT NULL,
  `type` varchar(50) NOT NULL,
  `month` int(11) NOT NULL,
  `year` int(11) NOT NULL,
  PRIMARY KEY (`customerID`,`number`)
) ENGINE=InnoDB DEFAULT CHARSET=hebrew;

--
-- Dumping data for table `creditcards`
--

INSERT INTO `creditcards` (`customerID`, `number`, `type`, `month`, `year`) VALUES
(302916408, '0', 'mastercard', 1, 2018),
(305340887, '2222222222222222', 'mastercard', 1, 2018),
(305340887, '2222333344445555', 'visa', 2, 2018);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE IF NOT EXISTS `orders` (
  `orderID` int(11) NOT NULL,
  `userID` int(11) NOT NULL,
  `orderDate` date NOT NULL,
  `totalPrice` int(11) NOT NULL,
  PRIMARY KEY (`orderID`),
  KEY `userID` (`userID`)
) ENGINE=InnoDB DEFAULT CHARSET=hebrew;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`orderID`, `userID`, `orderDate`, `totalPrice`) VALUES
(1, 302916408, '2017-06-15', 297),
(2, 305340887, '2017-06-12', 215),
(4, 305340887, '2017-06-18', 198),
(5, 305340887, '2017-06-18', 99),
(6, 305340887, '2017-06-18', 99),
(7, 305340887, '2017-06-18', 99),
(8, 305340887, '2017-07-02', 99),
(9, 302916408, '2017-06-18', 30);

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE IF NOT EXISTS `products` (
  `ID` int(50) NOT NULL,
  `name` varchar(100) NOT NULL,
  `price` int(20) NOT NULL,
  `productInfo` varchar(225) NOT NULL,
  `image` varchar(100) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=hebrew;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`ID`, `name`, `price`, `productInfo`, `image`) VALUES
(111, 'חבילה מפנקת 1', 99, 'בחבילה זו ניתן למצוא שני בקבוקי יין אדום מפנקים מבית רוגלית.', 'media\\product1.jpg'),
(222, 'חבילה מפנקת 2', 81, 'בחבילה זו מגוון עשיר של שוקולדים, בנוסף בקבוק יין אדום מעולה.', 'media\\product2.jpg'),
(333, 'חבילת פקקים', 35, 'בחבילה זו תמצאו 5 פקקים רב פעמיים לבקבוקי היין. לסגירה נוחה ושימוש רב פעמי.', 'media\\product3.jpg'),
(444, 'כוס יין', 13, 'ניתן לרכוש כוסות יין איכותיות ביחידות בודדות.', 'media\\product4.jpg'),
(555, 'סלסילת ענבים איכותית', 22, 'ניתן לרכוש סלסילת ענבי רוגלית טעימים ומומלצים.', 'media\\product5.jpg'),
(666, 'סט יינות משובחים', 480, 'מזמינים אורחים לאירוע ובא לכם לפנק אותם ביינות המשובחים ביותר מבלי שייגמר? זו החבילה בשבילכם!', 'media\\product6.jpg'),
(777, 'מסגרת לתמונה', 24, 'מסגרת מעוצבת במיוחד לחובבי היין שבנינו.', 'media\\product7.jpg'),
(888, 'החבילה המתוקה', 101, 'סט שוקולדים משכרים ומעוצבים בניחוח יין.', 'media\\product8.jpg'),
(999, 'פותחן יינות משוכלל', 65, 'אקדח המשמש לפתיחת בקבוק יין בצורה נוחה וקלילה.', 'media\\product9.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `productsinorder`
--

CREATE TABLE IF NOT EXISTS `productsinorder` (
  `orderID` int(11) NOT NULL,
  `productNumber` int(50) NOT NULL,
  `amount` int(11) NOT NULL,
  PRIMARY KEY (`orderID`,`productNumber`),
  KEY `FK_3` (`productNumber`)
) ENGINE=InnoDB DEFAULT CHARSET=hebrew;

--
-- Dumping data for table `productsinorder`
--

INSERT INTO `productsinorder` (`orderID`, `productNumber`, `amount`) VALUES
(1, 111, 3),
(2, 111, 1),
(2, 222, 1),
(2, 333, 1),
(5, 111, 1),
(6, 111, 1),
(7, 111, 1),
(8, 111, 1);

-- --------------------------------------------------------

--
-- Table structure for table `toursinorder`
--

CREATE TABLE IF NOT EXISTS `toursinorder` (
  `tourNumber` int(100) NOT NULL,
  `clientsID` int(20) NOT NULL,
  `date` date NOT NULL,
  `NumberOfParticipate` int(11) NOT NULL,
  `privateT` tinyint(1) NOT NULL,
  PRIMARY KEY (`tourNumber`),
  KEY `clientsID` (`clientsID`)
) ENGINE=InnoDB DEFAULT CHARSET=hebrew;

--
-- Dumping data for table `toursinorder`
--

INSERT INTO `toursinorder` (`tourNumber`, `clientsID`, `date`, `NumberOfParticipate`, `privateT`) VALUES
(100, 203954300, '2017-06-01', 2, 1),
(101, 302916408, '2017-06-28', 1, 0);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `FK_1` FOREIGN KEY (`userID`) REFERENCES `clients` (`ID`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `productsinorder`
--
ALTER TABLE `productsinorder`
  ADD CONSTRAINT `FK_2` FOREIGN KEY (`orderID`) REFERENCES `orders` (`orderID`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `FK_3` FOREIGN KEY (`productNumber`) REFERENCES `products` (`ID`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `toursinorder`
--
ALTER TABLE `toursinorder`
  ADD CONSTRAINT `FK_4` FOREIGN KEY (`clientsID`) REFERENCES `clients` (`ID`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
