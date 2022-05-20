<?php

?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <meta http-equiv="x-ua-compatible" content="ie=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Foundation for Sites</title>
    <link rel="stylesheet" href="css/foundation.css" />
    <link rel="stylesheet" href="css/app.css" />
    <link rel="stylesheet" href="css/app.css" />
    <link rel="stylesheet" href="css/styleAuth.css" />
    <style>
       body {
        background-color: rgb(255, 255, 255);
      }
      footer {
        position: fixed;
        left: 0;
        bottom: 0;
        width: 100%;
        background-color: #ff0000;
        color: rgb(255, 255, 255);
        text-align: center;
      }
      img {
        border-radius: 8px;
        display: block;
        margin-left: auto;
        margin-right: auto;
        width: 50%;
      }
      .card p:first-child {
        margin: auto;
        text-align: center;
        padding-top: 10%;
      }
      .card {
        background-color: rgb(255, 255, 255);
        padding-top: 5%;
        border: 0px;
      }
      .top-bar, .top-bar ul {
        background-color: #ff0000;
        color: white;
    }
    a {
      color: white;
    }
    a:hover {
      color: black;
    }
    .form a {
      color: red;
    }
    </style>
</head>

<body>
    <div class="top-bar" id="responsive-menu">
        <div class="top-bar-left">
            <ul class="dropdown menu" data-dropdown-menu>
                <li class="menu-text">Descopera Romania</li>
                <li><a href="category.php">Forum</a></li>
                <li class="right"><a href="login.php">Log In</a></li>
                <li class="right"><a href="registration.php">Register</a></li>
            </ul>
        </div>
    </div>
    <?php
	require('db.php');
	session_start();
    if (isset($_SESSION["username"])&& $_SESSION["username"] != "") {
        header("Location: index.php");
        exit();
    }
    // If form submitted, insert values into the database.
    if (isset($_POST['username'])){
		
		$username = stripslashes($_REQUEST['username']); // removes backslashes
		$username = mysqli_real_escape_string($con,$username); //escapes special characters in a string
		$password = stripslashes($_REQUEST['password']);
		$password = mysqli_real_escape_string($con,$password);
		
	//Checking is user existing in the database or not
        $query = "SELECT * FROM `users` WHERE username='$username' and password='".md5($password)."'";
		$result = mysqli_query($con,$query) or die(mysql_error());
		$rows = mysqli_num_rows($result);
        if($rows==1){
            $_SESSION["username"] = $username;
            header("Location: index.php");
            exit(); // Redirect user to index.php
            }else{
				echo "<div class='form'><h3>username-ul sau parola este incorecta!</h3><br/>Apasati aici pentru a va <a href='login.php'>loga</a></div>";
				}
    }else{
?>
    <div class="form">
        <h1>Log In</h1>
        <form action="" method="post" name="login">
            <input type="text" name="username" placeholder="username" required />
            <input type="password" name="password" placeholder="parola" required />
            <input name="submit" type="submit" value="Login" />
        </form>
        <p>Nu esti inregistrat? <a style = "color: red;" href='registration.php'>Apasa aici!</a></p>


    </div>
    <?php } ?>

    <footer style="text-align: center">
        © 2019 Descopera Romania All rights reserved.
    </footer>
</body>

</html>