<?php
require_once DIR_SHARED . 'good.php';
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
