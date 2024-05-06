<?php 
    $query = 
    "SELECT tap.auctionpostid AS auctionid, tap.highestbid, tb.usercontact
    FROM tblbid AS tb
    INNER JOIN tblauctionpost AS tap 
    ON tb.bidamount = tap.highestbid
    INNER JOIN tblpost AS tp 
    ON tp.post_id = tap.postid
    WHERE tp.is_active = 1
    AND tap.highestbid > 0;
    ";

     $run_query = $conn->prepare($query);
     $run_query->execute();
     $res = $run_query->get_result();

     $counter = 1;
     while($row = $res->fetch_assoc()) {
        echo"
        <tr>
            <td>".$counter++."</td>
            <td>".$row["auctionid"]."</td>
            <td>".$row["highestbid"]."</td>
            <td>".$row["usercontact"]."</td>
        </tr>
        ";
     }
?>