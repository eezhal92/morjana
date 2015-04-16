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
                           <div class="form-group">
                            <label for="student_number">Student No.</label>
                            <input type="text" name="student_number" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="first_name">First Name</label>
                            <input type="text" name="first_name" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="last_name">Last Name</label>
                            <input type="text" name="last_name" class="form-control">
                        </div>
                        <div class="form-group">
                           <label for="gender">Gender</label>
                           <label class="radio-inline">
                               <input type="radio" name="gender" value="male" selected>Male
                           </label>
                           <label for="gender" class="radio-inline">
                               <input type="radio" name="gender" value="female">Female
                           </label>
                        </div>
                        <div class="form-group">
                            <label for="address">Address</label>
                            <textarea name="address" class="form-control" rows="3"></textarea>
                        </div>
                        <div class="form-group">
                            <label>Sub District</label>
                            {{ Form::select('sub_distric_id', $sub_districts, null, ['id' => 'subDistrict', 'class'=> 'form-control']) }}
                        </div>
                        <div class="form-group">
                            <label>Village</label>
                            <select class="form-control" name="village_id" id="village" disabled="disabled">
                                <option>-- Select Village --</option>
                            </select>
                        </div>
                        
                        <div class="row">
                           <div class="col-md-12">
                               <h3>Parent Details</h3>
                           </div>                            
                            <div class="col-md-6">                               
                               <div class="form-group">
                                    <label for="father_first_name">Father First Name</label>
                                    <input type="text" name="father_first_name" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="father_last_name">Father Last Name</label>
                                    <input type="text" name="father_last_name" class="form-control">
                                </div>
                                <div class="form-group">
                                <label>Father Address</label>
                                    <textarea name="father_address" class="form-control" rows="3"></textarea>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="mother_first_name">Mother First Name</label>
                                    <input type="text" name="mother_first_name" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="mother_last_name">Mother Last Name</label>
                                    <input type="text" name="mother_last_name" class="form-control">
                                </div>
                                <div class="form-group">
                                <label>Mother Address</label>
                                    <textarea name="mother_address" class="form-control" rows="3"></textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <!-- univercity form -->
                    <div id="univercityForm" class="col-md-6" style="background: #f5f5f5;">
                       <h3>Univercity / College Details</h3>
                        <div class="form-group">
                            <label for="univercity">Univercity / College Name</label>
                            <input type="text" name="univercity" id="univercity" class="form-control">
                            <input type="hidden" name="univercity_id" value="">
                        </div>
                        <div class="form-group">
                            <label for="type">Public / Private</label>
                            <select name="univercity_type" id="univercityType" class="form-control univercity-details">
                                <option value="">Please choose the option...</option>
                                <option value="public">Public</option>
                                <option value="private">Private</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="univercity_province_id">Province</label>
                            {{ Form::select('province_id', $provinces, null, ['id' => 'univercityProvinceId', 'class'=> 'form-control univercity-details']) }}
                        </div>
                        <div class="form-group">
                            <label for="univercity_city_id">City</label>
                            <select  name="univercity_city_id" id="univercityCityId" class="form-control univercity-details">
                                <option value="">Please select province First..</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="faculty">Faculty</label>
                            <input type="text" name="faculty" id="faculty" class="form-control">
                            <input type="hidden" name="faculty_id" value="">
                        </div>
                        <div class="form-group">
                            <label for="major">Major</label>
                            <input type="text" name="major" id="major" class="form-control">
                            <input type="hidden" name="major_id" value="">
                        </div>
                        <div class="form-group">
                            <label for="degree_id">Degree</label>
                            <select  name="degree_id" class="form-control">
                                <option value="1">Vocational</option>
                                <option value="2">Bachelor</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="year">Year</label>
                            <input type="text" name="year" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="student_type">Type</label>
                            <select  name="student_type" class="form-control">
                                <option value="regular">Regular</option>
                                <option value="non_regular">Non-Regular</option>
                            </select>
                        </div>
                        
                        <h3>Other</h3>
                        <div class="form-group input-group">
                            <span class="input-group-addon">Rp</span>
                            <input type="text" name="amount_of_grant" class="form-control" placeholder="Amount of grant">
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
            $.find(':input').removeAttr('disabled');;
        });
        
        /* District and Subdistric */
        function getVillages(id) {
            $('#village')                         
                .empty()
                .append($("<option></option>")                
                .attr("value", "")
                .text("Please select province First"));
            
            var villages = $.get(
                '/villages?sub_district_id=' + id
            ).done(function(result) {
                console.log('getVillages');
                $.each(result, function(key, value) {   
                     $('#village')                         
                         .append($("<option></option>")
                         .attr("value", key)                         
                         .text(value)); 
                })
            });
            
            $('#village').attr("disabled", false);
            
            return villages;
        }
        
        $('#subDistrict').on('change', function() {
            $('#village').attr('disabled', true);
            getVillages($(this).val());
        });
        
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
            serviceUrl: '/faculties',
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
        
        $('#univercity').devbridgeAutocomplete({
            serviceUrl: '/univ',
            onSearchStart: function () {
                $('.univercity-details').val('').attr('disabled', false);
                $('input[name="univercity_id"]').val('');
            },
            onSelect: function (sug) {
                getUniversity(sug);
//                alert(sug.data.id);
                $('input[name="univercity_id"]').val(sug.data.id);
                console.log('hihi');
            }
        });
        
        $('#univercityProvinceId').on('change', function() {           
            getCities($(this).val());
        });
        
        function getCities(id) {
            $('#univercityCityId')                         
                .empty()
                .append($("<option></option>")
                .attr("value", "")                        
                .text("Please select province First"))
                .attr('disabled', true);
            
            var cities = $.get(
                '/cities?province_id=' + id
            ).done(function(result) {
                console.log('getCities');
                $.each(result, function(key, value) {   
                     $('#univercityCityId')                         
                         .append($("<option></option>")
                         .attr("value", key)
                         .text(value))
                         .attr('disabled', false);; 
                })
            });
            
            return cities;
        }
        
        function getUniversity(sug) {
            console.log('getUniversity');
            $('#univercityProvinceId').val(sug.data.province_id);
            $('#univercityType').val(sug.data.type);
            $('#univercityProvinceId').val(sug.data.province_id);
            console.log('seb');
            
            $.when(getCities(sug.data.province_id))
                .done(function() {  
                    $('#univercityCityId').val(sug.data.city_id) 
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
