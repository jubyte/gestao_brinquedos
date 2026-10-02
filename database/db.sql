CREATE DATABASE brinquedos;
USE brinquedos;

CREATE TABLE brinquedos (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(100) NOT NULL,
    categoria VARCHAR(20) NOT NULL,
    faixa_etaria VARCHAR(20) NOT NULL,
    preco DECIMAL(10,2) NOT NULL,
    quantidade_estoque INT NOT NULL
);