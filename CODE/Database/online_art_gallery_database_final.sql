--
-- Database: `online_art_gallery_database_final`


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

INSERT INTO `buy_transaction` (`TRANSACTION_ID`, `USER_ID`, `ART_ID`, `Courier_Name`, `Courier_Contact`, `ordered_date`, `DELIVERY_DATE`, `ordered_no`, `total_price`, `shipping_area`, `shipping_municipal`, `shipping_province`, `shipping_zipcode`, `shipping_brgy`, `shipping_street`, `shipping_house_num`, `SHIPPING_STATUS`) VALUES

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
(1, 14, 13, '2017-03-21', 'aaaaaaa'),
(2, 15, 8, '2017-09-10', 'fjiog\r\n');

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

---
--- Creating Exhibition Table
---  
  
CREATE TABLE `exhibition` like `art_work`;