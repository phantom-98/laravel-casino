<?php $__env->startSection('page-title', trans('app.register')); ?>

<?php $__env->startSection('content'); ?>

  <?php echo $__env->make('backend.partials.messages', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

  <!-- LOGIN BEGIN -->
  <div class="login" style="background-image: url('/frontend/Default/img/_src/redirected-bg.png')">
    <div class="login__block">
      <div class="login__left">

        <form class="login-form" action="<?= route('frontend.register.post') ?>" id="register-form" method="POST">
          <input type="hidden" value="<?= csrf_token() ?>" name="_token">
          <div class="input__group">            
			  <input type="text" id="username" name="username" placeholder="<?php echo app('translator')->get('app.username'); ?>" class="loginInput">
          </div>
		  <?php if(settings('use_email')): ?>
          <div class="input__group">
            <input type="text" id="email" name="email" placeholder="<?php echo app('translator')->get('app.email'); ?>" class="loginInput">
          </div>
		  <?php endif; ?>
          <div class="input__group">
            <input type="password" id="password" name="password" placeholder="<?php echo app('translator')->get('app.password'); ?>" class="loginInput">
          </div>
          <div class="input__group">
            <input type="password" id="password_confirmation" name="password_confirmation" placeholder="<?php echo app('translator')->get('app.confirm_password'); ?>" class="loginInput">
          </div>
          <button type="submit" class="login-btn btn"><?php echo app('translator')->get('app.register'); ?></button>
Please enter your details here to register!
        </form>
      </div>
    </div>
  </div>
  <!-- LOGIN END -->


<?php $__env->stopSection(); ?>

<?php $__env->startSection('scripts'); ?>
  <?php echo JsValidator::formRequest('VanguardLTE\Http\Requests\Auth\RegisterRequest', '#register-form'); ?>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('frontend.Default.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/casino/resources/views/frontend/Default/auth/register.blade.php ENDPATH**/ ?>