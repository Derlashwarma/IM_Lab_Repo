<?php 
    include "../connect.php";
    $user_id_to_delete = $_GET["to_delete"];
    $username = $_GET["username"];
    $acctid = $_GET["acctid"];

    $delete_query = "
        UPDATE tbluseraccount
        SET is_active = 1
        WHERE acctid = ?;
    ";

    $delete_query = $conn->prepare($delete_query);
    $delete_query->bind_param("i", $user_id_to_delete);

    if($delete_query->execute()) {
        header("Location: ../admin.php?username=$username&acctid=$acctid");
    }
?>