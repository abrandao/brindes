DROP PROCEDURE IF EXISTS sp_products_insert;

CREATE PROCEDURE sp_products_insert (
    ptitle VARCHAR(100),
    pcode INT(5),    
    ptag VARCHAR(50),
    category VARCHAR(50),
    pdescription VARCHAR(255),
    pupfile VARCHAR(240),
    pqtd_min INT(5),
    pqtd1 INT(5),
    pqtd2 INT(5),
    pqtd3 INT(5),    
    psize VARCHAR(80),
    pprinting VARCHAR(80),
    pprint_type VARCHAR(80),
    pcomments VARCHAR(255)
)
    INSERT INTO products (id, title, code, tag, category, description, upfile, qtd_min, qtd1, qtd2,
 qtd3, size, printing, print_type, comments) 
    VALUES (pid, ptitle, pcode, ptag, pcategory, pdescription, pupfile, pqtd_min, pqtd1, pqtd2,
 pqtd3, psize, pprinting, pprint_type, pcomments);
    SELECT * FROM products WHERE id = LAST_INSERT_ID();
