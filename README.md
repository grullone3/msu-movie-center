# MSU Movie Center

A PHP/MySQL web application for managing a movie database, with full CRUD support: list, add, edit, and delete movies.
Built for CSIT 337 (Internet Computing), Montclair State University, Fall 2026.

**Stack:** PHP 8, MySQL/MariaDB, XAMPP, HTML/CSS, MVC pattern

## Features
- View all movies in a table
- Add a new movie with server-side validation
- Edit an existing movie (form pre-filled from the database)
- Delete a movie
- Post/Redirect/Get pattern to prevent duplicate submissions on refresh

## Project Structure
| File | Role |
|---|---|
| `index.php` | Controller: routes each request by its `action` |
| `database.php` | Model: PDO database connection |
| `movie_db.php` | Model: query functions (get, add, update, delete) |
| `movie_list.php`, `movie_add.php`, `movie_edit.php` | Views |
| `header.php`, `footer.php` | Shared page layout |
| `main.css` | Styling |
| `msu-movie.sql` | Database setup script |

## Security
- **SQL injection prevention:** Every query uses PDO prepared statements with bound parameters (`prepare` + `bindValue`), so user input is always treated as data, never as executable SQL.
- **XSS prevention:** All database values are escaped with `htmlspecialchars()` before being output to HTML.
- **Server-side input validation:** Required fields and length limits are enforced in PHP, not just in the browser. Movie IDs are validated as integers with `FILTER_VALIDATE_INT`.
- **Least privilege:** The app connects as `mgs_user`, which only has SELECT/INSERT/UPDATE/DELETE on this one database. It can't drop tables or access other databases.
- **State-changing actions use POST:** Insert, update, and delete are POST requests, never GET links.
- **Note:** The credentials in `database.php` are local development values. A production deployment would load them from environment variables instead of committing them to source control.

## Setup
1. Install [XAMPP](https://www.apachefriends.org) and start Apache and MySQL.
2. Clone this repo into XAMPP's `htdocs` folder.
3. In phpMyAdmin, open the SQL tab and run `msu-movie.sql`.
4. Visit `http://localhost/msu_movies/`.
