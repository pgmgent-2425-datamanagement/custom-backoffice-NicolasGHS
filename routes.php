<?php

//$router->get('/', function() { echo 'Dit is de index vanuit de route'; });
$router->setNamespace('\App\Controllers');
$router->get('/', 'HomeController@index');
$router->get('/guitars', function() {
    $controller = new \App\Controllers\GuitarController();
    $controller->index();
});
$router->get('/orders', function() {
    $controller = new \App\Controllers\OrderController();
    $controller->index();
});
$router->get('/brands', function() {
    $controller = new \App\Controllers\BrandController();
    $controller->index();
});
$router->get('/guitars/add', 'GuitarController@addGuitarForm');
$router->post('/guitars/add', 'GuitarController@storeGuitar');
$router->post('/guitars/delete/(\d+)', 'GuitarController@deleteGuitar');
$router->get('/guitars/edit/(\d+)', 'GuitarController@editGuitarForm');
$router->post('/guitars/update/(\d+)', 'GuitarController@updateGuitar');
$router->get('/brands/add', 'BrandController@addBrandForm');
$router->post('/brands/add', 'BrandController@storeBrand');