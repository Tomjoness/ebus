-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 18, 2023 at 12:08 PM
-- Server version: 10.4.25-MariaDB
-- PHP Version: 8.0.23

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `shop`
--

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `categoryID` int(11) NOT NULL,
  `catName` varchar(48) NOT NULL,
  `catParent` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`categoryID`, `catName`, `catParent`) VALUES
(1, 'Kitchen and Home Appliances', 0),
(2, 'Computers and Electronics', 0),
(3, 'Sports and Outdoors', 0),
(4, 'Garden and Outdoors', 0),
(5, 'Irons', 1),
(6, 'Cameras', 2),
(7, 'Toasters', 1),
(8, 'Kettles', 1),
(9, 'Laptops', 2),
(10, 'Clothing', 3),
(11, 'Tents', 3),
(12, 'Rucksacks', 3),
(13, 'Storage', 4),
(14, 'Greenhouses', 4),
(15, 'Vacuum Cleaners', 1);

-- --------------------------------------------------------

--
-- Table structure for table `category_product`
--

CREATE TABLE `category_product` (
  `category_categoryID` int(11) NOT NULL,
  `product_productID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `category_product`
--

INSERT INTO `category_product` (`category_categoryID`, `product_productID`) VALUES
(5, 1),
(5, 2),
(6, 3),
(6, 4),
(6, 17),
(7, 5),
(7, 11),
(8, 6),
(8, 12),
(9, 7),
(9, 8),
(10, 9),
(10, 13),
(11, 10),
(12, 14),
(13, 15),
(14, 16),
(15, 18);

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `id` int(11) NOT NULL,
  `name` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`id`, `name`) VALUES
(1, 'jon');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `productID` int(11) NOT NULL,
  `prodName` varchar(72) NOT NULL,
  `prodDesc` varchar(1024) NOT NULL,
  `prodPrice` decimal(6,2) NOT NULL,
  `prodStock` int(11) NOT NULL,
  `prodImage` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`productID`, `prodName`, `prodDesc`, `prodPrice`, `prodStock`, `prodImage`) VALUES
(1, 'Philips GC4521/87 Azur Performer Plus Steam Iron, 2600 W', '<ul><li>Powerful Pressurised Steam Iron with auto steam control produces 50 g of continuous steam and 200 g steam boost for deep creases</li><li>Vertical Steam - iron out creases in curtains or hanging clothes</li><li>T-IonicGlide soleplate - 25% better glide for effortless ironing on all fabrics</li><li>Easy de-scale and reminder: Takes less than 1 minute to descale for longer steam performance</li><li>Heat up time - 2600 W for quick 2 minute heat up</li></ul>', '65.85', 5, 'Biron.jfif'),
(2, 'Morphy Richards Turbosteam 40699 Iron with Diamond Soleplate - Purple', '<ul><li>Diamond soleplate for glide-ability and durability</li><li>Variable steam for easy crease removal</li><li>3 year guarantee</li></ul>', '18.55', 7, 'Piron.jpg'),
(3, 'High Peak Minipack 2 Man Tent', '<ul><li>Material: 100% Polyester, PU coated</li><li>Size: L190 x W120 x H95 cm</li><li>Poles: Steel 16mm Ø</li><li>Floor: 100% Polyethylene</li><li>Weight: 1,6 kg</li><li>1000mm HH</li><li>Weather protected entrance</li></ul>', '34.31', 7, 'tent.jpg'),
(4, 'Morphy Richards 221108 Chroma 2 Slice Toaster, Plum', '<ul><li>Frozen setting - no need to de-frost your bread first for ease and convenience</li><li>Re-heat setting - on those occasions we forget, your toaster will quickly re-heat your toast for you</li><li>Variable browning control - perfect toast, just the way you like it, every time</li><li>Removable crumb tray - easy to keep your toaster clean and tidy</li><li>Cord storage - excess cord can be tidied away to keep your kitchen worktops neat and clutter free</li></ul>', '14.95', 8, 'toaster.jfif'),
(5, 'Mountain Warehouse Talus Mens Long Sleeve Tee Shirt Baselayer Round Neck', '<ul><li>Isotherm</li><li>High Wicking</li><li>100% Polyester</li><li>Machine Washable</li><li>Fastening: Slip On</li><li>Long Sleeved</li><li>Quick drying</li></ul>', '9.99', 20, 'top.jpg'),
(6, 'Keter Store-It-Out Midi Resin Outdoor Garden Storage Shed - Beige/Brown', '<ul><li>Durable, weather-resistant construction</li><li>Opens from the top or the front</li><li>Floor panel included ^ Stores two 120 L/32 G trash cans and 845 L/225 G capacity</li><li>Built-in support for shelf</li></ul>', '85.00', 10, 'box.jfif');

-- --------------------------------------------------------

--
-- Table structure for table `purchase`
--

CREATE TABLE `purchase` (
  `pid` int(11) NOT NULL,
  `vistor_name` varchar(20) NOT NULL,
  `date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `purchase`
--

INSERT INTO `purchase` (`pid`, `vistor_name`, `date`) VALUES
(1, 'jon', '2023-03-18 12:07:51');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`categoryID`);

--
-- Indexes for table `category_product`
--
ALTER TABLE `category_product`
  ADD PRIMARY KEY (`category_categoryID`,`product_productID`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`productID`);

--
-- Indexes for table `purchase`
--
ALTER TABLE `purchase`
  ADD PRIMARY KEY (`pid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `categoryID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `productID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
