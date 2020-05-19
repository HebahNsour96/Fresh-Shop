-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 19, 2020 at 07:47 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `artecom`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `admin_id` int(3) NOT NULL,
  `admin_email` varchar(50) NOT NULL,
  `admin_password` varchar(20) NOT NULL,
  `fullname` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`admin_id`, `admin_email`, `admin_password`, `fullname`) VALUES
(2, 'hebahnsour@outlook.com', 'heba1521996', 'Hebah Maen Nsour');

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `cat_id` int(3) NOT NULL,
  `cat_name` varchar(20) NOT NULL,
  `cat_img` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`cat_id`, `cat_name`, `cat_img`) VALUES
(12, 'Vegetables', 'veget.jpg'),
(13, 'Fruits', 'strawb.jpg'),
(15, 'Canned food', 'canning.jpg'),
(16, 'Feature Product', 'feature.jpg'),
(17, 'On Coming Product', 'incom.jpg'),
(18, 'Freezers Food', 'Freezer.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `customer_id` int(3) NOT NULL,
  `customer_name` varchar(50) NOT NULL,
  `customer_email` varchar(50) NOT NULL,
  `customer_password` varchar(50) NOT NULL,
  `mobile` varchar(30) NOT NULL,
  `address` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`customer_id`, `customer_name`, `customer_email`, `customer_password`, `mobile`, `address`) VALUES
(10, 'Hebah Nsour', 'hebahnsour1@outlook.com', '123456', '777955381', 'salt');

-- --------------------------------------------------------

--
-- Table structure for table `cust_order`
--

CREATE TABLE `cust_order` (
  `or_id` int(3) NOT NULL,
  `or_date` date NOT NULL,
  `customer_id` int(3) NOT NULL,
  `pro_id` int(3) NOT NULL,
  `total_price` varchar(100) NOT NULL,
  `qty` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

CREATE TABLE `feedback` (
  `feed_id` int(3) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `subject` varchar(100) NOT NULL,
  `msg` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `feedback`
--

INSERT INTO `feedback` (`feed_id`, `name`, `email`, `subject`, `msg`) VALUES
(1, 'Hebah Nsour', 'hebahnsour@outlook.com', 'vegetables', 'fresh');

-- --------------------------------------------------------

--
-- Table structure for table `incoming`
--

CREATE TABLE `incoming` (
  `id` int(3) NOT NULL,
  `img` text NOT NULL,
  `name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `incoming`
--

INSERT INTO `incoming` (`id`, `img`, `name`) VALUES
(3, 'gallery-img-02.jpg', 'Tomato'),
(4, 'gallery-img-03.jpg', 'pepper'),
(5, 'gallery-img-12.jpg', 'peas');

-- --------------------------------------------------------

--
-- Table structure for table `notification`
--

CREATE TABLE `notification` (
  `no_id` int(3) NOT NULL,
  `no_talk` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `notification`
--

INSERT INTO `notification` (`no_id`, `no_talk`) VALUES
(2, 'today will upload new picture for new Product'),
(3, 'fresh fruits and vegetables'),
(4, 'vegetables from farm today fresh'),
(5, 'canned food coming soon'),
(6, 'many products coming soon'),
(7, 'thank you for trust us');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `pro_id` int(3) NOT NULL,
  `pro_name` varchar(50) NOT NULL,
  `pro_qty` int(11) NOT NULL,
  `pro_price` int(50) NOT NULL,
  `pro_img` text NOT NULL,
  `pro_desc` text NOT NULL,
  `cat_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`pro_id`, `pro_name`, `pro_qty`, `pro_price`, `pro_img`, `pro_desc`, `cat_id`) VALUES
(7, 'lemon', 3, 10, 'instagram-img-04.jpg', 'Best lemon', 12),
(8, 'Orange ', 1, 5, 'instagram-img-06.jpg', 'Natural orange', 16),
(9, 'tomato', 3, 7, 'img-pro-02.jpg', 'Fresh tomato', 17),
(10, 'grape', 1, 6, 'img-pro-03.jpg', 'fresh grape', 17),
(11, 'Strawberry', 1, 2, 'Strawberries.jpg', 'Fresh Delicious strawberry', 13),
(12, ' hot dog', 1, 3, 'zwan hot dog.jpg', 'zwan hot dog', 15),
(13, 'Peas', 2, 2, 'peas.jpg', 'freez peas', 18),
(14, 'carrots', 1, 3, 'carrot.jpg', 'freez carrot', 18),
(15, 'Mushroom', 2, 3, 'mashroom.jpg', 'two canned of mushroom ', 15),
(16, 'corn', 2, 3, 'corn.jpg', ' delicacies corn', 16),
(17, 'pineapple', 2, 3, 'pinaple.jpg', 'yellow pineapple', 17),
(18, 'Nescafe', 1, 1, 'nescafe.jpg', 'espresso Nescafe', 17),
(19, 'juice', 1, 1, 'fresh mango.jpg', 'Mango fresh Juice', 17),
(20, 'honey', 4, 10, 'honey.jpg', 'Korean honey', 16),
(21, 'Chickpeas', 2, 5, 'chickpeas2.jpeg', 'Chickpeas canned', 16),
(22, 'carrot', 4, 1, 'carrot2.jpg', 'fresh carrots', 16);

-- --------------------------------------------------------

--
-- Table structure for table `wallorder`
--

CREATE TABLE `wallorder` (
  `w_id` int(3) NOT NULL,
  `w_date` date NOT NULL,
  `customer_id` int(3) NOT NULL,
  `pro_id` int(3) NOT NULL,
  `total_pr` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `wallorder`
--

INSERT INTO `wallorder` (`w_id`, `w_date`, `customer_id`, `pro_id`, `total_pr`) VALUES
(698639183, '2020-05-19', 10, 11, 2),
(1338737147, '2020-05-19', 10, 20, 44),
(1541321386, '2020-05-19', 10, 16, 6),
(1997742927, '2020-05-19', 10, 22, 25),
(1449050143, '2020-05-19', 10, 11, 2),
(349096293, '2020-05-19', 10, 8, 5),
(1859659415, '2020-05-19', 10, 17, 6),
(1288175137, '2020-05-19', 10, 10, 6),
(556539386, '2020-05-19', 10, 16, 6);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`cat_id`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`customer_id`);

--
-- Indexes for table `cust_order`
--
ALTER TABLE `cust_order`
  ADD PRIMARY KEY (`or_id`);

--
-- Indexes for table `feedback`
--
ALTER TABLE `feedback`
  ADD PRIMARY KEY (`feed_id`);

--
-- Indexes for table `incoming`
--
ALTER TABLE `incoming`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `notification`
--
ALTER TABLE `notification`
  ADD PRIMARY KEY (`no_id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`pro_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `admin_id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `cat_id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `customer_id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `cust_order`
--
ALTER TABLE `cust_order`
  MODIFY `or_id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `feedback`
--
ALTER TABLE `feedback`
  MODIFY `feed_id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `incoming`
--
ALTER TABLE `incoming`
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `notification`
--
ALTER TABLE `notification`
  MODIFY `no_id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `pro_id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
