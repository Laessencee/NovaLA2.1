-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 17/09/2024 às 22:07
-- Versão do servidor: 10.4.28-MariaDB
-- Versão do PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `formulario_db`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(6) UNSIGNED NOT NULL,
  `nome` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `senha` varchar(255) NOT NULL,
  `data_registro` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `usuarios`
--

INSERT INTO `usuarios` (`id`, `nome`, `email`, `senha`, `data_registro`) VALUES
(6, 'nykollasn', 'nykollas@123.com', '$2y$10$HNqC2GpfhFGOvhOQU9uYnO4H68aoI.90h/e2eArv5M6xofQCqbUyu', '2024-09-13 03:05:38'),
(7, 'rrefg', 'nyhkotyk@kork.com', '$2y$10$jMSPvk8ykk60/jnT8nlY5O5.DIIpYO3BlzgdQtWChDoukJJn.XhbS', '2024-09-14 22:07:38'),
(8, 'nykollas', 'nykollas@idsa.con', '$2y$10$sptXpOIxdrepmTVlcitKgOvsbXbImA9tkmYUL0o6YPTVpmYroNJr6', '2024-09-14 22:31:45'),
(9, 'nykollas', 'estevao@dcdc.com', '$2y$10$bWbdSwQBMc74hqniVU.Fd.F79txiYeYZwN0lg/HSouQ7bdAVZdIAe', '2024-09-17 18:58:14'),
(10, 'cdcdcd', 'ewfefefe@xdcss.c', '$2y$10$41KIaz6mpjxBfQtBtHysRO7tmA9Ay7CHFRIaHKnS0/rcCnxIl7DYm', '2024-09-17 19:20:41'),
(11, 'nykollas', 'fbifvfmiovv@odem.com', '$2y$10$rdDyQtlDwA68qW77qbgWAu9Z7neA29YohhC0Aa10J.JLhI2tPkKgm', '2024-09-17 20:00:41'),
(12, 'vvkfd', 'pkokok@seaxzf.xp', '$2y$10$6bpUZ5jRge910VxHTir2yukRohjIIqXyfjkZzJMAe5lCOJsz5R27K', '2024-09-17 20:04:49');

--
-- Índices para tabelas despejadas
--

--
-- Índices de tabela `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT para tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(6) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
