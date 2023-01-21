<header>
    <div class="bg-blue-700">
        <ul class="flex flex-row justify-between pt-4">
            <li class="pl-4 h-16 w-16"><a href="<?php echo URLROOT; ?>"><img src="<?php echo URLROOT; ?>/img/logo.png" alt=""></a></li>
            <li class="text-4xl text-white"><a href="<?php echo URLROOT; ?>">TaskBoard</a></li>
            <li class="pr-4 pb-4 relative profile">
                <img class="h-12 w-12 rounded-full cursor-pointer border-2 border-black border-solid" src="<?php echo URLROOT; ?>/img/uploads/users/<?php echo $data["user"]->img; ?>" alt="">
                <div class="flex flex-col gap-y-2 bg-blue-200 absolute mt-4 items-center -left-10 rounded-sm hidden dropdown">
                    <a class="px-8 hover:bg-[#56e5c1]" href="<?php echo URLROOT; ?>/users/profile/<?php echo $data["user"]->id; ?>">Profile</a>
                    <a class="px-8 hover:bg-[#56e5c1]" href="<?php echo URLROOT; ?>/authenticate/logout">Logout</a>
                </div>
            </li>
        </ul>
    </div>
</header>