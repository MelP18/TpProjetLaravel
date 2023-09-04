<div class="main">
    <div class="container">
        <div class="main__content">
            <div class="main__title">
                <h2>LISTE DES COURS </h2>
                <hr>
            </div>
            <div class="courses_btn">
                <div class="page__home">
                    <a href="{{ route('studentslists') }}" title="Retour">
                        <span class="mdi mdi-page-previous-outline"></span>
                    </a>
                </div>
                <div class="courses__list__btn">
                    <a href="{{ route('category') }}">AJOUTER UN COUR</a>
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
                            <th>NOM DU COURS</th>
                            <th>MASSE HORAIRE</th>
                            <th>COEFFICIENT</th>
                            <th>CATEGORY</th>
                            <th>AUTEUR DE L'AJOUT</th>
                            <th>ACTIONS</th>
                        </tr>
                    </thead>
                    <tbody class="body">
                        @if (@isset($courses))
                            @foreach ($courses as $course)
                                <tr class="body__content">
                                    <td > 
                                        <p > 
                                            {{ $course['name_course'] }}
                                        </p> 
                                    </td>
                                    <td > 
                                        <p > 
                                            {{ $course['hourly_weight'].'h' }}
                                        </p> 
                                    </td>
                                    <td > 
                                        <p > 
                                            {{ $course['coefficient'] }}
                                        </p> 
                                    </td>
                                    <td > 
                                        <p > 
                                            {{ $course->category->name_category }}
                                        </p> 
                                    </td>
                                    <td > 
                                        <p > 
                                            {{ $course['add_by'] }}
                                        </p> 
                                    </td>
                                    <td>
                                        <a href="{{route('modifyCourse', ['id'=>$course['id']])}}" title="Editer" >
                                            <span  style="font-size: 25px ; color: rgb(80, 68, 6)" class="mdi mdi-square-edit-outline"></span>
                                        </a>
                                        <a href="{{route('deleteCourse',['id'=>$course['id']])}}" title="Supprimer" >
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
