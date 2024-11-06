<h1 class="text-xl font-bold mb-4">Bestellingen</h1>

<a href="/orders/add" class="inline-flex items-center px-4 py-2 bg-gray-700 mb-3 border border-transparent rounded-md font-semibold text-white hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 transition ease-in-out duration-150">
    <svg class="w-5 h-5 mr-2" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/>
    </svg>
    Voeg Merk Toe
</a>

<?php if (!empty($orders)): ?>
    <ul class="space-y-4">
        <?php foreach ($orders as $order): ?>
            <li class="p-6 bg-gray-100 rounded-lg shadow-md">
                <div>
                    <div class="text-lg font-semibold text-gray-700">User: <?php echo htmlspecialchars($order->getUserId()); ?></div>
                    <div class="text-gray-600">Status: <?php echo htmlspecialchars($order->getStatus()); ?></div>
                    <div class="text-gray-600">Price: <?php echo htmlspecialchars($order->getPrice()); ?></div>
                    <div class="text-gray-600">Datum besteld: <?php echo htmlspecialchars($order->getOrderDate()); ?></div>
                </div>
            </li>
        <?php endforeach; ?>
    </ul>
<?php else: ?>
    <p class="text-gray-600">Geen bestellingen gevonden.</p>
<?php endif; ?>
