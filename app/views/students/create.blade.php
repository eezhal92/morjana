@extends('master')


@section('content')
    
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">
                Students <small>add new</small>
            </h1>
            <ol class="breadcrumb">
                <li>
                    <i class="fa fa-users"></i> Students
                </li>
                <li class="active">
                    <i class="fa fa-plus"></i> Add New
                </li>
            </ol>
        </div>
    </div>
    <!-- /.row -->

    <div class="row">
        <div class="col-lg-12">
            {{ Form::open(['route' => 'cp.students.store', 'id' => 'addStudentForm']) }}
                <div class="row">
                    <!-- student form -->
                    <div class="col-md-6">
                        <h3>Student Details</h3>
                        
                        <div class="form-group form-group @if($errors->first('student_number')) has-error @endif">
                            <label for="student_number">Student No.</label>
                            {{ Form::text('student_number', null, ['class' => 'form-control']) }}
                            @if($errors->first('student_number'))
                            <span class="help-block"> {{ $errors->first('student_number') }} </span>
                        
                            @endif
                        </div>
                        
                        <div class="form-group @if($errors->first('first_name')) has-error @endif">
                            <label for="first_name">First Name</label>
<!--                            <input type="text" name="first_name" class="form-control">-->
                            {{ Form::text('first_name', null, ['class' =>'form-control']) }}
                            @if($errors->first('first_name'))
                            <span class="help-block"> {{ $errors->first('first_name') }} </span>                             @endif
                        </div>
                        
                        <div class="form-group @if($errors->first('last_name')) has-error @endif">
                            <label for="last_name">Last Name</label>
                            {{ Form::text('last_name', null, ['class' => 'form-control']) }}
                            @if($errors->first('last_name'))
                            <span class="help-block"> {{ $errors->first('last_name') }} </span>                             @endif
                        </div>
                        
                        <div class="form-group @if($errors->first('gender')) has-error @endif">
                           <label for="gender">Gender</label>
                           <label class="radio-inline">
                               {{ Form::radio('gender', 'male', true) }} Male
                           </label>
                           <label for="gender" class="radio-inline">
                               {{ Form::radio('gender', 'female') }}Female
                           </label>
                           @if($errors->first('gender'))
                            <span class="help-block"> {{ $errors->first('gender') }} </span>                             @endif
                        </div>
                        
                        <div class="form-group  @if($errors->first('address')) has-error @endif">
                            <label for="address">Address</label>
                            {{ Form::textarea('address', null, ['class' => 'form-control', 'rows' => 3]) }}
                            @if($errors->first('address'))
                            <span class="help-block"> {{ $errors->first('address') }} </span>                             @endif
                        </div>
                        
                        <div class="form-group @if($errors->first('sub_district_id')) has-error @endif">
                            <label for="sub_district_id">Sub District</label>
                            {{ Form::select('sub_district_id', $sub_districts, null, ['id' => 'subDistrict', 'class'=> 'form-control']) }}
                            @if($errors->first('sub_district_id'))
                                <span class="help-block"> {{ $errors->first('sub_district_id') }} </span>
                            @endif
                        </div>
                       
                        <div class="form-group @if($errors->first('village_id')) has-error @endif">
                            <label for="village_id">Village</label>
                            <select class="form-control" name="village_id" id="villageId" disabled="disabled" data-id="@if(Input::old('village_id')){{Input::old('village_id')}}@endif">
                                <option value="">Please select sub district first</option>
                            </select>
                            @if($errors->first('village_id'))
                            <span class="help-block"> {{ $errors->first('village_id') }} </span>
                            @endif
                        </div>
                        
                        <div class="row">
                           <div class="col-md-12">
                               <h3>Parent Details</h3>
                           </div>                            
                            <div class="col-md-6">  
                                                           
                                <div class="form-group">
                                    <label for="father_first_name">Father First Name</label>
                                   {{ Form::text('father_first_name', null, ['class' => 'form-control']) }}
                                </div>
                                
                                <div class="form-group">
                                    <label for="father_last_name">Father Last Name</label>
                                     {{ Form::text('father_last_name', null, ['class' => 'form-control']) }}
                                </div>
                                
                                <div class="form-group">
                                <label for="father_address">Father Address</label>
                                   {{ Form::textarea('father_address', null, ['class' => 'form-control', 'rows' => 3]) }}
                                </div>
                                
                            </div>
                            <div class="col-md-6">  
                                                           
                                <div class="form-group">
                                    <label for="mother_first_name">Mother First Name</label>
                                   {{ Form::text('mother_first_name', null, ['class' => 'form-control']) }}
                                </div>
                                
                                <div class="form-group">
                                    <label for="mother_last_name">Mother Last Name</label>
                                     {{ Form::text('mother_last_name', null, ['class' => 'form-control']) }}
                                </div>
                                
                                <div class="form-group">
                                    <label for="mother_address">Mother Address</label>
                                   {{ Form::textarea('mother_address', null, ['class' => 'form-control', 'rows' => 3]) }}
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <!-- univercity form -->
                    <div id="univercityForm" class="col-md-6" style="background: #f5f5f5;">
                       <h3>Univercity / College Details</h3>
                        <div class="form-group">
                            <label for="univercity">Univercity / College Name</label>
                            {{ Form::text('univercity', null, ['id' => 'univercity', 'class' => 'form-control']) }}
                            <small class="help-block">Tips: Wait a moment for suggestions</small>
                            <input type="hidden" name="univercity_id" id="univercityId" value="@if(Input::old('univercity_id')){{Input::old('univercity_id')}}@endif">
                        </div>
                        <div class="form-group">
                            <label for="type">Public / Private</label>
                            {{ Form::select('univercity_type', $univercity_type_options, null, ['id' => 'univercityType', 'class' => 'form-control univercity-details']) }}
                        </div>
                        <div class="form-group">
                            <label for="univercity_province_id">Province</label>
                            {{ Form::select('univercity_province_id', $provinces, null, ['id' => 'univercityProvinceId', 'class'=> 'form-control univercity-details']) }}
                        </div>
                        <div class="form-group">
                            <label for="univercity_city_id">City</label>
                            <select  name="univercity_city_id" id="univercityCityId" class="form-control univercity-details" data-id="@if(Input::old('univercity_city_id')){{Input::old('univercity_city_id')}}@endif">
                            <option value="">Please select province first</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="faculty">Faculty</label>
                            <input type="text" name="faculty" id="faculty" class="form-control">
                            <small class="help-block">Tips: Wait a moment for suggestions</small>
                            <input type="hidden" name="faculty_id" value="">
                        </div>
                        <div class="form-group">
                            <label for="major">Major</label>
                            <input type="text" name="major" id="major" class="form-control">
                            <small class="help-block">Tips: Wait a moment for suggestions</small>
                            <input type="hidden" name="major_id" value="">
                        </div>
                        <div class="form-group">
                            <label for="degree_id">Degree</label>                            
                            {{ Form::select('degree_id', $degrees, null, ['class' => 'form-control']) }}
                        </div>
                        <div class="form-group">
                            <label for="year">Year</label>
                            {{ Form::text('year', null, ['class' => 'form-control']) }}
                        </div>
                        <div class="form-group">
                            <label for="student_type">Type</label>
                            {{ Form::select('student_type', ['regular' => 'Regular', 'non_regular' => 'Non-Regular'], null, ['id' => 'subDistrict', 'class'=> 'form-control']) }}
                        </div>
                        
                        <h3>Other</h3>
                        <div class="form-group input-group">
                            <span class="input-group-addon">Rp</span>
                            {{ Form::text('amount_of_grant', null, ['class' => 'form-control', 'placeholder' => 'Amount of grant']) }}
                        </div>
                        
                        <button type="submit" class="btn btn-primary btn-block">Save</button>
                        <br>
                    </div>
                    
                    
               </div>
           </form>     
        </div>
    </div>
    
