-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 23-Ago-2024 às 14:29
-- Versão do servidor: 10.4.32-MariaDB
-- versão do PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `mecanica_cl`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `cliente`
--

CREATE TABLE `cliente` (
  `id` int(11) NOT NULL,
  `nome` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `telefone` varchar(15) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `cliente`
--

INSERT INTO `cliente` (`id`, `nome`, `email`, `telefone`) VALUES
(1, 'Alice Santos', 'alice.santos@example.com', '1234567890'),
(2, 'Bruno Oliveira', 'bruno.oliveira@example.com', '0987654321'),
(3, 'Carla Ferreira', 'carla.ferreira@example.com', '1122334455'),
(4, 'Diego Souza', 'diego.souza@example.com', '6677889900'),
(5, 'Eva Lima', 'eva.lima@example.com', '5566778899'),
(6, 'Felipe Costa', 'felipe.costa@example.com', '2233445566'),
(7, 'Gabriela Almeida', 'gabriela.almeida@example.com', '3344556677'),
(8, 'Hugo Rocha', 'hugo.rocha@example.com', '7788990011'),
(9, 'Isabela Martins', 'isabela.martins@example.com', '4455667788'),
(10, 'João Pereira', 'joao.pereira@example.com', '9900112233');

-- --------------------------------------------------------

--
-- Estrutura da tabela `itens_do_pedido`
--

CREATE TABLE `itens_do_pedido` (
  `id` int(11) NOT NULL,
  `pedido_id` int(11) NOT NULL,
  `produto` varchar(100) NOT NULL,
  `quantidade` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `itens_do_pedido`
--

INSERT INTO `itens_do_pedido` (`id`, `pedido_id`, `produto`, `quantidade`) VALUES
(1, 1, 'Notebook', 1),
(2, 1, 'Mouse', 2),
(3, 2, 'Teclado', 1),
(4, 3, 'Monitor', 1),
(5, 4, 'Impressora', 1),
(6, 5, 'Cadeira Gamer', 1),
(7, 6, 'Mesa para computador', 1),
(8, 7, 'Headset', 2),
(9, 8, 'Webcam', 1),
(10, 9, 'HD Externo', 1),
(11, 10, 'Pen Drive', 5);

-- --------------------------------------------------------

--
-- Estrutura da tabela `pedido`
--

CREATE TABLE `pedido` (
  `id` int(11) NOT NULL,
  `cliente_id` int(11) NOT NULL,
  `data_ocorrencia` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `pedido`
--

INSERT INTO `pedido` (`id`, `cliente_id`, `data_ocorrencia`) VALUES
(1, 1, '2024-08-01'),
(2, 2, '2024-08-02'),
(3, 3, '2024-08-03'),
(4, 4, '2024-08-04'),
(5, 5, '2024-08-05'),
(6, 6, '2024-08-06'),
(7, 7, '2024-08-07'),
(8, 8, '2024-08-08'),
(9, 9, '2024-08-09'),
(10, 10, '2024-08-10'),
(11, 2, '2024-08-23'),
(12, 2, '2024-08-23');

-- --------------------------------------------------------

--
-- Estrutura da tabela `produto`
--

CREATE TABLE `produto` (
  `id` int(11) NOT NULL,
  `nome_item` varchar(255) NOT NULL,
  `quantidade` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `produto`
--

INSERT INTO `produto` (`id`, `nome_item`, `quantidade`) VALUES
(1, 'Processador Intel i7', 25),
(2, 'Placa Mãe ASUS ROG', 15),
(3, 'Memória RAM 16GB DDR4', 30),
(4, 'SSD 1TB NVMe', 20),
(5, 'Placa de Vídeo NVIDIA RTX 3080', 10),
(6, 'Fonte 750W 80 Plus', 12),
(7, 'Gabinete ATX Cooler Master', 18),
(8, 'Disco Rígido 2TB', 22),
(9, 'Cooler para Processador', 25),
(10, 'Monitor 27\" 4K', 8);

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `cliente`
--
ALTER TABLE `cliente`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Índices para tabela `itens_do_pedido`
--
ALTER TABLE `itens_do_pedido`
  ADD PRIMARY KEY (`id`),
  ADD KEY `pedido_id` (`pedido_id`);

--
-- Índices para tabela `pedido`
--
ALTER TABLE `pedido`
  ADD PRIMARY KEY (`id`),
  ADD KEY `cliente_id` (`cliente_id`);

--
-- Índices para tabela `produto`
--
ALTER TABLE `produto`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `cliente`
--
ALTER TABLE `cliente`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de tabela `itens_do_pedido`
--
ALTER TABLE `itens_do_pedido`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT de tabela `pedido`
--
ALTER TABLE `pedido`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT de tabela `produto`
--
ALTER TABLE `produto`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Restrições para despejos de tabelas
--

--
-- Limitadores para a tabela `itens_do_pedido`
--
ALTER TABLE `itens_do_pedido`
  ADD CONSTRAINT `itens_do_pedido_ibfk_1` FOREIGN KEY (`pedido_id`) REFERENCES `pedido` (`id`);

--
-- Limitadores para a tabela `pedido`
--
ALTER TABLE `pedido`
  ADD CONSTRAINT `pedido_ibfk_1` FOREIGN KEY (`cliente_id`) REFERENCES `cliente` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
