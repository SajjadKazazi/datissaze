<section class="container lg:space-y-6 py-6 lg:py-16">
    <div class="border-r-4 hidden lg:block border-primary h-7"></div>
    <div class="flex flex-col lg:flex-row items-center gap-6">
        <div class="lg:w-1/3 shrink-0 flex lg:flex-col gap-5 items-start">
            <img src="<?php echo e(asset($settings['site_logo'])); ?>" class=" w-1/2 lg:w-64" alt="">
            <a href="/pages/about-us" class="border-2 border-gray-300 lg:text-xl w-1/2 lg:w-64 text-center rounded-lg transition-all duration-300 hover:bg-primary hover:border-primary hover:text-white py-3 px-4">با ما بیشتر آشنا شوید</a>
        </div>
        <div class="w-full lg:w-2/3 space-y-4 text-lg">
            <div class="flex items-center gap-4">
                <svg class="w-8 h-8 shrink-0">
                    <use xlink:href="<?php echo e(asset('assets/images/icons.svg#location')); ?>"></use>
                </svg>
                <p>
                    <?php echo e($settings['address']); ?>

                </p>
            </div>

            <div class="flex items-center gap-4">
                <svg class="w-8 h-8 shrink-0">
                    <use xlink:href="<?php echo e(asset('assets/images/icons.svg#phone-circle')); ?>"></use>
                </svg>                <p><a href="tel:<?php echo e($settings['tel']); ?>"><?php echo e(fixPersianCharNum($settings['tel'])); ?></a></p>
            </div>
        </div>
    </div>
</section>
<footer class="bg-primary py-3 text-white">
    <div class="container flex flex-col lg:flex-row items-center ">
        <div class="lg:w-1/3 flex items-center gap-2">
            <?php if(!is_null($settings['bale'])): ?>
                <a href="<?php echo e($settings['bale']); ?>" class="p-1 transition-all duration-300 hover:text-secondary">
                    <svg class="w-7 h-7">
                        <use xlink:href="<?php echo e(asset('assets/images/icons.svg#bale')); ?>"></use>
                    </svg>
                </a>
            <?php endif; ?>
            <?php if(!is_null($settings['instagram'])): ?>
                <a href="<?php echo e($settings['instagram']); ?>" class="p-1 transition-all duration-300 hover:text-secondary">
                    <svg class="w-7 h-7">
                        <use xlink:href="<?php echo e(asset('assets/images/icons.svg#instagram')); ?>"></use>
                    </svg>
                </a>
            <?php endif; ?>
            <?php if(!is_null($settings['telegram'])): ?>

                <a href="<?php echo e($settings['telegram']); ?>" class="p-1 transition-all duration-300 hover:text-secondary">
                    <svg class="w-7 h-7">
                        <use xlink:href="<?php echo e(asset('assets/images/icons.svg#telegram')); ?>"></use>
                    </svg>
                </a>
            <?php endif; ?>
            <?php if(!is_null($settings['whatsapp'])): ?>
                <a href="<?php echo e($settings['whatsapp']); ?>" class="p-1 transition-all duration-300 hover:text-secondary">
                    <svg class="w-7 h-7">
                        <use xlink:href="<?php echo e(asset('assets/images/icons.svg#whatsapp')); ?>"></use>
                    </svg>
                </a>
            <?php endif; ?>
        </div>
        <ul class="lg:w-2/3 hidden lg:flex items-center py-2">
            <?php $__currentLoopData = $footer_menus; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $menu): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                <li>
                    <a href="<?php echo e($menu->url); ?>" class="py-2 px-5 transition-all duration-300 hover:text-secondary"><?php echo e($menu->title); ?></a>
                </li>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </ul>
    </div>

    <div class="container mt-6 opacity-50 font-thin text-center lg:text-right">
        <span>تمامی حقوق مادی و معنوی این وبسایت محفوظ <a href="/"></a> است</span>
    </div>
</footer>
<?php /**PATH D:\git\projects\Blogs\datissaze\resources\views/components/front/footer/section.blade.php ENDPATH**/ ?>