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
                    <option value="topic" >Tabelul topic</option>
                    <option value="raspunsuri" >Tabelul raspunsuri</option>
                    <option value="users" >Tabelul users</option>
                </select>
                <input type="submit">
            </div>
        </form>
    </div>
    <?php
        if(isset($_POST['optiune']) and $_POST["optiune"] == "judete") {
            $sql_jud = "SELECT * FROM judete";     
            $result_jud = mysqli_query($con, $sql_jud);


            if (!$result_jud)
                die('Invalid querry:' . mysqli_error($con));
            else {

                echo "<table id = \"customers\">";
                echo '<tr><th><b>Categorie</b></th><th><b>Creata la data de</b></th><th style="width: 290px" ><b>Actualizati / Stergeti (CATEGORIA)</b></th></tr>';
                while ($table_data = mysqli_fetch_array($result_jud, MYSQLI_ASSOC)) {
                    echo "<tr><td>";
                    echo '<h3><a href="topic.php?jud=' . $table_data['name'] . '">' . $table_data['name'] . '</a><h3>';
                    echo "</td>";
                    echo "<td>";
                    echo "18-05-2022";
                    echo "</td>";
                    echo "<td>";
                    echo '<a href= "edit.php?id_jud=' . $table_data['id'] . '&table=judet&name=' . $table_data['name'] . '"><i class="far fa-edit"></i></a> / <a href= "delete.php?table=judet&jud=' . $table_data['name'] . '&id_jud=' . $table_data['id'] . '"><i class="far fa-trash-alt"></i></a>';
                    echo "</td></tr>";
                }
                echo "</table>";

            }
        }
        else if(isset($_POST['optiune']) and $_POST["optiune"] == "topic") {

            $sql_topic = "SELECT * FROM topic";     
            $result_topic = mysqli_query($con, $sql_topic);

            if (!$result_topic)
                die('Invalid querry:' . mysqli_error($con));
            else {

                echo "<table id = \"customers\">";
                echo '<tr><th><b>Utilizator</b></th><th><b>Categoria</b></th><th><b>Topic</b></th><th><b>Descriere</b></th><th style="width: 250px" ><b>Actualizati / Stergeti (TOPIC)</b></th></tr>';
                while ($table_data = mysqli_fetch_array($result_topic, MYSQLI_ASSOC)) {
                    $id_user = $table_data['id_util'];
                    $sql_getUser = "SELECT username FROM users WHERE id=$id_user";   
                    $result_getUser = mysqli_query($con, $sql_getUser);
                    $table_data_users = mysqli_fetch_array($result_getUser, MYSQLI_ASSOC);

                    $id_cat = $table_data['id_jud'];
                    $sql_getcat = "SELECT name FROM judete WHERE id=$id_cat";   
                    $result_getcat = mysqli_query($con, $sql_getcat);
                    $table_data_cat = mysqli_fetch_array($result_getcat, MYSQLI_ASSOC);

                    echo "<tr>";
                    echo '<td>' . $table_data_users['username'] . '</td>';
                    echo '<td>' . $table_data_cat['name'] . '</td>';
                    echo '<td><h3><a href="topicDeschis.php?jud='.$table_data_cat['name'].'&top='.$table_data['numetopic'].'">' . $table_data['numetopic'] . '</a><h3></td>';
                    echo '<td>' . $table_data['descriere'] . '</td>';
                    echo "<td>";
                    echo '<a href= "edit.php?jud=' . $table_data_cat['name'] . '&table=topic&top=' . $table_data['numetopic'] . '&id_top=' . $table_data['id'] . '"><i class="far fa-edit"></i></a> / <a href= "delete.php?jud=' . $table_data_cat['name'] . '&table=topic&top=' . $table_data['numetopic'] . '&id_top=' . $table_data['id'] . '"><i class="far fa-trash-alt"></i></a>';
                    echo "</td></tr>";
                }
                echo "</table>";    
            }
        }
        else if(isset($_POST['optiune']) and $_POST["optiune"] == "raspunsuri") {

            $sql_raspunsuri = "SELECT * FROM raspunsuri";     
            $result_raspunsuri = mysqli_query($con, $sql_raspunsuri);

            if (!$result_raspunsuri)
                die('Invalid querry:' . mysqli_error($con));
            else {

                echo "<table id = \"customers\">";
                echo '<tr><th><b>Utilizator</b></th><th><b>Topic</b></th><th><b>Raspuns</b></th><th><b>Data</b></th><th style="width: 290px" ><b>Actualizati / Stergeti (RASPUNSUL)</b></th></tr>';
                while ($table_data = mysqli_fetch_array($result_raspunsuri, MYSQLI_ASSOC)) {
                    $id_user = $table_data['id_util'];
                    $sql_getUser = "SELECT username FROM users WHERE id=$id_user";   
                    $result_getUser = mysqli_query($con, $sql_getUser);
                    $table_data_users = mysqli_fetch_array($result_getUser, MYSQLI_ASSOC);

                    $id_top = $table_data['id_topic'];
                    $sql_gettop = "SELECT name FROM judete WHERE id=$id_top";   
                    $result_gettop = mysqli_query($con, $sql_gettop);
                    $table_data_top = mysqli_fetch_array($result_gettop, MYSQLI_ASSOC);

                    echo "<tr>";
                    echo '<td>' . $table_data_users['username'] . '</td>';
                    echo '<td>' . $table_data_top['name'] . '</td>';
                    echo '<td>' . $table_data['raspuns'] . '</td>';
                    echo '<td>' . $table_data['data'] . '</td>';
                    echo "<td>";
                    echo '<a href= "edit.php?top=' . $table_data_top['name'] . '&table=raspuns&id_rasp=' . $table_data['id'] . '"><i class="far fa-edit"></i></a> / <a href= "delete.php?top=' . $table_data_top['name'] . '&table=raspuns&id_rasp=' . $table_data['id'] . '"><i class="far fa-trash-alt"></i></a>';
                    echo "</td></tr>";
                }
                echo "</table>";    
            }
        }
        
    ?>

    <?php include('footer.php') ?>
</body>

</html>