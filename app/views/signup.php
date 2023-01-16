<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <title>Document</title>
</head>

<body>

    <div class="flex flex-row">
        <img class="h-screen w-2/4" src="<?php echo URLROOT; ?>/img/undraw_authentication_re_svpt.svg" alt="">

        <form class="w-2/4 flex items-center flex-col" action="<?php echo URLROOT; ?>/users/signup" method="POST" enctype="multipart/form-data">
            <div class="flex flex-col gap-y-4">
                <label for="name">Full name</label>
                <input class="border border-1 border-solid border-black" name="name" type="text" placeholder="Enter name">

            </div>

            <div class="flex flex-col gap-y-4">
                <label for="name">Birthday</label>
                <input name="birthday" type="date" placeholder="Enter birthday">
            </div>

            <div class="flex flex-col gap-y-4">
                <label for="name">Email</label>
                <input name="email" type="email" placeholder="Enter email">

            </div>

            <div class="flex flex-col gap-y-4">
                <label for="name">Password</label>
                <input name="password" type="password" placeholder="Enter password">
            </div>


            <div class="flex flex-col gap-y-4">
                <label for="name">Image</label>
                <input name="img" type="file" placeholder="Enter image">

            </div>


            <button type="submit">Signup</button>

        </form>

    </div>

</body>

</html>