<?php
function getNewsContent($id){
    $id = (int)$id;

    $sql = "SELECT * FROM news WHERE id = {$id}";
    $news = getAssocResult($sql);

    //В случае если новости нет, вернем пустое значение
    $result = [];
    if(isset($news[0]))
        $result = $news[0];

    return $result;
}


function getNews()
{
    $sql = "SELECT * FROM news";
    $news = getAssocResult($sql);
    // var_dump($news);
    return $news;
}