@stop

@section('extra_script')
<script>
    $(document).ready(function() {
        $("#addStudentForm").submit(function(){
            $(this).find(':input').removeAttr('disabled');
        });
        
        
        
        /* District and Subdistric */
        function getVillages(id) {
            $('#villageId')                         
                .empty()
                .append($("<option></option>")                
                .attr("value", "")
                .text("Please select village"));
            
            var villages = $.get(
                '/services/villages',
                {
                    sub_district_id: id
                }
            ).done(function(result) {
                console.log('getVillages');
                $.each(result, function(key, value) {   
                     $('#villageId')                         
                         .append($("<option></option>")
                         .attr("value", key)                         
                         .text(value)); 
                });
                $('#villageId').attr("disabled", false);
            });
            
            return villages;
        }
        
//        $('#subDistrict').on('change', function() {
//            $('#village').attr('disabled', true);
//            getVillages($(this).val());
//        });
        
        /* Faculty and Majors */
        
        var majorDatas = {
            lookup: [{data: 55, value: 'hello'},{data: 85, value: 'world'}],
            setLookup: function(data) {
                this.lookup = data;
            },
            getLookup: function() {
                return this.lookup;
            }
        };
                
        function majorAuto(data) {
            var major = $('#major').devbridgeAutocomplete({
                lookup: data,
                onSearchStart: function () {
                    $('input[name="major_id"]').val('');
                },
                onSelect: function (sug) {
                    console.log(sug);
                     $('input[name="major_id"]').val(sug.data);
                }
            });
        }

        $('#faculty').devbridgeAutocomplete({
            serviceUrl: '/services/autocomplete-faculties',
            onSearchStart: function () {
                 $('input[name="faculty_id"]').val('');
            },
            onSelect: function (sug) {
                console.log(sug);
                 $('input[name="faculty_id"]').val(sug.data.id);
                console.log(sug.data.majors);
                /*override*/
                major.lookup = sug.data.majors;
                majorAuto(sug.data.majors);
            }
        });
                   
        
        /*Univercity Form*/
    
        $('#univercityProvinceId').on('change', function(evt, data) {           
            console.log('Triggered change on univercityProvinceId...');
            $('#univercityCityId').attr('disabled', true);
            $.when(getCities($(this).val())).done(function(cities) {
                console.log(cities);
                appendToSelect('#univercityCityId', cities);
                
                console.log(data);
                if(typeof data !== 'undefined'){ // checking if data exists
                    $('#univercityCityId').val(data.city_id);
                    
                    if($('#univercityId').val() !== '') {
                        alert($('#univercityId').val());
                        $('.univercity-details').attr('disabled', true);
                    }  else{
                        $('.univercity-details').attr('disabled', false);
                    }                                      
                } else {                
                    $('#univercityCityId').attr('disabled', false);
                }
                
            });

        });
        
        if($('#univercityCityId').data('id') !== '') {
            var city_data_id = $('#univercityCityId').data('id');
            console.log(city_data_id);
            $('#univercityProvinceId').trigger('change', [{city_id: city_data_id}]);
        }
        
        $('#subDistrict').on('change', function(evt, data) {           
            console.log('Triggered change on subDistrict...');
            $('#villageId').attr('disabled', true);
            $.when(getVillages($(this).val())).done(function(villages) {
//                console.log(data.village_id);
                appendToSelect('#villageId', villages);
                $('#villageId').attr('disabled', false);
                if(typeof data !== 'undefined') {
                    $('#villageId').val(data.village_id);
                }
            });
        });
        
//        $('#subDistrict').trigger('change');
        
        if($('#villageId').data('id') !== '' || $('#subDistrict').val() !== '') {
            var village_data_id = $('#villageId').data('id');
            console.log(village_data_id);
            $('#subDistrict').trigger('change', [{village_id: village_data_id}]);
        }
        
        $('#univercity').devbridgeAutocomplete({
            serviceUrl: '/services/autocomplete-univercities',
            onSearchStart: function () {
                console.log('start searching...');
                $('.univercity-details').val('').attr('disabled', false);
                $('#univercityCityId').val('').data('id','');
                $('#univercityId').val('');
            },
            onSearchComplete: function() {
                console.log('start complete!');
            },
            onSelect: function (sug) {
                setUniversity(sug.data);
                console.log('selected!');
            }
        });
        
        
        
        function getCities(id) {
            console.log('getting cities...');
            var cities = $.get(
                '/services/cities',
                {
                    province_id: id
                }
            );
            
            return cities;
        }
        
        function appendToSelect(selectorId, collection) {
            console.log('appending...');
            $(selectorId)                         
                .empty()
                .append($("<option></option>")
                .attr("value", "")                        
                .text("Please select province first"));
            
            $.each(collection, function(key, value) {   
                 $(selectorId)                         
                     .append($("<option></option>")
                     .attr("value", key)
                     .text(value)); 
            });
        }
        
        function setUniversity(data) {
            console.log('setting university...');
            
            $.when(getCities(data.province_id))
                .done(function(cities) {
                    console.log('request cities done...');
//                    console.log(cities);
                    appendToSelect('#univercityCityId', cities);
                    $('#univercityId').val(data.id);
                    $('#univercityProvinceId').val(data.province_id);
                    $('#univercityType').val(data.type);
                    $('#univercityProvinceId').val(data.province_id);
                    $('#univercityCityId').val(data.city_id) ;
                });
            
            $('.univercity-details').attr('disabled', true);
            
        }
        
        $('#addStudentForm').on('keyup keypress', function(e) {
            var code = e.keyCode || e.which;
            
            if(code == 13) {
                e.preventDefault();
                return false;        
            }
        });
        
    });
</script>
@stop
