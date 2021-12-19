/* Tässä tehdään create viewillä lause jota kutsumalla saadaan top 10 elokuvaa.*/
CREATE VIEW topTenMovies
AS
SELECT DISTINCT title, average_rating from aliases INNER JOIN
title_ratings ON aliases.title_id = title_ratings.title_id
ORDER BY average_rating DESC limit 10;

/* Tässä tehdään create viewillä lause jota kutsumalla saadaan 10 ohjaajaa ja niiden nimet*/
CREATE VIEW tendirectors
AS
SELECT name_ FROM names_ 
INNER JOIN name_worked_as
ON names_.name_id = name_worked_as.name_id
WHERE profession LIKE "%director%"
LIMIT 10;

/* Tässä tehdään proceduuri joka näyttää elokuvien nimet maan/alueen mukaan.*/
DELIMITER $$
CREATE PROCEDURE GetAliasesByRegion( IN regionName VARCHAR(4) )
BEGIN
SELECT title FROM aliases WHERE (region = regionName) GROUP
BY title_id ORDER BY title LIMIT 10;
END$$
DELIMITER ;