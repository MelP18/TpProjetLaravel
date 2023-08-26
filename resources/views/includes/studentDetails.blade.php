<div class="main__content">
    <div class="main__title">
        <h2>DETAILS ETUDIANT</h2>
        <hr>
    </div>

    <div class="change__student">
        <div class="previous__page">
            <a href="{{route('studentslists')}}" title="Retour">
                <span class="mdi mdi-page-previous-outline"></span>
            </a>
        </div>
        <div class="back__for__ward">
            <a @if ($id == count($students) || $id > 1) 
                href="{{ route('student', ['id' => $data['id'] - 1]) }}" title="Précédent"
                @elseif($id == 1)
                href="{{ route('student', ['id' => count($students)]) }}" title="Précédent" @endif>
                <span class="mdi mdi-skip-backward-outline"></span>
            </a>

            <a @if ($id < count($students)) 
                href="{{ route('student', ['id' => $data['id'] + 1]) }}" title="Suivant"
                @elseif($id == count($students)) 
                href="{{ route('student', [1]) }}" title="Suivant" @endif>
                <span class="mdi mdi-skip-forward-outline"> </span>
            </a>
        </div>

    </div>
    <div class="profil">
        <h4>PROFIL</h4>
    </div>
    <div class="main__details__student">

        <div class="student__information__top">

            <div class="photo__student">
                <img
                    @if (!empty($data['photo'])) src="{{ asset($data['photo']) }}" @else  alt="student-photo" @endif>
            </div>
            <div class="student__information">
                <div class="information">
                    <h4>Nom : </h4>
                    <p> {{ $data['firstname'] }}</p>
                </div>
                <div class="information">
                    <h4>Prénom: </h4>
                    <p>{{ $data['surname'] }}</p>
                </div>
                <div class="information">
                    <h4>Date de Naissance: </h4>
                    <p>{{ $data['birthday'] }}</p>
                </div>
                <div class="information">
                    <h4>Hobbies: </h4> 
                    <p>{{ $data['hobby'] }}</p>
                </div>
                <div class="information">
                    <h4>Spécialité: </h4>
                    <p>{{ $data['speciality'] }}</p>
                </div>
                <div class="information">
                    <h4>Compétences: </h4>
                    <p>{{ $data['competency'] }}</p>
                </div>
            </div>
        </div>
        <div class="student__information__bottom">
            <h3>BIOGRAPHIE</h3>
            <div class="student__biographie">
                <p>{{ $data['biography'] }}</p>
            </div>
        </div>

    </div>
</div>