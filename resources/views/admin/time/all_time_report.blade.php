@extends('master')
@section('content')
    <div class="content-wrapper">
        <div class="page-header" id="bannerClose">
            <h3 class="page-title">
                <span class="page-title-icon bg-gradient-primary text-white mr-2">
                  <i class="mdi mdi-account"></i>
                </span> Time Report
            </h3>
        </div>
        {!! Form::open(['route'=>'all.time.report.apply','method' => 'POST']) !!}
        <div class="row">
            <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-4">
                                <label class="control-label text-info">Select Date Range</label>
                                <div class="input-daterange input-group" id="date-range">
                                    <input type="date" class="form-control" name="start" />
                                    <span style="margin:3%">To</span>
                                    <input type="date" class="form-control" name="end" />
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
                            <div class="col-md-2" style="margin-top: 8px">
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
                        <div class="row">
                            <table class="table table-striped">
                                <thead>
                                <tr>
                                    <th>Week No</th>
                                    <th>Day</th>
                                    <th>Date</th>
                                    <th>Total Hour</th>
                                    <th>OB:1</th>
                                    <th>OB:2</th>
                                    <th>Sick</th>
                                    <th>Leave</th>
                                    <th>Comment</th>
                                    <th>Upload File</th>
                                </tr>
                                </thead>
                                <tbody>
                                @if($attendances->count() !== 0)
                                @foreach($attendances as $attendance)
                                    <?php
                                    $get_date = $attendance->date;
                                    $date = new DateTime($get_date);
                                    $week = $date->format("W");
                                    $day = $date->format("D");
                                    ?>
                                    <tr>
                                        <td>{{$week}}</td>
                                        <td>{{$day}}</td>
                                        <td>{{$attendance->date}}</td>
                                        <td>{{$attendance->total_hour}}</td>
                                        <td></td>
                                        <td></td>
                                        <td>{{$attendance->sick}}</td>
                                        <td>{{$attendance->leave}}</td>
                                        <td>{{$attendance->comment}}</td>
                                        <td>
                                            @if(!empty($attendance->file))
                                            <a href="{{asset('assets/images/attendance_document/'.$attendance->file)}}" class="btn btn-inverse-success btn-icon" target="_blank"><br/><i class="mdi mdi-eye"></i></a>
                                            @endif
                                        </td>
                                    </tr>
                                @endforeach
                                @else
                                    <tr style="text-align: center">
                                        <td colspan="10"><div class="text-danger">{{'No Data Found'}}</div></td>
                                    </tr>
                                @endif
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            {!! $attendances->links() !!}
        </div>
        @if(request()->segment(count(request()->segments())) == 'all-time-report-apply')
            @if($total_hour != null)
            <div class="row">
                <div class="col-md-9"></div>
                <div class="col-md-3">
                    <div class="card">
                        <div class="card-body">
                            <div class="text-info text-center">Total Hour : {{$total_hour}}</div>
                        </div>
                    </div>
                </div>
            </div>
            @endif
        @endif
    </div>
@endsection
