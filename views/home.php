<div class="dashboard-statistics">
    <h2 class="mt-3 text-xl font-bold mb-4">Bestellingen</h2>
    <!-- <div class="stat-item">
        <p><strong>Aantal actieve bestellingen:</strong> <?= $activeOrdersCount ?></p>
    </div>
    <div class="stat-item">
        <p><strong>Totaal aantal bestellingen:</strong> <?= $totalOrdersCount ?></p>
    </div> -->


    <!-- Canvas for Chart -->
    <h2 class="mt-3">Bestellingen Overzicht</h2>
    <canvas id="ordersChart" width="400" height="200"></canvas>

    <div class="stat-item mt-3">
        <?php if ($mostPopularGuitar): ?>
            <p><strong>De populairste gitaar:</strong> <?= $mostPopularGuitar->getName() ?></p>
        <?php else: ?>
            <p>Er zijn nog geen bestellingen voor gitaren.</p>
        <?php endif; ?>
    </div>
</div>


<script>
    // PHP variables converted to JavaScript
    const activeOrdersCount = <?= json_encode($activeOrdersCount) ?>;
    const totalOrdersCount = <?= json_encode($totalOrdersCount) ?>;
    
    // Setting up the Chart.js chart
    const ctx = document.getElementById('ordersChart').getContext('2d');
    const ordersChart = new Chart(ctx, {
        type: 'bar',  // Choose 'bar', 'line', etc.
        data: {
            labels: ['Actieve Bestellingen', 'Totaal Bestellingen'],
            datasets: [{
                label: 'Aantal Bestellingen',
                data: [activeOrdersCount, totalOrdersCount],
                backgroundColor: [
                    'rgba(54, 162, 235, 0.5)',  // Color for Active Orders
                    'rgba(75, 192, 192, 0.5)'   // Color for Total Orders
                ],
                borderColor: [
                    'rgba(54, 162, 235, 1)',
                    'rgba(75, 192, 192, 1)'
                ],
                borderWidth: 1
            }]
        },
        options: {
            scales: {
                y: {
                    beginAtZero: true
                }
            },
            responsive: true,
            plugins: {
                legend: {
                    display: false
                },
                title: {
                    display: true,
                    text: 'Overzicht van Bestellingen'
                }
            }
        }
    });
</script>
