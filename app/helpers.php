

<?php

if(!function_exists('user_name')){
    function user_name($user){
        $userLists = $user->students;
        $username = $user->surname.' '.$user->firstname;
        return $username;
    }
}

if(!function_exists('students_name')){
    function students_name($userStudents){
        $studentname = $userStudents->students;
        return $studentname;
    }
}

if(!function_exists('courses_lists')){
    function courses_lists($userStudents){
        $studentname = $userStudents->students;
        return $studentname;
    }
}
?>