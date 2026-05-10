<!-- BEGIN: Theme CSS-->
<!-- Fonts -->
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

<link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&ampdisplay=swap" rel="stylesheet">

<?php echo app('Illuminate\Foundation\Vite')(['resources/assets/vendor/fonts/remixicon/remixicon.scss']); ?>
<!-- Core CSS -->
<?php echo app('Illuminate\Foundation\Vite')([
  'resources/assets/vendor/scss/core.scss',
  'resources/assets/vendor/scss/theme-default.scss',
  'resources/assets/css/demo.css'
]); ?>

<!-- Vendor Styles -->
<?php echo $__env->yieldContent('vendor-style'); ?>

<!-- Page Styles -->
<?php echo $__env->yieldContent('page-style'); ?>
<?php /**PATH /var/www/fundacion/resources/views/layouts/sections/styles.blade.php ENDPATH**/ ?>