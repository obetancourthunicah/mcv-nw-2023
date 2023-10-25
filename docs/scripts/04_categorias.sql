CREATE TABLE categorias(  
    id int NOT NULL PRIMARY KEY AUTO_INCREMENT COMMENT 'Primary Key',
    name VARCHAR(255) NOT NULL COMMENT 'Name',
    status CHAR(3) NOT NULL DEFAULT 'ACT' COMMENT 'Status',
    create_time DATETIME COMMENT 'Create Time'
) COMMENT 'Categorias de los Productos';