<nav id="navigation" class="sticky top-0 inset-x-0 z-50 transition-all duration-300 shadow bg-white actives">
    <div class="bg-white/50">
        <div class="bg-white/50 w-full">
            <div class="container grid grid-cols-3 py-3 lg:py-7 px-3 lg:px-0">
                <div class="flex items-center">
                    <button data-toggle="target" data-target="#drawer" class="lg:hidden">
                        <svg class="w-7 h-7">
                            <use xlink:href="<?php echo e(asset('assets/images/icons.svg#menu')); ?>"></use>
                        </svg>
                    </button>
                    <a href="tel:<?php echo e($communication_settings->mobile); ?>" class="hidden lg:inline-block">
                        <svg class="w-7 h-7">
                            <use xlink:href="<?php echo e(asset('assets/images/icons.svg#phone')); ?>"></use>
                        </svg>
                    </a>
                </div>
                <div class="flex items-center justify-between lg:justify-center">
                    <a href="/">
                        <img src="<?php echo e($settings->site_logo); ?>" alt="" class="w-32 lg:w-56"/>

                    </a>
                </div>
                <div class="lg:hidden flex justify-end">
                    <button data-toggle="target" data-target="#searchBox"
                            class="flex items-center justify-center w-12 h-12">
                        <svg class="w-6 h-6">
                            <use xlink:href="<?php echo e(asset('assets/images/icons.svg#search')); ?>"></use>
                        </svg>
                    </button>
                </div>
                <form action="<?php echo e(route('search')); ?>" method="get" class="hidden group lg:flex items-center justify-end">
                    <input name="query" type="text"
                           class="bg-transparent outline-none border-b-2 border-b-gray-400 transition-all duration-300 w-0 group-open:w-44">
                    <button id="searchBtn" class="flex items-center justify-center w-14 h-14">
                        <svg class="w-6 h-6">
                            <use xlink:href="<?php echo e(asset('assets/images/icons.svg#search')); ?>"></use>
                        </svg>
                    </button>
                </form>
            </div>
        </div>

        <ul class="ُcontainer hidden lg:flex items-center justify-center font-semibold">
            <?php $__currentLoopData = $menus; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $menu): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                <li class="group/menu relative py-2">
                    <a href="<?php echo e($menu->url); ?>"
                       class="py-2 px-5 transition-all duration-300 hover:font-extrabold hover:text-primary relative before:absolute before:w-0.5 before:h-2.5 before:transition-all before:duration-300 before:opacity-0 group-hover/menu:before:opacity-100 before:bottom-0 before:right-1/2 before:bg-primary before:translate-x-1/2"><?php echo e($menu->title); ?></a>
                    <?php if($menu->children->isNotEmpty()): ?>

                        <div
                            class="absolute top-full right-0 pt-1 font-normal transition-all duration-300 group-hover/menu:translate-y-0 group-hover/menu:opacity-100 group-hover/menu:visible translate-y-4 opacity-0 invisible">
                            <ul class="flex flex-col bg-white group-active:bg-white shadow rounded min-w-56">
                                <?php $__currentLoopData = $menu->children; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $child): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                                    <li class="group/submenu block relative">
                                        <a href="<?php echo e($child->url); ?>"
                                           class="py-2 block px-3 transition-all duration-300 rounded hover:bg-gray-100 hover:text-primary"><?php echo e($child->title); ?></a>
                                        <?php if($child->children->isNotEmpty()): ?>

                                            <div
                                                class="absolute top-0 right-full pr-1 font-normal transition-all duration-300 group-hover/submenu:translate-x-0 group-hover/submenu:opacity-100 group-hover/submenu:visible -translate-x-4 opacity-0 invisible">
                                                <ul class="flex flex-col bg-white group-active:bg-white shadow rounded min-w-56 overflow-hidden">
                                                    <?php $__currentLoopData = $child->children; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $child2): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                                                        <li class="w-full">
                                                            <a href="<?php echo e($child2->url); ?>"
                                                               class="py-2 block px-3 transition-all duration-300 rounded hover:bg-gray-100 hover:text-primary"><?php echo e($child2->title); ?></a>
                                                        </li>
                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                </ul>
                                            </div>
                                        <?php endif; ?>
                                    </li>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </ul>
                        </div>
                    <?php endif; ?>
                </li>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </ul>
    </div>
</nav>

