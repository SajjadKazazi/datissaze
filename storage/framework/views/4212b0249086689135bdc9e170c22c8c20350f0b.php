
<!DOCTYPE html>
<html lang="fa" dir="rtl">
<head>
    <meta charset="UTF-8"/>

    <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
    <meta name="viewport" content="width=device-width,initial-scale=1"/>
    <link rel="shortcut icon" href="<?php echo e(asset($settings->favicon)); ?>">

    

    <?php echo SEOMeta::generate(); ?>

    <?php echo OpenGraph::generate(); ?>

    <link rel="stylesheet" href="<?php echo e(asset('assets/css/main.css?v=6')); ?>">

</head>
<body>

<?php if (isset($component)) { $__componentOriginal2208af7b6c22f1953cd359834a8e5a611d0105b5 = $component; } ?>
<?php $component = App\View\Components\Front\Header\Nav::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('front.header.nav'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\Front\Header\Nav::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal2208af7b6c22f1953cd359834a8e5a611d0105b5)): ?>
<?php $component = $__componentOriginal2208af7b6c22f1953cd359834a8e5a611d0105b5; ?>
<?php unset($__componentOriginal2208af7b6c22f1953cd359834a8e5a611d0105b5); ?>
<?php endif; ?>

<?php echo $__env->yieldContent('content'); ?>

<?php if (isset($component)) { $__componentOriginalbf763e563599e5cb7f3a7d9e2571db55a8f77394 = $component; } ?>
<?php $component = App\View\Components\Front\Footer\Section::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('front.footer.section'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\Front\Footer\Section::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalbf763e563599e5cb7f3a7d9e2571db55a8f77394)): ?>
<?php $component = $__componentOriginalbf763e563599e5cb7f3a7d9e2571db55a8f77394; ?>
<?php unset($__componentOriginalbf763e563599e5cb7f3a7d9e2571db55a8f77394); ?>
<?php endif; ?>

<script src="/bundle.js?v=5"></script>

</body>
</html>
<?php /**PATH D:\git\projects\Blogs\datissaze\resources\views/front/layouts/main.blade.php ENDPATH**/ ?>