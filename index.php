<?php


include("auth.php"); //include auth.php file on all secure pages ?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <meta http-equiv="x-ua-compatible" content="ie=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Acasa</title>
    <link rel = "icon" href = "./img/Romania-icon.png" type = "image/x-icon">
    <link rel="stylesheet" href="css/foundation.css" />
    <link rel="stylesheet" href="css/app.css" />
    <link rel="stylesheet" href="css/app.css" />
    <link rel="stylesheet" href="css/styleAuth.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <style>
      body {
          background-color: rgb(255, 255, 255);
        }
        img {
          border-radius: 8px;
          display: block;
          margin-left: auto;
          margin-right: auto;
          width: 60%
        }
        
        .card {
          background-color: rgb(255, 255, 255);
          padding-top: 5%;
          border: 0px;
          width: auto;
          height: 650px;
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
    </style>
</head>
<body>
    <?php 
        include("header-admin.php");
      
    ?>
    <div class="card">
        <img src="img/romania.png" />
    </div>

    <?php include('footer.php') ?>
</body>

</html>
