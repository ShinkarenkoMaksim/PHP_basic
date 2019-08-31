<h2>Корзина</h2>
<?foreach ($goods as $good): ?>
    <form action="/delGood/" method="GET">
        <a href="/item/<?=$good["id_good"]?>">
            <b><?=$good['name']?></b><br>
            <img width="150" src="/img/<?=$good['image']?>" alt=""></a><br>
        Цена: <?=$good['price']?><br>
        <input type="text" hidden value="<?=$good['id']?>" name="id">
        <input type="submit" value="Удалить">
    </form>
    <hr>
<? endforeach; ?>