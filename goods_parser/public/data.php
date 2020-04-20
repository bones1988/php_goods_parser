<?php
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
?>
