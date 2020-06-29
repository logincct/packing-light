-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 10-Jun-2020 às 17:05
-- Versão do servidor: 10.4.11-MariaDB
-- versão do PHP: 7.4.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `login`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuario`
--

CREATE TABLE `usuario` (
  `codigo` bigint(20) UNSIGNED NOT NULL,
  `cpf` varchar(14) COLLATE utf8_bin NOT NULL,
  `password` varchar(100) COLLATE utf8_bin NOT NULL,
  `nome` varchar(150) COLLATE utf8_bin NOT NULL,
  `email` varchar(150) COLLATE utf8_bin NOT NULL,
  `endereco` varchar(250) COLLATE utf8_bin NOT NULL,
  `data_cadastro` date NOT NULL,
  `hora_cadastro` time NOT NULL,
  `nivel` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Extraindo dados da tabela `usuario`
--

INSERT INTO `usuario` (`codigo`, `cpf`, `password`, `nome`, `email`, `endereco`, `data_cadastro`, `hora_cadastro`, `nivel`) VALUES
(2, 'aa', '81dc9bdb52d04dc20036dbd8313ed055', 'camila', 'camilacamposcolares@gmail.com', 'BORGES DE MELO 820 BAIRRO DE FATIMA ', '2019-02-12', '45:00:00', 0),
(3, 'aa', '81dc9bdb52d04dc20036dbd8313ed055', 'prof valdisio', 'valdisio.viana@uece.br', 'Universidade Estadual do Ceara Campus Itaperi', '2019-02-12', '18:00:00', 1),
(4, 'aa', '81dc9bdb52d04dc20036dbd8313ed055', 'prof ana luiza', 'analuizabpb@gmail.com', 'Rua Rodrigues Junior 996', '2019-03-18', '11:24:39', 1),
(5, '079.278.493-60', '81dc9bdb52d04dc20036dbd8313ed055', 'rebeca', 'rebeca_ts2000@outlook.com', 'Universidade Estadual do Ceara Campus Itaperi', '2019-03-11', '07:42:18', 1),
(20, 'aa', '81dc9bdb52d04dc20036dbd8313ed055', 'prof clecio', 'clecio@larces.uece.br', 'Universidade Estadual do Ceara Campus Itaperi	', '2019-03-12', '19:26:05', 1),
(21, '111.111.111-11', '4124bc0a9335c27f086f24ba207a4912', 'aa', 'aa@aa', 'aa', '2020-03-09', '00:00:00', 12),
(22, '222.222.222-22', '21ad0bd836b90d08f4cf640b4c298e7c', 'bbbb', 'bb@bb', 'bbbb', '2020-03-09', '23:46:39', 0),
(24, '222.222.222-22', 'e47ca7a09cf6781e29634502345930a7', 'ooo', 'oo@oo', 'oo', '2020-03-13', '14:54:17', 11);

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`codigo`),
  ADD UNIQUE KEY `codigo` (`codigo`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `usuario`
--
ALTER TABLE `usuario`
  MODIFY `codigo` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
