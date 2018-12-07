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
	nomeCurriculo		int(4)  not null, 
	minEns				int(4)	not null, 
	minPesq				int(4)	not null, 
	minExt				int(4)	not null, 
	minLivre			int(4)	not null, 
	minTotalCompl		int(4)	not null, 
	PRIMARY KEY (nomeCurriculo)
);

INSERT INTO curriculo (nomeCurriculo,minEns, minPesq, minExt, minLivre, minTotalCompl) 
VALUES 
(2013,120,120,120,120,320),
(2015,120,120,120,120,320);

CREATE TABLE coordenador (
Siape				varchar(15)	not null, 
nome				varchar(30)	not null, 
email				varchar(30)	not null, 
tel					varchar(15), 
senha				varchar(10)	not null, 
registroAceito		bit(1)		not null default 0, 
idCurso				int(1) not null,
FOREIGN KEY (idCurso) REFERENCES curso (idCurso)
);

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


CREATE TABLE aluno (
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
	PRIMARY KEY (matricula),
	FOREIGN KEY (idCurso) REFERENCES curso (idCurso), 
	FOREIGN KEY (idCurriculo) REFERENCES curriculo (nomeCurriculo)
);

INSERT INTO aluno (matricula, nome, email, tel, senha, registroAceito,provavelFormatura,URL_Dir,URL_RelatorioFinal,idCurso,idCurriculo) 
	VALUES    (08201484,'Taisson Silveira de Olivera','taisson.oliveira@gmail.com',91275665,'1111',0,'2019/2','URL','URL',1,2013);



CREATE TABLE atividade (
	nomeAtividade		varchar(30)	not null, 
	classeDefault		varchar(10)	not null, 
	unidade			varchar(10)	not null,
	valorHoraUnidade	int		not null,
	masHoras		int		not null,
	PRIMARY KEY (nomeAtividade)
);

CREATE TABLE constituido_por (
	atividade			varchar(30) 	not null, 
	curriculo			varchar(15)	not null, 
	nomeAtividade		varchar(30)	not null, 
	nomeCurriculo 		int(4)	not null, 
	PRIMARY KEY (atividade,curriculo),
	FOREIGN KEY (nomeAtividade) REFERENCES ATIVIDADE (nomeAtividade),
	FOREIGN KEY (nomeCurriculo) REFERENCES CURRICULO (nomeCurriculo)
);

CREATE TABLE registro_atividade (
	idSubmissao			int	auto_increment 	not null, 
	atividade			varchar(30)	not null,
	estadoAtual			int	not null default 0,
	administrador		varchar(15)	not null,
	valorEmHoras		int		not null,
	nomeAtividade		varchar(30)	not null, 
	matricula			int(10)	not null, 
	Siape				int(15)	not null, 
	PRIMARY KEY (idSubmissao),
	FOREIGN KEY (nomeAtividade) REFERENCES atividade (nomeAtividade),
	FOREIGN KEY (matricula) REFERENCES aluno (matricula),
	FOREIGN KEY (Siape) REFERENCES administrador (Siape)
);

CREATE TABLE pasta(
  id_documento int(11) NOT NULL auto_increment,
  nome_documento varchar(50) character set utf8 collate utf8_unicode_ci NOT NULL,
  descricao_documento varchar(100) character set utf8 collate utf8_unicode_ci NOT NULL,
  tamanho_documento mediumint(9) NOT NULL,
  dados_documento mediumblob NOT NULL,
  PRIMARY KEY  (id_documento)
);

CREATE TABLE pastaAluno(
matricula			int(10)		not null, 
id_documento                 int(11)          NOT NULL,
PRIMARY KEY  (id_documento,matricula),
FOREIGN KEY(matricula) REFERENCES aluno(matricula),
FOREIGN KEY(id_documento) REFERENCES pasta(id_documento)
);

