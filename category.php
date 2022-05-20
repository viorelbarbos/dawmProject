<html>
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

    .top-bar,
    .top-bar ul {
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
            background-color: #060a085b;
            color: #fefefe;
        }
        ul.pagination a:visited {
            background-color: red;
            color: black;
        }
        td>h3>a {
          color: black;
          font-size: 1.1rem;
        }
      
  </style>

</html>

<?php
//create_cat.php
include 'auth.php';
include 'db.php';
include 'header-user.php';

    $category =  "";



    $start = 0;
    $limit = 11;
    $id = 1;
    if (isset($_GET['id'])) {
        $id = $_GET['id'];
    }
    else {
      $id = 1;
    }
    $start = ($id - 1) * $limit;

    $sql = "SELECT * FROM judete LIMIT $start, $limit";   
    $result = mysqli_query($con, $sql);


    if (!$result)
        die('Invalid querry:' . mysqli_error($con));
    else {

        echo "<table id = \"customers\">";
        echo "<tr><th><b>Categorie</b></th><th><b>Creata la data de</b></th></tr>";
        while ($myrow = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
            echo "<tr><td>";
            echo '<h3><a href="topic.php?id=' . $myrow['name'] . '">' . $myrow['name'] . '</a><h3>';
            echo "</td>";
            echo "<td>";
            echo "18-05-2022";
            echo "</td></tr>";
        }
        echo "</table>";

        $rows = mysqli_num_rows(mysqli_query($con, "SELECT * FROM judete "));
        $total = ceil($rows / $limit);
        /*if ($id > 1) {
            echo "<a href='?id=" . ($id - 1) . "' class='links-button'>PREVIOUS </a>";
        }
        if ($id != $total) {
            echo "<a href='?id=" . ($id + 1) . "' class='links-button'> NEXT</a>";
        }*/
        echo "<div class='container'>";
        echo "<ul class='pagination'>";
        for ($i = 1; $i <= $total; $i++) {
            if ($i == $id) {
                echo "<li><a href='?id=" . $i . "'>" . $i . "</a></li>";
            } else {
                echo "<li><a href='?id=" . $i . "'>" . $i . "</a></li>";
            }
        }
        echo "</ul>";
        echo "</div>";
        include('footer.php');
    }

        


    
?>