<?php
require_once 'database_functions.php';

function getAll($connection) {
    $sql = "select * from goods";
    $result =  $connection->query($sql);
    if($result->num_rows===0) {
        exit('Nothing found');
    }
    return $result;
}

function getByParams($connection) {
    $sql = "select * from goods";
    $result =  $connection->query($sql);
    if($result->num_rows===0) {
        exit('Nothing found');
    }
    return $result;
}


function insert_good($good, $connection)
{
    $name = '';
    $price = 0;
    $optPrice = 0;
    $stock1 = 0;
    $stock2 = 0;
    $manufacturer = '';

    $statement = $connection->prepare("insert into goods (name, price, opt_price, stock_1, stock_2, manufactured)
values(?, ?, ?, ?, ?, ?)");
    $statement->bind_param("sddiis", $name, $price, $optPrice, $stock1, $stock2,
        $manufacturer);

    $name = $good->name;
    $price = $good->price;
    $optPrice = $good->optPrice;
    $stock1 = $good->stock1;
    $stock2 = $good->stock2;
    $manufacturer = $good->manufacturer;
    $statement->execute();
}