<?php
ini_set('Display_errors', 1);
error_reporting(E_ALL);

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
        $title == '' || $release_date == '' || $genre == '') {
        $error = 'All fields are required.';
        include('movie_add.php');
    } else if (strlen($title) > 30 || strlen($genre) > 30) {
        $error = 'Title and Genre must be less than 30 characters.';
        include('movie_add.php');
    } else {
        add_movie($title, $release_date, $genre);
        header("Location: index.php");
    }
}
?>