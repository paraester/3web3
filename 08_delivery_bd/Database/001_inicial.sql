CREATE TABLE pedidos (
    id INT NOT NULL AUTO_INCREMENT ,
    cliente VARCHAR(255) NOT NULL ,
    pizza_sabor VARCHAR(255) NOT NULL ,
    pizza_tamanho VARCHAR(255) NOT NULL ,
    PRIMARY KEY (id)
)
ENGINE = InnoDB;
