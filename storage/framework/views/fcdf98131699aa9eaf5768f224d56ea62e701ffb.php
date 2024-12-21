<div class="grid grid-cols-1 lg:grid-cols-2 gap-6 container py-3 lg:py-16">
    <div class="">
        <img class="object-cover aspect-square" src="<?php echo e(asset('/uploads/main/call-center.webp')); ?>" alt="">
    </div>
    <form method="post" name="contactForm" class="space-y-6" action="<?php echo e(route('front.contact.store')); ?>">
        <?php echo csrf_field(); ?>
        <div class="flex flex-col">
            <label for="name">نام نام خانواندگی:</label>
            <input type="text" id="name" name="name" class="border-2 border-gray-300 py-1.5 px-2 outline-none w-full">
        </div>
        <div class="flex flex-col">
            <label for="subject">موضوع:</label>
            <select type="text" name="subject_type" id="subject"
                    class="border-2 border-gray-300 py-1.5 px-2 outline-none w-full">
                <option value="COUNSELING"> درخواست مشاوره</option>
                <option value="COOPERATION">درخواست همکاری</option>
                <option value="EDUCATION"> درخواست آموزش</option>


            </select>
        </div>
        <div class="flex flex-col">
            <label for="mobile">تلفن همراه:</label>
            <input type="text" id="mobile" name="mobile"
                   class="border-2 border-gray-300 py-1.5 px-2 outline-none w-full">
        </div>
        <div class="flex flex-col">
            <label for="message">پیغام:</label>
            <textarea id="message" name="message"
                      class="border-2 border-gray-300 py-1.5 px-2 outline-none w-full min-h-44"></textarea>
        </div>
        <button type="submit"
                class="text-white  bg-primary transition-all duration-300 py-4 px-6 hover:bg-primary-second text-center relative before:bg-white before:w-0.5 before:h-3 before:absolute before:top-0 before:right-1/2 before:translate-x-1/2 w-full">
            پیامتان را برای ما ارسال کنید
        </button>
    </form>
    <?php if($errors->any()): ?>
        <div data-toggle="alert" data-time="5000" class="alert alert-error">
            <div class="alert-wrapper grow">
                <svg class="">
                    <use xlink:href="../assets/images/icons.svg#file"></use>
                </svg>
                <span>
              لطفا خطا های ورودی را برطرف کنید
           </span></div>
            <span data-toggle="dismis" class="alert-dismis"> <svg class=""> <use
                        xlink:href="../assets/images/icons.svg#close"></use> </svg> </span></div>
    <?php endif; ?>
    <?php if(session()->has('success_add')): ?>
        <div data-toggle="alert" data-time="5000" class="alert alert-success">
            <div class="alert-wrapper grow">
                <svg class="">
                    <use xlink:href="../assets/images/icons.svg#file"></use>
                </svg>
                <span>
               <?php echo e(session()->get('success_add')); ?>

           </span></div>
            <span data-toggle="dismis" class="alert-dismis"> <svg class=""> <use
                        xlink:href="../assets/images/icons.svg#close"></use> </svg> </span></div>

    <?php endif; ?>
</div>
<?php /**PATH D:\git\projects\Blogs\datissaze\resources\views/components/front/contact/section.blade.php ENDPATH**/ ?>