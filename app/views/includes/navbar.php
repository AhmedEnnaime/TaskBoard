<header>
    <div class="bg-blue-500">
        <ul class="flex flex-row justify-between pt-4">
            <li class="pl-4 h-16 w-16"><img src="<?php echo URLROOT; ?>/img/logo.png" alt=""></li>
            <li class="text-4xl">TaskBoard</li>
            <li class="pr-4 pb-4 relative profile">
                <img class="h-12 w-12 rounded-full cursor-pointer" src="<?php echo URLROOT; ?>/img/uploads/users/<?php echo $data["user"]->img; ?>" alt="">
                <div class="flex flex-col gap-y-2 bg-red-200 absolute mt-4 items-center -left-10 rounded-sm hidden dropdown">
                    <a class="px-8 hover:bg-[#56e5c1]" href="">Profile</a>
                    <a class="px-8 hover:bg-[#56e5c1]" href="<?php echo URLROOT; ?>/authenticate/logout">Logout</a>
                </div>
            </li>
        </ul>
    </div>
</header>