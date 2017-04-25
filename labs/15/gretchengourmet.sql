-- phpMyAdmin SQL Dump
-- version 4.5.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Apr 25, 2017 at 04:18 PM
-- Server version: 5.7.11
-- PHP Version: 5.6.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `gretchengourmet`
--

-- --------------------------------------------------------

--
-- Table structure for table `coffee`
--

CREATE TABLE `coffee` (
  `productid` varchar(9) DEFAULT NULL,
  `COL 2` varchar(40) DEFAULT NULL,
  `COL 3` varchar(150) DEFAULT NULL,
  `COL 4` decimal(5,2) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `coffee`
--

INSERT INTO `coffee` (`productid`, `COL 2`, `COL 3`, `COL 4`) VALUES
('COFFEE001', '	Jamaican Blue Mountain Coffee', '	This extraordinary coffee, famous for its exquisite flavor and strong body, is grown in the majestic Blue Mountain range in Jamaica. Weight: 1 pound.', '22.95'),
('COFFEE002', '	Blue Grove Hawaiian Maui Premium Coffee', '	 This delightful coffee has an aroma that is captivatingly rich and nutty with a faint hint of citrus. Weight: 1 pound.', '18.89'),
('COFFEE003', '	Sumatra Supreme Coffee', '	One of the finest coffees in the world, medium roasted to accentuate its robust character. Weight: 5 pounds.', '29.95'),
('COFFEE004', '	Pure Kona Coffee', '	Grown and processed using traditional Hawaiian methods, then roasted in small batches to maintain peak freshness and flavor. Weight: 10 ounces.', '21.45'),
('COFFEE005', '	Guatemala Antigua Coffee', '	An outstanding coffee with a rich, spicy, and smokey flavor. Weight: 10 ounces.', '7.50');

-- --------------------------------------------------------

--
-- Table structure for table `olives`
--

CREATE TABLE `olives` (
  `productid` varchar(8) DEFAULT NULL,
  `COL 2` varchar(37) DEFAULT NULL,
  `COL 3` varchar(146) DEFAULT NULL,
  `COL 4` decimal(4,2) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `olives`
--

INSERT INTO `olives` (`productid`, `COL 2`, `COL 3`, `COL 4`) VALUES
('OLIVE001', '	Monacale Black Olives', '	Spicy black olives preserved in sunflower oil with fennel seed, salt, garlic, red hot pepper, laurel and wild marjoram. Weight: 15.7 ounces.', '5.99'),
('OLIVE002', '	Picholine Green Olives', '	Almond-shaped olive with a firm texture and fresh taste. Weight: 6 ounces.', '6.99'),
('OLIVE003', '	Garlic Stuffed Olives', '	Cured in the classic Sicilian method for up to nine months. The result is a firm olive with a crisp, mild garlic clove inside. Weight: 10 ounces.', '8.99'),
('OLIVE004', '	Hickory Smoked Almond Stuffed Olives', '	Big, delicious olives stuffed with California almonds, infused with the tantalizing flavor of hickory smoke. Weight: 12 ounces.', '4.99'),
('OLIVE005', '	Magna Grecia Green Olives', '	Spicy green olives preserved in sunflower oil with fennel seed, salt, garlic, red hot pepper, laurel and wild marjoram. Weight: 8 ounces.', '5.99');

-- --------------------------------------------------------

--
-- Table structure for table `spices`
--

CREATE TABLE `spices` (
  `productid` varchar(8) DEFAULT NULL,
  `COL 2` varchar(17) DEFAULT NULL,
  `COL 3` varchar(195) DEFAULT NULL,
  `COL 4` varchar(6) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `spices`
--

INSERT INTO `spices` (`productid`, `COL 2`, `COL 3`, `COL 4`) VALUES
('SPICE001', ' Anise Seed', '	Anise seeds have a sweet perfume and a strong taste similar to that of licorice.  The seeds are often used in Indian cuisine to enhance the flavor of soups and fish. Weight: 4 ounces.', '	3.95'),
('SPICE002', '	Bay Leaf: Ground', '	 Bay leaf is one of the most sought after culinary spices for flavoring soups, casseroles, stews, fish, meat, poultry, puddings and marinades. Weight: 16 ounces.', '	9.65'),
('SPICE003', '	Lovage Root', '	Lovage root comes from Czechoslovakia and Italy. It has a strong, celery like taste. Lovage Root is commonly used in soups and stews. Weight: 4.5 ounces', '	4.39	'),
('SPICE004', '	Marjoram: Whole', '	 Delicate, sweet, pleasant flavor with a slightly bitter undertone. Marjoram is closely related to oregano, but has a more delicate flavor and is a gentler herb than oregano. Weight: 5 ounces.', '	5.45'),
('SPICE005', '	Turmeric: Ground', '	Turmeric is a member of the ginger family and has been used for over 2,000 years in China, India, and the Middle East. It adds a warm, mild aroma and a yellow color to foods. Weight: 4.5 ounces.', '	3.75');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