<div id="drawer"
     class="bg-black/80 group overflow-hidden transition-all duration-300 open:opacity-100 open:visible opacity-0 invisible fixed inset-0 z-50">
    <div
        class="w-3/4 bg-white h-full py-5 px-2 relative transition-all duration-300 translate-x-full group-open:translate-x-0">

            <span data-toggle="target" data-target="#drawer"
                  class="flex items-center justify-center w-8 h-8 absolute left-4 top-5">
                <svg class="w-7 h-7">
                    <use xlink:href="<?php echo e(asset('assets/images/icons.svg#close')); ?>"></use>
                </svg>        </span>

        <img src="<?php echo e(asset($settings->site_logo)); ?>" alt="" class="w-32 mx-auto"/>
        <ul class="divide-y-2 divide-y-gray-sm mt-6">
            <?php $__currentLoopData = $menus; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $menu): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <?php if($menu->children->isNotEmpty()): ?>
                    <li class="py-1 group/menu" data-toggle="collapse">
                        <a href="<?php echo e($menu->url); ?>" class="py-2 flex items-center justify-between"
                           data-toggle="collapse-header">
                            <?php echo e($menu->title); ?>

                            <svg class="w-4 h-4">
                                <use xlink:href="assets/images/icons.svg#angle-down"></use>
                            </svg>
                        </a>
                        <ul class="px-3 bg-gray-100 transition-all duration-300 overflow-hidden"
                            data-toggle="collapse-body">
                            <?php $__currentLoopData = $menu->children; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $child): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                                <li class="py-1" data-toggle="collapse">
                                    <a href="<?php echo e($child->url); ?>" class="py-2 flex items-center justify-between"
                                       data-toggle="collapse-header">
                                        <span><?php echo e($child->title); ?></span>
                                        <svg class="w-4 h-4">
                                            <use xlink:href="assets/images/icons.svg#angle-down"></use>
                                        </svg>
                                    </a>
                                    <?php if($child->children->isNotEmpty()): ?>
                                        <ul class="px-3 bg-gray-200  transition-all duration-300 overflow-hidden"
                                            data-toggle="collapse-body">
                                            <?php $__currentLoopData = $child->children; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $child2): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                                                <li class="py-1">
                                                    <a href="<?php echo e($child2->url); ?>"
                                                       class="py-2 block"><?php echo e($child2->title); ?></a>
                                                </li>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </ul>
                                    <?php endif; ?>
                                </li>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </ul>
                    </li>

                <?php else: ?>
                    <li class="py-1 group/menu">
                        <a href="<?php echo e($menu->url); ?>" class="py-2 flex items-center justify-between"
                           data-toggle="collapse-header">
                            <?php echo e($menu->title); ?>

                        </a>
                    </li>

                <?php endif; ?>

            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </ul>

    </div>
</div>
<div id="searchBox"
     class="fixed inset-0 z-50 invisible overflow-hidden transition-all duration-300 opacity-0 group open:opacity-100 open:visible">

    <div data-toggle="target" data-target="#searchBox" class="absolute inset-0 -z-10 bg-black/80"></div>
    <form action="<?php echo e(route('search')); ?>" method="get">
        <div
            class="px-3 py-5 transition-all duration-300 -translate-y-full bg-white group-open:translate-y-0 rounded-b-xl ">

            <input name="query" type="text" class="w-full px-3 py-3 rounded-lg outline-none bg-gray-100"
                   placeholder="جستجو"/>


            <div class="flex items-center justify-center mt-3">

                <button type="submit" class="gap-3 flex items-center rounded-lg py-2 px-3 bg-primary text-white">
                    <svg class="w-4 h-4">
                        <use xlink:href="<?php echo e(asset('assets/images/icons.svg#search')); ?>"></use>
                    </svg>
                    <span>جستجو</span>
                </button>

            </div>


        </div>
    </form>


</div>

<div class="fixed hidden  z-50 bg-white/80 top-64 right-0 text-dark lg:flex flex-col py-3 gap-2">
    <?php if(!is_null($communication_settings->whatsapp)): ?>

        <a href="<?php echo e($communication_settings->whatsapp); ?>"
           class="w-10 h-10 flex items-center justify-center transition-all duration-300 hover:text-primary">
            <svg class="w-6 h-6">
                <use xlink:href="<?php echo e(asset('assets/images/icons.svg#whatsapp')); ?>"></use>
            </svg>
        </a>
    <?php endif; ?>
    <?php if(!is_null($communication_settings->instagram)): ?>
        <a href="<?php echo e($communication_settings->instagram); ?>"
           class="w-10 h-10 flex items-center justify-center transition-all duration-300 hover:text-primary">
            <svg class="w-6 h-6">
                <use xlink:href="<?php echo e(asset('assets/images/icons.svg#instagram')); ?>"></use>
            </svg>
        </a>
    <?php endif; ?>
    <?php if(!is_null($communication_settings->telegram)): ?>
        <a href="<?php echo e($communication_settings->telegram); ?>"
           class="w-10 h-10 flex items-center justify-center transition-all duration-300 hover:text-primary">
            <svg class="w-6 h-6">
                <use xlink:href="<?php echo e(asset('assets/images/icons.svg#telegram')); ?>"></use>
            </svg>
        </a>
    <?php endif; ?>
    <?php if(!is_null($communication_settings->bale)): ?>

        <a href="<?php echo e($communication_settings->bale); ?>"
           class="w-10 h-10 flex items-center justify-center transition-all duration-300 hover:text-primary">
            <svg class="w-6 h-6">
                <use xlink:href="<?php echo e(asset('assets/images/icons.svg#bale')); ?>"></use>
            </svg>
        </a>
    <?php endif; ?>

</div>
<?php /**PATH D:\git\projects\Blogs\datissaze\resources\views/components/front/header/nav.blade.php ENDPATH**/ ?>