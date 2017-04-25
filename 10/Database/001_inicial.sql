CREATE DATABASE eleicao COLLATE 'utf8mb4_unicode_ci';

CREATE TABLE candidatos (
    id INT NOT NULL AUTO_INCREMENT ,
    nome VARCHAR(255) NOT NULL ,
    descricao VARCHAR(255) NOT NULL ,
    PRIMARY KEY (id)
)
ENGINE = InnoDB;
