<!-- Core JS -->
<?php echo app('Illuminate\Foundation\Vite')([
  'resources/assets/vendor/js/helpers.js',
  'resources/assets/js/main.js',
  'resources/js/app.js'
]); ?>

<?php echo $__env->yieldContent('vendor-script'); ?>
<?php echo $__env->yieldContent('page-script'); ?><?php /**PATH /var/www/fundacion/resources/views/layouts/sections/scripts.blade.php ENDPATH**/ ?>