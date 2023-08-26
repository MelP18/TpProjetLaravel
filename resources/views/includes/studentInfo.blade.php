<div class="main">
    <div class="container">
        
        @if (isset($id))

            <section>
                @include('includes.studentDetails')
            </section>

        @else

            <section>
                @include('includes.addStudentForm')
            </section>
    
        @endif
    </div>
</div>
