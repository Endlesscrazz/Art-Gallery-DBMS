-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Nov 02, 2017 at 09:30 PM
-- Server version: 10.1.16-MariaDB
-- PHP Version: 5.6.24

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `online_art_gallery_database_final`
--

-- --------------------------------------------------------

--
-- Table structure for table `art_work`
--

CREATE TABLE `art_work` (
  `ART_ID` int(11) NOT NULL,
  `USER_ID` int(11) NOT NULL,
  `ART_TITLE` varchar(50) NOT NULL,
  `ART_DESCRIPTION` mediumtext,
  `ART_PRICE` int(11) NOT NULL,
  `ART_DATE` date NOT NULL,
  `ART_WIDTH` int(11) NOT NULL,
  `ART_HEIGHT` int(11) NOT NULL,
  `ART_THICKNESS` int(11) NOT NULL,
  `ART_CATEGORY` varchar(20) NOT NULL,
  `ART_MEDIA` varchar(20) NOT NULL,
  `ART_STATUS` varchar(20) NOT NULL,
  `art_stock` int(50) NOT NULL,
  `COMMENT_ID` int(11) DEFAULT NULL,
  `ART_IMAGEPATH` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `art_work`
--

INSERT INTO `art_work` (`ART_ID`, `USER_ID`, `ART_TITLE`, `ART_DESCRIPTION`, `ART_PRICE`, `ART_DATE`, `ART_WIDTH`, `ART_HEIGHT`, `ART_THICKNESS`, `ART_CATEGORY`, `ART_MEDIA`, `ART_STATUS`, `art_stock`, `COMMENT_ID`, `ART_IMAGEPATH`) VALUES
(11, 1, 'Horse', 'Dancing horse', 100000, '2017-03-20', 50, 50, 1, 'Drawing', 'Painting', 'SOLD', 1, 1, 'horse_hussain.jpg'),
(12, 1, 'Ganapati', 'Lord Ganapati', 102000, '2017-03-20', 10, 10, 10, 'Painting', 'Oil', 'AVAILABLE', 2, NULL, 'ganapati_hussain.jpg'),
(13, 1, 'Mother Teresa', 'Trinity of Teresa', 103000, '2017-03-20', 10, 10, 10, 'Painting', 'Airbrush', 'AVAILABLE', 3, NULL, 'mother-teresa.jpg'),

(21, 2, 'Birdcage', 'Birdcage', 100000, '2017-03-20', 50, 50, 1, 'Drawing', 'Watercolor', 'SOLD', 1, 2, 'birdcage_quinghan.jpg'),
(22, 2, 'Beautiful', 'beautiful bizarre', 102000, '2017-03-20', 10, 10, 10, 'Painting', 'Watercolor', 'AVAILABLE', 2, NULL, 'beautiful_qiunghan.jpg'),
(23, 2, 'Orange', 'Girl and Orange', 103000, '2017-03-20', 10, 10, 10, 'Painting', 'Digital', 'AVAILABLE', 3, NULL, 'orange_quinghan.jpg'),

(31, 3, 'Kerala Lady', 'Kerala Lady', 100000, '2017-03-20', 50, 50, 1, 'Painting', 'Painting', 'SOLD', 1, NULL, 'keralalady_rrv.jpg'),
(32, 3, 'Tamil Lady', 'Tamil Lady', 102000, '2017-03-20', 10, 10, 10, 'Painting', 'Oil', 'AVAILABLE', 2, NULL, 'greenlady_rrv.jpg'),
(33, 3, 'Swan', 'Swan', 103000, '2017-03-20', 10, 10, 10, 'Painting', 'Oil', 'AVAILABLE', 3, NULL, 'swan_rrv.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `buy_transaction`
--

CREATE TABLE `buy_transaction` (
  `TRANSACTION_ID` int(11) NOT NULL,
  `USER_ID` int(11) NOT NULL,
  `ART_ID` int(11) NOT NULL,
  `Courier_Name` varchar(50) NOT NULL,
  `Courier_Contact` bigint(20) NOT NULL,
  `ordered_date` date NOT NULL,
  `DELIVERY_DATE` date DEFAULT NULL,
  `ordered_no` int(10) NOT NULL,
  `total_price` int(50) NOT NULL,
  `shipping_area` varchar(50) NOT NULL,
  `shipping_municipal` varchar(50) NOT NULL,
  `shipping_province` varchar(50) NOT NULL,
  `shipping_zipcode` varchar(10) NOT NULL,
  `shipping_brgy` varchar(50) NOT NULL,
  `shipping_street` varchar(50) NOT NULL,
  `shipping_house_num` varchar(50) NOT NULL,
  `SHIPPING_STATUS` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `buy_transaction`
--

INSERT INTO `buy_transaction` (`TRANSACTION_ID`, `USER_ID`, `ART_ID`, `Courier_Name`, `Courier_Contact`, `ordered_date`, `DELIVERY_DATE`, `ordered_no`, `total_price`, `shipping_area`, 

`shipping_municipal`, `shipping_province`, `shipping_zipcode`, `shipping_brgy`, `shipping_street`, `shipping_house_num`, `SHIPPING_STATUS`) VALUES
(1001, 102, 13, 'Paintingdel', 9475293353, '2017-03-25', '2017-03-25', 1, 200000, 'Mumbai', 'Mumbai', 'Maharashtra', '421501', 'Chowk', 'Jawahar Street', '218', 'Delivered'),
(1002, 103, 21, 'Paintingdel', 9475293354, '2017-03-26', '2017-04-26', 1, 202000, 'Hyderabad', 'Hyderabad', 'Andhra', '421603', 'Chowk', 'Nizam Street', '317', 'Delivered'),

(1003, 101, 13, 'Paintingdel', 9475293753, '2017-03-30', '2017-03-30', 1, 200000, 'Mumbai', 'Mumbai', 'Maharashtra', '421501', 'Chowk', 'Gandhi Street', '219', 'Processing'),
(1004, 104, 21, 'Paintingdel', 9475293384, '2017-03-22', '2017-04-22', 1, 205000, 'Hyderabad', 'Hyderabad', 'Andhra', '421603', 'Chowk', 'Nizam Street', '367', 'Delivered');

-- --------------------------------------------------------

--
-- Table structure for table `comment`
--

CREATE TABLE `comment` (
  `COMMENT_ID` int(11) NOT NULL,
  `USER_ID` int(11) NOT NULL,
  `ART_ID` int(11) NOT NULL,
  `COMMENT_DATE` date NOT NULL,
  `COMMENT_CONTENT` mediumtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `comment`
--

INSERT INTO `comment` (`COMMENT_ID`, `USER_ID`, `ART_ID`, `COMMENT_DATE`, `COMMENT_CONTENT`) VALUES
(1, 1, 11, '2017-03-21', 'amazing'),
(2, 2, 21, '2017-09-10', 'profound\r\n');

-- --------------------------------------------------------

--
-- Table structure for table `rating`
--

CREATE TABLE `rating` (
  `RATING_ID` int(11) NOT NULL,
  `USER_ID` int(11) NOT NULL,
  `ART_ID` int(11) NOT NULL,
  `RATING_VALUE` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `rating`
--

INSERT INTO `rating` (`RATING_ID`, `USER_ID`, `ART_ID`, `RATING_VALUE`) VALUES
(1, 1, 11, 5),
(2, 2, 21, 4),
(3, 2, 22, 3),
(4, 3, 32, 4);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `USER_ID` int(10) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `USER_FNAME` varchar(30) NOT NULL,
  `USER_MNAME` varchar(30) DEFAULT NULL,
  `USER_LNAME` varchar(30) NOT NULL,
  `USER_GENDER` varchar(10) NOT NULL,
  `USER_AGE` int(11) NOT NULL,
  `USER_BDAY` date NOT NULL,
  `USER_CONTACT` bigint(11) NOT NULL,
  `USER_MUNICIPAL` varchar(50) DEFAULT NULL,
  `USER_PROVINCE` varchar(50) DEFAULT NULL,
  `USER_ZIPCODE` varchar(10) DEFAULT NULL,
  `USER_BRGY` varchar(50) DEFAULT NULL,
  `USER_STREET` varchar(50) DEFAULT NULL,
  `USER_HOUSE_NUMBER` varchar(10) DEFAULT NULL,
  `user_email` varchar(100) NOT NULL,
  `USER_TYPE` varchar(20) NOT NULL,
  `User_imagepath` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`USER_ID`, `username`, `password`, `USER_FNAME`, `USER_MNAME`, `USER_LNAME`, `USER_GENDER`, `USER_AGE`, `USER_BDAY`, `USER_CONTACT`, `USER_MUNICIPAL`, `USER_PROVINCE`, `USER_ZIPCODE`, `USER_BRGY`, `USER_STREET`, `USER_HOUSE_NUMBER`, `user_email`, `USER_TYPE`, `User_imagepath`) VALUES
(100, 'Rohit Kuna', 'terna', 'Rohit', '', 'Kuna', 'Male', 20, '2000-07-2', 9475293353, 'mumbai', 'mumbai', '421503', '', 'Shivaji chowk', '162', 'rohit1282000@gmail.com', 'Admin', 'banner-

992.jpg'),

(102, 'Shreyas Patil', 'terna', 'Shreyas', '', 'Patil', 'Male', 20, '2000-07-9', 9478293353, 'mumbai', 'mumbai', '421501', '', 'Nehru chowk', '125', 'shreyas1282000@gmail.com', 'Admin', 'banner-

992.jpg'),

(103, 'Akanksha Akre', 'terna', 'Akanksha', '', 'Akre', 'Female', 20, '2000-07-21', 9475273353, 'mumbai', 'mumbai', '421502', '', 'Shivaji chowk', '196', 'aku282000@gmail.com', 'Customer', 'banner-

992.jpg'),


(104, 'Shivam Sabale', 'terna', 'Shivam', '', 'Sabale', 'Male', 20, '2000-07-29', 9475297353, 'mumbai', 'mumbai', '421504', '', 'Ambedkar chowk', '128', 'shivamsb1282000@gmail.com', 'Customer', 

'banner-992.jpg'),



(1, 'M.F. Hussain', 'terna', 'Maqbool', 'Fida', 'Hussain', 'Male', 72, '2000-07-9', 3478293353, 'Delhi', 'Delhi', '421501', '', 'Nehru chowk', '125', 'mf1282000@gmail.com', 'Artist', 

'mfhusain.jpg'),

(2, 'Quing Han', 'terna', 'Quing', '', 'Han', 'Female', 36, '2000-07-2', 2475293353, 'Assam', 'Assam', '421503', '', 'Shivaji chowk', '162', 'le1282000@gmail.com', 

'Artist', 'quinghan1.jpg'),


(3, 'Raja Ravi Varma', 'terna', 'Raja', 'Ravi', 'Varma', 'Male', 70, '2000-07-21', 4475273353, 'Patna', 'Patna', '421502', '', 'Shivaji chowk', '196', 'rr1282000@gmail.com', 'Artist', 'rrv.jpg')

;
--
-- Indexes for dumped tables
--

--
-- Indexes for table `art_work`
--
ALTER TABLE `art_work`
  ADD PRIMARY KEY (`ART_ID`),
  ADD KEY `USER_ID` (`USER_ID`),
  ADD KEY `COMMENT_ID` (`COMMENT_ID`);

--
-- Indexes for table `buy_transaction`
--
ALTER TABLE `buy_transaction`
  ADD PRIMARY KEY (`TRANSACTION_ID`),
  ADD KEY `ART_ID` (`ART_ID`),
  ADD KEY `USER_ID` (`USER_ID`);

--
-- Indexes for table `comment`
--
ALTER TABLE `comment`
  ADD PRIMARY KEY (`COMMENT_ID`),
  ADD KEY `USER_ID` (`USER_ID`),
  ADD KEY `ART_ID` (`ART_ID`);

--
-- Indexes for table `rating`
--
ALTER TABLE `rating`
  ADD PRIMARY KEY (`RATING_ID`),
  ADD KEY `USER_ID` (`USER_ID`),
  ADD KEY `ART_ID` (`ART_ID`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`USER_ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `art_work`
--
ALTER TABLE `art_work`
  MODIFY `ART_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `buy_transaction`
--
ALTER TABLE `buy_transaction`
  MODIFY `TRANSACTION_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
--
-- AUTO_INCREMENT for table `comment`
--
ALTER TABLE `comment`
  MODIFY `COMMENT_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `rating`
--
ALTER TABLE `rating`
  MODIFY `RATING_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `USER_ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `art_work`
--
ALTER TABLE `art_work`
  ADD CONSTRAINT `art_work_ibfk_1` FOREIGN KEY (`USER_ID`) REFERENCES `user` (`USER_ID`) ON DELETE CASCADE,
  ADD CONSTRAINT `art_work_ibfk_2` FOREIGN KEY (`COMMENT_ID`) REFERENCES `comment` (`COMMENT_ID`) ON DELETE CASCADE;

--
-- Constraints for table `buy_transaction`
--
ALTER TABLE `buy_transaction`
  ADD CONSTRAINT `buy_transaction_ibfk_1` FOREIGN KEY (`ART_ID`) REFERENCES `art_work` (`ART_ID`) ON DELETE CASCADE,
  ADD CONSTRAINT `buy_transaction_ibfk_2` FOREIGN KEY (`USER_ID`) REFERENCES `user` (`USER_ID`) ON DELETE CASCADE;

--
-- Constraints for table `comment`
--
ALTER TABLE `comment`
  ADD CONSTRAINT `comment_ibfk_1` FOREIGN KEY (`USER_ID`) REFERENCES `user` (`USER_ID`) ON DELETE CASCADE,
  ADD CONSTRAINT `comment_ibfk_2` FOREIGN KEY (`ART_ID`) REFERENCES `art_work` (`ART_ID`) ON DELETE CASCADE;

--
-- Constraints for table `rating`
--
ALTER TABLE `rating`
  ADD CONSTRAINT `rating_ibfk_1` FOREIGN KEY (`USER_ID`) REFERENCES `user` (`USER_ID`) ON DELETE CASCADE,
  ADD CONSTRAINT `rating_ibfk_2` FOREIGN KEY (`ART_ID`) REFERENCES `art_work` (`ART_ID`) ON DELETE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
