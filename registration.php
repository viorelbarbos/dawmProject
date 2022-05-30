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
    <script>  
        function validateform(){  
        let name=document.registration.username.value;  
        let password=document.registration.password.value;  
        let password_confirm=document.registration.confirmpassword.value;
        let booking_email=document.registration.email.value; 

        if (name==null || name==""){  
            alert("Adaugati un username!");  
            return false;
        }
        else if (name.length < 6) {
            alert("Numele trebuie sa contina minim 6 caractere!");  
            return false;
        }
        else if (password.localeCompare(password_confirm ) != 0 ) {
            return false;
        } 
        else if(password.length<8){  
            alert("Parola trebuie sa aiba minim 8 caractere!");  
            return false;  
        }
        else if(booking_email == '' || booking_email.indexOf('@') == -1 || booking_email.indexOf('.') == -1) {
            alert("Ati introdus un mail invalid");
            return false; 
        }
        }  
          
    </script> 
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
            margin-top: 130px;
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

    if (isset($_REQUEST['username']) and $_REQUEST['confirmpassword'] == $_REQUEST['password'] ){
		$name = stripslashes($_REQUEST['username']); 
		$name = mysqli_real_escape_string($con,$name); 
		$email = stripslashes($_REQUEST['email']);
		$email = mysqli_real_escape_string($con,$email);
		$password = stripslashes($_REQUEST['password']);
		$password = mysqli_real_escape_string($con,$password);
        $confirmpassword = stripslashes($_REQUEST['confirmpassword']);
		$confirmpassword = mysqli_real_escape_string($con,$confirmpassword);

        $query_name = "SELECT username FROM `users` WHERE username='$name'";
        $result_name = mysqli_query($con,$query_name) or die(mysql_error());
		$rows_name = mysqli_num_rows($result_name);

        $query_email = "SELECT email FROM `users` WHERE email='$email'";
        $result_email = mysqli_query($con,$query_email) or die(mysql_error());
		$rows_email = mysqli_num_rows($result_email);
        if($rows_name != 0 ){
            echo "<div class='form'><h3>Acest username deja exista!</h3><br/>Apasa aici pentru a te <a href='registration.php'>inregistra</a></div>";

        }
        else if ($rows_email != 0) {
            echo "<div class='form'><h3>Acest mail exista in baza de date!</h3><br/>Apasa aici pentru a te <a href='registration.php'>inregistra</a></div>";
        }
        else {

		$trn_date = date("Y-m-d H:i:s");
        $query_insert = "INSERT into `users` (username, password, email, trn_date) VALUES ('$name', '".md5($password)."', '$email', '$trn_date')";
        $result_insert = mysqli_query($con,$query_insert);
        if($result_insert){
            echo "<div class='form'><h3>V-ati inregistrat cu succes.</h3><br/>Apasati aici pentru <a href='login.php'>logare</a></div>";
        }
    }
    }else{
?>
    <div style="display:flex;">
        <div class="form">
            <form  name="registration" action="" method="post" onsubmit="return validateform()">
                <div class="smb-center">
                    <h1 style="font-size: 20px;">Inregistreaza-te!</h1>
                    <input type="text" name="username"  placeholder="Username" required />
                    <input type="email" name="email"   placeholder="Email"  required/>
                    <input type="password" name="password" placeholder="Parola" required />
                    <input type="password" name="confirmpassword" placeholder="Reintroduceti parola"  required />
                    <input type="submit" name="submit" value="Inscrie-te" style="margin: auto;"/>
                    <p>Ai deja un cont? <a style = "color: #9d0011;" href='login.php'>Conecteaza-te aici!</a></p>
                </div>
            </form>
        </div>
    </div>
    <?php } ?>
    <?php include('footer.php')?>
    <script src="js/app.js"></script>
</body>

</html>