CREATE DATABASE trabalhods;

USE trabalhods;

CREATE TABLE curso 
(
	idCurso				int(1)	not null, 
	nomeCurso			varchar(25)	not null,
PRIMARY KEY (idCurso)
);

INSERT INTO curso (idCurso, nomeCurso) VALUES (1,'Ciência da Computação');
INSERT INTO curso (idCurso, nomeCurso) VALUES (2,'Engenharia da Computação');

CREATE TABLE curriculo
(
	nomeCurriculo 		int(4)	not null, 
	minEns				int(4)	not null, 
	minPesq				int(4)	not null, 
	minExt				int(4)	not null, 
	minLivre			int(4)	not null, 
	minTotalCompl		int(4)	not null, 
	PRIMARY KEY (nomeCurriculo)
);


INSERT INTO curriculo (nomeCurriculo,minEns, minPesq, minExt, minLivre, minTotalCompl) VALUES (2013,120,120,120,120,320);
INSERT INTO curriculo (nomeCurriculo,minEns, minPesq, minExt, minLivre, minTotalCompl) VALUES (2015,120,120,120,120,320);

CREATE TABLE aluno 
(
	matricula			int(10)		not null, 
	nome				varchar(36)	not null, 
	email				varchar(30)	not null, 
	tel					int(15), 
	senha				varchar(10)	not null, 
	registroAceito		bit(1)		not null default 0, 
	provavelFormatura	varchar(7),
	URL_Dir				varchar(50), 
	URL_RelatorioFinal	varchar(50), 
	idCurso				int(1) 		not null,
	idCurriculo			int(4) 		not null,
    nivel				bit(1) not null default 1,
	PRIMARY KEY (matricula)
);

INSERT INTO aluno (matricula, nome, email, tel, senha, registroAceito,provavelFormatura,URL_Dir,URL_RelatorioFinal,idCurso,idCurriculo) 
	VALUES    (08201484,'Taisson Silveira de Olivera','taisson.oliveira@gmail.com',91275665,'1111',0,'2019/2','URL','URL',1,2013);




CREATE TABLE administrador(
	siape				int(15)	not null, 
	nome				varchar(30)	not null, 
	email				varchar(30)	not null, 
	tel					int(15), 
	senha				varchar(10)	not null, 
	nivel				int not null default 2,
	PRIMARY KEY (siape)
);


INSERT INTO administrador (siape, nome, email, tel, senha) 
VALUES (1111111111,'Administrador Tester','tester@gmail.com',190,'0000');

