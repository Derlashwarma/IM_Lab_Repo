<?php
    require '../connect.php';
    $post_id = $_GET['post_id'];
    $acctid = $_GET['acctid'];
    $username = $_GET['username'];

    $check_like_exist_query = "SELECT l.isliked, l.acctid, l.post_id, p.author_id, p.post_id 
                                FROM tbllike AS l
                                INNER JOIN tblpost AS p
                                ON l.post_id = p.post_id
                                WHERE l.post_id = ? 
                                AND l.acctid = ?";
    $check_like_query = $conn->prepare($check_like_exist_query);
    $check_like_query->bind_param('ii',$post_id,$acctid);
    $check_like_query->execute();
    $check_like_query->store_result();

    if($check_like_query->num_rows() > 0){
        $check_like_query->bind_result($isliked, $acctid, $post_id, $author_id, $post_id);
        $check_like_query->fetch();
        if($isliked == 1){
            echo'Delete Query';
            $remove_like_query = "UPDATE tbllike SET isliked = 0 WHERE post_id = ? AND acctid = ?";
            $remove_query = $conn->prepare($remove_like_query);
            $remove_query->bind_param('ii',$post_id,$acctid);
            $remove_query->execute();
            $decrement_query = "UPDATE tblpost 
                                    SET post_likes = post_likes - 1
                                    WHERE post_id = ?";
            $run_decrement = $conn->prepare($decrement_query);
            $run_decrement->bind_param('i',$post_id);
            $run_decrement->execute();
        } else {
            // Update isliked to 1
            $update_like_query = "UPDATE tbllike SET isliked = 1 WHERE post_id = ? AND acctid = ?";
            $update_like = $conn->prepare($update_like_query);
            $update_like->bind_param('ii', $post_id, $acctid);
            $update_like->execute();
            // Increment post_likes
            $increment_query = "UPDATE tblpost 
                                SET post_likes = post_likes + 1
                                WHERE post_id = ?";
            $run_increment = $conn->prepare($increment_query);
            $run_increment->bind_param('i', $post_id);
            $run_increment->execute();
        }
    } else {
        // Insert new like
        $insert_likes_query = "INSERT INTO tbllike(post_id,acctid,isliked)
                                VALUES (?,?,?)";
        $insert_like = $conn->prepare($insert_likes_query);
        $isliked = 1;
        $insert_like->bind_param('iii',$post_id,$acctid,$isliked);
        $insert_like->execute();
        // Increment post_likes
        $increment_query = "UPDATE tblpost 
                            SET post_likes = post_likes + 1
                            WHERE post_id = ?";
        $run_increment = $conn->prepare($increment_query);
        $run_increment->bind_param('i',$post_id);
        $run_increment->execute();
    }
    header("Location: ../main_page.php?username=$username&acctid=$acctid&is_auction=0");
?>
