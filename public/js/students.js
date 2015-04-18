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
        
        if($('#villageId').data('id') !== '' || $('#subDistrict').val() !== '') {
            var village_data_id = $('#villageId').data('id');
            console.log(village_data_id);
            $('#subDistrict').trigger('change', [{village_id: village_data_id}]);
        }
        
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
//                        alert($('#univercityId').val());
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