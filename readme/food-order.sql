-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Gazdă: 127.0.0.1
-- Timp de generare: ian. 11, 2022 la 12:10 AM
-- Versiune server: 10.4.21-MariaDB
-- Versiune PHP: 8.0.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Bază de date: `food-order`
--

-- --------------------------------------------------------

--
-- Structură tabel pentru tabel `tbl_admin`
--

CREATE TABLE `tbl_admin` (
  `id` int(10) UNSIGNED NOT NULL,
  `full_name` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Eliminarea datelor din tabel `tbl_admin`
--

INSERT INTO `tbl_admin` (`id`, `full_name`, `username`, `password`) VALUES
(7, 'Vlad-Andrei', 'vladandrei', '040b7cf4a55014e185813e0644502ea9'),
(9, 'Administrator', 'admin', '21232f297a57a5a743894a0e4a801fc3'),
(10, 'Vlad Andrei', 'vlad1', 'f5f26ebcf65a4c9665952296406f8fb9');

-- --------------------------------------------------------

--
-- Structură tabel pentru tabel `tbl_category`
--

CREATE TABLE `tbl_category` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(100) NOT NULL,
  `image_name` varchar(255) NOT NULL,
  `featured` varchar(10) NOT NULL,
  `active` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Eliminarea datelor din tabel `tbl_category`
--

INSERT INTO `tbl_category` (`id`, `title`, `image_name`, `featured`, `active`) VALUES
(6, 'Burger', 'Food_Category_5443.jpg', 'Yes', 'Yes'),
(7, 'Pizza', 'Food_Category_3961.jpg', 'Yes', 'Yes'),
(8, 'Dumplings', 'Food_Category_7957.jpg', 'Yes', 'Yes');

-- --------------------------------------------------------

--
-- Structură tabel pentru tabel `tbl_food`
--

CREATE TABLE `tbl_food` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(100) NOT NULL,
  `description` text NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `image_name` varchar(255) NOT NULL,
  `category_id` int(10) UNSIGNED NOT NULL,
  `featured` varchar(10) NOT NULL,
  `active` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Eliminarea datelor din tabel `tbl_food`
--

INSERT INTO `tbl_food` (`id`, `title`, `description`, `price`, `image_name`, `category_id`, `featured`, `active`) VALUES
(4, 'Classic Pizza', 'Our own receip of pizza, made with love.', '5.00', 'Food-Name-77.jpg', 7, 'Yes', 'Yes'),
(5, 'Chicken Dumplings', 'Dumplings filled up with chicken and souce.', '3.00', 'Food-Name-4367.jpg', 8, 'Yes', 'Yes'),
(6, 'Hambuger', 'Original Hamburger, especially prepared by our chef.', '8.00', 'Food-Name-1466.jpg', 6, 'Yes', 'Yes'),
(7, 'American Burger', 'American burger, made with ham and onion and special sauces.', '5.00', 'Food-Name-4455.jpg', 6, 'No', 'Yes'),
(8, 'Pizza Quatro Carni', 'Sausages, salami, champignons, olives, mozzarella', '8.00', 'Food-Name-9622.jpg', 7, 'No', 'Yes'),
(9, 'Pizza Quattro Formaggi', 'Mozzarella, gorgonzola, parmigiano, ricotta', '9.00', 'Food-Name-8024.jpg', 7, 'No', 'Yes'),
(10, 'Liver Dumplings', 'German liver dumplings served with sauerkraut.', '7.00', 'Food-Name-4088.jpg', 8, 'No', 'Yes'),
(12, 'Dim Sum Pork Dumplings', 'Succulent seasoned pork gets wrapped in dumpling skins, then crisped and steamed before being dunked in chile spiked dipping sauce. ', '5.00', 'Food-Name-8467.jpg', 8, 'No', 'Yes'),
(14, 'Double cheeseburger', 'A burger with double cheese juice onions, fresh lettuce and black angus.', '28.00', 'Food-Name-2806.jpg', 6, 'Yes', 'Yes');

-- --------------------------------------------------------

--
-- Structură tabel pentru tabel `tbl_order`
--

CREATE TABLE `tbl_order` (
  `id` int(10) UNSIGNED NOT NULL,
  `food` varchar(150) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `qty` int(11) NOT NULL,
  `total` decimal(10,2) NOT NULL,
  `order_date` datetime NOT NULL,
  `status` varchar(50) NOT NULL,
  `customer_name` varchar(150) NOT NULL,
  `customer_contact` varchar(20) NOT NULL,
  `customer_email` varchar(150) NOT NULL,
  `customer_address` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Eliminarea datelor din tabel `tbl_order`
--

INSERT INTO `tbl_order` (`id`, `food`, `price`, `qty`, `total`, `order_date`, `status`, `customer_name`, `customer_contact`, `customer_email`, `customer_address`) VALUES
(1, 'Margherita', '12.00', 4, '48.00', '2022-01-03 11:36:22', 'Delivered', 'John Negro', '123456', 'lola@gmail.com', 'street x number 5'),
(2, 'Home Burger', '10.00', 2, '20.00', '2022-01-04 09:38:07', 'Delivered', 'asdf', '1234', 'asd@asd.cs', 'asdfg, 78, asdas');

--
-- Indexuri pentru tabele eliminate
--

--
-- Indexuri pentru tabele `tbl_admin`
--
ALTER TABLE `tbl_admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexuri pentru tabele `tbl_category`
--
ALTER TABLE `tbl_category`
  ADD PRIMARY KEY (`id`);

--
-- Indexuri pentru tabele `tbl_food`
--
ALTER TABLE `tbl_food`
  ADD PRIMARY KEY (`id`);

--
-- Indexuri pentru tabele `tbl_order`
--
ALTER TABLE `tbl_order`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pentru tabele eliminate
--

--
-- AUTO_INCREMENT pentru tabele `tbl_admin`
--
ALTER TABLE `tbl_admin`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT pentru tabele `tbl_category`
--
ALTER TABLE `tbl_category`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT pentru tabele `tbl_food`
--
ALTER TABLE `tbl_food`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT pentru tabele `tbl_order`
--
ALTER TABLE `tbl_order`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
