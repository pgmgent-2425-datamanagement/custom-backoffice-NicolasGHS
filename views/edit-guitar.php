<h1 class="text-xl font-bold mb-4">Gitaar Bewerken</h1>

<form action="/guitars/update/<?php echo $guitar->getGuitarId(); ?>" method="POST">
    <label for="name">Naam:</label>
    <input type="text" name="name" id="name" value="<?php echo htmlspecialchars($guitar->getName()); ?>" required>

    <label for="description">Beschrijving:</label>
    <textarea name="description" id="description" required><?php echo htmlspecialchars($guitar->getDescription()); ?></textarea>

    <label for="stock">Voorraad:</label>
    <input type="number" name="stock" id="stock" value="<?php echo htmlspecialchars($guitar->getStock()); ?>" required>

    <label for="brand">Merk:</label>
    <input type="text" name="brand" id="brand" value="<?php echo htmlspecialchars($guitar->getBrandName()); ?>" required>

    <button type="submit">Opslaan</button>
</form>
