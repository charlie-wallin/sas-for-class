# Southern Appalachian Salamanders
## PHP/MySQL School Project 

This is a basic PHP project that connects to a MySQL database using credentials stored in a secure, non-tracked file.

## Requirements

- PHP 7.4+
- MySQL 5.7+
- Web server (e.g., Apache, Nginx)

## Installation

### Create a db_credentials.php file:

Inside the `private/` folder (create it if it doesn't exist), create a file named `db_credentials.php` with the following content:

```php
<?php
define("DB_SERVER", "");
define("DB_USER", "");
define("DB_PASS", "");
define("DB_NAME", "");
```

Fill in the appropriate values for your MySQL setup.

Make sure `db_credentials.php` is listed in your `.gitignore` file so it is not committed to version control.

## License

This project is for educational purposes. Modify and use it as needed.

