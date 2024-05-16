<?php
    $is_auction = $_GET['is_auction'];
    $query = "
            SELECT 
            tba.auctionpostid,
            acc.acctid, acc.username, acc.is_admin, 
            a.author_id, a.acctid,
            p.post_id, p.author_id, p.post_image, p.post_information,
            p.is_auction, p.post_likes, p.is_active,tba.highestbid
            FROM tbluseraccount AS acc
            RIGHT JOIN tblauthor AS a
            ON acc.acctid = a.acctid
            RIGHT JOIN tblpost AS p
            ON a.author_id = p.author_id
            INNER JOIN tblauctionpost AS tba
            ON tba.postid = p.post_id
            WHERE p.is_active = 1
            AND p.is_auction = $is_auction
            AND tba.enddate > CURDATE()
            ORDER BY p.post_id DESC;
        ";
    $username = $_GET["username"];
    $acctid = $_GET["acctid"];
    $username = $_GET["username"];
    $acctid = $_GET["acctid"];

    try{
        $result = mysqli_query($conn,$query);
    }
    catch(Exception $e){
        // echo'<div style="width: 100%; text-align: center; color:red;">cannot load, an error has occured</div>';
        echo($e);
        return;
    }
    if(mysqli_num_rows($result) == 0){
        echo'<div id="error" style="width: 100%; text-align: center; color:red;">There are no uploads </div>';
        return;
    }
    try{
        $result = mysqli_query($conn,$query);
    }
    catch(Exception $e){
        // echo'<div style="width: 100%; text-align: center; color:red;">cannot load, an error has occured</div>';
        echo($e);
        return;
    }
    if(mysqli_num_rows($result) == 0){
        echo'<div id="error" style="width: 100%; text-align: center; color:red;">There are no uploads </div>';
        return;
    }

    ?>
    <?php
    $remove_string = "
                    UPDATE tblpost
                    SET post_image = SUBSTRING(post_image, 4)
                    WHERE post_image LIKE '../%';";
    $run_remove = mysqli_query($conn,$remove_string);

    while($row = mysqli_fetch_assoc($result))
    {
        echo
        '
        <div class="delete-post bg-body rounded-4 mb-3 shadow p-3 " id="post-'.$row['post_id'].'">
            <div class="confirm-message">
                Are you sure you want to remove post?
            </div>
            <div class="choice-container container d-flex justify-content-center">
                <div class="btn-no btn btn-outline-primary m-2" id="no-'.$row['post_id'].'">
                    No
                </div>
                <a href="includes/delete_post.php?post_id='.$row['post_id'].'&username='.$username.'&acctid='.$acctid.'" class="btn-yes btn btn-danger m-2">Yes</a>
            </div>
        </div>
        ';
        echo'<div class="card-div mb-3 shadow bg-body p-3 rounded-4">';
        if($isAdmin == 1 || $acctid == $row['acctid']){
            echo '
            <div class="delete-btn-container">
                <button type="button" id="delete-post-'.$row['post_id'].'" class="position-absolute btn-close" aria-label="Close"></button>
            </div>
            ';
            echo
            ('
                <script>
                document.getElementById("delete-post-'.$row['post_id'].'").addEventListener("click", function(event){
                    event.preventDefault();
                    if(document.getElementById("post-'.$row['post_id'].'").style.display=="block"){
                        document.getElementById("post-'.$row['post_id'].'").style.display="none";
                    }
                    else{
                        document.getElementById("post-'.$row['post_id'].'").style.display="block";
                    }
                })
                </script>
            ');
        }
        echo'  
            <div class="row name-div">
                <p class="h5">'.$row["username"].'</p>
                </div>
            <div class="row information-div p-3">
                '. $row["post_information"].'
            </div>
            <div class=" image-div">
                <img src="'.($row['post_image']).'" alt="Car Image">
            </div>
            ';
        include 'highest_bid.php';
        //bid location
        include 'auction_module.php';
        //scripts for like and delete
        echo
        ('
        </div>
            <script>
            $(document).ready(function(){
                document.getElementById("no-'.$row['post_id'].'").addEventListener("click", function(){
                    document.getElementById("post-'.$row['post_id'].'").style.display="none";
                })  
            })
            </script>
        ');
    }
?>
