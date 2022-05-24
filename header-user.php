<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

<style>
    .wrap form{
        width: 313px;
        justify-content: flex-end;
        display: flex;
        align-items: center;
        flex-direction: row;
    }

    .wrap{
        width:313px;
    }
    .top-bar, .top-bar ul {
        background-color: #9d0011;
    }
    
</style>
<div class="top-bar">
        <div class="top-bar-left">
            <ul class="dropdown menu" data-dropdown-menu>
                <li class="menu-text">Welcome <?php echo $_SESSION['username']; ?>!</li>
                <li><a href="index.php">Acasa</a></li>
                <li><a href="category.php">Forum</a></li>
                <li class="right"><a href="logout.php">Deconectare</a></li>
            </ul>
        </div>
        <div class="wrap">
            <div class="search">
            <form id="usrform" action="" method="post">
                <input name = "cautare" type="text" class="searchTerm" placeholder="Cauta judet ex. Maramures.">
                    <button name ="cauta" type="submit" class="searchButton"><i class="fa fa-search"></i></button>
            </form>
            </div>
        </div>
</div>

<?php
    include 'red.php';
    if(isset($_REQUEST['cautare']) and $_REQUEST['cautare'] !="") {
        $name_jud = $_REQUEST['cautare'];
        $sql_jud = "SELECT id FROM judete WHERE name='$name_jud'";   
        $result_jud = mysqli_query($con, $sql_jud);
        $row_cnt = mysqli_num_rows($result_jud);
        if($row_cnt == 1) {
            redirect('topic.php?jud='.$name_jud.'');
        }
        else {

        }
    }
    else {

    }
?>