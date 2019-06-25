@extends('index')

@section('title','All Students Total Grades')

@section('stylesheet')
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.5.6/css/buttons.dataTables.min.css">
@endsection


@section('content')



<table id="example" class="display nowrap" style="width:100%">
    <thead>
        <tr>
            <th>Student Name</th>
            <th>Total Oral</th>
            <th>Total Work</th>
            <th>Total Exam</th>
            <th>Max Total</th>
            <th>Percentage</th>
        </tr>
    <tbody>

        @foreach ($student_course2 as $student)
        <tr>
            <td> {{ $student->student_name }}</td>
            <td> {{ $student->total_oral }}</td>
            <td> {{ $student->total_work }}</td>
            <td> {{ $student->total_exam }}</td>
            <td> {{ $student->total }}</td>
            <td> {{ round(($student->total / $total_course_grade[0]->all_total) * 100,2) }} %</td>
        </tr>
        @endforeach
    </tbody>
    <tfoot>
            <tr>
                    <th>Student Name</th>
                    <th>Total Oral</th>
                    <th>Total Work</th>
                    <th>Total Exam</th>
                    <th>Max Total</th>
                    <th>Percentage</th>
                </tr>
        </tfoot>
</table>



@endsection


@section('javascript')


<script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.5.6/js/dataTables.buttons.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.5.6/js/buttons.flash.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
<script src="https://cdn.datatables.net/buttons/1.5.6/js/buttons.html5.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.5.6/js/buttons.print.min.js"></script>



<script>
        $(document).ready(function() {
            $('#example').DataTable( {
                dom: 'Bfrtip',
                buttons: [
                     'excel', 'print'
                ]
            } );
        } );
</script>






@endsection
