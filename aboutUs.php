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
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
        <link rel="stylesheet" type="text/css" href="css/style.css" />
        <link rel="stylesheet" href="css/main_page.css">
    <link rel="shortcut icon" type="image/x-icon" href="logo.png" />
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
        <title>About Us</title>
    </head>


    <body>
        <div class="nav shadow floating-nav rounded-4 navbar navbar-expand-lg navbar-light bg-light mb-3">
            <div class="container element-container">
                <div class="name-container p-2 text-center">
                    <h3>
                        <?php
                            echo($username);
                        ?>
                    </h3>
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
                        <li class="list-inline-item"><a class="link-underline link-underline-opacity-0" href="main_page.php?username=<?php echo($username) ?>&acctid=<?php echo($_GET['acctid']); ?>&is_auction=0">Main Page</a></li>
                        <li class="list-inline-item "><a class="link-underline link-underline-opacity-0" href="auction.php?username=<?php echo($username) ?>&acctid=<?php echo($_GET['acctid']); ?>&is_auction=1">Auction</a></li>
                        <li class="list-inline-item "><a class="text-dark link-underline link-underline-opacity-0" href="aboutUs.php?username=<?php echo($username) ?>&acctid=<?php echo($_GET['acctid']); ?>">About Us</a></li>
                        <li class="list-inline-item "><a class="link-underline link-underline-opacity-0" href="contactUs.php?username=<?php echo($username) ?>&acctid=<?php echo($_GET['acctid']); ?>">Contact Us</a></li>
                        <?php 
                            if ($isAdmin) {
                                echo "<li class='list-inline-item'><a class='link-underline link-underline-opacity-0' href='admin.php?username=$username&acctid={$_GET['acctid']}'>Admin</a></li>";
                            }
                        ?>
                    </ul>
                </div>
            </div>

            <div class = "container bg-body rounded-4 shadow p-4 mb-3" >
            <h1>
                About Us
            </h1>
            <p>
                Welcome to WheelDeal, your premier destination for car enthusiasts and
                buyers seeking a seamless fusion of social networking and automotive
                marketplace excellence. At WheelDeal, we're driven by a shared passion
                for cars and a commitment to providing a comprehensive platform tailored
                exclusively for automotive aficionados like you.
            </p>
        </div>

        <div class = "container bg-body rounded-4 shadow p-4 mb-3" >
            <h2>
                Our Mission:
            </h2>
            <p>
                WheelDeal is on a mission to redefine the way car enthusiasts interact,
                share, and shop for their dream vehicles. Our goal is simple: to create
                a dynamic online community where individuals can connect, engage, and
                transact with confidence, all while celebrating their love for automobiles.
            </p>
        </div>

        <div class = "container bg-body rounded-4 shadow p-4 mb-3" >
            <h2>
                What Sets Us Apart:
            </h2>
            <p>
                WheelDeal is on a mission to redefine the way car enthusiasts interact,
                share, and shop for their dream vehicles. Our goal is simple: to create
                a dynamic online community where individuals can connect, engage, and
                transact with confidence, all while celebrating their love for automobiles.
            </p>
        </div>

        <div class = "container bg-body rounded-4 shadow p-4 mb-3" >
            <h2>
                Features:
            </h2>

            <h3>
                Social Networking:
            </h3>
            <p>
                Connect with like-minded car enthusiasts from across the globe. Share photos, videos, and stories of your automotive adventures, and join discussions on topics ranging from classic cars to cutting-edge automotive technology.
            </p>

            <h3>
                Marketplace:
            </h3>
            <p>
                Explore an extensive selection of cars for sale from reputable sellers. Whether you're in the market for a vintage classic, a sleek sedan, or a high-performance supercar, WheelDeal's marketplace offers a diverse range of options to suit every taste and budget.
            </p>

            <h3>
                Community Forums: (WIP)
            </h3>
            <p>
                Engage in lively discussions and exchange valuable insights with fellow enthusiasts on our community forums. From DIY maintenance tips to discussions on the latest automotive trends, WheelDeal's forums provide a wealth of knowledge and camaraderie for all members.
            </p>

            <h3>
                Expert Insights: (WIP)
            </h3>
            <p>
                Stay informed with expert reviews, insights, and industry news from trusted sources. Whether you're researching your next purchase or simply staying up-to-date with the latest automotive developments, WheelDeal ensures you're always in the driver's seat.
            </p>

            <h3>
                Private Messaging System: (WIP)
            </h3>
            <p>
                Enjoy seamless communication with other members through our private messaging system. Whether you're negotiating a deal, seeking advice, or simply connecting with fellow enthusiasts, our secure messaging platform ensures privacy and convenience.
            </p>

        </div>

        <div class = "container bg-body rounded-4 shadow p-4 mb-3" >
            <h2>
                Join the WheelDeal Community
            </h2>
            <p>
                Whether you're a seasoned enthusiast or just embarking on your journey into the world of cars, WheelDeal invites you to join our vibrant community. Experience the thrill of connecting, sharing, and discovering your passion for automobiles like never before.
            </p>
        </div>

        <div class = "container bg-body rounded-4 shadow p-4 mb-3" >
            <h1>
                WheelDeal
            </h1>
            <h2>
                Where Every Mile Tells a Story.
            </h2>
        </div>


        </div>
    </div>
    </body>

    <footer>
        <p>Author: Russell Joshua Palma</p>
        <p>BSCS - 2 | F2</p>
    </footer>

</html>