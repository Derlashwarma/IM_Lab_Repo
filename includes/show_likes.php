<?php 
    $post_id =  $row["post_id"];
    $display_query = "SELECT L.post_id, L.acctid, L.isliked, A.acctid, A.username  FROM tbllike AS L
                        INNER JOIN tbluseraccount AS A
                        ON A.acctid = L.acctid
                        WHERE L.isliked = 1
                        AND L.post_id = ?";

    $show_likes = $conn->prepare($display_query);
    $show_likes->bind_param('i',$post_id);
    try{
        $show_likes->execute();
        $res = $show_likes->get_result();
    }
    catch(Exception $e){
        echo'<div style="width: 100%; text-align: center; color:red;">cannot load, an error has occured</div>';
        echo($e);
        return;
    }
    if(mysqli_num_rows($res) == 0){
        echo'<div id="error" style="width: 100%; text-align: center; color:red;">0 likes</div>';
    }
    while ($names = $res->fetch_assoc()) {
        echo '<div class="fw-semibold fs-5">'.$names["username"].'<br></div>';
    }
?>
