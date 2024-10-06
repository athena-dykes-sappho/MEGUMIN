-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 07, 2024 at 01:36 AM
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
-- Database: `formulario`
--

-- --------------------------------------------------------

--
-- Table structure for table `mensagem`
--

CREATE TABLE `mensagem` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `number` char(13) NOT NULL,
  `subject` varchar(120) NOT NULL,
  `message` text NOT NULL,
  `date` varchar(255) NOT NULL,
  `time` varchar(255) NOT NULL,
  `read` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `mensagem`
--

INSERT INTO `mensagem` (`id`, `name`, `email`, `number`, `subject`, `message`, `date`, `time`, `read`) VALUES
(1, 'saif', 'luz@gmail.com', '5500991107555', 'asfa', 'asfas', '06/10/2024', '22:36:16', 0);

-- --------------------------------------------------------

--
-- Table structure for table `produto`
--

CREATE TABLE `produto` (
  `id` int(11) NOT NULL,
  `image` longblob NOT NULL,
  `name` varchar(120) NOT NULL,
  `description` text NOT NULL,
  `price` double NOT NULL,
  `quantity` int(4) NOT NULL,
  `sells` int(11) DEFAULT NULL,
  `brand` enum('FUNKO POP','FIGMA','DARK HORSE','TSUME ARTS') NOT NULL,
  `material` enum('PVC','Vinil','ABS','Polystone') NOT NULL,
  `articulation` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `produto`
--

INSERT INTO `produto` (`id`, `image`, `name`, `description`, `price`, `quantity`, `sells`, `brand`, `material`, `articulation`) VALUES
(1, 0x6c6f676f2e706e67, 'megumin pika das galaxia', 'MUITO FOFO', 42, 1, 0, 'FUNKO POP', 'PVC', 0),
(2, 0x4b6974746965732e6a7067, 'Kitties', 'GATITOS GATITOS GATITOS MUITOS FOFOS', 120, 10, 0, 'DARK HORSE', 'Vinil', 1),
(3, 0x4b6f616c612e6a7067, 'Koala', 'muito fofis :333', 0, 24, 0, 'FUNKO POP', 'PVC', 1),
(4, 0x43c3b36469676f2e6a7067, 'Código Limdu', 'Código do William (não Borner)', 300, 1, 0, 'TSUME ARTS', 'Polystone', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbimagem`
--

CREATE TABLE `tbimagem` (
  `id` int(11) NOT NULL,
  `data` longblob NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbimagem`
--

INSERT INTO `tbimagem` (`id`, `data`) VALUES
(1, 0x62643564343331323565633134306133313534303433646534666537663937652e6a7067),
(2, 0x4d6567756d692e706e67),
(3, 0x6c6f676f2e706e67),
(4, 0x4b6f616c612e6a7067),
(5, 0x42616e636f206465206461646f732e6a7067);

-- --------------------------------------------------------

--
-- Table structure for table `usuario`
--

CREATE TABLE `usuario` (
  `id` int(11) NOT NULL,
  `username` varchar(25) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` char(15) NOT NULL,
  `gender` enum('h','m','nb') NOT NULL,
  `number` char(13) NOT NULL,
  `credits` double NOT NULL,
  `admin` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `usuario`
--

INSERT INTO `usuario` (`id`, `username`, `email`, `password`, `gender`, `number`, `credits`, `admin`) VALUES
(1, 'Moss', 'moss@gmail.com', '1234', 'nb', '5500991107554', 999.99, 1),
(2, 'Luz', 'luz@gmail.com', '1213', 'm', '5500991107555', 999.99, 1),
(3, 'William', 'williamlocomotiva@gmail.com', '11111', 'nb', '5500991107556', 999.99, 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `mensagem`
--
ALTER TABLE `mensagem`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `produto`
--
ALTER TABLE `produto`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbimagem`
--
ALTER TABLE `tbimagem`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `mensagem`
--
ALTER TABLE `mensagem`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `produto`
--
ALTER TABLE `produto`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tbimagem`
--
ALTER TABLE `tbimagem`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
