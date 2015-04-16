@extends('master')


@section('content')

<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">
            Student <small>{{ $student->people->full_name }}</small>
        </h1>
        <ol class="breadcrumb">
            <li>
                <i class="fa fa-users"></i> Students
            </li>
            <li class="active">
                <i class="fa fa-user"></i> {{ $student->people->full_name }}
            </li>
        </ol>
    </div>
</div>
<!-- /.row -->

<div class="row">
    <div class="col-lg-12">
        <div class="row">
            <div class="col-md-6">
                <table class="table table-hover table-striped">                    
                    <tbody>
                        <tr>
                            <td>Student No.</td>
                            <td>{{ $student->student_number }}</td>
                        </tr>
                        <tr>
                            <td>First Name</td>
                            <td>{{ $student->people->first_name }}</td>
                        </tr>
                        <tr>
                            <td>Last Name</td>
                            <td>{{ $student->people->last_name }}</td>
                        </tr>
                        <tr>
                            <td>Gender</td>
                            <td>{{ $student->people->gender }}</td>
                        </tr>
                        <tr>
                            <td>Address</td>
                            <td>{{ $student->people->address }}</td>
                        </tr>
                        <tr>
                            <td>Sub District</td>
                            <td>{{ $student->people->village->sub_district->name }}</td>
                        </tr>
                        <tr>
                            <td>Village</td>
                            <td>{{ $student->people->village->name }}</td>
                        </tr>
                        
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@stop