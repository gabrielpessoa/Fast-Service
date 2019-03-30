-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: 30-Mar-2019 às 15:14
-- Versão do servidor: 10.3.13-MariaDB
-- versão do PHP: 7.3.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `FASTSERVICE`
--
CREATE DATABASE IF NOT EXISTS `FASTSERVICE` DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci;
USE `FASTSERVICE`;

-- --------------------------------------------------------

--
-- Estrutura da tabela `CATEGORIAS`
--

CREATE TABLE `CATEGORIAS` (
  `CTG_ID` int(11) NOT NULL,
  `CTG_NOME` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `CATEGORIAS`
--

INSERT INTO `CATEGORIAS` (`CTG_ID`, `CTG_NOME`) VALUES
(4, 'Moda e beleza'),
(7, 'Esportes e lazer'),
(8, 'Culinária'),
(10, 'Músicas e hobbies');

-- --------------------------------------------------------

--
-- Estrutura da tabela `SERVICOS`
--

CREATE TABLE `SERVICOS` (
  `SRV_ID` int(11) NOT NULL,
  `SRV_NOME` varchar(40) COLLATE utf8_unicode_ci DEFAULT NULL,
  `SRV_CATEGORIA` int(11) NOT NULL,
  `SRV_DESCRICAO` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `SRV_LOCALIZACAO` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `SRV_PRECO` varchar(40) COLLATE utf8_unicode_ci DEFAULT NULL,
  `SRV_USER_ID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Extraindo dados da tabela `SERVICOS`
--

INSERT INTO `SERVICOS` (`SRV_ID`, `SRV_NOME`, `SRV_CATEGORIA`, `SRV_DESCRICAO`, `SRV_LOCALIZACAO`, `SRV_PRECO`, `SRV_USER_ID`) VALUES
(4, 'Padaria Gourmet', 8, 'teste', 'Igarassu, Pe', '50', 6),
(5, 'pizza', 8, 'melhor pizza da regiao', 'igarassu', '10', 8),
(6, 'Instalador de arcondicionado', 10, 'Muito legal', 'Igarassu', '400', 9);

-- --------------------------------------------------------

--
-- Estrutura da tabela `USUARIOS`
--

CREATE TABLE `USUARIOS` (
  `USER_ID` int(11) NOT NULL,
  `USER_NOME` varchar(40) COLLATE utf8_unicode_ci NOT NULL,
  `USER_USUARIO` varchar(40) COLLATE utf8_unicode_ci DEFAULT NULL,
  `USER_SENHA` varchar(40) COLLATE utf8_unicode_ci NOT NULL,
  `USER_EMAIL` varchar(40) COLLATE utf8_unicode_ci DEFAULT NULL,
  `USER_TELEFONE` varchar(40) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Extraindo dados da tabela `USUARIOS`
--

INSERT INTO `USUARIOS` (`USER_ID`, `USER_NOME`, `USER_USUARIO`, `USER_SENHA`, `USER_EMAIL`, `USER_TELEFONE`) VALUES
(6, 'Alessandro', 'Alessandro0325', '202cb962ac59075b964b07152d234b70', 'alessandrosilva325@gmail.com', '81992931694'),
(7, 'SANDRO JOSE DA SILVA', 'Alessandro', '202cb962ac59075b964b07152d234b70', 'thiagomoura86@live.com', '81992931694'),
(8, 'gabriel', 'gabrielp', '202cb962ac59075b964b07152d234b70', 'gabrielpessoanascimento@gmail.com', '64564564'),
(9, 'ALEXANDRE STRAPACAO GUEDES VIANNA', 'alexandre', '202cb962ac59075b964b07152d234b70', 'strapacao@gmail.com', '83996992741');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `CATEGORIAS`
--
ALTER TABLE `CATEGORIAS`
  ADD PRIMARY KEY (`CTG_ID`);

--
-- Indexes for table `SERVICOS`
--
ALTER TABLE `SERVICOS`
  ADD PRIMARY KEY (`SRV_ID`),
  ADD KEY `SRV_CATEGORIA` (`SRV_CATEGORIA`),
  ADD KEY `SRV_USER_ID` (`SRV_USER_ID`);

--
-- Indexes for table `USUARIOS`
--
ALTER TABLE `USUARIOS`
  ADD PRIMARY KEY (`USER_ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `CATEGORIAS`
--
ALTER TABLE `CATEGORIAS`
  MODIFY `CTG_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `SERVICOS`
--
ALTER TABLE `SERVICOS`
  MODIFY `SRV_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `USUARIOS`
--
ALTER TABLE `USUARIOS`
  MODIFY `USER_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- Constraints for dumped tables
--

--
-- Limitadores para a tabela `SERVICOS`
--
ALTER TABLE `SERVICOS`
  ADD CONSTRAINT `SERVICOS_ibfk_1` FOREIGN KEY (`SRV_CATEGORIA`) REFERENCES `CATEGORIAS` (`CTG_ID`),
  ADD CONSTRAINT `SERVICOS_ibfk_2` FOREIGN KEY (`SRV_USER_ID`) REFERENCES `USUARIOS` (`USER_ID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
