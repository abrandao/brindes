DROP PROCEDURE IF EXISTS sp_business_insert;

CREATE PROCEDURE sp_business_insert (
    
    cnpj VARCHAR(20),
    address VARCHAR(255),
    tel1 VARCHAR(15),
    tel2 VARCHAR(15),
    tel3 VARCHAR(15),
    email1 VARCHAR(50),
    email2 VARCHAR(50),
    email3 VARCHAR(50)
    
)
    INSERT INTO business (cnpj, address, tel1, tel2, tel3, email1, email2, email3) 
    VALUES (pcnpj, paddress, ptel1, ptel2, ptel3, pemail1, pemail2, pemail3);
    SELECT * FROM business WHERE id = LAST_INSERT_ID();