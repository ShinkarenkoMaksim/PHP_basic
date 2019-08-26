
<?=$error?>

<img src="<?=IMG_BIG_DIR . $img['name']?>">
<p><?=$img['views']?> просмотров</p>

<h4>Отзывы</h4>

<?=$error?>

<form action="<?=$params['row']['url']?>/<?=$params['row']['action']?>" method="post">
    Оставьте отзыв: <br>
    <input hidden type="text" name="id" value="<?=$params['row']['id']?>"><br>
    <input type="text" name="name" placeholder="Ваше имя" value="<?=$params['row']['name']?>"><br><br>
    <textarea name="feedback" placeholder="Ваш отзыв" cols="30" rows="5"><?=$params['row']['text']?></textarea><br>
    <input type="submit" value="<?=$params['row']['submit']?>">
</form>
<?if ($_GET['message'] == 'OK'): ?>
    <p>Отзыв добавлен</p>
<?endif?>
<?if ($_GET['message'] == 'del'): ?>
    <p>Отзыв удалён</p>
<?endif?>
<?if ($_GET['message'] == 'save'): ?>
    <p>Отзыв изменён</p>
<?endif?>
<?if (!$feedback): ?>
<p>Здесь пока нет отзывов</p>
<?endif;?>
<?foreach ($feedback as $item): ?>
    <p>
        <b><?=$item['name']?>:</b> <?=$item['feedback']?>
        <a href="<?=$params['row']['url']?>/edit/?id=<?=$item['id']?>">[править]</a>
        <a href="<?=$params['row']['url']?>/del/?id=<?=$item['id']?>">[x]</a><br>
    </p>
<?endforeach;?>