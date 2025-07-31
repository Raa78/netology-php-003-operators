<?php
$customerCard = [
    "lastName" => null,
    "firstName" => null,
    "middleName" => null,
    "fullName" => null,
    "surnameAndInitials" => null,
    "fio" => null,
];

$listRequests = [
    "lastName" =>  "Введите Фамилию",
    "firstName" => "Введите Имя",
    "middleName" => "Введите Отчество",
];


function requestPersonalData()
{
    global $customerCard;
    global $listRequests;

    foreach ($listRequests as $key => $value) {

        echo $value . PHP_EOL;

        $data =  ucfirst(trim(fgets(STDIN)));
        echo "поток>>>" . $data . PHP_EOL;

        // Для инициалов
        $slice = mb_substr($data, 0, 1, "utf-8");

        // Закидываем данные  в lastName, firstName, middleName
        $customerCard[$key] = $data;

        // Закидываем данные fullName
        $customerCard["fullName"] .= $key === "middleName" ? $data : $data . " ";

        // Готовим данные и закидываем в surnameAndInitials
        $customerCard["surnameAndInitials"] .= $key === "lastName" ? $data . " " : $slice . ".";

        // Готовим данные и закидываем в fio
        $customerCard["fio"] .= $slice;

    }

    return;
}

requestPersonalData();
echo "Полное имя: " . $customerCard["fullName"] . PHP_EOL;
echo "Фамилия и инициалы: " . $customerCard["surnameAndInitials"] . PHP_EOL;
echo "Аббревиатура: " .  $customerCard["fio"] . PHP_EOL;


echo "Второй вариант вывода -  упрощенный"

// $fullName = 'Иванов Иван Иванович';
// $fio = 'ИИИ';
// $surnameAndInitials = 'Иванов И.И.';

// echo "Полное имя: " . $fullName . PHP_EOL;
// echo "Фамилия и инициалы: " .  $fio . PHP_EOL;
// echo "Аббревиатура: " .  $surnameAndInitials . PHP_EOL;



?>
