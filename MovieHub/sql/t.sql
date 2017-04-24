CREATE TABLE user_favorites (
  userid INT NOT NULL,
  movie_title INT NOT NULL,
  PRIMARY KEY user_favoritesID INT UNSIGNED AUTO_INCREMENT,
  FOREIGN KEY userid REFERENCES users_final (userid),
  FOREIGN KEY movie_title REFERENCES movies (movie_title)
)