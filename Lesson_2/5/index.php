<?php

/*function replaceText($template, $text, $content) {
    $template = str_replace($text, file_get_contents($content), $template);
    return $template;
}*/ //Вместо повторяющегося кода думал сделать отдельную функцию, но тогда повторяется вызов функции, код короче и понятнее почти не становится, кмк))

function renderTemplate($layout, $header, $menu, $content, $footer) {
    $template = file_get_contents($layout);

    //$template = replaceText($template, "{{MENU}}", $menu);
    $template = str_replace("{{MENU}}", file_get_contents($menu), $template);
    $template = str_replace("{{HEADER}}", file_get_contents($header), $template);
    $template = str_replace("{{CONTENT}}", file_get_contents($content), $template);
    $template = str_replace("{{FOOTER}}", file_get_contents($footer), $template);

    return $template;
}



echo renderTemplate("layout.tmpl", "header.tmpl", "menu.tmpl", "content.tmpl", "footer.tmpl");