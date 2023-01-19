<html lang="en">

<?php require APPROOT . '/views/includes/header.php'; ?>

<body class="bg-signup-bg bg-no-repeat bg-center bg-cover h-96">

    <div class="flex flex-row items-center px-48">
        <div class="flex flex-col items-center w-1/2 h-fit bg-gray-100 mt-24 rounded-lg drop-shadow-xl">
            <h1 class="text-4xl pt-4">Signup</h1>

            <form action="<?php echo URLROOT; ?>/users/signup" method="POST" enctype="multipart/form-data" class="grid gap-4 gap-y-16 grid-cols-1 sm:grid-cols-2 lg:grid-cols-2 mt-16 justify-center items-center">

                <div class="flex flex-col gap-y-2 px-6">
                    <label for="">Full name</label>
                    <input placeholder="Enter name" class="h-12 border-2 rounded-lg pl-4 border-black border-solid" name="name" type="text">
                </div>

                <div class="flex flex-col gap-y-2 px-6">
                    <label for="">Birthday</label>
                    <input class="h-12 border-2 rounded-lg pl-4 border-black border-solid" name="birthday" type="date">
                </div>

                <div class="flex flex-col gap-y-2 px-6">
                    <label for="">Email</label>
                    <input placeholder="Enter email" class="h-12 border-2 rounded-lg pl-4 border-black border-solid" name="email" type="email">
                </div>

                <div class="flex flex-col gap-y-2 px-6">
                    <label for="">Image</label>
                    <input placeholder="Enter image" class="h-12 border-2 rounded-lg pl-4 border-black border-solid" name="img" type="file">
                </div>

                <div class="flex flex-col gap-y-2 px-6 w-96">
                    <label for="">Password</label>
                    <input placeholder="Enter password" class="h-12 border-2 rounded-lg pl-4 border-black border-solid" name="password" type="password">
                </div>

                <div></div>


                <div class="flex flex-col items-center gap-y-4 w-64 pl-4">
                    <button type="submit" class="w-48 h-12 bg-blue-600 text-white  rounded-lg">Signup</button>
                    <a class="underline pb-4" href="<?php echo URLROOT; ?>/authenticate/login">Already have an account ? Log in</a>
                </div>

            </form>

        </div>

        <div class="w-1/2 pt-64">
            <img src="<?php echo URLROOT; ?>/img/undraw_hello_re_3evm.svg" alt="">

        </div>

    </div>

    </div>

</body>

</html>