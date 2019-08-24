<?php
require_once "db.php";

if (isset($_GET['del'])) {
    $id = (int)$_GET['del'];
    $result = @mysqli_query($db, "DELETE FROM news WHERE id = {$id}");
    header("Location: /");
}

$result = @mysqli_query($db, "SELECT * FROM `news` WHERE true");

if ($result)
while ($row = mysqli_fetch_assoc($result)) {
    echo "<p><a href='news.php?id={$row['id']}'>{$row['prev']}</a><a href='?del={$row['id']}'>[X]</a></p>";
}