-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 19, 2019 at 12:38 AM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 7.3.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bd_store`
--

-- --------------------------------------------------------

--
-- Table structure for table `brand`
--

CREATE TABLE `brand` (
  `id_brand` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `img` varchar(100) DEFAULT NULL,
  `active` tinyint(4) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `brand`
--

INSERT INTO `brand` (`id_brand`, `name`, `img`, `active`, `created_at`, `updated_at`) VALUES
(1, 'Coca Cola', NULL, 1, '2019-06-18 18:02:42', '2019-06-18 18:02:42');

-- --------------------------------------------------------

--
-- Table structure for table `cart_item`
--

CREATE TABLE `cart_item` (
  `id_cart_item` int(11) NOT NULL,
  `id_cart` int(11) NOT NULL,
  `id_product` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id_category` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `active` tinyint(4) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id_category`, `name`, `active`, `created_at`, `updated_at`) VALUES
(1, 'Bebidas', 1, '2019-06-18 17:58:22', '2019-06-18 17:58:22');

-- --------------------------------------------------------

--
-- Table structure for table `city`
--

CREATE TABLE `city` (
  `id_city` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `id_state` int(11) NOT NULL,
  `active` tinyint(4) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `country`
--

CREATE TABLE `country` (
  `id_country` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `active` tinyint(4) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `customer_address`
--

CREATE TABLE `customer_address` (
  `id_address` int(11) NOT NULL,
  `address` varchar(100) NOT NULL,
  `number` varchar(10) NOT NULL,
  `zip_code` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_city` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `order`
--

CREATE TABLE `order` (
  `id_order` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_status` int(11) NOT NULL,
  `id_address` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `order_item`
--

CREATE TABLE `order_item` (
  `id_order_item` int(11) NOT NULL,
  `id_order` int(11) NOT NULL,
  `id_product` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `order_status`
--

CREATE TABLE `order_status` (
  `id_status` int(11) NOT NULL,
  `status_name` varchar(50) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(100) NOT NULL,
  `token` varchar(100) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `permission`
--

CREATE TABLE `permission` (
  `id_permission` int(11) NOT NULL,
  `name` varchar(25) DEFAULT NULL,
  `description` varchar(150) DEFAULT NULL,
  `active` tinyint(4) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `id_product` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `description` varchar(150) NOT NULL,
  `price` decimal(5,2) NOT NULL,
  `stock` int(11) NOT NULL,
  `product_img` varchar(100) DEFAULT NULL,
  `active` tinyint(4) NOT NULL DEFAULT '1',
  `id_brand` int(11) NOT NULL,
  `id_supplier` int(11) NOT NULL,
  `id_category` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`id_product`, `name`, `description`, `price`, `stock`, `product_img`, `active`, `id_brand`, `id_supplier`, `id_category`, `created_at`, `updated_at`) VALUES
(1, 'Coca Cola - 600ml.', 'Refresco sabor cola.', '13.00', 10, 'img10.jpg', 1, 1, 1, 1, '2019-06-18 18:04:05', '2019-06-18 18:04:05'),
(2, 'Fuze Tea - 600ml', 'Té Negro con un toque de limón', '12.00', 10, 'img.jpg', 1, 1, 1, 1, '2019-06-18 19:11:49', '2019-06-18 19:11:49'),
(3, 'Cristal Negra - 600ml', 'Refresco con sabor a sidra negra', '12.00', 10, 'img.jpg', 0, 1, 1, 1, '2019-06-18 19:11:49', '2019-06-18 19:11:49');

-- --------------------------------------------------------

--
-- Table structure for table `role`
--

CREATE TABLE `role` (
  `id_role` int(11) NOT NULL,
  `name` varchar(30) NOT NULL,
  `description` varchar(150) NOT NULL,
  `active` tinyint(4) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `role_permission`
--

CREATE TABLE `role_permission` (
  `id_role_permission` int(11) NOT NULL,
  `id_role` int(11) NOT NULL,
  `id_permission` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `shopping_cart`
--

CREATE TABLE `shopping_cart` (
  `id_cart` int(11) NOT NULL,
  `id_custumer` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `state`
--

CREATE TABLE `state` (
  `id_state` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `active` tinyint(4) NOT NULL,
  `id_country` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `supplier`
--

CREATE TABLE `supplier` (
  `id_supplier` int(11) NOT NULL,
  `supplier_short_name` varchar(30) NOT NULL,
  `supplier_long_name` varchar(150) NOT NULL,
  `address` varchar(200) DEFAULT NULL,
  `active` tinyint(4) DEFAULT '1',
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `supplier`
--

INSERT INTO `supplier` (`id_supplier`, `supplier_short_name`, `supplier_long_name`, `address`, `active`, `created_at`, `updated_at`) VALUES
(1, 'Bepensa', 'Grupo Bepensa', NULL, 1, '2019-06-18 18:00:05', '2019-06-18 18:00:05');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(100) NOT NULL,
  `firstname` varchar(50) NOT NULL,
  `lastname` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `user_img` varchar(100) NOT NULL,
  `active` tinyint(4) NOT NULL,
  `id_role` int(11) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `brand`
--
ALTER TABLE `brand`
  ADD PRIMARY KEY (`id_brand`);

--
-- Indexes for table `cart_item`
--
ALTER TABLE `cart_item`
  ADD PRIMARY KEY (`id_cart_item`),
  ADD KEY `cart_item_product` (`id_product`),
  ADD KEY `order_item_shopping_card` (`id_cart`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id_category`);

