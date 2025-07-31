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



//ВАРИАНТ 2
echo "Второй вариант вывода -  упрощенный" . PHP_EOL;

echo "Введите Фамилию" . PHP_EOL;
$lastName = ucfirst(trim(fgets(STDIN)));

echo "Введите Имя" . PHP_EOL;
$firstName = ucfirst(trim(fgets(STDIN)));

echo "Введите Отчество" . PHP_EOL;
$middleName = ucfirst(trim(fgets(STDIN)));


$fullName = $lastName . " " . $firstName . " " . $middleName;
$fio = substr($lastName, 0, 1) . substr($firstName, 0, 1) . substr($middleName, 0, 1);
$surnameAndInitials = $lastName . " " . substr($firstName, 0, 1) . "." . substr($middleName, 0, 1) . ".";

echo "Полное имя: " . $fullName . PHP_EOL;
echo "Фамилия и инициалы: " .  $surnameAndInitials . PHP_EOL;
echo "Аббревиатура: " .  $fio . PHP_EOL;
?>
