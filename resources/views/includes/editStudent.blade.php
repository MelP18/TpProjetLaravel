<div class="container">
    <form method="POST"  action="{{ route('modifyFormInfos',['id'=> $data['id']]) }}" enctype="multipart/form-data">
        @csrf
        <div class="main__content">
            <div class="main__title">
                <h2>AJOUTER UN ETUDIANT</h2>
                <hr>
            </div>
            <div class="page__home">
                <a href="{{route('studentslists')}}" title="Retour">
                    <span class="mdi mdi-page-previous-outline"></span>
                </a>
            </div>
            <div class="form__title">
                <h4>FORMULAIRE</h4>
            </div>
            
            {{-- MESSAGE D'ERREUR --}}
            @if ($errors->any())
                <div class="error">
                    <ul class="errors__list">
                        
                        @foreach ($errors->all() as $error)
                            <ol class="errors__list__item">{{ $error }}</ol>
                        @endforeach
                    </ul>
                </div>
            @endif
    
            <div class="main__details__student">
                <div class="student__information__top">
                    <div class="photo__student__add">
                        <input value="" type="file" name="photo">
                    </div>
                    <div class="student__information">
                        <div class="information">
                            <h4>Nom : </h4>
                            <div class="field">
                                <input value="{{$data['firstname']}}" type="text" name="firstname">
                            </div>
                        </div>
                        <div class="information">
                            <h4>Prénom : </h4>
                            <div class="field">
                                <input value="{{$data['surname']}}" type="text" name="surname">
                            </div>
                        </div>
                        <div class="information">
                            <h4>Date de Naissance : </h4>
                            <div class="field">
                                <input value="{{$data['birthday']}}" type="date" name="birthday">
                            </div>
                           
                        </div>
                        <div class="information">
                            <h4>Hobbies : </h4>
                            <div class="field">
                                <input value="{{$data['hobby']}}" type="text" name="hobby">
                            </div> 
                        </div>
                        <div class="information">
                            <h4>Spécialité : </h4>
                            <div class="field">
                                <input value="{{$data['speciality']}}" type="text" name="speciality">
                            </div>
                        </div>
                        <div class="information">
                            <h4>Compétences : </h4>
                            <div class="field">
                                <input value="{{$data['competency']}}" type="text" name="competency">
                            </div>   
                        </div>
                    </div>
                </div>
                <div class="student__information__bottom">
                    <h3>BIOGRAPHIE</h3>
                    <div class="student__biographie">
                        <textarea value="" name="biography" id="" cols="" rows="5"></textarea>
                    </div>
                </div>
                <button type="submit">SOUMETTRE</button>
            </div>
        </div>
    
    </form>
</div>
