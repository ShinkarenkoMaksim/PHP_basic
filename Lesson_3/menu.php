<!-----------------------Рабочий вариант--------------------------------
Были мысли сделать отдельный файл submenu.php, возможно, было бы лучше. Пока так-->
<?if(isset($key)): ?>
<br><?=$key?>:
<?endif;?>
<ul style="display: inline; padding-left: 0;">
<?foreach ($menu as $key => $item): if(!is_array($item)): ?>
    <li style="display: inline; margin-right: 20px"><a href='/?page=<?=$key?>'><?=$item?></a></li>
    <?else: renderMenu($item, $key);?>
<?endif;endforeach;?>
</ul><br>



<!------------------ Изначальное меню ------------------------------->
<!--
<p>Меню</p>
<ul>
    <li style="display: inline; margin-right: 20px"><a href='/'>Главная</a></li>
    <?/*foreach ($menu as $key => $item): */?>
        <li style="display: inline; margin-right: 20px"><a href='/?page=<?/*=$key*/?>'><?/*=$item*/?></a></li>
    <?/*endforeach;*/?>
</ul><br>


-->





<!--------------Попытка сделать вложенное меню номер раз - не гибко, нечитаемо------------------------------

<ul>
    <li style="display: inline; margin-right: 20px"><a href='/'>Главная</a></li>
    <?/*foreach ($menu as $key => $item):
        if (!is_array($item)):*/?>
            <li style="display: inline; margin-right: 20px"><a href='/?page=<?/*=$key*/?>'><?/*=$item*/?></a></li>
        <?/*else: */?>
            <p>Подменю <?/*=$key*/?></p>
            <?/*foreach ($item as $subkey => $subitem): */?>
                <li style="display: inline; margin-right: 20px"><a href='/?page=<?/*=$subkey*/?>'><?/*=$subitem*/?></a></li>
            <?/*endforeach*/?>
            <br>
        <?/*endif;*/?>
    <?/*endforeach;*/?>
</ul><br>-->