<html lang="en">

<?php require APPROOT . '/views/includes/header.php'; ?>

<body>
    <?php require APPROOT . '/views/includes/navbar.php'; ?>

    <div class="flex flex-col gap-y-16 md:mt-16 md:px-24">
        <div class="flex flex-col gap-y-5 md:flex-row items-center justify-between mt-10">
            <div class="flex flex-row items-center gap-x-4">
                <i class="fa-solid fa-briefcase text-4xl"></i>
                <h2 class="text-4xl">My workspaces</h2>
            </div>
            <form class="flex flex-row items-center justify-center gap-x-4" action="<?php echo URLROOT; ?>/pages" method="POST">
                <input class="border-2 border-solid border-black rounded-lg w-80 h-10 pl-4" placeholder="Enter title of workspace" type="text" name="title">
                <button type="submit"><i class="fa-solid fa-magnifying-glass text-2xl"></i></button>

            </form>
            <div class="rounded-full bg-blue-400 p-4 cursor-pointer add-btn">
                <i class="fa-solid fa-plus"></i>
            </div>

        </div>

        <div class="flex flex-col gap-y-4 items-center rounded-lg bg-gray-100 absolute top-1/2 left-1/2 translate-x-[-50%] translate-y-[-50%] w-96 h-96 h-fit hidden drop-shadow-lg modal">

            <h3 class="pt-8 text-2xl">Add workspace</h3>


            <i class="fa-solid fa-xmark right-2 absolute cursor-pointer fixed pt-2 pl-2"></i>

            <form action="<?php echo URLROOT; ?>/workspaces/add" method="POST" enctype="multipart/form-data" class="flex flex-col gap-y-4">

                <label for="title">Title</label>
                <input name="title" class="rounded-lg h-8 p-4 <?php echo (!empty($data['title_err'])) ? 'border-red-400' : 'border-black'; ?>" type="text" placeholder="Enter title" required>
                <span class="text-red-400"><?php echo $data['title_err'];  ?></span>

                <label for="description">Description</label>
                <textarea placeholder="Enter description" class="rounded-lg p-4 <?php echo (!empty($data['description_err'])) ? 'border-red-400' : 'border-black'; ?>" name="description" id="" cols="20" rows="5" required></textarea>
                <span class="text-red-400"><?php echo $data['description_err'];  ?></span>

                <label for="name">Image</label>
                <input class="<?php echo (!empty($data['img_err'])) ? 'border-red-400' : 'border-black'; ?>" name="img" type="file" required>
                <span class="text-red-400"><?php echo $data['img_err'];  ?></span>

                <button class="p-4 mt-4 border-2 border-solid bg-blue-600 rounded-lg border-none text-white" type="submit">Add</button>
            </form>
        </div>
        <?php if ($data["workspaces"]) { ?>

            <div class="grid gap-6 grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 px-3">

                <?php foreach ($data['workspaces'] as $workspace) : ?>
                    <div class="flex flex-col workspaces">
                        <a href="<?php echo URLROOT; ?>/tasks/<?php echo $workspace->id; ?>">
                            <input type="hidden" value="<?php echo $workspace->id; ?>">
                            <div class="h-28 rounded-xl cursor-pointer" style="background: url('<?php echo URLROOT; ?>/img/uploads/workspaces/<?php echo $workspace->img; ?>');">

                            </div>
                        </a>
                        <div class="flex flex-row gap-x-16 items-center pt-4">
                            <h4 class="text-center font-bold"><?php echo $workspace->title; ?></h4>
                            <a href="<?php echo URLROOT; ?>/workspaces/delete/<?php echo $workspace->id; ?>"><i class="fa-solid fa-trash text-red-600 cursor-pointer"></i></a>
                            <i class="fa-solid fa-pen text-blue-600 cursor-pointer"></i>
                        </div>
                    </div>


                <?php endforeach; ?>

            </div>
            <div class="flex flex-col gap-y-4 items-center rounded-lg bg-gray-100 absolute top-1/2 left-1/2 translate-x-[-50%] translate-y-[-50%] w-96 h-96 h-fit hidden drop-shadow-lg update_modal">

                <h3 class="pt-8 text-2xl">Update workspace</h3>

                <i class="fa-solid fa-xmark right-2 absolute cursor-pointer fixed pt-2 pl-2 update-close"></i>

                <form action="<?php echo URLROOT; ?>/workspaces/update" method="POST" enctype="multipart/form-data" class="flex flex-col gap-y-4">
                    <input type="hidden" name="id">
                    <label for="title">Title</label>
                    <input name="title" class="rounded-lg h-8 p-4 <?php echo (!empty($data['title_err'])) ? 'border-red-400' : 'border-black'; ?>" type="text" placeholder="Enter title" required>
                    <span class="text-red-400"><?php echo $data['title_err'];  ?></span>

                    <!-- <label for="description">Description</label>
<textarea placeholder="Enter description" class="rounded-lg p-4 <?php echo (!empty($data['description_err'])) ? 'border-red-400' : 'border-black'; ?>" name="description" id="" cols="20" rows="5" required></textarea>
<span class="text-red-400"><?php echo $data['description_err'];  ?></span> -->

                    <label for="name">Image</label>
                    <input class="<?php echo (!empty($data['img_err'])) ? 'border-red-400' : 'border-black'; ?>" name="img" type="file">
                    <span class="text-red-400"><?php echo $data['img_err'];  ?></span>

                    <button class="p-4 mt-4 border-2 border-solid bg-blue-600 rounded-lg border-none text-white update-btn" type="submit">Update</button>
                </form>
            </div>

        <?php
        } else { ?>
            <div class="flex items-center justify-center">
                <img class="h-96" src="<?php echo URLROOT; ?>/img/undraw_no_data_re_kwbl.svg" alt="">
            </div>

        <?php

        }
        ?>

    </div>

    <?php require APPROOT . '/views/includes/footer.php'; ?>
</body>

</html>