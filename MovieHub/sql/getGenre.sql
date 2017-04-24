SELECT *
FROM mobie
JOIN genre on genre.mobie = genre.movies
WHERE movie_title = :movie_title