<?php

// spl_autoload_register функция внутри php, мы с помощью ее вызываем все объявляемые классы внутри нашего приложения
spl_autoload_register(function ($class_name) {
    // include это внедряет код из указанных классов
    // Точка обозначает соединение строк

    include $class_name . '.php';
});

// Инициализируем объект / класс Player и передаем значения аргументам
// Записываем в локальную переменную $player

$player = new Player('Ikarus', 'archer');
$player->levelUp();
$player->levelUp();
$player->levelUp();
$player->levelUp();
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <h1>Игрок: <?php echo $player->getNickname() ?></h1>
    <div style="display: grid; grid-template-columns: 300px 400px">
        <div>
            <?php echo "Здоровье " . $player->getHealth() ?><br>
            <?php echo "Класс " . $player->getPlayerClass() ?><br>
            <?php echo "Мана " . $player->getMana() ?><br>
            <?php echo "Уровень " . $player->getLevel() ?><br>
            <?php echo "Опыт " . $player->getExpirience() . "/" . $player->getMaxExpirience() ?><br>

            <h3>Характеристики</h3>
            <?php echo "Сила " . $player->characteristics->getStrength() ?><br>
            <?php echo "Защита " . $player->characteristics->getArmor() ?><br>
            <?php echo "Ловкость " . $player->characteristics->getAgility() ?><br>
            <?php echo "Интеллект " . $player->characteristics->getIntelligence() ?><br>
            <?php echo "Выносливость " . $player->characteristics->getStamina() ?><br>
            <?php echo "Скорость " . $player->characteristics->getSpeed() ?><br>
            <?php echo "Удача " . $player->characteristics->getLuck() ?><br>
        </div>
        <div>
            <h2>Экипировка</h2>
            <?php echo $player->equipment->getWeapon()->getName(); ?><br>
            <hr>
            <?php echo $player->equipment->getHelmet()->getName() ?><br>
            <hr>
            <?php echo $player->equipment->getArmor()->getName() ?><br>
            <hr>
            <?php echo $player->equipment->getPants()->getName() ?><br>
            <hr>
            <?php echo $player->equipment->getBoots()->getName() ?><br>
            <hr>
            <?php echo $player->equipment->getAccessory()->getName() ?><br>
            <hr>
        </div>
    </div>
</body>
</html>