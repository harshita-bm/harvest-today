-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 23, 2025 at 07:37 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `harvest today 1`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `admin_id` int(11) NOT NULL,
  `username` varchar(15) NOT NULL,
  `password` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`admin_id`, `username`, `password`) VALUES
(1, 'admin', '12!@ABab');

-- --------------------------------------------------------

--
-- Table structure for table `blog`
--

CREATE TABLE `blog` (
  `blog_id` int(11) NOT NULL,
  `blog_heading` varchar(300) NOT NULL,
  `blog_content` mediumtext NOT NULL,
  `blog_image` varchar(600) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `blog`
--

INSERT INTO `blog` (`blog_id`, `blog_heading`, `blog_content`, `blog_image`) VALUES
(1, 'How Pesticides Work?', '\r\nAll pesticides work by disrupting some natural mechanism within the biology of the targeted plant, insect or animal species. Most of these natural or man-made chemicals kill their targets. Some protect crops or livestock by repelling pests.', '../uploads/pesticides.jpg'),
(3, 'What are the uses of fertilizers?', 'Fertilizers replace the nutrients that crops remove from the soil. Without the addition of fertilizers, crop yields and agricultural productivity would be significantly reduced. Fertilizers are added to crops in order to produce enough food to feed the human population. ', '../uploads/ferti.jpg'),
(4, 'How To Grow Healthy Plants From Seeds ?', 'Every hardy plant started out as a carefully nurtured seed. The first step to growing successful plants from seed is to closely read their instructions so you know exactly what each plant needs to thrive.', '../uploads/r0_0_4928_3263_w1200_h678_fmax.jpg'),
(5, 'Why Is Nursery Important In Planting?', 'In a nursery, plants are nurtured by providing them with optimum growing conditions to ensure germination. Nursery saves considerable time for the raising of the next crop. Among flower crops, majority of the annuals are propagated by seeds and require a nursery for raising the seedlings', '../uploads/nursery1.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `cart_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `user_idc` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `cart_total` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `category_id` int(11) NOT NULL,
  `category_name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`category_id`, `category_name`) VALUES
(1, 'Seeds'),
(3, 'Fertilizers'),
(4, 'Pesticides'),
(5, 'Nursery');

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

CREATE TABLE `feedback` (
  `feedback_id` int(11) NOT NULL,
  `message` varchar(150) NOT NULL,
  `user_idf` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `feedback`
--

INSERT INTO `feedback` (`feedback_id`, `message`, `user_idf`) VALUES
(1, 'Very Useful.', 1);

-- --------------------------------------------------------

--
-- Table structure for table `location`
--

CREATE TABLE `location` (
  `location_id` int(11) NOT NULL,
  `location_name` varchar(50) NOT NULL,
  `location_imagedb` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `location`
--

INSERT INTO `location` (`location_id`, `location_name`, `location_imagedb`) VALUES
(1, 'Madikeri', '../uploads/IMG_20220227_124110.jpg'),
(2, 'Mangalore', '../uploads/IMG_20220614_114140.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `order_id` int(11) NOT NULL,
  `cart_id` int(11) NOT NULL,
  `user_ido` int(11) NOT NULL,
  `full_name` varchar(150) NOT NULL,
  `country` varchar(150) NOT NULL,
  `street` varchar(150) NOT NULL,
  `city` varchar(150) NOT NULL,
  `pincode` int(10) NOT NULL,
  `product_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `cart_total` int(11) NOT NULL,
  `phone` int(11) NOT NULL,
  `datetime` date NOT NULL,
  `order_status` varchar(150) NOT NULL,
  `email` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`order_id`, `cart_id`, `user_ido`, `full_name`, `country`, `street`, `city`, `pincode`, `product_id`, `quantity`, `cart_total`, `phone`, `datetime`, `order_status`, `email`) VALUES
(1, 9, 1, 'Sooraj', 'India', 'Moodabidri', 'Magalore', 575003, 2, 1, 120, 2147483647, '2022-08-21', 'order cancelled', 'sooraj@gmail.com'),
(2, 10, 1, 'Sooraj', 'India', 'Moodabidri', 'Magalore', 575003, 5, 2, 160, 2147483647, '2022-08-21', 'order accepted', 'sooraj@gmail.com'),
(3, 13, 1, 'Harshitha BM', 'India', 'dfchjbklm', 'fhgjknml', 741585, 3, 4, 720, 2147483647, '2025-02-23', 'pending', 'harsh@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

CREATE TABLE `payment` (
  `payment_id` int(11) NOT NULL,
  `user_idp` int(11) NOT NULL,
  `card_number` int(19) NOT NULL,
  `expiry` varchar(7) NOT NULL,
  `transaction_id` int(25) NOT NULL,
  `payment_method` varchar(150) NOT NULL,
  `order_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `pay_status` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `payment`
--

INSERT INTO `payment` (`payment_id`, `user_idp`, `card_number`, `expiry`, `transaction_id`, `payment_method`, `order_id`, `product_id`, `pay_status`) VALUES
(1, 1, 0, '', 123456789, 'upi', 1, 2, 'refunded'),
(2, 1, 0, '', 123456789, 'upi', 2, 5, ''),
(3, 1, 0, '', 0, 'cash', 3, 3, '');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `product_id` int(11) NOT NULL,
  `product_name` varchar(150) NOT NULL,
  `product_price` int(11) NOT NULL,
  `product_imagedb` varchar(150) NOT NULL,
  `category_idp` varchar(11) NOT NULL,
  `product_description` varchar(150) NOT NULL,
  `retailer_idp` int(11) NOT NULL,
  `product_status` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`product_id`, `product_name`, `product_price`, `product_imagedb`, `category_idp`, `product_description`, `retailer_idp`, `product_status`) VALUES
(1, 'Wheat', 50, '../uploads/pexels-pixabay-54084 (1).jpg', '1', 'Wheat is a bunch grass with upright tillers. The leaves are rolled in the whorl. Leaf blades are smooth near the base and rough near tip on the upper ', 1, 'available'),
(2, 'Snake Plant', 120, '../uploads/snake plant nursery.jpg', '5', 'By releasing oxygen and adding moisture to the air, snake plants can help lessen the impact of airborne allergens like dust and dander.', 1, 'available'),
(3, 'Agronio ', 180, '../uploads/agronio fertilizr.webp', '3', 'Agronio, is one of the best fertilizer manufacturers & suppliers in Coimbatore, India, we harbour organic fertilizer products to nurture plants and so', 1, 'available'),
(4, 'Agenda 25ec', 250, '../uploads/pesti1.jpg', '4', 'Agenda contains active ingredient fipronil. For conducting Post-construction or Pre-construction anti-termite treatment, Agenda should be mixed with w', 1, 'available'),
(5, 'Maize', 80, '../uploads/pexels-pixabay-209389.jpg', '1', 'Maize Seeds, which are one of the most popular cereal grains in the world. The products made from maize are as corn, and widely used in preparation of', 1, 'available'),
(6, 'Orchids', 850, '../uploads/orchids nursery.jpg', '5', 'The orchid family is probably one of the most important of plant families from a horticultural point of view. Other than the horticultural uses to whi', 1, 'unavailable'),
(7, 'NPK', 280, '../uploads/go garden ferilizer.jpg', '3', 'NPK fertilizer contains three essential nutrients needed for plant growth and overall plant health. These three essential nutrients include nitrogen (', 1, 'available'),
(8, 'Jeevamruth', 550, '../uploads/pesti2.jpg', '4', 'Jeevamrut is a liquid organic manure which is an excellent source of natural carbon and biomass that contains macro and micro nutrients required by cr', 1, 'available'),
(9, 'Rock Phosphate', 525, '../uploads/phosphate.jpg', '3', 'Rock phosphate (RP) is an important natural source of P and is used as raw material for the production of chemical phosphatic fertilizers', 1, 'available'),
(10, 'Vermi Compost', 480, '../uploads/compost.jpg', '3', 'Physically, vermicompost-treated soil has better aeration, porosity, bulk density and water retention. ', 1, 'available'),
(12, 'Proclaim insecticide ', 600, '../uploads/proclaim.webp', '4', 'Proclaim is a modern insecticide of Avermectin group. Proclaim is a multipurpose world renowned soluble granular insecticide.', 1, 'available'),
(13, 'Neem Oil', 180, '../uploads/neem;.jpg', '4', 'Neem oil kills a wide variety of insects, including aphids, mealybugs, whiteflies, Japanese beetles, leafhoppers, thrips, fungus gnats, and other gard', 1, 'available'),
(14, 'French Bean Seeds', 99, '../uploads/French-beans-seeds-op_1024x1024_f2b71e08-51f3-42cd-885d-fee800c9e1d7_large.webp', '1', 'A bean is the seed of one of several genera of the flowering plant family Fabaceae, which are used as vegetables for human or animal food. ', 1, 'available'),
(15, 'Hybrid Tomato Seeds', 60, '../uploads/TOMATO-HYBRID_900x.webp', '1', 'Every tomato seed contains a tiny tomato plant that is alive but dormant.', 1, 'available'),
(16, 'Caladium bicolor ', 609, '../uploads/pg-caladium-white-800x800.jpg', '5', 'Caladium bicolor, called Heart of Jesus, is a species in the genus Caladium from Latin America.', 1, 'available'),
(17, 'Tulip Plant', 300, '../uploads/fsn-potted-spring-tulips-6inch-blooming-plant-169.425.jpg', '5', 'The tulip produces two or three thick bluish green leaves that are clustered at the base of the plant.', 1, 'available');

-- --------------------------------------------------------

--
-- Table structure for table `retailer`
--

CREATE TABLE `retailer` (
  `retailer_id` int(11) NOT NULL,
  `username` varchar(15) NOT NULL,
  `password` varchar(11) NOT NULL,
  `retailer_name` varchar(50) NOT NULL,
  `phone` varchar(10) NOT NULL,
  `retailer_imagedb` varchar(150) NOT NULL,
  `status` varchar(50) NOT NULL,
  `shop_name` varchar(150) NOT NULL,
  `email` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `retailer`
--

INSERT INTO `retailer` (`retailer_id`, `username`, `password`, `retailer_name`, `phone`, `retailer_imagedb`, `status`, `shop_name`, `email`) VALUES
(1, 'mohan', '12!@abAB', 'Mohan Bidrupane', '9972374779', '../uploads/face1.jpg', 'approved', 'Bidrupane shop', 'mohan@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_id` int(11) NOT NULL,
  `username` varchar(15) NOT NULL,
  `password` varchar(11) NOT NULL,
  `user_name` varchar(50) NOT NULL,
  `phone` varchar(10) NOT NULL,
  `user_imagedb` varchar(150) NOT NULL,
  `status` varchar(50) NOT NULL,
  `email` varchar(80) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `username`, `password`, `user_name`, `phone`, `user_imagedb`, `status`, `email`) VALUES
(1, 'harsh', '123', 'Harshitha BM', '8861144555', '../uploads/face10.jpg', 'pending', 'harsh@gmail.com'),
(2, 'aish', 'Aiya2001!.', 'Aishwarya', '8899665541', '../uploads/IMG_5183.JPG', 'pending', 'aishwarya@gmail.com');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `blog`
--
ALTER TABLE `blog`
  ADD PRIMARY KEY (`blog_id`);

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`cart_id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `feedback`
--
ALTER TABLE `feedback`
  ADD PRIMARY KEY (`feedback_id`);

--
-- Indexes for table `location`
--
ALTER TABLE `location`
  ADD PRIMARY KEY (`location_id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`order_id`);

--
-- Indexes for table `payment`
--
ALTER TABLE `payment`
  ADD PRIMARY KEY (`payment_id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`product_id`);

--
-- Indexes for table `retailer`
--
ALTER TABLE `retailer`
  ADD PRIMARY KEY (`retailer_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `blog`
--
ALTER TABLE `blog`
  MODIFY `blog_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `cart_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `feedback`
--
ALTER TABLE `feedback`
  MODIFY `feedback_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `location`
--
ALTER TABLE `location`
  MODIFY `location_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `payment`
--
ALTER TABLE `payment`
  MODIFY `payment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `retailer`
--
ALTER TABLE `retailer`
  MODIFY `retailer_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
