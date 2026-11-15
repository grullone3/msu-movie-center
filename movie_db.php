<?php 
function get_movies() {
    global $db;
    $query = 'SELECT * FROM Movie Order BY MovieID';
    $statement = $db->prepare($query);
    $statement->execute();
    $movies = $statement->fetchAll();
    $statement->closeCursor();
    return $movies;
}

function get_movie($movie_id) {
    global $db;
    $query = 'SELECT * FROM Movie WHERE MovieID = :movie_id';
    $statement = $db->prepare($query);
    $statement->bindValue(':movie_id', $movie_id);
    $statement->execute();
    $movie = $statement->fetch();
    $statement->closeCursor();
    return $movie;
}

function add_movie($title, $release_date, $genre) {
    global $db;
    $query = 'INSERT INTO Movie (MovieTitle, ReleaseDate, Genre) VALUES (:title, :release_date, :genre)';
    $statement = $db->prepare($query);
    $statement->bindValue(':title', $title);
    $statement->bindValue(':release_date', $release_date);
    $statement->bindValue(':genre', $genre);
    $statement->execute();
    $statement->closeCursor();
}

function update_movie($movie_id, $title, $release_date, $genre) {
    global $db;
    $query = 'UPDATE Movie SET MovieTitle = :title, ReleaseDate = :release_date, Genre = :genre WHERE MovieID = :movie_id';
    $statement = $db->prepare($query);
    $statement->bindValue(':movie_id', $movie_id);
    $statement->bindValue(':title', $title);
    $statement->bindValue(':release_date', $release_date);
    $statement->bindValue(':genre', $genre);
    $statement->execute();
    $statement->closeCursor();
}

function delete_movie($movie_id) {
    global $db;
    $query = 'DELETE FROM Movie WHERE MovieID = :movie_id';
    $statement = $db->prepare($query);
    $statement->bindValue(':movie_id', $movie_id);
    $statement->execute();
    $statement->closeCursor();
}
?>