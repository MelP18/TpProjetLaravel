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
            {{-- <div class="Courses__btn">
                <a href="{{ route('category') }}">AJOUTER UNE ATTRIBUTION</a>
            </div> --}}

            <div class="main__allocation__courses__sudents">
                <div class="all__table">
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
                            @if (@isset($allocations))
                                @foreach ($allocations as $allocation => $allocate)
                                    
                                        <tr class="body__content">
                                            <td class="allocation__id">
                                                @foreach($allocate as $allo)
                                                    <li>{{$allo->id}}</li>
                                                @endforeach
                                            </td>
                                            <td>
                                                <p>
                                                    
                                                    {{$allocate[0]->teachersLists->surname.' '.$allocate[0]->teachersLists->firstname}}
                                                    
                                                </p>
                                            </td>
                                            <td class="allocation_courses">
                                                @foreach($allocate as $allo)
                                                    <li title="Catégorie : {{$allo->coursesLists->category->name_category}}" >{{$allo->coursesLists->name_course}}</li>
                                                @endforeach
                                            </td>
                                            <td >
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
                </div>
                {{-- FORMULAIRE D'ATTRIBUTION DE COURS AU ENSEIGNANTS --}}
                <div class="cour__student">
                    <div class="courses">
                        <div class="title">
                            <h2>FORMULAIRE</h2>
                        </div>
                        <form method="POST"  action="{{ route('sendListTeacherAllocaton') }} }}">
                            @csrf 
                            <h2>ATTRIBUTION</h2>
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
                                <select name="teachers_id" id="" class="unique">
                                    @if (isset($teachers))
                                        @foreach ($teachers as $userTeacher)
                                            <option value={{ $userTeacher->id }}>
                                                {{ $userTeacher->surname . ' ' . $userTeacher->firstname }}
                                            </option>
                                        @endforeach
                                    @endif
                                </select>
                            </div>
    
                            <div class="field__list__item">
                                <label>Attribution</label>
                                <select name="courses_id[]" multiple>
                                    <optgroup label="Choisir un ou plusieurs cours"></optgroup>
                                    @if (isset($courses))
                                        @foreach ($courses as $course)
                                            <option value={{ $course->id }}>
                                                {{ $course->name_course }}
                                            </option>
                                        @endforeach
                                    @endif
    
                                </select>
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
</div>
