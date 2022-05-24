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
    </style>
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
    <h1 style="text-align:center; font-size:40px;"><b>Admin panel</b></h1>
    <div class = "select-tables">
        <form action="" method="POST">
            <div class = "select-tables">
                <select id="optiune" name="optiune">
                    <option value="" selected="selected" >Alege tabelul</option>
                    <option value="judete" >Tabelul judete</option>
                    <option value="raspunsuri" >Tabelul raspunsuri</option>
                    <option value="topic" >Tabelul topic</option>
                    <option value="users" >Tabelul users</option>
                </select>
                <input type="submit">
            </div>
        </form>
    </div>
    <?php
        if(isset($_POST['optiune']) and $_POST["optiune"] == "judete") {
            /*$start = 0;
            $limit = 42;
            $id = 1;
            if (isset($_GET['pg'])) {
                $id = $_GET['pg'];
            }
            else {
            $id = 1;
            }
            $start = ($id - 1) * $limit;
            */
            //$sql = "SELECT * FROM judete LIMIT $start, $limit";
            $sql = "SELECT * FROM judete";     
            $result = mysqli_query($con, $sql);


            if (!$result)
                die('Invalid querry:' . mysqli_error($con));
            else {

                echo "<table id = \"customers\">";
                echo '<tr><th><b>Categorie</b></th><th><b>Creata la data de</b></th><th style="width: 180px" ><b>Actualizati / Stergeti</b></th></tr>';
                while ($myrow = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
                    echo "<tr><td>";
                    echo '<h3><a href="topic.php?jud=' . $myrow['name'] . '">' . $myrow['name'] . '</a><h3>';
                    echo "</td>";
                    echo "<td>";
                    echo "18-05-2022";
                    echo "</td>";
                    echo "<td>";
                    echo '<a href= "edit.php?id_jud=' . $myrow['id'] . '"><i class="far fa-edit"></i></a> / <i class="far fa-trash-alt"></i>';
                    echo "</td></tr>";
                }
                echo "</table>";

                //$rows = mysqli_num_rows(mysqli_query($con, "SELECT * FROM judete "));
                //$total = ceil($rows / $limit);
                /*if ($id > 1) {
                    echo "<a href='?id=" . ($id - 1) . "' class='links-button'>PREVIOUS </a>";
                }
                if ($id != $total) {
                    echo "<a href='?id=" . ($id + 1) . "' class='links-button'> NEXT</a>";
                }
                echo "<div class='container'>";
                echo "<ul class='pagination'>";
                for ($i = 1; $i <= $total; $i++) {
                    if ($i == $id) {
                        echo "<li><a href='adminPanel.php?pg=" . $i . "'>" . $i . "</a></li>";
                    } else {
                        echo "<li><a href='adminPanel.php?pg=" . $i . "'>" . $i . "</a></li>";
                    }
                }
                echo "</ul>";
                echo "</div>";
                }
                */
            }
        }
        
    ?>

    <?php include('footer.php') ?>
</body>

</html>