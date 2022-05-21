<html>
<head>
    <link rel="stylesheet" href="css/foundation.css" />
    <link rel="stylesheet" href="css/app.css" />
    <link rel="stylesheet" href="css/styleAuth.css" />
    <style>
        body {
            background-color: rgb(255, 255, 255);
            background-color: rgb(255, 255, 255);
            display: flex;
            justify-content: center;
            flex-direction: column;
            align-items: center;
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
        .top-bar{
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
            
    </style>
</head>

<body>

    <?php

        include 'auth.php';
        include 'db.php';
        include 'header-user.php';
        if(isset($_REQUEST['numTOPIC'])&& $_REQUEST["numTOPIC"] != ""){
               
            //echo $_SESSION['username'];
            //echo '</br>';
            //echo $_GET['id'];
            //echo '</br>';
            // id_topic / id_utilizator / raspunsul
            $k = $_SESSION['username'];
            $sql2 = "SELECT id FROM users WHERE username = '$k'";   
            $result2 = mysqli_query($con, $sql2);
            $myrow2 = mysqli_fetch_array($result2, MYSQLI_ASSOC);
            //echo '</br>';
            //echo $myrow2['id']; 
            $id_util = $myrow2['id']; // id utilizator

            $num_jud = $_GET['id'];
            $sql3 = "SELECT id FROM judete WHERE name = '$num_jud'";   
            $result3 = mysqli_query($con, $sql3);
            $myrow3 = mysqli_fetch_array($result3, MYSQLI_ASSOC);
           // echo '</br>';
            //echo $myrow3['id'];
            $id_jud = $myrow3['id']; // id topic
                
            $numTOP = stripslashes($_REQUEST['numTOPIC']); 
            $numTOP = mysqli_real_escape_string($con,$numTOP);

            $com = stripslashes($_REQUEST['comment']); 
            $com = mysqli_real_escape_string($con,$com); 
            //echo $comentariu;
            $trn_date = date("Y-m-d H:i:s");
            $query = "INSERT into `topic` (id_jud, id_util, numetopic ,descriere, data) VALUES ('$id_jud', '$id_util', '$numTOP', '$com' ,'$trn_date')";
            $result = mysqli_query($con,$query);
            $i = $_GET['id'];
            //$p = $_GET['pg'];

            //header("Location: topicDeschis.php?id=" . $i . "&pg=" . $p . "");
            //exit();
            if (empty($_GET['pg'])) {
                echo "<script>window.location.href='topic.php?id=".$i."';</script>";
                exit();
            }
            else {
                $pg = $_GET['pg'];
                echo "<script>window.location.href='topic.php?id=".$i."&pg=" . $pg . "';</script>";
                exit();

            }

        
        }
        else {
            
            
        }



        $start = 0;
        $limit = 7;
        $pg = 1;
        if (isset($_GET['pg'])) {
            $pg = $_GET['pg'];
        }
        else {
        $pg = 1;
        }

        $start = (intval($pg) - 1) * $limit;

        $k = $_GET['id'];
        $sql1 = "SELECT id FROM judete WHERE name='$k'";   
        $result1 = mysqli_query($con, $sql1);
        $myrow1 = mysqli_fetch_array($result1, MYSQLI_ASSOC);

        $k = $myrow1['id'];
        $sql = "SELECT * FROM topic WHERE id_jud = '$k' LIMIT $start, $limit";   
        $result = mysqli_query($con, $sql);


        if (!$result)
            die('Invalid querry:' . mysqli_error($con));
        else {

            echo "<table id = \"customers\">";
            echo "<tr><th><b>Utilizator</b></th><th><b>Topic</b></th><th><b>Motiv</b></th><th><b>Data</b></th></tr>";
            while ($myrow = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
            

                $k = $myrow['id_util'];
                $sql1 = "SELECT username FROM users WHERE id=$k";   
                $result1 = mysqli_query($con, $sql1);
                $myrow1 = mysqli_fetch_array($result1, MYSQLI_ASSOC);

                echo "<tr>";
                echo '<td>' . $myrow1['username'] . '</td>';
                echo '<td><h3><a href="topicDeschis.php?id=' . $myrow['numetopic'] . '">' . $myrow['numetopic'] . '</a><h3></td>';
                echo '<td>' . $myrow['descriere'] . '</td>';
                echo '<td>' . $myrow['data'] . '</td>';
                echo "</tr>";
            }
            echo "</table>";

            $rows = mysqli_num_rows(mysqli_query($con, "SELECT * FROM topic WHERE id_jud = '$k'"));
            $total = ceil($rows / $limit);
            echo "<div class='container'>";
            echo "<ul class='pagination'>";
            for ($i = 1; $i <= $total; $i++) {
                if ($i == $pg) {
                    echo "<li><a href='topic.php?id=" . $_GET['id'] . "&pg=" . $i . "'>" . $i . "</a></li>";
                } else {
                    echo "<li><a href='topic.php?id=" . $_GET['id'] . "&pg=" . $i . "'>" . $i . "</a></li>";
                }
            }
            echo "</ul>";
            echo "</div>";
            if($pg ==$total ) {
                echo '<div class = "adb">';
                    echo ' <form id="topicForm" action="" method="post">';
                        echo '<label for="fname">Introduceti numele topicului</label>';
                        echo ' <input type="text" id="fname" name="numTOPIC" value="">';
                        echo ' <label for="fname">Introduceti un comentariu</label>';
                        echo '<textarea name="comment" form="topicForm"></textarea>';
                        echo '<input type="submit" name="submit" value="Adauga un topic" />';
                    echo '</form>';
                echo '</div>';
            }
            else if( ($pg == 1 and $total == 1) or $total == 0 ) {
                echo '<div class = "adb">';
                    echo ' <form id="topicForm" action="" method="post">';
                        echo '<label for="fname">Introduceti numele topicului</label>';
                        echo ' <input type="text" id="fname" name="numTOPIC" value="">';
                        echo ' <label for="fname">Introduceti un comentariu</label>';
                        echo '<textarea name="comment" form="topicForm"></textarea>';
                        echo '<input type="submit" name="submit" value="Adauga un topic" />';
                    echo '</form>';
                echo '</div>';
            }
           
            include('footer.php');
        }
    ?>
    
</body>
</html>