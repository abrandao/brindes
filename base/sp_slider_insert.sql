DROP PROCEDURE IF EXISTS sp_slider_insert;

CREATE PROCEDURE sp_slider_insert (
    ptitle VARCHAR(100),  
    palt VARCHAR(255),  
    plink VARCHAR(100)   
)
    INSERT INTO slider (title, alt, link) 
    VALUES (ptitle, palt, plink);
    SELECT * FROM slider WHERE id = LAST_INSERT_ID();