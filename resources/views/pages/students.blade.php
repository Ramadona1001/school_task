@extends('index')

@section('title','All Students')

@section('stylesheet')
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css">
@endsection


@section('content')

<table id="example" class="display" style="width:100%">
    <thead>
        <tr>
            <th>ID</th>
            <th>Code</th>
            <th>Name</th>
            <th>Course</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($students as $student)
            <tr>
                <td>{{ $student->id }}</td>
                <td>{{ $student->code }}</td>
                <td>{{ $student->name }}</td>
                <td>
                    <select name="" class="myselect">
                        <option value="noselect">-- Choose Course --</option>
                        @foreach ($courses as $course)
                            <option data-id="{{ $course->id }}" data-code="{{ $course->code }}" data-oral="{{ $course->oral }}" data-work="{{ $course->work }}" data-course="{{ $course->name }}" data-studentid="{{ $student->id }}" data-studentname="{{ $student->name }}" value="{{ $course->code }}">{{ $course->name }}</option>
                        @endforeach
                    </select>
                </td>
            </tr>
        @endforeach

    </tbody>
    <tfoot>
        <tr>
            <th>ID</th>
            <th>Code</th>
            <th>Name</th>
            <th>Course</th>
        </tr>
    </tfoot>
</table>


<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Assign Student Course</h4>
      </div>
      <div class="modal-body">

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>



@endsection


@section('javascript')


<script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>

<script>
        $(document).ready(function() {
            $('#example').DataTable();
        } );
</script>

<script>
        $(document).ready(function() {
            $('.myselect').change(function() {
                var opval = $(this).val();
                if(opval!="noselect"){
                    var id = $(this).find(':selected').data('id');
                    var code = $(this).find(':selected').data('code');
                    var course = $(this).find(':selected').data('course');
                    var studentid = $(this).find(':selected').data('studentid');
                    var studentname = $(this).find(':selected').data('studentname');
                    var oral = $(this).find(':selected').data('oral');
                    var work = $(this).find(':selected').data('work');
                    var exam = $(this).find(':selected').data('exam');

                    if(oral == '0'){
                        $('.modal-body').html('<form action="{{ route('AssignCourse') }}" method="POST">@csrf<h6 style="text-align:center;font-size:17px;font-weight:bold;">Assign '+course+' To '+studentname+' </h6><hr><input type="hidden" value="'+studentid+'" name="student_id"><input type="hidden" value="'+code+'" name="course_code"><div class="form-group"><label>Work Degree</label><input type="number" name="work" id="" value="1" min="1" step="1" max="'+work+'" class="form-control"></div> <div class="form-group"> <input type="hidden" name="oral" id="" value="0"  class="form-control"> </div> <div class="form-group"> <label>Exam Degree</label> <input type="number" name="exam" id="" value="1" min="1" step="1" max="'+exam+'" class="form-control"> </div> <hr> <input type="submit" value="Save" class="btn btn-success"></form>');
                    }

                    if(work == '0'){
                        $('.modal-body').html('<form action="{{ route('AssignCourse') }}" method="POST">@csrf<h6 style="text-align:center;font-size:17px;font-weight:bold;">Assign '+course+' To '+studentname+' </h6><hr><input type="hidden" value="'+studentid+'" name="student_id"><input type="hidden" value="'+code+'" name="course_code"><div class="form-group"><input type="hidden" name="work" id="" value="0" ></div> <div class="form-group"> <label>Oral Degree</label> <input type="number" name="oral" id="" value="1" min="1" step="1" max="'+oral+'" class="form-control"> </div> <div class="form-group"> <label>Exam Degree</label> <input type="number" name="exam" id="" value="1" min="1" step="1" max="'+exam+'" class="form-control"> </div>  <hr> <input type="submit" value="Save" class="btn btn-success"></form>');
                    }

                    if(work == '0' & oral == '0'){
                            $('.modal-body').html('<form action="{{ route('AssignCourse') }}" method="POST">@csrf<h6 style="text-align:center;font-size:17px;font-weight:bold;">Assign '+course+' To '+studentname+' </h6><hr><input type="hidden" value="'+studentid+'" name="student_id"><input type="hidden" value="'+code+'" name="course_code"><div class="form-group"><input type="hidden" name="work" id="" value="0" ></div> <div class="form-group">  <input type="hidden" name="oral" id="" value="0"> </div> <div class="form-group"> <label>Exam Degree</label> <input type="number" name="exam" id="" value="1" min="1" step="1" max="'+exam+'" class="form-control"> </div>  <hr> <input type="submit" value="Save" class="btn btn-success"></form>');
                    }

                    if(work != '0' & oral != '0'){
                        $('.modal-body').html('<form action="{{ route('AssignCourse') }}" method="POST">@csrf<h6 style="text-align:center;font-size:17px;font-weight:bold;">Assign '+course+' To '+studentname+' </h6><hr><input type="hidden" value="'+studentid+'" name="student_id"><input type="hidden" value="'+code+'" name="course_code"><div class="form-group"><label>Work Degree</label><input type="number" name="work" id="" value="1" min="1" step="1" max="'+work+'" class="form-control"></div> <div class="form-group"> <label>Oral Degree</label> <input type="number" name="oral" id="" value="1" min="1" step="1" max="'+oral+'" class="form-control"> </div> <div class="form-group"> <label>Exam Degree</label> <input type="number" name="exam" id="" value="1" min="1" step="1" max="'+exam+'" class="form-control"> </div>  <hr> <input type="submit" value="Save" class="btn btn-success"></form>');
                    }

                    $('#myModal').modal("show");
                }
            });
        } );

</script>



@endsection
