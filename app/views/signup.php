<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <form action="<?php echo URLROOT; ?>/users/signup" method="POST" enctype="multipart/form-data">
        name<input name="name" type="text">
        birthday<input name="birthday" type="date">
        email<input name="email" type="email">
        password<input name="password" type="password">
        img<input name="img" type="file">
        <button type="submit">signup</button>
    </form>
</body>

</html>