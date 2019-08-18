<div id="main">
    <div class="post_title"><h2>Моя галерея</h2></div>
    <div class="gallery">
        <?foreach ($images as $img): ?>
        <a rel="gallery" class="photo" href="..<?=BIG_IMG_DIR?><?=$img?>"><img src="..<?=SMALL_IMG_DIR?><?=$img?>" width="150" height="100" /></a>
        <?endforeach;?>
    </div>
</div>