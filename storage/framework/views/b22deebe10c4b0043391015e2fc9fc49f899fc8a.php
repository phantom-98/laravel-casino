<div class="modal fade cusModel" id="terminalAdd" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">

        <div class="modal-content text-center">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">
                    <?php echo app('translator')->get('app.add_new_terminal'); ?>
                </h5>
            </div>
            <form action="<?php echo e(url('backend/terminal/create')); ?>" method="POST">
                <?php echo csrf_field(); ?>
                <div class="modal-body">
                    <table class="table vm table-bordered">
                        <tr>
                            <td class="">Username</td>
                            <td><input type="text" name="username" required class="form-control"></td>
                            <td class="">Status</td>
                            <td><?php echo Form::select('status', $response['statuses'], '',
                                ['class' => 'form-control', 'id' => 'status', '']); ?></td>
                        </tr>
                        <tr>
                            <td class="">Password</td>
                            <td><input type="password" name="password" class="form-control"></td>
                            <td class="">Confirm Password</td>
                            <td><input type="password" name="cpassword" class="form-control"></td>
                        </tr>
                    </table>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </form>
        </div>
    </div>
</div><?php /**PATH D:\Working\slots\casino\resources\views/backend/terminal/modals/terminal_add.blade.php ENDPATH**/ ?>