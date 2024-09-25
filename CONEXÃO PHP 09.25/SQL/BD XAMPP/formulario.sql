-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 25-Set-2024 às 14:38
-- Versão do servidor: 10.4.21-MariaDB
-- versão do PHP: 7.3.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `formulario`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `mensagem`
--

CREATE TABLE `mensagem` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `message` text NOT NULL,
  `date` varchar(255) NOT NULL,
  `time` varchar(255) NOT NULL,
  `gender` enum('h','m','nb') NOT NULL,
  `number` char(13) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estrutura da tabela `produto`
--

CREATE TABLE `produto` (
  `id` int(11) NOT NULL,
  `image` longblob NOT NULL,
  `name` varchar(120) NOT NULL,
  `description` text NOT NULL,
  `price` double NOT NULL,
  `quantity` int(4) NOT NULL,
  `brand` enum('FUNKO POP','FIGMA','DARK HORSE','TSUME ARTS') NOT NULL,
  `material` enum('PVC','Vinil','ABS','Polystone') NOT NULL,
  `articulation` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `produto`
--

INSERT INTO `produto` (`id`, `image`, `name`, `description`, `price`, `quantity`, `brand`, `material`, `articulation`) VALUES
(2, 0x6c6f676f2e706e67, 'megumin pika das galaxia', 'MUITO FOFO', 42, 1, 'FUNKO POP', 'PVC', 0),
(3, 0x4b6974746965732e6a7067, 'Kitties', 'GATITOS GATITOS GATITOS MUITOS FOFOS', 120, 10, 'DARK HORSE', 'Vinil', 1),
(4, 0x4b6f616c612e6a7067, 'Koala', 'muito fofis :3', 0, 24, 'FUNKO POP', 'PVC', 1),
(5, 0x43c3b36469676f2e6a7067, 'Código Limdu', 'Código do William (não Borner)', 300, 1, 'TSUME ARTS', 'Polystone', 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `tbimagem`
--

CREATE TABLE `tbimagem` (
  `id` int(11) NOT NULL,
  `data` longblob NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `tbimagem`
--

INSERT INTO `tbimagem` (`id`, `data`) VALUES
(1, 0x62643564343331323565633134306133313534303433646534666537663937652e6a7067),
(6, 0x4d6567756d692e706e67),
(7, 0x6c6f676f2e706e67),
(8, 0x4b6f616c612e6a7067),
(9, 0x42616e636f206465206461646f732e6a7067);

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuario`
--

CREATE TABLE `usuario` (
  `id` int(11) NOT NULL,
  `username` varchar(25) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` char(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `usuario`
--

INSERT INTO `usuario` (`id`, `username`, `email`, `password`) VALUES
(1, 'Moss', 'moss@gmail.com', '1234'),
(2, 'Luz', 'luz@gmail.com', '1212');

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `mensagem`
--
ALTER TABLE `mensagem`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `produto`
--
ALTER TABLE `produto`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `tbimagem`
--
ALTER TABLE `tbimagem`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `mensagem`
--
ALTER TABLE `mensagem`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `produto`
--
ALTER TABLE `produto`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de tabela `tbimagem`
--
ALTER TABLE `tbimagem`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de tabela `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
