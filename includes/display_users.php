<?php
    include "connect.php";
    
    $username = $_GET["username"];
    $acctid = $_GET["acctid"];
    $result = null;

    $select_query = "
    SELECT acctid, username, is_active 
    FROM tbluseraccount
    WHERE acctid != $acctid && is_active = 1";
    try{
        $result = mysqli_query($conn,$select_query);
    }
    catch(Exception $e) {
     echo 'Something went wrong';
    }
    $counter=1;
    while($row = mysqli_fetch_assoc($result)) {
        $color = ($row["is_active"] == 1)?"text-success":"text-danger";
        $active_status = $row['is_active']==1?"Active":"Not Active";
        echo'<tr>
            <td>'.$counter++.'</td>
            <td>'.$row['username'].'</td>
            <td class="'.$color.'">'.$active_status.'</td>
            <td><a href="includes/delete_user.php?to_delete='.$row['acctid'].'&username='.$username.'&acctid='.$acctid.'" class="btn btn-danger">Delete User</a></td>
        </tr>';
    }

?>