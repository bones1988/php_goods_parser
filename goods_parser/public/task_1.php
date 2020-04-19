<?php
$page_title = 'Task 1';
include_once '../private/shared/header.php';
require_once '../private/functions/database_functions.php';
require_once '../private/functions/query_functions.php';
require_once '../private/functions/functions.php';
require_once '../private/shared/good.php';
require_once '../private/shared/goods_table.php';

function convert_result($result){
    $goods = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $good = new Good;
        $good->name = $row['name'];
        $good->price = $row['price'];
        $good->optPrice = $row['opt_price'];
        $good->stock1 = $row['stock_1'];
        $good->stock2 = $row['stock_2'];
        $good->manufacturer = $row['manufactured'];
        if(($good->stock1+$good->stock2)<20) {
            $good->signs = 'Осталось мало!! Срочно докупите!!!';
        }
        $goods[] = $good;
    }
    return $goods;
}

$connection = db_connect();
$result = getAll($connection);
$goods = convert_result($result);
show_goods_first_task($goods);
db_disconnect($connection);


echo '<a href="http://localhost:63342/brainforce/goods_parser/public/index.php">вернуться в начало</a>';
include_once '../private/shared/end_of_file.php';
?>