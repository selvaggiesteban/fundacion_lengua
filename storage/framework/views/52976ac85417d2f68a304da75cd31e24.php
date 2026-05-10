<?php $__env->startSection('layoutContent'); ?>

<!-- Contenido -->
<?php echo $__env->yieldContent('content'); ?>
<!--/ Contenido -->

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts/commonMaster' , array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH /var/www/fundacion/resources/views/layouts/blankLayout.blade.php ENDPATH**/ ?>