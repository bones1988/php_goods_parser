<?php use PhpOffice\PhpSpreadsheet\Cell\Coordinate;
use PhpOffice\PhpSpreadsheet\IOFactory;

require_once '../private/functions/database_functions.php';
require_once '../private/functions/query_functions.php';

$page_title = 'File parse'; ?>

<?php
include_once '../private/shared/header.php';
include_once '../private/shared/good.php';
include_once '../private/shared/goods_table.php';
require '../../vendor/autoload.php';
?>

<div id="tableData">
    <?php

    try {
        $spreadsheet = IOFactory::load("../private/resources/pricelist.xls");
    } catch (\PhpOffice\PhpSpreadsheet\Reader\Exception $e) {
        exit('Error parsing file' . $php_errormsg);
    }
    try {
        $worksheet = $spreadsheet->getActiveSheet();
    } catch (\PhpOffice\PhpSpreadsheet\Exception $e) {
        exit('Error parsing file' . $php_errormsg);
    }
    $highestRow = $worksheet->getHighestRow();
    $highestColumn = $worksheet->getHighestColumn();
    try {
        $highestColumnIndex = Coordinate::columnIndexFromString($highestColumn);
    } catch (\PhpOffice\PhpSpreadsheet\Exception $e) {
        exit('Error parsing file' . $php_errormsg);
    }
    $connection = db_connect();
    $goods = [];
    for ($row = 1; $row <= $highestRow; ++$row) {
        $good = new Good;
        $good->name = $worksheet->getCellByColumnAndRow(1, $row)->getValue();
        $good->price = floatval($worksheet->getCellByColumnAndRow(2, $row)->getValue());
        $good->optPrice = floatval($worksheet->getCellByColumnAndRow(3, $row)->getValue());
        $good->stock1 = floatval($worksheet->getCellByColumnAndRow(4, $row)->getValue());
        $good->stock2 = floatval($worksheet->getCellByColumnAndRow(5, $row)->getValue());
        $good->manufacturer = $worksheet->getCellByColumnAndRow(6, $row)->getValue();
        if ($good->price != 0) {
            insert_good($good, $connection);
            $goods[] = $good;
        }
    }
    show_goods($goods);
    db_disconnect($connection);
    ?>
</div>
<a href="http://localhost:63342/brainforce/goods_parser/public/index.php">вернуться в начало</a>
<?php include_once '../private/shared/end_of_file.php'; ?>

