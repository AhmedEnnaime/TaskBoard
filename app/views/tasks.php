<?php
$current_date = date("Y-m-d");
?>
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

    <div class="flex flex-col gap-y-4 items-center rounded-lg bg-gray-100 absolute top-1/2 left-1/2 translate-x-[-50%] translate-y-[-50%] w-96 h-96 h-fit hidden drop-shadow-lg modal">

        <h3 class="pt-8 text-2xl">Add Task</h3>


        <i class="fa-solid fa-xmark right-2 absolute cursor-pointer fixed pt-2 pl-2"></i>

        <form action="<?php echo URLROOT; ?>/tasks/add/<?php echo $data["workspace"]->id; ?>" method="POST" enctype="multipart/form-data" class="flex flex-col gap-y-4">

            <label for="title">Title</label>
            <input name="title" class="rounded-lg h-8 p-4" type="text" placeholder="Enter title">

            <label for="deadline">Deadline</label>
            <input type="date" name="deadline" class="rounded-lg h-8 p-4">

            <label for="members_num">Numbers of members</label>
            <input type="number" name="members_num" placeholder="Enter members" class="rounded-lg h-8 p-4 members_num">

            <div class="flex flex-col items-center gap-y-4 members">

            </div>

            <button class="p-4 mt-4 border-2 border-solid bg-blue-600 border-none text-white rounded-lg" type="submit">Add</button>
        </form>
    </div>

    <div class="grid gap-6 grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 justify-center px-3 pt-8">
        <div id="ToDo" class="bg-green-200 list">
            <div class="card-head">
                <h3 class="font-bold">To Do</h3>
                <h4 class="font-bold"><?php echo count($data["ToDo"]); ?></h4>
            </div>
            <hr>
            <?php foreach ($data["ToDo"] as $todo) : ?>
                <div class="mt-4 rounded-xl w-full bg-white list-item" data-id="<?php echo $todo->id; ?>" draggable="true">
                    <div class="flex flex-col gap-y-8">
                        <div class="flex flex-row items-center justify-between px-4">
                            <div class="flex flex-col items-center gap-y-4 pt-2">
                                <div class="flex flex-row gap-x-4">
                                    <p><?php echo $todo->title; ?></p>
                                    <?php if ($current_date > $todo->deadline) { ?>
                                        <p class="text-red-600 font-bold">Expired</p>
                                    <?php
                                    } ?>

                                </div>
                                <div class="flex flex-row items-center gap-x-8 pb-4">
                                    <div class="flex flex-row items-center gap-x-4">
                                        <i class="fa-solid fa-clock"></i>
                                        <?php $diff = strtotime($todo->deadline) - strtotime($current_date); ?>
                                        <p><?php echo $diff / (24 * 60 * 60); ?> days left</p>
                                    </div>
                                    <?php foreach ($data["TodoTaskMembers"] as $todoMembers) : ?>
                                        <div class="flex items-center justify-center rounded-full w-8 h-8 p-2 bg-sky-300"><?php echo substr($todoMembers->name, 0, 1); ?></div>
                                    <?php endforeach; ?>

                                </div>
                            </div>

                            <div class="flex flex-col items-center gap-y-4 pt-2">
                                <a href="<?php echo URLROOT; ?>/tasks/delete/<?php echo $todo->id; ?>"> <i class="fa-solid fa-trash cursor-pointer text-red-600"></i></a>
                                <i class="fa-solid fa-pen cursor-pointer text-blue-600"></i>
                            </div>

                        </div>
                    </div>
                </div>

            <?php endforeach; ?>

        </div>

        <div id="Doing" class="bg-green-200 list">
            <div class="card-head">
                <h3 class="font-bold">Doing</h3>
                <h4 class="font-bold"><?php echo count($data["Doing"]); ?></h4>
            </div>
            <hr>
            <?php foreach ($data["Doing"] as $doing) : ?>
                <div class="mt-4 rounded-xl w-full bg-white list-item" data-id="<?php echo $doing->id; ?>" draggable="true">
                    <div class="flex flex-col gap-y-8">
                        <div class="flex flex-row items-center justify-between px-4">
                            <div class="flex flex-col items-center gap-y-4 pt-2">
                                <div class="flex flex-row gap-x-4">
                                    <p><?php echo $doing->title; ?></p>
                                    <?php if ($current_date > $doing->deadline) { ?>
                                        <p class="text-red-600 font-bold">Expired</p>
                                    <?php
                                    } ?>

                                </div>

                                <div class="flex flex-row items-center gap-x-4 pb-4">
                                    <div class="flex flex-row items-center gap-x-4">
                                        <i class="fa-solid fa-clock"></i>
                                        <?php $diff = strtotime($doing->deadline) - strtotime($current_date); ?>
                                        <p><?php echo $diff / (24 * 60 * 60); ?> days left</p>
                                    </div>
                                    <?php foreach ($data["DoingTaskMembers"] as $doingMembers) : ?>
                                        <div class="flex items-center justify-center rounded-full w-8 h-8 p-2 bg-sky-300"><?php echo substr($doingMembers->name, 0, 1); ?></div>
                                    <?php endforeach; ?>
                                </div>
                            </div>

                            <div class="flex flex-col items-center gap-y-4 pt-2">
                                <a href="<?php echo URLROOT; ?>/tasks/delete/<?php echo $doing->id; ?>"> <i class="fa-solid fa-trash cursor-pointer text-red-600"></i></a>
                                <i class="fa-solid fa-pen cursor-pointer text-blue-600"></i>
                            </div>

                        </div>
                    </div>
                </div>

            <?php endforeach; ?>

        </div>

        <div id="Done" class="bg-green-200 list">
            <div class="card-head">
                <h3 class="font-bold">Done</h3>
                <h4 class="font-bold"><?php echo count($data["Done"]); ?></h4>
            </div>
            <hr>
            <?php foreach ($data["Done"] as $done) : ?>
                <div class="mt-4 rounded-xl w-full bg-white list-item" data-id="<?php echo $done->id; ?>" draggable="true">
                    <div class="flex flex-col gap-y-8">
                        <div class="flex flex-row items-center justify-between px-4">
                            <div class="flex flex-col items-center gap-y-4 pt-2">
                                <p><?php echo $done->title; ?></p>
                                <div class="flex flex-row items-center gap-x-4 pb-4">
                                    <?php foreach ($data["DoneTaskMembers"] as $doneMembers) : ?>
                                        <div class="flex items-center justify-center rounded-full w-8 h-8 bg-sky-300"><?php echo substr($doneMembers->name, 0, 1); ?></div>
                                    <?php endforeach; ?>
                                </div>
                            </div>

                            <div class="flex flex-col items-center gap-y-4 pt-2">
                                <a href="<?php echo URLROOT; ?>/tasks/delete/<?php echo $done->id; ?>"> <i class="fa-solid fa-trash cursor-pointer text-red-600"></i></a>
                                <i class="fa-solid fa-pen cursor-pointer text-blue-600"></i>
                            </div>

                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
    <?php require APPROOT . '/views/includes/footer.php'; ?>

</body>

</html>