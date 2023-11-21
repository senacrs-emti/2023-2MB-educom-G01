-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 21-Nov-2023 às 21:56
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
(101, 100, 'K2Cr2O7(aq)+ H2O(l)+ S(g)→ KOH(aq)+ Cr2O3', 201),
(103, 100, 'KMnO4(aq)+ FeCl2(aq)+ HCl(aq)→  MnCl2(aq)', 203),
(104, 100, 'Ca(OH)2+ H3PO4→ Ca3(PO4)2+ H2O', 204),
(105, 100, 'NO2- H+ CO(NH2)2→ N2+ CO2+ H2O', 205),
(106, 100, 'Cu+ HNO3→ Cu(NO3)2+ NO2+ H2O', 206),
(107, 100, 'K2Cr2O7+ HCl→ CrCl3+ KCl+ H2O+ Cl2', 207),
(108, 100, 'Na2CO3+ HCl→ NaCl+ CO2+ H2O', 208),
(109, 100, 'C3H8+ O2→ CO2+ H2O', 209),
(110, 100, 'Na2SO4+ BaCl2→ BaSO4+ NaCl', 210),
(111, 100, 'Fe2O3+ H2→ Fe+ H2O', 211),
(112, 100, 'C2H5OH+ O2→ CO2+ H2O', 212);

-- --------------------------------------------------------

--
-- Estrutura da tabela `responde`
--

CREATE TABLE `responde` (
  `id` int(11) NOT NULL,
  `Questoes_id` int(11) NOT NULL,
  `Respostas_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Extraindo dados da tabela `responde`
--

INSERT INTO `responde` (`id`, `Questoes_id`, `Respostas_id`) VALUES
(3001, 101, 201),
(3003, 103, 203),
(3004, 104, 204),
(3005, 105, 205),
(3006, 106, 206);

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
(201, '2 K2Cr2O7(aq) + 2 H2O(l) + 3 S(g) → 4 KOH(aq)', '2 K2Cr2O7(aq) + 2 H2O(l) + 2 S(g) → 2 KOH(aq)', 'K2Cr2O7(aq) + 1 H2O(l) + S(g) → 2 KOH(aq)'),
(203, '1 KMnO4(aq) + 5 FeCl2(aq) + 8 HCl(aq) → 1 MnC', '2 KMnO4(aq) + 3 FeCl2(aq) + 2 HCl(aq) → 4 MnC', '1 KMnO4(aq) + 3 FeCl2(aq) + 3 HCl(aq) → 2 MnC'),
(204, '3 Ca(OH)2 + 2 H3PO4 → 1 Ca3(PO4)2 + 6 H2O', '2 Ca(OH)2 + 3 H3PO4 → 2 Ca3(PO4)2 + 4 H2O', '4 Ca(OH)2 + 2 H3PO4 → 3 Ca3(PO4)2 + 6 H2O'),
(205, '1 CO(NH2)2 + 2 NO2- + 2 H+ → 2 N2 + 1 CO2 + 3', '2 CO(NH2)2 + 3 NO2- + 1 H+ → 2 N2 + 2 CO2 + 2', '3 CO(NH2)2 + 1 NO2- + 2 H+ → 2 N2 + 3 CO2 + 2'),
(206, '1 Cu + 4 HNO3 → 1 Cu(NO3)2 + 2 NO2 + 2 H2O', '4 Cu + 2 HNO3 → 2 Cu(NO3)2 + 3 NO2 + 1 H2O', '2 Cu + 3 HNO3 → 1 Cu(NO3)2 + 4 NO2 + 3 H2O'),
(207, '1 K2Cr2O7 + 4 HCl → 2 CrCl3 + 4 KCl + 3 H2O +', '2 K2Cr2O7 + 2 HCl → 3 CrCl3 + 2 KCl + 2 H2O +', '2 K2Cr2O7 + 3 HCl → 4 CrCl3 + 3 KCl + 1 H2O +'),
(208, '1 Na2CO3 + 2 HCl → 2 NaCl + 1 CO2 + 1 H2O', '2 Na2CO3 + 2 HCl → 2 NaCl + 3 CO2 + 2 H2O', '1 Na2CO3 + 4 HCl → 3 NaCl + 1 CO2 + 3 H2O'),
(209, '1 C3H8 + 5 O2 → 3 CO2 + 4 H2O', '2 C3H8 + 5 O2 → 3 CO2 + 3 H2O', '1 C3H8 + 3 O2 → 3 CO2 + 2 H2O'),
(210, '1 Na2SO4 + 1 BaCl2 → 1 BaSO4 + 2 NaCl', '2 Na2SO4 + 4 BaCl2 → 2 BaSO4 + 3 NaCl', '2 Na2SO4 + 4 BaCl2 → 3 BaSO4 + 2 NaCl'),
(211, '1 Fe2O3 + 3 H2 → 2 Fe + 3 H2O', '2 Fe2O3 + 1 H2 → 2 Fe + 2 H2O', '2 Fe2O3 + 2 H2 → 2 Fe + 4 H2O'),
(212, '1 C2H5OH + 3 O2 → 2 CO2 + 3 H2O', '3 C2H5OH + 3 O2 → 3 CO2 + 2 H2O', '2 C2H5OH + 3 O2 → 4 CO2 + 2 H2O'),
(213, '1 C3H8 + 5 O2 → 3 CO2 + 4 H2O', '1 C3H8 + 4 O2 → 2 CO2 + 3 H2O', '1 C3H8 + 3 O2 → 2 CO2 + 3 H2O');

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
-- Limitadores para a tabela `responde`
--
ALTER TABLE `responde`
  ADD CONSTRAINT `fk_Responde_Questoes1` FOREIGN KEY (`Questoes_id`) REFERENCES `questoes` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_Responde_Respostas1` FOREIGN KEY (`Respostas_id`) REFERENCES `respostas` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
