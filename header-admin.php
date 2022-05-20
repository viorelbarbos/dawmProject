<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

<div class="top-bar" id="responsive-menu">
        <div class="top-bar-left">
            <ul class="dropdown menu" data-dropdown-menu>
                <li class="menu-text">Welcome <?php echo $_SESSION['username']; ?>!</li>
                <li><a href="#0">Admin panel</a></li>
                <li><a href="category.php">Forum</a></li>
                <li class="right"><a href="logout.php">Log out</a></li>
            </ul>
        </div>
        <div class="wrap">
            <div class="search">
            <form id="usrform" action="" method="post">
                <button name ="cauta" type="submit" class="searchButton"><i class="fa fa-search"></i></button>
                <input name = "cautare" type="text" class="searchTerm" placeholder="What are you looking for?">
            </form>
            </div>
        </div>
    </div>


    <?php
    include 'red.php';
    if(isset($_REQUEST['cautare']) and $_REQUEST['cautare'] !="") {
        $k = $_REQUEST['cautare'];
        $sql = "SELECT id FROM judete WHERE name='$k'";   
        $result = mysqli_query($con, $sql);
        $row_cnt = mysqli_num_rows($result);
        if($row_cnt == 1) {
            redirect('topic.php?id='.$k.'');
        }
        else {

        }
    }
    else {

    }
?>