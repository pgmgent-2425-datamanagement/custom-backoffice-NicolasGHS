<h1>Filemanager</h1>

<?php 
foreach($list as $item) : 
    if($item != '.' && $item != '..') : 
        if(is_dir(BASE_DIR . '/public/images/' . $item)) : ?>
            <li><a href="/filemanager/<?= $item; ?>"><?= $item; ?></a></li>
        <?php else : ?>
            <li><?= $item; ?> <a href="/filemanager/delete/<?= $item; ?>">delete</a></li>
<?php endif;
    endif;
endforeach; ?>