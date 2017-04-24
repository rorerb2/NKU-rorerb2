SELECT *
FROM mobie
WHERE release_year between :begin_date AND :end_date
Group By movie_title
