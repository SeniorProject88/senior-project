-- phpMyAdmin SQL Dump
-- version 5.3.0-dev+20220601.866861edac
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 27, 2022 at 07:39 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `senior`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(40) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `role_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `email`, `password`, `role_id`, `name`) VALUES
(3, 'admin@gmail.com', '123456789', 1, 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `categorys`
--

CREATE TABLE `categorys` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `categorys`
--

INSERT INTO `categorys` (`id`, `name`, `status`, `created_at`) VALUES
(1, 'Hand made', 1, '2022-05-26 14:07:14'),
(2, 'Sponsered Companies', 1, '2022-05-26 14:07:45'),
(3, 'Embroidery', 1, '2022-05-26 14:08:01');

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `id` int(20) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `country` varchar(255) NOT NULL,
  `zip` varchar(255) NOT NULL,
  `state` varchar(255) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 0,
  `role_id` int(11) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`id`, `name`, `email`, `password`, `phone`, `address`, `country`, `zip`, `state`, `status`, `role_id`, `created_at`) VALUES
(20, 'dana', 'dania@gmail.com', '123456789', '0568326110', 'tubas', 'palestine', '111', 'tubas', 0, 2, '2022-06-21 13:15:58'),
(25, 'ahmad', 'ahmad@gmail.com', '123456789', '0796388393', 'zarqaa', 'jordan', '112233', 'amman', 1, 2, '2022-06-24 16:24:24');

-- --------------------------------------------------------

--
-- Table structure for table `delivery`
--

CREATE TABLE `delivery` (
  `id` int(40) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `role_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `delivery`
--

INSERT INTO `delivery` (`id`, `name`, `email`, `password`, `role_id`) VALUES
(1, 'delivery', 'delivery@gmail.com', '123456789', 4);

-- --------------------------------------------------------

--
-- Table structure for table `news`
--

