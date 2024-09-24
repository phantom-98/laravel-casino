<div class="col-md-6">
    <div class="form-group">
        <label><?php echo app('translator')->get('app.sum'); ?></label>
        <input type="number" step="0.0000001" class="form-control" name="sum" value="<?php echo e($edit ? $welcome_bonus->sum : old('sum')); ?>" required >
    </div>
</div>
<div class="col-md-6">
    <div class="form-group">
        <label><?php echo app('translator')->get('app.type'); ?></label>
        <?php echo Form::select('type', \VanguardLTE\WelcomeBonus::$values['type'], $edit ? $welcome_bonus->type : old('type'), ['class' => 'form-control', 'disabled' => true]); ?>

    </div>
</div>
<div class="col-md-6">
    <div class="form-group">
        <label><?php echo app('translator')->get('app.bonus'); ?></label>
        <?php
            $bonuses = array_combine(\VanguardLTE\WelcomeBonus::$values['bonus'], \VanguardLTE\WelcomeBonus::$values['bonus']);
        ?>
        <?php echo Form::select('bonus', $bonuses, $edit ? $welcome_bonus->bonus : old('bonus'), ['class' => 'form-control']); ?>

    </div>
</div>

<div class="col-md-6">
    <div class="form-group">
        <label><?php echo app('translator')->get('app.wager'); ?></label>
        <?php echo Form::select('wager', \VanguardLTE\WelcomeBonus::$values['wager'], $edit ? $welcome_bonus->wager : old('wager'), ['class' => 'form-control']); ?>

    </div>
</div>

<?php /**PATH /var/www/casino/resources/views/backend/welcomebonuses/partials/base.blade.php ENDPATH**/ ?>