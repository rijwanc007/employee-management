@extends('master')
@section('content')
    <div class="content-wrapper">
        <div class="page-header" id="bannerClose">
            <h3 class="page-title">
                <span class="page-title-icon bg-gradient-primary text-white mr-2">
                  <i class="mdi mdi-account"></i>
                </span> Salary
            </h3>
        </div>
        {!! Form::open(['route' => 'salary.apply','method' => 'POST']) !!}
        <div class="row">
        <div class="col-lg-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                    <div class="col-md-3" style="margin-top: 3px">
                        <div class="form-group">
                            <label class="control-label">Select Month and Year</label>
                            <div>
                            <input type="text" id="MonthYear" name="date" value="" style="width:300px;height:42px;" />
                            <img alt="Month/Year Picker" onclick="showCalendarControl('MonthYear');" src="{{asset('assets/images/datepicker.gif')}}" />
                            </div>
                        </div>
                    </div>
                        <div class="col-md-3" style="margin-top: 5px">
                            <div class="form-group">
                                <label class="control-label">Department</label>
                                <select class="form-control select2" id="department" name="department">
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
                                <select class="form-control select2" id="em_id" name="em_id">
                                    <option selected disabled value="">Choose An Option</option>
                                </select>
                            </div>
                        </div>
                    <div class="col-md-2" style="margin-top: 10px">
                        <label class="control-label"></label>
                        <button type="submit" class="btn btn-success btn-block">Apply</button>
                    </div>
                    </div>
                </div>
            </div>
        </div>
        </div>
        {!! Form::close() !!}
        <div class="row">
            <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <div class="row table-responsive">
                            <table class="table table-bordered">
                                <thead>
                                <tr>
                                    <th> Department </th>
                                    <th> Name </th>
                                    <th> Working Hours From </th>
                                    <th> Salary For </th>
                                    <th> Upload PDF </th>
                                    <th> Action </th>
                                    <th> Status </th>
                                </tr>
                                </thead>
                                <tbody>
                                @if($salaries->count() !== 0)
                                @foreach($salaries as $salary)
                                <tr>
                                    <td>{{$salary->department}}</td>
                                    <td>{{$salary->em_name}}</td>
                                    <td>{{$salary->working_hours_from}}</td>
                                    <td>{{$salary->salary_for}}</td>
                                    <td>{{$salary->pdf}}</td>
                                    <td>
                                        <table>
                                            <tr>
                                                @can('salary_show',Auth::user())
                                                <td> <a href="{{asset('assets/images/salary_document/'.$salary->pdf)}}" class="btn btn-inverse-success btn-icon" target="_blank"><br/><i class="mdi mdi-eye"></i></a></td>
                                                @endcan
                                                @can('salary_edit',Auth::user())
                                                <td> <button type="button" class="btn btn-inverse-info btn-icon" onclick="window.location='{{route('salaries.edit',$salary->id)}}'"><i class="mdi mdi-pencil"></i></button></td>
                                                @endcan
                                                @can('salary_delete',Auth::user())
                                                <td>
                                                    {!! Form::open(['route' =>['salaries.destroy',$salary->id],'method' => 'DELETE']) !!}
                                                    <button type="submit" class="btn btn-inverse-danger btn-icon">
                                                        <i class="mdi mdi-delete-forever"></i>
                                                    </button>
                                                    {!! Form::close() !!}
                                                </td>
                                                @endcan
                                            </tr>
                                        </table>
                                    </td>
                                    <td>
                                        @if($salary->status == 0)
                                            <button type="button" class="btn btn-danger btn-fw">Pending</button>
                                        @else
                                            <button type="button" class="btn btn-success btn-fw">Approved</button>
                                        @endif
                                    </td>
                                </tr>
                                @endforeach
                                @else
                                    <tr style="text-align: center">
                                        <td colspan="7"><div class="text-danger">{{'No Data Found'}}</div></td>
                                    </tr>
                                @endif
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        {!! $salaries->links() !!}
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
