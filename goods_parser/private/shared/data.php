<?php
require_once 'config.php';
require_once DIR_FUNCTIONS . 'database_functions.php';
require_once DIR_FUNCTIONS . 'query_functions.php';
require_once DIR_FUNCTIONS . 'functions.php';
require_once 'goods_table.php';

$params = [];
$params['opt'] = $_GET["price"];
$params['from'] = $_GET["from"];
$params['before'] = $_GET["before"];
$params['qnt'] = $_GET["qnt"];
$params['stock'] = $_GET["stock"];

$connection = db_connect();
$result = getByParams($connection, $params);
$goods = convert_result($result);
show_goods_first_task($goods);
db_disconnect($connection);
