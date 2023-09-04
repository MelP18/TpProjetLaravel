<div class="registration">
    <form method="POST" action="{{route('registerUser')}}" class="fieldform" enctype="multipart/form-data">
        @csrf
        <h2>Inscription</h2>
        <div class="fieldform__list">

            @if ($errors->any())
                <div class="errors">
                    <ul class="errors__list">  
                        @foreach ($errors->all() as $error)
                            <ol class="errors__list__item">{{ $error }}</ol>
                        @endforeach
                    </ul>
                </div>
            @endif

            @if(session('message'))
                <div class="sucess">
                    <p class="sucess__message">{{session('message')}}</p>
                </div>
            @endif

            <div class="fieldform__list__item__avatar">
                <label for="avatar">Avatar</label>
                <input type="file" name="avatar">
            </div>
            <div class="fieldform__list__item">
                <label for="nom">Nom</label>
                <input type="text" name="surname"value="{{old('surname')}}" >
            </div>
            <div class="fieldform__list__item">
                <label for="prenom">Prénom</label>
                <input type="text" name="firstname" value="{{old('firstname')}}">
            </div>
            <div class="fieldform__list__item">
                <label for="date-de-naissance">Date de Naissance</label>
                <input type="date" name="birthday" value="{{old('birthday')}}">
            </div>
            
            <div class="fieldform__list__item">
                <label for="email">E-mail</label>
                <input type="text" name="email" value="{{old('email')}}">
            </div>
            <div class="fieldform__list__item">
                <label for="password">Password</label>
                <input type="password" name="password">
            </div>
            <div class="fieldform__list__item">
                <label for="confirm-password">Confirm Password</label>
                <input type="password" name="password_confirmation" >
            </div>
        </div>  
        <div class="registration-btn">
            <p> Déjà inscrit ? <a href="{{route('login')}}">Se Connecter</a> </p>
            <button type="submit">S'inscrire</button>
        </div> 
    </form>


</div>   