-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Generation Time: Dec 20, 2019 at 06:42 PM
-- Server version: 5.6.38
-- PHP Version: 7.2.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Database: `project`
--

-- --------------------------------------------------------

--
-- Table structure for table `branch`
--

CREATE TABLE `branch` (
  `id` int(10) NOT NULL,
  `name` varchar(20) NOT NULL,
  `is_active` tinyint(4) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `branch`
--

INSERT INTO `branch` (`id`, `name`, `is_active`) VALUES
(1, 'Denikade', 1),
(2, 'Egaloya', 1),
(3, 'Bothalegama', 1);

-- --------------------------------------------------------

--
-- Table structure for table `branch_selling_report`
--

CREATE TABLE `branch_selling_report` (
  `id` int(11) NOT NULL,
  `startDate` date NOT NULL,
  `endDate` date NOT NULL,
  `reportTitle` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `branch_selling_report`
--

INSERT INTO `branch_selling_report` (`id`, `startDate`, `endDate`, `reportTitle`) VALUES
(3, '2019-12-08', '2019-12-22', 'AS');

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `id` int(10) NOT NULL,
  `nic` varchar(15) NOT NULL,
  `name` varchar(20) NOT NULL,
  `contactNo` int(10) NOT NULL,
  `branchid` int(11) NOT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`id`, `nic`, `name`, `contactNo`, `branchid`, `is_active`) VALUES
(1, '921343456V', 'pulasthi', 714793733, 3, 1),
(2, '893456768V', 'harsha', 711270345, 1, 1),
(3, '466', 'abcfgfg', 45, 2, 0),
(4, '45676', 'tytttt', 7145655, 2, 1),
(6, '3532', '35453', 773937504, 3, 1),
(7, '3532', '5464', 5646, 3, 1);

-- --------------------------------------------------------

--
-- Table structure for table `customer_order`
--

CREATE TABLE `customer_order` (
  `id` int(10) NOT NULL,
  `cus_id` int(10) NOT NULL,
  `payment_method` varchar(20) NOT NULL,
  `totalAmt` decimal(19,2) DEFAULT NULL,
  `createDate` date NOT NULL,
  `is_active` tinyint(4) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customer_order`
--

INSERT INTO `customer_order` (`id`, `cus_id`, `payment_method`, `totalAmt`, `createDate`, `is_active`) VALUES
(1, 1, 'ready cash', '1058.00', '0000-00-00', 1),
(2, 5, 'Cash on Delivery', '0.00', '0000-00-00', 1),
(3, 6, 'Online Bank Transfer', '161.00', '2019-12-15', 1),
(4, 2, 'Lottery Drawing', '23.00', '2019-12-20', 1);

-- --------------------------------------------------------

--
-- Table structure for table `customer_order_item`
--

CREATE TABLE `customer_order_item` (
  `id` int(10) NOT NULL,
  `item_id` int(10) NOT NULL,
  `catalog` varchar(100) NOT NULL,
  `customer_order_id` int(10) NOT NULL,
  `quantity` int(10) NOT NULL,
  `unit_price` decimal(10,2) NOT NULL,
  `total` int(11) NOT NULL,
  `status` int(11) NOT NULL DEFAULT '0',
  `is_active` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customer_order_item`
--

INSERT INTO `customer_order_item` (`id`, `item_id`, `catalog`, `customer_order_id`, `quantity`, `unit_price`, `total`, `status`, `is_active`) VALUES
(1, 4, 'Medium', 1, 2, '23.00', 46, 0, 1),
(2, 4, 'Medium', 1, 1, '23.00', 23, 1, 1),
(3, 4, 'Medium', 1, 45, '23.00', 1035, 1, 1),
(4, 4, 'Medium', 1, 4, '23.00', 92, 0, 1),
(5, 4, 'Medium', 1, 2, '23.00', 46, 0, 1),
(6, 4, 'Medium', 1, 2, '23.00', 46, 0, 1),
(7, 8, 'Medium', 3, 5, '23.00', 115, 0, 1),
(8, 8, 'Medium', 3, 2, '23.00', 46, 0, 1),
(9, 8, 'Medium', 4, 1, '23.00', 23, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `customer_payment`
--

CREATE TABLE `customer_payment` (
  `id` int(10) NOT NULL,
  `pay_method_id` varchar(10) NOT NULL,
  `co_id` varchar(10) NOT NULL,
  `total_amount` decimal(10,2) NOT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `design`
--

CREATE TABLE `design` (
  `id` int(10) NOT NULL,
  `item_id` int(10) NOT NULL,
  `item_stock` int(10) NOT NULL,
  `unit_price` decimal(10,2) NOT NULL,
  `catalog` varchar(50) NOT NULL,
  `image` longblob,
  `size` varchar(10) NOT NULL,
  `minLevel` int(11) NOT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `design`
--

INSERT INTO `design` (`id`, `item_id`, `item_stock`, `unit_price`, `catalog`, `image`, `size`, `minLevel`, `is_active`) VALUES
(1, 5, 20, '250.00', '', '', 'medium', 0, 1),
(2, 5, 10, '100.00', '', '', 'small', 0, 1),
(3, 6, 50, '200.00', '', '', 'large', 0, 1),
(4, 1, 2, '23.00', 'A', NULL, '2', 2, 1),
(5, 8, 10, '23.00', 'Medium', NULL, '2', 2, 1),
(6, 10, 10, '12.00', 'ASg', NULL, 'Medium', 2, 1);

-- --------------------------------------------------------

--
-- Table structure for table `expenduture`
--

CREATE TABLE `expenduture` (
  `id` int(10) NOT NULL,
  `supplier_order_id` int(10) NOT NULL,
  `total_amount` decimal(10,2) NOT NULL,
  `date` date NOT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `income`
--

CREATE TABLE `income` (
  `id` int(11) NOT NULL,
  `customer_order_id` int(10) NOT NULL,
  `date` date NOT NULL,
  `total_amount` int(10) NOT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `item`
--

CREATE TABLE `item` (
  `id` int(4) NOT NULL,
  `name` varchar(20) NOT NULL,
  `createDate` date NOT NULL,
  `is_active` tinyint(4) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `item`
--

INSERT INTO `item` (`id`, `name`, `createDate`, `is_active`) VALUES
(1, 'cement', '0000-00-00', 1),
(2, 'sand', '0000-00-00', 1),
(3, 'stone', '0000-00-00', 1),
(4, 'kambi', '0000-00-00', 1),
(5, 'flower pot', '0000-00-00', 1),
(6, 'concrete pole', '0000-00-00', 1),
(7, 'we', '0000-00-00', 1),
(8, 'TR', '2019-12-15', 1),
(9, 'WE', '2019-12-15', 1),
(10, 'qq', '2019-12-15', 1);

-- --------------------------------------------------------

--
-- Table structure for table `monthly_income_report`
--

CREATE TABLE `monthly_income_report` (
  `id` int(11) NOT NULL,
  `startDate` date NOT NULL,
  `endDate` date NOT NULL,
  `reportTitle` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `monthly_income_report`
--

INSERT INTO `monthly_income_report` (`id`, `startDate`, `endDate`, `reportTitle`) VALUES
(1, '2019-12-08', '2019-12-29', 'AZ');

-- --------------------------------------------------------

--
-- Table structure for table `product_item_report`
--

CREATE TABLE `product_item_report` (
  `id` int(11) NOT NULL,
  `startDate` date NOT NULL,
  `endDate` date NOT NULL,
  `reportTitle` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `product_item_report`
--

INSERT INTO `product_item_report` (`id`, `startDate`, `endDate`, `reportTitle`) VALUES
(1, '2019-12-08', '2019-12-22', 'RR');

-- --------------------------------------------------------

--
-- Table structure for table `role`
--

CREATE TABLE `role` (
  `id` int(11) NOT NULL,
  `name` varchar(20) NOT NULL,
  `isactive` tinyint(4) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `role`
--

INSERT INTO `role` (`id`, `name`, `isactive`) VALUES
(1, 'Manger', 1),
(2, 'Admin', 1),
(3, 'Operator', 1);

-- --------------------------------------------------------

--
-- Table structure for table `row_materal_report`
--

CREATE TABLE `row_materal_report` (
  `id` int(11) NOT NULL,
  `startDate` date NOT NULL,
  `endDate` date NOT NULL,
  `reportTitle` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `row_materal_report`
--

INSERT INTO `row_materal_report` (`id`, `startDate`, `endDate`, `reportTitle`) VALUES
(1, '2019-12-08', '2019-12-22', 'SD'),
(2, '2019-12-08', '2019-12-22', 'SS');

-- --------------------------------------------------------

--
-- Table structure for table `row_material`
--

CREATE TABLE `row_material` (
  `id` int(10) NOT NULL,
  `name` varchar(200) NOT NULL,
  `stock` decimal(20,0) NOT NULL,
  `minLevel` int(11) NOT NULL,
  `createDate` date NOT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `row_material`
--

INSERT INTO `row_material` (`id`, `name`, `stock`, `minLevel`, `createDate`, `is_active`) VALUES
(1, 'cement', '1800', 0, '0000-00-00', 0),
(2, 'sand', '7500', 0, '0000-00-00', 1),
(3, 'stone', '2500', 0, '0000-00-00', 1),
(4, 'Good New ', '3', 0, '0000-00-00', 1),
(5, 'Good New 2', '4', 0, '0000-00-00', 1),
(6, 'Good New 3', '2', 3, '0000-00-00', 1),
(7, 'Good New 4', '100', 4, '2019-12-15', 1);

-- --------------------------------------------------------

--
-- Table structure for table `row_materials_design`
--

CREATE TABLE `row_materials_design` (
  `id` int(10) NOT NULL,
  `design_id` int(11) NOT NULL,
  `row_material_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `row_materials_design`
--

INSERT INTO `row_materials_design` (`id`, `design_id`, `row_material_id`, `quantity`) VALUES
(1, 1, 6, 12),
(2, 1, 5, 2),
(3, 1, 7, 2),
(4, 6, 6, 2);

-- --------------------------------------------------------

--
-- Table structure for table `supplier`
--

CREATE TABLE `supplier` (
  `id` int(10) NOT NULL,
  `nic` varchar(100) NOT NULL,
  `name` varchar(20) NOT NULL,
  `contact_no` int(11) NOT NULL,
  `address` varchar(1000) NOT NULL,
  `createDate` date NOT NULL,
  `is_active` tinyint(4) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `supplier`
--

INSERT INTO `supplier` (`id`, `nic`, `name`, `contact_no`, `address`, `createDate`, `is_active`) VALUES
(11, '24324234', 'gaya', 719055018, 'No1 , Galkaduwa&#013Neboda', '0000-00-00', 0),
(12, '', 'aruni', 717213922, '', '0000-00-00', 1),
(13, '', 'esfsdf', 2133445, '', '0000-00-00', 1),
(14, '', 'efd', 445, '', '0000-00-00', 1),
(15, '', 'rgtrgh', 46457, '', '0000-00-00', 0),
(16, '', '', 0, '', '0000-00-00', 1),
(19, '3532', 'Hasitha Senanayaka', 773937504, 'No1 , Galkaduwa&#013Neboda', '0000-00-00', 1),
(20, '3532', 'Hasitha Senanayaka', 773937504, 'No1 , Galkaduwa&#013Neboda', '2019-12-15', 1);

-- --------------------------------------------------------

--
-- Table structure for table `supplier_details_report`
--

CREATE TABLE `supplier_details_report` (
  `id` int(11) NOT NULL,
  `startDate` date NOT NULL,
  `endDate` date NOT NULL,
  `reportTitle` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `supplier_details_report`
--

INSERT INTO `supplier_details_report` (`id`, `startDate`, `endDate`, `reportTitle`) VALUES
(1, '2019-12-08', '2019-12-22', 'SS');

-- --------------------------------------------------------

--
-- Table structure for table `supplier_order`
--

CREATE TABLE `supplier_order` (
  `id` int(11) NOT NULL,
  `order_date` date NOT NULL,
  `supplier_id` int(11) NOT NULL,
  `totalAmt` decimal(19,2) NOT NULL,
  `is_active` tinyint(4) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `supplier_order`
--

INSERT INTO `supplier_order` (`id`, `order_date`, `supplier_id`, `totalAmt`, `is_active`) VALUES
(1, '2017-07-17', 13, '46.00', 1),
(2, '2017-07-17', 13, '0.00', 1),
(3, '2017-07-17', 13, '0.00', 1),
(4, '2012-06-13', 12, '0.00', 1),
(5, '2012-06-13', 12, '0.00', 1),
(6, '2012-03-31', 13, '0.00', 1),
(7, '2012-03-31', 13, '0.00', 1),
(8, '2012-03-31', 13, '0.00', 1),
(9, '2012-03-31', 13, '0.00', 1),
(10, '2012-03-31', 13, '0.00', 1),
(11, '2012-03-31', 13, '0.00', 1),
(12, '2012-03-31', 13, '0.00', 1),
(13, '2012-03-31', 13, '0.00', 1),
(14, '2012-03-31', 13, '0.00', 1),
(15, '2012-03-31', 13, '0.00', 1),
(16, '2012-03-31', 13, '0.00', 1),
(17, '2012-03-31', 13, '0.00', 1),
(18, '2012-03-31', 13, '0.00', 1),
(19, '2012-03-31', 13, '0.00', 1),
(20, '2019-12-14', 14, '0.00', 1),
(21, '2019-12-14', 19, '0.00', 1);

-- --------------------------------------------------------

--
-- Table structure for table `supplier_order_item`
--

CREATE TABLE `supplier_order_item` (
  `id` int(11) NOT NULL,
  `supplier_order_id` int(11) NOT NULL,
  `item_id` int(11) NOT NULL,
  `unit_prize` decimal(11,0) NOT NULL,
  `quantity` int(11) NOT NULL,
  `status` int(11) NOT NULL DEFAULT '0',
  `is_active` tinyint(4) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `supplier_order_item`
--

INSERT INTO `supplier_order_item` (`id`, `supplier_order_id`, `item_id`, `unit_prize`, `quantity`, `status`, `is_active`) VALUES
(1, 1, 4, '23', 1, 0, 1),
(2, 10, 5, '23', 12, 0, 1),
(3, 10, 4, '10', 2, 0, 1),
(4, 1, 0, '0', 0, 0, 1),
(5, 0, 0, '0', 0, 0, 1),
(6, 21, 5, '23', 2, 0, 1),
(7, 10, 7, '23', 45, 0, 1),
(8, 7, 7, '23', 45, 0, 1),
(9, 10, 7, '34', 2, 0, 1),
(10, 21, 7, '3', 3, 0, 1),
(11, 21, 7, '23', 5, 0, 1),
(12, 1, 6, '12', 1, 0, 1),
(13, 1, 5, '23', 2, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `nic` varchar(20) NOT NULL,
  `contactNo` varchar(20) NOT NULL,
  `user_name` varchar(20) NOT NULL,
  `password` varchar(1000) NOT NULL,
  `branch` varchar(1000) NOT NULL,
  `userRole` varchar(1000) NOT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `nic`, `contactNo`, `user_name`, `password`, `branch`, `userRole`, `is_active`) VALUES
(4, '3532', '0773937504', 'admin', '202cb962ac59075b964b07152d234b70', 'Egaloya', '3', 1);

-- --------------------------------------------------------

--
-- Table structure for table `user_role`
--

CREATE TABLE `user_role` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `role_id` int(11) NOT NULL,
  `isactive` tinyint(4) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_role`
--

INSERT INTO `user_role` (`id`, `user_id`, `role_id`, `isactive`) VALUES
(1, 5, 1, 1),
(2, 1, 2, 1),
(3, 4, 1, 1),
(4, 2, 3, 1),
(5, 1, 1, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `branch`
--
ALTER TABLE `branch`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `branch_selling_report`
--
ALTER TABLE `branch_selling_report`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`id`),
  ADD KEY `branch_id` (`branchid`);

--
-- Indexes for table `customer_order`
--
ALTER TABLE `customer_order`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id` (`id`),
  ADD KEY `cus_id` (`cus_id`),
  ADD KEY `cus_id_2` (`cus_id`);

--
-- Indexes for table `customer_order_item`
--
ALTER TABLE `customer_order_item`
  ADD PRIMARY KEY (`id`),
  ADD KEY `item_id` (`item_id`),
  ADD KEY `customer_order_id` (`customer_order_id`);

--
-- Indexes for table `customer_payment`
--
ALTER TABLE `customer_payment`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `design`
--
ALTER TABLE `design`
  ADD PRIMARY KEY (`id`),
  ADD KEY `item_id` (`item_id`);

--
-- Indexes for table `expenduture`
--
ALTER TABLE `expenduture`
  ADD PRIMARY KEY (`id`),
  ADD KEY `supplier_order_id` (`supplier_order_id`);

--
-- Indexes for table `income`
--
ALTER TABLE `income`
  ADD PRIMARY KEY (`id`),
  ADD KEY `customer_order_id` (`customer_order_id`);

--
-- Indexes for table `item`
--
ALTER TABLE `item`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `monthly_income_report`
--
ALTER TABLE `monthly_income_report`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product_item_report`
--
ALTER TABLE `product_item_report`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `role`
--
ALTER TABLE `role`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `row_materal_report`
--
ALTER TABLE `row_materal_report`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `row_material`
--
ALTER TABLE `row_material`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `row_materials_design`
--
ALTER TABLE `row_materials_design`
  ADD PRIMARY KEY (`id`),
  ADD KEY `row_material_id` (`row_material_id`) USING BTREE;

--
-- Indexes for table `supplier`
--
ALTER TABLE `supplier`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `supplier_details_report`
--
ALTER TABLE `supplier_details_report`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `supplier_order`
--
ALTER TABLE `supplier_order`
  ADD PRIMARY KEY (`id`),
  ADD KEY `supplier_id` (`supplier_id`);

--
-- Indexes for table `supplier_order_item`
--
ALTER TABLE `supplier_order_item`
  ADD PRIMARY KEY (`id`),
  ADD KEY `order_id` (`supplier_order_id`),
  ADD KEY `item_id` (`item_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_role`
--
ALTER TABLE `user_role`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `role_id` (`role_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `branch`
--
ALTER TABLE `branch`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `branch_selling_report`
--
ALTER TABLE `branch_selling_report`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `customer_order`
--
ALTER TABLE `customer_order`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `customer_order_item`
--
ALTER TABLE `customer_order_item`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `customer_payment`
--
ALTER TABLE `customer_payment`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `design`
--
ALTER TABLE `design`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `expenduture`
--
ALTER TABLE `expenduture`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `income`
--
ALTER TABLE `income`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `item`
--
ALTER TABLE `item`
  MODIFY `id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `monthly_income_report`
--
ALTER TABLE `monthly_income_report`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `product_item_report`
--
ALTER TABLE `product_item_report`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `role`
--
ALTER TABLE `role`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `row_materal_report`
--
ALTER TABLE `row_materal_report`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `row_material`
--
ALTER TABLE `row_material`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `row_materials_design`
--
ALTER TABLE `row_materials_design`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `supplier`
--
ALTER TABLE `supplier`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `supplier_details_report`
--
ALTER TABLE `supplier_details_report`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `supplier_order`
--
ALTER TABLE `supplier_order`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `supplier_order_item`
--
ALTER TABLE `supplier_order_item`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `user_role`
--
ALTER TABLE `user_role`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
