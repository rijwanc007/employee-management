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
    <div class="row">
    <div class="col-lg-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <div class="text-info">Select Date Range :</div><br/>
                {!! Form::open(['route' => 'time.report.apply' ,'method' => 'POST']) !!}
                <div class="row">
                    <div class="col-md-4"><input type="date" class="form-control" name="start" /></div>
                    <input type="hidden" value="{{Auth::user()->id}}" name="em_id"/>
                    <div class="col-md-1" style="margin-top: 14px;padding-left: 3%;">To</div>
                    <div class="col-md-4"><input type="date" class="form-control" name="end" /></div>
                    <div class="col-md-3"><button type="submit" class="btn btn-success btn-block">Apply</button></div>
                </div>
                {!! Form::close() !!}
            </div>
        </div>
    </div>
    </div>
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
    </div>
@endsection
