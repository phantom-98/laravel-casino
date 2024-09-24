

<?php $__env->startSection('page-title', trans('app.pyour_withdraw')); ?>
<?php $__env->startSection('page-heading', trans('app.pyour_withdraw')); ?>

<?php $__env->startSection('content'); ?>

<section class="content-header">
    <?php echo $__env->make('backend.partials.messages', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
</section>

<section class="content">
    <div class="tableList">
        <table class="table bg-white text-center">
            <thead>
                <tr>
                    <th scope="col">UserName</th>
                    <th scope="col">Amount</th>
                    <th scope="col">Wallet</th>
                    <!-- <th scope="col">Shop</th> -->
                    <th scope="col">Status</th>
                    <th scope="col">Created At</th>
                    <th scope="col">Confirmed At</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                <?php $__currentLoopData = $withdraws; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $withdraw): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr class="fw-bold">
                    <td><?php echo e($withdraw->user->username); ?></td>
                    <td><?php echo e($withdraw->amount); ?> <?php echo e($withdraw->currency); ?></td>
                    <td><?php echo e($withdraw->wallet); ?></td>
                    <!-- <td><?php echo e($withdraw->shop->name); ?></td> -->
                    <td>
                        <?php if(!$withdraw->status): ?>
                        <a href="#" class="btn btn-xs btn-primary">Pending</a>
                        <?php elseif($withdraw->status==1): ?>
                        <a href="#" class="btn btn-xs btn-success">Approved</a>
                        <?php elseif($withdraw->status==2): ?>
                        <a href="#" class="btn btn-xs btn-danger">Rejected</a>
                        <?php endif; ?>
                    </td>
                    <td><?php echo e($withdraw->created_at); ?></td>
                    <td><?php echo e($withdraw->confirmed_at); ?></td>
                    <td>
                        <?php if(!$withdraw->status): ?>
                        <a href="<?php echo e(route('backend.withdraw.confirm', ['withdraw'=>$withdraw->id, 'status'=>1])); ?>"
                           class="btn btn-success btn-xs"
                           data-method="PUT"
                           data-confirm-title="Please Confirm"
                           data-confirm-text="Are you sure approve?"
                           data-confirm-delete="Approve">
                            Approve
                        </a>
                        <a href="<?php echo e(route('backend.withdraw.confirm', ['withdraw'=>$withdraw->id, 'status'=>2])); ?>"
                           class="btn btn-danger btn-xs"
                           data-method="PUT"
                           data-confirm-title="Please Confirm"
                           data-confirm-text="Are you sure reject?"
                           data-confirm-delete="Reject">
                            Reject
                        </a>
                        <?php endif; ?>
                    </td>
                </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                <?php if(count($withdraws) == 0): ?>
                <tr>
                    <td colspan="10">
                        <div class="noData">
                            No diplay data.
                        </div>
                    </td>
                </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
</section>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('scripts'); ?>
<script>

</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('backend.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/casino/resources/views/backend/withdraw/list.blade.php ENDPATH**/ ?>