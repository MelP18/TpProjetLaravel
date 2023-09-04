
<div class="connection">
    <form method="POST" action="{{route('loginAuthentification')}}" class="fieldform">
        @csrf
        <h2>Connexion</h2>
        <div class="fieldform__list">

            @if(session('message'))
                <div class="sucess">
                    <p class="sucess__message">{{session('message')}}</p>
                </div>
            @endif

            @if(session('error'))
                <div class="error">
                    <p class="error__message">{{session('error')}}</p>
                </div>
            @endif

            <div class="fieldform__list__item">
                <label for="email">E-mail</label>
                <input type="text" placeholder="email" name="email">
            </div>
            <div class="fieldform__list__item">
                <label for="email">Password</label>
                <input type="password" placeholder="password" name="password">
            </div>
            <div class="forgot__password">
                <p>Mot de passe oublié? <a href="{{route('verifyEmailForgot')}}">Cliquez ici</a></p>
            </div>
        </div>  
        <div class="connection-btn">
            <p>Pas encore inscrit? <a href="{{route('signup')}}">S'inscrire</a> </p>
            <button type="submit">Se connecter</button>
        </div> 
    </form>


</div>   