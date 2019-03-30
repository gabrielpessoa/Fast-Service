-- phpMyAdmin SQL Dump
-- version 4.8.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 30-Mar-2019 às 23:55
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
-- Estrutura da tabela `categorias`
--

CREATE TABLE `categorias` (
  `CTG_ID` int(11) NOT NULL,
  `CTG_NOME` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `categorias`
--

INSERT INTO `categorias` (`CTG_ID`, `CTG_NOME`) VALUES
(4, 'Moda e beleza'),
(7, 'Esportes e lazer'),
(8, 'Culinária'),
(10, 'Músicas e hobbies');

-- --------------------------------------------------------

--
-- Estrutura da tabela `comentarios`
--

CREATE TABLE `comentarios` (
  `CMT_ID` int(11) NOT NULL,
  `CMT_COMENTARIO` varchar(255) DEFAULT NULL,
  `CMT_USER_ID` int(11) NOT NULL,
  `CMT_SRV_ID` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `servicos`
--

CREATE TABLE `servicos` (
  `SRV_ID` int(11) NOT NULL,
  `SRV_NOME` varchar(40) COLLATE utf8_unicode_ci DEFAULT NULL,
  `SRV_CATEGORIA` int(11) NOT NULL,
  `SRV_DESCRICAO` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `SRV_LOCALIZACAO` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `SRV_PRECO` varchar(40) COLLATE utf8_unicode_ci DEFAULT NULL,
  `SRV_IMAGEM` varchar(40) COLLATE utf8_unicode_ci NOT NULL,
  `SRV_USER_ID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Extraindo dados da tabela `servicos`
--

INSERT INTO `servicos` (`SRV_ID`, `SRV_NOME`, `SRV_CATEGORIA`, `SRV_DESCRICAO`, `SRV_LOCALIZACAO`, `SRV_PRECO`, `SRV_IMAGEM`, `SRV_USER_ID`) VALUES
(4, 'Padaria Gourmet', 8, 'teste', 'Igarassu, Pe', '50', '', 6),
(5, 'pizza', 8, 'melhor pizza da regiao', 'igarassu', '10', '', 8),
(6, 'Instalador de arcondicionado', 10, 'Muito legal', 'Igarassu', '400', '', 9),
(7, 'teste', 4, 'asdda', 'Igarassu', '15', '', 7),
(15, 'pizza', 8, 'Melhor pizza da regiao', 'paulista', '15', '1015598016feb5f7f9f26c2cd02e505e.jpg', 10);

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuarios`
--

CREATE TABLE `usuarios` (
  `USER_ID` int(11) NOT NULL,
  `USER_NOME` varchar(40) COLLATE utf8_unicode_ci NOT NULL,
  `USER_USUARIO` varchar(40) COLLATE utf8_unicode_ci DEFAULT NULL,
  `USER_SENHA` varchar(40) COLLATE utf8_unicode_ci NOT NULL,
  `USER_EMAIL` varchar(40) COLLATE utf8_unicode_ci DEFAULT NULL,
  `USER_TELEFONE` varchar(40) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Extraindo dados da tabela `usuarios`
--

INSERT INTO `usuarios` (`USER_ID`, `USER_NOME`, `USER_USUARIO`, `USER_SENHA`, `USER_EMAIL`, `USER_TELEFONE`) VALUES
(6, 'Alessandro', 'Alessandro0325', '202cb962ac59075b964b07152d234b70', 'alessandrosilva325@gmail.com', '81992931694'),
(7, 'SANDRO JOSE DA SILVA', 'Alessandro', '202cb962ac59075b964b07152d234b70', 'thiagomoura86@live.com', '81992931694'),
(8, 'gabriel', 'gabrielp', '202cb962ac59075b964b07152d234b70', 'gabrielpessoanascimento@gmail.com', '64564564'),
(9, 'ALEXANDRE STRAPACAO GUEDES VIANNA', 'alexandre', '202cb962ac59075b964b07152d234b70', 'strapacao@gmail.com', '83996992741'),
(10, 'gabriel', 'gabriel', '202cb962ac59075b964b07152d234b70', 'gabriel@gmail.com', '81986807342');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categorias`
--
ALTER TABLE `categorias`
  ADD PRIMARY KEY (`CTG_ID`);

--
-- Indexes for table `comentarios`
--
ALTER TABLE `comentarios`
  ADD PRIMARY KEY (`CMT_ID`),
  ADD KEY `CMT_USER_ID` (`CMT_USER_ID`),
  ADD KEY `CMT_SRV_ID` (`CMT_SRV_ID`);

--
-- Indexes for table `servicos`
--
ALTER TABLE `servicos`
  ADD PRIMARY KEY (`SRV_ID`),
  ADD KEY `SRV_CATEGORIA` (`SRV_CATEGORIA`),
  ADD KEY `SRV_USER_ID` (`SRV_USER_ID`);

--
-- Indexes for table `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`USER_ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categorias`
--
ALTER TABLE `categorias`
  MODIFY `CTG_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `servicos`
--
ALTER TABLE `servicos`
  MODIFY `SRV_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `USER_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Constraints for dumped tables
--

--
-- Limitadores para a tabela `comentarios`
--
ALTER TABLE `comentarios`
  ADD CONSTRAINT `COMENTARIOS_ibfk_1` FOREIGN KEY (`CMT_USER_ID`) REFERENCES `usuarios` (`USER_ID`),
  ADD CONSTRAINT `COMENTARIOS_ibfk_2` FOREIGN KEY (`CMT_SRV_ID`) REFERENCES `servicos` (`SRV_ID`);

--
-- Limitadores para a tabela `servicos`
--
ALTER TABLE `servicos`
  ADD CONSTRAINT `SERVICOS_ibfk_1` FOREIGN KEY (`SRV_CATEGORIA`) REFERENCES `categorias` (`CTG_ID`),
  ADD CONSTRAINT `SERVICOS_ibfk_2` FOREIGN KEY (`SRV_USER_ID`) REFERENCES `usuarios` (`USER_ID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
