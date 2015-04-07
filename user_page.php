<!DOCTYPE html>

<?php

    // mySQLi

    $mysqli = new mysqli("localhost", "root", "", "login_practice");

    //  SQL Statement

    $sql = 'SELECT * FROM `users` WHERE 1';

//    $update_name = 'UPDATE users SET username="'.$_POST["new-name"].'" WHERE id=2';
//    $update_pass = 'UPDATE users SET username="'.$_POST["new-pass"].'" WHERE id=2';

    //  mySQL Query

    $result = $mysqli->query($sql);

    //  Retrieve Data


    //  Close connection
    $mysqli->close();

?>

<html>
  <head>
    <title>User Page</title>
    <link href="style.css" type="text/css" rel="stylesheet"/>
  </head>
  <body>

      <table>
        <tr>
          <th>ID</th>
          <th>Username</th>
          <th>Password</th>
          <th></th>
          <th></th>
        </tr>
        <?php
          while($row = $result->fetch_assoc()){
            echo "<tr><td>";
            print_r($row["id"]);
            echo '</td><td>';
            print_r($row["username"]);
            echo  '<form action="" method="post"><input class="update" type="submit" value=""><input class="new-name" type="text" name="new-name"></form></td><td>';
            print_r($row["password"]);
            echo '<form action="" method="post"><input class="update" type="submit" value=""><input class="new-pass" type="text" name="new-pass"></form></td>
                  <td><input type="submit" value="Delete"></td>
                  </tr>';
          }
        ?>
      </table>
  </body>
</html>