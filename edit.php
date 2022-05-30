<?php


include("auth.php"); //include auth.php file on all secure pages ?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <meta http-equiv="x-ua-compatible" content="ie=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Admin panel</title>
    <link rel = "icon" href = "./img/Romania-icon.png" type = "image/x-icon">
    <link rel="stylesheet" href="css/foundation.css" />
    <link rel="stylesheet" href="css/app.css" />
    <link rel="stylesheet" href="css/app.css" />
    <link rel="stylesheet" href="css/styleAuth.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>
    <style>
      body {
          background-color: rgb(255, 255, 255);
          display: flex;
        justify-content: center;
        flex-direction: column;
        align-items: center;
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
      .top-bar {
          width:100%;
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
        .adb1 {
            display: flex;
            justify-content: start;
            flex-direction: column;
            align-items: center;
        }
        .adb {
            padding-top:220px;
        }
        #topicForm {
            border: inset;
        border-color: #9d0011;
        }
    </style>
</head>
<body>
    <?php 
      include("verificare.php"); 
      if($_SESSION["type"] == 0) {
        echo "<script>window.location.href='index.php';</script>";  
      }
    include("header-admin.php");
    
        
    ?>
    <?php
        if($_GET['table'] == 'judet') {
    ?>

                <div class = "adb">
                    <form id="topicForm" action="" method="POST">
                        <label for="fname">Numele categoriei actuale: <b><?php echo $_GET['name'] ?></b></label>
                        <label for="fname">Introduceti noul nume pentru aceasta categorie: </label>
                        <input type="text" id="fname" name="numJUD" value="">
                        <div class = "adb1">
                            <input type="submit" name="submit" value="Modifica" />
                            <input style = "margin-bottom: 5px;" type="submit" name="submit1" value="Inapoi la Admin Panel"/>
                            </div>
                        </form>
                </div>

    <?php
        }
        else if($_GET['table'] == 'topic') {
            ?>
        
                        <div class = "adb">
                            <form id="topicForm" action="" method="POST">
                                <label for="fname">Numele topicului actual: <b><?php echo $_GET['top'] ?></b>, din categoria <b><?php echo $_GET['jud'] ?></ b></label>
                                <label for="fname">Introduceti noul nume pentru aceasta topic: </label>
                                <div class = "adb1">
                                    <input type="text" id="fname" name="numTOP" value="">
                                    <input type="submit" name="submit" value="Modifica topic" />
                                    <input style = "margin-bottom: 5px;" type="submit" name="submit1" value="Inapoi la Admin Panel"/>
                                </div>
                            </form>
                        </div>
        
            <?php
                }
        else if($_GET['table'] == 'raspuns') {
            ?>
                
                        <div class = "adb">
                            <form id="topicForm" action="" method="POST">
                                <label for="fname">Modificati raspunsul din topicul: <b><?php echo $_GET['top'] ?></b></label>
                                <label for="fname">Introduceti noul raspuns: </label>
                                <div class = "adb1">
                                    <input type="text" id="fname" name="numRASP" value="">
                                    <input type="submit" name="submit" value="Modifica raspuns" />
                                    <input style = "margin-bottom: 5px;" type="submit" name="submit1" value="Inapoi la Admin Panel"/>
                                </div>
                            </form>
                        </div>
                
            <?php
                }
                else if($_GET['table'] == 'utilizator') {
                    ?>
                        
                                <div class = "adb">
                                    <form id="topicForm" action="" method="POST">
                                        <label for="fname">Modificati numele utilizatorului: <b><?php echo $_GET['nume'] ?></b></label>
                                        <div class = "adb1">
                                            <input type="text" id="fname" name="numUTIL" value="">
                                            <input type="submit" name="submit" value="Modifica nume" />
                                            <input style = "margin-bottom: 5px;" type="submit" name="submit1" value="Inapoi la Admin Panel"/>
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
    if(isset($_POST['submit1'])){echo "<script>window.location.href='adminPanel.php';</script>";}
    else if(isset($_POST['numTOP']) and $_POST['numTOP'] != ""){
        $name = $_POST['numTOP'];
        $id_top = $_GET['id_top'];
        $sql = "UPDATE topic SET numetopic='$name' WHERE id='$id_top'";
        $result = mysqli_query($con,$sql);
        echo "<script>window.location.href='adminPanel.php?table=topic';</script>";
    }
    else if(isset($_POST['numJUD']) and $_POST['numJUD'] != "") {
        $name = $_POST['numJUD'];
        $id_jud = $_GET['id_jud'];
        $sql = "UPDATE judete SET name='$name' WHERE id='$id_jud'";
        $result = mysqli_query($con,$sql);
        echo "<script>window.location.href='adminPanel.php?table=jud';</script>";
    }
    else if(isset($_POST['numRASP']) and $_POST['numRASP'] != "") {
        $name = $_POST['numRASP'];
        $id_rasp = $_GET['id_rasp'];
        $sql = "UPDATE raspunsuri SET raspuns='$name' WHERE id='$id_rasp'";
        $result = mysqli_query($con,$sql);
        echo "<script>window.location.href='adminPanel.php?table=rasp';</script>";
    }
    else if(isset($_POST['numUTIL']) and $_POST['numUTIL'] != "") {
        $name = $_POST['numUTIL'];
        $id_util = $_GET['id_util'];
        $sql = "UPDATE users SET username='$name' WHERE id='$id_util'";
        $result = mysqli_query($con,$sql);
        if($name == $_SESSION['username']){
            $_SESSION['username'] = $name;
        }
        echo "<script>window.location.href='adminPanel.php?table=users';</script>";
    }

?>