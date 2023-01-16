<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo SITENAME; ?></title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body>
    <form class="text-center" action="<?php echo URLROOT; ?>/authenticate/logout" method="POST">
        <button type="submit">Logout</button>
    </form>

    <?php echo $data["user"]->email; ?>
</body>

</html>