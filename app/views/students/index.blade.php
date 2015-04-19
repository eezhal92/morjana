@extends('master')

@section('content')
    
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">
                Students <small>master data</small> 
                <a href="{{ route('cp.students.create') }}" class="btn btn-primary pull-right">
                    <i class="fa fa-plus"></i> Add New
                </a>
            </h1>
            <ol class="breadcrumb">
                <li class="active">
                    <i class="fa fa-users"></i> Students
                </li>
            </ol>
        </div>
    </div>
    <!-- /.row -->

    <div class="row">
        <div class="col-lg-12">
            <div class="alert alert-info alert-dismissable">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <i class="fa fa-info-circle"></i>  <strong>Like SB Admin?</strong> Try out <a href="http://startbootstrap.com/template-overviews/sb-admin-2" class="alert-link">SB Admin 2</a> for additional features!
            </div>
        </div>
    </div>
    <!-- /.row -->
    
    <div class="row">
        <div class="col-lg-12">
          
          <table class="table table-bordered table-hover table-striped">
            <thead>
              <tr>
                <th width="100px">Student No.</th>
                <th>Full Name</th>
                <th>Gender</th>
                <th>Faculty</th>
                <th>Major</th>
                <th>Year</th>
                <th width="120px">Action</th>
              </tr>
            </thead>
            <tbody>
              
              @foreach($students as $student)
                  <tr>
                    <td>{{ $student->student_number }}</td>
            <td><a href="{{ route('cp.students.show', $student->id) }}">{{ $student->people->full_name }}</a></td>
                    <td>{{ $student->people->gender }}</td>
                    <td>{{ $student->major->faculty->name }}</td>
                    <td>{{ $student->major->name }}</td>
                    <td>{{ $student->year }}</td>
                    <td>
                        <a href="{{ route('cp.students.edit', $student->id) }}" class="btn btn-sm btn-warning">Edit</a>
                        <a class="btn btn-sm btn-danger btn-delete" data-url="{{ route('cp.students.destroy', $student->id) }}" data-token="{{ csrf_token() }}" >Delete</a>
                        {{ Form::close() }}
                    </td>
                  </tr>  
              @endforeach
              
            </tbody>
          </table>
        
        </div>
    </div>
    
@stop


@section('extra_script')
<script>
    $(document).ready(function() {
        $('.btn-delete').on('click', function() {
            var url = $(this).data('url');
            var token = $(this).data('token');
            
            bootbox.confirm({
                message: "Are you sure want to deleted this one?",
                callback: function(result) {
                    if(result) {
                        $.ajax({
                            method: 'post',
                            url: url,
                            data: {_token: token, _method: 'delete'}
                        }).done(function(res) {
                            bootbox.alert({
                                message:res.success, 
                                callback: function() {
                                     window.location.reload();
                                }
                            });
                        }).fail(function(res) {
                            bootbox.alert({message: res.responseText});
                        });
                    }
                }
            });
        });
    });
</script>
@stop