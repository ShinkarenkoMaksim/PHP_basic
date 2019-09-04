<h2>Корзина</h2>


<?foreach ($basket as $item):?>
    <div id="item_<?=$item['basket_id']?>">
        <?=$item['name']?> <br>
        <img src="/img/<?= $item['image'] ?>" width="150">
        <br>
        <button class="delete" id="<?=$item['basket_id']?>">Удалить</button>
        <br>
        Цена: <?=$item['price']?>  <br>
    </div>
<?endforeach;?>
<br>

Общая стоимость: <span id="summ"><?=$summ?></span><br>
<h2>Оформите заказ</h2>
<form action="/order/add/" method="post">
    <input placeholder="Ваше имя" type="text" name="name">
    <input placeholder="Телефон" type="text" name="phone">
    <input placeholder="Адрес доставки" type="text" name="address">
    <input type="submit">
</form>