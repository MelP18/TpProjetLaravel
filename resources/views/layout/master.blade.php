<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{asset('style.css')}}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@mdi/font@5.9.55/css/materialdesignicons.min.css">
    <title>StudentsEcole229</title>
</head>

<body>

    <div class="block">
        <header>
            <div class="container">
                <div class="header__content">
                <div class="header__logo">
                    <a href="/" class="logo__ecole229">
                        <img src="{{ asset('images/logoMiniscule.png') }}" alt="">
                    </a>
                </div>
                <div class="menus">
                    <ul class="menus__list">
                        <li class="menus__list__item"> 
                            <a href="{{route('logOut')}}" title="Déconnexion">
                               <span class="mdi mdi-logout"></span>
                            </a>
                        </li>
                        <li class="menus__list__item"> 
                             <span class="line"></span>
                        </li>
                        <li class="menus__list__item">
                            <div class="user__avatar">
                                <img src="{{asset($userAvatar)}}" alt="avatar">
                            </div> 
                            <div class="user__name">
                                <h2>{{$userFullname}}</h2>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
            </div>
            
        </header>
        <main>


            @yield('content')


        </main>
        <footer>
            <div class="footer__content">
                <p>Favoriser l’insertion professionnelle des jeunes par des formations courtes et innovantes aux métiers du numérique.</p>
            </div>
        </footer>
    </div>
</body>

</html>