

<?php $__env->startSection('page-title', trans('app.reset_password')); ?>

<?php $__env->startSection('content'); ?>

  <?php echo $__env->make('backend.partials.messages', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

  <!-- LOGIN BEGIN -->
  <div class="login" style="background-image: url('/frontend/Default/img/_src/redirected-bg.png')">
    <div class="login__block">
      <div class="login__left">

        <form class="login-form" action="<?= route('frontend.password.remind.post') ?>" id="register-form" method="POST">
          <input type="hidden" value="<?= csrf_token() ?>" name="_token">
          <div class="input__group">
            <input type="text" id="email" name="email" placeholder="<?php echo app('translator')->get('app.email'); ?>" class="loginInput">
          </div>
          <button type="submit" class="login-btn btn"><?php echo app('translator')->get('app.log_in'); ?></button>
		  <span style="margin-top: 5px;">Back to login ? <a href="<?php echo e(url('login')); ?>" >Click here</a></span> 
        </form>
      </div>
    </div>
  </div>
  <!-- LOGIN END -->


<?php $__env->stopSection(); ?>

<?php $__env->startSection('scripts'); ?>
  <?php echo JsValidator::formRequest('VanguardLTE\Http\Requests\Auth\RegisterRequest', '#register-form'); ?>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('frontend.Default.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/casino/resources/views/frontend/Default/auth/password/remind.blade.php ENDPATH**/ ?>