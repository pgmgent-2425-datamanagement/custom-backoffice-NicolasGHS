<h1>Base MVC</h1>
<p>Welcome to this base mvc project.</p>

<div class="dashboard-statistics">
    <h2 class="mt-3">Bestellingen</h2>
    <div class="stat-item">
        <p><strong>Aantal actieve orders:</strong> <?= $activeOrdersCount ?></p>
    </div>
    <div class="stat-item">
        <p><strong>Totaal aantal orders:</strong> <?= $totalOrdersCount ?></p>
    </div>

    <h2 class="mt-3">Populairste Gitaar</h2>
    <div class="stat-item">
        <?php if ($mostPopularGuitar): ?>
            <p><strong>De populairste gitaar:</strong> <?= $mostPopularGuitar->getName() ?></p>
        <?php else: ?>
            <p>Er zijn nog geen bestellingen voor gitaren.</p>
        <?php endif; ?>
    </div>
</div>
