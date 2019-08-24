<?php
require_once "db.php";

$id = (int)$_GET['id'];


$result = mysqli_query($db, "SELECT * FROM `news` WHERE id = {$id}");

if ($result)
$row = mysqli_fetch_assoc($result);
echo "<p>{$row['text']}</p>";

echo "<a href='/'>Назад</a>";