create database aph;

/* 
1 - Administrador
2 - Comissão
3 - Professor

 */

create table usuario(
    id int auto_increment primary key,
    nome varchar(100),
    matricula varchar(45), 
    email varchar(45), 
    senha varchar(45), 
    dir_aca boolean,
    role int,
    car_hor int,
    id_grupo int,
    unique(matricula),
    unique(email)
);

create table curso(
    id int auto_increment primary key, 
    nome varchar(45),
    id_coordenador int 
);

create table grupo(
    id int primary key, 
    nome varchar(45),
    id_coordenador int
);

create table reuniao_grupo(
    id int auto_increment primary key, 
    id_grupo int, 
    id_reuniao int
);

create table reuniao(
    id int primary key, 
    codigo varchar(50)
);

create table preferencia(
    id int auto_increment primary key, 
    codigo varchar(50),
    situacao boolean, 
    justificativa text, 
    id_usuario int
);

create table horario(
    id int auto_increment primary key, 
    codigo varchar(50),
    tipo varchar(50),
    id_preferencia int
);

alter table usuario
add constraint fk_usuario_grupo foreign key (id_grupo) references grupo(id);

alter table curso
add constraint fk_curso_usuario foreign key (id_coordenador) references usuario(id);


alter table preferencia
add constraint preferencia_usuario foreign key (id_usuario) references usuario(id);

alter table horario 
add constraint horario_preferencia foreign key (id_preferencia) references preferencia(id);

alter table reuniao_grupo
add constraint fk_grupo_associacao_reuniao foreign key (id_grupo) references grupo(id);

alter table reuniao_grupo
add constraint fk_reuniao_associacao_grupo foreign key (id_reuniao) references reuniao(id);

/* Povoando grupos e cursos */

insert into curso(nome) values
('Curso Técnico em Comércio'),
('Curso Técnico em Eletrônica'),
('Curso Técnico em Informática para internet'),
('Curso Técnico em Manutenção e Suporte em Informática'),
('Curso Superior de Licenciatura em Informática'),
('Curso Superaior de Tecnologia em Marketing'),
('Curso FIC Artesã em Bordado');

insert into grupo(id,nome) values
(1598,'Educação'),
(1589,'Eletrônica'),
(1590,'Exatas e da terra'),
(1591,'Gestão'),
(1592,'Humanidades'),
(1593,'Informática'),
(1594,'Manutenção');

insert into reuniao(id,codigo) values 
(2001,'4m5'),
(2002,'4m6'),
(2003,'4v1'),
(2004,'4v2'),
(2005,'4v3'),
(2006,'4v4'),
(2007,'4v5'),
(2008,'4v6');

/*
Eletronica e Informática = 4m56
Todos = 4v12
Todos da propedêuticas (Exatas e da Terra e humanidades) = 4v34
Manutenção = 4v34
Superior (Educação e Gestão) = 4v56

*/

insert into reuniao_grupo(id_grupo, id_reuniao) values
(1589,2001),
(1589,2002),
(1589,2003),
(1589,2004),/**/
(1593,2001),
(1593,2002),
(1593,2003),
(1593,2004),/**/
(1591,2007),
(1591,2008),
(1591,2003),
(1591,2004),/**/
(1598,2007),
(1598,2008),
(1598,2003),
(1598,2004),/**/
(1594,2005),
(1594,2006),
(1594,2003),
(1594,2004),/**/
(1592,2005),
(1592,2006),
(1592,2003),
(1592,2004),/**/
(1590,2005),
(1590,2006),
(1590,2003),
(1590,2004);
