CREATE DATABASE eleicao COLLATE 'utf8mb4_unicode_ci';

CREATE TABLE candidatos (
    id INT NOT NULL AUTO_INCREMENT ,
    nome VARCHAR(255) NOT NULL ,
    descricao VARCHAR(255) NOT NULL ,
    PRIMARY KEY (id)
)
ENGINE = InnoDB;

ALTER TABLE `candidatos` ADD `idade` INT(20) NOT NULL AFTER `descricao`, ADD `partido` INT NOT NULL AFTER `idade`; 
