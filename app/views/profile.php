<html lang="en">
<?php require APPROOT . '/views/includes/header.php'; ?>

<body>
    <?php require APPROOT . '/views/includes/navbar.php'; ?>

    <form action="" method="POST" enctype="multipart/form-data">
        name <input name="name" type="text" value="<?php echo $data["user"]->name; ?>">
        birthday <input name="birthday" type="date" value="<?php echo $data["user"]->birthday; ?>">
        email <input name="email" type="email" value="<?php echo $data["user"]->email; ?>">
        password <input name="password" type="password" value="<?php echo $data["user"]->password; ?>">
        img <input name="img" type="file" value="<?php echo $data["user"]->img; ?>">
        <button type="submit">update</button>
    </form>

</body>

</html>