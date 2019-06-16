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
    id int auto_increment primary key, 
    nome varchar(45),
    hora_reuniao time, 
    dia_reuniao int /*Domingo = 1, Segunda = 2, Terça = 3 (...)*/ 
);

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

