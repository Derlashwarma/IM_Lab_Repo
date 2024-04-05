<?php
    include '../connect.php';
    $post_id_to_delete = $_GET["post_id"];
    $username = $_GET["username"];
    $acctid = $_GET["acctid"];
    
    $delete_query = 
    "UPDATE tblpost 
    SET is_active = 0
    WHERE post_id = ?";

    $update_query = $conn->prepare($delete_query);
    $update_query->bind_param("i",$post_id_to_delete);

    if($update_query->execute()){
        header("Location: ../main_page.php?username=$username&acctid=$acctid&is_auction=0");
    }
?>