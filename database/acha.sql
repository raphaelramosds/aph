-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 04-Out-2019 às 14:06
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
-- Estrutura da tabela `acha_area`
--

CREATE TABLE `acha_area` (
  `id_area` int(11) NOT NULL,
  `nome` varchar(50) NOT NULL,
  `id_subarea` int(11) DEFAULT NULL,
  `id_grupo` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `acha_area`
--

INSERT INTO `acha_area` (`id_area`, `nome`, `id_subarea`, `id_grupo`) VALUES
(1, 'Informática', 0, 1),
(2, 'Portugês e Literatura', 0, 2),
(8, 'Design', 1, 1),
(14, 'Inglês', 0, 2),
(15, 'História', 0, 4),
(16, 'Filosofia', 0, 4),
(17, 'Sociologia', 0, 4),
(18, 'Artes', 0, 4),
(19, 'Espanhol', 0, 2),
(20, 'Educação Física', 0, 2),
(21, 'Geografia', 0, 4),
(22, 'Eletrônica', 0, 7),
(23, 'Comércio', 0, 8),
(24, 'Matemática', 0, 6),
(25, 'Fisica', 0, 5),
(26, 'Quimíca', 0, 5),
(27, 'Biologia', 0, 5),
(30, 'Espanhol/Francês', 0, 13);

-- --------------------------------------------------------

--
-- Estrutura da tabela `acha_com_cur`
--

CREATE TABLE `acha_com_cur` (
  `id_com_cur` int(11) NOT NULL,
  `nome` varchar(50) NOT NULL,
  `car_hor` int(11) NOT NULL,
  `id_matriz` int(11) NOT NULL,
  `id_nucleo` int(11) NOT NULL,
  `id_dis` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `acha_com_cur`
--

INSERT INTO `acha_com_cur` (`id_com_cur`, `nome`, `car_hor`, `id_matriz`, `id_nucleo`, `id_dis`) VALUES
(1, 'Português e Literatura', 440, 1, 3, 19),
(13, 'Inglês', 240, 1, 3, 22),
(14, 'Espanhol', 120, 1, 3, 25),
(15, 'Arte', 120, 1, 3, 27),
(16, 'Programação Estruturada e Orientada a Objetos', 160, 1, 1, 30),
(17, 'Geografia', 240, 1, 3, 33),
(18, 'História', 240, 1, 3, 36),
(19, 'Filosofia', 120, 1, 3, 39),
(20, 'Sociologia', 120, 1, 3, 41),
(21, 'Matemática', 400, 1, 3, 44),
(22, 'Física', 320, 1, 3, 45),
(23, 'Quimíca', 320, 1, 3, 46),
(24, 'Biologia', 280, 1, 3, 47),
(25, 'Informática', 60, 1, 2, 43),
(26, 'Filosofia, Ciência e Tecnologia', 40, 1, 2, 42),
(27, 'Sociologia do Trabalho', 40, 1, 2, 40),
(28, 'Qualidade de Vida e Trabalho', 40, 1, 2, 38),
(29, 'Gestão Organizacional', 40, 1, 2, 37),
(30, 'Fundamentos de Lógica e Algoritmos', 100, 1, 2, 35),
(31, 'Eletricidade Instrumental', 120, 1, 1, 34),
(32, 'Eletrônica Analógica e Digital', 160, 1, 1, 32),
(33, 'Organização e Manutenção de Computadores', 160, 1, 1, 31),
(34, 'Programação Estruturada e Orientada a Objetos', 160, 1, 1, 30),
(35, 'Programação com Acesso a Banco de Dados', 140, 1, 1, 28),
(36, 'Projeto de Desenvolvimento de Software', 80, 1, 1, 26),
(37, 'Autoria Web', 80, 1, 1, 24),
(38, 'Programação para Internet', 120, 1, 1, 23),
(39, 'Arquitetura  de  redes  de  computadores  e  ', 140, 1, 1, 21),
(40, 'Fundamentos  de sistemas operacionais e Siste', 160, 1, 1, 20),
(41, 'Português e Literatura', 440, 3, 3, 19),
(42, 'Inglês', 240, 3, 3, 22),
(43, 'Espanhol', 120, 3, 3, 25),
(44, 'Arte', 120, 3, 3, 27),
(45, 'Educação Fisica', 160, 3, 3, 29),
(46, 'Geografia', 240, 3, 3, 33),
(47, 'História', 240, 3, 3, 36),
(48, 'Filosofia', 120, 3, 3, 39),
(49, 'Sociologia', 120, 3, 3, 41),
(50, 'Matemática', 400, 3, 3, 44),
(102, 'Logística', 80, 3, 1, 81),
(52, 'Quimíca', 320, 3, 3, 46),
(53, 'Biologia', 280, 3, 3, 47),
(54, 'Informática', 60, 3, 2, 43),
(55, 'Filosofia, Ciência e Tecnologia', 40, 3, 2, 42),
(56, 'Sociologia do Trabalho', 40, 3, 2, 40),
(57, 'Qualidade de Vida e Trabalho', 40, 3, 2, 38),
(58, 'Espanhol instrumental', 60, 3, 2, 51),
(59, 'Empreendedorismo', 80, 3, 2, 50),
(60, 'Fundamentos de Admistração', 80, 3, 1, 52),
(61, 'Gestão de Qualidade', 80, 3, 1, 53),
(62, 'Gestão de Pessoas', 80, 3, 1, 54),
(63, 'Gestão de Marketing', 80, 3, 1, 55),
(64, 'Comportamento Organizacional', 80, 3, 1, 56),
(65, 'Técnicas de Vendas e Negociação', 80, 3, 1, 57),
(66, 'Legislação Trabalhista, Tributária e Empresar', 80, 3, 1, 58),
(67, 'Estratégia Empresarial', 80, 3, 1, 59),
(68, 'Matemática Comercial e Financeira', 80, 3, 1, 60),
(69, 'Gestão Financeira', 80, 3, 1, 61),
(70, 'Gestão de Serviços', 80, 3, 1, 62),
(72, 'Sistemas de Informação', 80, 3, 1, 64),
(73, 'Português e Literatura', 440, 4, 3, 19),
(74, 'Inglês', 240, 4, 3, 22),
(75, 'Espanhol', 120, 4, 3, 25),
(76, 'Arte', 120, 4, 3, 27),
(77, 'Educação Fisica', 160, 4, 3, 29),
(78, 'Geografia', 240, 4, 3, 33),
(79, 'História', 240, 4, 3, 36),
(80, 'Filosofia', 120, 4, 3, 39),
(81, 'Sociologia', 120, 4, 3, 41),
(82, 'Matemática', 400, 4, 3, 44),
(83, 'Física', 320, 4, 3, 45),
(84, 'Quimíca', 320, 4, 3, 46),
(85, 'Biologia', 280, 4, 3, 47),
(86, 'Introdução a Eletrônica', 40, 4, 2, 66),
(87, 'Eletricidade Elementar', 40, 4, 2, 65),
(88, 'Informática', 60, 4, 2, 43),
(89, 'Arquitetura de Sistemas', 60, 4, 2, 68),
(90, 'Fundamentos de Programação', 80, 4, 2, 69),
(91, 'Lógica Digital', 120, 4, 2, 70),
(92, 'Segurança do Trabalho', 60, 4, 2, 71),
(93, 'Operações e Logística', 60, 4, 2, 72),
(94, 'Circuitos Elétricos em Corrente Contínua e Alterna', 160, 4, 1, 73),
(95, 'Eletrônica Analógica', 160, 4, 1, 74),
(96, 'Prototipagem de Sistemas Digitais', 160, 4, 1, 75),
(97, 'Controladores Programáveis', 120, 4, 1, 76),
(98, 'Sistemas Microcontrolados', 160, 4, 1, 77),
(99, 'Comunicação Eletrônica', 120, 4, 1, 78),
(100, 'Instrumentação Eletrônica', 120, 4, 1, 79),
(101, 'Acionamento Eletrônico', 160, 4, 1, 80),
(103, 'Português e Literatura', 440, 5, 3, 19),
(104, 'Inglês', 240, 5, 3, 22),
(105, 'Espanhol/Francês', 120, 5, 3, 82),
(106, 'Arte', 120, 5, 3, 27),
(107, 'Educação Fisica', 160, 5, 3, 29),
(108, 'Geografia', 240, 5, 3, 33),
(109, 'História', 240, 5, 3, 36),
(110, 'Filosofia', 120, 5, 3, 39),
(111, 'Sociologia', 120, 5, 3, 41),
(112, 'Matemática', 400, 5, 3, 44),
(113, 'Física', 320, 5, 3, 45),
(114, 'Quimíca', 320, 5, 3, 46),
(115, 'Biologia', 280, 5, 3, 47),
(116, 'Informática', 60, 5, 2, 43),
(117, 'Filosofia, Ciência e Tecnologia', 40, 5, 2, 42),
(118, 'Sociologia do Trabalho', 40, 5, 2, 40),
(119, 'Qualidade de Vida e Trabalho', 40, 5, 2, 38),
(120, 'Gestão Organizacional', 40, 5, 2, 37),
(121, 'Fundamentos de Lógica e Algoritmos', 100, 5, 2, 35),
(122, 'Análise de Projeto Orientados a Objetos', 80, 5, 2, 83),
(123, 'Projeto de Desenvolvimento de Sistemas para Intern', 80, 5, 2, 84),
(124, 'Princípios de Design e Projeto Gráfico', 80, 5, 1, 85),
(125, 'Design Web e Arquitetura da Informação', 160, 5, 1, 86),
(126, 'Programação Estruturada e Orientada a Objetos', 160, 5, 1, 30),
(127, 'Banco de dados', 440, 5, 1, 2),
(128, 'Projeto de Desenvolvimento de Sistemas para Intern', 80, 5, 1, 84),
(129, 'Instalação e Configuração de Servidores', 80, 5, 1, 88),
(130, 'Projeto de Interface de Usuário', 160, 5, 1, 89),
(131, 'Programação Orientada a Serviços', 160, 5, 1, 90),
(132, 'eletronica', 40, 6, 4, 91);

-- --------------------------------------------------------

--
-- Estrutura da tabela `acha_curso`
--

CREATE TABLE `acha_curso` (
  `id_curso` int(11) NOT NULL,
  `nome` varchar(50) NOT NULL,
  `id_mod` int(11) DEFAULT NULL,
  `cod_curso` int(11) NOT NULL,
  `cor` varchar(7) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `acha_curso`
--

INSERT INTO `acha_curso` (`id_curso`, `nome`, `id_mod`, `cod_curso`, `cor`) VALUES
(1, 'Informática', 1, 4401, '#0051c8'),
(2, 'Eletrônica', 1, 4206, '#ff0004'),
(8, 'Informática para internet', 1, 4000, '#0000ff'),
(6, 'Comércio', 1, 4506, '#d9d900');

-- --------------------------------------------------------

--
-- Estrutura da tabela `acha_dis`
--

CREATE TABLE `acha_dis` (
  `id_dis` int(11) NOT NULL,
  `nome` varchar(255) NOT NULL,
  `car_hor` varchar(45) NOT NULL,
  `id_area` int(11) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `acha_dis`
--

INSERT INTO `acha_dis` (`id_dis`, `nome`, `car_hor`, `id_area`) VALUES
(1, 'Programação', '440', 1),
(2, 'Banco de dados', '440', 1),
(19, 'Português e Literatura', '440', 2),
(20, 'Fundamentos  de sistemas operacionais e Siste', '160', 1),
(21, 'Arquitetura  de  redes  de  computadores  e  ', '140', 1),
(22, 'Inglês', '240', 14),
(23, 'Programação para Internet', '120', 1),
(24, 'Autoria Web', '80', 1),
(25, 'Espanhol', '120', 19),
(26, 'Projeto de Desenvolvimento de Software', '80', 1),
(27, 'Arte', '120', 18),
(28, 'Programação com Acesso a Banco de Dados', '140', 1),
(29, 'Educação Fisica', '160', 20),
(30, 'Programação Estruturada e Orientada a Objetos', '160', 1),
(31, 'Organização e Manutenção de Computadores', '160', 1),
(32, 'Eletrônica Analógica e Digital', '160', 22),
(33, 'Geografia', '240', 21),
(34, 'Eletricidade Instrumental', '120', 22),
(35, 'Fundamentos de Lógica e Algoritmos', '100', 1),
(36, 'História', '240', 15),
(37, 'Gestão Organizacional', '40', 23),
(38, 'Qualidade de Vida e Trabalho', '40', 20),
(39, 'Filosofia', '120', 16),
(40, 'Sociologia do Trabalho', '40', 17),
(41, 'Sociologia', '120', 17),
(42, 'Filosofia, Ciência e Tecnologia', '40', 16),
(43, 'Informática', '60', 1),
(44, 'Matemática', '400', 24),
(45, 'Física', '320', 25),
(46, 'Quimíca', '320', 26),
(47, 'Biologia', '280', 27),
(51, 'Espanhol instrumental', '60', 19),
(50, 'Empreendedorismo', '80', 23),
(52, 'Fundamentos de Admistração', '80', 23),
(53, 'Gestão de Qualidade', '80', 23),
(54, 'Gestão de Pessoas', '80', 23),
(55, 'Gestão de Marketing', '80', 23),
(56, 'Comportamento Organizacional', '80', 23),
(57, 'Técnicas de Vendas e Negociação', '80', 23),
(58, 'Legislação Trabalhista, Tributária e Empresar', '80', 23),
(59, 'Estratégia Empresarial', '80', 23),
(60, 'Matemática Comercial e Financeira', '80', 23),
(61, 'Gestão Financeira', '80', 23),
(62, 'Gestão de Serviços', '80', 23),
(81, 'Logística', '80', 23),
(64, 'Sistemas de Informação', '80', 1),
(65, 'Eletricidade Elementar', '40', 22),
(66, 'Introdução a Eletrônica', '40', 22),
(67, 'Informática', '60', 1),
(68, 'Arquitetura de Sistemas', '60', 22),
(69, 'Fundamentos de Programação', '80', 1),
(70, 'Lógica Digital', '120', 22),
(71, 'Segurança do Trabalho', '60', 22),
(72, 'Operações e Logística', '60', 23),
(73, 'Circuitos Elétricos em Corrente Contínua e Alternada', '160', 22),
(74, 'Eletrônica Analógica', '160', 22),
(75, 'Prototipagem de Sistemas Digitais', '160', 22),
(76, 'Controladores Programáveis', '120', 22),
(77, 'Sistemas Microcontrolados', '160', 22),
(78, 'Comunicação Eletrônica', '120', 22),
(79, 'Instrumentação Eletrônica', '120', 22),
(80, 'Acionamento Eletrônico', '160', 22),
(82, 'Espanhol/Francês', '120', 30),
(83, 'Análise de Projeto Orientados a Objetos', '80', 1),
(84, 'Projeto de Desenvolvimento de Sistemas para Internet', '80', 1),
(85, 'Princípios de Design e Projeto Gráfico', '80', 8),
(86, 'Design Web e Arquitetura da Informação', '160', 8),
(87, 'Programação de Sistemas para Internet', '160', 1),
(88, 'Instalação e Configuração de Servidores', '80', 1),
(89, 'Projeto de Interface de Usuário', '160', 8),
(90, 'Programação Orientada a Serviços', '160', 1),
(91, 'eletronica', '40', 22);

-- --------------------------------------------------------

--
-- Estrutura da tabela `acha_grupo`
--

CREATE TABLE `acha_grupo` (
  `id_grupo` int(11) NOT NULL,
  `nome` varchar(50) NOT NULL,
  `id_coordenador` int(11) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `acha_grupo`
--

INSERT INTO `acha_grupo` (`id_grupo`, `nome`, `id_coordenador`) VALUES
(1, 'Informática', 1),
(2, 'Códigos e Linguagem', 2),
(3, 'Artes', 35),
(4, 'Ciências Humanas e Sociais', 1),
(5, 'Ciências da Natureza', 2),
(6, 'Matemática', 6),
(7, 'Eletrônica', 7),
(8, 'Comércio', 1),
(11, 'Educação Física', 33),
(12, 'Manutenção', 11),
(13, 'Línguas estrangeiras', 17);

-- --------------------------------------------------------

--
-- Estrutura da tabela `acha_horario`
--

CREATE TABLE `acha_horario` (
  `id_horario` int(11) NOT NULL,
  `codigo` varchar(50) DEFAULT NULL,
  `tipo` varchar(10) DEFAULT NULL,
  `id_preferencia` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `acha_matriz`
--

CREATE TABLE `acha_matriz` (
  `id_matriz` int(11) NOT NULL,
  `nome` varchar(45) NOT NULL,
  `ano` int(11) NOT NULL,
  `id_curso` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `acha_matriz`
--

INSERT INTO `acha_matriz` (`id_matriz`, `nome`, `ano`, `id_curso`) VALUES
(1, 'Informática', 2012, 1),
(3, 'Comércio', 2012, 6),
(4, 'Eletrônica', 2012, 2),
(5, 'Informática para internet', 2013, 8),
(6, 'Manutenção e Suporte em Informática', 2012, 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `acha_mod`
--

CREATE TABLE `acha_mod` (
  `id_mod` int(11) NOT NULL,
  `nome` varchar(50) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `acha_mod`
--

INSERT INTO `acha_mod` (`id_mod`, `nome`) VALUES
(1, 'Integrado'),
(2, 'Licenciatura');

-- --------------------------------------------------------

--
-- Estrutura da tabela `acha_nucleo`
--

CREATE TABLE `acha_nucleo` (
  `id_nucleo` int(11) NOT NULL,
  `nome` varchar(50) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `acha_nucleo`
--

INSERT INTO `acha_nucleo` (`id_nucleo`, `nome`) VALUES
(1, 'Tecnológico'),
(2, 'Articulador'),
(3, 'Estruturante'),
(4, 'extra');

-- --------------------------------------------------------

--
-- Estrutura da tabela `acha_ofer`
--

CREATE TABLE `acha_ofer` (
  `id_plan` int(11) NOT NULL,
  `id_matriz` int(11) NOT NULL,
  `qtd_sem` int(11) NOT NULL,
  `sem_ini` varchar(10) NOT NULL,
  `turno` varchar(20) NOT NULL,
  `numero` int(11) DEFAULT NULL,
  `id_ofer` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `acha_ofer`
--

INSERT INTO `acha_ofer` (`id_plan`, `id_matriz`, `qtd_sem`, `sem_ini`, `turno`, `numero`, `id_ofer`) VALUES
(1, 4, 8, '2015.1', 'manha', 1, 46),
(1, 4, 8, '2014.1', 'tarde', 1, 45),
(1, 4, 8, '2014.1', 'manha', 1, 44),
(1, 4, 8, '2013.1', 'manha', 1, 43),
(1, 3, 8, '2017.1', 'tarde', 2, 42),
(1, 3, 8, '2016.1', 'manha', 2, 41),
(1, 3, 8, '2015.1', 'tarde', 2, 40),
(1, 3, 8, '2014.1', 'manha', 2, 39),
(1, 3, 8, '2013.1', 'tarde', 1, 38),
(1, 4, 8, '2017.1', 'tarde', 1, 37),
(1, 4, 8, '2017.1', 'manha', 1, 36),
(1, 4, 8, '2016.1', 'tarde', 1, 35),
(1, 4, 8, '2016.1', 'manha', 1, 34),
(1, 4, 8, '2015.1', 'tarde', 1, 33),
(1, 4, 8, '2015.1', 'manha', 1, 32),
(1, 4, 8, '2013.1', 'manha', 1, 29),
(1, 4, 8, '2014.1', 'manha', 1, 30),
(1, 4, 8, '2014.1', 'tarde', 1, 31),
(1, 4, 8, '2015.1', 'tarde', 1, 47),
(1, 4, 8, '2016.1', 'manha', 1, 48),
(1, 4, 8, '2016.1', 'tarde', 1, 49),
(1, 4, 8, '2017.1', 'manha', 1, 50),
(1, 4, 8, '2017.1', 'tarde', 1, 51),
(1, 3, 8, '2013.1', 'manha', 2, 52),
(1, 3, 8, '2014.1', 'tarde', 2, 53),
(1, 3, 8, '2015.1', 'manha', 2, 54),
(1, 3, 8, '2016.1', 'tarde', 2, 55),
(1, 3, 8, '2017.1', 'manha', 2, 56),
(1, 1, 8, '2013.1', 'tarde', 1, 57),
(1, 5, 8, '2014.1', 'manha', 4, 58),
(1, 5, 8, '2015.1', 'tarde', 4, 59),
(1, 5, 8, '2016.2', 'manha', 4, 60),
(1, 5, 8, '2017.1', 'tarde', 4, 61),
(1, 6, 4, '2017.2', 'manha', 1, 63);

-- --------------------------------------------------------

--
-- Estrutura da tabela `acha_plan`
--

CREATE TABLE `acha_plan` (
  `id_plan` int(11) NOT NULL,
  `nome` varchar(50) NOT NULL,
  `dat_cri` date NOT NULL,
  `dat_exe` date DEFAULT NULL,
  `id_pro` int(11) NOT NULL,
  `ano_ini` varchar(4) DEFAULT NULL,
  `car_hor_max` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `acha_plan`
--

INSERT INTO `acha_plan` (`id_plan`, `nome`, `dat_cri`, `dat_exe`, `id_pro`, `ano_ini`, `car_hor_max`) VALUES
(1, 'Mestre', '2017-02-24', '2017-02-23', 1, '2013', 25);

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

-- --------------------------------------------------------

--
-- Estrutura da tabela `acha_pro`
--

CREATE TABLE `acha_pro` (
  `id_pro` int(11) NOT NULL,
  `nome` varchar(100) NOT NULL,
  `matricula` varchar(14) DEFAULT NULL,
  `car_hor` int(11) NOT NULL,
  `dir_aca` binary(1) DEFAULT NULL,
  `senha` varchar(32) NOT NULL,
  `membro_comis` int(1) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `acha_pro`
--

INSERT INTO `acha_pro` (`id_pro`, `nome`, `matricula`, `car_hor`, `dir_aca`, `senha`, `membro_comis`) VALUES
(1, 'Edmilson Campos', '123', 100, 0x00, 'e7d80ffeefa212b7c5c55700e4f7193e', 0),
(2, 'Sandra Camara', '555', 100, 0x30, '202cb962ac59075b964b07152d234b70', 1),
(6, 'Adriano Costa', '123', 100, 0x30, '0295b59b9c4322640f9f7908e9c3acbd', 0),
(7, 'Alba Lopes', '1234', 100, 0x30, '950a4152c2b4aa3ad78bdd6b366cc179', 0),
(11, 'Ailton Camara', '44010090', 100, 0x30, '7b234d766880716562508a8f2d400a94', 1),
(12, 'Alex Wagner', '', 100, 0x30, 'c2f48b78d2eeed2557aead11dbfd2519', 0),
(13, 'Alinne Pompeu', '', 100, 0x30, 'c2f48b78d2eeed2557aead11dbfd2519', 0),
(14, 'Aparecida Rego', '', 100, 0x30, 'c2f48b78d2eeed2557aead11dbfd2519', 0),
(15, 'Arthur Medeiros', '', 100, 0x30, 'c2f48b78d2eeed2557aead11dbfd2519', 0),
(16, 'Aylanna Oliveira', '', 100, 0x30, 'c2f48b78d2eeed2557aead11dbfd2519', 0),
(17, 'Bruno Lima', '', 100, 0x30, 'c2f48b78d2eeed2557aead11dbfd2519', 0),
(18, 'Cesar Silva', '', 100, 0x30, 'c2f48b78d2eeed2557aead11dbfd2519', 0),
(19, 'Cesimar Dias', '', 100, 0x30, 'c2f48b78d2eeed2557aead11dbfd2519', 0),
(20, 'Cleison Brito', '', 100, 0x30, 'c2f48b78d2eeed2557aead11dbfd2519', 0),
(21, 'Daniella Lago', '', 100, 0x30, 'c2f48b78d2eeed2557aead11dbfd2519', 0),
(22, 'Denise Momo', '', 100, 0x30, 'c2f48b78d2eeed2557aead11dbfd2519', 0),
(23, 'Diego Nascimento', '', 100, 0x30, 'c2f48b78d2eeed2557aead11dbfd2519', 0),
(24, 'Diogo Eugênio', '', 100, 0x30, 'c2f48b78d2eeed2557aead11dbfd2519', 0),
(25, 'Elis Betânia', '', 100, 0x30, 'c2f48b78d2eeed2557aead11dbfd2519', 0),
(26, 'Roberto Fonseca', '', 100, 0x30, 'c2f48b78d2eeed2557aead11dbfd2519', 0),
(27, 'Erico Braz', '', 100, 0x30, 'c2f48b78d2eeed2557aead11dbfd2519', 0),
(28, 'Rafael Medeiros', '', 100, 0x30, 'c2f48b78d2eeed2557aead11dbfd2519', 0),
(29, 'Erika Albuquerque', '', 100, 0x30, 'c2f48b78d2eeed2557aead11dbfd2519', 0),
(30, 'Estefana Torres', '', 100, 0x30, 'c2f48b78d2eeed2557aead11dbfd2519', 0),
(31, 'Pedro Ivo', '', 100, 0x30, 'c2f48b78d2eeed2557aead11dbfd2519', 0),
(32, 'Paulo Duavy', '', 100, 0x30, 'c2f48b78d2eeed2557aead11dbfd2519', 0),
(33, 'Everaldo Andrade', '', 100, 0x30, 'c2f48b78d2eeed2557aead11dbfd2519', 0),
(34, 'Paulo de Tarso', '', 100, 0x30, 'c2f48b78d2eeed2557aead11dbfd2519', 0),
(35, 'Fábio Santos', '', 100, 0x30, 'c2f48b78d2eeed2557aead11dbfd2519', 0),
(36, 'Pauleany Morais', '', 100, 0x30, 'c2f48b78d2eeed2557aead11dbfd2519', 0),
(37, 'Fabrícia Rocha', '', 100, 0x30, 'c2f48b78d2eeed2557aead11dbfd2519', 0),
(38, 'Giovanninni Batista', '', 100, 0x30, 'c2f48b78d2eeed2557aead11dbfd2519', 0),
(39, 'Givanaldo', '', 100, 0x30, 'c2f48b78d2eeed2557aead11dbfd2519', 0),
(40, 'Pablo Spinelli', '', 100, 0x30, 'c2f48b78d2eeed2557aead11dbfd2519', 0),
(41, 'Helio Marques', '', 100, 0x30, 'c2f48b78d2eeed2557aead11dbfd2519', 0),
(42, 'Pablo Capistrano', '', 100, 0x30, 'c2f48b78d2eeed2557aead11dbfd2519', 0),
(43, 'Otávio Barbosa', '', 100, 0x30, 'c2f48b78d2eeed2557aead11dbfd2519', 0),
(44, 'Iranylson Gomes', '', 100, 0x30, 'c2f48b78d2eeed2557aead11dbfd2519', 0),
(45, 'Olímpio Junior', '', 100, 0x30, 'c2f48b78d2eeed2557aead11dbfd2519', 0),
(46, 'Isaac Danillo', '', 100, 0x30, 'c2f48b78d2eeed2557aead11dbfd2519', 0),
(47, 'Marlene Medeiros', '', 100, 0x30, 'c2f48b78d2eeed2557aead11dbfd2519', 0),
(48, 'Jair Souza', '', 100, 0x30, 'c2f48b78d2eeed2557aead11dbfd2519', 0),
(49, 'Marjorie Ramos', '', 100, 0x30, 'c2f48b78d2eeed2557aead11dbfd2519', 0),
(50, 'Karla Lima', '', 100, 0x30, 'c2f48b78d2eeed2557aead11dbfd2519', 0),
(51, 'Keila Cruz', '', 100, 0x30, 'c2f48b78d2eeed2557aead11dbfd2519', 0),
(52, 'Marcus Fernandes', '', 100, 0x30, 'c2f48b78d2eeed2557aead11dbfd2519', 0),
(53, 'Liliane Gurgel', '', 100, 0x30, 'c2f48b78d2eeed2557aead11dbfd2519', 0),
(54, 'Manuel Neto', '', 100, 0x30, 'c2f48b78d2eeed2557aead11dbfd2519', 0),
(55, 'Liviane Melo', '', 100, 0x30, 'c2f48b78d2eeed2557aead11dbfd2519', 0),
(56, 'Luciano Nóbrega', '', 100, 0x30, 'c2f48b78d2eeed2557aead11dbfd2519', 0),
(57, 'Luiz Henrique', '', 100, 0x30, 'c2f48b78d2eeed2557aead11dbfd2519', 0),
(58, 'Luis Roberto', '', 100, 0x30, 'c2f48b78d2eeed2557aead11dbfd2519', 0),
(59, 'Luis Ferdinando', '', 100, 0x30, 'c2f48b78d2eeed2557aead11dbfd2519', 0),
(60, 'Roberto Lima', '', 100, 0x30, 'c2f48b78d2eeed2557aead11dbfd2519', 0),
(61, 'Zildalte Macedo', '', 100, 0x30, 'c2f48b78d2eeed2557aead11dbfd2519', 0),
(62, 'Rodolfo Costa', '', 100, 0x30, 'c2f48b78d2eeed2557aead11dbfd2519', 0),
(63, 'Wiane Lima', '', 100, 0x30, 'c2f48b78d2eeed2557aead11dbfd2519', 0),
(71, 'Severino Gomes', '', 100, 0x30, 'c2f48b78d2eeed2557aead11dbfd2519', 0),
(65, 'Wandirce Medeiros', '', 100, 0x30, 'c2f48b78d2eeed2557aead11dbfd2519', 0),
(66, 'Sergio Trindade', '', 100, 0x30, 'c2f48b78d2eeed2557aead11dbfd2519', 0),
(67, 'Vaneska Santos', '', 100, 0x30, 'c2f48b78d2eeed2557aead11dbfd2519', 0),
(68, 'Valcinete', '', 100, 0x30, 'c2f48b78d2eeed2557aead11dbfd2519', 0),
(69, 'Thiago Valentim', '', 100, 0x30, 'c2f48b78d2eeed2557aead11dbfd2519', 0),
(70, 'Teresa Paula', '', 100, 0x30, 'c2f48b78d2eeed2557aead11dbfd2519', 1),
(73, 'Administrador', 'admin', 1, NULL, 'root', 2);

-- --------------------------------------------------------

--
-- Estrutura da tabela `acha_pro_grupo`
--

CREATE TABLE `acha_pro_grupo` (
  `id_pro` int(11) NOT NULL,
  `id_grupo` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `acha_pro_grupo`
--

INSERT INTO `acha_pro_grupo` (`id_pro`, `id_grupo`) VALUES
(12, 6),
(16, 7),
(15, 1),
(24, 12),
(14, 2),
(13, 8),
(6, 7),
(7, 1),
(1, 1),
(35, 3),
(59, 13),
(18, 8),
(19, 1),
(20, 1),
(21, 2),
(22, 8),
(23, 1),
(11, 12),
(25, 2),
(26, 4),
(27, 1),
(28, 5),
(29, 5),
(30, 5),
(31, 7),
(32, 8),
(33, 11),
(34, 8),
(36, 2),
(37, 8),
(38, 6),
(39, 1),
(40, 2),
(41, 4),
(42, 4),
(43, 1),
(44, 8),
(45, 5),
(46, 1),
(47, 8),
(48, 7),
(49, 4),
(50, 8),
(51, 2),
(52, 7),
(53, 5),
(54, 5),
(55, 7),
(56, 6),
(57, 4),
(58, 4),
(17, 13),
(60, 5),
(61, 3),
(62, 1),
(63, 2),
(71, 6),
(65, 2),
(66, 4),
(67, 4),
(68, 2),
(69, 6),
(70, 2);

-- --------------------------------------------------------

--
-- Estrutura da tabela `acha_reuniao`
--

CREATE TABLE `acha_reuniao` (
  `id_reuniao` int(11) NOT NULL,
  `codigo` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `acha_reuniao`
--

INSERT INTO `acha_reuniao` (`id_reuniao`, `codigo`) VALUES
(1, '4m5'),
(2, '4m6'),
(3, '4v1'),
(4, '4v2'),
(5, '4v3'),
(6, '4v4'),
(7, '4v5'),
(8, '4v6');

-- --------------------------------------------------------

--
-- Estrutura da tabela `acha_reuniao_grupo`
--

CREATE TABLE `acha_reuniao_grupo` (
  `id_reuniao_grupo` int(11) NOT NULL,
  `id_reuniao` int(11) NOT NULL,
  `id_grupo` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `acha_reuniao_grupo`
--

INSERT INTO `acha_reuniao_grupo` (`id_reuniao_grupo`, `id_reuniao`, `id_grupo`) VALUES
(1, 1, 1),
(2, 2, 1),
(3, 1, 7),
(4, 2, 7),
(5, 3, 1),
(6, 4, 1),
(7, 3, 2),
(8, 4, 2),
(9, 3, 3),
(10, 4, 3),
(11, 3, 4),
(12, 4, 4),
(13, 3, 5),
(14, 4, 5),
(15, 3, 6),
(16, 4, 6),
(17, 3, 7),
(18, 4, 7),
(19, 3, 8),
(20, 4, 8),
(21, 3, 11),
(22, 4, 11),
(23, 3, 12),
(24, 4, 12),
(25, 3, 13),
(26, 4, 13),
(27, 5, 2),
(28, 6, 2),
(29, 5, 3),
(30, 6, 3),
(31, 5, 4),
(32, 6, 4),
(33, 5, 5),
(34, 6, 5),
(35, 5, 6),
(36, 6, 6),
(37, 5, 11),
(38, 6, 11),
(39, 5, 13),
(40, 6, 13),
(41, 5, 12),
(42, 6, 12);

-- --------------------------------------------------------

--
-- Estrutura da tabela `acha_sem_com_cur`
--

CREATE TABLE `acha_sem_com_cur` (
  `id_sem_com_cur` int(11) NOT NULL,
  `periodo` int(11) NOT NULL,
  `creditos` int(11) NOT NULL,
  `id_com_cur` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `acha_sem_com_cur`
--

INSERT INTO `acha_sem_com_cur` (`id_sem_com_cur`, `periodo`, `creditos`, `id_com_cur`) VALUES
(1, 1, 3, 1),
(2, 2, 3, 1),
(3, 3, 3, 1),
(4, 4, 3, 1),
(5, 5, 3, 1),
(6, 6, 3, 1),
(7, 7, 2, 1),
(8, 8, 2, 1),
(57, 1, 3, 13),
(58, 2, 3, 13),
(59, 3, 3, 13),
(60, 4, 3, 13),
(61, 5, 0, 13),
(62, 6, 0, 13),
(63, 7, 0, 13),
(64, 8, 0, 13),
(65, 1, 0, 14),
(66, 2, 0, 14),
(67, 3, 0, 14),
(68, 4, 0, 14),
(69, 5, 0, 14),
(70, 6, 0, 14),
(71, 7, 3, 14),
(72, 8, 3, 14),
(73, 1, 0, 15),
(74, 2, 2, 15),
(75, 3, 2, 15),
(76, 4, 2, 15),
(77, 5, 0, 15),
(78, 6, 0, 15),
(79, 7, 0, 15),
(80, 8, 0, 15),
(81, 1, 2, 16),
(82, 2, 2, 16),
(83, 3, 2, 16),
(84, 4, 2, 16),
(85, 5, 0, 16),
(86, 6, 0, 16),
(87, 7, 0, 16),
(88, 8, 0, 16),
(89, 1, 4, 17),
(90, 2, 4, 17),
(91, 3, 2, 17),
(92, 4, 2, 17),
(93, 5, 0, 17),
(94, 6, 0, 17),
(95, 7, 0, 17),
(96, 8, 0, 17),
(97, 1, 0, 18),
(98, 2, 0, 18),
(99, 3, 0, 18),
(100, 4, 0, 18),
(101, 5, 2, 18),
(102, 6, 2, 18),
(103, 7, 4, 18),
(104, 8, 4, 18),
(105, 1, 2, 19),
(106, 2, 0, 19),
(107, 3, 0, 19),
(108, 4, 2, 19),
(109, 5, 2, 19),
(110, 6, 0, 19),
(111, 7, 0, 19),
(112, 8, 0, 19),
(113, 1, 0, 20),
(114, 2, 2, 20),
(115, 3, 2, 20),
(116, 4, 0, 20),
(117, 5, 0, 20),
(118, 6, 2, 20),
(119, 7, 0, 20),
(120, 8, 0, 20),
(121, 1, 4, 21),
(122, 2, 4, 21),
(123, 3, 3, 21),
(124, 4, 3, 21),
(125, 5, 3, 21),
(126, 6, 3, 21),
(127, 7, 0, 21),
(128, 8, 0, 21),
(129, 1, 4, 22),
(130, 2, 4, 22),
(131, 3, 4, 22),
(132, 4, 4, 22),
(133, 5, 0, 22),
(134, 6, 0, 22),
(135, 7, 0, 22),
(136, 8, 0, 22),
(137, 1, 0, 23),
(138, 2, 0, 23),
(139, 3, 0, 23),
(140, 4, 0, 23),
(141, 5, 4, 23),
(142, 6, 4, 23),
(143, 7, 4, 23),
(144, 8, 4, 23),
(145, 1, 0, 24),
(146, 2, 0, 24),
(147, 3, 0, 24),
(148, 4, 0, 24),
(149, 5, 3, 24),
(150, 6, 3, 24),
(151, 7, 4, 24),
(152, 8, 4, 24),
(153, 1, 3, 25),
(154, 2, 0, 25),
(155, 3, 0, 25),
(156, 4, 0, 25),
(157, 5, 0, 25),
(158, 6, 0, 25),
(159, 7, 0, 25),
(160, 8, 0, 25),
(161, 1, 0, 26),
(162, 2, 0, 26),
(163, 3, 0, 26),
(164, 4, 0, 26),
(165, 5, 0, 26),
(166, 6, 0, 26),
(167, 7, 0, 26),
(168, 8, 2, 26),
(169, 1, 0, 27),
(170, 2, 0, 27),
(171, 3, 0, 27),
(172, 4, 0, 27),
(173, 5, 0, 27),
(174, 6, 0, 27),
(175, 7, 2, 27),
(176, 8, 0, 27),
(177, 1, 0, 28),
(178, 2, 0, 28),
(179, 3, 0, 28),
(180, 4, 0, 28),
(181, 5, 0, 28),
(182, 6, 0, 28),
(183, 7, 0, 28),
(184, 8, 2, 28),
(185, 1, 0, 29),
(186, 2, 0, 29),
(187, 3, 0, 29),
(188, 4, 0, 29),
(189, 5, 0, 29),
(190, 6, 0, 29),
(191, 7, 2, 29),
(192, 8, 0, 29),
(193, 1, 2, 30),
(194, 2, 3, 30),
(195, 3, 0, 30),
(196, 4, 0, 30),
(197, 5, 0, 30),
(198, 6, 0, 30),
(199, 7, 0, 30),
(200, 8, 0, 30),
(201, 1, 3, 31),
(202, 2, 3, 31),
(203, 3, 0, 31),
(204, 4, 0, 31),
(205, 5, 0, 31),
(206, 6, 0, 31),
(207, 7, 0, 31),
(208, 8, 0, 31),
(209, 1, 0, 32),
(210, 2, 0, 32),
(211, 3, 4, 32),
(212, 4, 4, 32),
(213, 5, 0, 32),
(214, 6, 0, 32),
(215, 7, 0, 32),
(216, 8, 0, 32),
(217, 1, 0, 33),
(218, 2, 0, 33),
(219, 3, 0, 33),
(220, 4, 0, 33),
(221, 5, 4, 33),
(222, 6, 4, 33),
(223, 7, 0, 33),
(224, 8, 0, 33),
(225, 1, 0, 34),
(226, 2, 0, 34),
(227, 3, 4, 34),
(228, 4, 4, 34),
(229, 5, 0, 34),
(230, 6, 0, 34),
(231, 7, 0, 34),
(232, 8, 0, 34),
(233, 1, 0, 35),
(234, 2, 0, 35),
(235, 3, 0, 35),
(236, 4, 0, 35),
(237, 5, 3, 35),
(238, 6, 4, 35),
(239, 7, 0, 35),
(240, 8, 0, 35),
(241, 1, 0, 36),
(242, 2, 0, 36),
(243, 3, 0, 36),
(244, 4, 0, 36),
(245, 5, 0, 36),
(246, 6, 0, 36),
(247, 7, 2, 36),
(248, 8, 2, 36),
(249, 1, 0, 37),
(250, 2, 0, 37),
(251, 3, 0, 37),
(252, 4, 0, 37),
(253, 5, 2, 37),
(254, 6, 2, 37),
(255, 7, 0, 37),
(256, 8, 0, 37),
(257, 1, 0, 38),
(258, 2, 0, 38),
(259, 3, 0, 38),
(260, 4, 0, 38),
(261, 5, 0, 38),
(262, 6, 0, 38),
(263, 7, 3, 38),
(264, 8, 3, 38),
(265, 1, 0, 39),
(266, 2, 0, 39),
(267, 3, 0, 39),
(268, 4, 0, 39),
(269, 5, 4, 39),
(270, 6, 3, 39),
(271, 7, 0, 39),
(272, 8, 0, 39),
(273, 1, 0, 40),
(274, 2, 0, 40),
(275, 3, 0, 40),
(276, 4, 0, 40),
(277, 5, 0, 40),
(278, 6, 0, 40),
(279, 7, 4, 40),
(280, 8, 4, 40),
(281, 1, 3, 41),
(282, 2, 3, 41),
(283, 3, 3, 41),
(284, 4, 3, 41),
(285, 5, 3, 41),
(286, 6, 3, 41),
(287, 7, 2, 41),
(288, 8, 2, 41),
(289, 1, 0, 42),
(290, 2, 0, 42),
(291, 3, 0, 42),
(292, 4, 0, 42),
(293, 5, 3, 42),
(294, 6, 3, 42),
(295, 7, 3, 42),
(296, 8, 3, 42),
(297, 1, 0, 43),
(298, 2, 0, 43),
(299, 3, 0, 43),
(300, 4, 0, 43),
(301, 5, 0, 43),
(302, 6, 0, 43),
(303, 7, 3, 43),
(304, 8, 3, 43),
(305, 1, 0, 44),
(306, 2, 2, 44),
(307, 3, 2, 44),
(308, 4, 2, 44),
(309, 5, 0, 44),
(310, 6, 0, 44),
(311, 7, 0, 44),
(312, 8, 0, 44),
(313, 1, 2, 45),
(314, 2, 2, 45),
(315, 3, 2, 45),
(316, 4, 2, 45),
(317, 5, 0, 45),
(318, 6, 0, 45),
(319, 7, 0, 45),
(320, 8, 0, 45),
(321, 1, 4, 46),
(322, 2, 4, 46),
(323, 3, 2, 46),
(324, 4, 2, 46),
(325, 5, 0, 46),
(326, 6, 0, 46),
(327, 7, 0, 46),
(328, 8, 0, 46),
(329, 1, 2, 47),
(330, 2, 2, 47),
(331, 3, 4, 47),
(332, 4, 4, 47),
(333, 5, 0, 47),
(334, 6, 0, 47),
(335, 7, 0, 47),
(336, 8, 0, 47),
(337, 1, 2, 48),
(338, 2, 0, 48),
(339, 3, 0, 48),
(340, 4, 2, 48),
(341, 5, 2, 48),
(342, 6, 0, 48),
(343, 7, 0, 48),
(344, 8, 0, 48),
(345, 1, 0, 49),
(346, 2, 2, 49),
(347, 3, 2, 49),
(348, 4, 0, 49),
(349, 5, 0, 49),
(350, 6, 2, 49),
(351, 7, 0, 49),
(352, 8, 0, 49),
(353, 1, 4, 50),
(354, 2, 4, 50),
(355, 3, 3, 50),
(356, 4, 3, 50),
(357, 5, 3, 50),
(358, 6, 3, 50),
(359, 7, 0, 50),
(360, 8, 0, 50),
(776, 8, 0, 102),
(775, 7, 0, 102),
(774, 6, 0, 102),
(773, 5, 0, 102),
(772, 4, 4, 102),
(771, 3, 0, 102),
(770, 2, 0, 102),
(769, 1, 0, 102),
(369, 1, 4, 52),
(370, 2, 4, 52),
(371, 3, 4, 52),
(372, 4, 4, 52),
(373, 5, 0, 52),
(374, 6, 0, 52),
(375, 7, 0, 52),
(376, 8, 0, 52),
(377, 1, 0, 53),
(378, 2, 0, 53),
(379, 3, 0, 53),
(380, 4, 0, 53),
(381, 5, 4, 53),
(382, 6, 4, 53),
(383, 7, 3, 53),
(384, 8, 3, 53),
(385, 1, 3, 54),
(386, 2, 0, 54),
(387, 3, 0, 54),
(388, 4, 0, 54),
(389, 5, 0, 54),
(390, 6, 0, 54),
(391, 7, 0, 54),
(392, 8, 0, 54),
(393, 1, 0, 55),
(394, 2, 0, 55),
(395, 3, 0, 55),
(396, 4, 0, 55),
(397, 5, 0, 55),
(398, 6, 0, 55),
(399, 7, 0, 55),
(400, 8, 2, 55),
(401, 1, 0, 56),
(402, 2, 0, 56),
(403, 3, 0, 56),
(404, 4, 0, 56),
(405, 5, 0, 56),
(406, 6, 0, 56),
(407, 7, 2, 56),
(408, 8, 0, 56),
(409, 1, 0, 57),
(410, 2, 0, 57),
(411, 3, 0, 57),
(412, 4, 0, 57),
(413, 5, 2, 57),
(414, 6, 0, 57),
(415, 7, 0, 57),
(416, 8, 0, 57),
(417, 1, 0, 58),
(418, 2, 0, 58),
(419, 3, 0, 58),
(420, 4, 0, 58),
(421, 5, 0, 58),
(422, 6, 3, 58),
(423, 7, 0, 58),
(424, 8, 0, 58),
(425, 1, 0, 59),
(426, 2, 0, 59),
(427, 3, 0, 59),
(428, 4, 0, 59),
(429, 5, 0, 59),
(430, 6, 4, 59),
(431, 7, 0, 59),
(432, 8, 0, 59),
(433, 1, 4, 60),
(434, 2, 0, 60),
(435, 3, 0, 60),
(436, 4, 0, 60),
(437, 5, 0, 60),
(438, 6, 0, 60),
(439, 7, 0, 60),
(440, 8, 0, 60),
(441, 1, 0, 61),
(442, 2, 4, 61),
(443, 3, 0, 61),
(444, 4, 0, 61),
(445, 5, 0, 61),
(446, 6, 0, 61),
(447, 7, 0, 61),
(448, 8, 0, 61),
(449, 1, 0, 62),
(450, 2, 0, 62),
(451, 3, 4, 62),
(452, 4, 0, 62),
(453, 5, 0, 62),
(454, 6, 0, 62),
(455, 7, 0, 62),
(456, 8, 0, 62),
(457, 1, 0, 63),
(458, 2, 0, 63),
(459, 3, 4, 63),
(460, 4, 0, 63),
(461, 5, 0, 63),
(462, 6, 0, 63),
(463, 7, 0, 63),
(464, 8, 0, 63),
(465, 1, 0, 64),
(466, 2, 0, 64),
(467, 3, 0, 64),
(468, 4, 4, 64),
(469, 5, 0, 64),
(470, 6, 0, 64),
(471, 7, 0, 64),
(472, 8, 0, 64),
(473, 1, 0, 65),
(474, 2, 0, 65),
(475, 3, 0, 65),
(476, 4, 4, 65),
(477, 5, 0, 65),
(478, 6, 0, 65),
(479, 7, 0, 65),
(480, 8, 0, 65),
(481, 1, 0, 66),
(482, 2, 0, 66),
(483, 3, 0, 66),
(484, 4, 0, 66),
(485, 5, 4, 66),
(486, 6, 0, 66),
(487, 7, 0, 66),
(488, 8, 0, 66),
(489, 1, 0, 67),
(490, 2, 0, 67),
(491, 3, 0, 67),
(492, 4, 0, 67),
(493, 5, 4, 67),
(494, 6, 0, 67),
(495, 7, 0, 67),
(496, 8, 0, 67),
(497, 1, 0, 68),
(498, 2, 0, 68),
(499, 3, 0, 68),
(500, 4, 0, 68),
(501, 5, 0, 68),
(502, 6, 4, 68),
(503, 7, 0, 68),
(504, 8, 0, 68),
(505, 1, 0, 69),
(506, 2, 0, 69),
(507, 3, 0, 69),
(508, 4, 0, 69),
(509, 5, 0, 69),
(510, 6, 0, 69),
(511, 7, 4, 69),
(512, 8, 0, 69),
(513, 1, 0, 70),
(514, 2, 0, 70),
(515, 3, 0, 70),
(516, 4, 0, 70),
(517, 5, 0, 70),
(518, 6, 0, 70),
(519, 7, 4, 70),
(520, 8, 0, 70),
(784, 8, 2, 103),
(783, 7, 2, 103),
(782, 6, 3, 103),
(781, 5, 3, 103),
(780, 4, 3, 103),
(779, 3, 3, 103),
(778, 2, 3, 103),
(777, 1, 3, 103),
(529, 1, 0, 72),
(530, 2, 0, 72),
(531, 3, 0, 72),
(532, 4, 0, 72),
(533, 5, 0, 72),
(534, 6, 0, 72),
(535, 7, 0, 72),
(536, 8, 4, 72),
(537, 1, 3, 73),
(538, 2, 3, 73),
(539, 3, 3, 73),
(540, 4, 3, 73),
(541, 5, 3, 73),
(542, 6, 3, 73),
(543, 7, 2, 73),
(544, 8, 2, 73),
(545, 1, 0, 74),
(546, 2, 0, 74),
(547, 3, 0, 74),
(548, 4, 0, 74),
(549, 5, 3, 74),
(550, 6, 3, 74),
(551, 7, 3, 74),
(552, 8, 3, 74),
(553, 1, 0, 75),
(554, 2, 0, 75),
(555, 3, 0, 75),
(556, 4, 0, 75),
(557, 5, 0, 75),
(558, 6, 0, 75),
(559, 7, 3, 75),
(560, 8, 3, 75),
(561, 1, 2, 76),
(562, 2, 2, 76),
(563, 3, 2, 76),
(564, 4, 0, 76),
(565, 5, 0, 76),
(566, 6, 0, 76),
(567, 7, 0, 76),
(568, 8, 0, 76),
(569, 1, 2, 77),
(570, 2, 2, 77),
(571, 3, 2, 77),
(572, 4, 2, 77),
(573, 5, 0, 77),
(574, 6, 0, 77),
(575, 7, 0, 77),
(576, 8, 0, 77),
(577, 1, 4, 78),
(578, 2, 4, 78),
(579, 3, 2, 78),
(580, 4, 2, 78),
(581, 5, 0, 78),
(582, 6, 0, 78),
(583, 7, 0, 78),
(584, 8, 0, 78),
(585, 1, 0, 79),
(586, 2, 0, 79),
(587, 3, 0, 79),
(588, 4, 0, 79),
(589, 5, 2, 79),
(590, 6, 2, 79),
(591, 7, 4, 79),
(592, 8, 4, 79),
(593, 1, 2, 80),
(594, 2, 0, 80),
(595, 3, 0, 80),
(596, 4, 2, 80),
(597, 5, 2, 80),
(598, 6, 0, 80),
(599, 7, 0, 80),
(600, 8, 0, 80),
(601, 1, 0, 81),
(602, 2, 2, 81),
(603, 3, 2, 81),
(604, 4, 0, 81),
(605, 5, 0, 81),
(606, 6, 2, 81),
(607, 7, 0, 81),
(608, 8, 0, 81),
(609, 1, 4, 82),
(610, 2, 4, 82),
(611, 3, 3, 82),
(612, 4, 3, 82),
(613, 5, 3, 82),
(614, 6, 3, 82),
(615, 7, 0, 82),
(616, 8, 0, 82),
(617, 1, 4, 83),
(618, 2, 4, 83),
(619, 3, 4, 83),
(620, 4, 4, 83),
(621, 5, 0, 83),
(622, 6, 0, 83),
(623, 7, 0, 83),
(624, 8, 0, 83),
(625, 1, 4, 84),
(626, 2, 4, 84),
(627, 3, 4, 84),
(628, 4, 4, 84),
(629, 5, 0, 84),
(630, 6, 0, 84),
(631, 7, 0, 84),
(632, 8, 0, 84),
(633, 1, 0, 85),
(634, 2, 0, 85),
(635, 3, 0, 85),
(636, 4, 0, 85),
(637, 5, 3, 85),
(638, 6, 3, 85),
(639, 7, 4, 85),
(640, 8, 4, 85),
(641, 1, 2, 86),
(642, 2, 0, 86),
(643, 3, 0, 86),
(644, 4, 0, 86),
(645, 5, 0, 86),
(646, 6, 0, 86),
(647, 7, 0, 86),
(648, 8, 0, 86),
(649, 1, 0, 87),
(650, 2, 2, 87),
(651, 3, 0, 87),
(652, 4, 0, 87),
(653, 5, 0, 87),
(654, 6, 0, 87),
(655, 7, 0, 87),
(656, 8, 0, 87),
(657, 1, 3, 88),
(658, 2, 0, 88),
(659, 3, 0, 88),
(660, 4, 0, 88),
(661, 5, 0, 88),
(662, 6, 0, 88),
(663, 7, 0, 88),
(664, 8, 0, 88),
(665, 1, 0, 89),
(666, 2, 3, 89),
(667, 3, 0, 89),
(668, 4, 0, 89),
(669, 5, 0, 89),
(670, 6, 0, 89),
(671, 7, 0, 89),
(672, 8, 0, 89),
(673, 1, 0, 90),
(674, 2, 0, 90),
(675, 3, 4, 90),
(676, 4, 0, 90),
(677, 5, 0, 90),
(678, 6, 0, 90),
(679, 7, 0, 90),
(680, 8, 0, 90),
(681, 1, 0, 91),
(682, 2, 0, 91),
(683, 3, 0, 91),
(684, 4, 6, 91),
(685, 5, 0, 91),
(686, 6, 0, 91),
(687, 7, 0, 91),
(688, 8, 0, 91),
(689, 1, 0, 92),
(690, 2, 0, 92),
(691, 3, 0, 92),
(692, 4, 0, 92),
(693, 5, 0, 92),
(694, 6, 3, 92),
(695, 7, 0, 92),
(696, 8, 0, 92),
(697, 1, 0, 93),
(698, 2, 0, 93),
(699, 3, 0, 93),
(700, 4, 0, 93),
(701, 5, 3, 93),
(702, 6, 0, 93),
(703, 7, 0, 93),
(704, 8, 0, 93),
(705, 1, 0, 94),
(706, 2, 0, 94),
(707, 3, 4, 94),
(708, 4, 4, 94),
(709, 5, 0, 94),
(710, 6, 0, 94),
(711, 7, 0, 94),
(712, 8, 0, 94),
(713, 1, 0, 95),
(714, 2, 0, 95),
(715, 3, 0, 95),
(716, 4, 0, 95),
(717, 5, 4, 95),
(718, 6, 4, 95),
(719, 7, 0, 95),
(720, 8, 0, 95),
(721, 1, 0, 96),
(722, 2, 0, 96),
(723, 3, 0, 96),
(724, 4, 0, 96),
(725, 5, 4, 96),
(726, 6, 4, 96),
(727, 7, 0, 96),
(728, 8, 0, 96),
(729, 1, 0, 97),
(730, 2, 0, 97),
(731, 3, 0, 97),
(732, 4, 0, 97),
(733, 5, 3, 97),
(734, 6, 3, 97),
(735, 7, 0, 97),
(736, 8, 0, 97),
(737, 1, 0, 98),
(738, 2, 0, 98),
(739, 3, 0, 98),
(740, 4, 0, 98),
(741, 5, 0, 98),
(742, 6, 0, 98),
(743, 7, 4, 98),
(744, 8, 4, 98),
(745, 1, 0, 99),
(746, 2, 0, 99),
(747, 3, 0, 99),
(748, 4, 0, 99),
(749, 5, 0, 99),
(750, 6, 0, 99),
(751, 7, 3, 99),
(752, 8, 3, 99),
(753, 1, 0, 100),
(754, 2, 0, 100),
(755, 3, 0, 100),
(756, 4, 0, 100),
(757, 5, 0, 100),
(758, 6, 0, 100),
(759, 7, 3, 100),
(760, 8, 3, 100),
(761, 1, 0, 101),
(762, 2, 0, 101),
(763, 3, 0, 101),
(764, 4, 0, 101),
(765, 5, 0, 101),
(766, 6, 0, 101),
(767, 7, 4, 101),
(768, 8, 4, 101),
(785, 1, 0, 104),
(786, 2, 0, 104),
(787, 3, 0, 104),
(788, 4, 0, 104),
(789, 5, 3, 104),
(790, 6, 3, 104),
(791, 7, 3, 104),
(792, 8, 3, 104),
(793, 1, 0, 105),
(794, 2, 0, 105),
(795, 3, 0, 105),
(796, 4, 0, 105),
(797, 5, 0, 105),
(798, 6, 0, 105),
(799, 7, 3, 105),
(800, 8, 3, 105),
(801, 1, 0, 106),
(802, 2, 2, 106),
(803, 3, 2, 106),
(804, 4, 2, 106),
(805, 5, 0, 106),
(806, 6, 0, 106),
(807, 7, 0, 106),
(808, 8, 0, 106),
(809, 1, 2, 107),
(810, 2, 2, 107),
(811, 3, 2, 107),
(812, 4, 2, 107),
(813, 5, 0, 107),
(814, 6, 0, 107),
(815, 7, 0, 107),
(816, 8, 0, 107),
(817, 1, 4, 108),
(818, 2, 4, 108),
(819, 3, 2, 108),
(820, 4, 2, 108),
(821, 5, 0, 108),
(822, 6, 0, 108),
(823, 7, 0, 108),
(824, 8, 0, 108),
(825, 1, 0, 109),
(826, 2, 0, 109),
(827, 3, 0, 109),
(828, 4, 0, 109),
(829, 5, 2, 109),
(830, 6, 2, 109),
(831, 7, 4, 109),
(832, 8, 4, 109),
(833, 1, 2, 110),
(834, 2, 0, 110),
(835, 3, 0, 110),
(836, 4, 2, 110),
(837, 5, 2, 110),
(838, 6, 0, 110),
(839, 7, 0, 110),
(840, 8, 0, 110),
(841, 1, 0, 111),
(842, 2, 2, 111),
(843, 3, 2, 111),
(844, 4, 0, 111),
(845, 5, 0, 111),
(846, 6, 2, 111),
(847, 7, 0, 111),
(848, 8, 0, 111),
(849, 1, 4, 112),
(850, 2, 4, 112),
(851, 3, 3, 112),
(852, 4, 3, 112),
(853, 5, 3, 112),
(854, 6, 3, 112),
(855, 7, 0, 112),
(856, 8, 0, 112),
(857, 1, 4, 113),
(858, 2, 4, 113),
(859, 3, 4, 113),
(860, 4, 4, 113),
(861, 5, 0, 113),
(862, 6, 0, 113),
(863, 7, 0, 113),
(864, 8, 0, 113),
(865, 1, 4, 114),
(866, 2, 4, 114),
(867, 3, 4, 114),
(868, 4, 4, 114),
(869, 5, 0, 114),
(870, 6, 0, 114),
(871, 7, 0, 114),
(872, 8, 0, 114),
(873, 1, 0, 115),
(874, 2, 0, 115),
(875, 3, 0, 115),
(876, 4, 0, 115),
(877, 5, 3, 115),
(878, 6, 3, 115),
(879, 7, 4, 115),
(880, 8, 4, 115),
(881, 1, 3, 116),
(882, 2, 0, 116),
(883, 3, 0, 116),
(884, 4, 0, 116),
(885, 5, 0, 116),
(886, 6, 0, 116),
(887, 7, 0, 116),
(888, 8, 0, 116),
(889, 1, 0, 117),
(890, 2, 0, 117),
(891, 3, 0, 117),
(892, 4, 0, 117),
(893, 5, 0, 117),
(894, 6, 0, 117),
(895, 7, 0, 117),
(896, 8, 2, 117),
(897, 1, 0, 118),
(898, 2, 0, 118),
(899, 3, 0, 118),
(900, 4, 0, 118),
(901, 5, 0, 118),
(902, 6, 0, 118),
(903, 7, 2, 118),
(904, 8, 0, 118),
(905, 1, 0, 119),
(906, 2, 0, 119),
(907, 3, 0, 119),
(908, 4, 0, 119),
(909, 5, 0, 119),
(910, 6, 0, 119),
(911, 7, 0, 119),
(912, 8, 2, 119),
(913, 1, 0, 120),
(914, 2, 0, 120),
(915, 3, 0, 120),
(916, 4, 0, 120),
(917, 5, 0, 120),
(918, 6, 0, 120),
(919, 7, 2, 120),
(920, 8, 0, 120),
(921, 1, 2, 121),
(922, 2, 2, 121),
(923, 3, 0, 121),
(924, 4, 0, 121),
(925, 5, 0, 121),
(926, 6, 0, 121),
(927, 7, 0, 121),
(928, 8, 0, 121),
(929, 1, 0, 122),
(930, 2, 0, 122),
(931, 3, 0, 122),
(932, 4, 0, 122),
(933, 5, 2, 122),
(934, 6, 2, 122),
(935, 7, 0, 122),
(936, 8, 0, 122),
(937, 1, 0, 123),
(938, 2, 0, 123),
(939, 3, 0, 123),
(940, 4, 0, 123),
(941, 5, 0, 123),
(942, 6, 0, 123),
(943, 7, 2, 123),
(944, 8, 2, 123),
(945, 1, 2, 124),
(946, 2, 2, 124),
(947, 3, 0, 124),
(948, 4, 0, 124),
(949, 5, 0, 124),
(950, 6, 0, 124),
(951, 7, 0, 124),
(952, 8, 0, 124),
(953, 1, 0, 125),
(954, 2, 0, 125),
(955, 3, 4, 125),
(956, 4, 4, 125),
(957, 5, 0, 125),
(958, 6, 0, 125),
(959, 7, 0, 125),
(960, 8, 0, 125),
(961, 1, 0, 126),
(962, 2, 0, 126),
(963, 3, 4, 126),
(964, 4, 4, 126),
(965, 5, 0, 126),
(966, 6, 0, 126),
(967, 7, 0, 126),
(968, 8, 0, 126),
(969, 1, 0, 127),
(970, 2, 0, 127),
(971, 3, 0, 127),
(972, 4, 0, 127),
(973, 5, 4, 127),
(974, 6, 4, 127),
(975, 7, 0, 127),
(976, 8, 0, 127),
(977, 1, 0, 128),
(978, 2, 0, 128),
(979, 3, 0, 128),
(980, 4, 0, 128),
(981, 5, 4, 128),
(982, 6, 4, 128),
(983, 7, 0, 128),
(984, 8, 0, 128),
(985, 1, 0, 129),
(986, 2, 0, 129),
(987, 3, 0, 129),
(988, 4, 0, 129),
(989, 5, 2, 129),
(990, 6, 2, 129),
(991, 7, 0, 129),
(992, 8, 0, 129),
(993, 1, 0, 130),
(994, 2, 0, 130),
(995, 3, 0, 130),
(996, 4, 0, 130),
(997, 5, 0, 130),
(998, 6, 0, 130),
(999, 7, 4, 130),
(1000, 8, 4, 130),
(1001, 1, 0, 131),
(1002, 2, 0, 131),
(1003, 3, 0, 131),
(1004, 4, 0, 131),
(1005, 5, 0, 131),
(1006, 6, 0, 131),
(1007, 7, 4, 131),
(1008, 8, 4, 131),
(1009, 1, 0, 132),
(1010, 2, 0, 132),
(1011, 3, 2, 132),
(1012, 4, 0, 132);

-- --------------------------------------------------------

--
-- Estrutura da tabela `acha_sem_plan`
--

CREATE TABLE `acha_sem_plan` (
  `id_sem_plan` int(11) NOT NULL,
  `semestre` varchar(45) NOT NULL,
  `id_plan` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `acha_turma`
--

CREATE TABLE `acha_turma` (
  `id_turma` int(11) NOT NULL,
  `nome` varchar(9) NOT NULL,
  `turno` char(1) NOT NULL,
  `qtd_alunos` int(11) DEFAULT NULL,
  `per_atual` int(11) NOT NULL,
  `id_matriz` int(11) NOT NULL,
  `id_sem_plan` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `acha_vaga`
--

CREATE TABLE `acha_vaga` (
  `id_vaga` int(11) NOT NULL,
  `creditos` int(11) NOT NULL,
  `id_turma` int(11) NOT NULL,
  `id_com_cur` int(11) NOT NULL,
  `id_sem_plan` int(11) NOT NULL,
  `id_pro` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `acha_area`
--
ALTER TABLE `acha_area`
  ADD PRIMARY KEY (`id_area`),
  ADD KEY `fk_area_id_grupo_idx` (`id_grupo`);

--
-- Indexes for table `acha_com_cur`
--
ALTER TABLE `acha_com_cur`
  ADD PRIMARY KEY (`id_com_cur`),
  ADD KEY `fk_com_cur_id_matriz_idx` (`id_matriz`),
  ADD KEY `fk_com_cur_id_nucleo_idx` (`id_nucleo`),
  ADD KEY `fk_com_cur_id_area_idx` (`id_dis`);

--
-- Indexes for table `acha_curso`
--
ALTER TABLE `acha_curso`
  ADD PRIMARY KEY (`id_curso`),
  ADD KEY `fk_curso_id_mod_idx` (`id_mod`);

--
-- Indexes for table `acha_dis`
--
ALTER TABLE `acha_dis`
  ADD PRIMARY KEY (`id_dis`),
  ADD KEY `fk_dis_id_area_idx` (`id_area`);

--
-- Indexes for table `acha_grupo`
--
ALTER TABLE `acha_grupo`
  ADD PRIMARY KEY (`id_grupo`),
  ADD KEY `fk_grupo_id_coordenador_idx` (`id_coordenador`);

--
-- Indexes for table `acha_horario`
--
ALTER TABLE `acha_horario`
  ADD PRIMARY KEY (`id_horario`),
  ADD KEY `id_horario_id_preferencia` (`id_preferencia`);

--
-- Indexes for table `acha_matriz`
--
ALTER TABLE `acha_matriz`
  ADD PRIMARY KEY (`id_matriz`),
  ADD KEY `fk_matriz_id_curso_idx` (`id_curso`);

--
-- Indexes for table `acha_mod`
--
ALTER TABLE `acha_mod`
  ADD PRIMARY KEY (`id_mod`);

--
-- Indexes for table `acha_nucleo`
--
ALTER TABLE `acha_nucleo`
  ADD PRIMARY KEY (`id_nucleo`);

--
-- Indexes for table `acha_ofer`
--
ALTER TABLE `acha_ofer`
  ADD PRIMARY KEY (`id_ofer`),
  ADD KEY `fk_ofer_id_plan_idx` (`id_plan`),
  ADD KEY `fk_ofer_id_matriz_idx` (`id_matriz`);

--
-- Indexes for table `acha_plan`
--
ALTER TABLE `acha_plan`
  ADD PRIMARY KEY (`id_plan`),
  ADD KEY `fk_plan_id_pro_idx` (`id_pro`);

--
-- Indexes for table `acha_preferencia`
--
ALTER TABLE `acha_preferencia`
  ADD PRIMARY KEY (`id_preferencia`),
  ADD KEY `id_preferencia_id_pro` (`id_pro`);

--
-- Indexes for table `acha_pro`
--
ALTER TABLE `acha_pro`
  ADD PRIMARY KEY (`id_pro`);

--
-- Indexes for table `acha_pro_grupo`
--
ALTER TABLE `acha_pro_grupo`
  ADD KEY `fk_pro_grupo_id_pro_idx` (`id_pro`),
  ADD KEY `fk_pro_grupo_id_grupo_idx` (`id_grupo`);

--
-- Indexes for table `acha_reuniao`
--
ALTER TABLE `acha_reuniao`
  ADD PRIMARY KEY (`id_reuniao`);

--
-- Indexes for table `acha_reuniao_grupo`
--
ALTER TABLE `acha_reuniao_grupo`
  ADD PRIMARY KEY (`id_reuniao_grupo`),
  ADD KEY `fk_id_grupo_id_grupo` (`id_grupo`),
  ADD KEY `fk_id_reuniao_id_reuniao` (`id_reuniao`);

--
-- Indexes for table `acha_sem_com_cur`
--
ALTER TABLE `acha_sem_com_cur`
  ADD PRIMARY KEY (`id_sem_com_cur`),
  ADD KEY `fk_sem_com_cur_id_com_cur_idx` (`id_com_cur`);

--
-- Indexes for table `acha_sem_plan`
--
ALTER TABLE `acha_sem_plan`
  ADD PRIMARY KEY (`id_sem_plan`),
  ADD KEY `fk_sem_plan_id_plan_idx` (`id_plan`);

--
-- Indexes for table `acha_turma`
--
ALTER TABLE `acha_turma`
  ADD PRIMARY KEY (`id_turma`),
  ADD KEY `fk_turma_id_matriz_idx` (`id_matriz`),
  ADD KEY `fk_turma_id_sem_plan_idx` (`id_sem_plan`);

--
-- Indexes for table `acha_vaga`
--
ALTER TABLE `acha_vaga`
  ADD PRIMARY KEY (`id_vaga`),
  ADD KEY `id_vaga_id_turma_idx` (`id_turma`),
  ADD KEY `id_vaga_id_com_cur_idx` (`id_com_cur`),
  ADD KEY `id_vaga_id_sem_plan_idx` (`id_sem_plan`),
  ADD KEY `id_vaga_pro_idx` (`id_pro`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `acha_area`
--
ALTER TABLE `acha_area`
  MODIFY `id_area` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `acha_com_cur`
--
ALTER TABLE `acha_com_cur`
  MODIFY `id_com_cur` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=133;

--
-- AUTO_INCREMENT for table `acha_curso`
--
ALTER TABLE `acha_curso`
  MODIFY `id_curso` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `acha_dis`
--
ALTER TABLE `acha_dis`
  MODIFY `id_dis` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=92;

--
-- AUTO_INCREMENT for table `acha_grupo`
--
ALTER TABLE `acha_grupo`
  MODIFY `id_grupo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `acha_horario`
--
ALTER TABLE `acha_horario`
  MODIFY `id_horario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1893;

--
-- AUTO_INCREMENT for table `acha_matriz`
--
ALTER TABLE `acha_matriz`
  MODIFY `id_matriz` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `acha_mod`
--
ALTER TABLE `acha_mod`
  MODIFY `id_mod` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `acha_nucleo`
--
ALTER TABLE `acha_nucleo`
  MODIFY `id_nucleo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `acha_ofer`
--
ALTER TABLE `acha_ofer`
  MODIFY `id_ofer` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=64;

--
-- AUTO_INCREMENT for table `acha_plan`
--
ALTER TABLE `acha_plan`
  MODIFY `id_plan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `acha_preferencia`
--
ALTER TABLE `acha_preferencia`
  MODIFY `id_preferencia` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=193;

--
-- AUTO_INCREMENT for table `acha_pro`
--
ALTER TABLE `acha_pro`
  MODIFY `id_pro` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=74;

--
-- AUTO_INCREMENT for table `acha_reuniao_grupo`
--
ALTER TABLE `acha_reuniao_grupo`
  MODIFY `id_reuniao_grupo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT for table `acha_sem_com_cur`
--
ALTER TABLE `acha_sem_com_cur`
  MODIFY `id_sem_com_cur` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1013;

--
-- AUTO_INCREMENT for table `acha_sem_plan`
--
ALTER TABLE `acha_sem_plan`
  MODIFY `id_sem_plan` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `acha_vaga`
--
ALTER TABLE `acha_vaga`
  MODIFY `id_vaga` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
