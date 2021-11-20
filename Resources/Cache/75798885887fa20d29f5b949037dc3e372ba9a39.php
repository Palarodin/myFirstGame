

<?php $__env->startSection('content'); ?>
    <p>Уровень данжа <?php echo e($level); ?></p>

    <div style="display: grid;
    grid-template-columns: repeat(2, 1fr);
    border-bottom: 1px solid #ccc;
    padding-bottom: 15px;
    margin-bottom: 15px;">
        <div>
            <p><?php echo e($player->getName()); ?></p>
            <p>Здоровье: <?php echo e($player->getHealth()); ?></p>
        </div>
        <div>
            <p><?php echo e($enemy->getName()); ?></p>
            <p>Здоровье: <?php echo e($enemy->getHealth()); ?></p>
        </div>
    </div>

    <h2>Журнал битвы</h2>
    <?php echo $battle->log(); ?>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH Z:\Web\domains\localhost\Resources\Views/dungeon_level.blade.php ENDPATH**/ ?>