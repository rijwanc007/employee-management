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
                                    <th> Action </th>
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
                                    <td>
                                        <table>
                                            <tr>
                                                @can('offert_edit',Auth::user())
                                                <td> <button type="button" class="btn btn-inverse-info btn-icon" onclick="window.location='{{route('offert.edit',$offert->id)}}'"><i class="mdi mdi-pencil"></i></button></td>
                                                @endcan
                                                @can('offert_delete',Auth::user())
                                                <td>
                                                    {!! Form::open(['route' =>['offert.destroy',$offert->id],'method' => 'DELETE']) !!}
                                                    <button type="submit" class="btn btn-inverse-danger btn-icon">
                                                        <i class="mdi mdi-delete-forever"></i>
                                                    </button>
                                                    {!! Form::close() !!}
                                                </td>
                                                @endcan
                                            </tr>
                                        </table>
                                    </td>
                                </tr>
                                @endforeach
                                @else
                                    <tr style="text-align: center">
                                        <td colspan="6"><div class="text-danger">{{'No Offert Found'}}</div></td>
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
@endsection
