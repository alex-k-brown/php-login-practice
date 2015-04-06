<!DOCTYPE html>

<?php
    define ( 'DB_HOST', 'localhost' );
    define ( 'DB_USER', 'root' );
    define ( 'DB_PASSWORD', '' );
    define ( 'DB_NAME', 'login_practice' );
    echo "<pre>";
    print_r($_POST);
    echo "</pre>";

    $mysqli = mysqli_init();
    if (!$mysqli) {
        die('mysqli_init failed');
    }

    if (!$mysqli->options(MYSQLI_INIT_COMMAND, 'SET AUTOCOMMIT = 0')) {
        die('Setting MYSQLI_INIT_COMMAND failed');
    }

    if (!$mysqli->options(MYSQLI_OPT_CONNECT_TIMEOUT, 5)) {
        die('Setting MYSQLI_OPT_CONNECT_TIMEOUT failed');
    }

    if (!$mysqli->real_connect('localhost', 'root', '', 'login_practice')) {
        die('Connect Error (' . mysqli_connect_errno() . ') '
            . mysqli_connect_error());
    }

    echo 'Success... ' . $mysqli->host_info . "\n";

    $mysqli->close();

?>

<html>
    <head>
        <title>Login Practice</title>
    </head>
    <body>
        <p>Hello, World!</p>
        <form action="" method="post">
            <input type="text" name="username">
            <input type="password" name="password">
            <input type="submit" value="submit">
        </form>
    </body>
</html>