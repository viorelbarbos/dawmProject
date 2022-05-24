<html>
  <link rel="stylesheet" href="css/foundation.css" />
  <link rel="stylesheet" href="css/app.css" />
  <link rel="stylesheet" href="css/app.css" />
  <link rel="stylesheet" href="css/styleAuth.css" />
  <style>

    body {
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

    a {
        color: white;
    }

    a:hover {
        color: black;
    }

    .top-bar{
        width:100%;
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


        form{
            width: 50%;
            display: flex;
            flex-direction: column;
            align-items: center;
        }
        form textarea {
            width: 500px;
            height: 100px;
        }
        .container {
            width: 100%;
            display: flex;
            justify-content: start;
            flex-direction: column;
            align-items: flex-start;
        }
    
       

        
  </style>

    <body>
        
        <?php
            include 'auth.php';
            include 'db.php';
            include 'header-user.php';
            if (isset($_REQUEST['comment'])&& $_REQUEST["comment"] != ""){
               
                //echo $_SESSION['username'];
                //echo '</br>';
                //echo $_GET['id'];
                //echo '</br>';
                // id_topic / id_utilizator / raspunsul
                $user_name = $_SESSION['username'];
                $sql_users = "SELECT id FROM users WHERE username = '$user_name'";   
                $result_users = mysqli_query($con, $sql_users);
                $table_data_users = mysqli_fetch_array($result_users, MYSQLI_ASSOC);
                //echo '</br>';
                //echo $myrow2['id']; 
                $id_util = $table_data_users['id']; // id utilizator

                $num_top = $_GET['top'];
                $sql_topic = "SELECT id FROM topic WHERE numetopic = '$num_top'";   
                $result_topic = mysqli_query($con, $sql_topic);
                $table_data_topic = mysqli_fetch_array($result_topic, MYSQLI_ASSOC);
               // echo '</br>';
                //echo $myrow3['id'];
                $id_top = $table_data_topic['id']; // id topic
                    
                $comentariu = stripslashes($_REQUEST['comment']); 
		        $comentariu = mysqli_real_escape_string($con,$comentariu);
                //echo $comentariu;
                $trn_date = date("Y-m-d H:i:s");
                $query = "INSERT into `raspunsuri` (id_topic, id_util, raspuns, data) VALUES ('$id_top', '$id_util', '$comentariu', '$trn_date')";
                $result = mysqli_query($con,$query);
                $i = $_GET['top'];
                //$p = $_GET['pg'];

                //header("Location: topicDeschis.php?id=" . $i . "&pg=" . $p . "");
                //exit();
                if (empty($_GET['pg'])) {
                echo '<script>window.location.href="topicDeschis.php?jud=' .$_GET['jud'] . '&top=' . $_GET['top'] .'";</script>';
                exit();
                }
                else {
                    $pg = $_GET['pg'];
                    echo '<script>window.location.href="topicDeschis.php?jud=' .$_GET['jud'] . '&top=' . $_GET['top'] .'&pg=' . $pg . '";</script>';
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

            $k = $_GET['top'];
            //echo $k;
            $sql_topicId = "SELECT id FROM topic WHERE numetopic='$k'";   
            $result_topicId = mysqli_query($con, $sql_topicId);
            $table_data_topicId = mysqli_fetch_array($result_topicId, MYSQLI_ASSOC);

            $k_id_topic = $table_data_topicId['id']; // id topic
            $sql_raspunsuri = "SELECT * FROM raspunsuri WHERE id_topic = '$k_id_topic' LIMIT $start, $limit";   
            $result_raspunsuri = mysqli_query($con, $sql_raspunsuri);
            
            

            if (!$result_raspunsuri)
                die('Invalid querry:' . mysqli_error($con));
            else {

                echo "<table id = \"customers\">";
                echo "<tr><td class = 'table-head' colspan='3'><a href='category.php'><b>Categorii</b> </a>/ <a href='topic.php?jud=" .$_GET['jud'] . "'><b>".$_GET['jud']."</b> </a>/ <b>".$_GET['top']."</b></td></tr>";
                echo "<tr><th><b>Utilizator</b></th><th><b>Raspuns</b></th><th><b>Data</b></th></tr>";
                while ($table_data_raspunsuri = mysqli_fetch_array($result_raspunsuri, MYSQLI_ASSOC)) {
                    
                    $k = $table_data_raspunsuri['id_util'];
                    $sql_getuserID = "SELECT username FROM users WHERE id=$k";   
                    $result_getuserID = mysqli_query($con, $sql_getuserID);
                    $table_data_userID = mysqli_fetch_array($result_getuserID, MYSQLI_ASSOC);

                    echo "<tr>";
                    echo '<td>' . $table_data_userID['username'] . '</td>';
                    echo '<td>' . $table_data_raspunsuri['raspuns'] . '</td>';
                    echo '<td>' . $table_data_raspunsuri['data'] . '</td>';
                    echo "</tr>";
                }
                echo "</table>";

                $rows = mysqli_num_rows(mysqli_query($con, "SELECT * FROM raspunsuri WHERE id_topic = '$k_id_topic'"));
                $total = ceil($rows / $limit);
                echo "<div class='container'>";
                echo "<ul class='pagination'>";
                for ($i = 1; $i <= $total; $i++) {
                    if ($i == $pg) {
                        echo "<li><a href='topicDeschis.php?jud=" .$_GET['jud'] . "&top=" . $_GET['top'] ."&pg=" . $i . "'>" . $i . "</a></li>";
                    } else {
                        echo "<li><a href='topicDeschis.php?jud=" .$_GET['jud'] . "&top=" . $_GET['top'] ."&pg=" . $i . "'>" . $i . "</a></li>";
                    }
                }
                echo "</ul>";
                echo "</div>";
                if($pg ==$total ) {
                    echo '<div class = "adb">';
                        echo "<p>Adauga un raspuns</p>";
                        echo '<form id="usrform1" action="" method="post">';
                            echo '<textarea name="comment" form="usrform1"></textarea>';
                            echo '<div class="submit-warpper">';
                                echo '<input type="submit" name="submit" value="Adauga raspuns" />';
                            echo '</div>';
                        echo '</form>';
                    echo '</div>';
                }
                else if(($pg == 1 and $total == 1) or $total == 0 ) {
                    echo '<div class = "adb">';
                        echo "<p>Adauga un raspuns</p>";
                        echo '<form id="usrform1" action="" method="post">';
                            echo '<textarea name="comment" form="usrform1"></textarea>';
                            echo '<div class="submit-warpper">';
                                echo '<input type="submit" name="submit" value="Adauga raspuns" />';
                            echo '</div>';
                        echo '</form>';
                    echo '</div>';
                }
            }

            
           
            
            include('footer.php');
        ?>
    <script src="js/vendor/jquery.js"></script>
    <script src="js/vendor/what-input.js"></script>
    <script src="js/vendor/foundation.js"></script>
    <script src="js/app.js"></script>
    </body>
</html>