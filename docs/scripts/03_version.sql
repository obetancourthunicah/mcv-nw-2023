CREATE TABLE version(  
    id int NOT NULL PRIMARY KEY AUTO_INCREMENT COMMENT 'Primary Key',
    version char(32) NOT NULL,
    description VARCHAR(255) COMMENT 'Description',
    created_at DATETIME COMMENT 'Create Time'
) COMMENT '';