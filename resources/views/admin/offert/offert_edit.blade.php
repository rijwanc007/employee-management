@extends('master')
@section('content')
    <div class="content-wrapper">
        <div class="page-header" id="bannerClose">
            <h3 class="page-title">
                <span class="page-title-icon bg-gradient-primary text-white mr-2">
                  <i class="mdi mdi-account"></i>
                </span>Update Offert
            </h3>
        </div>
        {!! Form::open(['route' => ['offert.update',$edit->id],'method' => 'PATCH']) !!}
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
                                    <th> To close deals</th>
                                    <th> Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr>
                                    <td> <input type="date" class="form-control" id="offert_date" value="{{$edit->date}}" name="date" required></td>
                                    <td> <input type="text" class="form-control" id="sent_offert" value="{{$edit->sent_offert}}" name="sent_offert" placeholder="Enter Value Here" required></td>
                                    <td> <input type="text" class="form-control" id="client_feedback" value="{{$edit->waiting_for_clients_feedback}}" name="waiting_for_clients_feedback" placeholder="Enter Value Here" required></td>
                                    <td> <input type="text" class="form-control" id="offert_value" value="{{$edit->offert_value}}" name="offert_value" placeholder="Enter Value Here" required></td>
                                    <td> <input type="text" class="form-control" id="close_deal" value="{{$edit->to_close_deals}}" name="to_close_deals" placeholder="Enter Value Here" required></td>
                                    <td> <button type="submit" class="btn btn-success btn-block">Update</button></td>
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
@endsection
