-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 04-Out-2019 às 03:42
-- Versão do servidor: 10.1.35-MariaDB
-- versão do PHP: 7.2.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `acha`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `acha_preferencia`
--

CREATE TABLE `acha_preferencia` (
  `id_preferencia` int(11) NOT NULL,
  `codigo` varchar(50) DEFAULT NULL,
  `situacao` tinyint(1) DEFAULT NULL,
  `justificativa` text,
  `id_pro` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `acha_preferencia`
--

INSERT INTO `acha_preferencia` (`id_preferencia`, `codigo`, `situacao`, `justificativa`, `id_pro`) VALUES
(1, '2019.2', 1, '', 1),
(2, '2019.2', 1, '', 2),
(3, '2019.2', 0, NULL, 6),
(4, '2019.2', 0, NULL, 7),
(5, '2019.2', 0, NULL, 11),
(6, '2019.2', 0, NULL, 12),
(7, '2019.2', 0, NULL, 13),
(8, '2019.2', 0, NULL, 14),
(9, '2019.2', 0, NULL, 15),
(10, '2019.2', 0, NULL, 16),
(11, '2019.2', 0, NULL, 17),
(12, '2019.2', 0, NULL, 18),
(13, '2019.2', 0, NULL, 19),
(14, '2019.2', 0, NULL, 20),
(15, '2019.2', 0, NULL, 21),
(16, '2019.2', 0, NULL, 22),
(17, '2019.2', 0, NULL, 23),
(18, '2019.2', 0, NULL, 24),
(19, '2019.2', 0, NULL, 25),
(20, '2019.2', 0, NULL, 26),
(21, '2019.2', 0, NULL, 27),
(22, '2019.2', 0, NULL, 28),
(23, '2019.2', 0, NULL, 29),
(24, '2019.2', 0, NULL, 30),
(25, '2019.2', 0, NULL, 31),
(26, '2019.2', 0, NULL, 32),
(27, '2019.2', 0, NULL, 33),
(28, '2019.2', 0, NULL, 34),
(29, '2019.2', 0, NULL, 35),
(30, '2019.2', 0, NULL, 36),
(31, '2019.2', 0, NULL, 37),
(32, '2019.2', 0, NULL, 38),
(33, '2019.2', 0, NULL, 39),
(34, '2019.2', 0, NULL, 40),
(35, '2019.2', 0, NULL, 41),
(36, '2019.2', 0, NULL, 42),
(37, '2019.2', 0, NULL, 43),
(38, '2019.2', 0, NULL, 44),
(39, '2019.2', 0, NULL, 45),
(40, '2019.2', 0, NULL, 46),
(41, '2019.2', 0, NULL, 47),
(42, '2019.2', 0, NULL, 48),
(43, '2019.2', 0, NULL, 49),
(44, '2019.2', 0, NULL, 50),
(45, '2019.2', 0, NULL, 51),
(46, '2019.2', 0, NULL, 52),
(47, '2019.2', 0, NULL, 53),
(48, '2019.2', 0, NULL, 54),
(49, '2019.2', 0, NULL, 55),
(50, '2019.2', 0, NULL, 56),
(51, '2019.2', 0, NULL, 57),
(52, '2019.2', 0, NULL, 58),
(53, '2019.2', 0, NULL, 59),
(54, '2019.2', 0, NULL, 60),
(55, '2019.2', 0, NULL, 61),
(56, '2019.2', 0, NULL, 62),
(57, '2019.2', 0, NULL, 63),
(58, '2019.2', 0, NULL, 71),
(59, '2019.2', 0, NULL, 65),
(60, '2019.2', 0, NULL, 66),
(61, '2019.2', 0, NULL, 67),
(62, '2019.2', 0, NULL, 68),
(63, '2019.2', 0, NULL, 69),
(64, '2019.2', 0, NULL, 70),
(65, '2019.1', 1, '', 1),
(66, '2019.1', 1, '', 2),
(67, '2019.1', 0, NULL, 6),
(68, '2019.1', 0, NULL, 7),
(69, '2019.1', 0, NULL, 11),
(70, '2019.1', 0, NULL, 12),
(71, '2019.1', 0, NULL, 13),
(72, '2019.1', 0, NULL, 14),
(73, '2019.1', 0, NULL, 15),
(74, '2019.1', 0, NULL, 16),
(75, '2019.1', 0, NULL, 17),
(76, '2019.1', 0, NULL, 18),
(77, '2019.1', 0, NULL, 19),
(78, '2019.1', 0, NULL, 20),
(79, '2019.1', 0, NULL, 21),
(80, '2019.1', 0, NULL, 22),
(81, '2019.1', 0, NULL, 23),
(82, '2019.1', 0, NULL, 24),
(83, '2019.1', 0, NULL, 25),
(84, '2019.1', 0, NULL, 26),
(85, '2019.1', 0, NULL, 27),
(86, '2019.1', 0, NULL, 28),
(87, '2019.1', 0, NULL, 29),
(88, '2019.1', 0, NULL, 30),
(89, '2019.1', 0, NULL, 31),
(90, '2019.1', 0, NULL, 32),
(91, '2019.1', 0, NULL, 33),
(92, '2019.1', 0, NULL, 34),
(93, '2019.1', 0, NULL, 35),
(94, '2019.1', 0, NULL, 36),
(95, '2019.1', 0, NULL, 37),
(96, '2019.1', 0, NULL, 38),
(97, '2019.1', 0, NULL, 39),
(98, '2019.1', 0, NULL, 40),
(99, '2019.1', 0, NULL, 41),
(100, '2019.1', 0, NULL, 42),
(101, '2019.1', 0, NULL, 43),
(102, '2019.1', 0, NULL, 44),
(103, '2019.1', 0, NULL, 45),
(104, '2019.1', 0, NULL, 46),
(105, '2019.1', 0, NULL, 47),
(106, '2019.1', 0, NULL, 48),
(107, '2019.1', 0, NULL, 49),
(108, '2019.1', 0, NULL, 50),
(109, '2019.1', 0, NULL, 51),
(110, '2019.1', 0, NULL, 52),
(111, '2019.1', 0, NULL, 53),
(112, '2019.1', 0, NULL, 54),
(113, '2019.1', 0, NULL, 55),
(114, '2019.1', 0, NULL, 56),
(115, '2019.1', 0, NULL, 57),
(116, '2019.1', 0, NULL, 58),
(117, '2019.1', 0, NULL, 59),
(118, '2019.1', 0, NULL, 60),
(119, '2019.1', 0, NULL, 61),
(120, '2019.1', 0, NULL, 62),
(121, '2019.1', 0, NULL, 63),
(122, '2019.1', 0, NULL, 71),
(123, '2019.1', 0, NULL, 65),
(124, '2019.1', 0, NULL, 66),
(125, '2019.1', 0, NULL, 67),
(126, '2019.1', 0, NULL, 68),
(127, '2019.1', 0, NULL, 69),
(128, '2019.1', 0, NULL, 70);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `acha_preferencia`
--
ALTER TABLE `acha_preferencia`
  ADD PRIMARY KEY (`id_preferencia`),
  ADD KEY `id_preferencia_id_pro` (`id_pro`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `acha_preferencia`
--
ALTER TABLE `acha_preferencia`
  MODIFY `id_preferencia` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=129;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
