

<?php $__env->startSection('content'); ?>
    <div class="profile">
        <div class="general">
            <div class="profile__general--name"><span <?php if($player->isDead()): ?>style="color: red"<?php endif; ?>>Имя: <?php echo e($player->getName()); ?></span></div>
            <div class="profile__general--class">Класс: <?php echo e($player->getClassName()); ?></div>
            <div class="profile__general--race">Раса: <?php echo e($player->getRaceName()); ?></div>
            <div class="profile__general--level">Уровень: <?php echo e($player->getLevel()); ?></div>
            <div class="profile__general--expirience">
                Опыт: <?php echo e($player->getExpirience()); ?> / <?php echo e($player->getMaxExpirience()); ?>

            </div>

            <div class="profile__general--health">
                Здоровье: <?php echo e($player->getHealth()); ?> / <?php echo e($player->getMaxHealth()); ?>

            </div>

            <div class="profile__general--stamina">Выносливость: <?php echo e($player->getStamina()); ?> / <?php echo e($player->getMaxStamina()); ?></div>
            <div class="profile__general--mana">Мана: <?php echo e($player->getMana()); ?> / <?php echo e($player->getMaxMana()); ?></div>
        </div>

        <div class="characteristics">
            <div class="profile__characteristics--strength">Сила:<?php echo e($player->getStrength()); ?></div>
            <div class="profile__characteristics--armor">Броня:<?php echo e($player->getArmor()); ?></div>
            <div class="profile__characteristics--agility">Ловкость:<?php echo e($player->getAgility()); ?></div>
            <div class="profile__characteristics--intelligence">Интеллект:<?php echo e($player->getIntelligence()); ?></div>
            <div class="profile__characteristics--endurance">Выносливость:<?php echo e($player->getEndurance()); ?></div>
            <div class="profile__characteristics--speed">Скорость:<?php echo e($player->getSpeed()); ?></div>
            <div class="profile__characteristics--luck">Удача:<?php echo e($player->getluck()); ?></div>
        </div>
    </div>
<?php $__env->stopSection(); ?>


<?php echo $__env->make('app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH Z:\Web\domains\localhost\Resources\Views/profile/characteristics.blade.php ENDPATH**/ ?>