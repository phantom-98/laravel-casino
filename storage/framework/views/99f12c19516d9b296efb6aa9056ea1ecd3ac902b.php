<?php $__env->startSection('page-title', trans('app.jpg')); ?>
<?php $__env->startSection('page-heading', trans('app.jpg')); ?>

<?php $__env->startSection('content'); ?>

    <section class="content-header">
        <?php echo $__env->make('backend.partials.messages', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    </section>

    <section class="content">

        <form action="<?php echo e(route('backend.jpgame.global_update')); ?>" method="POST" class="pb-2 mb-3 border-bottom-light">
            <div class="box box-danger ">
                <div class="box-header with-border">
                    <input type="hidden" value="<?= csrf_token() ?>" name="_token">
                    <input type="hidden" value="<?php echo e(implode(',', $ids)); ?>" name="ids">
                    <h3 class="box-title"><?php echo app('translator')->get('app.jpg'); ?></h3>
                </div>
                <div class="box-body">
                    <div class="row">

                        <div class="col-md-12">
                            <ul>
                                <?php $__currentLoopData = $jackpots; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $jackpot): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <li><?php echo e($jackpot->name); ?></li>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </ul>
                        </div>

                        <?php if(auth()->user()->hasRole('admin') ): ?>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label><?php echo app('translator')->get('app.balance'); ?></label>
                                    <input type="number" step="0.0000001" class="form-control" id="balance" name="balance" placeholder="">
                                </div>
                            </div>
                        <?php endif; ?>

                        <?php if( auth()->user()->hasPermission('jpgame.edit') ): ?>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label><?php echo app('translator')->get('app.start_balance'); ?></label>
                                <?php echo Form::select('start_balance', ['' => '---'] + \VanguardLTE\JPG::$values['start_balance'], '', ['class' => 'form-control']); ?>

                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label><?php echo app('translator')->get('app.trigger'); ?></label>
                                <?php echo Form::select('pay_sum', ['' => '---'] + \VanguardLTE\JPG::$values['pay_sum'], '', ['class' => 'form-control']); ?>

                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label><?php echo app('translator')->get('app.percent'); ?></label>
                                <?php
                                    $percents = array_combine(\VanguardLTE\JPG::$values['percent'], \VanguardLTE\JPG::$values['percent']);
                                ?>
                                <?php echo Form::select('percent', ['' => '---'] + $percents, '', ['class' => 'form-control']); ?>

                            </div>
                        </div>
                        <?php endif; ?>

                    </div>
                </div>
                <div class="box-footer">
                    <button type="submit" class="btn btn-primary">
                        <?php echo app('translator')->get('app.jpg'); ?>
                    </button>
                </div>
            </div>
        </form>



    </section>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('scripts'); ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('backend.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/casino/resources/views/backend/jpg/global.blade.php ENDPATH**/ ?>