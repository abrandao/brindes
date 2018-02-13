DROP PROCEDURE IF EXISTS sp_articles_insert;

CREATE PROCEDURE sp_articles_insert (
    ptitle VARCHAR(100),
    particle VARCHAR(10000)   
)
    INSERT INTO knowus (title, article) 
    VALUES (ptitle, particle);
    SELECT * FROM knowus WHERE id = LAST_INSERT_ID();