CREATE TABLE categoriaatividade (
  idCategoria int(1) NOT NULL,
  classe varchar(10) NOT NULL,
  PRIMARY KEY (idCategoria)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
-- REVER ISTO!!!!!!!!!!!!!!!!!!!!!!!
CREATE TABLE atividades (
  id int(11) NOT NULL,
  atividade varchar(120) NOT NULL,
  unidade varchar(10) NOT NULL,
  horas int(3) NOT NULL,
  maxHoras int(3) NOT NULL,
  idCategoria int(1) NOT NULL,
  PRIMARY KEY (id)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO atividades (id,atividade,unidade,horas,maxHoras,idCategoria) 
VALUES (1,'Monitorias','Semestre',51,102,1);
INSERT INTO atividades (id,atividade,unidade,horas,maxHoras,idCategoria) 
VALUES (2,'Semana AcadÃªmica do curso','Horas',34,68,1);
INSERT INTO atividades (id,atividade,unidade,horas,maxHoras,idCategoria) 
VALUES (3,'Bolsista / VoluntÃ¡rio em Projeto de ENSINO','Semestre',51,153,1);
INSERT INTO atividades (id,atividade,unidade,horas,maxHoras,idCategoria) 
VALUES (4,'ParticipaÃ§Ã£o em Cursos e Escolas','Horas',51,102,1);
INSERT INTO atividades (id,atividade,unidade,horas,maxHoras,idCategoria) 
VALUES (5,'RepresentaÃ§Ã£o Estudantil','Semestre',51,102,1);
INSERT INTO atividades (id,atividade,unidade,horas,maxHoras,idCategoria) 
VALUES (6,'CertificaÃ§Ãµes Profissionais','Horas',51,102,1);
INSERT INTO atividades (id,atividade,unidade,horas,maxHoras,idCategoria) 
VALUES (7,'Bolsista / VoluntÃ¡rio em Projeto de EXTENSÃƒO','Semestre',51,153,2);
INSERT INTO atividades (id,atividade,unidade,horas,maxHoras,idCategoria) 
VALUES (8,'ParticipaÃ§Ã£o em Atividades de ExtensÃ£o (OrganizaÃ§Ã£o de eventos)','Horas',34,153,2);
INSERT INTO atividades (id,atividade,unidade,horas,maxHoras,idCategoria) 
VALUES (9,'Bolsista / VoluntÃ¡rio em Projeto de PESQUISA','Semestre',51,153,3);
INSERT INTO atividades (id,atividade,unidade,horas,maxHoras,idCategoria) 
VALUES (10,'ParticipaÃ§Ã£o em Eventos CientÃ­ficos Regionais e Locais','Unidade',17,51,3);
INSERT INTO atividades (id,atividade,unidade,horas,maxHoras,idCategoria) 
VALUES (11,'ParticipaÃ§Ã£o em Eventos CientÃ­ficos Nacionais','Unidade',34,68,3);
INSERT INTO atividades (id,atividade,unidade,horas,maxHoras,idCategoria) 
VALUES (12,'ParticipaÃ§Ã£o em Eventos CientÃ­ficos Internacionais','Unidade',34,68,3);
INSERT INTO atividades (id,atividade,unidade,horas,maxHoras,idCategoria) 
VALUES (13,'PublicaÃ§Ã£o em Eventos CientÃ­ficos Regionais e Locais','Unidade',34,68,3);
INSERT INTO atividades (id,atividade,unidade,horas,maxHoras,idCategoria) 
VALUES (14,'PublicaÃ§Ã£o em Eventos CientÃ­ficos Nacionais','Unidade',51,102,3);
INSERT INTO atividades (id,atividade,unidade,horas,maxHoras,idCategoria) 
VALUES (15,'PublicaÃ§Ã£o em Eventos CientÃ­ficos Internacionais','Unidade',68,136,3);
INSERT INTO atividades (id,atividade,unidade,horas,maxHoras,idCategoria) 
VALUES (16,'ObtenÃ§Ã£o de PrÃªmios e DistinÃ§Ãµes','Unidade',68,136,3);
