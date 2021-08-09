<?php



 App:: bind('config', require 'config.php');
 App::bind ('database', new QueryBuilder(
     Connection::make(App::get('config')['database'])
 ));
 function display($page_name, $data=[]){
     extract($data);
     return require "views/{$page_name}.view.php";

 }



