<div class="main">
    <div class="container">
        <div class="main__content">
            <div class="main__title">
                <h2>LISTE DES ETUDIANTS </h2>
                <hr>
            </div>
            <div class="add__student">
                <a href="{{ route('formStudent') }}">AJOUTER UN ETUDIANT</a>
            </div>

            @if(session('message'))
        
            <div class="sucess">
                <p class="sucess__message">{{session('message')}}</p>
            </div>

            @endif

            <div class="main__table">
                <table>
                    <thead>
                        <tr class="head__content">
                            <th>PHOTO</th>
                            <th>NOM ET PRÉNOM(S)</th>
                            <th>DATE DE NAISSANCE</th>
                            <th>HOBBIES</th>
                            <th>SPECIALITÉS</th>
                            <th>ACTIONS</th>
                        </tr>
                    </thead>
                    <tbody class="body">
                        @if (@isset($studentsLists))
                            @foreach ($studentsLists as $student)
                                <tr class="body__content">
                                    <td>
                                        <div class="student__photo">
                                             <img src="{{ asset($student['photo']) }}"  alt="imapge-etudiant" >
                                       </div>
                                    </td>
                                    <td> <p> {{ $student['firstname'] }} {{ $student['surname'] }}</p> </td>
                                    <td> <p> {{ $student['birthday'] }} </p> </td>
                                    <td> <p> {{ $student['hobby'] }} </p> </td>
                                    <td> <p> {{ $student['speciality'] }} </p> </td>
                                    <td class="actions">
                                        <a href="{{ route('student', ['id'=> $student['id']] )}} " title="Voir plus">
                                            <span class="mdi mdi-plus-box-outline"></span>
                                        </a>
                                        <a href="{{ route('modifyStudentForm',['id'=> $student['id']])}}" title="Editer">
                                            <span class="mdi mdi-square-edit-outline"></span>
                                        </a>
                                        <a href="#" title="Activer">
                                            <span class="mdi mdi-eye-check-outline"></span>
                                        </a>
                                        <a href="#" title="Désactiver">
                                            <span class="mdi mdi-eye-remove-outline"></span>
                                        </a>
                                        <a href="{{ route ('newstudentslists',['id'=> $student['id']])}}" title="Supprimer">
                                            <span class="mdi mdi-delete-outline"></span>
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                        @endif
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
