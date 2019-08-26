<?=$error?>


<?foreach ($gallery as $item):?>

<a href="/img/<?=$item['id']?>"><img src="<?=IMG_SMALL_DIR . $item['name']?>"></a>

<?endforeach;?>
