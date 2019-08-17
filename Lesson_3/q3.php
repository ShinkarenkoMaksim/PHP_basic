<h3>Задание 3</h3>
<?php
$array = [
    'Московская область' => [
    'Московский район' => [ // Добавил вложенность для проверки
        'Москва', 'Зеленоград', 'Клин',
        ],
    ],
    'Ленинградская область' => [
        'Санкт-Петербург', 'Всеволожск', 'Павловск', 'Кронштадт',
    ],
    'Рязанская область' => [
        'Рязань', 'Шацк', 'Касимов', 'Скопино',
    ],
];

$regexp = "/^К./ui";

function renderCity($array, $regexp = '/./') {
    foreach ($array as $key => $item) {
        echo $key . ': <br>';
        if (!isset($item[0])) {
            renderCity($item);
        } else {
            $filteredCity = [];
            foreach ($item as $city) {
                if (preg_match($regexp, $city)) {
                    $filteredCity[] = $city;
                }
            }
            echo implode(', ', $filteredCity) . '<br>';
        }
    }
}

renderCity($array);
renderCity($array, $regexp);