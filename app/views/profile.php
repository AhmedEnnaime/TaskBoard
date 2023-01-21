<html lang="en">
<?php require APPROOT . '/views/includes/header.php'; ?>

<body>
    <?php require APPROOT . '/views/includes/navbar.php'; ?>

    <div class="flex flex-col p-16 w-full pt-16">
        <form action="<?php echo URLROOT; ?>/users/profile/<?php echo $data["user"]->id; ?>" method="POST" enctype="multipart/form-data">
            <div class="flex flex-row items-center gap-x-48">
                <div class="w-fit h-fit border-2 rounded-lg border-black border-dashed">
                    <img class="w-64 h-64 rounded-lg" src="<?php echo URLROOT; ?>/img/uploads/users/<?php echo $data["user"]->img; ?>" alt="">
                </div>
                <div class="flex">
                    <label class="w-36 h-12 pt-2 text-center bg-blue rounded-lg cursor-pointer bg-blue-400" for="file-input">
                        Upload image
                    </label>
                    <input name="img" class="hidden" id="file-input" type="file">
                </div>

            </div>

            <div class="grid gap-4 gap-y-16 grid-cols-1 sm:grid-cols-2 lg:grid-cols-2 mt-16 justify-center items-center px-16 py-8 bg-gray-200 rounded-lg drop-shadow-md">

                <div class="flex flex-col gap-y-2">
                    <label for="">Full name</label>
                    <input placeholder="Enter name" value="<?php echo $data["user"]->name; ?>" class="w-full h-12 border-2 rounded-lg pl-4 border-black border-solid" name="name" type="text">
                </div>

                <div class="flex flex-col gap-y-2">
                    <label for="">Birthday</label>
                    <input class="w-full h-12 border-2 rounded-lg pl-4 border-black border-solid" value="<?php echo $data["user"]->birthday; ?>" name="birthday" type="date">
                </div>

                <div class="flex flex-col gap-y-2">
                    <label for="">Email</label>
                    <input placeholder="Enter email" class="w-full h-12 border-2 rounded-lg pl-4 border-black border-solid" value="<?php echo $data["user"]->email; ?>" name="email" type="email">
                </div>

                <div class="flex flex-col gap-y-2">
                    <label for="">Password</label>
                    <input placeholder="Enter password" class="w-full h-12 border-2 rounded-lg pl-4 border-black border-solid" value="<?php echo $data["user"]->password; ?>" name="password" type="password">
                </div>

                <button type="submit" class="w-full h-12 bg-blue-400 rounded-lg">Update</button>
                <button type="reset" class="w-full h-12 bg-red-400 rounded-lg">Clear</button>



            </div>
        </form>

    </div>

    <?php require APPROOT . '/views/includes/footer.php'; ?>
</body>

</html>