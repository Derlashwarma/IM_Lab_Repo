<canvas id="bidChart"></canvas>
<script>
    document.addEventListener('DOMContentLoaded', function () {
            const labels = ["Total Bids", "Average Highest Bids","Average Bid Amount"];
            
            const ctx = document.getElementById('bidChart').getContext('2d');
            const postLikesChart = new Chart(ctx, {
                type: 'bar', 
                data: {
                    labels: labels,
                    datasets: [{
                        label: 'Total Bids',
                        data: [2436000, 550000, 304500],
                        backgroundColor: ['rgba(255, 192, 192, 0.5)', 'rgba(255, 0, 100, 0.5)', 'rgba(255, 055, 0, 0.5)'],
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