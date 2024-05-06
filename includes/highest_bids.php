<?php 
    $query = 
    "SELECT 
     auctionpostid, highestbid
     FROM tblauctionpost
     ORDER BY highestbid DESC";

     $run_query = $conn->prepare($query);
     $run_query->execute();
     $res = $run_query->get_result();

     $counter = 1;
     while($row = $res->fetch_assoc()) {
        echo"
        <tr>
            <td>".$counter++."</td>
            <td>".$row["auctionpostid"]."</td>
            <td>".$row["highestbid"]."</td>
        </tr>
        ";
     }
?>