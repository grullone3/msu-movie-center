<?php include("header.php"); ?>

<p><a href="index.php?action=show_add_form"> Add A New Movie</a></p>
<h2>All Movies</h2>

<table>
    <tr>
        <th>Title</th>
        <th>Release Date</th>
        <th>Genre</th>
        <th>Update</th>
        <th>Remove</th>
    </tr>
    <?php foreach ($movies as $movie) : ?>
    <tr>
        <td><?php echo htmlspecialchars($movie['MovieTitle']); ?></td>
        <td><?php echo htmlspecialchars($movie['ReleaseDate']); ?></td>
        <td><?php echo htmlspecialchars($movie['Genre']); ?></td>
        <td>
            <form action="index.php" method="post">
                <input type="hidden" name="action" value="show_edit_form">
                <input type="hidden" name="movie_id" value="<?php echo $movie['MovieID']; ?>">
                <input type="submit" value="Edit">
            </form>
        </td>
        <td>
            <form action="index.php" method="post">
                <input type="hidden" name="action" value="delete_movie">
                <input type="hidden" name="movie_id" value="<?php echo $movie['MovieID']; ?>">
                <input type="submit" value="Delete">
            </form>
        </td>
    </tr>
    <?php endforeach; ?>
</table>

<?php include("footer.php"); ?>