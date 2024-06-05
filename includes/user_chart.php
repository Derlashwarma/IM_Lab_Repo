<canvas id="userChart"></canvas>
<script>
    document.addEventListener('DOMContentLoaded', function () {
            const labels = ["Total Users", "Active Users","Average Users"];
            
            const ctx = document.getElementById('userChart').getContext('2d');
            const postLikesChart = new Chart(ctx, {
                type: 'bar', 
                data: {
                    labels: labels,
                    datasets: [{
                        label: 'Total Bids',
                        data: [7, 6, 0.8571],
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