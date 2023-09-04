
<div class="connection">
    <form method="POST"  action="{{route('verifyEmailForgotSend')}}" class="fieldform">
        @csrf
        <h2>Verification du Mail</h2>
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

            @if(session('error'))
                <div class="error">
                    <p class="error__message">{{session('error')}}</p>
                </div>
            @endif

            <div class="fieldform__list__item">
                <label for="email">E-mail</label>
                <input type="text" placeholder="email" name="email">
            </div>

        </div>  
        <div class="forgot-btn">
            <button type="submit">Envoyez</button>
        </div> 
    </form>


</div>   