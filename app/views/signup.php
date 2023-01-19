<html lang="en">

<?php require APPROOT . '/views/includes/header.php'; ?>

<body class="bg-signup-bg bg-no-repeat bg-center bg-cover h-96">

    <div class="flex flex-row items-center px-24">
        <div class="flex flex-col items-center w-1/2 h-fit bg-blue-400 mt-24 rounded-lg drop-shadow-md">
            <h1 class="text-4xl pt-4">Signup</h1>

            <form action="" class="grid gap-4 gap-y-16 grid-cols-1 sm:grid-cols-2 lg:grid-cols-2 mt-16 justify-center items-center">
                <div class="flex flex-col gap-y-2">
                    <label for="">Full name</label>
                    <input placeholder="Enter name" value="<?php echo $data["user"]->name; ?>" class="w-fit h-12 border-2 rounded-lg pl-4 border-black border-solid" name="name" type="text">
                </div>

                <div class="flex flex-col gap-y-2">
                    <label for="">Birthday</label>
                    <input class="w-fit h-12 border-2 rounded-lg pl-4 border-black border-solid" value="<?php echo $data["user"]->birthday; ?>" name="birthday" type="date">
                </div>

                <div class="flex flex-col gap-y-2">
                    <label for="">Email</label>
                    <input placeholder="Enter email" class="w-fit h-12 border-2 rounded-lg pl-4 border-black border-solid" value="<?php echo $data["user"]->email; ?>" name="email" type="email">
                </div>

                <div class="flex flex-col gap-y-2">
                    <label for="">Password</label>
                    <input placeholder="Enter password" class="w-fit h-12 border-2 rounded-lg pl-4 border-black border-solid" value="<?php echo $data["user"]->password; ?>" name="password" type="password">
                </div>

                <div class="flex flex-col items-center gap-y-4">
                    <button type="submit" class="w-48 h-12 bg-red-400  rounded-lg">Signup</button>

                    <p class="cursor-pointer underline">Already have an account ? Log in</p>
                </div>



            </form>



        </div>

        <div class="w-1/2 pt-64">
            <img src="<?php echo URLROOT; ?>/img/undraw_hello_re_3evm.svg" alt="">

        </div>

    </div>

    <!-- <p>Already have an account ? Login</p> -->

    </div>

</body>

</html>