SELECT *
FROM movies
WHERE title = :title
ORDER BY release_date BETWEEN '1911-01-01' AND '1920-12-31'