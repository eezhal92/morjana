@extends('master')


@section('content')

<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">
            Student <small>{{ $student->people->full_name }}</small>
            <a href="{{ route('cp.students.edit', $student->id) }}" class="btn btn-primary pull-right">
                <i class="fa fa-pencil"></i> Edit
            </a>
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
                <table class="table table-bordered table-hover table-striped">                    
                    <tbody>
                        <tr class="info">
                            <td colspan="2" style="text-align:center; font-weight:bold;">Student Details</td>                            
                        </tr>
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
                        <tr>
                            <td class="info" colspan="2" style="text-align:center; font-weight:bold;">Father</td>
                        </tr>
                        <tr>
                            <td>Full Name</td>
                            <td>{{ $student->father->full_name }}</td>
                        </tr>
                        <tr>
                            <td>Address</td>
                            <td>{{ $student->father->address }}</td>
                        </tr>
                        <tr>
                            <td colspan="2" class="info" style="text-align:center; font-weight:bold;">Mother</td>
                        </tr>
                        <tr>
                            <td>Full Name</td>
                            <td>{{ $student->mother->full_name }}</td>
                        </tr>
                        <tr>
                            <td>Address</td>
                            <td>{{ $student->mother->address }}</td>
                        </tr>
                        
                    </tbody>
                </table>
            </div>
            <div class="col-md-6">
                <table class="table table-bordered table-hover table-striped">
                    <tbody>
                        <tr>
                            <td colspan="2" class="info" style="text-align:center; font-weight:bold;">Education</td>
                        </tr>
                        <tr>
                            <td>Name</td>
                            <td>{{ $student->univercity->name }}</td>
                        </tr>
                        <tr>
                            <td>Province</td>
                            <td>{{ $student->univercity->city->province->name }}</td>
                        </tr>
                        <tr>
                            <td>City</td>
                            <td>{{ $student->univercity->city->name }}</td>
                        </tr>
                        <tr>
                            <td>Faculty</td>
                            <td>{{ $student->major->faculty->name }}</td>
                        </tr>
                        <tr>
                            <td>Major</td>
                            <td>{{ $student->major->name }}</td>
                        </tr>
                        <tr>
                            <td>Type</td>
                            <td>{{ $student->type }}</td>
                        </tr>
                        <tr>
                            <td>Status</td>
                            <td>{{ $student->status }}</td>
                        </tr>
                        <tr>
                            <td>Amount of Grant</td>
                            <td>{{ $student->amount_of_grant }}</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@stop