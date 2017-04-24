SELECT *
FROM mobie
JOIN mobie ON mobie.movie_title = movie.movie_title AND movie.movie_title = aovie.movie_title
WHERE movie_title = :movie_title