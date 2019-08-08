<?
$year = 2019;
$title = "Главная страница - страница обо мне";
$header1 = "Информация обо мне";

$content = file_get_contents("site.tmpl");

$content = str_replace("{{YEAR}}", $year, $content);
$content = str_replace("{{TITLE}}", $title, $content);
$content = str_replace("{{HEADER1}}", $header1, $content);

echo $content;