<? if (!$allow): ?>
<form action="/login/" method="post">
    <input type='text' name='login' placeholder='Логин'>
    <input type='password' name='pass' placeholder='Пароль'>
    Save? <input type='checkbox' name='save'>
    <input type='submit' name='send'>
</form>
<?else:?>
Добро пожаловать, <?=$user?> <a href='/logout/'>выход</a><br>


<?endif;?>



<a href="/">Главная</a>
<a href="/news/">Новости</a>
<a href="/catalog/">Каталог</a>
<a href="/feedback/">Отзывы</a>
<? if (!is_admin()): ?>
<a href="/basket/">Корзина <span id="counter"><?=$count?></span></a>
<a href="/order/">Заказы</a>
<?endif;?>
<? if (is_admin()): ?>
<a href="/order/">Админка заказов</a>
<?endif;?>