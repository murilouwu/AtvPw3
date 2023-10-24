CREATE DATABASE atv_dois;
USE atv_dois;

CREATE TABLE user(
    cd INT PRIMARY KEY AUTO_INCREMENT,
    nome VARCHAR(200),
    pass CHAR(200),
    nivel INT,
    img LONGTEXT
);