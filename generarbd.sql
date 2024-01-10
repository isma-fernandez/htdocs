-- Generado por Oracle SQL Developer Data Modeler 22.2.0.165.1149
--   en:        2023-01-15 15:47:25 CET
--   sitio:      Oracle Database 11g
--   tipo:      Oracle Database 11g



DROP TABLE venda_producte CASCADE CONSTRAINTS;

DROP TABLE producte CASCADE CONSTRAINTS;

DROP TABLE venda CASCADE CONSTRAINTS;

DROP TABLE client CASCADE CONSTRAINTS;

CREATE TABLE client (
    id SERIAL PRIMARY KEY,
    nom_cognoms VARCHAR(50) NOT NULL,
    mail      VARCHAR(50) NOT NULL,
    contrasenya VARCHAR(255) NOT NULL,
    adreça VARCHAR(30) NOT NULL,
    poblacio VARCHAR(30) NOT NULL,
    codi_postal VARCHAR(5) NOT NULL,
    img VARCHAR(50)
);

CREATE TABLE venda (
    id SERIAL PRIMARY KEY,
    id_client INTEGER NOT NULL,
    data_compra DATE NOT NULL,
    FOREIGN KEY(id_client) REFERENCES client(id)
);

CREATE TABLE categoria (
    id SERIAL PRIMARY KEY,
    nombre VARCHAR(50) NOT NULL
);

CREATE TABLE producte(
    id SERIAL PRIMARY KEY,
    titulo VARCHAR(50) NOT NULL,
    artista VARCHAR(50),
    año_lanzamiento INTEGER,
    precio DECIMAL(10, 2),
    id_categoria INTEGER NOT NULL,
    img VARCHAR(200),
    FOREIGN KEY (id_categoria) REFERENCES categoria(id)
);

CREATE TABLE venda_producte (
    id_venda INTEGER NOT NULL,
    id_producte INTEGER NOT NULL,
    quantitat INTEGER NOT NULL,
    PRIMARY KEY (id_venda, id_producte),
    FOREIGN KEY (id_venda) REFERENCES venda(id),
    FOREIGN KEY (id_producte) REFERENCES producte(id)
);
