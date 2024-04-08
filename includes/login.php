<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];

    if (!$conn) {
        $_SESSION['error'] = "Connection failed.";
        echo("No COnnection");
        exit();
    }

    $check_username = "SELECT * FROM tbluseraccount WHERE username=?";
    $stmt_check_username = $conn->prepare($check_username);
    $stmt_check_username->bind_param("s", $username);
    $stmt_check_username->execute();
    $res = $stmt_check_username->get_result();

    if ($res->num_rows == 0) {
        $_SESSION["error"] = "No user found.";
    } else {
        $user = $res->fetch_assoc();
        $stored_pass = $user['password']; 
        if (password_verify($password,$stored_pass)) {
            $_SESSION["username"] = $username;
            $_SESSION["acctid"] = $user["acctid"];
            header("Location:  main_page.php?username=".urlencode($_SESSION["username"])."&acctid=".urlencode($_SESSION["acctid"])."&is_auction=0");
            exit();
        } else {
            header("Location: index.php?status=failed&?username=".urlencode($username));
        }
    }
}
?>