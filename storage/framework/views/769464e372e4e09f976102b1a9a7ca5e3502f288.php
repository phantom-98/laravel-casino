<?php $__env->startSection('page-title', trans('app.edit_welcome_bonus')); ?>
<?php $__env->startSection('page-heading', $welcome_bonus->title); ?>

<?php $__env->startSection('content'); ?>

<section class="content-header">
<?php echo $__env->make('backend.partials.messages', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
</section>

    <section class="content">

      <div class="box box-default">
		<?php echo Form::open(['route' => array('backend.welcome_bonus.update', $welcome_bonus->id), 'files' => true, 'id' => 'user-form']); ?>

        <div class="box-header with-border">
          <h3 class="box-title"><?php echo app('translator')->get('app.edit_welcome_bonus'); ?></h3>
        </div>

        <div class="box-body">
          <div class="row">
            <?php echo $__env->make('backend.welcomebonuses.partials.base', ['edit' => true], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
          </div>
        </div>

        <div class="box-footer">
        <button type="submit" class="btn btn-primary">
            <?php echo app('translator')->get('app.edit_welcome_bonus'); ?>
        </button>
		<?php if (\Auth::user()->hasPermission('welcome_bonuses.delete')) : ?>
        <a href="<?php echo e(route('backend.welcome_bonus.delete', $welcome_bonus->id)); ?>"
           class="btn btn-danger"
           data-method="DELETE"
           data-confirm-title="<?php echo app('translator')->get('app.please_confirm'); ?>"
           data-confirm-text="<?php echo app('translator')->get('app.are_you_sure_delete_welcome_bonus'); ?>"
           data-confirm-delete="<?php echo app('translator')->get('app.yes_delete_him'); ?>">
            <?php echo app('translator')->get('app.delete_welcome_bonus'); ?>
        </a>
		<?php endif; ?>
        </div>
		<?php echo Form::close(); ?>

      </div>
    </section>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('backend.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/casino/resources/views/backend/welcomebonuses/edit.blade.php ENDPATH**/ ?>