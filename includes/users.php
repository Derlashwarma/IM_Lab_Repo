<div class="news-feed-container row">
    <div class="bg-body rounded-4 shadow-lg table">
        <h3 class="pt-3 text-center col-md-12">Active Users</h3>
        <hr>  
            <table class="table">
                <tr>
                    <th>Account ID</th>
                    <th>Username</th>
                    <th>Active Status</th>
                    <th>Operation</th>
                </tr>
                <?php
                    include 'includes/display_users.php';
                ?>
            </table>
    </div>

    <div class="container bg-body rounded-4 shadow-lg table pt-3">
        <h3 class="text-center col-md-12">Not Active Users</h3>
        <hr>
        <div>
            <table class="table">
                <tr>
                    <th>Account ID</th>
                    <th>Username</th>
                    <th>Active Status</th>
                    <th>Operation</th>
                </tr>   
                <?php
                    include 'includes/display_inactiveUsers.php';
                ?>
            </table>
        </div>
    </div>
</div>