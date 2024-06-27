CREATE DATABASE Nature_Web;
Use Nature_Web;

CREATE TABLE usuario(
    ID_USUARIO INT PRIMARY KEY AUTO_INCREMENT,
    USUARIO VARCHAR(100),
    SENHA VARCHAR(100),
    NOME VARCHAR(100),
    IDADE NUMERIC(3),
    TELEFONE VARCHAR(11),
    EMAIL VARCHAR(50),
    SOBRE_MIM VARCHAR(400),
    CIDADE VARCHAR(50),
    PAIS VARCHAR(50),
    SEXO VARCHAR(1)
);

INSERT INTO usuario (SENHA,NOME,IDADE,TELEFONE,EMAIL,SOBRE_MIM,CIDADE,PAIS)
            VALUES  ('senha123','Rafael',20,'14996100262','rafa@gmail.com','teste','bauru','brasil'),
                    ('senha','Giovana',10,'6515615','giovana@gmail.com','teste','bauru','brasil');