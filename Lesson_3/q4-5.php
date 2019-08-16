<h3>Задания 4-5</h3>
<?
$alphabet = [
        'а' => 'a',   'б' => 'b',   'в' => 'v',
        'г' => 'g',   'д' => 'd',   'е' => 'e',
        'ё' => 'e',   'ж' => 'zh',  'з' => 'z',
        'и' => 'i',   'й' => 'y',   'к' => 'k',
        'л' => 'l',   'м' => 'm',   'н' => 'n',
        'о' => 'o',   'п' => 'p',   'р' => 'r',
        'с' => 's',   'т' => 't',   'у' => 'u',
        'ф' => 'f',   'х' => 'h',   'ц' => 'c',
        'ч' => 'ch',  'ш' => 'sh',  'щ' => 'sch',
        'ь' => '\'',  'ы' => 'y',   'ъ' => '\'',
        'э' => 'e',   'ю' => 'yu',  'я' => 'ya'
		];

$text = 'Какой-то текст, который нужно транслитерировать!';
echo $text . '<br>';

function translit ($str, $alphabet) {
    $result = "";
    for ($i = 0; $i < mb_strlen($str); $i++) {
        $symbol = mb_substr($str, $i, 1);
        if (isset($alphabet[mb_strtolower($symbol)])) {
            if (mb_strtolower($symbol) == $symbol) {
                $result .= $alphabet[$symbol];
            } else {
                $result .= mb_strtoupper($alphabet[mb_strtolower($symbol)]);
            }
        } else {
            if ($symbol == " ") {
                $result .= "_";
            } else {
                $result .= $symbol;
            }
        }
    }
    return $result;
}

echo translit($text, $alphabet);