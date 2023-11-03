-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 31-Out-2023 às 16:21
-- Versão do servidor: 10.4.27-MariaDB
-- versão do PHP: 7.4.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `quimico`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `questoes`
--

CREATE TABLE `questoes` (
  `id` int(11) NOT NULL,
  `Pontos` int(11) NOT NULL,
  `equacao` varchar(45) NOT NULL,
  `Respostas_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Extraindo dados da tabela `questoes`
--

INSERT INTO `questoes` (`id`, `Pontos`, `equacao`, `Respostas_id`) VALUES
(101, 100, 'K2Cr2O7(aq) + H2O(l) + S(g) → KOH(aq) + Cr2O3', 201);

-- --------------------------------------------------------

--
-- Estrutura da tabela `responde`
--

CREATE TABLE `responde` (
  `id` int(11) NOT NULL,
  `Questoes_id` int(11) NOT NULL,
  `Respostas_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `respostas`
--

CREATE TABLE `respostas` (
  `id` int(11) NOT NULL DEFAULT 0,
  `RespostaCerta` varchar(45) DEFAULT NULL,
  `RespostaErrada` varchar(45) DEFAULT NULL,
  `RespostaErrada2` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Extraindo dados da tabela `respostas`
--

INSERT INTO `respostas` (`id`, `RespostaCerta`, `RespostaErrada`, `RespostaErrada2`) VALUES
(201, '2 K2Cr2O7(aq) + 2 H2O(l) + 3 S(g) → 4 KOH(aq)', '2 K2Cr2O7(aq) + 2 H2O(l) + 2 S(g) → 2 KOH(aq)',' K2Cr2O7(aq) + 1 H2O(l) + S(g) → 2 KOH(aq)');

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuario`
--

CREATE TABLE `usuario` (
  `idUsuario` int(11) NOT NULL,
  `Nickname` varchar(45) NOT NULL,
  `Pontos` int(11) NOT NULL,
  `Tempo` time NOT NULL,
  `Responde_id` int(11) NOT NULL,
  `Email` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `questoes`
--
ALTER TABLE `questoes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_Questoes_Respostas1` (`Respostas_id`);

--
-- Índices para tabela `responde`
--
ALTER TABLE `responde`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_Responde_Questoes1` (`Questoes_id`),
  ADD KEY `fk_Responde_Respostas1` (`Respostas_id`);

--
-- Índices para tabela `respostas`
--
ALTER TABLE `respostas`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`idUsuario`),
  ADD KEY `fk_Usuario_Responde1` (`Responde_id`);

--
-- Restrições para despejos de tabelas
--

--
-- Limitadores para a tabela `questoes`
--
ALTER TABLE `questoes`
  ADD CONSTRAINT `fk_Questoes_Respostas1` FOREIGN KEY (`Respostas_id`) REFERENCES `respostas` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_Questoes_Respostas1` FOREIGN KEY (`Respostas_id`) REFERENCES `respostas` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `responde`
--
ALTER TABLE `responde`
  ADD CONSTRAINT `fk_Responde_Questoes1` FOREIGN KEY (`Questoes_id`) REFERENCES `questoes` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_Responde_Respotas1` FOREIGN KEY (`Respostas_id`) REFERENCES `respostas` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `usuario`
--
ALTER TABLE `usuario`
  ADD CONSTRAINT `fk_Usuario_Responde1` FOREIGN KEY (`Responde_id`) REFERENCES `responde` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_Usuário_Responde1` FOREIGN KEY (`Responde_id`) REFERENCES `responde` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
