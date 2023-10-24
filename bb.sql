-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 24/10/2023 às 17:11
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
-- Banco de dados: `bb`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `answers`
--

CREATE TABLE `answers` (
  `id_answer` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_quests` int(11) NOT NULL,
  `cat` int(11) NOT NULL,
  `quest` int(11) NOT NULL,
  `answer` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `answers`
--

INSERT INTO `answers` (`id_answer`, `id_user`, `id_quests`, `cat`, `quest`, `answer`) VALUES
(94, 18, 4, 1, 0, '[{\"name\":\"perg0\",\"value\":\"\"}]'),
(95, 18, 4, 1, 1, '[{\"name\":\"perg0\",\"value\":\"off\"},{\"name\":\"perg1\",\"value\":\"off\"}]'),
(96, 18, 4, 1, 2, '[{\"name\":\"perg0\",\"value\":\"\"}]'),
(97, 18, 4, 1, 3, '[{\"name\":\"perg0\",\"value\":\"\"}]'),
(98, 18, 4, 1, 4, '[{\"name\":\"perg0\",\"value\":\"\"}]'),
(99, 18, 4, 1, 5, '[{\"name\":\"perg0\",\"value\":\"\"}]'),
(100, 18, 4, 1, 6, '[{\"name\":\"perg0\",\"value\":\"\"}]'),
(101, 18, 4, 1, 7, '[{\"name\":\"perg0\",\"value\":\"\"}]'),
(102, 18, 4, 1, 8, '[{\"name\":\"perg0\",\"value\":\"\"}]'),
(103, 18, 4, 1, 9, '[{\"name\":\"perg0\",\"value\":\"\"}]'),
(104, 18, 4, 1, 10, '[{\"name\":\"perg0\",\"value\":\"\"}]'),
(105, 18, 4, 1, 11, '[{\"name\":\"perg0\",\"value\":\"\"}]'),
(106, 18, 4, 1, 12, '[{\"name\":\"perg0\",\"value\":\"\"}]'),
(107, 18, 4, 1, 13, '[{\"name\":\"perg0\",\"value\":\"\"}]'),
(108, 18, 4, 1, 14, '[{\"name\":\"perg0\",\"value\":\"\"}]'),
(109, 18, 4, 1, 15, '[{\"name\":\"perg0\",\"value\":\"off\"},{\"name\":\"perg1\",\"value\":\"off\"}]'),
(110, 18, 4, 1, 16, '[{\"name\":\"perg0\",\"value\":\"\"}]'),
(111, 18, 4, 2, 0, '[{\"name\":\"perg0\",\"value\":\"off\"},{\"name\":\"perg1\",\"value\":\"off\"},{\"name\":\"perg2\",\"value\":\"off\"},{\"name\":\"perg3\",\"value\":\"off\"},{\"name\":\"perg4\",\"value\":\"off\"},{\"name\":\"perg5\",\"value\":\"off\"},{\"name\":\"perg6\",\"value\":\"off\"},{\"name\":\"perg7\",\"value\":\"off\"},{\"name\":\"perg8\",\"value\":\"off\"},{\"name\":\"perg9\",\"value\":\"off\"},{\"name\":\"perg10\",\"value\":\"off\"},{\"name\":\"perg11\",\"value\":\"off\"},{\"name\":\"perg12\",\"value\":\"off\"},{\"name\":\"perg13\",\"value\":\"off\"},{\"name\":\"perg14\",\"value\":\"off\"},{\"name\":\"perg15\",\"value\":\"off\"},{\"name\":\"perg16\",\"value\":\"off\"},{\"name\":\"perg17\",\"value\":\"off\"},{\"name\":\"perg18\",\"value\":\"off\"},{\"name\":\"perg19\",\"value\":\"off\"}]'),
(112, 18, 4, 2, 1, '[{\"name\":\"perg0\",\"value\":\"off\"},{\"name\":\"perg1\",\"value\":\"off\"},{\"name\":\"perg2\",\"value\":\"off\"},{\"name\":\"perg3\",\"value\":\"off\"},{\"name\":\"perg4\",\"value\":\"off\"},{\"name\":\"perg5\",\"value\":\"off\"},{\"name\":\"perg6\",\"value\":\"off\"},{\"name\":\"perg7\",\"value\":\"off\"},{\"name\":\"perg8\",\"value\":\"off\"},{\"name\":\"perg9\",\"value\":\"off\"},{\"name\":\"perg10\",\"value\":\"off\"},{\"name\":\"perg11\",\"value\":\"off\"},{\"name\":\"perg12\",\"value\":\"off\"},{\"name\":\"perg13\",\"value\":\"off\"},{\"name\":\"perg14\",\"value\":\"off\"},{\"name\":\"perg15\",\"value\":\"off\"},{\"name\":\"perg16\",\"value\":\"off\"},{\"name\":\"perg17\",\"value\":\"off\"},{\"name\":\"perg18\",\"value\":\"off\"},{\"name\":\"perg19\",\"value\":\"off\"},{\"name\":\"perg20\",\"value\":\"off\"},{\"name\":\"perg21\",\"value\":\"off\"},{\"name\":\"perg22\",\"value\":\"off\"},{\"name\":\"perg23\",\"value\":\"off\"},{\"name\":\"perg24\",\"value\":\"off\"},{\"name\":\"perg25\",\"value\":\"off\"},{\"name\":\"perg26\",\"value\":\"off\"},{\"name\":\"perg27\",\"value\":\"off\"},{\"name\":\"perg28\",\"value\":\"off\"},{\"name\":\"perg29\",\"value\":\"off\"}]'),
(113, 18, 4, 2, 2, '[{\"name\":\"perg0\",\"value\":\"\"},{\"name\":\"perg1\",\"value\":\"\"},{\"name\":\"perg2\",\"value\":\"\"},{\"name\":\"perg3\",\"value\":\"\"},{\"name\":\"perg4\",\"value\":\"\"},{\"name\":\"perg5\",\"value\":\"off\"},{\"name\":\"perg6\",\"value\":\"off\"},{\"name\":\"perg7\",\"value\":\"off\"},{\"name\":\"perg8\",\"value\":\"off\"},{\"name\":\"perg9\",\"value\":\"\"},{\"name\":\"perg10\",\"value\":\"off\"},{\"name\":\"perg11\",\"value\":\"off\"},{\"name\":\"perg14\",\"value\":\"\"},{\"name\":\"perg15\",\"value\":\"\"}]'),
(114, 18, 4, 2, 3, '[{\"name\":\"perg0\",\"value\":\"off\"},{\"name\":\"perg1\",\"value\":\"off\"},{\"name\":\"perg2\",\"value\":\"off\"},{\"name\":\"perg3\",\"value\":\"off\"},{\"name\":\"perg4\",\"value\":\"off\"},{\"name\":\"perg5\",\"value\":\"off\"},{\"name\":\"perg6\",\"value\":\"off\"},{\"name\":\"perg7\",\"value\":\"off\"},{\"name\":\"perg8\",\"value\":\"off\"},{\"name\":\"perg9\",\"value\":\"off\"},{\"name\":\"perg10\",\"value\":\"off\"},{\"name\":\"perg11\",\"value\":\"off\"},{\"name\":\"perg12\",\"value\":\"off\"},{\"name\":\"perg13\",\"value\":\"off\"},{\"name\":\"perg14\",\"value\":\"off\"},{\"name\":\"perg15\",\"value\":\"off\"},{\"name\":\"perg16\",\"value\":\"off\"},{\"name\":\"perg17\",\"value\":\"off\"}]'),
(115, 18, 4, 2, 4, '[{\"name\":\"perg0\",\"value\":\"off\"},{\"name\":\"perg1\",\"value\":\"off\"},{\"name\":\"perg2\",\"value\":\"off\"},{\"name\":\"perg3\",\"value\":\"off\"},{\"name\":\"perg4\",\"value\":\"off\"},{\"name\":\"perg5\",\"value\":\"off\"},{\"name\":\"perg6\",\"value\":\"off\"},{\"name\":\"perg7\",\"value\":\"off\"},{\"name\":\"perg8\",\"value\":\"off\"},{\"name\":\"perg9\",\"value\":\"off\"},{\"name\":\"perg10\",\"value\":\"off\"},{\"name\":\"perg11\",\"value\":\"off\"},{\"name\":\"perg12\",\"value\":\"off\"},{\"name\":\"perg13\",\"value\":\"off\"},{\"name\":\"perg14\",\"value\":\"off\"},{\"name\":\"perg15\",\"value\":\"off\"},{\"name\":\"perg16\",\"value\":\"off\"},{\"name\":\"perg17\",\"value\":\"off\"},{\"name\":\"perg18\",\"value\":\"off\"},{\"name\":\"perg19\",\"value\":\"off\"},{\"name\":\"perg20\",\"value\":\"off\"},{\"name\":\"perg21\",\"value\":\"off\"},{\"name\":\"perg22\",\"value\":\"off\"},{\"name\":\"perg23\",\"value\":\"off\"},{\"name\":\"perg24\",\"value\":\"off\"},{\"name\":\"perg25\",\"value\":\"off\"},{\"name\":\"perg26\",\"value\":\"off\"},{\"name\":\"perg27\",\"value\":\"off\"},{\"name\":\"perg28\",\"value\":\"off\"},{\"name\":\"perg29\",\"value\":\"off\"},{\"name\":\"perg30\",\"value\":\"off\"},{\"name\":\"perg31\",\"value\":\"off\"},{\"name\":\"perg32\",\"value\":\"off\"},{\"name\":\"perg33\",\"value\":\"off\"},{\"name\":\"perg34\",\"value\":\"off\"},{\"name\":\"perg35\",\"value\":\"off\"},{\"name\":\"perg36\",\"value\":\"off\"},{\"name\":\"perg37\",\"value\":\"off\"},{\"name\":\"perg38\",\"value\":\"off\"},{\"name\":\"perg39\",\"value\":\"off\"},{\"name\":\"perg40\",\"value\":\"off\"},{\"name\":\"perg41\",\"value\":\"off\"},{\"name\":\"perg42\",\"value\":\"off\"},{\"name\":\"perg43\",\"value\":\"off\"},{\"name\":\"perg44\",\"value\":\"off\"},{\"name\":\"perg45\",\"value\":\"off\"},{\"name\":\"perg46\",\"value\":\"off\"},{\"name\":\"perg47\",\"value\":\"off\"},{\"name\":\"perg48\",\"value\":\"off\"},{\"name\":\"perg49\",\"value\":\"off\"},{\"name\":\"perg50\",\"value\":\"off\"},{\"name\":\"perg51\",\"value\":\"off\"}]'),
(121, 18, 4, 3, 0, '[{\"name\":\"perg0\",\"value\":\"off\"},{\"name\":\"perg1\",\"value\":\"off\"},{\"name\":\"perg2\",\"value\":\"off\"}]'),
(122, 18, 4, 3, 1, '[{\"name\":\"perg0\",\"value\":\"off\"},{\"name\":\"perg1\",\"value\":\"off\"},{\"name\":\"perg2\",\"value\":\"off\"},{\"name\":\"perg3\",\"value\":\"off\"},{\"name\":\"perg4\",\"value\":\"off\"},{\"name\":\"perg5\",\"value\":\"off\"},{\"name\":\"perg6\",\"value\":\"off\"},{\"name\":\"perg7\",\"value\":\"off\"},{\"name\":\"perg8\",\"value\":\"off\"},{\"name\":\"perg9\",\"value\":\"off\"}]'),
(123, 18, 4, 3, 2, '[{\"name\":\"perg0\",\"value\":\"off\"},{\"name\":\"perg1\",\"value\":\"off\"},{\"name\":\"perg2\",\"value\":\"off\"},{\"name\":\"perg3\",\"value\":\"off\"}]'),
(124, 18, 4, 3, 3, '[{\"name\":\"perg0\",\"value\":\"\"},{\"name\":\"perg1\",\"value\":\"\"},{\"name\":\"perg2\",\"value\":\"\"},{\"name\":\"perg3\",\"value\":\"\"},{\"name\":\"perg4\",\"value\":\"\"}]'),
(125, 18, 4, 3, 4, '[{\"name\":\"perg0\",\"value\":\"\"}]'),
(126, 18, 4, 4, 0, '[{\"name\":\"perg0\",\"value\":\"off\"},{\"name\":\"perg1\",\"value\":\"off\"},{\"name\":\"perg2\",\"value\":\"off\"},{\"name\":\"perg3\",\"value\":\"off\"},{\"name\":\"perg4\",\"value\":\"off\"},{\"name\":\"perg5\",\"value\":\"off\"},{\"name\":\"perg6\",\"value\":\"off\"},{\"name\":\"perg7\",\"value\":\"off\"},{\"name\":\"perg8\",\"value\":\"off\"},{\"name\":\"perg9\",\"value\":\"off\"},{\"name\":\"perg10\",\"value\":\"off\"},{\"name\":\"perg11\",\"value\":\"off\"},{\"name\":\"perg12\",\"value\":\"off\"},{\"name\":\"perg13\",\"value\":\"off\"},{\"name\":\"perg14\",\"value\":\"off\"},{\"name\":\"perg15\",\"value\":\"off\"},{\"name\":\"perg16\",\"value\":\"off\"},{\"name\":\"perg17\",\"value\":\"off\"},{\"name\":\"perg18\",\"value\":\"off\"},{\"name\":\"perg19\",\"value\":\"off\"},{\"name\":\"perg20\",\"value\":\"off\"},{\"name\":\"perg21\",\"value\":\"off\"},{\"name\":\"perg22\",\"value\":\"off\"},{\"name\":\"perg23\",\"value\":\"off\"},{\"name\":\"perg24\",\"value\":\"off\"},{\"name\":\"perg25\",\"value\":\"off\"},{\"name\":\"perg26\",\"value\":\"off\"},{\"name\":\"perg27\",\"value\":\"off\"},{\"name\":\"perg28\",\"value\":\"off\"},{\"name\":\"perg29\",\"value\":\"off\"},{\"name\":\"perg30\",\"value\":\"off\"},{\"name\":\"perg31\",\"value\":\"off\"},{\"name\":\"perg32\",\"value\":\"off\"},{\"name\":\"perg33\",\"value\":\"off\"},{\"name\":\"perg34\",\"value\":\"off\"},{\"name\":\"perg35\",\"value\":\"off\"},{\"name\":\"perg36\",\"value\":\"off\"},{\"name\":\"perg37\",\"value\":\"off\"},{\"name\":\"perg38\",\"value\":\"off\"},{\"name\":\"perg39\",\"value\":\"off\"},{\"name\":\"perg40\",\"value\":\"off\"},{\"name\":\"perg41\",\"value\":\"off\"},{\"name\":\"perg42\",\"value\":\"off\"},{\"name\":\"perg43\",\"value\":\"off\"},{\"name\":\"perg44\",\"value\":\"off\"},{\"name\":\"perg45\",\"value\":\"off\"},{\"name\":\"perg46\",\"value\":\"off\"},{\"name\":\"perg47\",\"value\":\"off\"},{\"name\":\"perg48\",\"value\":\"off\"},{\"name\":\"perg49\",\"value\":\"off\"},{\"name\":\"perg50\",\"value\":\"off\"},{\"name\":\"perg51\",\"value\":\"off\"}]'),
(127, 18, 4, 4, 1, '[{\"name\":\"perg0\",\"value\":\"\"},{\"name\":\"perg1\",\"value\":\"\"},{\"name\":\"perg2\",\"value\":\"\"},{\"name\":\"perg3\",\"value\":\"\"},{\"name\":\"perg4\",\"value\":\"\"},{\"name\":\"perg5\",\"value\":\"\"},{\"name\":\"perg6\",\"value\":\"\"},{\"name\":\"perg7\",\"value\":\"\"},{\"name\":\"perg8\",\"value\":\"\"},{\"name\":\"perg9\",\"value\":\"\"},{\"name\":\"perg10\",\"value\":\"\"},{\"name\":\"perg11\",\"value\":\"\"},{\"name\":\"perg12\",\"value\":\"\"},{\"name\":\"perg13\",\"value\":\"\"},{\"name\":\"perg14\",\"value\":\"\"},{\"name\":\"perg15\",\"value\":\"\"},{\"name\":\"perg16\",\"value\":\"\"},{\"name\":\"perg17\",\"value\":\"\"},{\"name\":\"perg18\",\"value\":\"\"},{\"name\":\"perg19\",\"value\":\"\"},{\"name\":\"perg20\",\"value\":\"\"},{\"name\":\"perg21\",\"value\":\"\"},{\"name\":\"perg22\",\"value\":\"\"}]'),
(128, 18, 4, 5, 0, '[{\"name\":\"perg0\",\"value\":\"\"}]'),
(129, 18, 4, 6, 0, '[{\"name\":\"perg0\",\"value\":\"\"},{\"name\":\"perg1\",\"value\":\"off\"},{\"name\":\"perg2\",\"value\":\"off\"},{\"name\":\"perg3\",\"value\":\"off\"},{\"name\":\"perg4\",\"value\":\"off\"},{\"name\":\"perg5\",\"value\":\"\"},{\"name\":\"perg6\",\"value\":\"off\"},{\"name\":\"perg7\",\"value\":\"off\"},{\"name\":\"perg8\",\"value\":\"off\"},{\"name\":\"perg9\",\"value\":\"off\"},{\"name\":\"perg10\",\"value\":\"\"},{\"name\":\"perg11\",\"value\":\"off\"},{\"name\":\"perg12\",\"value\":\"off\"},{\"name\":\"perg13\",\"value\":\"off\"},{\"name\":\"perg14\",\"value\":\"off\"},{\"name\":\"perg15\",\"value\":\"\"},{\"name\":\"perg16\",\"value\":\"\"},{\"name\":\"perg17\",\"value\":\"\"},{\"name\":\"perg22\",\"value\":\"\"},{\"name\":\"perg27\",\"value\":\"\"}]'),
(130, 18, 4, 6, 1, '[{\"name\":\"perg0\",\"value\":\"\"},{\"name\":\"perg1\",\"value\":\"off\"},{\"name\":\"perg2\",\"value\":\"off\"},{\"name\":\"perg3\",\"value\":\"off\"},{\"name\":\"perg4\",\"value\":\"off\"},{\"name\":\"perg5\",\"value\":\"\"},{\"name\":\"perg6\",\"value\":\"off\"},{\"name\":\"perg7\",\"value\":\"off\"},{\"name\":\"perg8\",\"value\":\"off\"},{\"name\":\"perg9\",\"value\":\"off\"},{\"name\":\"perg10\",\"value\":\"off\"},{\"name\":\"perg11\",\"value\":\"off\"},{\"name\":\"perg12\",\"value\":\"off\"},{\"name\":\"perg13\",\"value\":\"off\"},{\"name\":\"perg14\",\"value\":\"\"},{\"name\":\"perg15\",\"value\":\"\"},{\"name\":\"perg16\",\"value\":\"\"},{\"name\":\"perg17\",\"value\":\"\"},{\"name\":\"perg18\",\"value\":\"off\"},{\"name\":\"perg19\",\"value\":\"off\"},{\"name\":\"perg20\",\"value\":\"off\"},{\"name\":\"perg21\",\"value\":\"off\"},{\"name\":\"perg22\",\"value\":\"off\"},{\"name\":\"perg23\",\"value\":\"off\"},{\"name\":\"perg38\",\"value\":\"\"},{\"name\":\"perg39\",\"value\":\"\"}]'),
(131, 18, 4, 6, 2, '[{\"name\":\"perg0\",\"value\":\"off\"},{\"name\":\"perg1\",\"value\":\"off\"},{\"name\":\"perg2\",\"value\":\"off\"},{\"name\":\"perg3\",\"value\":\"off\"},{\"name\":\"perg4\",\"value\":\"off\"},{\"name\":\"perg5\",\"value\":\"off\"},{\"name\":\"perg6\",\"value\":\"off\"},{\"name\":\"perg7\",\"value\":\"off\"},{\"name\":\"perg8\",\"value\":\"off\"},{\"name\":\"perg9\",\"value\":\"off\"},{\"name\":\"perg10\",\"value\":\"off\"},{\"name\":\"perg11\",\"value\":\"off\"},{\"name\":\"perg12\",\"value\":\"off\"},{\"name\":\"perg13\",\"value\":\"off\"}]'),
(132, 18, 4, 6, 3, '[{\"name\":\"perg0\",\"value\":\"off\"},{\"name\":\"perg1\",\"value\":\"off\"}]');

-- --------------------------------------------------------

--
-- Estrutura para tabela `quests`
--

CREATE TABLE `quests` (
  `id_quest` int(11) NOT NULL,
  `user_quests` int(11) NOT NULL,
  `ong_cat` int(11) NOT NULL,
  `ong_quests` int(11) NOT NULL,
  `date_quest` varchar(53) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `quests`
--

INSERT INTO `quests` (`id_quest`, `user_quests`, `ong_cat`, `ong_quests`, `date_quest`) VALUES
(4, 18, 7, 0, '2023-10-24 10:49:47'),
(5, 18, 1, 0, '2023-10-24 10:59:02');

-- --------------------------------------------------------

--
-- Estrutura para tabela `usuarios`
--

CREATE TABLE `usuarios` (
  `id_user` int(11) NOT NULL,
  `nome` varchar(50) NOT NULL,
  `cargo` varchar(52) NOT NULL,
  `senha` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `telefone` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `usuarios`
--

INSERT INTO `usuarios` (`id_user`, `nome`, `cargo`, `senha`, `email`, `telefone`) VALUES
(18, 'manoel', 'usuario', '202cb962ac59075b964b07152d234b70', 'manoel@gmail.com', 2147483647);

--
-- Índices para tabelas despejadas
--

--
-- Índices de tabela `answers`
--
ALTER TABLE `answers`
  ADD PRIMARY KEY (`id_answer`),
  ADD KEY `id_user` (`id_user`),
  ADD KEY `id_quests` (`id_quests`);

--
-- Índices de tabela `quests`
--
ALTER TABLE `quests`
  ADD PRIMARY KEY (`id_quest`),
  ADD KEY `user` (`user_quests`);

--
-- Índices de tabela `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT para tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `answers`
--
ALTER TABLE `answers`
  MODIFY `id_answer` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=133;

--
-- AUTO_INCREMENT de tabela `quests`
--
ALTER TABLE `quests`
  MODIFY `id_quest` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de tabela `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- Restrições para tabelas despejadas
--

--
-- Restrições para tabelas `answers`
--
ALTER TABLE `answers`
  ADD CONSTRAINT `answers_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `usuarios` (`id_user`),
  ADD CONSTRAINT `answers_ibfk_2` FOREIGN KEY (`id_quests`) REFERENCES `quests` (`id_quest`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
