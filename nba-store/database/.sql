CREATE DATABASE nb_store;
USE nb_store;

CREATE TABLE categorias (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(100) NOT NULL,
    descricao TEXT
);

CREATE TABLE produtos (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(100) NOT NULL,
    descricao TEXT,
    preco DECIMAL(10, 2) NOT NULL,
    categoria_id INT,
    FOREIGN KEY (categoria_id) REFERENCES categorias(id) ON DELETE SET NULL
);

ALTER TABLE produtos ADD COLUMN imagem VARCHAR(255) AFTER categoria_id;

CREATE TABLE vendas (
    id INT AUTO_INCREMENT PRIMARY KEY,
    data_venda DATETIME NOT NULL,
    total DECIMAL(10, 2) NOT NULL
);

CREATE TABLE vendas_itens (
    id INT AUTO_INCREMENT PRIMARY KEY,
    venda_id INT,
    produto_id INT,
    quantidade INT NOT NULL,
    preco DECIMAL(10, 2) NOT NULL,
    FOREIGN KEY (venda_id) REFERENCES vendas(id),
    FOREIGN KEY (produto_id) REFERENCES produtos(id)
);

ALTER TABLE vendas_itens
DROP FOREIGN KEY vendas_itens_ibfk_2;

ALTER TABLE vendas_itens
ADD CONSTRAINT vendas_itens_ibfk_2
FOREIGN KEY (produto_id) REFERENCES produtos(id) ON DELETE CASCADE;

# INSERINDO DADOS

Categorias

INSERT INTO categorias (nome, descricao) VALUES
('Blusas', 'Blusas de várias estilos e designs'),
('Bermudas', 'Bermudas para todos os tipos de ocasiões'),
('Camisetas', 'Camisetas casuais, esportivas e premium'),
('Tênis', 'Tênis estilosos para todas as idades');


1. Bermuda.php

INSERT INTO produtos (nome, descricao, preco, categoria_id) VALUES
('Bermuda NBA', 'Bermuda NBA de alta qualidade', 80.00, 2),
('Bermuda Street', 'Bermuda Street estilo urbano', 90.00, 2),
('Bermuda Casual', 'Bermuda Casual para conforto diário', 100.00, 2),
('Bermuda Esportiva', 'Bermuda Esportiva para atividades físicas', 110.00, 2),
('Bermuda de Praia', 'Bermuda ideal para a praia', 120.00, 2);


2. Blusa.php

INSERT INTO produtos (nome, descricao, preco, categoria_id) VALUES
('Blusa NBA', 'Blusa oficial NBA com logo', 80.00, 1),
('Blusa Street', 'Blusa estilo Streetwear', 90.00, 1),
('Blusa Casual', 'Blusa Casual para uso diário', 70.00, 1),
('Blusa Esportiva', 'Blusa ideal para prática de esportes', 85.00, 1),
('Blusa Fashion', 'Blusa fashion para todas as ocasiões', 95.00, 1);


3. Camiseta.php

INSERT INTO produtos (nome, descricao, preco, categoria_id) VALUES
('Camiseta NBA', 'Camiseta oficial NBA', 80.00, 3),
('Camiseta Street', 'Camiseta estilo Street', 90.00, 3),
('Camiseta Casual', 'Camiseta Casual para todos os momentos', 100.00, 3),
('Camiseta Fashion', 'Camiseta Fashion para o dia a dia', 120.00, 3),
('Camiseta Premium', 'Camiseta premium de alta qualidade', 150.00, 3);


4. Tênis.php

INSERT INTO produtos (nome, descricao, preco, categoria_id) VALUES
('Tênis Air Max', 'Tênis Air Max com tecnologia de ponta', 100.00, 4),
('Tênis NBA Pro', 'Tênis estilo NBA, ideal para o dia a dia', 120.00, 4),
('Tênis Jordan', 'Tênis Jordan, famoso no mundo todo', 150.00, 4),
('Tênis Urban', 'Tênis com design urbano e moderno', 170.00, 4),
('Tênis Casual', 'Tênis Casual para qualquer ocasião', 80.00, 4);
