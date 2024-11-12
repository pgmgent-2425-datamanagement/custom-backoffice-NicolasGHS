<div class="max-w-md mx-auto bg-white p-6 rounded-lg shadow-lg mt-8">
    <h1 class="text-2xl font-bold text-gray-800 mb-6">Gitaar Bewerken</h1>

    <form action="/guitars/update/<?php echo $guitar->getGuitarId(); ?>" method="POST" enctype="multipart/form-data" class="space-y-4">
        
        <div>
            <label for="name" class="block text-sm font-medium text-gray-700">Naam:</label>
            <input 
                type="text" 
                name="name" 
                id="name" 
                value="<?php echo htmlspecialchars($guitar->getName()); ?>" 
                required 
                class="mt-1 w-full p-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:outline-none"
            >
        </div>

        <div>
            <label for="description" class="block text-sm font-medium text-gray-700">Beschrijving:</label>
            <textarea 
                name="description" 
                id="description" 
                required 
                class="mt-1 w-full p-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:outline-none"
            ><?php echo htmlspecialchars($guitar->getDescription()); ?></textarea>
        </div>

        <div>
            <label for="stock" class="block text-sm font-medium text-gray-700">Voorraad:</label>
            <input 
                type="number" 
                name="stock" 
                id="stock" 
                value="<?php echo htmlspecialchars($guitar->getStock()); ?>" 
                required 
                class="mt-1 w-full p-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:outline-none"
            >
        </div>

        <div>
            <label for="brand" class="block text-sm font-medium text-gray-700">Merk:</label>
            <select 
                name="brand" 
                id="brand" 
                required 
                class="mt-1 w-full p-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:outline-none"
            >
                <?php foreach ($brands as $brand): ?>
                    <option value="<?php echo $brand->getId(); ?>"
                        <?php if ($guitar->getBrandId() == $brand->getId()) echo 'selected'; ?>>
                        <?php echo htmlspecialchars($brand->getName()); ?>
                    </option>
                <?php endforeach; ?>
            </select>
        </div>

        <div>
            <label for="image" class="block text-sm font-medium text-gray-700">Foto:</label>
            <input 
                type="file" 
                name="image" 
                id="image" 
                accept="image/*" 
                class="mt-1 w-full text-sm text-gray-700 p-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:outline-none"
            >
        </div>

        <button 
            type="submit" 
            class="w-full bg-indigo-600 text-white p-2 rounded-lg font-semibold mt-4 hover:bg-indigo-700 focus:ring-2 focus:ring-indigo-500 focus:outline-none"
        >
            Opslaan
        </button>
    </form>
</div>
