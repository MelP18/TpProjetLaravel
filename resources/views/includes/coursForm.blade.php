<div class="main">
    <div class="container">
        <div class="main__content">
            <div class="main__title">
                <h2>AJOUTER UN COURS</h2>
                <hr>
            </div>
            <div class="courses_btn">
                <div class="page__home">
                    <a href="{{ route('studentslists') }}" title="Retour">
                        <span class="mdi mdi-page-previous-outline"></span>
                    </a>
                </div>
                <div class="courses__list__btn">
                    <a href="{{ route('listCourse') }}">LISTE DES COURS</a>
                </div>
            </div>

            @if (count($categories) < 1)
                {{-- AJOUT DE CATEGORIE --}}
                <div class="categories">
                    <form method="POST" action="{{ route('sendCategory') }}">
                        @csrf
                        <div class="field__list__item">

                            @if ($errors->any())
                                <div class="errors">
                                    <ul class="errors__list">
                                        @foreach ($errors->all() as $error)
                                            <ol class="errors__list__item">{{ $error }}</ol>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif

                            <label for="">Ajouter une catégorie</label>
                            <input type="text" name="name_category" value="{{ old('name_category') }}">
                        </div>
                        <button>Enregistrer</button>
                    </form>
                </div>
            @else
                {{-- AJOUT DE CATEGORIE --}}
                <div class="categories__cours">
                    <div class="add__categories__cours">
                        <div class="title">
                            <h2>FORMULAIRE</h2>
                        </div>


                        <div class="categories__cours__form">
                            <div class="categories">
                                <form method="POST" action="{{ route('sendCategory') }}">
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
                                    <h2>CATÉGORIE</h2>
                                    <div class="field__list__item">

                                       

                                        @if (session('message'))
                                            <div class="sucess">
                                                <p class="sucess__message">{{ session('message') }}</p>
                                            </div>
                                        @endif

                                        {{-- //<label for="category">Catégorie </label> --}}
                                        <input type="text" name="name_category" value="{{ old('name_category') }}">
                                        <button>Enregistrer</button>
                                    </div>

                                </form>
                            </div>

                            {{-- AJOUT DE COURS --}}
                            <div class="courses">
                                <form method="POST" action="{{ route('sendCourse') }}">
                                    @csrf
                                    <h2>COURS</h2>

                                    <div class="field__list">

                                        <div class="field__list__item">
                                            <label for="name_course">Cours </label>
                                            <input type="text" name="name_course" value="{{ old('name_course') }}">
                                        </div>
                                        <div class="field__list__item">
                                            <label for="name_course">Horaire</label>
                                            <input type="text" name="hourly_weight"
                                                value="{{ old('hourly_weight') }}">
                                        </div>
                                        <div class="field__list__item">
                                            <label for="name_course">Coefficient</label>
                                            <input type="text" name="coefficient" value="{{ old('coefficient') }}">
                                        </div>
                                        <div class="field__list__item">
                                            <label for="name_course">Auteur</label>
                                            <input type="text" name="add_by" value="{{ user_name($user) }}">
                                        </div>
                                        <div class="field__list__item">
                                            <label for="name_course">Category</label>
                                            <select name="category_id" id="">
                                                @if ($categories)
                                                    @foreach ($categories as $category)
                                                        <option value="{{ $category->id }}">
                                                            {{ $category->name_category }}</option>
                                                    @endforeach
                                                @endif
                                            </select>
                                        </div>
                                    </div>
                                    <div class="submit__btn">
                                        <button type="submit">Enregistrer</button>
                                    </div>
                                </form>
                            </div>
                            {{-- </div>
                         --}}
                            {{-- AJOUT DE COURS --}}
                        </div>



                    </div>
                </div>
        </div>
        @endif
    </div>
</div>

</div>
</div>
