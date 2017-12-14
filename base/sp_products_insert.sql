DROP PROCEDURE IF EXISTS sp_products_insert;

CREATE PROCEDURE sp_products_insert (
    pcode INT(5),
    ptitle VARCHAR(100),
    ptag_main VARCHAR(50),
    ptag_category VARCHAR(50),
    pupfile VARCHAR(240),
    pquantity_A INT(5),
    pquantity_B INT(5),
    pquantity_C INT(5),
    pdescription VARCHAR(255),
    psize VARCHAR(80),
    pprinting VARCHAR(80)
)
    INSERT INTO products (code, title, tag_main, tag_category, upfile,
    quantity_A, quantity_B, quantity_C, description, size, printing) 
    VALUES (pcode, ptitle, ptag_main, ptag_category, pupfile,
    pquantity_A, pquantity_B, pquantity_C, pdescription, psize, pprinting);
    SELECT * FROM products WHERE id = LAST_INSERT_ID();
