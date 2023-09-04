<div class="main">
    <div class="container">
        <div class="main__content">
            <div class="main__title">
                <h2>LISTE DES ATTRIBUTIONS</h2>
                <hr>
            </div>
            <div class="page__home">
                <a href="{{ route('studentslists') }}" title="Retour">
                    <span class="mdi mdi-page-previous-outline"></span>
                </a>
            </div>
            <div class="Courses__btn">
                <a href="{{ route('category') }}">AJOUTER UNE ATTRIBUTION</a>
            </div>

            <div class="main__table">
                <table>
                    <thead>
                        <tr class="head__content">
                            <th>ID_AFFECTATION</th>
                            <th>ENSEIGNANT</th>
                            <th>COURS</th>
                            <th>ACTIONS</th>
                        </tr>
                    </thead>
                    <tbody class="body">
                        @if (@isset($students))
                            @foreach ($students as $student)
                                
                                    <tr class="body__content">
                                        <td>
                                           
                                            @foreach ($student->studentsAllocation as $item)
                                                {{$item->id}}
                                            @endforeach
                                            
                                        </p> 
                                        </td>
                                        <td>
                                            <p>
                                               
                                               {{$student['surname']}}
                                                
                                            </p>
                                        </td>
                                        <td>
                                           
                                            @foreach ($student->coursesStudents as $item)
                                                {{$item->name_course}}
                                            @endforeach
                                            
                                            {{-- @foreach ($courses as $course)
                                            <p>{{ $course->name_course}}</p> 
                                            @endforeach  --}}
                                            {{-- <li>{{ $allocation->courses}}</li> --}}
                                            {{-- {{$allocation->courses_id}} --}}
                                            {{-- @foreach ($allocation as $allocate)
                                            {{ $allocate['courses_id'] }}
                                            @endforeach --}}

                                        </td>
                                        <td>
                                            <a href="{{-- {{route('modifyCour_Student',['id'=>$Cour_Student['id']])}} --}}" title="Editer">
                                                <span style="font-size: 25px ; color: rgb(80, 68, 6)"
                                                    class="mdi mdi-square-edit-outline"></span>
                                            </a>
                                            <a href="#" title="Supprimer">
                                                <span style="font-size: 25px ;color: rgb(223, 63, 46)"
                                                    class="mdi mdi-delete-outline"></span>
                                            </a>
                                        </td>

                                    </tr>
                               
                            @endforeach
                        @endif
                    </tbody>
                </table>
                <div class="Cour_Student">
                    {{-- @if (isset($Cour_Students)) --}}

                    <form method="POST" action="{{ route('setCour_Student') }}">
                        @csrf
                        <h2>Attribution</h2>
                        @if ($errors->any())
                            <div class="errors">
                                <ul class="errors__list">
                                    @foreach ($errors->all() as $error)
                                        <ol class="errors__list__item">{{ $error }}</ol>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        <div class="field__list__item">
                            <label for="etudiant">Enseignant</label>
                            <select name="students_id" id="">
                                @if (isset($students))
                                    @foreach ($students as $userStudent)
                                        <option value={{ $userStudent->id }}>
                                            {{ $userStudent->surname . ' ' . $userStudent->firstname }}
                                        </option>
                                    @endforeach
                                @endif
                            </select>
                        </div>

                        <div class="field__list__item">
                            <label>Cours</label>
                            <select name="courses_id[]" multiple>
                                <option>Choisir un ou plusieurs cours</option>

                                @if (isset($courses))
                                    @foreach ($courses as $course)
                                        <option value={{ $course->id }}>
                                            {{ $course->name_course }}
                                        </option>
                                    @endforeach
                                @endif

                            </select>
                        </div>
                        <button>Enregistrer</button>
                    </form>

                    {{--  @endif --}}

                    {{-- <form method="POST" action="{{ route('sendModifyCour_Student') }}">
                            @csrf
                            <h2>Attribution</h2>
                            @if ($errors->any())
                            <div class="errors">
                                <ul class="errors__list">
                                    @foreach ($errors->all() as $error)
                                        <ol class="errors__list__item">{{ $error }}</ol>
                                    @endforeach
                                </ul>
                            </div>
                            @endif
                            <div class="field__list__item">
                                <label for="etudiant">Etudiant</label>
                                <select name="student" id="">
                                    @if (isset($userStudents))
                                        @foreach ($userStudents as $userStudent)
                                            <option  value="{{ $userStudent['surname'] }}">
                                                {{ $userStudent['surname'] }}
                                            </option>
                                        @endforeach
                                    @endif
                                </select>
                            </div>

                            <div class="field__list__item">
                                <label>Cours</label>
                                <select name="course[]" multiple>
                                    <option>Choisir un ou plusieurs cours</option>
                                    
                                        @if (isset($courses))
                                            @foreach ($courses as $course)
                                                <option value="{{ $course['name_course'] }}">
                                                    {{ $course['name_course'] }}
                                                </option>
                                            @endforeach
                                        @endif
                                    
                                </select>
                            </div>
                            <button>Enregistrer</button>
                        </form> --}}

                    {{-- @endif --}}


                </div>
            </div>
        </div>
    </div>
</div>
