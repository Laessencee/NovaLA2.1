-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 07/10/2024 às 03:16
-- Versão do servidor: 10.4.32-MariaDB
-- Versão do PHP: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `laessencee`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `rgt_produto`
--

CREATE TABLE `rgt_produto` (
  `id` int(11) NOT NULL,
  `nome` varchar(255) NOT NULL,
  `descricao` text DEFAULT NULL,
  `preco` decimal(10,2) NOT NULL,
  `estoque` int(11) NOT NULL,
  `categoria` varchar(100) DEFAULT NULL,
  `imagem` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `rgt_produto`
--

INSERT INTO `rgt_produto` (`id`, `nome`, `descricao`, `preco`, `estoque`, `categoria`, `imagem`) VALUES
(2, 'pretinho safado', 'capina lote e é safado', 2.50, 1, 'reprodutor', 'uploads/67018cc0c4b1b-101 Sem Título_20240121191144~2.jpg'),
(3, 'pretinho safado', 'capina lote e é safado', 2.50, 1, 'reprodutor', 'uploads/67018d1863429-101 Sem Título_20240121191144~2.jpg'),
(4, 'pretinho safado', 'capina lote e é safado', 2.50, 1, 'reprodutor', 'uploads/67018d32d04d3-101 Sem Título_20240121191144~2.jpg');

--
-- Índices para tabelas despejadas
--

--
-- Índices de tabela `rgt_produto`
--
ALTER TABLE `rgt_produto`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT para tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `rgt_produto`
--
ALTER TABLE `rgt_produto`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
