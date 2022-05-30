<?php


include("auth.php");  ?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <meta http-equiv="x-ua-compatible" content="ie=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Contul meu</title>
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
      label {
        font-size: 16px;
      }
      .normal {
        padding: 0px !important;
        color: #fff;
        background-color: #9d0011;
        text-shadow: rgba(0, 0, 0, 0.24) 0 1px 0;
        font-size: 16px;
        box-shadow: rgba(255, 255, 255, 0.24) 0 2px 0 0 inset, #fff 0 1px 0 0;
        border: 1px solid #0164a5;
        border-radius: 2px;
        margin-top: 0px !important;
        cursor: pointer;
        text-align: center;
      }
      #customers {
                font-family: Arial, Helvetica, sans-serif;
                border-collapse: collapse;
                width: 100%;
                margin-bottom: auto!important;
            }

            #customers td,
            #customers th {
                border: 1px solid #ddd;
                padding: 4px;
                
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
    </style>
</head>
<body>
    <?php 
        include("header-admin.php");

    ?>
    <div class = "adb">
        <form action="" method="POST" style="display: contents;">
            <label>Username-ul actual este:  <b><?php echo $_SESSION['username']; ?></b></label>
            <input type="text" value="" name="numenou" placeholder="Introdu noul username">
            <input  type="submit" name="ActualizareNume" value="Actualizeaza username-ul">
        </form>
    </div>
    <div class="d-flex">
      <div class="admin-panel-posts">
      <p>Topicurile create:</p>
        <?php 
          $usr_id = $_SESSION['usr_id'];
          $usr_name = $_SESSION['username'];
          $sql_dataTopic = "SELECT * FROM topic WHERE id_util = '$usr_id'";   
          $result_dataTopic = mysqli_query($con, $sql_dataTopic);
  
          if (!$result_dataTopic)
              die('Invalid querry:' . mysqli_error($con));
          else {
  
              echo "<table id = \"customers\">";
              echo "<tr><th><b>Utilizator</b></th><th><b>Topic</b></th><th><b>Motiv</b></th><th><b>Data</b></th></tr>";
              while ($table_data = mysqli_fetch_array($result_dataTopic, MYSQLI_ASSOC)) {
                  echo "<tr>";
                  echo '<td>' . $usr_name . '</td>';
                  echo '<td>' . $table_data['numetopic'] . '  </td>';
                  echo '<td>' . $table_data['descriere'] . '</td>';
                  echo '<td>' . $table_data['data'] . '</td>';
                  echo "</tr>";
              }
              echo "</table>";
            }

        ?>
      </div>
      <div class="admin-panel-posts">
      <p>Raspunsurile create:</p>
      <?php 
          $usr_id = $_SESSION['usr_id'];
          $usr_name = $_SESSION['username'];
          $sql_dataRasp = "SELECT * FROM raspunsuri WHERE id_util = '$usr_id'";   
          $result_dataRasp = mysqli_query($con, $sql_dataRasp);
  
          if (!$result_dataRasp)
              die('Invalid querry:' . mysqli_error($con));
          else {
  
              echo "<table id = \"customers\">";
              echo "<tr><th><b>Utilizator</b></th><th><b>Raspuns</b></th><th><b>Data</b></th></tr>";
              while ($table_data = mysqli_fetch_array($result_dataRasp, MYSQLI_ASSOC)) {
                  echo "<tr>";
                  echo '<td>' . $usr_name . '</td>';
                  echo '<td>' . $table_data['raspuns'] . '  </td>';
                  echo '<td>' . $table_data['data'] . '</td>';
                  echo "</tr>";
              }
              echo "</table>";
            }

        ?>
      </div>
      <form action="" method="POST" style="margin-bottom: 31px;">
       <div class = "adb">
            <label for="">Apasa pentru ati sterge contul: </label>
            <input   type="submit" name="STERGE" value="Sterge-ti contul">
            <p style="color:red; margin: 0px;">*Atentie odata apasat pe buton toate datele se vor sterge!</p>
            <p  style="color:red;">Inclusiv activitatea pe forum!</p>
        </div>
      </form>
    </div>
    

    <?php include('footer.php') ?>
</body>
</html>

<?php

if(isset($_POST['ActualizareNume']) and isset($_POST['numenou']) and $_POST['numenou'] != "") {
  $name = $_POST['numenou'];
  $id_util = $_SESSION['usr_id'];
  $sql = "UPDATE users SET username='$name' WHERE id='$id_util'";
  $result = mysqli_query($con,$sql);
  $_SESSION['username'] = $name;
  echo "<script>window.location.href='my-account.php';</script>";

}
else if(isset($_POST['STERGE'])) {
  $id_util = $_SESSION['usr_id'];
  $sql = "DELETE FROM users WHERE id='$id_util'";
  $result = mysqli_query($con,$sql);
  echo '<script>alert("Contul a fost sters cu succes!")</script>';
  session_destroy();
  echo "<script>window.location.href='login.php';</script>";
}

?>
