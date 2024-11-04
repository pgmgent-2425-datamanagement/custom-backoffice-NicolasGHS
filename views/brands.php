<h1>Brands</h1>

<?php if (!empty($brands)): ?>
    <ul>
        <?php foreach ($brands as $brand): ?>
            <li><?php echo htmlspecialchars($brand->getName()); ?></li>
        <?php endforeach; ?>
    </ul>
<?php else: ?>
    <p>No brands found.</p>
<?php endif; ?>