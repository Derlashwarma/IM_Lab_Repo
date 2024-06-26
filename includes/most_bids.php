<?php 
    $query = 
    "SELECT
        tap.auctionpostid AS auctionid,
        COUNT(tb.bidid) AS count
    FROM tblpost AS tp
    INNER JOIN tblauctionpost AS tap
    ON tp.post_id = tap.postid
    INNER JOIN tblbid AS tb
    ON tap.auctionpostid = tb.auctionpostid
    WHERE tp.is_active = 1
    GROUP BY tap.auctionpostid
    ORDER BY COUNT(tb.bidid) DESC; 
    ";
    $run_query = $conn->prepare($query);
    $run_query->execute();
    $res = $run_query->get_result();
    $counter = 1;

    while ($row = $res->fetch_assoc()) {
        echo"<tr>
        <td>" . $counter++ . "</td>
        <td>" . $row['auctionid'] . "</td>
        <td>" . $row['count'] . "</td>
    </tr>";
    }
?>