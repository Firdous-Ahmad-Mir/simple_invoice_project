<?php

$router->get('','Pages@home');
$router->get('index','Pages@home');
$router->get('all_records','Pages@all_records');
$router->get('invoice','Pages@invoice');
$router->get('delete','Pages@delete_all');
$router->get('add_fields','Pages@input');
$router->get('fetch','Pages@fetch');

$router->post('update','Pages@update_tables');
$router->post('insert_data','Pages@insert_data');

