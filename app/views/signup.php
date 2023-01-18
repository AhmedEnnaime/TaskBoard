<html lang="en">

<?php require APPROOT . '/views/includes/header.php'; ?>

<body>

    <div class="flex flex-row">
        <img class="h-screen w-2/4 pl-8" src="<?php echo URLROOT; ?>/img/undraw_secure_login_pdn4.svg" alt="">

        <form class="flex flex-col w-2/4 justify-center items-center bg-blue-200" action="<?php echo URLROOT; ?>/users/signup" method="POST" enctype="multipart/form-data">
            <h2 class="text-4xl text-center mb-16">Signup</h2>
            <div class="flex flex-col gap-y-2">
                <label for="name">Full name</label>
                <input class="border border-1 border-solid border-black w-48 h-8 rounded-lg pl-4 mb-4" name="name" type="text" placeholder="Enter name">
            </div>

            <div class="flex flex-col gap-y-2">
                <label for="name">Birthday</label>
                <input class="border border-1 border-solid border-black w-48 h-8 rounded-lg pl-4 mb-4" name="birthday" type="date" placeholder="Enter birthday">
            </div>

            <div class="flex flex-col gap-y-2">
                <label for="name">Email</label>
                <input class="border border-1 border-solid border-black w-48 h-8 rounded-lg pl-4 mb-4" name="email" type="email" placeholder="Enter email">

            </div>

            <div class="flex flex-col gap-y-2">
                <label for="name">Password</label>
                <input class="border border-1 border-solid border-black w-48 h-8 rounded-lg pl-4 mb-4" name="password" type="password" placeholder="Enter password">
            </div>


            <div class="flex flex-col gap-y-2">
                <label for="name">Image</label>
                <input class="border border-1 border-solid border-black w-48 h-8 rounded-lg mb-16" name="img" type="file" placeholder="Enter image">

            </div>


            <button class="w-48 h-8 rounded-lg bg-red-800 text-white" type="submit">Signup</button>

        </form>

        <!-- <p>Already have an account ? Login</p> -->

    </div>

</body>

</html>