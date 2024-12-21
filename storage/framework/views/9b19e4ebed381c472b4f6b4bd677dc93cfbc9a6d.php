
<header class="">
    <div id="slider" class=" overflow-hidden aspect-[13/5] relative">
        <?php $__currentLoopData = $sliders; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $slider): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <a href="<?php echo e($slider->action); ?>" target="_blank">
                <img class="w-full" src="<?php echo e($slider->img); ?>" alt="<?php echo e($slider->title); ?>" />
            </a>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

    </div>
</header>

<?php /**PATH D:\git\projects\Blogs\datissaze\resources\views/components/front/header/slider.blade.php ENDPATH**/ ?>