CREATE TABLE `news` (
  `id` int(11) NOT NULL,
  `title` varchar(100) NOT NULL,
  `description` mediumtext NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `img` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `news`
--

INSERT INTO `news` (`id`, `title`, `description`, `created_at`, `status`, `img`) VALUES
(5, 'General indicators for the agricultural sector', 'Implementation of various relief and development projects that included most agricultural sectors with an estimated value of up to 16 million dollars for the benefit of the affected farmers and fishermen, with an achievement rate during 2021 that reached 74% of the value of the allocated budgets, with an estimated total of 13,000 beneficiaries, where the most prominent interventions were Implementation of various relief and development projects that included most agricultural sectors with an estimated value of up to 16 million dollars for the benefit of the affected farmers and fishermen, with an achievement rate during 2021 that reached 74% of the value of the allocated budgets, with an estimated total of 13,000 beneficiaries, where the most prominent interventions were', '2022-05-23 02:12:05', 1, 'assets/img/latest-news/news-bg-3.jpg'),
(6, 'General indicators for the agricultural sector', 'Implementation of various relief and development projects that included most agricultural sectors with an estimated value of up to 16 million dollars for the benefit of the affected farmers and fishermen, with an achievement rate during 2021 that reached 74% of the value of the allocated budgets, with an estimated total of 13,000 beneficiaries, where the most prominent interventions were Implementation of various relief and development projects that included most agricultural sectors with an estimated value of up to 16 million dollars for the benefit of the affected farmers and fishermen, with an achievement rate during 2021 that reached 74% of the value of the allocated budgets, with an estimated total of 13,000 beneficiaries, where the most prominent interventions were', '2022-05-30 06:23:02', 1, 'assets/img/latest-news/news-bg-1.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(40) NOT NULL,
  `total_price` varchar(10000) NOT NULL,
  `datetime` datetime NOT NULL DEFAULT current_timestamp(),
  `status` enum('0','1','2') DEFAULT NULL,
  `customer_id` int(20) NOT NULL,
  `delivery_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `total_price`, `datetime`, `status`, `customer_id`, `delivery_id`) VALUES
(65, '350', '2022-06-27 10:29:50', '2', 20, 1);

-- --------------------------------------------------------

--
-- Table structure for table `order_products`
--

CREATE TABLE `order_products` (
  `id` int(11) NOT NULL,
  `order_id` int(40) NOT NULL,
  `product_id` int(40) NOT NULL,
  `quantity` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `order_products`
--

INSERT INTO `order_products` (`id`, `order_id`, `product_id`, `quantity`) VALUES
(28, 65, 79, 1),
(29, 65, 71, 5),
(30, 65, 78, 3);

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(40) NOT NULL,
  `name` varchar(100) NOT NULL,
  `price` text NOT NULL,
  `img` varchar(255) NOT NULL,
  `description` varchar(1000) NOT NULL,
  `expire_date` date NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 0,
  `owner_id` int(40) NOT NULL,
  `category_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `price`, `img`, `description`, `expire_date`, `status`, `owner_id`, `category_id`) VALUES
(70, 'Labneh', '7', 'assets/img/products/22,06,271736808689907104.jpg', 'Original Labneh from Al Jibrini', '2022-09-10', 1, 17, 2),
(71, 'coffee', '20', 'assets/img/products/22,06,271736808762881159.jpg', '1 packet Ben Zhaiman coffee', '2022-09-06', 1, 17, 2),
(72, 'zeta sauce', '25', 'assets/img/products/22,06,271736808823403045.jpg', 'Five flavors of zeta sauce', '2022-08-06', 1, 17, 2),
(73, 'sewing box', '10', 'assets/img/products/22,06,271736808970256592.jpg', 'Includes all thread colors', '2022-09-03', 1, 17, 3),
(77, 'embroidered plate', '20', 'assets/img/products/22,06,271736809233531902.jpg', 'hand embroidered straw bowl', '2022-09-30', 1, 17, 3),
(78, 'embroidered shawl', '40', 'assets/img/products/22,06,271736809299774629.jpg', 'Blue hand embroidered shawl', '2022-10-06', 1, 17, 3),
(79, 'embroidered dress', '100', 'assets/img/products/22,06,271736809355831662.jpg', 'Red hand embroidered dress', '2022-09-22', 1, 17, 3),
(80, 'Grape leaves', '25', 'assets/img/products/22,06,271736809444588635.jpg', 'Five bottles of grape leaves', '2022-09-09', 1, 17, 1),
(81, 'tomato sauce', '25', 'assets/img/products/22,06,271736809509104058.jpg', 'Five cans of tomato sauce', '2022-12-08', 1, 17, 1),
(82, 'cake molds', '40', 'assets/img/products/22,06,271736809589171942.jpg', 'Three sizes of Eid cake molds', '2022-10-06', 1, 17, 1);

-- --------------------------------------------------------

--
-- Table structure for table `product_owners`
--

CREATE TABLE `product_owners` (
  `id` int(40) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `company_name` varchar(100) NOT NULL,
  `company_id` int(40) NOT NULL,
  `role_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `product_owners`
--

INSERT INTO `product_owners` (`id`, `name`, `email`, `password`, `phone`, `company_name`, `company_id`, `role_id`) VALUES
(17, 'dania ratrout', 'dana@gmail.com', 'Aa12345678', '0568326110', 'zeeta', 1, 3);

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`) VALUES
(1, 'admin'),
(2, 'customer'),
(3, 'product_owners'),
(4, 'delivery');

-- --------------------------------------------------------

--
-- Table structure for table `sponsored`
--

CREATE TABLE `sponsored` (
  `id` int(11) NOT NULL,
  `img` varchar(255) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `admin_id` int(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `sponsored`
--

INSERT INTO `sponsored` (`id`, `img`, `title`, `description`, `admin_id`) VALUES
(1, 'assets/img/company-logos/3.png', 'Al-jebrini Company Local shop owner', '\r\n									\" Providing distinctive food products and services to our customers, and achieving economic growth. \"\r\n								', 0),
(2, 'assets/img/company-logos/2.png', 'Zeta Zeta Local shop owner', '									\" The Turkish Palestinian Company for Food Industries ZETA land is considered one of the leading companies in the field of food manufacturing, and depends on the provision of qualified human resources to complete the work,\"\r\n', 0),
(3, 'assets/img/company-logos/4.png', 'Izhiman\'s Coffee Local shop owner', '									\" Izhiman???s family has become famous in the trade of coffee,chocolate, spices, and nuts since1920 in Jerusalem, Our vision aims to global by 2025 \"\r\n', 0),
(4, 'assets/img/company-logos/5.png', 'Al-Islamyah company local shop owner', '\" The Palestinian Islamic Development Company is an economic entity established in Palestine in the city of Tulkarm in 1989, and it is engaged in the production of (packed meat (mortadella), canned meat (canned), frozen meat, soups, frozen vegetables, and other foodstuffs). \"', 0),
(5, 'assets/img/company-logos/1.png', 'Al-Salwa company local shop owner', '\" Al-Salwa Company for Food Products was established in the beginning of 1994 in Ramallah to meet the needs of the local market for meat products (mortadella). \"', 0);

-- --------------------------------------------------------

--
-- Table structure for table `team`
--

CREATE TABLE `team` (
  `id` int(11) NOT NULL,
  `img` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `job` varchar(255) NOT NULL,
  `admin_id` int(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `team`
--

INSERT INTO `team` (`id`, `img`, `name`, `job`, `admin_id`) VALUES
(6, 'assets/img/team/3.jpg', 'Marjan abu alrub', 'Designer', 1),
(7, 'assets/img/team/2.jpg', 'Dania ratrout', 'programmer', 1);

-- --------------------------------------------------------

--
-- Table structure for table `validity`
--

CREATE TABLE `validity` (
  `id` int(40) NOT NULL,
  `admin_id` int(40) NOT NULL,
  `news_id` int(40) NOT NULL,
  `team_id` int(40) NOT NULL,
  `sponserd_id` int(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`),
  ADD KEY `role_id` (`role_id`);

--
-- Indexes for table `categorys`
--
ALTER TABLE `categorys`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`),
  ADD KEY `role_id` (`role_id`);

--
-- Indexes for table `delivery`
--
ALTER TABLE `delivery`
  ADD PRIMARY KEY (`id`),
  ADD KEY `role_id` (`role_id`);

--
-- Indexes for table `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `Delivery_ID` (`delivery_id`),
  ADD KEY `customer_id` (`customer_id`);

--
-- Indexes for table `order_products`
--
ALTER TABLE `order_products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `Order_ID` (`order_id`),
  ADD KEY `Product_ID` (`product_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `Owner_ID` (`owner_id`),
  ADD KEY `category_id` (`category_id`);

--
-- Indexes for table `product_owners`
--
ALTER TABLE `product_owners`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`),
  ADD KEY `role_id` (`role_id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sponsored`
--
ALTER TABLE `sponsored`
  ADD PRIMARY KEY (`id`),
  ADD KEY `admin_id` (`admin_id`);

--
-- Indexes for table `team`
--
ALTER TABLE `team`
  ADD PRIMARY KEY (`id`),
  ADD KEY `admin_id` (`admin_id`);

--
-- Indexes for table `validity`
--
ALTER TABLE `validity`
  ADD PRIMARY KEY (`id`),
  ADD KEY `admin_id` (`admin_id`),
  ADD KEY `news_id` (`news_id`),
  ADD KEY `team_id` (`team_id`),
  ADD KEY `sponserd_id` (`sponserd_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(40) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `categorys`
--
ALTER TABLE `categorys`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `delivery`
--
ALTER TABLE `delivery`
  MODIFY `id` int(40) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `news`
--
ALTER TABLE `news`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(40) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=66;

--
-- AUTO_INCREMENT for table `order_products`
--
ALTER TABLE `order_products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(40) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=83;

--
-- AUTO_INCREMENT for table `product_owners`
--
ALTER TABLE `product_owners`
  MODIFY `id` int(40) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `sponsored`
--
ALTER TABLE `sponsored`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `team`
--
ALTER TABLE `team`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `validity`
--
ALTER TABLE `validity`
  MODIFY `id` int(40) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `admin`
--
ALTER TABLE `admin`
  ADD CONSTRAINT `admin_ibfk_1` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `customer`
--
ALTER TABLE `customer`
  ADD CONSTRAINT `customer_ibfk_1` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `delivery`
--
ALTER TABLE `delivery`
  ADD CONSTRAINT `delivery_ibfk_1` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`delivery_id`) REFERENCES `delivery` (`id`),
  ADD CONSTRAINT `orders_ibfk_2` FOREIGN KEY (`customer_id`) REFERENCES `customer` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `order_products`
--
ALTER TABLE `order_products`
  ADD CONSTRAINT `order_products_ibfk_1` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `order_products_ibfk_2` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_ibfk_1` FOREIGN KEY (`owner_id`) REFERENCES `product_owners` (`id`),
  ADD CONSTRAINT `products_ibfk_2` FOREIGN KEY (`category_id`) REFERENCES `categorys` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `product_owners`
--
ALTER TABLE `product_owners`
  ADD CONSTRAINT `product_owners_ibfk_1` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `validity`
--
ALTER TABLE `validity`
  ADD CONSTRAINT `validity_ibfk_1` FOREIGN KEY (`sponserd_id`) REFERENCES `sponsored` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `validity_ibfk_2` FOREIGN KEY (`news_id`) REFERENCES `news` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `validity_ibfk_3` FOREIGN KEY (`team_id`) REFERENCES `team` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `validity_ibfk_4` FOREIGN KEY (`admin_id`) REFERENCES `admin` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;



