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
            $user_name = $_SESSION['username'];
            $sql_getid = "SELECT id FROM users WHERE username = '$user_name'";   
            $result_getid = mysqli_query($con, $sql_getid);
            $table_data = mysqli_fetch_array($result_getid, MYSQLI_ASSOC);
            //echo '</br>';
            //echo $myrow2['id']; 
            $id_util = $table_data['id']; // id utilizator

            $num_jud = $_GET['jud'];
            $sql_getid_jud = "SELECT id FROM judete WHERE name = '$num_jud'";   
            $result_getidjud = mysqli_query($con, $sql_getid_jud);
            $table_data = mysqli_fetch_array($result_getidjud, MYSQLI_ASSOC);
            // echo '</br>';
            //echo $myrow3['id'];
            $id_jud = $table_data['id']; // id topic
                
            $numTOP = stripslashes($_REQUEST['numTOPIC']); 
            $numTOP = mysqli_real_escape_string($con,$numTOP);

            $com = stripslashes($_REQUEST['comment']); 
            $com = mysqli_real_escape_string($con,$com); 
            //echo $comentariu;
            $trn_date = date("Y-m-d H:i:s");
            $query = "INSERT into `topic` (id_jud, id_util, numetopic ,descriere, data) VALUES ('$id_jud', '$id_util', '$numTOP', '$com' ,'$trn_date')";
            $result = mysqli_query($con,$query);
            $i = $_GET['jud'];
            //$p = $_GET['pg'];

            //header("Location: topicDeschis.php?id=" . $i . "&pg=" . $p . "");
            //exit();
            if (empty($_GET['pg'])) {
                echo "<script>window.location.href='topic.php?jud=".$i."';</script>";
                exit();
            }
            else {
                $pg = $_GET['pg'];
                echo "<script>window.location.href='topic.php?jud=".$i."&pg=" . $pg . "';</script>";
                exit();

            }

        
        }
        else {
            
            
        }



        $start = 0;
        $limit = 5;
        $pg = 1;
        if (isset($_GET['pg'])) {
            $pg = $_GET['pg'];
        }
        else {
        $pg = 1;
        }

        $start = (intval($pg) - 1) * $limit;

        $name_jud = $_GET['jud'];
        $sql_getidjud = "SELECT id FROM judete WHERE name='$name_jud'";   
        $result_getidjud = mysqli_query($con, $sql_getidjud);
        $table_data = mysqli_fetch_array($result_getidjud, MYSQLI_ASSOC);

        $jud_id = $table_data['id'];
        $sql_dataTopic = "SELECT * FROM topic WHERE id_jud = '$jud_id' LIMIT $start, $limit";   
        $result_dataTopic = mysqli_query($con, $sql_dataTopic);


        if (!$result_dataTopic)
            die('Invalid querry:' . mysqli_error($con));
        else {

            echo "<table id = \"customers\">";
            echo "<tr><td class = 'table-head' colspan='4'><a href='category.php'><b>Categorii</b> </a>/ <b>".$_GET['jud']."</b></td></tr>";
            echo "<tr><th><b>Utilizator</b></th><th><b>Topic</b></th><th><b>Motiv</b></th><th><b>Data</b></th></tr>";
            while ($table_data = mysqli_fetch_array($result_dataTopic, MYSQLI_ASSOC)) {
            

                $id_user = $table_data['id_util'];
                $sql_getUser = "SELECT username FROM users WHERE id=$id_user";   
                $result_getUser = mysqli_query($con, $sql_getUser);
                $table_data_users = mysqli_fetch_array($result_getUser, MYSQLI_ASSOC);

                echo "<tr>";
                echo '<td>' . $table_data_users['username'] . '</td>';
                echo '<td><h3><a href="topicDeschis.php?jud=' .$_GET['jud'] . '&top=' . $table_data['numetopic'] .'">' . $table_data['numetopic'] . '</a><h3></td>';
                echo '<td>' . $table_data['descriere'] . '</td>';
                echo '<td>' . $table_data['data'] . '</td>';
                echo "</tr>";
            }
            echo "</table>";

            $rows = mysqli_num_rows(mysqli_query($con, "SELECT * FROM topic WHERE id_jud = '$jud_id'"));
            $total = ceil($rows / $limit);
            echo "<div class='container'>";
            echo "<ul class='pagination'>";
            for ($i = 1; $i <= $total; $i++) {
                if ($i == $pg) {
                    echo "<li><a href='topic.php?jud=" . $_GET['jud'] . "&pg=" . $i . "'>" . $i . "</a></li>";
                } else {
                    echo "<li><a href='topic.php?jud=" . $_GET['jud'] . "&pg=" . $i . "'>" . $i . "</a></li>";
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