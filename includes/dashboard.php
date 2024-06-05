<div class="news-feed-container row">
            <div class="container bg-body rounded-4 p-3 shadow">
                <label class="h5 text-center col-md-12">Top 10 Highest Bids</label>
                <hr>
                <table class="table">
                    <tr>
                        <th>Rank</th>
                        <th>Username</th>
                        <th>Account ID</th>
                        <th>Bid Amount</th>
                    </tr>
                        <?php include('includes/top_10_highest_bids'); ?>
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
                        <th>Auction Post ID</th>
                        <th>Bid Ammount</th>
                        <th>Contact</th>
                    </tr>
                        <?php include('includes/highest_likes.php'); ?>
                </table>
            </div>
        </div>