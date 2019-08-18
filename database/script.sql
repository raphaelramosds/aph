create database aph;

create table usuario(
    id int auto_increment primary key,
    matricula varchar(45), 
    email varchar(45), 
    senha varchar(45), 
    role int,
    unique(matricula),
    unique(email)
);

create table comissao(
    id int auto_increment primary key,
    nome varchar(45),
    id_usuario int
);

alter table comissao
add constraint fk_comissao_usuario foreign key (id_usuario) references usuario(id);

create table grupo(
    id int primary key, 
    nome varchar(45)
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

alter table reuniao_grupo
add constraint fk_grupo_associacao_reuniao foreign key (id_grupo) references grupo(id);

alter table reuniao_grupo
add constraint fk_reuniao_associacao_grupo foreign key (id_reuniao) references reuniao(id);

create table docente(
    id int auto_increment primary key, 
    nome varchar(45),
    id_grupo int,
    id_usuario int 
);

alter table docente
add constraint fk_docente_usuario foreign key (id_usuario) references usuario(id);

alter table docente
add constraint fk_docente_grupo foreign key (id_grupo) references grupo(id);

create table curso(
    id int auto_increment primary key, 
    nome varchar(45),
    id_docente int
);

alter table curso
add constraint fk_curso_docente foreign key (id_docente) references docente(id);

create table disciplina(
    id int auto_increment primary key, 
    nome varchar(45),
    periodo int, 
    ch int,
    tuma varchar(45),
    modalidade varchar(45),
    observacao text, 
    turno varchar(45),
    id_curso int, 
    id_docente int
);

alter table disciplina
add constraint fk_disciplina_curso foreign key (id_curso) references curso(id);

alter table disciplina
add constraint fk_disciplina_docente foreign key (id_docente) references docente(id);

create table preferencia(
    id int auto_increment primary key, 
    ano int, 
    semestre varchar(45),
    situacao boolean, 
    justificativa text, 
    id_docente int
);

alter table preferencia
add constraint preferencia_docente foreign key (id_docente) references docente(id);

create table horario(
    id int auto_increment primary key, 
    hora time, 
    dia int, 
    tipo char,
    id_preferencia int
);

alter table horario 
add constraint horario_preferencia foreign key (id_preferencia) references preferencia(id);

/* Povoando grupos e cursos */


insert into grupo(id,nome) values
(1598,'Educação'),
(1589,'Eletrônica'),
(1590,'Exatas e da terra'),
(1591,'Gestão'),
(1592,'Humanidades'),
(1593,'Informática'),
(1594,'Manutenção');

insert into reuniao(id,codigo) values 
(2000,'4m56'),
(2001,'4v12'),
(2002,'4v34'),
(2003,'4v56');

/*
Eletronica e Informática = 4m56
Todos = 4v12
Todos da propedêuticas (Exatas e da Terra e humanidades) = 4v34
Manutenção = 4v34
Superior (Educação e Gestão) = 4v56

*/

insert into reuniao_grupo(id_grupo, id_reuniao) values
(1589,2000),
(1593,2000),
(1594,2002),
(1592,2002),
(1590,2002),
(1598,2003),
(1591,2003),
(1598,2001),
(1589,2001),
(1590,2001),
(1591,2001),
(1592,2001),
(1593,2001),
(1594,2001);

