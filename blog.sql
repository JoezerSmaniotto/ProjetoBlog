-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: 15-Maio-2019 às 01:35
-- Versão do servidor: 10.1.38-MariaDB
-- versão do PHP: 7.3.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `blog`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `posts`
--

CREATE TABLE `posts` (
  `cdpost` int(11) NOT NULL,
  `titulo` varchar(255) NOT NULL,
  `resumo` text NOT NULL,
  `texto` text NOT NULL,
  `imagem` varchar(100) NOT NULL,
  `posicao` varchar(5) NOT NULL DEFAULT 'right',
  `data` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `posts`
--

INSERT INTO `posts` (`cdpost`, `titulo`, `resumo`, `texto`, `imagem`, `posicao`, `data`) VALUES
(13, 'GalÃ¡xia de andromeda', 'GalÃ¡xia de andromeda, a galÃ¡xia vizinha.', 'A galÃ¡xia de AndrÃ´meda Ã© uma galÃ¡xia espiral localizada a cerca de 2,54 milhÃµes de anos-luz de distÃ¢ncia da Terra, na direÃ§Ã£o da constelaÃ§Ã£o de AndrÃ´meda.', 'andromeda.jpg', 'left', '2019-05-14'),
(14, 'Messier 82', 'A galÃ¡xia chamada Messier 82.', 'Messier 82 Ã© uma galÃ¡xia irregular localizada a cerca de doze milhÃµes de anos-luz de distÃ¢ncia na direÃ§Ã£o da constelaÃ§Ã£o de Ursa Maior. ', 'messier_82.jpg', 'right', '2019-05-14');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`cdpost`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `cdpost` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
