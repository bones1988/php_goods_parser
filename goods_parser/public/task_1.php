<?php
$page_title = 'Task 1';
include_once '../private/shared/config.php';
include_once DIR_SHARED . 'header.php';
require_once DIR_FUNCTIONS . 'database_functions.php';
require_once DIR_FUNCTIONS . 'query_functions.php';
require_once DIR_FUNCTIONS . 'functions.php';
require_once DIR_SHARED . 'goods_table.php';

$connection = db_connect();
$result = getAll($connection);
$goods = convert_result($result);
show_goods_first_task($goods);
db_disconnect($connection);

echo '<a href="http://localhost:63342/brainforce/goods_parser/public/index.php">вернуться в начало</a>';
include_once '../private/shared/end_of_file.php';
