<h3>Задание 3</h3>
<?php
$array = [
    'Московская область' => [
        'Москва', 'Зеленоград', 'Клин',
    ],
    'Ленинградская область' => [
        'Санкт-Петербург', 'Всеволожск', 'Павловск', 'Кронштадт',
    ],
    'Рязанская область' => [
        'Рязань', 'Шацк', 'Касимов', 'Скопино',
    ],
];

foreach ($array as $key => $item) {
    echo $key . ': <br>' . implode(', ', $item) .'<br>';
}

foreach ($array as $key => $item) {
    $regexp = "/^К./ui";
    $filteredCity = [];
    foreach ($item as $city) {
        if (preg_match($regexp, $city)) {
            $filteredCity[] = $city;
        }
    }
    echo $key . ': <br>' . implode(', ', $filteredCity) .'<br>';
}