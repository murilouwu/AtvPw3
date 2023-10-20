CREATE DATABASE atv_dois;
USE atv_dois;

CREATE TABLE user(
    cd INT PRIMARY KEY AUTO_INCREMENT,
    nome VARCHAR(200),
    pass CHAR(200),
    nivel INT
);

INSERT INTO user (nome, pass, nivel) VALUES("name1","pass1", 3);
INSERT INTO user (nome, pass, nivel) VALUES("name2","pass2", 3);
INSERT INTO user (nome, pass, nivel) VALUES("name3","pass3", 3);
INSERT INTO user (nome, pass, nivel) VALUES("name4","pass4", 3);
INSERT INTO user (nome, pass, nivel) VALUES("EoChefePai","@peruibe1", 1);