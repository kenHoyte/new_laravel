<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login</title>
</head>
<body>
    <form action="login" method="POST">
    @csrf
            <input type="text" name="login" placeholder="enter email">
            <input type="password" name="loginpassword" placeholder="enter password">

            <button>Login</button>
</form>
</body>
</html>