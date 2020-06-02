@extends('master')
@section('content')
    <div class="content-wrapper">
        <div class="page-header" id="bannerClose">
            <h3 class="page-title">
                <span class="page-title-icon bg-gradient-primary text-white mr-2">
                  <i class="mdi mdi-account"></i>
                </span> Offert
            </h3>
        </div>
        <div class="row">
            <div class="col-md-6 stretch-card grid-margin">
                <div class="card bg-gradient-danger card-img-holder text-white">
                    <div class="card-body">
                        <img src="{{asset('assets/images/dashboard/circle.svg')}}" class="card-img-absolute" alt="circle-image" />
                        <h4 class="font-weight-normal mb-3">Total Client Feedback<i class="mdi mdi-chart-bar mdi-24px float-right"></i></h4>
                        <h2 class="mb-5">{{$offert_waiting_for_client_feedback}}</h2>
                    </div>
                </div>
            </div>
            <div class="col-md-6 stretch-card grid-margin">
                <div class="card bg-gradient-primary card-img-holder text-white">
                    <div class="card-body">
                        <img src="{{asset('assets/images/dashboard/circle.svg')}}" class="card-img-absolute" alt="circle-image" />
                        <h4 class="font-weight-normal mb-3">Total Offert Value<i class="mdi mdi-cash-multiple mdi-24px float-right"></i></h4>
                        <h2 class="mb-5">{{$offert_value}}</h2>
                    </div>
                </div>
            </div>
        </div>
        {!! Form::open(['route' => 'offert.apply','method' => 'POST']) !!}
        <div class="row">
            <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-5">
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
                            <div class="col-md-5">
                                <div class="form-group">
                                    <label class="control-label">User Name</label>
                                    <select class="form-control select2" id="em_id" name="em_id">
                                        <option selected disabled value="">Choose An Option</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-2">
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
                            <table class="table table-bordered">
                                <thead>
                                <tr>
                                    <th> Date </th>
                                    <th> Sent offert </th>
                                    <th> Waiting for clients feedback </th>
                                    <th> Offert value</th>
                                    <th>To close deals</th>
                                </tr>
                                </thead>
                                <tbody>
                                @if($offerts->count() !== 0)
                                    @foreach($offerts as $offert)
                                        <tr>
                                            <td>{{$offert->date}}</td>
                                            <td>{{$offert->sent_offert}}</td>
                                            <td>{{$offert->waiting_for_clients_feedback}}</td>
                                            <td>{{$offert->offert_value}}</td>
                                            <td>{{$offert->to_close_deals}}</td>
                                        </tr>
                                    @endforeach
                                @else
                                    <tr style="text-align: center">
                                        <td colspan="5"><div class="text-danger">{{'No Offert Found'}}</div></td>
                                    </tr>
                                @endif
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                {!! $offerts->links() !!}
            </div>
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
@endsection
