SELECT *
FROM aovie
JOIN aovie ON aovie.actor_name = actor.actor_name
WHERE actor_name = :actor_name