@extends('master')
@section('content')
    <div class="content-wrapper">
        <div class="page-header" id="bannerClose">
            <h3 class="page-title">
                <span class="page-title-icon bg-gradient-primary text-white mr-2">
                  <i class="mdi mdi-account"></i>
                </span>Create Salary
            </h3>
        </div>
        {!! Form::open(['route' => 'salaries.store','method' => 'POST','enctype' => 'multipart/form-data']) !!}
        <div class="row">
            <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label class="control-label">Select Month and Year</label>
                                    <div>
                                        <input type="text" id="MonthYear" name="date" value="" style="width:300px;height:42px;"  required/>
                                        <img alt="Month/Year Picker" onclick="showCalendarControl('MonthYear');" src="{{asset('assets/images/datepicker.gif')}}" />
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3" style="margin-top: 5px">
                                <div class="form-group">
                                    <label class="control-label">Department</label>
                                    <select class="form-control select2" id="department" name="department" required>
                                        <option selected disabled value="">Choose An Option</option>
                                        <option value="employee">Employee</option>
                                        <option value="sale_leader">Sale Leader</option>
                                        <option value="supervisor">Supervisor</option>
                                        <option value="seller">Seller</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-3" style="margin-top: 5px">
                                <div class="form-group">
                                    <label class="control-label">User Name</label>
                                    <select class="form-control select2" id="em_id" name="em_id" required>
                                        <option selected disabled value="">Choose An Option</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <table class="table table-bordered">
                                <thead>
                                <tr>
                                    <th> Working Hours From </th>
                                    <th> Salary For </th>
                                    <th> Upload PDF </th>
                                    <th> Action </th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr>
                                    <td>
                                        <select class="form-control select2" name="working_hours_from" required>
                                            <option selected disabled value="">Choose An Option</option>
                                            <option value="JAN">January</option>
                                            <option value="FEB">February</option>
                                            <option value="MAR">March</option>
                                            <option value="APR">April</option>
                                            <option value="MAY">May</option>
                                            <option value="JUN">June</option>
                                            <option value="JUL">July</option>
                                            <option value="AUG">August</option>
                                            <option value="SEP">September</option>
                                            <option value="OCT">October</option>
                                            <option value="NOV">November</option>
                                            <option value="DEC">December</option>
                                        </select>
                                    </td>
                                    <td>
                                        <select class="form-control select2" name="salary_for" required>
                                            <option selected disabled value="">Choose An Option</option>
                                            <option value="JAN">January</option>
                                            <option value="FEB">February</option>
                                            <option value="MAR">March</option>
                                            <option value="APR">April</option>
                                            <option value="MAY">May</option>
                                            <option value="JUN">June</option>
                                            <option value="JUL">July</option>
                                            <option value="AUG">August</option>
                                            <option value="SEP">September</option>
                                            <option value="OCT">October</option>
                                            <option value="NOV">November</option>
                                            <option value="DEC">December</option>
                                        </select>
                                    </td>
                                    <td>
                                        <div class="form-group" style="margin-top: 24px;">
                                            <input type="file" name="pdf" class="file-upload-default" accept=".pdf" required>
                                            <div class="input-group col-xs-4">
                                                <input type="text" class="form-control file-upload-info" disabled placeholder="Upload PDF">
                                                <span class="input-group-append"><button class="file-upload-browse btn btn-gradient-primary" type="button">Upload</button></span>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <button type="submit" class="btn btn-inverse-success btn-fw">Send for Approval</button>
                                    </td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        {!! Form::close() !!}
    </div>
    <script>
        $(document).on('change','#department',function(){
            $.ajax({
                url : '/department-change',
                data : {department : $(this).val()},
                success : function(data){
                    $('#em_id').empty();
                    $('#em_id').append('<option selected disabled value="">Choose An Option</option>');
                    jQuery.each( data, function( item, value ) {
                        $('#em_id').append('<option value=' + value.id + '>' + value.name + '</option>');
                    });
                }
            });
        });
    </script>
    <link rel="stylesheet" href="{{URL::asset('assets/css/StyleCalender.css')}}">
    <script type="text/javascript" src="{{URL::asset('assets/js/CalendarControl.js')}}"></script>
@endsection
