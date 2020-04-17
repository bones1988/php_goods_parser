<?php $page_title = 'File parse'; ?>

<?php
include_once '../private/shared/header.php';
require "../private/parser/SimpleXLSX.php";
?>

<div id="tableData">
    <?php
    if($parsed = SimpleXLSX::parse('../private/resources/pricelist.xlsx')) {
        echo '<h1>Worked</h1>';
    } else {
        echo SimpleXLSX::parseError();
    }
    ?>
</div>

<?php include_once '../private/shared/end_of_file.php';?>

