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
    foreach ($goods as $key => $good) {
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

function show_goods_first_task($goods)
{
    $count1 = 0;
    $count2 = 0;
    $all_price = 0;
    $all_opt_price = 0;
    $count = 0;
    $max_price = 0;
    $min_opt_price = PHP_FLOAT_MAX;
    foreach ($goods as $key => $good) {
        $count++;
        $all_price += $good->price;
        $all_opt_price += $good->optPrice;
        $count1 += $good->stock1;
        $count2 += $good->stock2;
        if ($good->price > $max_price) {
            $max_price = $good->price;
        }
        if ($good->optPrice < $min_opt_price) {
            $min_opt_price = $good->optPrice;
        }
    }
    $avg_price = round($all_price / $count, 2);
    $avg_opt_price = round($all_opt_price / $count, 2);

    {
        echo "<table border='1'> ";
        echo "<p>Товары из базы данных:</p>";
        echo "<tr>
    <th>Наименование товара</th>
    <th>Стоимость, руб</th>
    <th>Стоимость опт, руб</th>
    <th>Наличие на складе 1, шт</th>
    <th>Наличие на складе 2, шт</th>
    <th>Страна производства</th>
    <th>Примечания</th>";
        foreach ($goods as $key => $good) {
            if ($good->price === $max_price) {
                echo "<tr bgcolor = red>";
            } else if ($good->optPrice === $min_opt_price) {
                echo "<tr bgcolor = green>";
            } else {
                echo "<tr> ";
            }

            echo " <td>$good->name</td>
                    <td>$good->price</td>
                    <td>$good->optPrice</td>
                    <td>$good->stock1</td>
                    <td>$good->stock2</td>
                    <td>$good->manufacturer</td>
                    <td>$good->signs</td>
                </tr>";
        }
        echo "<tr></tr>";
        echo "<tr>
        <td></td>
        <td>$avg_price</td>
        <td>$avg_opt_price</td>
        <td>$count1</td>
        <td>$count2</td>
    </tr>";
        echo "</table>";
    }
}
