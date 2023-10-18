-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 18-Out-2023 às 15:47
-- Versão do servidor: 10.4.28-MariaDB
-- versão do PHP: 8.2.4

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
-- Estrutura da tabela `answers`
--

CREATE TABLE `answers` (
  `id_answer` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_quests` int(11) NOT NULL,
  `cat` int(11) NOT NULL,
  `quest` int(11) NOT NULL,
  `answer` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `quests`
--

CREATE TABLE `quests` (
  `id_quest` int(11) NOT NULL,
  `user_quests` int(11) NOT NULL,
  `ong_cat` int(11) NOT NULL,
  `ong_quests` int(11) NOT NULL,
  `date_quest` varchar(53) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuarios`
--

CREATE TABLE `usuarios` (
  `id_user` int(11) NOT NULL,
  `nome` varchar(50) NOT NULL,
  `senha` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `telefone` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `usuarios`
--

INSERT INTO `usuarios` (`id_user`, `nome`, `senha`, `email`, `telefone`) VALUES
(1, 'manoel', '123', 'manualgames@gamil.com', 40028922),
(2, 'manoel', '123', 'manualgames@gamil.com', 40028922),
(3, 'manoel', '123', 'manualgames@gamil.com', 40028922),
(4, 'manoel', '123', 'manualgames@gamil.com', 40028922),
(13, 'Gustavo', '122', '47991153014', 0),
(14, 'Gustavo', '122', '47991153014', 0),
(15, 'Gustavossssss', 'q', '1', 0),
(16, 'Gustavossssss', 'q', 'q', 1),
(17, 'sssss', 'ssssssssss', 'ssssssss', 12);

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `answers`
--
ALTER TABLE `answers`
  ADD PRIMARY KEY (`id_answer`),
  ADD KEY `id_user` (`id_user`),
  ADD KEY `id_quests` (`id_quests`);

--
-- Índices para tabela `quests`
--
ALTER TABLE `quests`
  ADD PRIMARY KEY (`id_quest`),
  ADD KEY `user` (`user_quests`);

--
-- Índices para tabela `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `answers`
--
ALTER TABLE `answers`
  MODIFY `id_answer` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=94;

--
-- AUTO_INCREMENT de tabela `quests`
--
ALTER TABLE `quests`
  MODIFY `id_quest` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de tabela `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- Restrições para despejos de tabelas
--

--
-- Limitadores para a tabela `answers`
--
ALTER TABLE `answers`
  ADD CONSTRAINT `answers_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `usuarios` (`id_user`),
  ADD CONSTRAINT `answers_ibfk_2` FOREIGN KEY (`id_quests`) REFERENCES `quests` (`id_quest`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
