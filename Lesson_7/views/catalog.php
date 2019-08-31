
<?foreach ($goods as $good): ?>
<form action="/addToBasket/" method="GET">
    <a href="/item/<?=$good["id"]?>">
    <b><?=$good['name']?></b><br>
    <img width="150" src="/img/<?=$good['image']?>" alt=""></a><br>
    Цена: <?=$good['price']?><br>
    <input type="text" hidden value="<?=$good['id']?>" name="good_id">
    <input type="submit" value="Купить">
</form>
    <hr>
<? endforeach; ?>
