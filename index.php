<?php

require('database.php');
require('movie_db.php');

$action = filter_input(INPUT_POST, 'action');
if ($action === NULL) {
    $action = filter_input(INPUT_GET, 'action');
    if ($action === NULL) {
        $action = 'list_movies';
    }
}

if ($action === 'list_movies') {
    $movies = get_movies();
    include('movie_list.php');

} else if ($action === 'show_add_form') {
    include('movie_add.php');

} else if ($action === 'add_movie') {
    $title = filter_input(INPUT_POST, 'title');
    $release_date = filter_input(INPUT_POST, 'release_date');
    $genre = filter_input(INPUT_POST, 'genre');

    if ($title === NULL || $release_date === NULL || $genre === NULL ||
        $title === '' || $release_date === '' || $genre === '') {
        $error = 'All fields are required.';
        include('movie_add.php');
    } else if (strlen($title) > 30 || strlen($genre) > 30) {
        $error = 'Title and genre must be 30 characters or less.';
        include('movie_add.php');
    } else {
        add_movie($title, $release_date, $genre);
        header('Location: index.php');
    }

} else if ($action === 'delete_movie') {
    $movie_id = filter_input(INPUT_POST, 'movie_id', FILTER_VALIDATE_INT);
    if ($movie_id !== NULL && $movie_id !== false) {
        delete_movie($movie_id);
    }
    header('Location: index.php');

} else if ($action === 'show_edit_form') {
    $movie_id = filter_input(INPUT_POST, 'movie_id', FILTER_VALIDATE_INT);
    $movie = get_movie($movie_id);
    if ($movie_id === NULL || $movie_id === false || $movie === false) {
        header('Location: index.php');
    } else {
        include('movie_edit.php');
    }

} else if ($action === 'update_movie') {
    $movie_id = filter_input(INPUT_POST, 'movie_id', FILTER_VALIDATE_INT);
    $title = filter_input(INPUT_POST, 'title');
    $release_date = filter_input(INPUT_POST, 'release_date');
    $genre = filter_input(INPUT_POST, 'genre');

    if ($movie_id === NULL || $movie_id === false) {
        header('Location: index.php');
    } else if ($title === NULL || $release_date === NULL || $genre === NULL ||
            $title === '' || $release_date === '' || $genre === '') {
        $error = 'All fields are required.';
        $movie = get_movie($movie_id);
        include('movie_edit.php');
    } else if (strlen($title) > 30 || strlen($genre) > 30) {
        $error = 'Title and genre must be 30 characters or less.';
        $movie = get_movie($movie_id);
        include('movie_edit.php');
    } else {
        update_movie($movie_id, $title, $release_date, $genre);
        header('Location: index.php');
    }
}
?>