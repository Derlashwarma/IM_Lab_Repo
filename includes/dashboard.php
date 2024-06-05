<div class="news-feed-container row">
    <div class="mb-3 container bg-body rounded-4 p-3 shadow">
        <label class="h5 text-center col-md-12">Statistics</label>
        <table class="table">
            <tr>
                <th>Table Name</th>
                <th>Field</th>
                <th>Total</th>
                <th>Aggregate</th>
                <th>Result</th>
            </tr>
            <tr>
                <td>tblpost</td>
                <td>likes</td>
                <td>
                <?php
                    $query = "SELECT SUM(post_likes) AS sum FROM tblpost WHERE is_active = 1";
                    $run = $conn->prepare($query);
                    $run->execute();
                    $res = $run->get_result();
                    $row = $res->fetch_assoc();
                    
                    $total_likes = $row['sum'];
                    echo $total_likes
                ?>
                </td>
                <td>Average likes each post</td>
                <td>
                    <?php
                        $query = "SELECT AVG(post_likes) AS sum FROM tblpost WHERE is_active = 1";
                        $run = $conn->prepare($query);
                        $run->execute();
                        $res = $run->get_result();
                        $row = $res->fetch_assoc();
                        
                        $average_likes_each_post = $row['sum'];
                        echo $average_likes_each_post;
                    ?>
                </td>
            </tr>
            <tr>
                <td>tbllike</td>
                <td>likes</td>
                <td>
                    <?php 
                        $query = "SELECT COUNT(acctid) AS sum FROM tbllike WHERE isliked = 1";
                        $run = $conn->prepare($query);
                        $run->execute();
                        $res = $run->get_result();
                        $row = $res->fetch_assoc();
                        
                        echo $row['sum'];
                    ?>
                </td>
                <td>Average likes per user</td>
                <td>
                    <?php 
                        $query = "SELECT AVG(isliked) AS average_likes, acctid FROM tbllike WHERE isliked = 1 GROUP BY acctid";
                        $run = $conn->prepare($query);
                        $run->execute();
                        $res = $run->get_result();
                        $row = $res->fetch_assoc();
                        
                        $average_user_likes = $row['average_likes'];
                        echo $average_user_likes;
                    ?>
                </td>
            </tr>
            <tr>
                <td><small>tblauctionpost</small></td>
                <td><small>bid amount</small></td>
                <td>
                    <?php 
                        $query = "SELECT SUM(highestbid) AS total_bids FROM tblauctionpost";
                        $run = $conn->prepare($query);
                        $run->execute();
                        $res = $run->get_result();
                        $row = $res->fetch_assoc();
                        
                        $total_bids = number_format($row['total_bids'], 2);
                        echo "$";
                        echo "<small>". $total_bids ."<small>";
                    ?>
                </td>
                <td><small>Average highest bid per auction post</small></td>
                <td>
                    <?php
                        $query = "SELECT AVG(highestbid) AS total_bids FROM tblauctionpost";
                        $run = $conn->prepare($query);
                        $run->execute();
                        $res = $run->get_result();
                        $row = $res->fetch_assoc();
                        
                        $average_high_bids = number_format($row['total_bids'], 2); 
                        echo "$";
                        echo "<small>".$average_high_bids."<small>";
                    ?>
                </td>
            </tr>
            <tr>
                <td>tblbid</td>
                <td><small>bid amount</small></td>
                <td>
                    <?php 
                        $query = "SELECT SUM(bidamount) AS total_bids FROM tblbid";
                        $run = $conn->prepare($query);
                        $run->execute();
                        $res = $run->get_result();
                        $row = $res->fetch_assoc();
                        
                        echo "$";
                        $total_bids = number_format($row['total_bids'], 2);
                        echo "<small>".$total_bids."<small>";
                    ?>
                </td>
                <td>Average bids</td>
                <td>
                    <?php
                        $query = "SELECT AVG(bidamount) AS avg_bids FROM tblbid";
                        $run = $conn->prepare($query);
                        $run->execute();
                        $res = $run->get_result();
                        $row = $res->fetch_assoc();
                        
                        $avg_bidamount = number_format($row['avg_bids'], 2); 
                        echo "$";
                        echo "<small>".$avg_bidamount."<small>";
                    ?>
                </td>
            </tr>
            <tr>
                <td>tbluseraccount</td>
                <td>Active Users</td>
                <td>
                    <?php
                        $query = "SELECT COUNT(acctid) AS total_users FROM tbluseraccount";
                        $run = $conn->prepare($query);
                        $run->execute();
                        $res = $run->get_result();
                        $row = $res->fetch_assoc();
                        
                        $total_users = $row['total_users']; 
                        echo $total_users;
                    ?>
                </td>
                <td>Average active users</td>
                <td>    
                    <?php
                        $query = "SELECT AVG(is_active) AS total_active FROM tbluseraccount";
                        $run = $conn->prepare($query);
                        $run->execute();
                        $res = $run->get_result();
                        $row = $res->fetch_assoc();
                        
                        $avg_active = $row['total_active']; 
                        echo $avg_active;
                    ?>
                </td>
            </tr>
        </table>
    </div>
    
    <div class="mb-3 container bg-body rounded-4 p-3 shadow">
        <?php include('like_chart.php') ?>
        <hr>
        <?php include('bid_chart.php') ?>
        <hr>
        <?php include('user_chart.php') ?>
        <hr>
    </div>
    <div class="container bg-body rounded-4 p-3 shadow">
        <label class="h5 text-center col-md-12">Top 10 Highest Bids</label>
        <hr>
        <table class="table">
            <tr>
                <th>Rank</th>
                <th>Username</th>
                <th>Bid ID</th>
                <th>Bid Amount</th>
            </tr>
                <?php include('includes/top_10_highest_bids.php'); ?>
        </table>
    </div>
    <div class="mt-4 container bg-body rounded-4 p-3 shadow">
        <label class="h5 text-center col-md-12">Highest Bids in Auctions</label>
        <table class="table">
            <tr>
                <th>Rank</th>
                <th>Auction Post ID</th>
                <th>Bid Ammount</th>
                <th>Contact</th>
            </tr>
                <?php include('includes/highest_bids.php'); ?>
        </table>
    </div>
    
    <div class="mt-4 container bg-body rounded-4 p-3 shadow">
        <label class="h5 text-center col-md-12">Post with Most Bids</label>
        <hr>
        <table class="table">
            <tr>
                <th>Rank</th>
                <th>Auction Post ID</th>
                <th>Bid Count</th>
            </tr>
                <?php include('includes/most_bids.php'); ?>
        </table>
    </div>
    
    <div class="mt-4 container bg-body rounded-4 p-3 shadow">
        <label class="h5 text-center col-md-12">Top 10 Most Likes Post</label>
        <table class="table">
            <tr>
                <th>Rank</th>
                <th>Post ID</th>
                <th>Post Author</th>
                <th>Post Likes</th>
            </tr>
                <?php include('includes/highest_likes.php'); ?>
        </table>
    </div>
</div>