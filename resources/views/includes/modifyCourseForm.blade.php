<div class="courses">


    <div class="page__home">
        <a href="{{route('studentslists')}}" title="Retour">
            <span class="mdi mdi-page-previous-outline"></span>
        </a>
    </div>
    <div class="Courses__btn">
        <a href="{{ route('listCourse') }}">LISTE DES COURS</a>
    </div>


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


                @if (session('message'))
                    <div class="sucess">
                        <p class="sucess__message">{{ session('message') }}</p>
                    </div>
                @endif

                <label for="category">Ajouter une catégorie</label>
                <input type="text" name="name_category" value="{{ old('name_category') }}">
            </div>
            <button>Enregistrer</button>
        </form>
    </div>

    {{-- AJOUT DE COURS --}}

    <div class="courses">
        <form method="POST" action="{{route('sendModifyCourse', ['id'=>$id])}}">
            @csrf
            <h2>Ajout de cours</h2>

            <div class="field__list">

                <div class="field__list__item">
                    <label for="name_course">Nom du cour </label>
                    <input type="text" name="name_course" value="{{ $course['name_course'] }}">
                </div>
                <div class="field__list__item">
                    <label for="name_course">Masse Horaire</label>
                    <input type="text" name="hourly_weight" value="{{ $course['hourly_weight'] }}">
                </div>
                <div class="field__list__item">
                    <label for="name_course">Coefficient</label>
                    <input type="text" name="coefficient" value="{{ $course['coefficient'] }}">
                </div>
                <div class="field__list__item">
                    <label for="name_course">Auteur</label>
                    <input type="text" name="add_by" value="{{ user_name($user); }}">
                </div>
                <div class="field__list__item">
                    <label for="name_course">Category</label>
                    <select name="category_id" id="">
                        @if ($categories)
                            @foreach ($categories as $category)
                                <option value="{{$category->id}}">{{ $category->name_category }}</option>
                            @endforeach
                        @endif
                    </select>
                </div>
            </div>

            <button type="submit">Enregistrer</button>
        </form>
    </div>
</div>