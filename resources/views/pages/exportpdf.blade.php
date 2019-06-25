@extends('index')

@section('title','Export To PDF')

@section('stylesheet')
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.5.6/css/buttons.dataTables.min.css">

@endsection


@section('content')

<button type="button" onclick="printJS('printJS-form', 'html')">
        Export To PDF
     </button>


 <div id="printJS-form" >
        <h4 style="text-align:center;">Total Grades of Students</h4>
        <hr>

        <div id="columnchart_material" style="width: 100%; height: 500px;"></div>


        <hr>
    <table class="table table-bordered m-0">
            <thead>
                    <tr>
                        <th>Student Name</th>
                        <th>Course Name</th>
                        <th>Course Code</th>
                        <th>Student Total Grade</th>
                        <th>Course Grade</th>
                        <th>Status</th>
                    </tr>
                <tbody>

                    @foreach ($student_grades_courses as $student)
                    <tr>
                        <td> {{ $student->name }}</td>
                        <td> {{ $student->course_name }}</td>
                        <td> {{ $student->code }}</td>
                        <td> {{ $student->grade }}</td>
                        <td> {{ $student->total * 2 }}</td>
                        <td> {{ $student->status }}</td>
                    </tr>
                    @endforeach
                </tbody>

    </table>
 </div>





@endsection


@section('javascript')

<script src="{{ asset('js/jQuery.print.js') }}"></script>

<script src="https://printjs-4de6.kxcdn.com/print.min.js"></script>
<script src="https://printjs-4de6.kxcdn.com/print.min.css"></script>
<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
<script type="text/javascript">
  google.charts.load('current', {'packages':['bar']});
  google.charts.setOnLoadCallback(drawChart);

  function drawChart() {
    var data = google.visualization.arrayToDataTable([
      ['Courses', 'Success Ratios'],

      <?php foreach ($success_ratio as $success){
          echo '["'.$success->name.'",'.$success->success_count.'],';
      }?>

    ]);

    var options = {
      chart: {
        title: 'Success Ratios',
        subtitle: 'Success Ratios',
      },
      bar: { groupWidth: "5%" }
    };

    var chart = new google.charts.Bar(document.getElementById('columnchart_material'));

    chart.draw(data, google.charts.Bar.convertOptions(options));
  }
</script>

<script>

</script>





@endsection
