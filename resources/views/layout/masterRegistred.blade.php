<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{asset('style.css')}}">
    <title>Home</title>
</head>

<body>
    <div class="wrapper">
        <div class="menu">
            <a href="/" class="menu__logo">
                <img src="{{asset('images/Logo-Ecole-229-grand.png')}}" alt="">
            </a>
            <div class="menu__content">


                @yield('content')

                
               
            </div>
        </div>
    </div>
</body>

</html>
