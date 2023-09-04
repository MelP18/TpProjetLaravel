<div class="main">
    <div class="container">
        <div class="main__content">
            <div class="main__title">
                <h2>LISTE DES ENSEIGNANTS </h2>
                <hr>
            </div>
            <div class="courses_btn">
                <div class="page__home">
                    <a href="{{ route('studentslists') }}" title="Retour">
                        <span class="mdi mdi-page-previous-outline"></span>
                    </a>
                </div>
                <div class="courses__list__btn">
                    <a href="{{ route('teacherAdd') }}">AJOUTER UN ENSEIGNANT</a>
                </div>
            </div>
            @if (session('message'))
                <div class="sucess">
                    <p class="sucess__message">{{ session('message') }}</p>
                </div>
             @endif

            <div class="main__table">
                <table>
                    <thead>
                        <tr class="head__content">
                            <th>NOM </th>
                            <th>PRÉNOM</th>
                            <th>TÉLÉPHONE</th>
                            <th>ADRESSE</th>
                            <th>ACTIONS</th>
                        </tr>
                    </thead>
                    <tbody class="body">
                        @if (@isset($teachers))
                            @foreach ($teachers as $teacher)
                                <tr class="body__content">
                                    <td > 
                                        <p > 
                                            {{ $teacher['surname'] }}
                                        </p> 
                                    </td>
                                    <td > 
                                        <p > 
                                            {{ $teacher['firstname'] }}
                                        </p> 
                                    </td>
                                    <td > 
                                        <p > 
                                            {{ $teacher['phone'] }}
                                        </p> 
                                    </td>
                                    <td > 
                                        <p > 
                                            {{ $teacher['address'] }}
                                        </p> 
                                    </td>
                                    <td>
                                        <a href="{{route('listTeacherAllocaton'/* , ['id'=>$teacher['id']] */)}} " title="Affecter" >
                                            <span  style="font-size: 25px ; color: rgb(80, 68, 6)" class="mdi mdi-square-edit-outline"></span>
                                        </a>
                                        <a href="{{-- {{route('modifyCourse', ['id'=>$course['id']])}} --}}" title="Editer" >
                                            <span  style="font-size: 25px ; color: rgb(80, 68, 6)" class="mdi mdi-square-edit-outline"></span>
                                        </a>
                                        <a href="{{-- {{route('deleteCourse',['id'=>$course['id']])}} --}}" title="Supprimer" >
                                            <span style="font-size: 25px ;color: rgb(223, 63, 46)" class="mdi mdi-delete-outline"></span>
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