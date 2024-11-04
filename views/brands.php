<h1 class="text-xl font-bold mb-4">Merken</h1>

<?php if (!empty($brands)): ?>
    <ul class="space-y-2">
        <?php foreach ($brands as $brand): ?>
            <li class="p-4 bg-gray-100 rounded shadow">
                <?php echo htmlspecialchars($brand->getName()); ?>
            </li>
        <?php endforeach; ?>
    </ul>
<?php else: ?>
    <p class="text-gray-600">Geen merken gevonden.</p>
<?php endif; ?>