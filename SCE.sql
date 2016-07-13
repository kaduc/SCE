-- phpMyAdmin SQL Dump
-- version 4.2.12deb2+deb8u1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- KADELINK DEVELOP SOLUTION
-- Tempo de geração: 13/07/2016 às 07:46
-- Versão do servidor: 5.5.49-0+deb8u1
-- Versão do PHP: 5.6.22-0+deb8u1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Banco de dados: `SCE`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `sce_produtos`
--

CREATE TABLE IF NOT EXISTS `sce_produtos` (
`id` int(11) NOT NULL,
  `nome` varchar(45) NOT NULL,
  `tipo` varchar(45) NOT NULL,
  `quantidade` int(11) NOT NULL,
  `preco` float NOT NULL,
  `STATUS` int(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=latin1;

---------------------------------------------

--
-- Estrutura para tabela `sce_users`
--

CREATE TABLE IF NOT EXISTS `sce_users` (
`id` int(11) NOT NULL,
  `tipo` varchar(1) NOT NULL DEFAULT 'U',
  `login` varchar(45) NOT NULL,
  `senha` varchar(45) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Fazendo dump de dados para tabela `sce_users`
--

--
-- Índices de tabela `sce_produtos`
--
ALTER TABLE `sce_produtos`
 ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `sce_users`
--
ALTER TABLE `sce_users`
 ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de tabelas apagadas
--

--
-- AUTO_INCREMENT de tabela `sce_produtos`
--
ALTER TABLE `sce_produtos`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT de tabela `sce_users`
--
ALTER TABLE `sce_users`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