--
-- Indexes for table `city`
--
ALTER TABLE `city`
  ADD PRIMARY KEY (`id_city`),
  ADD KEY `city_state` (`id_state`);

--
-- Indexes for table `country`
--
ALTER TABLE `country`
  ADD PRIMARY KEY (`id_country`);

--
-- Indexes for table `customer_address`
--
ALTER TABLE `customer_address`
  ADD PRIMARY KEY (`id_address`),
  ADD KEY `customer_address_city` (`id_city`),
  ADD KEY `customer_address_user` (`id_user`);

--
-- Indexes for table `order`
--
ALTER TABLE `order`
  ADD PRIMARY KEY (`id_order`),
  ADD KEY `Order_customer_address` (`id_address`),
  ADD KEY `Order_user` (`id_user`),
  ADD KEY `order_order_status` (`id_status`);

--
-- Indexes for table `order_item`
--
ALTER TABLE `order_item`
  ADD PRIMARY KEY (`id_order_item`),
  ADD KEY `order_item_Order` (`id_order`),
  ADD KEY `order_item_product` (`id_product`);

--
-- Indexes for table `order_status`
--
ALTER TABLE `order_status`
  ADD PRIMARY KEY (`id_status`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `permission`
--
ALTER TABLE `permission`
  ADD PRIMARY KEY (`id_permission`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id_product`),
  ADD KEY `product_brand` (`id_brand`),
  ADD KEY `product_catergory` (`id_category`),
  ADD KEY `product_supplier` (`id_supplier`);

--
-- Indexes for table `role`
--
ALTER TABLE `role`
  ADD PRIMARY KEY (`id_role`);

--
-- Indexes for table `role_permission`
--
ALTER TABLE `role_permission`
  ADD PRIMARY KEY (`id_role_permission`),
  ADD KEY `role_permission_permission` (`id_permission`),
  ADD KEY `role_permission_role` (`id_role`);

--
-- Indexes for table `shopping_cart`
--
ALTER TABLE `shopping_cart`
  ADD PRIMARY KEY (`id_cart`),
  ADD KEY `shopping_card_user` (`id_custumer`);

--
-- Indexes for table `state`
--
ALTER TABLE `state`
  ADD PRIMARY KEY (`id_state`),
  ADD KEY `state_country` (`id_country`);

--
-- Indexes for table `supplier`
--
ALTER TABLE `supplier`
  ADD PRIMARY KEY (`id_supplier`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`),
  ADD UNIQUE KEY `user_ak_username` (`username`),
  ADD KEY `user_role` (`id_role`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `brand`
--
ALTER TABLE `brand`
  MODIFY `id_brand` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `cart_item`
--
ALTER TABLE `cart_item`
  MODIFY `id_cart_item` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id_category` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `city`
--
ALTER TABLE `city`
  MODIFY `id_city` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `country`
--
ALTER TABLE `country`
  MODIFY `id_country` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `customer_address`
--
ALTER TABLE `customer_address`
  MODIFY `id_address` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `order`
--
ALTER TABLE `order`
  MODIFY `id_order` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `order_item`
--
ALTER TABLE `order_item`
  MODIFY `id_order_item` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `order_status`
--
ALTER TABLE `order_status`
  MODIFY `id_status` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `permission`
--
ALTER TABLE `permission`
  MODIFY `id_permission` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `id_product` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `role`
--
ALTER TABLE `role`
  MODIFY `id_role` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `role_permission`
--
ALTER TABLE `role_permission`
  MODIFY `id_role_permission` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `shopping_cart`
--
ALTER TABLE `shopping_cart`
  MODIFY `id_cart` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `state`
--
ALTER TABLE `state`
  MODIFY `id_state` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `supplier`
--
ALTER TABLE `supplier`
  MODIFY `id_supplier` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `cart_item`
--
ALTER TABLE `cart_item`
  ADD CONSTRAINT `cart_item_product` FOREIGN KEY (`id_product`) REFERENCES `product` (`id_product`),
  ADD CONSTRAINT `order_item_shopping_card` FOREIGN KEY (`id_cart`) REFERENCES `shopping_cart` (`id_cart`);

--
-- Constraints for table `city`
--
ALTER TABLE `city`
  ADD CONSTRAINT `city_state` FOREIGN KEY (`id_state`) REFERENCES `state` (`id_state`);

--
-- Constraints for table `customer_address`
--
ALTER TABLE `customer_address`
  ADD CONSTRAINT `customer_address_city` FOREIGN KEY (`id_city`) REFERENCES `city` (`id_city`),
  ADD CONSTRAINT `customer_address_user` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`);

--
-- Constraints for table `order`
--
ALTER TABLE `order`
  ADD CONSTRAINT `Order_customer_address` FOREIGN KEY (`id_address`) REFERENCES `customer_address` (`id_address`),
  ADD CONSTRAINT `Order_user` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`),
  ADD CONSTRAINT `order_order_status` FOREIGN KEY (`id_status`) REFERENCES `order_status` (`id_status`);

--
-- Constraints for table `order_item`
--
ALTER TABLE `order_item`
  ADD CONSTRAINT `order_item_Order` FOREIGN KEY (`id_order`) REFERENCES `order` (`id_order`),
  ADD CONSTRAINT `order_item_product` FOREIGN KEY (`id_product`) REFERENCES `product` (`id_product`);

--
-- Constraints for table `product`
--
ALTER TABLE `product`
  ADD CONSTRAINT `product_brand` FOREIGN KEY (`id_brand`) REFERENCES `brand` (`id_brand`),
  ADD CONSTRAINT `product_catergory` FOREIGN KEY (`id_category`) REFERENCES `category` (`id_category`),
  ADD CONSTRAINT `product_supplier` FOREIGN KEY (`id_supplier`) REFERENCES `supplier` (`id_supplier`);

--
-- Constraints for table `role_permission`
--
ALTER TABLE `role_permission`
  ADD CONSTRAINT `role_permission_permission` FOREIGN KEY (`id_permission`) REFERENCES `permission` (`id_permission`),
  ADD CONSTRAINT `role_permission_role` FOREIGN KEY (`id_role`) REFERENCES `role` (`id_role`);

--
-- Constraints for table `shopping_cart`
--
ALTER TABLE `shopping_cart`
  ADD CONSTRAINT `shopping_card_user` FOREIGN KEY (`id_custumer`) REFERENCES `user` (`id_user`);

--
-- Constraints for table `state`
--
ALTER TABLE `state`
  ADD CONSTRAINT `state_country` FOREIGN KEY (`id_country`) REFERENCES `country` (`id_country`);

--
-- Constraints for table `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `user_role` FOREIGN KEY (`id_role`) REFERENCES `role` (`id_role`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
