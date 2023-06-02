DROP TABLE  IF EXISTS ACESSO CASCADE;
DROP TABLE IF EXISTS USUARIO CASCADE;
DROP TABLE  IF EXISTS PRODUTO CASCADE;
DROP TABLE  IF EXISTS PRODUTO_CONS CASCADE;


CREATE TABLE ACESSO(
  	id_acesso INT PRIMARY KEY NOT NULL,
  	tipo_acesso VARCHAR(20) NOT NULL
  );
  
CREATE TABLE USUARIO (
  id_usuario INT PRIMARY KEY NOT NULL,
  nome VARCHAR(300) NOT NULL,
  senha VARCHAR(100) NOT NULL,
  email VARCHAR(100) NOT NULL,
  matricula VARCHAR(100) NOT NULL,
  id_acesso INT NOT NULL,
     CONSTRAINT fk_ACESSO FOREIGN KEY(id_acesso)  REFERENCES ACESSO(id_acesso) ON DELETE CASCADE
);

CREATE TABLE PRODUTO (
  id_produto INT PRIMARY KEY NOT NULL,
  descricao VARCHAR(500) NOT NULL,
  quantidade INT NOT NULL,
  preco INT NOT NULL, 
  id_usuario INT NOT NULL,
  CONSTRAINT fk_USUARIO FOREIGN KEY(id_usuario) REFERENCES USUARIO(id_usuario) ON DELETE CASCADE
);

CREATE TABLE PRODUTO_CONS (
  id_produto_cons INT PRIMARY KEY NOT NULL,
  descricao VARCHAR(500) NOT NULL,
  quantidade INT NOT NULL,
  id_produto INT  NOT NULL,
  CONSTRAINT fk_PRODUTO FOREIGN KEY(id_produto) REFERENCES PRODUTO(id_produto) ON DELETE CASCADE  
);

/*EFETUANDO O CADASTRO*/

INSERT INTO ACESSO(id_acesso, tipo_acesso) VALUES (1,'Administrador');
INSERT INTO ACESSO(id_acesso, tipo_acesso) VALUES (2,'Aluno');

INSERT INTO USUARIO(id_usuario, nome, senha, email, matricula, id_acesso)
VALUES (1, 'Danilo', 'danilo123', 'dwdwdwedew',carlitos@ggoe.com,  1);

INSERT INTO PRODUTO(id_produto, descricao, quantidade, preco, id_usuario)
VALUES (1, 'Tomate', 3, 450, 1);