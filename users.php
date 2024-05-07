<?php
    require 'connect.php';
    session_start();
    $username = $_GET["username"];
    
    $checkIfAdminQuery = "SELECT * FROM tbluseraccount WHERE username = ? AND is_admin = 1";
    $checkIfAdmin = $conn->prepare($checkIfAdminQuery);
    $checkIfAdmin->bind_param("s",$username);
    $checkIfAdmin->execute();
    $result = $checkIfAdmin->get_result()->fetch_assoc();
    $isAdmin = null;
    if($result){
        $isAdmin = $result["is_admin"];
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/main_page.css">
    <link rel="stylesheet" href="css/like_btn.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="shortcut icon" type="image/x-icon" href="logo.png" />
    <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/main_page.css">
    <title>WHEEL DEAL</title>
    <style>
        input[type="file"] {
        color: transparent;
    }
    </style>
</head>
<body>
    <div class="nav shadow floating-nav rounded-4 navbar navbar-expand-lg navbar-light bg-light mb-3">
        <div class="container element-container">
            <div class="name-container p-2 text-center">
                <h1>
                    <?php
                        echo($username);
                    ?>
                </h1>
            </div>
            
        </div>
        <div class="utility-buttons">
                <ul class="list-inline">
                    <li class="list-inline-item"><a href="logout.php" class="link-underline link-underline-opacity-0" id="logout-btn">logout</a></li>
                </ul>
            </div>
    </div>
    <div class="main-page-container container">
        <div class="news-feed-container row">
            <div class="navigation bg-body shadow mb-3 rounded-4">
                <div class="nav-buttons h-100">
                    <ul class="list-inline pt-3 page-list h-100">
                        <li class="list-inline-item "><a class="link-underline link-underline-opacity-0" href="main_page.php?username=<?php echo($username) ?>&acctid=<?php echo($_GET['acctid']); ?>&is_auction=0">Main Page</a></li>
                        <li class="list-inline-item "><a class="link-underline link-underline-opacity-0" href="auction.php?username=<?php echo($username) ?>&acctid=<?php echo($_GET['acctid']); ?>&is_auction=1">Auction</a></li>
                        <li class="list-inline-item "><a class="link-underline link-underline-opacity-0" href="aboutUs.php?username=<?php echo($username) ?>&acctid=<?php echo($_GET['acctid']); ?>">About Us</a></li>
                        <li class="list-inline-item "><a class="link-underline link-underline-opacity-0" href="contactUs.php?username=<?php echo($username) ?>&acctid=<?php echo($_GET['acctid']); ?>">Contact Us</a></li>
                        <?php 
                            if ($isAdmin) {
                                echo "<li class='list-inline-item'><a class='link-underline link-underline-opacity-0 text-dark' href='users.php?username=$username&acctid={$_GET['acctid']}'>Users</a></li>";
                                echo 
                                "<li class='list-inline-item'>
                                <a class='link-underline link-underline-opacity-0' href='dashboard.php?username=$username&acctid={$_GET['acctid']}'>Dashboard</a>
                                </li>";
                            }
                        ?>
                    </ul>
                </div>
            </div>
            <div class="container bg-body rounded-4 shadow-lg table">
                <h3 class="pt-3 text-center col-md-12">Active Users</h3>
                <hr>  
                    <table class="table">
                        <tr>
                            <th>Account ID</th>
                            <th>Username</th>
                            <th>Active Status</th>
                            <th>Operation</th>
                        </tr>
                        <?php
                            include 'includes/display_users.php';
                        ?>
                    </table>
            </div>
            <div class="container bg-body rounded-4 shadow-lg table pt-3">
                <h3 class="text-center col-md-12">Not Active Users</h3>
                <hr>
                <div>
                    <table class="table">
                        <tr>
                            <th>Account ID</th>
                            <th>Username</th>
                            <th>Active Status</th>
                            <th>Operation</th>
                        </tr>   
                        <?php
                            include 'includes/display_inactiveUsers.php';
                        ?>
                    </table>
                </div>
            </div>
        </div>
    </div>
<script
  src="https://code.jquery.com/jquery-3.7.1.js"
  integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4="
  crossorigin="anonymous"></script>
</body>
</html>