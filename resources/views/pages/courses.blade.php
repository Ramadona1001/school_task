@extends('index')

@section('title','Courses')

@section('stylesheet')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css">
@endsection


@section('content')


@foreach ($courses as $course)

<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
        <div class="card">
            <div class="card-header">{{ $course->name }}</div>
            <div class="card-body">
                <table class="table table-bordered m-0">
                    <thead>
                        <th>Student Name</th>
                        <th>Work Grade</th>
                        <th>Oral Grade</th>
                        <th>Exam Grade</th>
                    </thead>
                    <tbody>
                            @foreach ($student_course as $sc)
                            @if ($course->code == $sc->course_code)
                            <tr>
                                <td class="student_name" data-id="{{ $sc->id }}" data-student_id="{{ $sc->student_id }}" data-course_code="{{ $sc->course_code }}">{{ $sc->student_name }}</td>
                                <td><input type="number" name="work" step="0.1" max="{{ $course->work }}" value="{{ $sc->student_work }}" class="form-control work"></td>
                                <td><input type="number" name="oral" step="0.1" max="{{ $course->oral }}" value="{{ $sc->student_oral }}" class="form-control oral"></td>
                                <td><input type="number" name="exam" step="0.1" max="{{ $course->exam }}" value="{{ $sc->student_exam }}" class="form-control exam"></td>
                            </tr>
                            @endif
                        @endforeach
                    </tbody>
            </table>
            {{ csrf_field() }}
            </div>
        </div>
</div>

@endforeach




@endsection


@section('javascript')


<script>

        $(document).ready(function() {
            $('td').keydown(function() {
                var row = $(this).closest("tr");    // Find the row
                var student_name = row.find(".student_name").text(); // Find the text
                var student_id = row.find(".student_name").data('student_id'); // Find the text
                var course_code = row.find(".student_name").data('course_code'); // Find the text
                var work = row.find(".work").val(); // Find the text
                var oral = row.find(".oral").val(); // Find the text
                var exam = row.find(".exam").val(); // Find the text
                var id = row.find(".student_name").data('id');

                var _token = $('input[name="_token"]').val();

                $.ajaxSetup({
                    headers: {
                      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                  });

                $.ajax({
                    type: 'post',
                    url: '/studentscourse/update_data',
                    data: {
                        '_token': _token,
                        'work': work,
                        'oral': oral,
                        'exam': exam,
                        'id':id
                    },
                    success: function(data) {

                    },
                });



                {{-- alert($exam); --}}
            })
        });



</script>



@endsection
