
<section class="container space-y-3 lg:space-y-6 py-3 lg:py-16">
    <div class="border-r-4 border-primary h-7 hidden lg:block"></div>
    <div>
        <h3 class="font-semibold text-2xl lg:text-4xl text-primary border-r-4 lg:border-r-0 border-primary lg:pr-0 pr-3">
            خدمات</h3>
        <h4 class="text-gray-500"></h4>
    </div>
    <div class="grid grid-cols-2 lg:grid-cols-4">

        <?php $__currentLoopData = $services; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $service): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <a href="<?php echo e(route('front.single.services',$service->slug)); ?>"
               class="border-2 transition-background group duration-300 hover:border-primary text-center text-lg border-gray-300 flex flex-col items-center pt-6 lg:pt-20 pb-4 lg:pb-14 px-5">
                <img src="<?php echo e(asset($service->image)); ?>" alt="" class="lg:w-44 w-24 h-24 lg:h-44 text-primary group-hover:text-current">
                
                
                
                <div class="mt-6 lg:mt-10 space-y-4 lg:space-y-6">
                    <h3 class="text-xl lg:text-4xl font-semibold "><?php echo e($service->title); ?></h3>
                    <div class=" invisible opacity-0 group-hover:visible group-hover:opacity-100">بیشتر ...</div>
                </div>

            </a>

        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

    </div>
</section>
<?php /**PATH D:\git\projects\Blogs\datissaze\resources\views/components/front/services/home.blade.php ENDPATH**/ ?>