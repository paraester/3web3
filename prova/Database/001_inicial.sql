CREATE DATABASE biblioteca COLLATE 'utf8mb4_unicode_ci';

USE biblioteca;

CREATE TABLE usuarios (
    id INT NOT NULL AUTO_INCREMENT ,
    email VARCHAR(255) NOT NULL ,
    senha CHAR(60) NOT NULL ,
    PRIMARY KEY (id)
)
ENGINE = InnoDB;

CREATE TABLE livros (
    id INT NOT NULL AUTO_INCREMENT ,
    titulo VARCHAR(255) NOT NULL ,
    usuario_id INT,
    PRIMARY KEY (id),
    FOREIGN KEY (usuario_id) REFERENCES usuarios (id)
)
ENGINE = InnoDB;
