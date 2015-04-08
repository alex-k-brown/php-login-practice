<!DOCTYPE html>

<?php

    // mySQLi

    $mysqli = new mysqli("localhost", "root", "", "login_practice");

    //  SQL Statement

    $sql = 'SELECT * FROM `users` WHERE status = 0';

    $update_name = 'UPDATE users SET username="'.$_POST["new-name"].'" WHERE id='.$_POST["user-id"];
    $update_pass = 'UPDATE users SET password="'.$_POST["new-pass"].'" WHERE id='.$_POST["password-id"];
    $update_status = 'UPDATE users SET status=1 WHERE id='.$_POST["delete-id"];

    //  mySQL Query

    $result = $mysqli->query($sql);
    $mysqli->query($update_name);
    $mysqli->query($update_pass);
    $mysqli->query($update_status);

    if(isset($_POST['submit']))
    {
        header('location: user_page.php');
    };

    if(isset($_POST['delete']))
    {
        header('location: user_page.php');
    };


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
            echo  '<form action="" method="post" name="user-form"><input class="update" name= "submit" type="submit" value=""><input class="new-name" type="text" name="new-name"><input type="hidden" name="user-id" value="' . $row["id"] . '"></form></td><td>';
            print_r($row["password"]);
            echo '<form action="" method="post" name="password-form"><input class="update" type="submit" name="submit" value=""><input class="new-pass" type="text" name="new-pass"><input type="hidden" name="password-id" value="' . $row["id"] . '"></form></td>
                  <td><form action="" method="post" name="delete-form"><input type="submit" name="delete" value="Delete"><input type="hidden" name="delete-id" value="' . $row["id"] . '"></form></td>
                  </tr>';
          }
        ?>
      </table>
  </body>
</html>