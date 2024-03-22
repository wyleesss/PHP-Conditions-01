<?php
session_id(0);

$firstNumber = 20;
$secondNumber = 2;
$month = 2;
$year = 2024;

function is_leap(int $year) : bool {
    return $year % 4 == 0 && !($year % 100 == 0 && $year % 400 != 0);
};

echo "First Number = $firstNumber<br>
      Second Number = $secondNumber<br>
      Month = $month<br>
      Year = $year<hr>".PHP_EOL;

// завдання 1:
echo "1.<br>";
if ($secondNumber == 0) {
    echo "Некоректний ввід - Second Number = $secondNumber";
}
else {
    echo "$firstNumber " . ($firstNumber % $secondNumber == 0 ? "є" : "не є") . " кратним $secondNumber";
}
echo "<hr>".PHP_EOL;

//завдання 2:
echo "2.<br>".($firstNumber > $secondNumber ? $firstNumber ** 2 : $secondNumber ** 2)."<hr>".PHP_EOL;

//завдання 3:
echo "3.<br>Днів в Month = ".match($month){
    1, 3, 5, 7, 8, 10, 12 => 31,
    2 => is_leap($year) ? 29 : 28,
    4, 6, 9, 11 => 30,
    default => "Некоректний ввід"
}."<hr>".PHP_EOL;

//завдання 4:
echo "4.<br>$year ".(is_leap($year) ? "є " : "не є ")."високосним<hr>".PHP_EOL;

//завдання 5:
echo "5.<br>";
if ($firstNumber % 3 == 0 && $secondNumber % 3 == 0) {
    echo $firstNumber + $secondNumber;
}
elseif ($secondNumber != 0) {
    echo $firstNumber / $secondNumber;
}
else {
    echo "Некоректний ввід - Second Number = $secondNumber";
}
echo "<hr>".PHP_EOL;

//завдання 6:
echo "6.<br>Session ID: ".session_id()."<br>";
switch(session_id()) {
    case "0":
        include("registration_form.html");
        break;
    case "1":
        include("login_form.html");
        break;
    default:
        echo "Error - Unknown Session ID";
        break;
};
echo "<hr>".PHP_EOL;

//завдання 7:
echo "7.<br>";
include("draw_inputs_form.html");

if ($_SERVER['REQUEST_METHOD'] == "POST" && isset($_POST['submit'])
    && isset($_POST['x_pos'], $_POST['y_pos'], $_POST['height'], $_POST['width'], $_POST['color'])) {

    $x_pos = $_POST['x_pos'];
    $y_pos = $_POST['y_pos'];
    $height = $_POST['height'];
    $width = $_POST['width'];
    $color = $_POST['color'];

    if ($x_pos > 1300 || $x_pos < 0 || $y_pos > 1000 || $y_pos < 0) {
        echo "<b>Error - Position isn`t valid.<b>";
    }
    else {
        echo "<div style=\"position: absolute;
                   left: $x_pos;
                   top: $y_pos;
                   height: $height;
                   width: $width;
                   background-color: $color\"></div>";
    }
}