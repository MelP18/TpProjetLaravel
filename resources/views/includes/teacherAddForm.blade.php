<div class="main">
    <div class="container">
        <div class="main__content">
            <div class="main__title">
                <h2>AJOUTER UN ENSEIGNANT</h2>
                <hr>
            </div>
            <div class="courses_btn">
                <div class="page__home">
                    <a href="{{ route('studentslists') }}" title="Retour">
                        <span class="mdi mdi-page-previous-outline"></span>
                    </a>
                </div>
                <div class="courses__list__btn">
                    <a href="{{ route('listTeacher') }}">LISTE DES ENSEIGNANTS</a>
                </div>
            </div>
            <div class="categories__cours">
                <div class="add__categories__cours">
                    <div class="title">
                        <h2>FORMULAIRE</h2>
                    </div>


                    <div class="categories__cours__form">
                
                        {{-- AJOUT DE COURS --}}
                        <div class="courses">
                            <form method="POST" action="{{ route('sendListTeacher') }}">
                                @csrf

                                @if ($errors->any())
                                <div class="errors">
                                    <ul class="errors__list">
                                        @foreach ($errors->all() as $error)
                                            <ol class="errors__list__item">{{ $error }}</ol>
                                        @endforeach
                                    </ul>
                                </div>
                                @endif

                                <h2>ENSEIGNANT</h2>
                                <div class="field__list">

                                    <div class="field__list__item">
                                        <label for="name_course">Nom </label>
                                        <input type="text" name="surname" value="{{ old('name_course') }}">
                                    </div>
                                    <div class="field__list__item">
                                        <label for="name_course">Prénom</label>
                                        <input type="text" name="firstname"
                                            value="{{ old('firstname') }}">
                                    </div>
                                    <div class="field__list__item">
                                        <label for="name_course">Téléphone</label>
                                        <input type="number" name="phone" value="{{ old('phone') }}">
                                    </div>
                                    <div class="field__list__item">
                                        <label for="name_course">Adresse</label>
                                        <input type="text" name="address" value="{{ old('address') }}">
                                    </div>
                                   
                                </div>
                                <div class="submit__btn">
                                    <button type="submit">Enregistrer</button>
                                </div>
                            </form>
                        </div>
                    
                    </div>
                </div>
            </div>
        </div>
