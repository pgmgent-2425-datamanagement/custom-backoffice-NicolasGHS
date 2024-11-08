<h1 class="text-2xl font-bold mb-4 text-center">Filemanager</h1>

<ul class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
    <?php 
    foreach($list as $item) : 
        if($item != '.' && $item != '..') : 
            if(is_dir(BASE_DIR . '/public/images/' . $item)) : ?>
                <li class="bg-gray-100 p-4 rounded-lg shadow-lg flex flex-col items-center">
                    <a href="/filemanager/<?= $item; ?>" class="text-lg font-semibold text-blue-600 hover:underline"><?= $item; ?></a>
                </li>
            <?php else : ?>
                <li class="bg-white p-4 rounded-lg shadow-lg flex flex-col items-center">
                    <p class="text-md font-medium mb-2"><?= $item; ?></p>
                    <img src="images/<?= $item; ?>" alt="" class="mt-2 max-w-full h-32 object-cover rounded-lg shadow">
                    <a href="/filemanager/delete/<?= $item; ?>" class="mt-4 inline-block px-4 py-2 text-sm font-medium text-white bg-red-500 hover:bg-red-600 rounded">Delete</a>
                </li>
    <?php 
            endif;
        endif;
    endforeach; 
    ?>
</ul>
