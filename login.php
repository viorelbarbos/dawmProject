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
        background-color: #9d0011;
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
      .form {
        margin-top: 150px;
        border-color: red;
        margin-bottom: 400px;
        border-bottom-style: double;
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
        $query_users = "SELECT * FROM `users` WHERE username='$username' and password='".md5($password)."'";
		    $result_users = mysqli_query($con,$query_users) or die(mysql_error());
		    $rows = mysqli_num_rows($result_users);
        if($rows==1){
            $_SESSION["username"] = $username;
            header("Location: index.php");
            exit(); // Redirect user to index.php
            }else{
				echo "<div class='form'><h3>Username-ul sau parola este incorecta!</h3><br/>Apasati aici pentru a va <a href='login.php'>loga</a></div>";
				}
    }else{
?>
    <div style="display:flex;">
      <div class="form">
          <form action="" method="post" name="login">
            <div class="smb-center">
              <h1 style="font-size: 20px;">Intra in cont</h1>
                <input type="text" name="username" placeholder="Username" required />
                <input type="password" name="password" placeholder="Parola" required />
                <input name="submit" type="submit" value="Conecteaza-te" />
                <p>Nu esti inregistrat? <a style = "color: #9d0011;" href='registration.php'>Creeaza un cont nou</a></p>
            </div>
          </form>
      </div>
    </div>
    <?php } ?>

    <?php include('footer.php')?>
</body>

</html>