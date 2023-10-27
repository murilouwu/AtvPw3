CREATE DATABASE atv_tres;
USE atv_tres;

CREATE TABLE user(
    cd INT PRIMARY KEY AUTO_INCREMENT,
    nome VARCHAR(200),
    pass CHAR(200),
    nivel INT,
    img LONGTEXT
);

CREATE TABLE cliente(
    cd INT PRIMARY KEY AUTO_INCREMENT,
    nome VARCHAR(200),
    cor VARCHAR(200)
);

CREATE TABLE produto(
    cd INT PRIMARY KEY AUTO_INCREMENT,
    nome VARCHAR(200),
    img LONGTEXT
);

INSERT INTO user (nome, pass, nivel, img) VALUES ("Maria", "$2y$10$XKlISFmkBDNI/TIT5X9ohOCZdAlY56Mp0jGFpzQC/cHfdKbkowq92", 3, "assets/imgsBank/MariaPerfil.png");
INSERT INTO user (nome, pass, nivel, img) VALUES ("Lucas", "$2y$10$/YjbiSTPz2DNV.W0kNWE8eSXFH17ZYzvtS/ujHy8nvkt/4O/oKMyC", 3, "assets/imgsBank/LucasPerfil.png");
INSERT INTO user (nome, pass, nivel, img) VALUES ("Miguel", "$2y$10$2UGMc3UWfgsRjDi1pVZN/.alz0jQxaMU2Y59L1KcErjG3mAge1Vrq", 3, "assets/imgsBank/MiguelPerfil.png");
INSERT INTO user (nome, pass, nivel, img) VALUES ("Murilo", "$2y$10$wO4glw6lZ3dxT4AfPPIQN.FL5F1oHZ7tRvKUyxqtqc6.mmJr97OmS", 1, "assets/imgsBank/MuriloPerfil.png");