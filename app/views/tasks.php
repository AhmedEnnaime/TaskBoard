<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo SITENAME; ?></title>
    <link rel="stylesheet" href="<?php echo URLROOT; ?>/css/style.css">
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body>
    <h1>Task page</h1>
    <div class="sections">
        <div id="ToDo" class="empty">
            <h3>To do</h3>
            <div class="fill" draggable="true">

            </div>
        </div>

        <div id="Doing" class="empty">
            <h3>Doing</h3>
        </div>

        <div id="Done" class="empty">
            <h3>Done</h3>
        </div>
    </div>


</body>

<script id="send" src="<?php echo URLROOT; ?>/js/main.js"></script>

</html>