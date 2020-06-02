@extends('master')
@section('content')
    <div class="content-wrapper">
        <div class="page-header" id="bannerClose">
            <h3 class="page-title">
                <span class="page-title-icon bg-gradient-primary text-white mr-2">
                  <i class="mdi mdi-account"></i>
                </span>Update Salary
            </h3>
        </div>
        {!! Form::open(['route' => ['salaries.update',$edit->id],'method' => 'PATCH','enctype' => 'multipart/form-data']) !!}
        <div class="row">
            <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label class="control-label">Select Month and Year</label>
                                    <div>
                                        <input type="text" id="MonthYear" name="date" value="{{$edit->date}}" style="width:300px;height:42px;"  required/>
                                        <img alt="Month/Year Picker" onclick="showCalendarControl('MonthYear');" src="{{asset('assets/images/datepicker.gif')}}" />
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label class="control-label">Department</label>
                                    <select class="form-control select2" id="department" name="department" required>
                                        <option selected disabled value="">Choose An Option</option>
                                        <option value="employee" @if($edit->department == 'employee') selected @endif>Employee</option>
                                        <option value="sale_leader" @if($edit->department == 'sale_leader') selected @endif>Sale Leader</option>
                                        <option value="supervisor" @if($edit->department == 'supervisor') selected @endif>Supervisor</option>
                                        <option value="seller" @if($edit->department == 'seller') selected @endif>Seller</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label class="control-label">User Name</label>
                                    <select class="form-control select2" id="em_id" name="em_id" required>
                                        <option value="{{$edit->em_id}}">{{$edit->em_name}}</option>
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
                                            <option value="JAN" @if($edit->working_hours_from == 'JAN') selected @endif>January</option>
                                            <option value="FEB" @if($edit->working_hours_from == 'FEB') selected @endif>February</option>
                                            <option value="MAR" @if($edit->working_hours_from == 'MAR') selected @endif>March</option>
                                            <option value="APR" @if($edit->working_hours_from == 'APR') selected @endif>April</option>
                                            <option value="MAY" @if($edit->working_hours_from == 'MAY') selected @endif>May</option>
                                            <option value="JUN" @if($edit->working_hours_from == 'JUN') selected @endif>June</option>
                                            <option value="JUL" @if($edit->working_hours_from == 'JUL') selected @endif>July</option>
                                            <option value="AUG" @if($edit->working_hours_from == 'AUG') selected @endif>August</option>
                                            <option value="SEP" @if($edit->working_hours_from == 'SEP') selected @endif>September</option>
                                            <option value="OCT" @if($edit->working_hours_from == 'OCT') selected @endif>October</option>
                                            <option value="NOV" @if($edit->working_hours_from == 'NOV') selected @endif>November</option>
                                            <option value="DEC" @if($edit->working_hours_from == 'DEC') selected @endif>December</option>
                                        </select>
                                    </td>
                                    <td>
                                        <select class="form-control select2" name="salary_for" required>
                                            <option selected disabled value="">Choose An Option</option>
                                            <option value="JAN" @if($edit->salary_for == 'JAN') selected @endif>January</option>
                                            <option value="FEB" @if($edit->salary_for == 'FEB') selected @endif>February</option>
                                            <option value="MAR" @if($edit->salary_for == 'MAR') selected @endif>March</option>
                                            <option value="APR" @if($edit->salary_for == 'APR') selected @endif>April</option>
                                            <option value="MAY" @if($edit->salary_for == 'MAY') selected @endif>May</option>
                                            <option value="JUN" @if($edit->salary_for == 'JUN') selected @endif>June</option>
                                            <option value="JUL" @if($edit->salary_for == 'JUL') selected @endif>July</option>
                                            <option value="AUG" @if($edit->salary_for == 'AUG') selected @endif>August</option>
                                            <option value="SEP" @if($edit->salary_for == 'SEP') selected @endif>September</option>
                                            <option value="OCT" @if($edit->salary_for == 'OCT') selected @endif>October</option>
                                            <option value="NOV" @if($edit->salary_for == 'NOV') selected @endif>November</option>
                                            <option value="DEC" @if($edit->salary_for == 'DEC') selected @endif>December</option>
                                        </select>
                                    </td>
                                    <td>
                                        <div class="text-info">{{$edit->pdf}}</div>
                                        <div class="form-group" style="margin-top: 12px;">
                                            <input type="file" name="pdf" class="file-upload-default" accept=".pdf">
                                            <div class="input-group col-xs-4">
                                                <input type="text" class="form-control file-upload-info" disabled placeholder="Upload PDF">
                                                <span class="input-group-append"><button class="file-upload-browse btn btn-gradient-primary" type="button">Upload</button></span>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <button type="submit" class="btn btn-inverse-success btn-fw">Update</button>
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
