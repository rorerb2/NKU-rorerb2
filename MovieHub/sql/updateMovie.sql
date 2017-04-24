UPDATE movie
SET movie_title = :movie_title, movie_rating = :movie_rating, runtime = :runtime, release_year = :release_year
WHERE movie_title = :movie_title