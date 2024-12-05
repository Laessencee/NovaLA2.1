-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 25/11/2024 às 02:56
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
-- Estrutura para tabela `carrinho`
--

CREATE TABLE `carrinho` (
  `id` int(11) NOT NULL,
  `produto_id` int(11) DEFAULT NULL,
  `quantidade` int(11) DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `carrinho`
--

INSERT INTO `carrinho` (`id`, `produto_id`, `quantidade`) VALUES
(2, 6, 11),
(3, 5, 7),
(4, 14, 1);

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
(5, 'Loção facial - Geleia real', 'remove marcas de expressão, remove celulas mortas e é feito a bass de geleia real', 12.30, 40, 'produtos de rosto', 'uploads/67339f83a28cb-product-10.jpg'),
(6, 'Jarro Artesanal', 'Feito de barro pela comunidade de itapipoca', 79.99, 20, 'decoração', 'uploads/6733a42ddbe97-vaso3.jpg'),
(14, ' Blue Orchid Essence', 'O Blue Orchid Essence é uma fragrância rara e cativante, inspirada na delicadeza e excentricidade da orquídea azul. Sua composição única mistura as especialidades das especialidades com um toque fresco e sensual, criando um aroma que exala mistério e sofisticação.', 69.99, 20, 'Afresco floral oriental.', 'uploads/6743c06e672b8-Imagem do WhatsApp de 2024-11-24 à(s) 21.07.57_ab013d22.jpg'),
(17, 'Perfume Royale Nectar', 'O Royale Nectar é um perfume exclusivo que encapsula a essência sofisticada da geleia real. Criado para evocar elegância e naturalidade, ele combina a melíflua da geleia real com notas florais delicadas e um fundo amadeirado aconchegante.', 150.00, 200, 'Afresco floral', 'uploads/6743c48dd2ba5-download (1).jpeg');

--
-- Índices para tabelas despejadas
--

--
-- Índices de tabela `carrinho`
--
ALTER TABLE `carrinho`
  ADD PRIMARY KEY (`id`),
  ADD KEY `produto_id` (`produto_id`);

--
-- Índices de tabela `rgt_produto`
--
ALTER TABLE `rgt_produto`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT para tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `carrinho`
--
ALTER TABLE `carrinho`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de tabela `rgt_produto`
--
ALTER TABLE `rgt_produto`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- Restrições para tabelas despejadas
--

--
-- Restrições para tabelas `carrinho`
--
ALTER TABLE `carrinho`
  ADD CONSTRAINT `carrinho_ibfk_1` FOREIGN KEY (`produto_id`) REFERENCES `rgt_produto` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
