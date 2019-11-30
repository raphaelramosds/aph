
CREATE TABLE `acha_grupo` (
  `id_grupo` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(50) NOT NULL,
  `id_coordenador` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_grupo`),
  KEY `fk_grupo_id_coordenador_idx` (`id_coordenador`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1;



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


/* 
  1 - Administrador
  2 - Comissão
  3 - Professor
*/


CREATE TABLE `acha_pro` (
  `id_pro` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(100) NOT NULL,
  `matricula` varchar(14) DEFAULT NULL,
  `car_hor` int(11) NOT NULL,
  `dir_aca` binary(1) DEFAULT NULL,
  `senha` varchar(100) NOT NULL,
  `membro_comis` int(1) NOT NULL,
  PRIMARY KEY (`id_pro`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1;


--
-- Estrutura da tabela `pro_grupo`
--

CREATE TABLE `acha_pro_grupo` (
  `id_pro` int(11) NOT NULL,
  `id_grupo` int(11) NOT NULL,
  KEY `fk_pro_grupo_id_pro_idx` (`id_pro`),
  KEY `fk_pro_grupo_id_grupo_idx` (`id_grupo`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;




/* TABELAS DO APH */

create table `acha_preferencia`(
    `id_preferencia` int(11) not null auto_increment, 
    `codigo` varchar(50),
    `situacao` tinyint(1), 
    `justificativa`text, 
    `id_pro`int(11), 
    primary key (`id_preferencia`),
    key `id_preferencia_id_pro` (`id_pro`)
);

create table `acha_horario`(
    `id_horario` int not null auto_increment, 
    `codigo` varchar(50),
    `tipo` varchar(10),
    `id_preferencia` int(11),
    primary key (`id_horario`),
    key `id_horario_id_preferencia` (`id_preferencia`)
);

create table `acha_reuniao_grupo`(
    `id_reuniao_grupo` int not null auto_increment,
    `id_reuniao` int not null,
    `id_grupo` int not null,
    primary key (`id_reuniao_grupo`),
    key `fk_id_grupo_id_grupo` (`id_grupo`),
    key `fk_id_reuniao_id_reuniao` (`id_reuniao`)
);

create table `acha_reuniao`(
    `id_reuniao` int not null, 
    `codigo` varchar(50),
    primary key (`id_reuniao`)
);


insert into `acha_reuniao`(`id_reuniao`,`codigo`) values 
(1,'4m5'),
(2,'4m6'),
(3,'4v1'),
(4,'4v2'),
(5,'4v3'),
(6,'4v4'),
(7,'4v5'),
(8,'4v6');

insert into `acha_reuniao_grupo`(`id_reuniao`,`id_grupo`) values
/*Informática e Eletrônica*/
(1,1),
(2,1),

(1,7),
(2,7),

/*Todos*/

(3,1),
(4,1),

(3,2),
(4,2),

(3,3),
(4,3),

(3,4),
(4,4),

(3,5),
(4,5),

(3,6),
(4,6),

(3,7),
(4,7),

(3,8),
(4,8),

(3,11),
(4,11),

(3,12),
(4,12),

(3,13),
(4,13),

/* Todos da propedêutica */

(5,2),
(6,2),

(5,3),
(6,3),

(5,4),
(6,4),

(5,5),
(6,5),

(5,6),
(6,6),

(5,11),
(6,11),

(5,13),
(6,13),

/* Manutenção */

(5,12),
(6,12);



/*
Eletronica e Informática = 4m56
Todos = 4v12
Todos da propedêuticas = 4v34
Manutenção = 4v34
Superior = 4v56

*/


CREATE TABLE `acha_tolerancia` (
  `data_limite` date 
);

INSERT INTO `acha_tolerancia` (`data_limite`) VALUES
('0000-00-00');