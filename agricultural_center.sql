-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 24, 2022 at 10:29 AM
-- Server version: 10.4.20-MariaDB
-- PHP Version: 7.4.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `agricultural_center`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `admin_id` int(100) NOT NULL,
  `admin_name` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`admin_id`, `admin_name`, `password`) VALUES
(1, 'admin', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `sess_id` varchar(100) NOT NULL,
  `stock_stockId` int(11) NOT NULL,
  `item_qty` int(11) NOT NULL DEFAULT 1,
  `addTime` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`sess_id`, `stock_stockId`, `item_qty`, `addTime`) VALUES
('3mm0ncdnq3hov9e6rmfrhhl5bt', 2, 1, '2022-03-24 07:43:14');

--
-- Triggers `cart`
--
DELIMITER $$
CREATE TRIGGER `RestoreStock` BEFORE DELETE ON `cart` FOR EACH ROW UPDATE stocks SET stock_count = stock_count + old.item_qty WHERE stock_id = old.stock_stockId
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `collections`
--

CREATE TABLE `collections` (
  `collection_id` int(11) NOT NULL,
  `collection_name` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `collections`
--

INSERT INTO `collections` (`collection_id`, `collection_name`) VALUES
(1, 'Fruits'),
(2, 'Vegitables');

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `customer_id` int(11) NOT NULL,
  `customer_fname` varchar(45) NOT NULL,
  `customer_lname` varchar(45) NOT NULL,
  `customer_addr1` varchar(45) NOT NULL,
  `customer_addr2` varchar(45) NOT NULL,
  `customer_addr3` varchar(45) NOT NULL,
  `customer_postal_id` int(11) NOT NULL,
  `customer_gender` char(1) NOT NULL,
  `customer_nic` varchar(45) NOT NULL,
  `customer_cno` varchar(20) NOT NULL,
  `customer_img` varchar(250) DEFAULT NULL,
  `customer_reg_date` datetime NOT NULL DEFAULT current_timestamp(),
  `customer_last_update` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `customer_login`
--

CREATE TABLE `customer_login` (
  `login_id` int(11) NOT NULL,
  `login_email` varchar(100) NOT NULL,
  `login_password` varchar(60) NOT NULL,
  `customer_customerId` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `faqs`
--

CREATE TABLE `faqs` (
  `faq_id` int(11) NOT NULL,
  `faq_content` text NOT NULL,
  `faq_time` timestamp NOT NULL DEFAULT current_timestamp(),
  `faq_answer` varchar(400) NOT NULL DEFAULT 'Pending',
  `faq_cus_name` varchar(100) NOT NULL,
  `faq_cus_email` varchar(100) NOT NULL,
  `faq_value` tinyint(1) NOT NULL DEFAULT 1 COMMENT '1=low, 2=mid, 3=high, 4=secure'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `feedbacks`
--

CREATE TABLE `feedbacks` (
  `feedback_id` int(11) NOT NULL,
  `feedback_content` text DEFAULT NULL,
  `feedback_starcount` int(5) NOT NULL DEFAULT 0,
  `feedback_time` timestamp NOT NULL DEFAULT current_timestamp(),
  `customer_customerId` int(11) NOT NULL,
  `invoice_invoiceId` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `invoices`
--

CREATE TABLE `invoices` (
  `invoice_id` int(11) NOT NULL,
  `invoice_number` varchar(45) NOT NULL,
  `invoice_total` decimal(10,2) NOT NULL,
  `invoice_dis` decimal(10,2) NOT NULL DEFAULT 0.00,
  `invoice_net_total` decimal(10,2) NOT NULL,
  `invoice_time` timestamp NOT NULL DEFAULT current_timestamp(),
  `customer_customerId` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `order_id` int(11) NOT NULL,
  `order_date` date NOT NULL,
  `order_cusFname` varchar(60) NOT NULL,
  `order_cusLname` varchar(60) NOT NULL,
  `order_cusAddr1` varchar(100) NOT NULL,
  `order_cusAddr2` varchar(100) NOT NULL,
  `order_cusAddr3` varchar(100) NOT NULL,
  `order_cusPostalcode` int(5) NOT NULL,
  `order_cusContact` varchar(15) NOT NULL,
  `order_cusEmail` varchar(100) NOT NULL,
  `order_status` tinyint(1) DEFAULT 1 COMMENT '1-new order\r\n2-processing \r\n3-ready to delivery\r\n4-dispatch\r\n5-devilered',
  `customer_customerId` int(11) NOT NULL,
  `invoice_invoiceId` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `order_has_product`
--

CREATE TABLE `order_has_product` (
  `order_orderId` int(11) NOT NULL,
  `product_productId` int(11) NOT NULL,
  `product_qty` int(11) NOT NULL,
  `product_price` decimal(10,2) NOT NULL,
  `sub_total` decimal(10,2) NOT NULL DEFAULT 0.00,
  `size_sizeId` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `product_id` int(11) NOT NULL,
  `product_name` varchar(100) NOT NULL,
  `collection_collectionId` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`product_id`, `product_name`, `collection_collectionId`) VALUES
(1, 'Mango', 1),
(2, 'Papaya', 1),
(3, 'Watermelon', 1),
(4, 'Pumpkin', 2),
(5, 'Big Onion', 2),
(6, 'Tomato', 2);

-- --------------------------------------------------------

--
-- Table structure for table `product_image`
--

CREATE TABLE `product_image` (
  `img_id` int(11) NOT NULL,
  `img_name` text NOT NULL,
  `product_productId` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `product_image`
--

INSERT INTO `product_image` (`img_id`, `img_name`, `product_productId`) VALUES
(1, 'Mango.jpg', 1),
(2, 'papaya.jpg', 2),
(3, 'watermelon.jpg', 3),
(4, 'pumking.jpeg', 4),
(5, 'onion.jpg', 5),
(6, 'tomato.jpeg', 6);

-- --------------------------------------------------------

--
-- Table structure for table `stocks`
--

CREATE TABLE `stocks` (
  `stock_id` int(11) NOT NULL,
  `stock_count` varchar(100) NOT NULL,
  `stock_sell_price of 250g` decimal(10,2) NOT NULL DEFAULT 0.00,
  `product_productId` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `stocks`
--

INSERT INTO `stocks` (`stock_id`, `stock_count`, `stock_sell_price of 250g`, `product_productId`) VALUES
(1, '1000 of Mango', '65.00', 1),
(2, '50Kg', '300.00', 2),
(3, '50Kg', '230.00', 3),
(4, '50kg', '175.00', 4),
(5, '50Kg', '480.00', 5),
(6, '50Kg', '450.00', 6);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`sess_id`,`stock_stockId`);

--
-- Indexes for table `collections`
--
ALTER TABLE `collections`
  ADD PRIMARY KEY (`collection_id`);

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`customer_id`);

--
-- Indexes for table `customer_login`
--
ALTER TABLE `customer_login`
  ADD PRIMARY KEY (`login_id`),
  ADD UNIQUE KEY `login_email` (`login_email`),
  ADD KEY `CusLogin_CusId` (`customer_customerId`);

--
-- Indexes for table `faqs`
--
ALTER TABLE `faqs`
  ADD PRIMARY KEY (`faq_id`);

--
-- Indexes for table `feedbacks`
--
ALTER TABLE `feedbacks`
  ADD PRIMARY KEY (`feedback_id`);

--
-- Indexes for table `invoices`
--
ALTER TABLE `invoices`
  ADD PRIMARY KEY (`invoice_id`,`invoice_number`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`order_id`);

--
-- Indexes for table `order_has_product`
--
ALTER TABLE `order_has_product`
  ADD PRIMARY KEY (`order_orderId`,`product_productId`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`product_id`);

--
-- Indexes for table `product_image`
--
ALTER TABLE `product_image`
  ADD PRIMARY KEY (`img_id`),
  ADD KEY `fk_ProductImg_ProductId` (`product_productId`);

--
-- Indexes for table `stocks`
--
ALTER TABLE `stocks`
  ADD PRIMARY KEY (`stock_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `admin_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `collections`
--
ALTER TABLE `collections`
  MODIFY `collection_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `customer_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `customer_login`
--
ALTER TABLE `customer_login`
  MODIFY `login_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `faqs`
--
ALTER TABLE `faqs`
  MODIFY `faq_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `feedbacks`
--
ALTER TABLE `feedbacks`
  MODIFY `feedback_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `invoices`
--
ALTER TABLE `invoices`
  MODIFY `invoice_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `product_image`
--
ALTER TABLE `product_image`
  MODIFY `img_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `stocks`
--
ALTER TABLE `stocks`
  MODIFY `stock_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `customer_login`
--
ALTER TABLE `customer_login`
  ADD CONSTRAINT `CusLogin_CusId` FOREIGN KEY (`customer_customerId`) REFERENCES `customers` (`customer_id`) ON DELETE CASCADE;

--
-- Constraints for table `product_image`
--
ALTER TABLE `product_image`
  ADD CONSTRAINT `fk_ProductImg_ProductId` FOREIGN KEY (`product_productId`) REFERENCES `products` (`product_id`) ON DELETE CASCADE;

DELIMITER $$
--
-- Events
--
CREATE DEFINER=`root`@`localhost` EVENT `ClearCart` ON SCHEDULE EVERY 5 SECOND STARTS '2021-09-20 16:28:48' ON COMPLETION NOT PRESERVE ENABLE DO DELETE FROM cart WHERE 
TIMESTAMPDIFF(MINUTE, cart.addTime, CURRENT_TIMESTAMP) >= 60$$

DELIMITER ;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
