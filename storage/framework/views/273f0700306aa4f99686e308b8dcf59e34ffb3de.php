<?php /* /var/www/html/sispenka/resources/views/layouts/loginlayout.blade.php */ ?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
<?php echo $__env->make('layouts.header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<body class="hold-transition login-page">
<div class="login-box">
<?php echo $__env->yieldContent('apps'); ?>
</div>
</body>
<?php echo $__env->make('layouts.scripts', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
</html>
