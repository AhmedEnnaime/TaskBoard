<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <h1>Login page</h1>
    <form action="<?php echo URLROOT; ?>/authenticate/login" method="POST">
        email <input type="email" name="email">
        password <input type="password" name="password">
        <button type="submit">LOGIN</button>
    </form>
</body>

</html>