<?php

    $query = 
    "SELECT
        tp.post_id, tp.post_likes,
        tua.username  
    FROM tblpost AS tp
    INNER JOIN tblauthor AS ta
    ON ta.author_id = tp.author_id
    INNER JOIN tbluseraccount AS tua
    ON tua.acctid = ta.acctid 
    WHERE tp.post_likes > 0
    AND tp.is_active = 1
    ORDER BY tp.post_likes DESC
    LIMIT 10";
    $run_query = $conn->prepare($query);

    $run_query->execute();
    $result = $run_query->get_result();

    $counter = 1;
    while ($row = $result->fetch_assoc()) {
        echo"<tr>
        <td>" . $counter++. "</td>
        <td>" . $row['post_id'] . "</td>
        <td>" . $row['username'] . "</td>
        <td>" . $row['post_likes'] . "</td>
    </tr>";
    }

?>