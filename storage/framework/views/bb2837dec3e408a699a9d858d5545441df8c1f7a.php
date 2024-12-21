
<section class="container space-y-3 lg:space-y-6 py-3 lg:py-16">
    <div class="border-r-4 border-primary h-7 hidden lg:block"></div>
    <div>
        <h3 class="font-semibold text-2xl lg:text-4xl text-primary border-r-4 lg:border-r-0 border-primary lg:pr-0 pr-3">تیم‌ما</h3>
        <h4 class="text-gray-500"> با یک تیم حرفه‌ای  کنارتان هستیم ...</h4>
    </div>
</section>
<div id="team">
        <?php $__currentLoopData = $staffs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $staff): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <div>
            <div class="relative overflow-hidden group aspect-[2/3] bg-cover bg-center" style="background-image: url(<?php echo e($staff->avatar); ?>)">
                <div class="bg-white/80 transition-all duration-300 text-center py-5 px-2 absolute inset-x-0 bottom-0 translate-y-full group-hover:translate-y-0">
                    <div class="text-xl lg:text-2xl font-semibold"><?php echo e($staff->name); ?></div>
                    <div class="text-lg lg:text-xl text-gray-500"><?php echo e($staff->job); ?></div>
                </div>
            </div>
        </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>



</div>
<?php /**PATH D:\git\projects\Blogs\datissaze\resources\views/components/front/team/home.blade.php ENDPATH**/ ?>