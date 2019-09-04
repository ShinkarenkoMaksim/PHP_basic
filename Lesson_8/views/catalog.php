
<?foreach ($goods as $good): ?>
<div>
    <a href="/item/<?=$good["id"]?>">
    <b><?=$good['name']?></b><br>
    <img width="150" src="/img/<?=$good['image']?>" alt=""></a><br>
    Цена: <?=$good['price']?><br>
    <button class="buy" data-id="<?=$good['id']?>">Купить</button><hr>
</div>
<? endforeach; ?>
