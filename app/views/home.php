<html lang="en">

<?php require APPROOT . '/views/includes/header.php'; ?>

<body>
    <?php require APPROOT . '/views/includes/navbar.php'; ?>

    <div class="flex flex-col gap-y-16 mt-16 px-24">
        <div class="flex flex-row items-center justify-between">
            <div class="flex flex-row items-center gap-x-4">
                <i class="fa-solid fa-briefcase text-2xl"></i>
                <h2 class="text-4xl">My workspaces</h2>
            </div>
            <div class="rounded-full bg-blue-400 p-4 cursor-pointer add-btn">
                <i class="fa-solid fa-plus"></i>
            </div>

        </div>

        <div class="flex flex-col gap-y-4 items-center rounded-lg bg-red-400 absolute top-1/2 left-1/2 translate-x-[-50%] translate-y-[-50%] w-96 h-96 h-fit hidden drop-shadow-lg modal">

            <h3 class="pt-8 text-2xl">Add workspace</h3>


            <i class="fa-solid fa-xmark right-2 absolute cursor-pointer fixed pt-2 pl-2"></i>

            <form action="<?php echo URLROOT; ?>/workspaces/add" method="POST" enctype="multipart/form-data" class="flex flex-col gap-y-4">

                <label for="title">Title</label>
                <input name="title" class="rounded-lg h-8 p-4" type="text" placeholder="Enter title">

                <label for="description">Description</label>
                <textarea placeholder="Enter description" class="rounded-lg p-4" name="description" id="" cols="20" rows="5"></textarea>

                <label for="name">Image</label>
                <input name="img" type="file">

                <button class="p-4 mt-4 border-2 border-solid bg-blue-600" type="submit">Add</button>
            </form>
        </div>
        <?php if ($data["workspaces"]) { ?>

            <div class="grid gap-6 grid-cols-1 sm:grid-cols-2 lg:grid-cols-4">

                <?php foreach ($data['workspaces'] as $workspace) : ?>
                    <a href="<?php echo URLROOT; ?>/tasks/<?php echo $workspace->id; ?>">
                        <div class="bg-red-200 h-28 rounded-xl cursor-pointer" style="background: url('<?php echo URLROOT; ?>/img/uploads/workspaces/<?php echo $workspace->img; ?>');">
                            <h4 class="text-center pt-10 font-bold"><?php echo $workspace->title; ?></h4>
                        </div>
                    </a>
                <?php endforeach; ?>

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