<script src="https://code.jquery.com/jquery-3.3.1.js" integrity="sha256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60=" crossorigin="anonymous"></script>
<p>
<form id = "filter" method="get">
    <b>Показать товары, у которых</b>
    <select id="opt">
        <option value="price">
            Розничная цена
        </option>
        <option value="opt_price">
            Оптовая цена
        </option>
    </select>
    <b>от</b>
    <label for="from"></label>
    <input id="from" type="text" />
    <b>до</b>
    <input id="before" type="text" />
    <b>рублей и на складе</b>
    <select id="qnt">
        <option value="more">
            Более
        </option>
        <option value="less">
            Менее
        </option>
    </select>
    <input id="stock" type="text"/>
    <b>штук.</b>
    <input type="submit" name="btn" id="filterBtn" value="Показать товары" />
</form>
</p>

<script type="text/javascript">
    $(document).ready(function() {
        $('#filter').submit(function(e) {
            e.preventDefault();
            let from = $('#from').val();
            let before = $('#before').val();
            let stock = $('#stock').val();
            let valid = true;
            $(".error").remove();
            if(from.length<1||from<0||!$.isNumeric(from)) {
                $('#from').after('<span class="error" style="color:red">Неправильное значение</span>');
                valid = false;
            }
            if(before.length<1||before<0||!$.isNumeric(before)) {
                $('#before').after('<span class="error" style="color:red">Неправильное значение</span>');
                valid = false;
            }
            if(stock.length<1||stock<0||!$.isNumeric(stock)) {
                $('#stock').after('<span class="error" style="color:red">Неправильное значение</span>');
                valid = false;
            }
            if(valid) {
                $.ajax({
                    type: "GET",
                    url: 'http://localhost:63342/brainforce/goods_parser/public/data.php?price=' + $('#opt').val() +
                        '&from=' + from + '&before=' + before + '&qnt=' + qnt +
                        '&stock=' + stock,
                    data: $(this).serialize(),
                    success: function (data) {
                        $('.results').html(data);
                    }
                });
            }
        });
    });
</script>

<div class="results">Нажмите показать</div>
