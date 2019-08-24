

<?foreach ($gallery as $item):?>

<a href="/img/?id=<?=$item['id']?>"><img src="<?=IMG_SMALL_DIR . $item['name']?>"></a>

<?endforeach;?>
