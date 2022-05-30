<?php
    $con = mysqli_connect("localhost","root","","proiectdawm");
    $nume = $_SESSION["username"];
    $query_getID = "SELECT * FROM `users` WHERE username='$nume'";
    $result_getID = mysqli_query($con,$query_getID) or die(mysql_error());
    $table_data_usernameTip = mysqli_fetch_assoc($result_getID);
    $_SESSION["type"] = $table_data_usernameTip["tip"];
    $_SESSION['usr_id'] = $table_data_usernameTip["id"];

?>