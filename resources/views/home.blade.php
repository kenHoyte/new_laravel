<html lang="en">
<head>
    <link rel="stylesheet" href="{{asset('/cssfile/style.css')}}">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Register</title>
</head>
<body>

    @auth
    <p>Login passed</p>
    <form action="/logout" method="POST">
        @csrf
    <button>Logout</button>
    </form>
    @else
 
    <form action="/register" method="POST">
        @csrf
        <input type="text" name="name" placeholder="please enter Your name">
        <input type="email" name="email" placeholder="please enter your email">
        <input type="password" name="password" placeholder="please enter password">

        <button>Register</button>
    </form>

    {{-- <form action="/login" method="POST">
        @csrf
                <input type="text" name="loginname">
                <input type="password" name="loginpassword">
    
                <button>Login</button>
    </form> --}}
    <p>Already have an account?</p><a href="{{url('login')}}">Login here</a>
    
    

    @endauth

   
</body>
</html>