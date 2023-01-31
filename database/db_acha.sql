CREATE TABLE `acha_area` (
  `id_area` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(50) NOT NULL,
  `id_subarea` int(11) DEFAULT NULL,
  `id_grupo` int(11) NOT NULL,
  PRIMARY KEY (`id_area`),
  KEY `fk_area_id_grupo_idx` (`id_grupo`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1;

CREATE TABLE `acha_com_cur` (
  `id_com_cur` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(50) NOT NULL,
  `car_hor` int(11) NOT NULL,
  `id_matriz` int(11) NOT NULL,
  `id_nucleo` int(11) NOT NULL,
  `id_dis` int(11) NOT NULL,
  PRIMARY KEY (`id_com_cur`),
  KEY `fk_com_cur_id_matriz_idx` (`id_matriz`),
  KEY `fk_com_cur_id_nucleo_idx` (`id_nucleo`),
  KEY `fk_com_cur_id_area_idx` (`id_dis`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1;

CREATE TABLE `acha_curso` (
  `id_curso` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(50) NOT NULL,
  `id_mod` int(11) DEFAULT NULL,
  `cod_curso` int(11) NOT NULL,
  `cor` varchar(7) DEFAULT NULL,
  PRIMARY KEY (`id_curso`),
  KEY `fk_curso_id_mod_idx` (`id_mod`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1;


CREATE TABLE `acha_dis` (
  `id_dis` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(255) NOT NULL,
  `car_hor` varchar(45) NOT NULL,
  `id_area` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_dis`),
  KEY `fk_dis_id_area_idx` (`id_area`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1;


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

CREATE TABLE `acha_matriz` (
  `id_matriz` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(45) NOT NULL,
  `ano` int(11) NOT NULL,
  `id_curso` int(11) NOT NULL,
  PRIMARY KEY (`id_matriz`),
  KEY `fk_matriz_id_curso_idx` (`id_curso`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1;

CREATE TABLE `acha_mod` (
  `id_mod` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(50) NOT NULL,
  PRIMARY KEY (`id_mod`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1;

CREATE TABLE `acha_nucleo` (
  `id_nucleo` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(50) NOT NULL,
  PRIMARY KEY (`id_nucleo`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1;
  

CREATE TABLE `acha_ofer` (
  `id_plan` int(11) NOT NULL,
  `id_matriz` int(11) NOT NULL,
  `qtd_sem` int(11) NOT NULL,
  `sem_ini` varchar(10) NOT NULL,
  `turno` varchar(20) NOT NULL,
  `numero` int(11) DEFAULT NULL,
  `id_ofer` int(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`id_ofer`),
  KEY `fk_ofer_id_plan_idx` (`id_plan`),
  KEY `fk_ofer_id_matriz_idx` (`id_matriz`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1;

CREATE TABLE `acha_plan` (
  `id_plan` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(50) NOT NULL,
  `dat_cri` date NOT NULL,
  `dat_exe` date DEFAULT NULL,
  `id_pro` int(11) NOT NULL,
  `ano_ini` varchar(4) DEFAULT NULL,
  `car_hor_max` int(11) NOT NULL,
  PRIMARY KEY (`id_plan`),
  KEY `fk_plan_id_pro_idx` (`id_pro`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1;



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
  `membro_comis` int(1) NOT NULL, /* Atributo novo */
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

CREATE TABLE `acha_sem_com_cur` (
  `id_sem_com_cur` int(11) NOT NULL AUTO_INCREMENT,
  `periodo` int(11) NOT NULL,
  `creditos` int(11) NOT NULL,
  `id_com_cur` int(11) NOT NULL,
  PRIMARY KEY (`id_sem_com_cur`),
  KEY `fk_sem_com_cur_id_com_cur_idx` (`id_com_cur`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1;

CREATE TABLE `acha_sem_plan` (
  `id_sem_plan` int(11) NOT NULL AUTO_INCREMENT,
  `semestre` varchar(45) NOT NULL,
  `id_plan` int(11) NOT NULL,
  PRIMARY KEY (`id_sem_plan`),
  KEY `fk_sem_plan_id_plan_idx` (`id_plan`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

CREATE TABLE `acha_turma` (
  `id_turma` int(11) NOT NULL,
  `nome` varchar(9) NOT NULL,
  `turno` char(1) NOT NULL,
  `qtd_alunos` int(11) DEFAULT NULL,
  `per_atual` int(11) NOT NULL,
  `id_matriz` int(11) NOT NULL,
  `id_sem_plan` int(11) NOT NULL,
  PRIMARY KEY (`id_turma`),
  KEY `fk_turma_id_matriz_idx` (`id_matriz`),
  KEY `fk_turma_id_sem_plan_idx` (`id_sem_plan`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

CREATE TABLE `acha_vaga` (
  `id_vaga` int(11) NOT NULL AUTO_INCREMENT,
  `creditos` int(11) NOT NULL,
  `id_turma` int(11) NOT NULL,
  `id_com_cur` int(11) NOT NULL,
  `id_sem_plan` int(11) NOT NULL,
  `id_pro` int(11) NOT NULL,
  PRIMARY KEY (`id_vaga`),
  KEY `id_vaga_id_turma_idx` (`id_turma`),
  KEY `id_vaga_id_com_cur_idx` (`id_com_cur`),
  KEY `id_vaga_id_sem_plan_idx` (`id_sem_plan`),
  KEY `id_vaga_pro_idx` (`id_pro`)
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