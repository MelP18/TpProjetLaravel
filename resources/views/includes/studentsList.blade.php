<div class="main">
    <div class="container">
        <div class="main__content">
            <div class="main__title">
                <h2>LISTE DES ETUDIANTS </h2>
                <hr>
            </div>
            <ul class="management">
                <li class="management__add__student">
                    <a href="{{ route('formStudent') }}">AJOUTER UN ETUDIANT</a>
                </li>
                <li class="management__add__courses">
                    <a href="{{ route('category') }}">GESTION DES COURS</a>
                </li>
                <li class="management__courses__Cour_Student">
                    <a href="{{ route('listCour_Student') }}">ATTRIBUTION DES COURS</a>
                </li>
                <li class="management__courses__Cour_Student">
                    <a href="{{ route('teacherAdd') }} ">GESTION DES ENSEIGNEMENTS</a>
                </li>
            </ul>
           

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
                                    <td @if($student['status'] == 1)   @else  @endif>
                                        <div class="student__photo" @if($student['status'] == 1) style="opacity: '' "  @else style="opacity: 0.3 "@endif>
                                             <img src="{{ asset($student['photo']) }}"  alt="imapge-etudiant" >
                                       </div>
                                    </td>
                                    <td > 
                                        <p @if($student['status'] == 1) style="color: '' "  @else style="color:rgb(92, 89, 89) "@endif> 
                                            {{ $student['firstname'] }} {{ $student['surname'] }}
                                        </p> 
                                    </td>
                                    <td> 
                                        <p @if($student['status'] == 1) style="color: '' "  @else style="color:rgb(92, 89, 89) "@endif> 
                                            {{ $student['birthday'] }} 
                                        </p> 
                                    </td>
                                    <td> 
                                        <p @if($student['status'] == 1) style="color: '' "  @else style="color:rgb(92, 89, 89) "@endif>  
                                            {{ $student['hobby'] }} 
                                        </p> 
                                    </td>
                                    <td> 
                                        <p @if($student['status'] == 1) style="color: '' "  @else style="color:rgb(92, 89, 89) "@endif>  
                                            {{ $student['speciality'] }} 
                                        </p> 
                                    </td>
                                    <td>
                                        <a @if($student['status'] == 1)  href="{{ route('student', ['id'=> $student['id']] )}} " title="Voir plus" @else href="#" @endif>
                                            <span @if($student['status'] == 1) style="font-size: 25px ; color: rgb(185, 125, 13)"  @else style="font-size: 25px ; color:rgb(92, 89, 89)"  @endif class="mdi mdi-plus-box-outline"></span>
                                        </a>
                                        <a @if($student['status'] == 1)  href="{{ route('modifyStudentForm',['id'=> $student['id']])}}" title="Editer" @else href="#" @endif>
                                            <span @if($student['status'] == 1) style="font-size: 25px ; color: rgb(80, 68, 6)"  @else style="font-size: 25px ; color:rgb(92, 89, 89)" @endif class="mdi mdi-square-edit-outline"></span>
                                        </a>
                                        <a @if($student['status'] == 1)  href="#"  @else href="{{route('activateStatus',['id'=> $student['id']])}}" title="Activer" @endif>
                                            <span @if($student['status'] == 1) style="font-size: 25px ; color:rgb(92, 89, 89)"  @else style="font-size: 25px ; color: rgb(47, 108, 4);" @endif  class="mdi mdi-eye-check-outline"></span>
                                        </a>
                                        <a @if($student['status'] == 1)  href="{{route('diseableStatus',['id'=> $student['id']])}}" title="Désactiver" @else href="#"  @endif>
                                            <span @if($student['status'] == 1) style="font-size: 25px ; color: rgb(163, 73, 50)"  @else style="font-size: 25px ; color:rgb(92, 89, 89)" @endif class="mdi mdi-eye-remove-outline"></span>
                                        </a>
                                        <a @if($student['status'] == 1)  href="{{ route ('newstudentslists',['id'=> $student['id']])}}" title="Supprimer" @else href="#"  @endif>
                                            <span @if($student['status'] == 1) style="font-size: 25px ;color: rgb(223, 63, 46)"  @else style="font-size: 25px ; color:rgb(92, 89, 89)" @endif class="mdi mdi-delete-outline"></span>
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
