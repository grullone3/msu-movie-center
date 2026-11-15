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
}
?>