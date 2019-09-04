<h2>Корзина</h2>
<? if (is_admin()):?>
    <? foreach ($order as $item):?>
        <hr>
        <p>
            <span>Номер заказа: <?=$item['id']?>,</span>
            <span>Имя: <?=$item['name']?>,</span>
            <span>Телефон: <?=$item['phone']?>,</span>
            <span>Адрес: <?=$item['address']?>,</span>

            <select name="stat"
                    id="stat_<?=$item['id']?>" data-id="<?=$item['id']?>" class="stat">
                <option value="new" <? if ($item['stat'] == 'new'):?>selected<?endif;?>>Новый</option>
                <option value="process" <? if ($item['stat'] == 'process'):?>selected<?endif;?>>В обработке</option>
                <option value="completed" <? if ($item['stat'] == 'completed'):?>selected<?endif;?>>Выполнен</option>
                <option value="canceled" <? if ($item['stat'] == 'canceled'):?>selected<?endif;?>>Отменен</option>
            </select>
        </p>
        <? if (!is_null($item['basket'])): ?>
            <?foreach ($item['basket'] as $item):?>
                <div id="item_<?=$item['basket_id']?>">
                    <img src="/img/<?= $item['image'] ?>" width="50">
                    <button class="delete" id="<?=$item['basket_id']?>">Удалить</button>
                    Цена: <?=$item['price']?>
                    <hr>
                </div>

            <?endforeach;?>
        <? endif; ?>
        <br>
        <hr>
    <?endforeach;?>
<? else: ?>

    <? foreach ($order as $item):?>
        <hr>
        <p>
            <span>Номер заказа: <?=$item['id']?>,</span>
            <span>Имя: <?=$item['name']?>,</span>
            <span>Телефон: <?=$item['phone']?>,</span>
            <span>Адрес: <?=$item['address']?>,</span>
            <span id="stat_<?=$item['id']?>">Статус: <?=$item['status']?></span>
            <button class="cancel" data-id="<?=$item['id']?>">Отменить</button>
        </p>
        <? if (!is_null($item['basket'])): ?>
            <?foreach ($item['basket'] as $item):?>
                <div id="item_<?=$item['basket_id']?>">
                    <img src="/img/<?= $item['image'] ?>" width="50">
                    Цена: <?=$item['price']?>
                    <hr>
                </div>

            <?endforeach;?>
        <? endif; ?>
        <br>

        <hr>
    <?endforeach;?>


<?endif;?>