<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo SITENAME; ?></title>
    <link rel="stylesheet" href="<?php echo URLROOT; ?>/css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body>
    <?php require APPROOT . '/views/includes/navbar.php'; ?>
    <div class="flex flex-row items-center pt-8 justify-between px-16">
        <h1 class="text-4xl">Tasks</h1>
        <div class="rounded-full bg-blue-400 p-4 cursor-pointer add-btn">
            <i class="fa-solid fa-plus"></i>
        </div>
    </div>

    <div class="flex flex-col gap-y-4 items-center rounded-lg bg-red-400 absolute top-1/2 left-1/2 translate-x-[-50%] translate-y-[-50%] w-96 h-96 h-fit hidden drop-shadow-lg modal">

        <h3 class="pt-8 text-2xl">Add Task</h3>


        <i class="fa-solid fa-xmark right-2 absolute cursor-pointer fixed pt-2 pl-2"></i>

        <form action="<?php echo URLROOT; ?>/tasks/add/<?php echo $data["workspace"]->id; ?>" method="POST" enctype="multipart/form-data" class="flex flex-col gap-y-4">

            <label for="title">Title</label>
            <input name="title" class="rounded-lg h-8 p-4" type="text" placeholder="Enter title">

            <label for="deadline">Deadline</label>
            <input type="date" name="deadline" class="rounded-lg h-8 p-4">

            <label for="members_num">Numbers of members</label>
            <input type="number" name="members_num" class="rounded-lg h-8 p-4 members_num">

            <div class="flex flex-col items-center gap-y-4 members">

            </div>

            <button class="p-4 mt-4 border-2 border-solid bg-blue-600" type="submit">Add</button>
        </form>
    </div>

    <div class="grid gap-6 grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 justify-center px-16 pt-8">
        <div id="ToDo" class="bg-green-200 list">
            <div class="card-head">
                <h3 class="font-bold">To Do</h3>
                <h4 class="font-bold">2</h4>
            </div>
            <hr>
            <div class="mt-4 rounded-xl w-96 bg-purple-200 list-item" draggable="true">
                <div class="flex flex-col gap-y-8">
                    <div class="flex flex-row items-center justify-between px-4">
                        <div class="flex flex-col items-center gap-y-4 pt-2">
                            <p>login page front end</p>
                            <div class="flex flex-row items-center gap-x-4 pb-4">
                                <div class="rounded-full w-8 h-8 p-2 bg-orange-800">S</div>
                            </div>
                        </div>

                        <div class="flex flex-col items-center gap-y-4 pt-2">
                            <i class="fa-solid fa-trash cursor-pointer"></i>
                            <i class="fa-solid fa-pen cursor-pointer"></i>
                        </div>

                    </div>
                </div>
            </div>

            <div class="mt-4 rounded-xl w-96 bg-purple-200 list-item" draggable="true">
                <div class="flex flex-col gap-y-8">
                    <div class="flex flex-row items-center justify-between px-4">
                        <div class="flex flex-col items-center gap-y-4 pt-2">
                            <p>login page front end</p>
                            <div class="flex flex-row items-center gap-x-4 pb-4">
                                <div class="rounded-full w-8 h-8 p-2 bg-orange-800">S</div>
                                <div class="rounded-full w-8 h-8 p-2 bg-orange-800">S</div>
                                <div class="rounded-full w-8 h-8 p-2 bg-orange-800">S</div>
                            </div>
                        </div>

                        <div class="flex flex-col items-center gap-y-4 pt-2">
                            <i class="fa-solid fa-trash cursor-pointer"></i>
                            <i class="fa-solid fa-pen cursor-pointer"></i>
                        </div>

                    </div>
                </div>
            </div>

        </div>

        <div id="Doing" class="bg-green-200 list">
            <div class="card-head">
                <h3 class="font-bold">Doing</h3>
                <h4 class="font-bold">4</h4>
            </div>
            <hr>
            <div class="mt-4 rounded-xl w-96 bg-purple-200 list-item" draggable="true">
                <div class="flex flex-col gap-y-8">
                    <div class="flex flex-row items-center justify-between px-4">
                        <div class="flex flex-col items-center gap-y-4 pt-2">
                            <p>login page front end</p>
                            <div class="flex flex-row items-center gap-x-4 pb-4">
                                <div class="rounded-full w-8 h-8 p-2 bg-orange-800">S</div>
                                <div class="rounded-full w-8 h-8 p-2 bg-orange-800">S</div>
                            </div>
                        </div>

                        <div class="flex flex-col items-center gap-y-4 pt-2">
                            <i class="fa-solid fa-trash cursor-pointer"></i>
                            <i class="fa-solid fa-pen cursor-pointer"></i>
                        </div>

                    </div>
                </div>
            </div>
        </div>

        <div id="Done" class="bg-green-200 list">
            <div class="card-head">
                <h3 class="font-bold">Done</h3>
                <h4 class="font-bold">1</h4>
            </div>
            <hr>
        </div>
    </div>
    <?php require APPROOT . '/views/includes/footer.php'; ?>

</body>

</html>