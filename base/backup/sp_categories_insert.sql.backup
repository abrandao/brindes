DROP PROCEDURE IF EXISTS sp_categories_insert;

CREATE PROCEDURE sp_categories_insert (
    pcategory VARCHAR(50)   
)
    INSERT INTO categories (category) 
    VALUES (pcategory);
    SELECT * FROM categories WHERE id = LAST_INSERT_ID();