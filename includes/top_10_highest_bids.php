<?php 
    $select_query = 
        "SELECT 
            tua.username as username, tua.acctid,
            tub.acctid, 
            tub.userbidid AS account,
            tb.bidamount AS amount, tb.userbidid
        FROM tbluseraccount AS tua
        INNER JOIN tbluserbid AS tub
        ON tua.acctid = tub.acctid
        INNER JOIN tblbid AS tb
        ON tb.userbidid = tub.userbidid
        WHERE tua.is_active = 1
        ORDER BY tb.bidamount DESC
        LIMIT 10
        ";
    
    $run_query = $conn->prepare($select_query);
    $run_query->execute();
    $result = $run_query->get_result();

    $counter = 1;
    while ($row = $result->fetch_assoc()) {
        echo"<tr>
        <td>" . $counter++ . "</td>
        <td>" . $row['username'] . "</td>
        <td>" . $row['account'] . "</td>
        <td>" . $row['amount'] . "</td>
    </tr>";
    }
?>
