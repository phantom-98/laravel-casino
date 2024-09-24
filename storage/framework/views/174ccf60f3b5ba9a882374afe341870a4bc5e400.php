

<?php $__env->startSection('page-title', trans('app.banks')); ?>
<?php $__env->startSection('page-heading', trans('app.banks')); ?>

<?php $__env->startSection('content'); ?>

    <section class="content-header">
        <?php echo $__env->make('backend.partials.messages', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    </section>

    <section class="content">

            <form action="" id="games-form" method="GET">
                <div class="box box-danger collapsed-box banks_show">
                    <div class="box-header with-border">
                        <h3 class="box-title"><?php echo app('translator')->get('app.filter'); ?></h3>
                        <div class="box-tools pull-right">
                            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-plus"></i></button>
                        </div>
                    </div>
                    <div class="box-body">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label><?php echo app('translator')->get('app.search'); ?></label>
                                    <input type="text" class="form-control" name="search" value="<?php echo e(Request::get('search')); ?>" placeholder="<?php echo app('translator')->get('app.banks'); ?>">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label><?php echo app('translator')->get('app.percent'); ?></label>
                                    <?php echo Form::select('percent', ['' => '---'] + \VanguardLTE\Shop::$values['percent_labels'], Request::get('percent'), ['class' => 'form-control']); ?>

                                </div>
                            </div>

                            <div class="col-md-3">
                                <div class="form-group">
                                    <label><?php echo app('translator')->get('app.slots'); ?> From</label>
                                    <input type="text" class="form-control" name="slots_from" value="<?php echo e(Request::get('slots_from')); ?>">
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label><?php echo app('translator')->get('app.slots'); ?> To</label>
                                    <input type="text" class="form-control" name="slots_to" value="<?php echo e(Request::get('slots_to')); ?>">
                                </div>
                            </div>

                            <div class="col-md-3">
                                <div class="form-group">
                                    <label><?php echo app('translator')->get('app.little'); ?> From</label>
                                    <input type="text" class="form-control" name="little_from" value="<?php echo e(Request::get('little_from')); ?>">
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label><?php echo app('translator')->get('app.little'); ?> To</label>
                                    <input type="text" class="form-control" name="little_to" value="<?php echo e(Request::get('little_to')); ?>">
                                </div>
                            </div>

                            <div class="col-md-3">
                                <div class="form-group">
                                    <label><?php echo app('translator')->get('app.table_bank'); ?> From</label>
                                    <input type="text" class="form-control" name="table_from" value="<?php echo e(Request::get('table_from')); ?>">
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label><?php echo app('translator')->get('app.table_bank'); ?> To</label>
                                    <input type="text" class="form-control" name="table_to" value="<?php echo e(Request::get('table_to')); ?>">
                                </div>
                            </div>

                            <div class="col-md-3">
                                <div class="form-group">
                                    <label><?php echo app('translator')->get('app.fish'); ?> From</label>
                                    <input type="text" class="form-control" name="fish_from" value="<?php echo e(Request::get('fish_from')); ?>">
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label><?php echo app('translator')->get('app.fish'); ?> To</label>
                                    <input type="text" class="form-control" name="fish_to" value="<?php echo e(Request::get('fish_to')); ?>">
                                </div>
                            </div>

                            <div class="col-md-3">
                                <div class="form-group">
                                    <label><?php echo app('translator')->get('app.bonus'); ?> From</label>
                                    <input type="text" class="form-control" name="bonus_from" value="<?php echo e(Request::get('bonus_from')); ?>">
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label><?php echo app('translator')->get('app.bonus'); ?> To</label>
                                    <input type="text" class="form-control" name="bonus_to" value="<?php echo e(Request::get('bonus_to')); ?>">
                                </div>
                            </div>


                            <div class="col-md-3">
                                <div class="form-group">
                                    <label><?php echo app('translator')->get('app.rtp'); ?> From</label>
                                    <input type="text" class="form-control" name="rtp_from" value="<?php echo e(Request::get('rtp_from')); ?>">
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label><?php echo app('translator')->get('app.rtp'); ?> To</label>
                                    <input type="text" class="form-control" name="rtp_to" value="<?php echo e(Request::get('rtp_to')); ?>">
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label><?php echo app('translator')->get('app.order'); ?></label>
                                    <?php echo Form::select('sort_order', ['' => '---', 'asc' => 'Low', 'desc' => 'High'], $savedSortOrder, ['class' => 'form-control']); ?>

                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label><?php echo app('translator')->get('app.order'); ?></label>
                                    <?php echo Form::select('sort_field',
                                        [
                                            '' => '---',
                                            'percent' => 'Percent',
                                            'rtp' => 'RTP',
                                            'slots' => 'Slots',
                                            'little' => 'Little',
                                            'table_bank' => 'Table',
                                            'fish' => 'Fish',
                                            'bonus' => 'Bonus',
                                            'total' => 'Total',
                                        ],
                                    $savedSortFiled, ['class' => 'form-control']); ?>

                                </div>
                            </div>

                        </div>
                        <div class="row">




                        </div>
                    </div>
                    <div class="box-footer">
                        <button type="submit" class="btn btn-primary">
                            <?php echo app('translator')->get('app.filter'); ?>
                        </button>
                        <a href="?clear" class="btn btn-default">
                            <?php echo app('translator')->get('app.clear'); ?>
                        </a>

                    </div>
                </div>
            </form>

            <form action="<?php echo e(route('backend.banks.update')); ?>" method="POST" class="pb-2 mb-3 border-bottom-light">
                <div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title"><?php echo app('translator')->get('app.banks'); ?></h3>
                        <?php if( auth()->user()->hasRole('admin') ): ?>
                        <div class="pull-right box-tools">
                            <input type="hidden" value="<?= csrf_token() ?>" name="_token">
                            <button class="btn btn-block btn-primary btn-sm" type="submit"><?php echo app('translator')->get('app.change'); ?></button>
                        </div>
                        <?php endif; ?>
                    </div>
                    <div class="box-body">


                        <div class="table-responsive">
                            <table class="table table-bordered table-striped">
                                <thead>
                                <tr>
                                    <th><?php echo app('translator')->get('app.name'); ?></th>
                                    <th><?php echo app('translator')->get('app.credit'); ?></th>
                                    <th><?php echo app('translator')->get('app.percent'); ?></th>
                                    <th><?php echo app('translator')->get('app.rtp'); ?></th>
                                    <th><?php echo app('translator')->get('app.slots'); ?></th>
                                    <th><?php echo app('translator')->get('app.little'); ?></th>
                                    <th><?php echo app('translator')->get('app.table_bank'); ?></th>
                                    <th><?php echo app('translator')->get('app.fish'); ?></th>
                                    <th><?php echo app('translator')->get('app.bonus'); ?></th>
                                    <th><?php echo app('translator')->get('app.total'); ?></th>
                                    <th>
                                        <label class="checkbox-container">
                                            <input type="checkbox" class="checkAll">
                                            <span class="checkmark"></span>
                                        </label>
                                    </th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php if(count($banks)): ?>
                                    <?php $__currentLoopData = $banks; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $bank): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <?php if($bank->shop): ?>
                                        <tr>
                                            <td><?php echo e($bank->shop ? $bank->shop->name : 'No shop'); ?></td>
                                            <td><?php echo e($bank->shop ? $bank->shop->balance : ''); ?></td>
                                            <td><?php echo e($bank->shop ? $bank->shop->get_percent_label($bank->shop->percent) : ''); ?></td>
                                            <td><?php echo e($bank->get_rtp()); ?></td>
                                            <td><?php echo e($bank->slots); ?></td>
                                            <td><?php echo e($bank->little); ?></td>
                                            <td><?php echo e($bank->table_bank); ?></td>
                                            <td><?php echo e($bank->fish); ?></td>
                                            <td><?php echo e($bank->bonus); ?></td>
                                            <td><?php echo e($bank->total()); ?></td>
                                            <td>
                                                <label class="checkbox-container">
                                                    <input type="checkbox" name="checkbox[<?php echo e($bank->shop_id); ?>]">
                                                    <span class="checkmark"></span>
                                                </label>
                                            </td>
                                        </tr>
                                        <?php endif; ?>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                <?php else: ?>
                                    <tr><td colspan="11"><?php echo app('translator')->get('app.no_data'); ?></td></tr>
                                <?php endif; ?>
                                </tbody>
                                <thead>
                                <tr>
                                    <th><?php echo app('translator')->get('app.name'); ?></th>
                                    <th><?php echo app('translator')->get('app.credit'); ?></th>
                                    <th><?php echo app('translator')->get('app.percent'); ?></th>
                                    <th><?php echo app('translator')->get('app.rtp'); ?></th>
                                    <th><?php echo app('translator')->get('app.slots'); ?></th>
                                    <th><?php echo app('translator')->get('app.little'); ?></th>
                                    <th><?php echo app('translator')->get('app.table_bank'); ?></th>
                                    <th><?php echo app('translator')->get('app.fish'); ?></th>
                                    <th><?php echo app('translator')->get('app.bonus'); ?></th>
                                    <th><?php echo app('translator')->get('app.total'); ?></th>
                                    <th>
                                        <label class="checkbox-container">
                                            <input type="checkbox" class="checkAll">
                                            <span class="checkmark"></span>
                                        </label>
                                    </th>
                                </tr>
                                </thead>
                            </table>
                        </div>
                    </div>
                </div>
            </form>



    </section>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('scripts'); ?>

    <script>

        $("#filter").detach().appendTo("div.toolbar");


        $('.btn-box-tool').click(function(event){
            if( $('.banks_show').hasClass('collapsed-box') ){
                $.cookie('banks_show', '1');
            } else {
                $.removeCookie('banks_show');
            }
        });

        if( $.cookie('banks_show') ){
            $('.banks_show').removeClass('collapsed-box');
            $('.banks_show .btn-box-tool i').removeClass('fa-plus').addClass('fa-minus');
        }

    </script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('backend.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/casino/resources/views/backend/dashboard/banks.blade.php ENDPATH**/ ?>