<?php 
$username = $_GET["username"];
$author_id = $row["author_id"];
$find_query = "SELECT tua.username, tua.acctid, ta.acctid, ta.author_id
               FROM tbluseraccount AS tua
               INNER JOIN tblauthor AS ta
               ON tua.acctid = ta.acctid
               WHERE tua.username = ? AND
               ta.author_id = ?";
$run_query = $conn->prepare($find_query);
$run_query->bind_param("si",$username,$author_id);
$run_query->execute();

$res = $run_query->get_result();

$show = "none";

// Check if any results were returned
if ($res->num_rows > 0) {
    $show = "block";
}

$query = 
    "SELECT tap.auctionpostid AS auctionid, tap.highestbid, tb.usercontact
    FROM tblbid AS tb
    INNER JOIN tblauctionpost AS tap 
    ON tb.bidamount = tap.highestbid
    INNER JOIN tblpost AS tp 
    ON tp.post_id = tap.postid
    WHERE tp.is_active = 1
    AND tap.highestbid > 0
    AND tap.auctionpostid = ?;
    ";

    $id = $row['auctionpostid'];
     $run_query = $conn->prepare($query);
     $run_query->bind_param("i",$id);
     $run_query->execute();
     $res = $run_query->get_result();
     $num = $res->fetch_assoc();

?>

<div class="container mt-3" style="display: <?php echo($show) ?>">
    <p>Show Bid</p>
    <table class="table">
        <tr>
            <th>Highest Bid</th>
            <th>Contact Number</th>
        </tr>
        <tr>
            <td><?php echo("$".$row["highestbid"])?></td>
            <td><?php echo($num['usercontact']) ?></td>
        </tr>
    </table>
</div>