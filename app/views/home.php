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

        <div class="flex flex-col gap-y-4 items-center bg-red-400 absolute top-1/2 left-1/2 translate-x-[-50%] translate-y-[-50%] w-96 h-96 hidden drop-shadow-lg modal">

            <h3 class="pt-8 text-2xl">Add workspace</h3>


            <i class="fa-solid fa-xmark right-2 absolute cursor-pointer fixed pt-2 pl-2"></i>

            <form action="" class="flex flex-col gap-y-4">
                <input type="text">
                <input type="text">
                <input type="text">
                <input type="text">
                <button type="submit">Add</button>
            </form>
        </div>


        <div class="grid gap-4 grid-cols-1 sm:grid-cols-2 lg:grid-cols-4">
            <?php  ?>
            <a href="">
                <div class="bg-red-200 h-24 rounded-xl cursor-pointer" style="background: url('<?php echo URLROOT; ?>/img/uploads/workspaces/0x0.jpg');">
                    <h4 class="text-center pt-8">Pestana</h4>
                </div>
            </a>

            <div class="bg-red-200 cursor-pointer h-24 rounded-xl">
                <h4 class="text-center pt-8">Pestana</h4>
            </div>
            <div class="bg-red-200 h-24 rounded-xl">
                <h4 class="text-center pt-8">Pestana</h4>
            </div>
            <div class="bg-red-200 h-24 rounded-xl">
                <h4 class="text-center pt-8">Pestana</h4>
            </div>
            <div class="bg-red-200 h-24 rounded-xl">
                <h4 class="text-center pt-8">Pestana</h4>
            </div>
            <div class="bg-red-200 h-24 rounded-xl">
                <h4 class="text-center pt-8">Pestana</h4>
            </div>
            <div class="bg-red-200 h-24 rounded-xl">
                <h4 class="text-center pt-8">Pestana</h4>
            </div>
        </div>
    </div>

    <!-- <form action="<?php echo URLROOT; ?>/workspaces/add" method="POST" enctype="multipart/form-data">
        title<input class="workspace_info" type="text" name="title">
        description<textarea class="workspace_info" name="description" id="" cols="30" rows="10"></textarea>
        img<input class="workspace_info" type="file" name="img">
        <button id="send" type="submit">Add</button>
    </form> -->

    <!-- <div>
        <?php foreach ($data['workspaces'] as $workspace) : ?>
            <h3><?php echo $workspace->title; ?></h3>
            <p><?php echo $workspace->description; ?></p>
            <form action="<?php echo URLROOT; ?>/workspaces/delete/<?php echo $workspace->id; ?>" method="POST">
                <button type="submit">delete</button>
            </form>


        <?php endforeach; ?>
    </div> -->

    <?php require APPROOT . '/views/includes/footer.php'; ?>
</body>

</html>