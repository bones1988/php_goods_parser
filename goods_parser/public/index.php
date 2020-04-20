<?php
$page_title = 'Welcome';
require_once '../private/shared/config.php';
include_once (DIR_SHARED . 'header.php');
echo "<ul>
 <li><a href=\"http://localhost:63342/brainforce/goods_parser/public/parse_goods.php\">Парсинг файла</a>.</li>
 <li><a href=\"http://localhost:63342/brainforce/goods_parser/public/task_1.php\">Практиечское задание 1</a>.</li>
 <li><a href=\"http://localhost:63342/brainforce/goods_parser/public/task_2.php\">Практиечское задание 2</a>.</li>
</ul>";
include_once '../private/shared/end_of_file.php';
