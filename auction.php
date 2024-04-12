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
    $is_auction=$_GET['is_auction'];
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
    <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <link rel="shortcut icon" type="image/x-icon" href="logo.png" />
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <title>WHEEL DEAL</title>
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
                    <li class="list-inline-item"><a href="../includes/logout.php" class="link-underline link-underline-opacity-0" id="logout-btn">logout</a></li>
                </ul>
            </div>
    </div>
    <div class="main-page-container container">
        <div class="news-feed-container row">
        <div class="navigation bg-body shadow mb-3 rounded-4">
                <div class="nav-buttons h-100">
                    <ul class="list-inline pt-3 page-list h-100">
                        <li class="list-inline-item"><a class="link-underline link-underline-opacity-0" href="main_page.php?username=<?php echo($username) ?>&acctid=<?php echo($_GET['acctid']); ?>&is_auction=0">Main Page</a></li>
                        <li class="list-inline-item h-80 rounded-4 shadow"><a class="link-underline link-underline-opacity-0 text-dark" href="auction.php?username=<?php echo($username) ?>&acctid=<?php echo($_GET['acctid']); ?>&is_auction=1">Auction</a></li>
                        <li class="list-inline-item "><a class="link-underline link-underline-opacity-0" href="aboutUs.php?username=<?php echo($username) ?>&acctid=<?php echo($_GET['acctid']); ?>">About Us</a></li>
                        <li class="list-inline-item "><a class="link-underline link-underline-opacity-0" href="contactUs.php?username=<?php echo($username) ?>&acctid=<?php echo($_GET['acctid']); ?>">Contact Us</a></li>
                    </ul>
                </div>
            </div>
            <div class="upload-container mb-3 shadow bg-body  p-3 rounded-4">
            <div class="upload-form-container">
                <div class="row p-2">
                    <label for="message">Upload</label>
                    <form method="post" id="uploadForm" enctype="multipart/form-data">
                        <div class="row message-div">
                            <div class="col-3 form-group">
                                <input class="form-control form-control-lg image-input" accept=".jpg, .jpeg, .png" type="file" id="image" name="image" required>
                            </div>
                            <div class="col">
                                <textarea placeholder="Car Information" name="message" id="message" class="form-control rounded-3" cols="30" rows="1"></textarea>
                            </div>
                        </div>
                        <div class="button-div mt-3">
                            <button type="submit" class="btn btn-primary">Upload</button>
                        </div>
                    </form>
                    </div>
                </div>
            </div>
            <?php
            if(isset($_GET['username']) && isset($_GET['acctid'])) {
                include 'includes/display.php';
            }
            ?>
        </div>
    </div>
    <script>
        document.addEventListener("DOMContentLoaded", function() {
        var username = "<?php echo htmlspecialchars(urlencode($username)); ?>";
        var acctid = "<?php echo htmlspecialchars(urlencode($acctid)); ?>";
        var form = document.getElementById("uploadForm");
        form.action = "includes/upload.php?username=" + username + "&acctid=" + acctid +"&is_auction=1";
        });
</script>
<script
  src="https://code.jquery.com/jquery-3.7.1.js"
  integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4="
  crossorigin="anonymous"></script>
</body>
</html>