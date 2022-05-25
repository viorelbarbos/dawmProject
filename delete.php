<?php


include("auth.php"); //include auth.php file on all secure pages ?>
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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>
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
      .links-button {
            display: inline-block;
            vertical-align: middle;
            margin: 0 0 1rem 0;
            font-family: inherit;
            padding: 0.85em 1em;
            -webkit-appearance: none;
            border: 1px solid rgb(0, 0, 0);
            border-radius: 0;
            transition: background-color 0.25s ease-out, color 0.25s ease-out;
            font-size: 0.8rem;
            line-height: 1;
            text-align: center;
            cursor: pointer;
            background-color: #060a085b;
            color: #fefefe;
        }

        #customers {
            font-family: Arial, Helvetica, sans-serif;
            border-collapse: collapse;
            width: 100%;
        }

        #customers td,
        #customers th {
            border: 1px solid #ddd;
            padding: 8px;
        }

        #customers tr {
            background-color: white;
        }

        #customers tr:hover {
            background-color: wheat;
        }

        #customers th {
            padding-top: 12px;
            padding-bottom: 12px;
            text-align: left;
            background-color: #a64200;
            color: white;
        }

        div .container {
            margin: 0px 0px;
            padding: 0px 0px;
            
        }
        
        ul.pagination a{
            display: inline-block;
            vertical-align: middle;
            margin: 0 0 1rem 0;
            font-family: inherit;
            padding: 0.85em 1em;
            -webkit-appearance: none;
            border: 1px solid rgb(0, 0, 0);
            border-radius: 0;
            transition: background-color 0.25s ease-out, color 0.25s ease-out;
            font-size: 0.8rem;
            line-height: 1;
            text-align: center;
            cursor: pointer;
            background-color: #9d0011;
            color: #fefefe;
        }
        ul.pagination a:visited {
            background-color: #9d0011;
            color: black;
        }
        td>h3>a {
          color: black;
          font-size: 1.1rem;
        }
        #customers a {
            color: black;
        }
        #customers a:hover {
            color: #9d0011;
        }
        .adb {
            padding-top: 150px;
        }
        .align-rbtn {
            display: line;  
        }
    </style>
    <script>
            // Using ES6 feature.
            let redirect_Page = (ele) => {
                
                ele.value = 'Inapoi la adminPanel in 5 secunde ...';
                ele.disabled = true;
                alert("Felicitari");
                
                let tID = setTimeout(function () {

                    // redirect page.
                    window.location.href = 'adminPanel.php';
                    
                    window.clearTimeout(tID);		// clear time out.
                    
                }, 5000);	// call function after 5000 milliseconds or 5 seconds
            }
            let redirect_Page1 = (ele) => {
                
                ele.value = 'Inapoi la adminPanel in 5 secunde ...';
                ele.disabled = true;
                alert("Topicul a fost sters cu succes!");
                
                let tID = setTimeout(function () {

                    // redirect page.
                    window.location.href = 'adminPanel.php';
                    
                    window.clearTimeout(tID);		// clear time out.
                    
                }, 5000);	// call function after 5000 milliseconds or 5 seconds
            }

</script>
</head>
<body>
    <?php 
      include("verificare.php"); 
      if($_SESSION["type"] == 0) {
        echo "<script>window.location.href='index.php';</script>";  
      }
      else {
        include("header-admin.php");
      }
        
    ?>
    <?php
        if($_GET['table'] == 'judet') {
    ?>

                <div class = "adb">
                    <form id="topicForm" action="" method="POST">
                        <label for="fname">Esti sigur ca vrei sa stergi categoria <b><?php echo $_GET['jud'] ?></b>? </label>
                        <div class = "align-rbtn">
                            <input type="submit" name="submit" value="DA!"/>
                            <input type="submit" name="submitno" value="NU!" id='bt' onclick='redirect_Page(this)' />
                        </div>
                    </form>
                </div>

    <?php
        }
        else if($_GET['table'] == 'topic') {
            ?>
        
                    <div class = "adb">
                        <form id="topicForm" action="" method="POST">
                            <label for="fname">Doriti sa stergeti topicul: <b><?php echo $_GET['top'] ?></b>, din categoria <b><?php echo $_GET['jud'] ?></b>?</label>
                            <div class = "align-rbtn">
                                <input type="submit" name="submit" value="DA!"/>
                                <input type="submit" name="submitno" value="NU!" id='bt' onclick='redirect_Page(this)' />
                            </div>
                        </form>
                    </div>
        
            <?php
                }
    else if($_GET['table'] == 'raspuns') {
            ?>
        
                    <div class = "adb">
                        <form id="topicForm" action="" method="POST">
                            <label for="fname">Doriti sa stergeti raspunsul din topicul: <b><?php echo $_GET['top'] ?></b>?</label>
                            <div class = "align-rbtn">
                                <input type="submit" name="submit" value="DA!"/>
                                <input type="submit" name="submitno" value="NU!" id='bt' onclick='redirect_Page(this)' />
                            </div>
                        </form>
                    </div>
        
            <?php
                }
    ?>

    <?php include('footer.php') ?>
</body>

</html>

<?php

    if((isset($_POST['submit']) || isset($_POST['submitno']))and $_GET['table'] == 'topic'){
        if(isset($_POST['submit'])) {
        $id_top = $_GET['id_top'];
        $sql = "DELETE FROM topic WHERE id='$id_top'";
        $result = mysqli_query($con,$sql);
        echo '<script>alert("Topicul a fost sters cu succes!");</script>';
        echo "<script>window.location.href='adminPanel.php';</script>";
        }
        else {
            //echo "<script>window.location.href='adminPanel.php';</script>";
        }
    }
    else if((isset($_POST['submit']) || isset($_POST['submitno']))and $_GET['table'] == 'judet'){
        if(isset($_POST['submit'])) {
        $id_jud = $_GET['id_jud'];
        $sql = "DELETE FROM judete WHERE id='$id_jud'";
        $result = mysqli_query($con,$sql);
        echo '<script>alert("Categoria a fost stersa cu succes!");</script>';
        echo "<script>window.location.href='adminPanel.php';</script>";
        }
    }
    else if((isset($_POST['submit']) || isset($_POST['submitno']))and $_GET['table'] == 'raspuns'){
        if(isset($_POST['submit'])) {
        $id_rasp = $_GET['id_rasp'];
        $sql = "DELETE FROM raspunsuri WHERE id='$id_rasp'";
        $result = mysqli_query($con,$sql);
        echo '<script>alert("Raspunsul a fost sters cu succes!");</script>';
        echo "<script>window.location.href='adminPanel.php';</script>";
        }
    }


?>