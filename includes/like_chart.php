<canvas id="postLikesChart"></canvas>
<script>
    document.addEventListener('DOMContentLoaded', function () {
            const labels = ["Total Likes","Average Post Likes","Average Likes Per User"];
            const data = [<?php echo$total_likes ?>,<?php echo$average_likes_each_post ?>, <?php echo$average_user_likes ?>];
            
            const ctx = document.getElementById('postLikesChart').getContext('2d');
            const postLikesChart = new Chart(ctx, {
                type: 'bar', 
                data: {
                    labels: labels,
                    datasets: [{
                        label: 'Post Likes',
                        data: data,
                        backgroundColor: ['rgba(75, 192, 192, 0.5)', 'rgba(255, 0, 0, 0.5)', 'rgba(255, 255, 0, 0.5)'],
                        borderWidth: 1
                    }]
                },
                options: {
                    scales: {
                        y: {
                            beginAtZero: true
                        }
                    }
                }
            });
        });
</script>