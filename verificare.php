<?php
    $con = mysqli_connect("localhost","root","","proiectdawm");
    $nume = $_SESSION["username"];
    $query = "SELECT tip FROM `users` WHERE username='$nume'";
    $result = mysqli_query($con,$query) or die(mysql_error());
    $row = mysqli_fetch_assoc($result);
    $_SESSION["type"] = $row["tip"];

?>