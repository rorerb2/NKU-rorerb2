CREATE TABLE users_final (
    userid INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(50) UNIQUE,
    firstname CHAR(50),
    lastname CHAR(50),
    email VARCHAR(100) UNIQUE,
    password VARCHAR(50),
    birthdate DATE
);

CREATE TABLE movies (
    movie_title VARCHAR(50) PRIMARY KEY,
    movie_rating CHAR(50),
    runtime VARCHAR(50),
    release_year DATE
);

CREATE TABLE genres (
    genre CHAR(50) PRIMARY KEY
);

CREATE TABLE mobie (
    mobieID INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    genre CHAR(50),
    movie_title VARCHAR(50),
        movie_rating CHAR(50),
    runtime VARCHAR(50),
    release_year DATE,
    FOREIGN KEY (genre)
        REFERENCES genres (genre),
    FOREIGN KEY (movie_title)
        REFERENCES movies (movie_title)
);

CREATE TABLE director (
    movie_title VARCHAR(50) PRIMARY KEY,
    director_name CHAR(50)
);

CREATE TABLE actor (
    actor_name CHAR(50) PRIMARY KEY,
    character_name CHAR(50)
);

CREATE TABLE aovie (
    aovieID INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    movie_title VARCHAR(50),
    actor_name CHAR(50),
    character_name CHAR(50),
    FOREIGN KEY (actor_name)
        REFERENCES actor (actor_name),
    FOREIGN KEY (movie_title)
        REFERENCES movies (movie_title)
);

CREATE TABLE writer (
    writer_name CHAR(50) PRIMARY KEY
);

CREATE TABLE wovie (
    wovieID INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    movie_title VARCHAR(50),
    writer_name CHAR(50),
    FOREIGN KEY (movie_title)
        REFERENCES movies (movie_title),
    FOREIGN KEY (writer_name)
        REFERENCES writer (writer_name)
);

CREATE TABLE movie_reviews (
    review VARCHAR(255) PRIMARY KEY
);

CREATE TABLE rovie (
    rovieID INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    movie_title VARCHAR(50),
    review VARCHAR(255),
    FOREIGN KEY (movie_title)
        REFERENCES movies (movie_title),
    FOREIGN KEY (review)
        REFERENCES movie_reviews (review)
);

CREATE TABLE star_rating (
    rating INT PRIMARY KEY
);

CREATE TABLE sobie (
    sobieID INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    movie_title VARCHAR(50),
    rating INT,
    FOREIGN KEY (movie_title)
        REFERENCES movies (movie_title),
    FOREIGN KEY (rating)
        REFERENCES star_rating (rating)
);

/* Populate the tables with INSERT */
INSERT INTO users_final VALUES
  (NULL, "Jsmith1", "Julie", "Smith", "blah@blah.com",'12345', '1972-09-01'),
  (NULL, "Awong1", "Alan", "Wong", "blah2@blah.com",'12345', '1956-03-20'),
  (NULL, "Marthur1", "Michelle", "Arthur", "blah3@blah.com",'12345', '1987-02-28');

INSERT INTO movies VALUES
  ("The Lord of the Rings: The Fellowship of the Ring", "PG-13", "3H 48M", '2001-12-19' ),
  ("The Shawshank Redemption", "R", "2H 22M", '1994-09-23' ),
  ("Se7en", "R", "2H 07M", '1995-09-22'),
  ("The Silence of the Lambs", "R", "1H 58M", '1991-02-14');

INSERT INTO genres VALUES
	("Fantasy"),
    ("Drama"),
    ("Crime"),
    ("Thriller"),
    ("Adventure"),
    ("Action"),
    ("Mystery");
    
INSERT INTO mobie VALUES
  (null,"Fantasy", "The Lord of the Rings: The Fellowship of the Ring", "PG-13", "3H 48M", '2001-12-19' ),
  (null,"Adventure", "The Lord of the Rings: The Fellowship of the Ring", "PG-13", "3H 48M", '2001-12-19' ),
  (null,"Drama", "The Lord of the Rings: The Fellowship of the Ring", "PG-13", "3H 48M", '2001-12-19' ),
  (null, "Drama", "The Shawshank Redemption", "R", "2H 22M", '1994-09-23'),
  (null,"Crime","The Shawshank Redemption", "R", "2H 22M", '1994-09-23'),
  (null,"Crime", "Se7en", "R", "2H 07M", '1995-09-22'),
  (null, "Mystery", "Se7en", "R", "2H 07M", '1995-09-22'),
  (null,"Drama","Se7en", "R", "2H 07M", '1995-09-22'),
  (null, "Crime", "The Silence of the Lambs", "R", "1H 58M", '1991-02-14'),
  (null, "Thriller", "The Silence of the Lambs", "R", "1H 58M", '1991-02-14'),
  (null, "Drama", "The Silence of the Lambs", "R", "1H 58M", '1991-02-14');

INSERT INTO director VALUES
  ("The Lord of the Rings: The Fellowship of the Ring", "Peter Jackson"),
  ("The Shawshank Redemption", "Frank Darabont"),
  ("Se7en", "David Fincher"),
  ("The Silence of the Lambs", "Jonathan Demme");
  
INSERT INTO actor VALUES
	("Alan Howard", "Voice of the Ring");
  
INSERT into aovie VALUES
	(null,"The Lord of the Rings: The Fellowship of the Ring", "Alan Howard", "Voice of the Ring");
    
INSERT INTO writer VALUES
	("J.R.R. Tolkien"),
	("Fran Walsh"),
	("Philippa Boyens"),
	("Peter Jackson"),
	("Stephen King"),
	("Frank Darabont"),
	("Andrew Kevin Walker"),
	("Thomas Harris"),
	("Ted Tally");

INSERT INTO wovie VALUES
(null,"The Lord of the Rings: The Fellowship of the Ring", "J.R.R. Tolkien"),
(null,"The Lord of the Rings: The Fellowship of the Ring", "Fran Walsh"),
(null,"The Lord of the Rings: The Fellowship of the Ring", "Philippa Boyens"),
(null,"The Lord of the Rings: The Fellowship of the Ring", "Peter Jackson"),
(null,"The Shawshank Redemption", "Stephen King"),
(null,"The Shawshank Redemption", "Frank Darabont"),
(null,"Se7en", "Andrew Kevin Walker"),
(null,"The Silence of the Lambs", "Thomas Harris"),
(null,"The Silence of the Lambs", "Ted Tally");