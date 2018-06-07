DROP PROCEDURE IF EXISTS sp_contacts_insert;

CREATE PROCEDURE sp_contacts_insert (
    
    pname varchar(100),
    pbusiness varchar(100),
    pemail varchar(50),
    ptel varchar(15),
    pcity varchar(80),
    pstate varchar(22),
    pjotting varchar(255)

)

    INSERT INTO products (name, business, email, tel, city, state, jotting) 
    VALUES (pname, pbusiness, pemail, ptel, pcity, pstate, pjotting);
    SELECT * FROM products WHERE id = LAST_INSERT_ID();    