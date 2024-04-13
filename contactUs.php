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
        <link rel="stylesheet" type="text/css" href="style.css" />
        <title>Contact Us</title>
    </head>


    <body>
    
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
                                <img src = "images/whitePlaceholder.jpg" width = "150px" height = "150px">
                                <h3>
                                    Ardel Lauron
                                </h3>
                                <p>
                                    Local:<br> 09XX-XXX-XXXX <br>
                                    Email:<br> wheeldeal@hotmail.com <br>
                                </p>
                               
                            </div>
                            
                            <div class="col">
                                <img src = "images/blackPlaceholder.jpg" width = "150px" height = "150px">
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
                                    <a href="https://www.facebook.com/ArdelJeff.Lauron"> <img src = "images/facebookIcon.png" width = "50px" height = "50px"> </a>
                                </div>
                                <br>
                                <div>
                                    <!-- <button type="button" class="btn btn-primary">Twitter</button> -->
                                    <a href="https://twitter.com/ShouldHaveCat"> <img src = "images/twitterIcon.png" width = "50px" height = "50px"> </a>
                                </div>
                                <br>
                                <div>
                                    <!-- <button type="button" class="btn btn-primary">Instagram</button> -->
                                    <a href="https://www.instagram.com/lambofpax"> <img src = "images/instagramIcon.png" width = "50px" height = "50px"> </a>
                                </div>

                            
                            </div>
                            
                        </div>

                    </div>

                </div>
            </section>
            
        </div>
        <div>
            <br>
            <br>
            <br>

        </div>
        



    </body>

    <footer class = "text-center">
        <p>Author: Russell Joshua Palma</p>
        <p>BSCS - 2 | F2</p>
    </footer>

</html>