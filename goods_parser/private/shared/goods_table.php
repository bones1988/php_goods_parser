<?php
function show_goods($goods)
{
    echo "<table border='1'> ";
    echo "<p>Добавлено в базу данных:</p>";
    echo "<tr>
    <th>Наименование товара</th>
    <th>Стоимость, руб</th>
    <th>Стоимость опт, руб</th>
    <th>Наличие на складе 1, шт</th>
    <th>Наличие на складе 2, шт</th>
    <th>Страна производства</th>
    <th>Примечания</th>";
    foreach ($goods as $key=>$good) {
        echo "<tr> 
                    <td>$good->name</td>
                    <td>$good->price</td>
                    <td>$good->optPrice</td>
                    <td>$good->stock1</td>
                    <td>$good->stock2</td>
                    <td>$good->manufacturer</td>
                    <td>$good->signs</td>
                </tr>";
    }
    echo "</table>";
}

?>
