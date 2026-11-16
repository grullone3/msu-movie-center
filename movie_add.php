<?php include ("header.php"); ?>

<h2> Add Movie</h2>

<?php if (!empty($error)) : ?>
    <p class="error"><?php echo htmlspecialchars($error); ?></p>
<?php endif; ?>

<form action="index.php" method="post" id="movie_form">
    <input type="hidden" name="action" value="add_movie">

    <label>Movie title:</label>
    <input type="text" name="title" value="" maxlength="30" required><br>

    <label>Release date:</label>
    <input type="date" name="release_date" value="" required><br>

    <label>Genre:</label>
    <input type="text" name="genre" value="" maxlength="30" required><br>

    <input type="submit" value="Insert Movie">
</form>

<p><a href="index.php">Back to Movie List</a></p>

<?php include ("footer.php"); ?>