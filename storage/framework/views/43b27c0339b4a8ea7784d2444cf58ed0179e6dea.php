<?php $__env->startSection('page-title', trans('app.security')); ?>
<?php $__env->startSection('page-heading', trans('app.security')); ?>

<?php $__env->startSection('content'); ?>

    <section class="content-header">
        <?php echo $__env->make('backend.partials.messages', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    </section>

    <section class="content">


        <form action="" method="GET" id="securities-form" >
            <div class="box box-danger collapsed-box securities_show">

                <div class="box-header with-border">
                    <h3 class="box-title"><?php echo app('translator')->get('app.filter'); ?></h3>
                    <div class="box-tools pull-right">
                        <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-plus"></i></button>
                    </div>
                </div>
                <div class="box-body">
                    <div class="row">
                        <div class="col-md-6">
                            <label><?php echo app('translator')->get('app.type'); ?></label>
                            <?php echo Form::select('type', ['' => '---', 'user' => 'User', 'game' => 'Game', 'shop' => 'Shop'], Request::get('type'), ['class' => 'form-control']); ?>

                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label> <?php echo app('translator')->get('app.date'); ?></label>
                                <div class="input-group">
                                    <button type="button" class="btn btn-default pull-right" id="daterange-btn">
                                        <span><i class="fa fa-calendar"></i> <?php echo e(Request::get('dates_view') ?: __('app.date_start_picker')); ?></span>
                                        <i class="fa fa-caret-down"></i>
                                    </button>
                                </div>
                                <input type="hidden" id="dates_view" name="dates_view" value="<?php echo e(Request::get('dates_view')); ?>">
                                <input type="hidden" id="dates" name="dates" value="<?php echo e(Request::get('dates')); ?>">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="box-footer">
                    <button type="submit" class="btn btn-primary">
                        <?php echo app('translator')->get('app.filter'); ?>
                    </button>
                </div>

            </div>
        </form>

        <div class="box box-primary">
            <div class="box-header with-border">
                <h3 class="box-title"><?php echo app('translator')->get('app.security'); ?></h3>
            </div>
            <div class="box-body">


                <div class="table-responsive">
                    <table class="table table-bordered table-striped">
                        <thead>
                        <tr>
                            <th><?php echo app('translator')->get('app.name'); ?></th>
                            <th><?php echo app('translator')->get('app.in'); ?></th>
                            <th><?php echo app('translator')->get('app.out'); ?></th>
                            <th><?php echo app('translator')->get('app.total'); ?></th>
                            <th><?php echo app('translator')->get('app.balance'); ?></th>
                            <th><?php echo app('translator')->get('app.rtp'); ?></th>
                            <th><?php echo app('translator')->get('app.win'); ?></th>

                            <th><?php echo app('translator')->get('app.count2'); ?></th>
                            <th><?php echo app('translator')->get('app.shop'); ?></th>
                            <th><?php echo app('translator')->get('app.date'); ?></th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php if(count($securities)): ?>
                            <?php $__currentLoopData = $securities; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $security): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <?php if($security->shop): ?>
                                    <tr>
                                        <td>
                                            <?php if( strripos($security->type, 'user')  !== false ): ?>
                                                <a href="<?php echo e(route('backend.user.edit', $security->item_id)); ?>">
                                                    <?php echo e($security->user->username); ?>

                                                </a>
                                            <?php elseif( strripos($security->type, 'shop')  !== false ): ?>
                                                <a href="<?php echo e(route('backend.shop.edit', $security->item_id)); ?>">
                                                    <?php echo e($security->shop->name); ?>

                                                </a>
                                            <?php else: ?>
                                                <a href="<?php echo e(route('backend.game.edit', $security->item_id)); ?>">
                                                    <?php echo e($security->game->name); ?>

                                                </a>
                                            <?php endif; ?>
                                            <br>
                                            <?php echo e($security->category); ?>

                                        </td>
                                        <td><?php echo e($security->pay_in); ?></td>
                                        <td><?php echo e($security->pay_out); ?></td>
                                        <td><?php echo e($security->pay_total); ?></td>
                                        <td><?php echo e($security->balance); ?></td>
                                        <td><?php echo e($security->rtp); ?></td>
                                        <td><?php echo e($security->win); ?></td>
                                        <td><?php echo e($security->count); ?></td>
                                        <td>
                                            <?php if( $security->shop ): ?>
                                                <a href="<?php echo e(route('backend.shop.edit', $security->shop_id)); ?>">
                                                    <?php echo e($security->shop->name); ?>

                                                </a>
                                            <?php endif; ?>
                                        </td>
                                        <td><?php echo e(\Carbon\Carbon::parse($security->created_at)->format(config('app.time_format'))); ?></td>
                                    </tr>
                                <?php endif; ?>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        <?php else: ?>
                            <tr><td colspan="10"><?php echo app('translator')->get('app.no_data'); ?></td></tr>
                        <?php endif; ?>
                        </tbody>
                        <thead>
                        <tr>
                            <th><?php echo app('translator')->get('app.name'); ?></th>
                            <th><?php echo app('translator')->get('app.in'); ?></th>
                            <th><?php echo app('translator')->get('app.out'); ?></th>
                            <th><?php echo app('translator')->get('app.total'); ?></th>
                            <th><?php echo app('translator')->get('app.balance'); ?></th>
                            <th><?php echo app('translator')->get('app.rtp'); ?></th>
                            <th><?php echo app('translator')->get('app.win'); ?></th>
                            <th><?php echo app('translator')->get('app.count2'); ?></th>
                            <th><?php echo app('translator')->get('app.shop'); ?></th>
                            <th><?php echo app('translator')->get('app.date'); ?></th>
                        </tr>
                        </thead>
                    </table>

                    <?php echo e($securities->links()); ?>


                </div>
            </div>
        </div>



    </section>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('scripts'); ?>

    <script>

        $("#filter").detach().appendTo("div.toolbar");

        $('.btn-box-tool').click(function(event){
            if( $('.securities_show').hasClass('collapsed-box') ){
                $.cookie('securities_show', '1');
            } else {
                $.removeCookie('securities_show');
            }
        });

        if( $.cookie('securities_show') ){
            $('.securities_show').removeClass('collapsed-box');
            $('.securities_show .btn-box-tool i').removeClass('fa-plus').addClass('fa-minus');
        }


    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('backend.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/casino/resources/views/backend/dashboard/security.blade.php ENDPATH**/ ?>