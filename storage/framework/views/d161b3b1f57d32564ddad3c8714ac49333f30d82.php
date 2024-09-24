

<?php $__env->startSection('page-title', trans('app.change')); ?>
<?php $__env->startSection('page-heading', trans('app.change')); ?>

<?php $__env->startSection('content'); ?>

    <section class="content-header">
        <?php echo $__env->make('backend.partials.messages', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    </section>

    <section class="content">

        <form action="<?php echo e(route('backend.banks.update.do')); ?>" method="POST" class="pb-2 mb-3 border-bottom-light">
            <div class="box box-danger ">
                <div class="box-header with-border">
                    <input type="hidden" value="<?= csrf_token() ?>" name="_token">
                    <input type="hidden" value="<?php echo e(implode(',', $ids)); ?>" name="ids">
                    <h3 class="box-title"><?php echo app('translator')->get('app.change'); ?></h3>
                </div>
                <div class="box-body">
                    <div class="row">

                        <div class="col-md-12">
                            <ul>
                                <?php $__currentLoopData = $banks; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $bank): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <li><?php echo e($bank->shop ? $bank->shop->name : 'No shop'); ?></li>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </ul>
                        </div>

                        <?php
                            $percents = array_combine([''] + \VanguardLTE\GameBank::$values['banks'], ['---'] + \VanguardLTE\GameBank::$values['banks']);
                        ?>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label><?php echo app('translator')->get('app.slots'); ?></label>
                                <?php echo Form::select('slots', $percents, Request::get('percent'), ['class' => 'form-control']); ?>

                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label><?php echo app('translator')->get('app.little'); ?></label>
                                <?php echo Form::select('little', $percents, Request::get('percent'), ['class' => 'form-control']); ?>

                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label><?php echo app('translator')->get('app.table_bank'); ?></label>
                                <?php echo Form::select('table_bank', $percents, Request::get('percent'), ['class' => 'form-control']); ?>

                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label><?php echo app('translator')->get('app.fish'); ?></label>
                                <?php echo Form::select('fish', $percents, Request::get('percent'), ['class' => 'form-control']); ?>

                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label><?php echo app('translator')->get('app.bonus'); ?></label>
                                <?php echo Form::select('bonus', $percents, Request::get('percent'), ['class' => 'form-control']); ?>

                            </div>
                        </div>


                    </div>
                </div>
                <div class="box-footer">
                    <button type="submit" class="btn btn-primary">
                        <?php echo app('translator')->get('app.change'); ?>
                    </button>
                </div>
            </div>
        </form>



    </section>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('scripts'); ?>


<?php $__env->stopSection(); ?>
<?php echo $__env->make('backend.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/casino/resources/views/backend/dashboard/banks_change.blade.php ENDPATH**/ ?>