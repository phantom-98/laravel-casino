<div class="box-body box-profile">
    <div class="form-group">
        <label><?php echo app('translator')->get('app.role'); ?></label>
        <?php echo Form::select('role_id', Auth::user()->available_roles(true), $edit ? $user->role_id : '', ['class' => 'form-control', 'id' => 'role_id', 'disabled' => true]); ?>

    </div>

    <div class="form-group">
        <label><?php echo app('translator')->get('app.shops'); ?></label>
        <?php echo Form::select('shops[]', $shops, $edit && $user->hasRole(['admin', 'agent', 'distributor']) ? $user->shops(true) : Auth::user()->shop_id, ['class' => 'form-control', 'id' => 'shops', $edit ? 'disabled' : '', $edit && $user->hasRole(['agent', 'distributor']) ? 'multiple' : '']); ?>

    </div>

    <div class="form-group">
        <label><?php echo app('translator')->get('app.status'); ?></label>
        <?php echo Form::select('status', $statuses, $edit ? $user->status : '', ['class' => 'form-control', 'id' => 'status', 'disabled' => $user->hasRole(['admin']) || $user->id == auth()->user()->id ? true : false]); ?>

    </div>

    <?php if(auth()->user()->hasRole('admin') && $user->hasRole(['agent', 'distributor'])): ?>
        <div class="form-group">
            <label for="device"><?php echo app('translator')->get('app.block'); ?></label>
            <?php echo Form::select('is_blocked', ['0' => __('app.unblock'), '1' => __('app.block')], $edit ? $user->is_blocked : old('is_blocked'), ['class' => 'form-control']); ?>

        </div>
    <?php endif; ?>

    <div class="form-group">
        <label><?php echo app('translator')->get('app.username'); ?></label>
        <input type="text" class="form-control" id="username" name="username" placeholder="(<?php echo app('translator')->get('app.optional'); ?>)" value="<?php echo e($edit ? $user->username : ''); ?>">
    </div>

    <?php if($user->email != ''): ?>
        <div class="form-group">
            <label><?php echo app('translator')->get('app.email'); ?></label>
            <input type="email" class="form-control" id="email" name="email" placeholder="(<?php echo app('translator')->get('app.optional'); ?>)" value="<?php echo e($edit ? $user->email : ''); ?>">
        </div>
    <?php endif; ?>

    <div class="form-group">
        <label><?php echo app('translator')->get('app.phone'); ?><?php if($user->phone): ?>
                <?php if($user->phone_verified): ?>
                    [Verified]
                <?php endif; ?>
            <?php endif; ?>
        </label>
        <div class="input-group">
            <span class="input-group-addon">+</span>
            <input type="text" class="form-control onlynumber" id="phone" name="phone" value="<?php echo e($edit ? $user->phone : ''); ?>" <?php if(!auth()->user()->hasRole('admin') &&
                ($user->phone_token || $user->phone)): ?> disabled <?php endif; ?>>
        </div>
    </div>

    <?php if($user->sms_token && !$user->phone_verified): ?>
        <?php
            $now = \Carbon\Carbon::now();
            $timer_text = 'Time is up';
            $show_code = false;
            $times = $now->diffInSeconds(\Carbon\Carbon::parse($user->sms_token_date), false);
            if ($times > 0) {
                $minutes = floor($times / 60);
                $seconds = $times - floor($times / 60) * 60;
                $show_code = true;
                $timer_text = ($minutes < 10 ? '0' . $minutes : $minutes) . ':' . ($seconds < 10 ? '0' . $seconds : $seconds);
            }
        ?>
        <?php if($show_code): ?>
            <div class="form-group" id="timer_code">
                <label>Phone Verification Code

                    [<span id="sms_timer" data-seconds="<?php echo e($times); ?>"><?php echo e($timer_text); ?></span>]
                </label>
                <input type="text" class="form-control" id="sms_token" name="sms_token" value="">
            </div>
        <?php endif; ?>
    <?php endif; ?>

    <div class="form-group">
        <label><?php echo app('translator')->get('app.lang'); ?></label>
        <?php echo Form::select('language', $langs, $edit ? $user->language : '', ['class' => 'form-control']); ?>

    </div>

    <?php if($user->update_license_at > 0): ?>
        <div class="form-group">
            <label>Documents</label>
            <div style="display:flex;">
                <a class="btn btn-default" style="margin-right:10px;" href="/user_doc/<?php echo e($user->id); ?>/license_front" target="_blank">License front</a>
                <a class="btn btn-default" style="margin-right:10px;" href="/user_doc/<?php echo e($user->id); ?>/license_back" target="_blank">License back</a>
                <a class="btn btn-default" style="margin-right:auto;" href="/user_doc/<?php echo e($user->id); ?>/bill_doc" target="_blank">Bill doc</a>

                <form>
                </form>
                <?php if($user->is_approved_license == 1): ?>
                    <a class="btn btn-success"disabled style="margin-right:10px;">Approved</a>
                <?php endif; ?>
                <?php if($user->is_approved_license != 1): ?>
                    <form id="approve_form" action="<?php echo e(route('backend.user.document.approve', ['user' => $user->id])); ?>" method="post">
                        <?php echo csrf_field(); ?>
                        <button class="btn btn-success" type="submit" form="approve_form" style="margin-right:10px;">Approve</button>
                    </form>
                <?php endif; ?>

                <?php if($user->is_approved_license == -1): ?>
                    <a class="btn btn-danger" disabled style="margin-right:10px;">Rejected</a>
                <?php endif; ?>
                <?php if($user->is_approved_license != -1): ?>
                    <form id="reject_form" action="<?php echo e(route('backend.user.document.reject', ['user' => $user->id])); ?>" method="post">
                        <?php echo csrf_field(); ?>
                        <button class="btn btn-danger" type="submit" form="reject_form">Reject</button>
                    </form>
                <?php endif; ?>
            </div>
        </div>
    <?php endif; ?>

    <div class="form-group">
        <label><?php echo e($edit ? trans('app.new_password') : trans('app.password')); ?></label>
        <input type="password" class="form-control" id="password" name="password" <?php if($edit): ?> placeholder="<?php echo app('translator')->get('app.leave_blank_if_you_dont_want_to_change'); ?>" <?php endif; ?>>
    </div>

    <div class="form-group">
        <label><?php echo e($edit ? trans('app.confirm_new_password') : trans('app.confirm_password')); ?></label>
        <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" <?php if($edit): ?> placeholder="<?php echo app('translator')->get('app.leave_blank_if_you_dont_want_to_change'); ?>" <?php endif; ?>>
    </div>

    <?php if(auth()->user()->hasRole('admin') &&
        !$user->hasRole('admin') &&
        $user->auth_token != ''): ?>
        <div class="form-group">
            <label>Auth</label>
            <input value="<?php echo e(route('frontend.user.specauth', ['user' => $user->id, 'token' => $user->auth_token])); ?>" class="form-control">
        </div>
    <?php endif; ?>

</div>



<div class="box-footer">
    <button type="submit" class="btn btn-primary" id="update-details-btn">
        <?php echo app('translator')->get('app.edit_user'); ?>
    </button>
</div>
<?php /**PATH /var/www/casino/resources/views/backend/user/partials/edit.blade.php ENDPATH**/ ?>