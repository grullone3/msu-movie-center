<?php include('header.php'); ?>

<h2>Edit Movie</h2>

<?php if (!empty($error)) : ?>
    <p class="error"><?php echo htmlspecialchars($error); ?></p>
<?php endif; ?>

<form action="index.php" method="post" id="movie_form">
    <input type="hidden" name="action" value="update_movie">
    <input type="hidden" name="movie_id" value="<?php echo htmlspecialchars($movie['MovieID']); ?>">

    <label>Movie Title:</label>
    <input type="text" name="title" maxlength="30" required
        value="<?php echo htmlspecialchars($movie['MovieTitle']); ?>"><br>

    <label>Release Date:</label>
    <input type="date" name="release_date" required
        value="<?php echo htmlspecialchars($movie['ReleaseDate']); ?>"><br>

    <label>Genre:</label>
    <input type="text" name="genre" maxlength="30" required
        value="<?php echo htmlspecialchars($movie['Genre']); ?>"><br>

    <input type="submit" value="Update Movie">
</form>

<p><a href="index.php">View Movie List</a></p>

<?php include('footer.php'); ?>