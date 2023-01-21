<html lang="en">

<?php require APPROOT . '/views/includes/header.php'; ?>

<body class="bg-signup-bg bg-no-repeat bg-center bg-cover h-96">

    <div class="flex flex-row items-center px-52">
        <div class="flex flex-col items-center w-1/2 h-fit bg-gray-100 mt-24 rounded-lg drop-shadow-xl">
            <h1 class="text-4xl pt-4">Login</h1>

            <form action="<?php echo URLROOT; ?>/authenticate/login" method="POST" class="flex flex-col items-center gap-y-8 pt-8">

                <div class="flex flex-col gap-y-2 w-full">
                    <label for="">Email</label>
                    <input placeholder="Enter email" class="h-12 border-2 rounded-lg pl-4 <?php echo (!empty($data['email_err'])) ? 'border-red-400' : 'border-black'; ?> border-solid" name="email" type="email">
                    <span class="text-red-400"><?php echo $data['email_err'];  ?></span>
                </div>

                <div class="flex flex-col gap-y-2 w-full">
                    <label for="">Password</label>
                    <input placeholder="Enter password" class="h-12 border-2 rounded-lg pl-4 <?php echo (!empty($data['password_err'])) ? 'border-red-400' : 'border-black'; ?> border-solid" name="password" type="password">
                    <span class="text-red-400"><?php echo $data['password_err'];  ?></span>
                </div>
                <input type="submit" class="w-full h-12 bg-blue-600 text-white mt-8 rounded-lg cursor-pointer" value="Login">
                <a class="underline pb-4" href="<?php echo URLROOT; ?>/users/signup">Don't have an account ? Signup</a>

            </form>

        </div>

        <div class="w-1/2 pt-64">
            <img src="<?php echo URLROOT; ?>/img/undraw_fingerprint_login_re_t71l.svg" alt="">
        </div>

    </div>

    </div>

</body>

</html>