-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 22-Ago-2016 às 03:37
-- Versão do servidor: 10.1.13-MariaDB
-- PHP Version: 5.6.23

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_sisadail`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `fichas`
--

CREATE TABLE `fichas` (
  `ID_FICHA` int(11) NOT NULL,
  `TIPO_PESSOA` varchar(20) NOT NULL COMMENT 'Tipos: [V]isitante; [C]onvidado',
  `NOME_PESSOA` varchar(150) NOT NULL,
  `IDADE_PESSOA` int(11) DEFAULT NULL,
  `CONTATO` varchar(150) DEFAULT NULL,
  `ENDERECO` varchar(500) DEFAULT NULL,
  `EMAIL` varchar(150) NOT NULL,
  `ESTADO_CIVIL` varchar(100) NOT NULL,
  `NUMERO_FILHOS` int(11) NOT NULL,
  `ST_ESTA_EM_IGREJA` varchar(1) NOT NULL,
  `ST_PERTENCEU_A_IGREJA` varchar(1) NOT NULL,
  `ST_BATIZADO` varchar(1) NOT NULL,
  `PEDIDOS_ORACAO` varchar(1000) DEFAULT NULL,
  `AVALIACAO_RECEPTIVIDADE` varchar(20) DEFAULT NULL,
  `NOME_USUARIO` varchar(150) DEFAULT NULL,
  `DATA_PREENCHIMENTO` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `fichas`
--

INSERT INTO `fichas` (`ID_FICHA`, `TIPO_PESSOA`, `NOME_PESSOA`, `IDADE_PESSOA`, `CONTATO`, `ENDERECO`, `EMAIL`, `ESTADO_CIVIL`, `NUMERO_FILHOS`, `ST_ESTA_EM_IGREJA`, `ST_PERTENCEU_A_IGREJA`, `ST_BATIZADO`, `PEDIDOS_ORACAO`, `AVALIACAO_RECEPTIVIDADE`, `NOME_USUARIO`, `DATA_PREENCHIMENTO`) VALUES
(1, 'VISITANTE', 'VINICIUS', 26, '(61) 98293-3740', 'Rua teste', 'teste@teste.com', 'CASADO', 0, 'S', 'S', 'S', NULL, 'OTIMA', 'TESTE', '2016-08-17'),
(2, 'CONVIDADO', 'POLIANA', 24, '(61) 92342-2344', 'Rua qualquer', 'email@email.com', 'CASADA', 0, 'S', 'S', 'S', 'Teste de teste', 'BOA', 'USUARIO', '2016-08-18');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `fichas`
--
ALTER TABLE `fichas`
  ADD PRIMARY KEY (`ID_FICHA`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `fichas`
--
ALTER TABLE `fichas`
  MODIFY `ID_FICHA` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
