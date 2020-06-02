@extends('master')
@section('content')
    @can('admin_dashboard',Auth::user())
    <div class="content-wrapper">
        <?php
        $employee = \App\User::where('account_for','=','employee')->get();
        $sale_leader = \App\User::where('account_for','=','sale_leader')->get();
        $supervisor = \App\User::where('account_for','=','supervisor')->get();
        $seller = \App\User::where('account_for','=','seller')->get();
        $active_seller = \App\User::where('account_for','=','seller')->where('status','=','checked')->get();
        $client = \App\User::where('account_for','=','client')->get();
        $offert_waiting_for_client_feedback = \App\Offert::sum('waiting_for_clients_feedback');
        $offert_value = \App\Offert::sum('offert_value');
        $last_salary = \App\Salary::where('em_id','=',Auth::user()->id)->orderBy('id','DESC')->first();
        ?>
        <div class="page-header" id="bannerClose">
            <h3 class="page-title">
                <span class="page-title-icon bg-gradient-primary text-white mr-2">
                  <i class="mdi mdi-home"></i>
                </span> Admin Dashboard
            </h3>
        </div>
        <div class="row">
            <div class="col-md-3 stretch-card grid-margin">
                <div class="card bg-gradient-info card-img-holder text-white">
                    <div class="card-body">
                        <img src="{{asset('assets/images/dashboard/circle.svg')}}" class="card-img-absolute" alt="circle-image" />
                        <h4 class="font-weight-normal mb-3">Total Employee <i class="mdi mdi-account mdi-24px float-right"></i>
                        </h4>
                        <h2 class="mb-5">{{$employee->count()}}</h2>
                    </div>
                </div>
            </div>
            <div class="col-md-3 stretch-card grid-margin">
                <div class="card bg-gradient-info card-img-holder text-white">
                    <div class="card-body">
                        <img src="{{asset('assets/images/dashboard/circle.svg')}}" class="card-img-absolute" alt="circle-image" />
                        <h4 class="font-weight-normal mb-3">Total Sale Leader <i class="mdi mdi-account-star mdi-24px float-right"></i>
                        </h4>
                        <h2 class="mb-5">{{$sale_leader->count()}}</h2>
                    </div>
                </div>
            </div>
            <div class="col-md-3 stretch-card grid-margin">
                <div class="card bg-gradient-info card-img-holder text-white">
                    <div class="card-body">
                        <img src="{{asset('assets/images/dashboard/circle.svg')}}" class="card-img-absolute" alt="circle-image" />
                        <h4 class="font-weight-normal mb-3">Total Supervisor <i class="mdi mdi-account-network mdi-24px float-right"></i>
                        </h4>
                        <h2 class="mb-5">{{$supervisor->count()}}</h2>
                    </div>
                </div>
            </div>
            <div class="col-md-3 stretch-card grid-margin">
                <div class="card bg-gradient-info card-img-holder text-white">
                    <div class="card-body">
                        <img src="{{asset('assets/images/dashboard/circle.svg')}}" class="card-img-absolute" alt="circle-image" />
                        <h4 class="font-weight-normal mb-3">Total Seller <i class="mdi mdi-account-convert mdi-24px float-right"></i>
                        </h4>
                        <h2 class="mb-5">{{$seller->count()}}</h2>
                    </div>
                </div>
            </div>
            <div class="col-md-3 stretch-card grid-margin">
                <div class="card bg-gradient-info card-img-holder text-white">
                    <div class="card-body">
                        <img src="{{asset('assets/images/dashboard/circle.svg')}}" class="card-img-absolute" alt="circle-image" />
                        <h4 class="font-weight-normal mb-3">Total Client <i class="mdi mdi-account-box mdi-24px float-right"></i>
                        </h4>
                        <h2 class="mb-5">{{$client->count()}}</h2>
                    </div>
                </div>
            </div>
            <div class="col-md-3 stretch-card grid-margin">
                <div class="card bg-gradient-success card-img-holder text-white">
                    <div class="card-body">
                        <img src="{{asset('assets/images/dashboard/circle.svg')}}" class="card-img-absolute" alt="circle-image" />
                        <h4 class="font-weight-normal mb-3">Active Seller <i class="mdi mdi-human-greeting mdi-24px float-right"></i>
                        </h4>
                        <h2 class="mb-5">{{$active_seller->count()}}</h2>
                    </div>
                </div>
            </div>
            <div class="col-md-3 stretch-card grid-margin">
                <div class="card bg-gradient-danger card-img-holder text-white">
                    <div class="card-body">
                        <img src="{{asset('assets/images/dashboard/circle.svg')}}" class="card-img-absolute" alt="circle-image" />
                        <h4 class="font-weight-normal mb-3">Active Offert <i class="mdi mdi-chart-bar mdi-24px float-right"></i>
                        </h4>
                        <h2 class="mb-5">{{$offert_waiting_for_client_feedback}}</h2>
                    </div>
                </div>
            </div>
            <div class="col-md-3 stretch-card grid-margin">
                <div class="card bg-gradient-primary card-img-holder text-white">
                    <div class="card-body">
                        <img src="{{asset('assets/images/dashboard/circle.svg')}}" class="card-img-absolute" alt="circle-image" />
                        <h4 class="font-weight-normal mb-3">Offert Value <i class="mdi mdi-cash-multiple mdi-24px float-right"></i>
                        </h4>
                        <h2 class="mb-5">{{$offert_value}}</h2>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endcan
    <div class="content-wrapper">
        @can('user_dashboard',Auth::user())
        <div class="page-header" id="bannerClose">
            <h3 class="page-title">
                <span class="page-title-icon bg-gradient-primary text-white mr-2">
                  <i class="mdi mdi-home"></i>
                </span> User Dashboard
            </h3>
        </div>
        <div class="row">
            <div class="col-md-3 stretch-card grid-margin">
                <div class="card bg-gradient-info card-img-holder text-white">
                    <div class="card-body">
                        <h4 class="font-weight-normal mb-3">AVAILABILITY <i class="mdi mdi-account-box mdi-24px float-right"></i></h4>
                        <div class="text-center">
                            <br/>
                            <input data-id="{{Auth::user()->id}}" class="toggle-class" type="checkbox" data-onstyle="success" data-offstyle="info" data-toggle="toggle" data-on="Online" data-off="Offline" {{ Auth::user()->status == 'checked' ? 'checked' : '' }}>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-3 stretch-card grid-margin">
                <div class="card bg-gradient-success card-img-holder text-white">
                    <div class="card-body">
                        <img src="{{asset('assets/images/dashboard/circle.svg')}}" class="card-img-absolute" alt="circle-image" />
                        <h4 class="font-weight-normal mb-3">Contract Start <i class="mdi mdi-chart-bar mdi-24px float-right"></i>
                        </h4>
                        <h2 class="mb-5">{{Auth::user()->contract_start}}</h2>
                    </div>
                </div>
            </div>
            <div class="col-md-3 stretch-card grid-margin">
                <div class="card bg-gradient-danger card-img-holder text-white">
                    <div class="card-body">
                        <img src="{{asset('assets/images/dashboard/circle.svg')}}" class="card-img-absolute" alt="circle-image" />
                        <h4 class="font-weight-normal mb-3">Contract End <i class="mdi mdi-chart-bar mdi-24px float-right"></i></h4>
                        <h2 class="mb-5">{{Auth::user()->contract_end}}</h2>
                    </div>
                </div>
            </div>
            <div class="col-md-3 stretch-card grid-margin">
                <div class="card bg-gradient-primary card-img-holder text-white">
                    <div class="card-body">
                        <img src="{{asset('assets/images/dashboard/circle.svg')}}" class="card-img-absolute" alt="circle-image" />
                        <h4 class="font-weight-normal mb-3">Recent Salary Invoice <i class="mdi mdi-chart-bar mdi-24px float-right"></i>
                        </h4>
                        <br/>
                        <h2 class="mb-5 text-center">
                            @if(!empty($last_salary))
                            <a href="{{asset('assets/images/salary_document/'.$last_salary->pdf)}}" class="btn btn-inverse-primary btn-icon" target="_blank"><br/><i class="mdi mdi-eye"></i></a>
                            @else
                                <div class="text-white">{{'No Salary Yet'}}</div>
                            @endif
                        </h2>
                    </div>
                </div>
            </div>
        </div>
        @endcan
        @can('attendances',Auth::user())
        {!! Form::open(['route' => 'attendance.store','method' => 'POST','enctype' => 'multipart/form-data']) !!}
        <div class="row">
            <div class="col-lg-2"></div>
            <div class="col-lg-8 grid-margin stretch-card">
                <div class="card table-responsive">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-8">
                                <div class="form-group">
                                    <h3 class="page-title">
                                    <span class="page-title-icon bg-gradient-primary text-white mr-2">
                                         <i class="mdi mdi-timetable"></i>
                                    </span> Attendance </h3>

                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Date</label>
                                    <div>
                                        <div class="input-group">
                                            <input type="date" id="date" class="form-control" name="date" placeholder="mm/dd/yyyy" required>
                                            <input type="hidden" id="em_id" value="{{Auth::user()->id}}" name="em_id"/>
                                            <input type="hidden" id="em_name" value="{{Auth::user()->name}}" name="em_name"/>
                                            <input type="hidden" id="em_email" value="{{Auth::user()->email}}" name="em_email"/>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6" style="margin-top: 5px">
                                <label class="control-label"></label>
                                <button type="button" id="apply" class="btn btn-success btn-block">Apply</button>
                            </div>
                        </div>
                        <div class="row">
                            <div class="table-responsive">
                                <table class="table mb-0">
                                    <thead class="thead-light">
                                    <tr style="text-align: center">
                                        <th>Start</th>
                                        <th>Lunch</th>
                                        <th>End</th>
                                        <th>Total Hours</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr>
                                        <td>
                                            <div class="form-group">
                                                <input type="time" id="time_one" class="form-control" name="start"/>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="form-group">
                                                <input type="number" id="lunch"  class="form-control" name="lunch">
                                            </div>
                                        </td>
                                        <td>
                                            <div class="form-group">
                                                <input type="time" id="time_two" class="form-control" name="end"/>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="form-group">
                                            <input type="text" id="total_hour" class="form-control" name="total_hour" readonly required>
                                            </div>
                                        </td>
                                    </tr>
                                    </tbody>
                                    <thead class="thead-light">
                                    <tr style="text-align: center">
                                        <th>Sick</th>
                                        <th>Leave</th>
                                        <th>Upload File</th>
                                        <th>Comment</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr>
                                        <td>
                                            <select class="form-control select2" id="sick" name="sick">
                                                <option selected disabled value="">Choose An Option</option>
                                                <option value="YES">YES</option>
                                            </select>
                                        </td>
                                        <td>
                                            <select class="form-control select2" id="leave" name="leave">
                                                <option selected disabled value="">Choose An Option</option>
                                                <option value="YES">YES</option>
                                            </select>
                                        </td>
                                        <td>
                                            <div id="file_data" class="text-info">.</div>
                                            <div class="form-group">
                                                <input type="file" id="file" class="form-control" style="margin-top: 12px;" accept=".png, .jpg, .jpeg,.pdf" name="file"/>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="form-group">
                                                <input type="text" id="comment" class="form-control" style="margin-top: 23px;" name="comment" placeholder="comment"/>
                                            </div>
                                        </td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-gradient-primary btn-lg btn-block">Submit</button>
                </div>
            </div>
        </div>
    </div>
           {!! Form::close() !!}
            @endcan
    <script>
        $(document).on('change','.toggle-class',function(){
            var status = $(this).prop('checked') == true ? 'checked' : 'unchecked';
            var user_id = $(this).data('id');
            $.ajax({
                type: "GET",
                dataType: "json",
                url: '/changeStatus',
                data: {'status': status, 'user_id': user_id},
                success: function(data){
                    console.log(data)
                }
            });
        });
        function _(x){
            return document.getElementById(x);
        }
        $(document).on('click','#apply',function(){
            let formData = {
                date : _('date').value,
                em_id : _('em_id').value,
                em_name : _('em_name').value,
                em_email : _('em_email').value,
            };
            if(date.value == ''){
                toastr.error("Date Not Selected");
            }else{
                $.ajax({
                    url : 'attendance-apply',
                    method : 'POST',
                    data : {_token : "{{ csrf_token() }}",formData : formData},
                    success : function (data) {
                        if(data == 0){
                            toastr.error("No Attendance");
                        }else if(data != 0){
                            _('comment').value = data['comment'];
                            _('time_one').value = data['start'];
                            _('lunch').value = data['lunch'];
                            _('time_two').value = data['end'];
                            _('total_hour').value = data['total_hour'];
                            _('file_data').innerHTML = data['file'];
                            $('#sick').empty();
                            if(!(data['sick'])){
                                $('#sick').append('<option selected disabled value="">Choose An Option</option>');
                                $('#sick').append('<option value="YES">YES</option>');
                            }else{
                                $('#sick').append('<option selected disabled value="">Choose An Option</option>');
                                $('#sick').append('<option value=' + data["sick"] + ' selected = true>' + data["sick"] + '</option>');
                            }
                            $('#leave').empty();
                            if(!data['leave']){
                                $('#leave').append('<option selected disabled value="">Choose An Option</option>');
                                $('#leave').append('<option value="YES">YES</option>');
                            }else{
                                $('#leave').append('<option selected disabled value="">Choose An Option</option>');
                                $('#leave').append('<option value=' + data["leave"] + ' selected = true>' + data["leave"] + '</option>');
                            }
                        }
                    }
                })
            }
        });
        function calculate() {
            var hours = parseInt($("#time_two").val().split(':')[0], 10) - parseInt($("#time_one").val().split(':')[0], 10)- $('#lunch').val();
            if(hours < 0) hours = 24 + hours;
            $("#total_hour").val(hours);
        }
        $("#time_two,#time_one,#lunch").change(calculate);
        calculate();
    </script>
@endsection
