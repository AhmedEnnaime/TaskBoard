<html lang="en">

<?php require APPROOT . '/views/includes/header.php'; ?>

<body>
    <h1>Login page</h1>
    <form action="<?php echo URLROOT; ?>/authenticate/login" method="POST">
        email <input type="email" name="email">
        password <input type="password" name="password">
        <button type="submit">LOGIN</button>
    </form>
</body>

</html>