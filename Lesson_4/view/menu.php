<?if(isset($key)): ?>
<br><?=$key?>:
<?endif;?>
<ul style="display: inline; padding-left: 0;">
<?foreach ($params as $key => $item): if(!isset($item['submenu'])): ?>
    <li style="display: inline; margin-right: 20px"><a href='/?page=<?=$item['href']?>'><?=$item['title']?></a></li>
    <?else: renderTemplate('menu', $item['submenu']);?>
<?endif;endforeach;?>
</ul><br>
