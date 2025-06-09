-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 02, 2025 at 06:17 AM
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
-- Database: `biblioteca`
--

-- --------------------------------------------------------

--
-- Table structure for table `categoria`
--

CREATE TABLE `categoria` (
  `id_categoria` int(11) NOT NULL,
  `nome_categoria` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `emprestimo`
--

CREATE TABLE `emprestimo` (
  `id_emprestimo` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `id_livro` int(11) NOT NULL,
  `data_emprestimo` datetime DEFAULT current_timestamp(),
  `data_devolucao` datetime DEFAULT NULL,
  `status` enum('ativo','devolvido') DEFAULT 'ativo'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `livro`
--

CREATE TABLE `livro` (
  `id_livro` int(11) NOT NULL,
  `titulo` varchar(150) NOT NULL,
  `autor` varchar(100) DEFAULT NULL,
  `descricao` text DEFAULT NULL,
  `imagem` varchar(255) DEFAULT NULL,
  `status` enum('disponivel','alugado') DEFAULT 'disponivel'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `livro_categoria`
--

CREATE TABLE `livro_categoria` (
  `id_livro` int(11) NOT NULL,
  `id_categoria` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `usuario`
--

CREATE TABLE `usuario` (
  `id_usuario` int(11) NOT NULL,
  `nome` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `senha` varchar(255) NOT NULL,
  `tipo` enum('admin','leitor') DEFAULT 'leitor'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categoria`
--
ALTER TABLE `categoria`
  ADD PRIMARY KEY (`id_categoria`);

--
-- Indexes for table `emprestimo`
--
ALTER TABLE `emprestimo`
  ADD PRIMARY KEY (`id_emprestimo`),
  ADD KEY `id_usuario` (`id_usuario`),
  ADD KEY `id_livro` (`id_livro`);

--
-- Indexes for table `livro`
--
ALTER TABLE `livro`
  ADD PRIMARY KEY (`id_livro`);

--
-- Indexes for table `livro_categoria`
--
ALTER TABLE `livro_categoria`
  ADD PRIMARY KEY (`id_livro`,`id_categoria`),
  ADD KEY `id_categoria` (`id_categoria`);

--
-- Indexes for table `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id_usuario`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categoria`
--
ALTER TABLE `categoria`
  MODIFY `id_categoria` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `emprestimo`
--
ALTER TABLE `emprestimo`
  MODIFY `id_emprestimo` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `livro`
--
ALTER TABLE `livro`
  MODIFY `id_livro` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `emprestimo`
--
ALTER TABLE `emprestimo`
  ADD CONSTRAINT `emprestimo_ibfk_1` FOREIGN KEY (`id_usuario`) REFERENCES `usuario` (`id_usuario`) ON DELETE CASCADE,
  ADD CONSTRAINT `emprestimo_ibfk_2` FOREIGN KEY (`id_livro`) REFERENCES `livro` (`id_livro`) ON DELETE CASCADE;

--
-- Constraints for table `livro_categoria`
--
ALTER TABLE `livro_categoria`
  ADD CONSTRAINT `livro_categoria_ibfk_1` FOREIGN KEY (`id_livro`) REFERENCES `livro` (`id_livro`) ON DELETE CASCADE,
  ADD CONSTRAINT `livro_categoria_ibfk_2` FOREIGN KEY (`id_categoria`) REFERENCES `categoria` (`id_categoria`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
