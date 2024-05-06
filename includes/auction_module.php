<script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>    
<div class="container">
    <form class="form pt-3" method="POST">
        <div class="row">
            <div class="col-md-3 d-flex align-items-center pt-1">
                <label class="h6">Bid Amount: </label>
            </div>
            <div class="col-md-9">
                <input id="bid-amount-<?php echo($row['auctionpostid']) ?>" class="form-control" name="amount-<?php echo($row['auctionpostid']) ?>" type="number">
            </div>
            <div class="col-md-3 d-flex align-items-center pt-1">
                <label class="h6">Contact Number: </label>
            </div>
            <div class="col-md-9">
                <input id="bid-amount-<?php echo($row['auctionpostid']) ?>" class="form-control" name="contact-<?php echo($row['auctionpostid']) ?>" type="text" required>
            </div>
            <div class="col-md-2">
                <button type="submit" id="button-auction-<?php echo($row['auctionpostid']) ?>" class="btn btn-primary btn-block">Submit</button>
            </div>
        </div>
    </form>
</div>
<script>
    $(document).ready(function(){
        $("#button-auction-<?php echo($row['auctionpostid']) ?>").click(function(event) {
        })
    })
</script>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST" && !empty($_POST["amount-" . $row['auctionpostid'] . ""])) {
    $auctionpostid = $row['auctionpostid'];
    $amount = $_POST["amount-" . $row['auctionpostid'] . ""];
    $contact = $_POST["contact-" . $row['auctionpostid'] . ""];

    $conn->begin_transaction();

    try {
        
        //Insert user bid
        $insertUserBid = "INSERT INTO tbluserbid(acctid, auctionpostid) VALUES (?,?)";
        $userBidCommand = $conn->prepare($insertUserBid);
        $userBidCommand->bind_param("ii", $acctid, $auctionpostid);
        $userBidCommand->execute();
        $userBidId = $conn->insert_id;
        //Insert bid
        $insertBidQuery = "INSERT INTO tblbid(auctionpostid, bidamount,userbidid, usercontact) VALUES(?,?,?,?)";
        $insertCommand = $conn->prepare($insertBidQuery);
        $insertCommand->bind_param("iiii", $auctionpostid, $amount, $userBidId, $contact);
        $insertCommand->execute();

        // Third query: Update auction post
        $updateQuery = "UPDATE tblauctionpost 
                        SET highestbid = ?  
                        WHERE auctionpostid = ?
                        AND highestbid < ?";
        $runUpdate = $conn->prepare($updateQuery);
        $runUpdate->bind_param("iii", $amount, $auctionpostid, $amount);
        $runUpdate->execute();

        // Commit the transaction if all queries succeed
        $conn->commit();
    } catch (Exception $e) {
        // Rollback the transaction if any query fails
        $conn->rollback();
        echo "An error occurred: " . $e->getMessage();
    }
}
?>
