DROP PROCEDURE IF EXISTS sp_products_insert;

CREATE PROCEDURE sp_products_insert (
    ptitle VARCHAR(100),
    pcode INT(5),
    pflag TINYINT(1),    
    ptag VARCHAR(50),
    pcategory VARCHAR(50),
    pdescription VARCHAR(255),
    pupfile VARCHAR(240),
    pqtd_min INT(5),        
    psize VARCHAR(80),
    pprinting VARCHAR(80),
    pprint_type VARCHAR(80),
    pcomments VARCHAR(255)
)
    INSERT INTO products (title, code, flag, tag, category, description, upfile, qtd_min, size, printing, print_type, comments) 
    VALUES (ptitle, pcode, pflag, ptag, pcategory, pdescription, pupfile, pqtd_min, psize, pprinting, pprint_type, pcomments);
    SELECT * FROM products WHERE id = LAST_INSERT_ID();