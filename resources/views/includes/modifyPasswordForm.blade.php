<div class="connection">
    <form method="POST" action="{{route('modifyPasswordSend', ['email'=> $email])}}" class="fieldform">
        @csrf
        <h2>Changement du mot de passe</h2>
        <div class="fieldform__list">
            @if($errors->any())
            <div class="errors">
                <ul class="errors__list">
                    @foreach($errors->all() as $error)
                        <li class="errors__list__item">{{$error}}</li>
                    @endforeach
                </ul>
            </div>
            @endif

            @if(session('message'))
                <div class="message">
                    <p>{{session('message')}}</p>
                </div>
            @endif

            <div class="fieldform__list__item">
                <label for="email">Password</label>
                <input type="password" name="password">
            </div>
            <div class="fieldform__list__item">
                <label for="email">Confirmez Mot de passe</label>
                <input type="password" name="password_confirmation">
            </div>
        </div>  
        <div class="connection-btn">
            <button type="submit">Modifier</button>
        </div> 
    </form>
</div>  