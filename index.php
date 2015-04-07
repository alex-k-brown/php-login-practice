<!DOCTYPE html>

<?php

//  Define Database
    define ( 'DB_HOST', 'localhost' );
    define ( 'DB_USER', 'root' );
    define ( 'DB_PASSWORD', '' );
    define ( 'DB_NAME', 'login_practice' );

//  Print Post, <pre> tag formats it

    echo "<pre>";
    print_r($_POST);
    echo "</pre>";

// mySQLi

    $mysqli = new mysqli("localhost", "root", "", "login_practice");

//    SQL Statement

    $sql = 'INSERT INTO users (username, password)
    VALUES ("'.$_POST["username"].'", "'.$_POST["password"].'")';

//    Print SQL statement
    echo $sql;

//  mySQL Query

    $result = $mysqli->query($sql);

//  Redirect

    if (!$result) {
        echo "Please enter valid username and password";
    }
    else{
        header('location: user_page.php');
    }

//  Close connection
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