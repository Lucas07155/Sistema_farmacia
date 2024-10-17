 -- Desenvolvido por Lucas De Carvalho Praxedes --
 -- DATA 13/10/2024 -- 
 -- Professor: Luís Alberto Pires de Oliveira --
 
 create database farmacia;
use farmacia;

create table administrador (
    id_adm int auto_increment primary key,
    usuario varchar(50),
    senha varchar(50) 
);
insert into administrador (usuario, senha) values ('admin', '1234567');

 create table medicamentos (
    id_produto int auto_increment primary key,
    produto varchar(50),
    preco float,
    quantidade int,
    validade date,
    categoria varchar(50)
);
insert into medicamentos (produto, preco, quantidade, validade, categoria) values
('Ibuprofeno', 8.50, 50, '2024-01-01', 'Anti-inflamatório'),
('Amoxicilina', 15.99, 200, '2024-02-02', 'Antibiótico'),
('Dipirona', 4.50, 150, '2024-03-03', 'Analgésico'),
('Omeprazol', 18.50, 40, '2024-04-04', 'Antiácido'),
('Polaramine', 20.50, 10, '2024-05-05', 'Antialérgico'),
('Bomba de Cavalo', 35.75, 15, '2024-06-06', 'Suplemento'),
('Tadalafila', 45.99, 30, '2024-07-07', 'Vasodilatador'),
('Viagra', 50.99, 25, '2024-08-08', 'Vasodilatador');
	
create table vendas (
    id_venda int auto_increment primary key,
    id_produto int,
    quantidade_vendida int,
    foreign key(id_produto) references medicamentos(id_produto)
);

SELECT * FROM farmacia.vendas;
SELECT * FROM farmacia.administrador;
SELECT * FROM farmacia.medicamentos;

 drop table medicamentos;
 drop table administrador;
 drop table vendas;
 drop database farmacia;
 


