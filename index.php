<?php
require 'vendor/autoload.php';
$query = require "core/new_config.php";
 Router::load('routes.php')
->direct(Request::uri(), Request::method());


