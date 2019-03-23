-- phpMyAdmin SQL Dump
-- version 4.8.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 23-Mar-2019 às 00:57
-- Versão do servidor: 10.1.32-MariaDB
-- PHP Version: 7.2.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `fastservice`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `servicos`
--

CREATE TABLE `servicos` (
  `SERVICO_ID` int(11) NOT NULL,
  `SERVICO_NOME` varchar(40) NOT NULL,
  `SERVICO_TIPO` varchar(40) NOT NULL,
  `SERVICO_DESCRICAO` varchar(2000) DEFAULT NULL,
  `SERVICO_LOCALIZACAO` varchar(50) NOT NULL,
  `SERVICO_PRECO` int(6) NOT NULL,
  `SERVICO_USER_ID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `servicos`
--

INSERT INTO `servicos` (`SERVICO_ID`, `SERVICO_NOME`, `SERVICO_TIPO`, `SERVICO_DESCRICAO`, `SERVICO_LOCALIZACAO`, `SERVICO_PRECO`, `SERVICO_USER_ID`) VALUES
(2, 'pizza', 'pizzaria', 'melhor pizza da regiao', 'aqui na minha casa', 10, 2);

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuarios`
--

CREATE TABLE `usuarios` (
  `USER_ID` int(11) NOT NULL,
  `USER_NOME` varchar(40) NOT NULL,
  `USER_SENHA` varchar(40) NOT NULL,
  `USER_EMAIL` varchar(40) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `usuarios`
--

INSERT INTO `usuarios` (`USER_ID`, `USER_NOME`, `USER_SENHA`, `USER_EMAIL`) VALUES
(1, 'Alessandro0325', '1234', 'alessandrosilva325@gmail.com'),
(2, 'gabriel', '123', 'gabriel'),
(3, 'rob', '202cb962ac59075b964b07152d234b70', 'asd');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `servicos`
--
ALTER TABLE `servicos`
  ADD PRIMARY KEY (`SERVICO_ID`),
  ADD KEY `SERVICO_USER_ID` (`SERVICO_USER_ID`);

--
-- Indexes for table `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`USER_ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `servicos`
--
ALTER TABLE `servicos`
  MODIFY `SERVICO_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `USER_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Constraints for dumped tables
--

--
-- Limitadores para a tabela `servicos`
--
ALTER TABLE `servicos`
  ADD CONSTRAINT `SERVICO_USER_ID` FOREIGN KEY (`SERVICO_USER_ID`) REFERENCES `usuarios` (`USER_ID`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
