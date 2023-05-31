<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="/style.css">
</head>
<body>
<?php if(isset($posts_all)): ?>
    <?php $__currentLoopData = $posts_all; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $my_post): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <article>

            <h1> <?php echo $my_post->title; ?></h1>

            <?php echo $my_post->body; ?>

        </article>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
<?php endif; ?>


</body>
</html>
<?php /**PATH C:\Users\Pc World\OneDrive\سطح المكتب\sites\posts\resources\views/home.blade.php ENDPATH**/ ?>