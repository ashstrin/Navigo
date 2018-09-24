-- phpMyAdmin SQL Dump
-- version 4.5.2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Apr 06, 2017 at 06:52 PM
-- Server version: 10.1.16-MariaDB
-- PHP Version: 5.6.24

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `space`
--

-- --------------------------------------------------------

--
-- Table structure for table `destinations`
--

CREATE DATABASE IF NOT EXISTS space_db DEFAULT charset = utf8;
USE space_db; 

CREATE TABLE IF NOT EXISTS `destinations` (
  `title` varchar(50) NOT NULL,
  `price` int(50) NOT NULL,
  `image` varchar(10000) NOT NULL,
  `description` varchar(200) NOT NULL,
  `destination_id` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `destinations`
--

INSERT INTO `destinations` (`title`, `price`, `image`, `description`, `destination_id`) VALUES
('International Space Station ', 100000, 'https://s.aolcdn.com/hss/storage/midas/3764305813e4aa0c74e886a2f4dde92d/201002171/space-station-fulllbleed.jpg', 'Book a suite at the International Space Station today!', 1),
('Jupiter Shuttle', 1000000, 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTbaI0pz6kUMyeh6zQhszGTkU-162cgfnnJg2Me42erQaga-VcW', 'Come stay a few weeks in the Jupiter Shuttle! ', 3),
('Mar''s Rocket', 750000, 'http://spaceexpectations.files.wordpress.com/2014/02/inspiration-mars-spacecraft.jpg', 'Join us on a voyage to nearby Mars!', 4),
('Explore Venus', 800000, 'http://www.esa.int/var/esa/storage/images/esa_multimedia/images/2003/05/venus_express/9264007-5-eng-GB/Venus_Express_medium.jpg', 'Join us on a journey around Venus!', 5),
('Discover Neptune', 1500000, 'https://encrypted-tbn2.gstatic.com/images?q=tbn:ANd9GcQThJa4JNP9I-jqgELyZk9YkR6XVMftnuqwjpDbpaaILNJTo9E_', 'Come view the big and beautiful Neptune!', 6),
('Premier Inn Hotel Suite', 550000, 'http://www.hotel-r.net/im/hotel/middle-east/sa/moon-hotel-1.jpg', 'Book a suite at the luxurious Premier Inn Hotel at an affordable rate!', 7);

-- --------------------------------------------------------

--
-- Table structure for table `items`
--

CREATE TABLE IF NOT EXISTS `items` (
  `item_id` int(100) NOT NULL,
  `title` varchar(100) NOT NULL,
  `description` varchar(200) NOT NULL,
  `price` int(100) NOT NULL,
  `image` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `user_id` int(100) NOT NULL AUTO_INCREMENT,
  `first_name` varchar(100) NOT NULL,
  `last_name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `role` int(11) NOT NULL,
  `password` varchar(8) NOT NULL,
  `city` varchar(100) NOT NULL,
  `state` varchar(100) NOT NULL,
  `zip` int(100) NOT NULL,
  `street` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


INSERT INTO `items` (`item_id`, `title`, `description`, `price`, `image`, `category`) VALUES
(1, 'Mylar Space Blanket', 'Durable, advanced aluminized dual-sided Mylar blankets are perfect for staying warm', 8.35, 'https://www.moreprepared.com/media/ss_size2/Blanket_Wrap.jpg', 4),
(3, 'Astronaut Ice Cream', 'Delicious ice cream for your space adventure!', 5, 'http://grandpajoescandyshop.com/assets/images/astronautneapolitan.png', 1),
(4, 'Astronaut Ice Cream Sandwhich', 'This ice cream sandwhich is a must for any space explorer!', 5.5, 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSxe3S6p5wA2EngjbbBLLIAT9Oj0eV3xbN7taYtSbgVCOfo36FF', 1),
(5, 'Space Suit', 'Some will be provided, but this is a space suit you could keep with you at home. All space suits included for voyages must be returned to us. ', 5000, 'http://i.dailymail.co.uk/i/pix/2014/09/18/1411078854789_Image_galleryImage_D0P1EF_Space_Suit.JPG', 3),
(6, 'Small Space Food Bundle', 'This is a smaller bundle of different space foods. Some food will be provided to you in your space vehicle as well. ', 50, 'http://i2.cdn.cnn.com/cnnnext/dam/assets/150130130751-space-food-12-exlarge-169.jpg', 1),
(8, 'Pink Space Suit', 'Stay stylish in this pink spacesuit!', 8000, 'http://worth1000.s3.amazonaws.com/submissions/719500/719533_c707_625x1000.jpg', 3),
(9, 'Freeze Dried Strawberries', 'Enjoy these freeze dried strawberries on your next voyage to space!', 5.99, 'https://www.northbaytrading.com/media/catalog/product/cache/1/image/9df78eab33525d08d6e5fb8d27136e95/6/5/650_freeze_dried_strawberries_3_cup.jpg', 1),
(10, 'Large Space Food Bundle', 'Enjoy over 300 different types of food in this large bundle. ', 1200, 'https://img.buzzfeed.com/buzzfeed-static/static/enhanced/webdr01/2013/6/11/14/enhanced-buzz-3298-1370976661-1.jpg', 1),
(11, 'Space T-Shirt', 'Navigo space T-Shirts are complimentary for space travelers, but if you need an additional souvenir T-Shirt buy it here! ', 34, 'https://s-media-cache-ak0.pinimg.com/564x/bc/27/b9/bc27b9ce5409449fa060c983e7745c73.jpg', 3),
(12, 'Cat Space T-Shirt', 'Get this awesome cat space t-shirt today at a low price!', 15, 'https://images-na.ssl-images-amazon.com/images/I/51AmU-r6dmL._SX342_.jpg', 3),
(13, 'Space Pod', 'These pods can attach to your shuttle for a small fee! You get to keep your pod as well as a souvenir! (Training is necessary before use)', 2000000, 'http://www.paragrafix.biz/prodimg/PGX104/1.jpg', 2),
(14, 'Space Doll', 'Get this space doll as a souvenir for your children!', 100, 'https://airandspace.si.edu/sites/default/files/images/WEB10841-2008h.jpg', 2);
--
-- Indexes for dumped tables
--

--
-- Indexes for table `destinations`
--
INSERT INTO `users` (`first_name`, `last_name`, `email`, `role`, `password`, `city`, `state`, `zip`, `street`)

ALTER TABLE `destinations`
  ADD PRIMARY KEY (`destination_id`);

--
-- Indexes for table `items`
--
ALTER TABLE `items`
  ADD PRIMARY KEY (`item_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

ALTER TABLE `users`
ADD  username varchar(15);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `destinations`
--
ALTER TABLE `destinations`
  MODIFY `destination_id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `items`
--
ALTER TABLE `items`
  MODIFY `item_id` int(100) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(100) NOT NULL AUTO_INCREMENT;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
