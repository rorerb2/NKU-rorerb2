SELECT *
FROM users_final
WHERE
	username = :username AND
	password = :password