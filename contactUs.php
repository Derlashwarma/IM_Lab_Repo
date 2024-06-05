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
        <link rel="stylesheet" href="css/css/bootstrap.min.css">
        <link rel="stylesheet" href="css/main_page.css">
        <link rel="stylesheet" type="text/css" href="style.css" />
        <link rel="shortcut icon" type="image/x-icon" href="logo.png" />
        <title>Contact Us</title>
    </head>


    <body>
        <div class="top">
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

        </div>
        <div class="main-page-container container">
            <div class="news-feed-container row">
            <div class="navigation bg-body shadow mb-3 rounded-4">
                <div class="nav-buttons h-100">
                    <ul class="list-inline pt-3 page-list h-100">
                        <li class="list-inline-item"><a class="link-underline link-underline-opacity-0" href="main_page.php?username=<?php echo($username) ?>&acctid=<?php echo($_GET['acctid']); ?>&is_auction=0">Main Page</a></li>
                        <li class="list-inline-item "><a class="link-underline link-underline-opacity-0" href="auction.php?username=<?php echo($username) ?>&acctid=<?php echo($_GET['acctid']); ?>&is_auction=1">Auction</a></li>
                        <li class="list-inline-item "><a class="link-underline link-underline-opacity-0" href="aboutUs.php?username=<?php echo($username) ?>&acctid=<?php echo($_GET['acctid']); ?>">About Us</a></li>
                        <li class="list-inline-item "><a class="link-underline link-underline-opacity-0 text-dark" href="contactUs.php?username=<?php echo($username) ?>&acctid=<?php echo($_GET['acctid']); ?>">Contact Us</a></li>
                        <?php 
                            if ($isAdmin) {
                                echo "<li class='list-inline-item'><a class='link-underline link-underline-opacity-0' href='admin.php?username=$username&acctid={$_GET['acctid']}'>Admin</a></li>";
                            }
                        ?>
                    </ul>
                </div>
            </div>
                
        <div class = "container-sm">
            <section>
                <div class = "container-sm section">
                    
                    <div class="content">
                        <h1 class = "text-center">
                            Contact Us
                            <hr>
                        </h1>

                        <div class="row section text-center">
                            <div class = "container-sm text-center">
                                <h2>
                                    Our Founders
                                    
                                </h2>
                            </div>
                            <div class = "col">
                                <img class="rounded-2 shadow" src = "images/aboutus_images/321843999_1419304938476046_3449919537388413017_n.jpg" width = "150px" height = "150px">
                                <h3>
                                    Ardel Tioco Jeff Lauron
                                </h3>
                                <p>
                                    Local:<br> 09XX-XXX-XXXX <br>
                                    Email:<br> wheeldeal@hotmail.com <br>
                                </p>
                               
                            </div>
                            
                            <div class="col">
                                <img class="rounded-2 shadow" src = "images/aboutus_images/340355177_610391547315036_1817999744723573405_n.jpg" width = "150px" height = "150px">
                                <h3>
                                    Russell Palma
                                </h3>
                                <p>
                                    Local:<br> 09XX-XXX-XXXX <br>
                                    Email:<br> wheeldeal@hotmail.com <br>
                                </p>
                                
                            </div>

                            
                        </div>

                        <hr>

                        <div class="row section">
                            <div class = "col text-center">
                                <h2>
                                    By Phone and Email
                                </h2>
                                <p>
                                    Local:<br> 09XX-XXX-XXXX <br>
                                    International:<br> +1-212-456-7890 <br>
                                    Email:<br> wheeldeal@hotmail.com <br>
                                </p>
                                <div>
                                    <button type="button" class="btn btn-primary">Email</button>
                                </div>
                            </div>
                            
                            <div class="col text-center">
                                <h2>
                                    Live Chat
                                </h2>
                                <p>
                                    Our live chat feature allows you to chat with a member of our support team in real-time.
                                </p>
                                <div>
                                    <button type="button" class="btn btn-primary">Chat</button>
                                </div>
                            </div>

                            <div class="col text-center">
                                <h2>
                                    By Our Social Media
                                </h2>
                                
                                <div>
                                    <!-- <button type="button" class="btn btn-primary">Facebook</button> -->
                                    <a href="https://www.facebook.com/ArdelJeff.Lauron"> 
                                        <svg xmlns="http://www.w3.org/2000/svg" width="50" height="50" fill="currentColor" class="bi bi-facebook" viewBox="0 0 16 16">
                                        <path d="M16 8.049c0-4.446-3.582-8.05-8-8.05C3.58 0-.002 3.603-.002 8.05c0 4.017 2.926 7.347 6.75 7.951v-5.625h-2.03V8.05H6.75V6.275c0-2.017 1.195-3.131 3.022-3.131.876 0 1.791.157 1.791.157v1.98h-1.009c-.993 0-1.303.621-1.303 1.258v1.51h2.218l-.354 2.326H9.25V16c3.824-.604 6.75-3.934 6.75-7.951"/>
                                        </svg></a>
                                </div>
                                <br>
                                <div>
                                    <!-- <button type="button" class="btn btn-primary">Twitter</button> -->
                                    <a href="https://twitter.com/ShouldHaveCat"> 
                                        <svg xmlns="http://www.w3.org/2000/svg" width="50" height="50" fill="currentColor" class="bi bi-twitter-x" viewBox="0 0 16 16">
                                        <path d="M12.6.75h2.454l-5.36 6.142L16 15.25h-4.937l-3.867-5.07-4.425 5.07H.316l5.733-6.57L0 .75h5.063l3.495 4.633L12.601.75Zm-.86 13.028h1.36L4.323 2.145H2.865z"/>
                                        </svg>
                                    </a>
                                </div>
                                <br>
                                <div>
                                    <!-- <button type="button" class="btn btn-primary">Instagram</button> -->
                                    <a href="https://www.instagram.com/lambofpax">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="50" height="50" fill="currentColor" class="bi bi-instagram" viewBox="0 0 16 16">
                                        <path d="M8 0C5.829 0 5.556.01 4.703.048 3.85.088 3.269.222 2.76.42a3.9 3.9 0 0 0-1.417.923A3.9 3.9 0 0 0 .42 2.76C.222 3.268.087 3.85.048 4.7.01 5.555 0 5.827 0 8.001c0 2.172.01 2.444.048 3.297.04.852.174 1.433.372 1.942.205.526.478.972.923 1.417.444.445.89.719 1.416.923.51.198 1.09.333 1.942.372C5.555 15.99 5.827 16 8 16s2.444-.01 3.298-.048c.851-.04 1.434-.174 1.943-.372a3.9 3.9 0 0 0 1.416-.923c.445-.445.718-.891.923-1.417.197-.509.332-1.09.372-1.942C15.99 10.445 16 10.173 16 8s-.01-2.445-.048-3.299c-.04-.851-.175-1.433-.372-1.941a3.9 3.9 0 0 0-.923-1.417A3.9 3.9 0 0 0 13.24.42c-.51-.198-1.092-.333-1.943-.372C10.443.01 10.172 0 7.998 0zm-.717 1.442h.718c2.136 0 2.389.007 3.232.046.78.035 1.204.166 1.486.275.373.145.64.319.92.599s.453.546.598.92c.11.281.24.705.275 1.485.039.843.047 1.096.047 3.231s-.008 2.389-.047 3.232c-.035.78-.166 1.203-.275 1.485a2.5 2.5 0 0 1-.599.919c-.28.28-.546.453-.92.598-.28.11-.704.24-1.485.276-.843.038-1.096.047-3.232.047s-2.39-.009-3.233-.047c-.78-.036-1.203-.166-1.485-.276a2.5 2.5 0 0 1-.92-.598 2.5 2.5 0 0 1-.6-.92c-.109-.281-.24-.705-.275-1.485-.038-.843-.046-1.096-.046-3.233s.008-2.388.046-3.231c.036-.78.166-1.204.276-1.486.145-.373.319-.64.599-.92s.546-.453.92-.598c.282-.11.705-.24 1.485-.276.738-.034 1.024-.044 2.515-.045zm4.988 1.328a.96.96 0 1 0 0 1.92.96.96 0 0 0 0-1.92m-4.27 1.122a4.109 4.109 0 1 0 0 8.217 4.109 4.109 0 0 0 0-8.217m0 1.441a2.667 2.667 0 1 1 0 5.334 2.667 2.667 0 0 1 0-5.334"/>
                                        </svg>
                                    </a>
                                </div>

                            
                            </div>
                            
                        </div>

                    </div>

                </div>
            </section>
            
        </div>
            </div>
        <div>
            <br>
            <br>
            <br>

        </div>
        </div>
    </body>

    <footer class = "text-center">
        <p>Author: Russell Joshua Palma</p>
        <p>BSCS - 2 | F2</p>
    </footer>

</html>