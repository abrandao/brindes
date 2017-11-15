DROP PROCEDURE IF EXISTS sp_products_insert; CREATE PROCEDURE sp_products_insert (
    IN pcode INT(5),
    IN ptitle VARCHAR(100)
)
    INSERT INTO products (code, title) VALUES (pcode, ptitle);
    SELECT * FROM products WHERE id = LAST_INSERT_ID();
