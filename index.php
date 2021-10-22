<?php

spl_autoload_register(function ($class_name) {
    include $class_name . '.php';
});

$player = new Actor('Ikarus', 'Human', 'Warrior');
$player->levelUp();
$player->levelUp();
$player->levelUp();
$player->levelUp();
$player->levelUp();
$player->addExpirience(32000);

echo '<pre>';
var_dump($player);
echo "</pre>"

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
<h1>Игрок: <?php echo $player->getName() ?></h1>
<div style="display: grid; grid-template-columns: 300px 400px">
    <div>
        <?php echo "Здоровье " . $player->getHealth() ?><br>
        <?php echo "Класс " . $player->getClassName() ?><br>
        <?php echo "Раса " . $player->getRaceName() ?><br>
        <?php echo "Мана " . $player->getMana() ?><br>
        <?php echo "Уровень " . $player->getLevel() ?><br>

        <?php echo "Опыт " . $player->getExpirience() ?><br>
        <?php echo "Макс. опыт " . $player->getMaxExpirience() ?><br>


        <h3>Характеристики</h3>
        <?php echo "Сила " . $player->getCharacteristics()['strength'] ?><br>
        <?php echo "Защита " . $player->getCharacteristics()['armor'] ?><br>
        <?php echo "Ловкость " . $player->getCharacteristics()['agility'] ?><br>
        <?php echo "Интеллект " . $player->getCharacteristics()['intelligence'] ?><br>
        <?php echo "Выносливость " . $player->getCharacteristics()['endurance'] ?><br>
        <?php echo "Скорость " . $player->getCharacteristics()['speed'] ?><br>
        <?php echo "Удача " . $player->getCharacteristics()['luck'] ?><br>
    </div>
    <div>
        <h2>Экипировка</h2>
<!--        --><?php //echo $player->equipment->getWeapon()->getName(); ?><!--<br>-->
<!--        <hr>-->
<!--        --><?php //echo $player->equipment->getHelmet()->getName() ?><!--<br>-->
<!--        <hr>-->
<!--        --><?php //echo $player->equipment->getArmor()->getName() ?><!--<br>-->
<!--        <hr>-->
<!--        --><?php //echo $player->equipment->getPants()->getName() ?><!--<br>-->
<!--        <hr>-->
<!--        --><?php //echo $player->equipment->getBoots()->getName() ?><!--<br>-->
<!--        <hr>-->
<!--        --><?php //echo $player->equipment->getAccessory()->getName() ?><!--<br>-->
<!--        <hr>-->
    </div>
</div>
</body>
</html>