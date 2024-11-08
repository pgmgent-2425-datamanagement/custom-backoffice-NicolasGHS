<h1 class="text-xl font-bold mb-4">Gitaar Bewerken</h1>

<form action="/guitars/update/<?php echo $guitar->getGuitarId(); ?>" method="POST" enctype="multipart/form-data">
    <label for="name">Naam:</label>
    <input type="text" name="name" id="name" value="<?php echo htmlspecialchars($guitar->getName()); ?>" required>

    <label for="description">Beschrijving:</label>
    <textarea name="description" id="description" required><?php echo htmlspecialchars($guitar->getDescription()); ?></textarea>

    <label for="stock">Voorraad:</label>
    <input type="number" name="stock" id="stock" value="<?php echo htmlspecialchars($guitar->getStock()); ?>" required>

    <label for="brand">Merk:</label>
    <select name="brand" id="brand" required>
        <?php foreach ($brands as $brand): ?>
            <option value="<?php echo $brand->getId(); ?>"
                <?php if ($guitar->getBrandId() == $brand->getId()) echo 'selected'; ?>>
                <?php echo htmlspecialchars($brand->getName()); ?>
            </option>
        <?php endforeach; ?>
    </select>

    <label for="image">Foto:</label>
    <input type="file" name="image" id="image" accept="image/*">

    <button type="submit">Opslaan</button>
</form>
